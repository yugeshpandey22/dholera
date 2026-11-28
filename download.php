<?php
/**
 * Dholera SIR Project Brochure Downloader
 * Securely handles attachment downloads for all 3 project PDF brochures
 */

$project = trim($_GET['project'] ?? $_GET['file'] ?? '');
$isInline = isset($_GET['view']) || isset($_GET['inline']);

$brochures = [
    'mayur-signature-2' => [
        'file' => __DIR__ . '/pdf/Mayur Signature 2.pdf',
        'download_name' => 'Mayur_Signature_2_Dholera_Brochure.pdf',
        'title' => 'Mayur Signature 2 (Residential Plots @ Rojka, Dholera)'
    ],
    'mayur-swastik-2' => [
        'file' => __DIR__ . '/pdf/Mayur-Swastik-II-by-Mirrikh-Group_web.pdf',
        'download_name' => 'Mayur_Swastik_II_Dholera_Brochure.pdf',
        'title' => 'Mayur Swastik II (Residential Plots @ Kamiyala, Dholera)'
    ],
    'mayur-business-park' => [
        'file' => __DIR__ . '/pdf/Mayur Business Park.pdf',
        'download_name' => 'Mayur_Business_Park_Industrial_Brochure.pdf',
        'title' => 'Mayur Business Park (Industrial Plots, Dholera)'
    ]
];

// Determine project key from input string
$key = 'mayur-signature-2';
if (stripos($project, 'business') !== false || stripos($project, 'industrial') !== false) {
    $key = 'mayur-business-park';
} elseif (stripos($project, 'swastik') !== false || stripos($project, 'kamiyala') !== false) {
    $key = 'mayur-swastik-2';
} elseif (stripos($project, 'signature') !== false || stripos($project, 'rojka') !== false) {
    $key = 'mayur-signature-2';
}

$target = $brochures[$key];
$filePath = $target['file'];

if (!file_exists($filePath)) {
    // Fallback: check if direct file name matches
    $pdfDir = __DIR__ . '/pdf';
    $files = glob($pdfDir . '/*.pdf');
    if (!empty($files)) {
        $filePath = $files[0];
    } else {
        http_response_code(404);
        die("Brochure PDF file not found. Please contact support.");
    }
}

// Clean output buffers before streaming binary
if (ob_get_level()) {
    @ob_end_clean();
}

$disposition = $isInline ? 'inline' : 'attachment';

header('Content-Description: File Transfer');
header('Content-Type: application/pdf');
header('Content-Disposition: ' . $disposition . '; filename="' . $target['download_name'] . '"');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: ' . filesize($filePath));

readfile($filePath);
exit;
