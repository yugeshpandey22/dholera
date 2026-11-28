<?php
/**
 * DHOLERA SMART CITY - ADVANCED TRAFFIC TRACKER & ATTRIBUTION ENGINE
 * Tracks traffic sources (Google Ads, Meta/Facebook/Instagram Ads, Direct, Organic)
 * Saves visitor sessions and source attribution for every lead.
 */

if (session_status() === PHP_SESSION_NONE) {
    @session_start();
}

(function() {
    // 1. Detect Source from URL Query Parameters
    $gclid       = $_GET['gclid'] ?? '';
    $fbclid      = $_GET['fbclid'] ?? '';
    $utmSource   = strtolower(trim($_GET['utm_source'] ?? ''));
    $utmMedium   = strtolower(trim($_GET['utm_medium'] ?? ''));
    $utmCampaign = trim($_GET['utm_campaign'] ?? '');
    $referrer    = $_SERVER['HTTP_REFERER'] ?? '';
    $userAgent   = $_SERVER['HTTP_USER_AGENT'] ?? '';

    // Determine Traffic Source
    $sourceName = '';
    $sourceType = 'Direct';

    if (!empty($gclid) || $utmSource === 'google' || strpos($referrer, 'googleads') !== false) {
        $sourceType = 'Google Ads';
        $sourceName = 'Google Ads' . (!empty($utmCampaign) ? ' (' . $utmCampaign . ')' : '');
    } elseif (!empty($fbclid) || in_array($utmSource, ['facebook', 'fb', 'meta', 'instagram', 'insta', 'ig']) || strpos($referrer, 'facebook.com') !== false || strpos($referrer, 'instagram.com') !== false) {
        if ($utmSource === 'instagram' || strpos($referrer, 'instagram.com') !== false) {
            $sourceType = 'Instagram Ads';
            $sourceName = 'Instagram Ads' . (!empty($utmCampaign) ? ' (' . $utmCampaign . ')' : '');
        } else {
            $sourceType = 'Facebook / Meta Ads';
            $sourceName = 'Meta Ads' . (!empty($utmCampaign) ? ' (' . $utmCampaign . ')' : '');
        }
    } elseif ($utmSource === 'youtube' || strpos($referrer, 'youtube.com') !== false) {
        $sourceType = 'YouTube';
        $sourceName = 'YouTube' . (!empty($utmCampaign) ? ' (' . $utmCampaign . ')' : '');
    } elseif (!empty($referrer)) {
        $refHost = parse_url($referrer, PHP_URL_HOST) ?? '';
        if (strpos($refHost, 'google.') !== false) {
            $sourceType = 'Google Organic';
            $sourceName = 'Google Organic Search';
        } elseif (strpos($refHost, 'bing.com') !== false || strpos($refHost, 'yahoo.com') !== false) {
            $sourceType = 'Organic Search';
            $sourceName = 'Organic Search (' . $refHost . ')';
        } else {
            $sourceType = 'Referral';
            $sourceName = 'Referral (' . $refHost . ')';
        }
    } else {
        $sourceType = 'Direct';
        $sourceName = 'Direct Traffic';
    }

    // Save Attribution to Session & 30-Day Cookie for Lead Capture
    if (empty($_SESSION['lead_source']) || $sourceType !== 'Direct') {
        $_SESSION['lead_source'] = $sourceName;
        $_SESSION['lead_source_type'] = $sourceType;
        $_SESSION['lead_campaign'] = $utmCampaign;
        @setcookie('dholera_lead_source', $sourceName, time() + (86400 * 30), '/');
        @setcookie('dholera_lead_source_type', $sourceType, time() + (86400 * 30), '/');
    }

    // Detect Device Type
    $isMobile = preg_match('/(android|iphone|ipad|ipod|mobile|blackberry|iemobile|opera mini)/i', $userAgent);
    $device = $isMobile ? 'Mobile' : 'Desktop';

    // 2. Log Traffic Only Once Per Session / Pageview
    $dataDir = dirname(__DIR__) . '/data';
    if (!is_dir($dataDir)) {
        @mkdir($dataDir, 0755, true);
    }

    date_default_timezone_set('Asia/Kolkata');
    $today = date('Y-m-d');
    $now   = date('Y-m-d H:i:s');
    $ip    = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';

    // Avoid logging bots / crawlers in analytics
    if (preg_match('/(bot|crawl|spider|slurp|facebookexternalhit|bingbot|googlebot)/i', $userAgent)) {
        return;
    }

    // Daily Traffic Summary File
    $statsFile = $dataDir . '/traffic_stats.json';
    $stats = [];
    if (file_exists($statsFile)) {
        $stats = @json_decode(file_get_contents($statsFile), true) ?: [];
    }

    if (!isset($stats[$today])) {
        $stats[$today] = [
            'views' => 0,
            'unique_visitors' => 0,
            'sources' => [
                'Google Ads' => 0,
                'Instagram Ads' => 0,
                'Facebook / Meta Ads' => 0,
                'Google Organic' => 0,
                'Direct' => 0,
                'Other' => 0
            ],
            'devices' => [
                'Mobile' => 0,
                'Desktop' => 0
            ]
        ];
    }

    $stats[$today]['views']++;

    // Track unique visitor per day using session
    $sessionKey = 'visited_' . $today;
    if (empty($_SESSION[$sessionKey])) {
        $_SESSION[$sessionKey] = true;
        $stats[$today]['unique_visitors']++;

        $sourceKey = isset($stats[$today]['sources'][$sourceType]) ? $sourceType : 'Other';
        $stats[$today]['sources'][$sourceKey]++;
        $stats[$today]['devices'][$device]++;
    }

    // Save Daily Stats
    @file_put_contents($statsFile, json_encode($stats, JSON_PRETTY_PRINT));

    // Rolling Recent Visitors Log (Keep last 150 visitors)
    $visitorsFile = $dataDir . '/recent_visitors.json';
    $visitors = [];
    if (file_exists($visitorsFile)) {
        $visitors = @json_decode(file_get_contents($visitorsFile), true) ?: [];
    }

    $page = $_SERVER['REQUEST_URI'] ?? '/';
    $entry = [
        'time' => date('d M, h:i A'),
        'source' => $sourceName,
        'source_type' => $sourceType,
        'device' => $device,
        'page' => $page,
        'ip' => substr($ip, 0, 7) . '***',
        'ref' => $referrer ? (parse_url($referrer, PHP_URL_HOST) ?? 'Direct') : 'Direct'
    ];

    array_unshift($visitors, $entry);
    if (count($visitors) > 150) {
        $visitors = array_slice($visitors, 0, 150);
    }
    @file_put_contents($visitorsFile, json_encode($visitors, JSON_PRETTY_PRINT));
})();
