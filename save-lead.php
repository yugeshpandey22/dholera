<?php
/**
 * Lead Capture & Storage Handler with Full Source Attribution
 * Dholera Smart City Plots
 * Saves all website & ads inquiries to data/leads.json & data/leads.csv
 */
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if (session_status() === PHP_SESSION_NONE) {
    @session_start();
}

require_once __DIR__ . '/config.php';

$name     = trim($_POST['name'] ?? '');
$phone    = trim($_POST['phone'] ?? '');
$interest = trim($_POST['interest'] ?? 'Mirrikh Group Industrial Plots @ ₹8,950/yd');
$formType = trim($_POST['source'] ?? 'Website Inquiry');

if (empty($name)) {
    echo json_encode(['success' => false, 'message' => 'Please enter your full name.']);
    exit;
}

if (empty($phone)) {
    echo json_encode(['success' => false, 'message' => 'Please enter your 10-digit mobile number.']);
    exit;
}

// 📱 STRICT INDIAN MOBILE NUMBER VALIDATION
$phoneClean = preg_replace('/\D/', '', $phone);

// Handle leading country code 91 or 0
if (strlen($phoneClean) > 10 && (substr($phoneClean, 0, 2) === '91' || substr($phoneClean, 0, 1) === '0')) {
    $phoneClean = substr($phoneClean, -10);
}

// Check exactly 10 digits starting with 6, 7, 8, or 9
if (!preg_match('/^[6-9]\d{9}$/', $phoneClean)) {
    echo json_encode([
        'success' => false,
        'message' => 'Please enter a valid 10-digit Indian mobile number (must start with 6, 7, 8 or 9).'
    ]);
    exit;
}

// Reject dummy repetitive or sequential numbers
$isDummy = preg_match('/^(\d)\1{9}$/', $phoneClean) 
        || in_array($phoneClean, ['1234567890', '0123456789', '9876543210', '9898989898', '9999999999', '8888888888', '7777777777']);

if ($isDummy) {
    echo json_encode([
        'success' => false,
        'message' => 'Please enter your genuine 10-digit mobile number to receive details.'
    ]);
    exit;
}

// Resolve Traffic Source (Google Ads, Meta Ads, Instagram, etc.)
$trafficSource = $_SESSION['lead_source'] ?? ($_COOKIE['dholera_lead_source'] ?? 'Direct Traffic');
$trafficType   = $_SESSION['lead_source_type'] ?? ($_COOKIE['dholera_lead_source_type'] ?? 'Direct');

date_default_timezone_set('Asia/Kolkata');
$timestamp = date('d-M-Y h:i:s A');
$dateKey   = date('Y-m-d');
$ip        = $_SERVER['REMOTE_ADDR'] ?? 'Direct';
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
$device    = preg_match('/(android|iphone|ipad|mobile)/i', $userAgent) ? 'Mobile' : 'Desktop';

$dataDir = __DIR__ . '/data';
if (!is_dir($dataDir)) {
    @mkdir($dataDir, 0755, true);
}

// 1. Save to data/leads.json (for Admin Dashboard)
$leadsJsonFile = $dataDir . '/leads.json';
$leads = [];
if (file_exists($leadsJsonFile)) {
    $leads = @json_decode(file_get_contents($leadsJsonFile), true) ?: [];
}

$newLead = [
    'id'        => 'LD-' . time() . '-' . rand(100, 999),
    'name'      => $name,
    'phone'     => $phoneClean,
    'interest'  => $interest,
    'form'      => $formType,
    'source'    => $trafficSource,
    'source_type' => $trafficType,
    'device'    => $device,
    'ip'        => $ip,
    'time'      => $timestamp,
    'status'    => 'New'
];

array_unshift($leads, $newLead);
@file_put_contents($leadsJsonFile, json_encode($leads, JSON_PRETTY_PRINT));
@chmod($leadsJsonFile, 0666);

// 2. Save to MySQL Database (if configured)
require_once __DIR__ . '/includes/db.php';
DholeraDB::insertLead($newLead);

// 2. Save to data/leads.csv & root leads.csv (for Excel Export)
$csvFiles = [$dataDir . '/leads.csv', __DIR__ . '/leads.csv'];
foreach ($csvFiles as $csvFile) {
    $isNew = !file_exists($csvFile);
    $fp = @fopen($csvFile, 'a');
    if ($fp) {
        if ($isNew) {
            fputcsv($fp, ['Lead ID', 'Timestamp (IST)', 'Customer Name', 'Mobile Number', 'Plot Interest', 'Form Location', 'Traffic Source', 'Device', 'IP Address']);
        }
        fputcsv($fp, [
            $newLead['id'],
            $timestamp,
            $name,
            $phoneClean,
            $interest,
            $formType,
            $trafficSource,
            $device,
            $ip
        ]);
        fclose($fp);
    }
}

// 3. Send Email Notification to Admin
$to = !empty($EMAIL_ADDRESS) ? $EMAIL_ADDRESS : 'pram.realtyrangers@gmail.com';
$subject = "🔥 NEW LEAD from " . $trafficType . ": " . $name . " (+91 " . $phoneClean . ")";
$body = "New Lead Received from Dholera Smart City Landing Page:\n\n"
      . "--------------------------------------------------\n"
      . "Customer Name    : " . $name . "\n"
      . "Mobile Number    : +91 " . $phoneClean . "\n"
      . "Plot Interest    : " . $interest . "\n"
      . "Traffic Source   : " . $trafficSource . " [" . $trafficType . "]\n"
      . "Form Location    : " . $formType . "\n"
      . "Device           : " . $device . "\n"
      . "Date & Time (IST): " . $timestamp . "\n"
      . "--------------------------------------------------\n\n"
      . "📞 Call the customer immediately: +91 " . $phoneClean . "\n"
      . "💬 WhatsApp them: https://api.whatsapp.com/send?phone=91" . $phoneClean . "\n";
$headers = "From: leads@dholera.top\r\n"
         . "Reply-To: leads@dholera.top\r\n"
         . "X-Mailer: PHP/" . phpversion();
@mail($to, $subject, $body, $headers);

// 4. Generate WhatsApp Redirect URL
$whatsappNum = !empty($WHATSAPP_NUMBER) ? $WHATSAPP_NUMBER : '918950591781';
$waMessage = "Hi, My name is " . $name . " (Mobile: " . $phoneClean . "). I am interested in " . $interest . " in Dholera SIR. Please share brochure, layout plan & site visit details.";
$waUrl = "https://api.whatsapp.com/send?phone=" . $whatsappNum . "&text=" . urlencode($waMessage);

echo json_encode([
    'success' => true,
    'message' => 'Lead captured successfully!',
    'lead_id' => $newLead['id'],
    'name' => $name,
    'phone' => $phoneClean,
    'source' => $trafficSource,
    'whatsapp_url' => $waUrl
]);
exit;
