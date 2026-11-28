<?php
/**
 * DHOLERA SMART CITY - ADMIN TRAFFIC & LEADS CRM DASHBOARD
 * View all traffic sources (Google Ads, Meta/Instagram Ads, Direct)
 * View, filter, call, WhatsApp, and export customer leads
 */

if (session_status() === PHP_SESSION_NONE) {
    @session_start();
}

require_once __DIR__ . '/config.php';

$adminUser = $ADMIN_USERNAME ?? 'admin';
$adminPass = $ADMIN_PASSWORD ?? 'dholera@2026';

// 1. Handle Logout
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['dholera_admin']);
    session_destroy();
    header('Location: admin.php');
    exit;
}

// 2. Handle CSV Export
if (isset($_GET['action']) && $_GET['action'] === 'export_csv') {
    if (empty($_SESSION['dholera_admin'])) {
        header('Location: admin.php');
        exit;
    }
    $csvFile = __DIR__ . '/data/leads.csv';
    if (!file_exists($csvFile)) {
        $csvFile = __DIR__ . '/leads.csv';
    }
    if (file_exists($csvFile)) {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="dholera_leads_' . date('Y-m-d') . '.csv"');
        readfile($csvFile);
        exit;
    } else {
        die("No leads CSV found yet.");
    }
}

// 3. Handle Login Submission
$loginError = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_btn'])) {
    $u = trim($_POST['username'] ?? '');
    $p = trim($_POST['password'] ?? '');
    if ($u === $adminUser && $p === $adminPass) {
        $_SESSION['dholera_admin'] = true;
        header('Location: admin.php');
        exit;
    } else {
        $loginError = 'Invalid Username or Password! Please try again.';
    }
}

$isLoggedIn = !empty($_SESSION['dholera_admin']);

// Data Loading for Logged-In Admin
$leads = [];
$stats = [];
$recentVisitors = [];

if ($isLoggedIn) {
    $dataDir = __DIR__ . '/data';

    // Load Leads
    $leadsFile = $dataDir . '/leads.json';
    if (file_exists($leadsFile)) {
        $leads = @json_decode(file_get_contents($leadsFile), true) ?: [];
    }

    // Load Traffic Stats
    $statsFile = $dataDir . '/traffic_stats.json';
    if (file_exists($statsFile)) {
        $stats = @json_decode(file_get_contents($statsFile), true) ?: [];
    }

    // Load Recent Visitors
    $visitorsFile = $dataDir . '/recent_visitors.json';
    if (file_exists($visitorsFile)) {
        $recentVisitors = @json_decode(file_get_contents($visitorsFile), true) ?: [];
    }
}

// Aggregate Traffic Metrics
date_default_timezone_set('Asia/Kolkata');
$todayDate = date('Y-m-d');
$todayStats = $stats[$todayDate] ?? [
    'views' => 0,
    'unique_visitors' => 0,
    'sources' => ['Google Ads' => 0, 'Instagram Ads' => 0, 'Facebook / Meta Ads' => 0, 'Google Organic' => 0, 'Direct' => 0, 'Other' => 0],
    'devices' => ['Mobile' => 0, 'Desktop' => 0]
];

$totalViews = 0;
$totalVisitors = 0;
$allSources = ['Google Ads' => 0, 'Instagram Ads' => 0, 'Facebook / Meta Ads' => 0, 'Google Organic' => 0, 'Direct' => 0, 'Other' => 0];
$allDevices = ['Mobile' => 0, 'Desktop' => 0];

