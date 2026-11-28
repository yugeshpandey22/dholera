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
$email    = trim($_POST['email'] ?? '');
$interest = trim($_POST['interest'] ?? 'Residential Plots in Dholera');
$message  = trim($_POST['message'] ?? '');
$formType = trim($_POST['source'] ?? 'Website Inquiry');

if (empty($name)) {
    echo json_encode(['success' => false, 'message' => 'Please enter your full name.']);
    exit;
}

if (empty($phone)) {
    echo json_encode(['success' => false, 'message' => 'Please enter your 10-digit mobile number.']);
    exit;
}

// 📱 AIRTIGHT INDIAN MOBILE NUMBER VALIDATION (Rejects all dummy, sequential, and non-Indian numbers)
$phoneClean = preg_replace('/\D/', '', $phone);

// Handle leading country code 91 or 0
if (strlen($phoneClean) > 10 && (substr($phoneClean, 0, 2) === '91' || substr($phoneClean, 0, 1) === '0')) {
    $phoneClean = substr($phoneClean, -10);
}

// 1. Must be exactly 10 digits
if (strlen($phoneClean) !== 10) {
    echo json_encode([
        'success' => false,
        'message' => 'Please enter a valid 10-digit mobile number.'
    ]);
    exit;
}

// 2. Must start with 6, 7, 8, or 9
if (!preg_match('/^[6-9]/', $phoneClean)) {
    echo json_encode([
        'success' => false,
        'message' => 'Please enter a valid Indian mobile number starting with 6, 7, 8 or 9.'
    ]);
    exit;
}

// 3. Reject all identical digits (e.g. 9999999999, 8888888888)
if (preg_match('/^(\d)\1{9}$/', $phoneClean)) {
    echo json_encode([
        'success' => false,
        'message' => 'Please enter your genuine mobile number (repeated digits detected).'
    ]);
    exit;
}

// 4. Reject 6 or more identical consecutive digits (e.g. 9999991234, 9000000123)
if (preg_match('/(\d)\1{5,}/', $phoneClean)) {
    echo json_encode([
        'success' => false,
        'message' => 'Please enter a valid mobile number (unrealistic consecutive digits).'
    ]);
    exit;
}

// 5. Reject repetitive 2-digit patterns (e.g. 9898989898, 9797979797, 9191919191, 9090909090)
if (preg_match('/^(\d{2})\1{4}$/', $phoneClean)) {
    echo json_encode([
        'success' => false,
        'message' => 'Please enter your genuine mobile number (pattern detected).'
    ]);
    exit;
}

// 6. Reject repetitive 3-digit patterns (e.g. 9879879879)
if (preg_match('/^(\d{3})\1{2}\d$/', $phoneClean)) {
    echo json_encode([
        'success' => false,
        'message' => 'Please enter your genuine mobile number (pattern detected).'
    ]);
    exit;
}

// 7. Reject 7 or more trailing zeros (e.g. 9000000000, 8900000000)
if (preg_match('/^[6-9]0{7,}$/', $phoneClean)) {
    echo json_encode([
        'success' => false,
        'message' => 'Please enter your genuine 10-digit mobile number.'
    ]);
    exit;
}

// 8. Reject known fake, dummy & test sequences
$blacklistedPhones = [
    '1234567890', '0123456789', '9876543210', '8765432109', '7654321098',
    '6789012345', '9123456789', '9898989898', '9797979797', '9090909090',
    '8989898989', '7878787878', '6767676767', '9999988888', '8888899999',
    '9876500000', '9876598765', '9988776655', '9012345678'
];

if (in_array($phoneClean, $blacklistedPhones, true)) {
    echo json_encode([
        'success' => false,
        'message' => 'Please enter your genuine 10-digit mobile number to receive rates & details.'
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
    'email'     => $email,
    'interest'  => $interest,
    'message'   => $message,
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