foreach ($stats as $day => $d) {
    $totalViews += ($d['views'] ?? 0);
    $totalVisitors += ($d['unique_visitors'] ?? 0);
    if (!empty($d['sources'])) {
        foreach ($d['sources'] as $src => $count) {
            $allSources[$src] = ($allSources[$src] ?? 0) + $count;
        }
    }
    if (!empty($d['devices'])) {
        foreach ($d['devices'] as $dev => $cnt) {
            $allDevices[$dev] = ($allDevices[$dev] ?? 0) + $cnt;
        }
    }
}
$totalLeads = count($leads);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard | Dholera Smart City Traffic &amp; Leads</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Outfit:wght@600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
    :root {
      --bg: #090e1a;
      --card-bg: #111827;
      --card-border: rgba(255, 255, 255, 0.08);
      --text: #f9fafb;
      --text-muted: #94a3b8;
      --gold: #fbbf24;
      --green: #22c55e;
      --blue: #0284c7;
      --purple: #a855f7;
      --red: #ef4444;
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
      background: var(--bg);
      color: var(--text);
      line-height: 1.5;
      min-height: 100vh;
    }
    a { color: inherit; text-decoration: none; }

    /* Login Screen */
    .login-wrapper {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    .login-card {
      width: 100%;
      max-width: 420px;
      background: var(--card-bg);
      border: 1px solid var(--card-border);
      border-radius: 20px;
      padding: 32px 28px;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7);
      text-align: center;
    }
    .login-logo {
      width: 56px;
      height: 56px;
      border-radius: 14px;
      background: linear-gradient(135deg, #fbbf24 0%, #d97706 100%);
      color: #0f172a;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      margin-bottom: 16px;
    }
    .login-title { font-size: 1.4rem; font-weight: 800; font-family: 'Outfit', sans-serif; margin-bottom: 6px; }
    .login-sub { color: var(--text-muted); font-size: 0.85rem; margin-bottom: 24px; }
    .login-group { text-align: left; margin-bottom: 16px; }
    .login-label { display: block; font-size: 0.78rem; font-weight: 700; color: #cbd5e1; margin-bottom: 6px; }
    .login-input {
      width: 100%;
      padding: 12px 14px;
      background: #1e293b;
      border: 1px solid rgba(255, 255, 255, 0.12);
      border-radius: 10px;
      color: #ffffff;
      font-size: 0.95rem;
      outline: none;
      transition: border 0.2s;
    }
    .login-input:focus { border-color: var(--gold); }
    .btn-login {
      width: 100%;
      padding: 13px;
      background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
      color: #0f172a;
      font-weight: 800;
      font-size: 0.95rem;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      margin-top: 10px;
      transition: transform 0.15s;
    }
    .btn-login:hover { transform: translateY(-2px); }
    .login-error {
      background: rgba(239, 68, 68, 0.15);
      border: 1px solid rgba(239, 68, 68, 0.35);
      color: #fca5a5;
      padding: 10px 14px;
      border-radius: 8px;
      font-size: 0.82rem;
      font-weight: 600;
      margin-bottom: 16px;
    }

    /* Dashboard Header */
    .dash-nav {
      background: rgba(17, 24, 39, 0.92);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid var(--card-border);
      position: sticky;
      top: 0;
      z-index: 100;
      padding: 14px 24px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .dash-brand { display: flex; align-items: center; gap: 12px; }
    .dash-brand-icon {
      width: 40px;
      height: 40px;
      background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
      border-radius: 10px;
      color: #0f172a;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      font-weight: 900;
    }
    .dash-brand-name { font-family: 'Outfit', sans-serif; font-weight: 800; font-size: 1.15rem; }
    .dash-brand-badge {
      background: rgba(34, 197, 94, 0.15);
      color: #4ade80;
      font-size: 0.68rem;
      font-weight: 800;
      padding: 2px 8px;
      border-radius: 50px;
      border: 1px solid rgba(34, 197, 94, 0.3);
      margin-left: 6px;
    }
    .dash-actions { display: flex; align-items: center; gap: 10px; }
    .btn-nav {
      padding: 8px 14px;
      border-radius: 8px;
      font-size: 0.82rem;
      font-weight: 700;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      cursor: pointer;
      border: 1px solid var(--card-border);
      background: #1e293b;
      color: #ffffff;
      transition: all 0.2s;
    }
    .btn-nav:hover { background: #334155; }
    .btn-nav-gold {
      background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
      color: #0f172a;
      border: none;
    }
    .btn-nav-gold:hover { transform: translateY(-1px); }

    /* Dashboard Container */
    .dash-container {
      max-width: 1320px;
      margin: 0 auto;
      padding: 24px 20px 60px;
    }

    /* Stat Cards Grid */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 16px;
      margin-bottom: 24px;
    }
    .stat-card {
      background: var(--card-bg);
      border: 1px solid var(--card-border);
      border-radius: 16px;
      padding: 20px;
      position: relative;
      overflow: hidden;
    }
    .stat-top { display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px; }
    .stat-title { font-size: 0.78rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; }
    .stat-icon {
      width: 38px;
      height: 38px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 16px;
    }
    .stat-val { font-size: 2rem; font-weight: 800; font-family: 'Outfit', sans-serif; }
    .stat-sub { font-size: 0.76rem; color: var(--text-muted); margin-top: 4px; }

    /* Traffic Sources & Device Cards */
    .analytics-grid {
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 18px;
      margin-bottom: 24px;
    }
    @media (max-width: 900px) {
      .analytics-grid { grid-template-columns: 1fr; }
    }
    .panel-card {
      background: var(--card-bg);
      border: 1px solid var(--card-border);
      border-radius: 18px;
      padding: 22px;
    }
    .panel-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 18px;
      padding-bottom: 12px;
      border-bottom: 1px solid var(--card-border);
    }
    .panel-title { font-size: 1.05rem; font-weight: 800; font-family: 'Outfit', sans-serif; display: flex; align-items: center; gap: 8px; }
    .panel-badge { font-size: 0.72rem; font-weight: 700; color: var(--gold); }

    /* Source Bars */
    .source-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 0;
      border-bottom: 1px solid rgba(255, 255, 255, 0.04);
    }
    .source-name { font-size: 0.85rem; font-weight: 700; display: flex; align-items: center; gap: 8px; }
    .source-bar-wrap { flex: 1; max-width: 180px; margin: 0 16px; background: #1e293b; height: 8px; border-radius: 50px; overflow: hidden; }
    .source-bar-fill { height: 100%; border-radius: 50px; }
    .source-count { font-size: 0.88rem; font-weight: 800; min-width: 50px; text-align: right; }

    /* Pill Badges */
    .badge-src {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      padding: 4px 10px;
      border-radius: 50px;
      font-size: 0.72rem;
      font-weight: 800;
    }
    .badge-google { background: rgba(2, 132, 199, 0.18); color: #38bdf8; border: 1px solid rgba(2, 132, 199, 0.35); }
    .badge-meta { background: rgba(59, 130, 246, 0.18); color: #60a5fa; border: 1px solid rgba(59, 130, 246, 0.35); }
    .badge-insta { background: rgba(168, 85, 247, 0.18); color: #c084fc; border: 1px solid rgba(168, 85, 247, 0.35); }
    .badge-organic { background: rgba(34, 197, 94, 0.18); color: #4ade80; border: 1px solid rgba(34, 197, 94, 0.35); }
    .badge-direct { background: rgba(148, 163, 184, 0.15); color: #94a3b8; border: 1px solid rgba(148, 163, 184, 0.25); }

    /* Leads Table */
    .table-responsive { width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch; }
    .leads-table { width: 100%; border-collapse: collapse; text-align: left; }
    .leads-table th {
      background: #1e293b;
      padding: 12px 14px;
      font-size: 0.75rem;
      font-weight: 700;
      color: var(--text-muted);
      text-transform: uppercase;
      letter-spacing: 0.5px;
      border-bottom: 1px solid var(--card-border);
    }
    .leads-table td {
      padding: 14px;
      font-size: 0.85rem;
      border-bottom: 1px solid rgba(255, 255, 255, 0.05);
      vertical-align: middle;
    }
    .leads-table tr:hover td { background: rgba(255, 255, 255, 0.02); }
    .lead-name { font-weight: 700; color: #ffffff; font-size: 0.92rem; }
    .lead-phone { font-family: monospace; font-size: 0.92rem; font-weight: 700; color: #38bdf8; }
    .lead-interest { font-size: 0.78rem; color: #cbd5e1; }
    .lead-actions { display: flex; gap: 6px; }
    .btn-act {
      padding: 6px 10px;
      border-radius: 6px;
      font-size: 0.76rem;
      font-weight: 700;
      display: inline-flex;
      align-items: center;
      gap: 5px;
      transition: transform 0.15s;
    }
    .btn-act-call { background: #0284c7; color: #ffffff; }
    .btn-act-wa { background: #22c55e; color: #ffffff; }
    .btn-act:hover { transform: scale(1.05); }

    /* Empty state */
    .empty-state { text-align: center; padding: 48px 20px; color: var(--text-muted); }
    .empty-icon { font-size: 42px; margin-bottom: 12px; color: #475569; }
  </style>
</head>
<body>

<?php if (!$isLoggedIn): ?>
  <!-- ======================================================================
       ADMIN LOGIN SCREEN
       ====================================================================== -->
  <div class="login-wrapper">
    <div class="login-card">
      <div class="login-logo">
        <i class="fa-solid fa-chart-line"></i>
      </div>
      <h2 class="login-title">Dholera Admin Portal</h2>
      <p class="login-sub">Sign in to track real-time ads traffic, callers &amp; customer leads.</p>

      <?php if (!empty($loginError)): ?>
        <div class="login-error"><i class="fa-solid fa-circle-exclamation"></i> <?php echo htmlspecialchars($loginError); ?></div>
      <?php endif; ?>

      <form method="POST" action="admin.php">
        <div class="login-group">
          <label class="login-label" for="username">Admin Username</label>
          <input type="text" id="username" name="username" class="login-input" placeholder="e.g. admin" required autofocus>
        </div>
        <div class="login-group">
          <label class="login-label" for="password">Password</label>
          <input type="password" id="password" name="password" class="login-input" placeholder="Enter Admin Password" required>
        </div>
        <button type="submit" name="login_btn" class="btn-login">
          <i class="fa-solid fa-lock-open"></i> Login to Dashboard
        </button>
      </form>
    </div>
  </div>

<?php else: ?>
  <!-- ======================================================================
       ADMIN DASHBOARD MAIN INTERFACE
       ====================================================================== -->
  <header class="dash-nav">
    <div class="dash-brand">
      <div class="dash-brand-icon"><i class="fa-solid fa-city"></i></div>
      <div>
        <div class="dash-brand-name">Dholera Smart City <span class="dash-brand-badge"><i class="fa-solid fa-circle fa-2xs"></i> LIVE MONITOR</span></div>
      </div>
    </div>
    <div class="dash-actions">
      <a href="admin.php?action=export_csv" class="btn-nav btn-nav-gold" title="Download all leads in CSV/Excel">
        <i class="fa-solid fa-file-excel"></i> <span>Export Leads CSV</span>
      </a>
      <a href="./" target="_blank" class="btn-nav" title="View live landing page">
        <i class="fa-solid fa-arrow-up-right-from-square"></i> <span>View Website</span>
      </a>
      <a href="admin.php?action=logout" class="btn-nav" title="Logout">
        <i class="fa-solid fa-right-from-bracket"></i> <span>Logout</span>
      </a>
    </div>
  </header>

  <main class="dash-container">
    <!-- Stat Metrics -->
    <div class="stats-grid">
      <!-- Card 1: Today Visitors -->
      <div class="stat-card">
        <div class="stat-top">
          <span class="stat-title">Visitors Today</span>
          <div class="stat-icon" style="background: rgba(2, 132, 199, 0.15); color: #38bdf8;"><i class="fa-solid fa-users"></i></div>
        </div>
        <div class="stat-val"><?php echo number_format($todayStats['unique_visitors']); ?></div>
        <div class="stat-sub"><?php echo number_format($todayStats['views']); ?> total pageviews today</div>
      </div>

      <!-- Card 2: Total Leads -->
      <div class="stat-card">
        <div class="stat-top">
          <span class="stat-title">Total Customer Leads</span>
          <div class="stat-icon" style="background: rgba(34, 197, 94, 0.15); color: #4ade80;"><i class="fa-solid fa-phone-volume"></i></div>
        </div>
        <div class="stat-val" style="color: #4ade80;"><?php echo number_format($totalLeads); ?></div>
        <div class="stat-sub">From Ads, Popups &amp; Hero Form</div>
      </div>

      <!-- Card 3: Top Ad Channel -->
      <div class="stat-card">
        <div class="stat-top">
          <span class="stat-title">Google Ads Traffic</span>
          <div class="stat-icon" style="background: rgba(251, 191, 36, 0.15); color: #fbbf24;"><i class="fa-brands fa-google"></i></div>
        </div>
        <div class="stat-val" style="color: #fbbf24;"><?php echo number_format($allSources['Google Ads'] ?? 0); ?></div>
        <div class="stat-sub">Visitors from Google Search &amp; Display</div>
      </div>

      <!-- Card 4: Meta / Instagram Ads -->
      <div class="stat-card">
        <div class="stat-top">
          <span class="stat-title">Meta / Instagram Ads</span>
          <div class="stat-icon" style="background: rgba(168, 85, 247, 0.15); color: #c084fc;"><i class="fa-brands fa-instagram"></i></div>
        </div>
        <div class="stat-val" style="color: #c084fc;"><?php echo number_format(($allSources['Instagram Ads'] ?? 0) + ($allSources['Facebook / Meta Ads'] ?? 0)); ?></div>
        <div class="stat-sub">Visitors from Social Media Ads</div>
      </div>
    </div>

    <!-- Analytics Breakdown -->
    <div class="analytics-grid">
      <!-- Traffic Sources Breakdown -->
      <div class="panel-card">
        <div class="panel-header">
          <h3 class="panel-title"><i class="fa-solid fa-chart-pie" style="color: var(--gold);"></i> Traffic Sources Breakdown (Where visitors come from)</h3>
          <span class="panel-badge">All-Time Statistics</span>
        </div>
        <div class="sources-list">
          <?php
            $maxSrc = max(array_values($allSources) ?: [1]);
            if ($maxSrc == 0) $maxSrc = 1;
            $colors = [
              'Google Ads' => '#38bdf8',
              'Instagram Ads' => '#c084fc',
              'Facebook / Meta Ads' => '#60a5fa',
              'Google Organic' => '#4ade80',
              'Direct' => '#94a3b8',
              'Other' => '#f59e0b'
            ];
            foreach ($allSources as $src => $count):
              $pct = round(($count / $maxSrc) * 100);
              $barColor = $colors[$src] ?? '#94a3b8';
          ?>
            <div class="source-row">
              <div class="source-name">
                <i class="fa-solid fa-circle fa-2xs" style="color: <?php echo $barColor; ?>;"></i>
                <span><?php echo htmlspecialchars($src); ?></span>
              </div>
              <div class="source-bar-wrap">
                <div class="source-bar-fill" style="width: <?php echo $pct; ?>%; background: <?php echo $barColor; ?>;"></div>
              </div>
              <div class="source-count"><?php echo number_format($count); ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Device Breakdown -->
      <div class="panel-card">
        <div class="panel-header">
          <h3 class="panel-title"><i class="fa-solid fa-mobile-screen" style="color: #38bdf8;"></i> Device Breakdown</h3>
          <span class="panel-badge">Platform</span>
        </div>
        <?php
          $mobCount = $allDevices['Mobile'] ?? 0;
          $deskCount = $allDevices['Desktop'] ?? 0;
          $totalDev = $mobCount + $deskCount;
          $mobPct = $totalDev > 0 ? round(($mobCount / $totalDev) * 100) : 0;
          $deskPct = $totalDev > 0 ? round(($deskCount / $totalDev) * 100) : 0;
        ?>
        <div style="padding: 10px 0;">
          <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
            <span style="font-weight: 700;"><i class="fa-solid fa-mobile-screen-button"></i> Mobile Phones</span>
            <span style="font-weight: 800; color: #38bdf8;"><?php echo $mobPct; ?>% (<?php echo number_format($mobCount); ?>)</span>
          </div>
          <div style="height: 10px; background: #1e293b; border-radius: 50px; overflow: hidden; margin-bottom: 18px;">
            <div style="height: 100%; width: <?php echo $mobPct; ?>%; background: #38bdf8;"></div>
          </div>

          <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
            <span style="font-weight: 700;"><i class="fa-solid fa-laptop"></i> Desktop / PC</span>
            <span style="font-weight: 800; color: #fbbf24;"><?php echo $deskPct; ?>% (<?php echo number_format($deskCount); ?>)</span>
          </div>
          <div style="height: 10px; background: #1e293b; border-radius: 50px; overflow: hidden;">
            <div style="height: 100%; width: <?php echo $deskPct; ?>%; background: #fbbf24;"></div>
          </div>
        </div>
        <div style="margin-top: 18px; font-size: 0.78rem; color: var(--text-muted); background: rgba(255,255,255,0.03); padding: 10px; border-radius: 8px;">
          <i class="fa-solid fa-circle-info"></i> Mobile traffic indicates visitors arriving from WhatsApp, Facebook &amp; Instagram ads.
        </div>
      </div>
    </div>

    <!-- Customer Leads Table -->
    <div class="panel-card" style="margin-bottom: 24px;">
      <div class="panel-header">
        <h3 class="panel-title"><i class="fa-solid fa-address-book" style="color: var(--green);"></i> Customer Leads &amp; Inquiries (<?php echo count($leads); ?>)</h3>
        <a href="admin.php?action=export_csv" class="btn-nav btn-nav-gold" style="font-size: 0.76rem; padding: 6px 12px;">
          <i class="fa-solid fa-download"></i> Download CSV
        </a>
      </div>

      <?php if (empty($leads)): ?>
        <div class="empty-state">
          <div class="empty-icon"><i class="fa-solid fa-inbox"></i></div>
          <h4 style="color: #ffffff; margin-bottom: 4px;">No Leads Received Yet</h4>
          <p style="font-size: 0.85rem;">When visitors submit the Hero form or the Mirrikh Popup, their phone numbers and ad source will appear here in real time!</p>
        </div>
      <?php else: ?>
        <div class="table-responsive">
          <table class="leads-table">
            <thead>
              <tr>
                <th>Date &amp; Time (IST)</th>
                <th>Customer Name</th>
                <th>Mobile Number</th>
                <th>Plot Interest</th>
                <th>Traffic Source</th>
                <th>Device</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($leads as $lead):
                $src = $lead['source'] ?? 'Direct';
                $srcType = $lead['source_type'] ?? 'Direct';
                $badgeClass = 'badge-direct';
                if (stripos($src, 'google') !== false) $badgeClass = 'badge-google';
                elseif (stripos($src, 'insta') !== false) $badgeClass = 'badge-insta';
                elseif (stripos($src, 'meta') !== false || stripos($src, 'facebook') !== false) $badgeClass = 'badge-meta';
                elseif (stripos($src, 'organic') !== false) $badgeClass = 'badge-organic';
              ?>
                <tr>
                  <td style="color: var(--text-muted); font-size: 0.8rem;"><?php echo htmlspecialchars($lead['time'] ?? 'Recent'); ?></td>
                  <td class="lead-name"><?php echo htmlspecialchars($lead['name'] ?? 'Visitor'); ?></td>
                  <td class="lead-phone">+91 <?php echo htmlspecialchars($lead['phone'] ?? ''); ?></td>
                  <td class="lead-interest"><?php echo htmlspecialchars($lead['interest'] ?? 'Dholera Plots'); ?></td>
                  <td>
                    <span class="badge-src <?php echo $badgeClass; ?>">
                      <i class="fa-solid fa-bullseye"></i> <?php echo htmlspecialchars($src); ?>
                    </span>
                  </td>
                  <td style="font-size: 0.8rem; color: var(--text-muted);"><i class="fa-solid fa-<?php echo ($lead['device'] ?? '') === 'Mobile' ? 'mobile-screen' : 'laptop'; ?>"></i> <?php echo htmlspecialchars($lead['device'] ?? 'Mobile'); ?></td>
                  <td>
                    <div class="lead-actions">
                      <a href="tel:+91<?php echo htmlspecialchars($lead['phone'] ?? ''); ?>" class="btn-act btn-act-call" title="Call Customer">
                        <i class="fa-solid fa-phone"></i> Call
                      </a>
                      <a href="https://api.whatsapp.com/send?phone=91<?php echo htmlspecialchars($lead['phone'] ?? ''); ?>&text=<?php echo urlencode('Hi ' . ($lead['name'] ?? '') . ', thank you for inquiring about Dholera Smart City plots on our website. How can I help you today?'); ?>" target="_blank" class="btn-act btn-act-wa" title="WhatsApp Customer">
                        <i class="fa-brands fa-whatsapp"></i> Chat
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
    </div>

    <!-- Live Visitors Activity Stream -->
    <div class="panel-card">
      <div class="panel-header">
        <h3 class="panel-title"><i class="fa-solid fa-satellite-dish" style="color: #38bdf8;"></i> Recent Live Visitors Log (Last <?php echo count($recentVisitors); ?> visits)</h3>
        <span class="panel-badge">Real-Time Traffic</span>
      </div>

      <?php if (empty($recentVisitors)): ?>
        <div class="empty-state">
          <p>No recent visitor logs yet. Refresh the landing page to generate your first visit entry!</p>
        </div>
      <?php else: ?>
        <div class="table-responsive">
          <table class="leads-table">
            <thead>
              <tr>
                <th>Time (IST)</th>
                <th>Traffic Channel / Source</th>
                <th>Device</th>
                <th>Page Visited</th>
                <th>Referrer</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach (array_slice($recentVisitors, 0, 30) as $vis):
                $src = $vis['source'] ?? 'Direct';
                $badgeClass = 'badge-direct';
                if (stripos($src, 'google') !== false) $badgeClass = 'badge-google';
                elseif (stripos($src, 'insta') !== false) $badgeClass = 'badge-insta';
                elseif (stripos($src, 'meta') !== false || stripos($src, 'facebook') !== false) $badgeClass = 'badge-meta';
                elseif (stripos($src, 'organic') !== false) $badgeClass = 'badge-organic';
              ?>
                <tr>
                  <td style="color: var(--text-muted); font-size: 0.8rem;"><?php echo htmlspecialchars($vis['time']); ?></td>
                  <td>
                    <span class="badge-src <?php echo $badgeClass; ?>">
                      <?php echo htmlspecialchars($src); ?>
                    </span>
                  </td>
                  <td style="font-size: 0.8rem; color: var(--text-muted);"><i class="fa-solid fa-<?php echo ($vis['device'] ?? '') === 'Mobile' ? 'mobile-screen' : 'laptop'; ?>"></i> <?php echo htmlspecialchars($vis['device'] ?? 'Mobile'); ?></td>
                  <td style="font-family: monospace; font-size: 0.8rem; color: #cbd5e1;"><?php echo htmlspecialchars($vis['page']); ?></td>
                  <td style="font-size: 0.8rem; color: var(--text-muted);"><?php echo htmlspecialchars($vis['ref']); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
    </div>
  </main>
<?php endif; ?>

</body>
</html>
