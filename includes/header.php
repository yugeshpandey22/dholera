<?php
/**
 * Common Header Template
 * Dholera Smart City Plots
 */
if (!isset($PHONE_RAW)) {
  require_once __DIR__ . '/../config.php';
}

$PAGE_TITLE       = $PAGE_TITLE ?? "Dholera Smart City Plots | Residential & Industrial Land in Dholera SIR";
$PAGE_DESCRIPTION = $PAGE_DESCRIPTION ?? ($PAGE_DESC ?? "Explore prime Dholera Smart City plots for sale. Verified Dholera residential plots & industrial plots in Dholera SIR Gujarat.");
$PAGE_KEYWORDS    = $PAGE_KEYWORDS ?? "Dholera Smart City plots, Dholera residential plots, Dholera industrial plots, Plots for sale in Dholera, Dholera SIR plots";
$PAGE_CANONICAL   = $PAGE_CANONICAL ?? ($CANONICAL_URL . ($CURRENT_PAGE_SLUG ?? ''));
$PAGE_IMAGE       = $PAGE_IMAGE ?? ($CANONICAL_URL . "assets/images/dholera-hero.jpg");
$ACTIVE_NAV       = $ACTIVE_NAV ?? 'home';
$SHOW_TOPBAR      = $SHOW_TOPBAR ?? true;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <base href="<?php echo htmlspecialchars($BASE_URI); ?>">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- SEO Meta Tags -->
  <title><?php echo htmlspecialchars($PAGE_TITLE); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($PAGE_DESCRIPTION); ?>">
  <meta name="keywords" content="<?php echo htmlspecialchars($PAGE_KEYWORDS); ?>">
  <meta name="author" content="<?php echo htmlspecialchars($SITE_NAME); ?>">
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
  <link rel="canonical" href="<?php echo htmlspecialchars($PAGE_CANONICAL); ?>">

  <!-- Google Search Console Verification -->
  <meta name="google-site-verification" content="<?php echo htmlspecialchars($GOOGLE_SITE_VERIFICATION ?? 'sXxJAVDTb3B3toE9YnR9Ptnr6WUfXb7d9J-xe92MCnU'); ?>" />

  <!-- Open Graph -->
  <meta property="og:locale" content="en_US">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php echo htmlspecialchars($PAGE_TITLE); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($PAGE_DESCRIPTION); ?>">
  <meta property="og:url" content="<?php echo htmlspecialchars($PAGE_CANONICAL); ?>">
  <meta property="og:site_name" content="<?php echo htmlspecialchars($SITE_NAME); ?>">
  <meta property="og:image" content="<?php echo htmlspecialchars($PAGE_IMAGE); ?>">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo htmlspecialchars($PAGE_TITLE); ?>">
  <meta name="twitter:description" content="<?php echo htmlspecialchars($PAGE_DESCRIPTION); ?>">
  <meta name="twitter:image" content="<?php echo htmlspecialchars($PAGE_IMAGE); ?>">

  <!-- Favicon -->
  <link rel="icon" type="image/svg+xml" href="assets/images/dholera-logo.svg">
  <link rel="alternate icon" type="image/jpeg" href="assets/images/dholera-logo.jpg">

  <!-- Google Fonts & FontAwesome -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Outfit:wght@500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">

  <!-- Client-side Config & Protection -->
  <script>
    window.DHOLERA_CONFIG = {
      phone: "<?php echo $PHONE_RAW; ?>",
      phoneFormatted: "<?php echo $PHONE_DISPLAY; ?>",
      whatsapp: "<?php echo $WHATSAPP_NUMBER; ?>",
      defaultMsg: "<?php echo addslashes($WHATSAPP_MESSAGE); ?>",
      baseUri: "<?php echo $BASE_URI; ?>",
      currentRoute: "<?php echo addslashes($CURRENT_ROUTE ?? ''); ?>",
      targetSection: "<?php echo addslashes($ACTIVE_SECTION ?? ''); ?>"
    };

    document.addEventListener('contextmenu', function(e) {
      var tag = e.target && e.target.tagName ? e.target.tagName.toUpperCase() : '';
      if (tag !== 'INPUT' && tag !== 'TEXTAREA') { e.preventDefault(); return false; }
    }, true);
    document.addEventListener('keydown', function(e) {
      var k = e.key, c = e.ctrlKey || e.metaKey;
      if (k === 'F12' || (c && (k === 'u' || k === 'U' || k === 's' || k === 'S')) || (c && e.shiftKey && (k === 'I' || k === 'i' || k === 'J' || k === 'j' || k === 'C' || k === 'c'))) {
        e.preventDefault(); e.stopPropagation(); return false;
      }
    }, true);
  </script>

  <?php if (!empty($EXTRA_HEAD)) { echo $EXTRA_HEAD; } ?>
</head>

<body oncontextmenu="return false;">

  <?php if ($SHOW_TOPBAR): ?>
  <!-- ======================================================================
       1. TOP ANNOUNCEMENT BAR
       ====================================================================== -->
  <header class="top-bar">
    <div class="header-container">
      <div class="top-bar-content">
        <!-- Left: High-Impact Trust Statement -->
        <div class="top-bar-left">
          <span class="top-bar-badge">
            <i class="fa-solid fa-building-shield"></i> GOVT. APPROVED SMART CITY
          </span>
          <div class="top-bar-ticker" aria-label="Smart City Highlights">
            <div class="top-bar-ticker-track">
              <span class="ticker-item"><i class="fa-solid fa-flag" style="color: #fbbf24;"></i> India's 1st Greenfield Smart City</span>
              <span class="top-sep">•</span>
              <span class="ticker-item"><i class="fa-solid fa-certificate" style="color: #38bdf8;"></i> 100% Clear Title Registry Plots</span>
              <span class="top-sep">•</span>
              <span class="ticker-item top-highlight-gold"><i class="fa-solid fa-microchip" style="color: #fbbf24;"></i> Near Tata Semiconductor Plant</span>
              <!-- Ticker clone items for smooth infinite loop on mobile devices -->
              <span class="top-sep ticker-clone">•</span>
              <span class="ticker-item ticker-clone"><i class="fa-solid fa-flag" style="color: #fbbf24;"></i> India's 1st Greenfield Smart City</span>
              <span class="top-sep ticker-clone">•</span>
              <span class="ticker-item ticker-clone"><i class="fa-solid fa-certificate" style="color: #38bdf8;"></i> 100% Clear Title Registry Plots</span>
              <span class="top-sep ticker-clone">•</span>
              <span class="ticker-item top-highlight-gold ticker-clone"><i class="fa-solid fa-microchip" style="color: #fbbf24;"></i> Near Tata Semiconductor Plant</span>
            </div>
          </div>
        </div>

        <!-- Right: Direct Contact Actions -->
        <div class="top-bar-contact">
          <a href="<?php echo $PHONE_TEL; ?>" class="top-bar-link top-call-link" title="Direct Phone Call">
            <i class="fa-solid fa-phone-volume"></i> <span><span class="call-prefix">Direct Call: </span><strong><?php echo htmlspecialchars($PHONE_DISPLAY); ?></strong></span>
          </a>
          <a href="<?php echo $WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer" class="top-bar-link top-wa-link" title="Chat on WhatsApp">
            <i class="fa-brands fa-whatsapp"></i> <span>Instant WhatsApp <span class="wa-dot-badge">Live</span></span>
          </a>
        </div>
      </div>
    </div>
  </header>
  <?php endif; ?>

  <!-- ======================================================================
       2. STICKY CLEAN NAVBAR
       ====================================================================== -->
  <nav class="header" id="navbar">
    <div class="header-container">
      <div class="navbar">
        <a href="<?php echo $BASE_URI; ?>" class="logo-wrapper" title="Dholera Smart City Plots" data-section="home">
          <img src="assets/images/dholera-logo.svg" alt="Dholera Special Investment Region Logo" class="brand-logo-img">
        </a>

        <!-- Desktop Navigation Menu -->
        <ul class="nav-menu">
          <li><a href="<?php echo $BASE_URI; ?>" class="nav-link <?php echo ($ACTIVE_NAV === 'home') ? 'active' : ''; ?>" data-section="home">Home</a></li>
          <li><a href="<?php echo $BASE_URI; ?>about" class="nav-link <?php echo ($ACTIVE_NAV === 'about') ? 'active' : ''; ?>" data-section="about">About Dholera</a></li>
          <li><a href="<?php echo $BASE_URI; ?>plots" class="nav-link <?php echo ($ACTIVE_NAV === 'plots') ? 'active' : ''; ?>" data-section="plots">Plots</a></li>
          <li><a href="<?php echo $BASE_URI; ?>why-invest" class="nav-link <?php echo ($ACTIVE_NAV === 'why-invest') ? 'active' : ''; ?>" data-section="why-invest">Why Invest</a></li>
          <li><a href="<?php echo $BASE_URI; ?>infrastructure" class="nav-link <?php echo ($ACTIVE_NAV === 'infrastructure') ? 'active' : ''; ?>" data-section="infrastructure">Infrastructure</a></li>
          <li><a href="<?php echo $BASE_URI; ?>gallery" class="nav-link <?php echo ($ACTIVE_NAV === 'gallery') ? 'active' : ''; ?>" data-section="gallery">Gallery</a></li>
          <li><a href="<?php echo $BASE_URI; ?>faqs" class="nav-link <?php echo ($ACTIVE_NAV === 'faqs') ? 'active' : ''; ?>" data-section="faqs">FAQs</a></li>
        </ul>

        <!-- Direct Action Buttons -->
        <div class="header-cta-group">
          <a href="<?php echo $PHONE_TEL; ?>" class="btn btn-call btn-sm pulse-animation" title="Call Real Estate Expert">
            <i class="fa-solid fa-phone"></i> <span>+91 <?php echo htmlspecialchars($PHONE_RAW); ?></span>
          </a>
          <a href="<?php echo $WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-sm whatsapp-pulse" title="Chat on WhatsApp">
            <i class="fa-brands fa-whatsapp"></i> <span>WhatsApp</span>
          </a>
          <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle Navigation Menu">
            <span></span>
            <span></span>
            <span></span>
          </button>
        </div>
      </div>
    </div>
  </nav>

  <!-- Backdrop Overlay for Mobile Drawer -->
  <div class="mobile-drawer-overlay" id="mobileDrawerOverlay"></div>

  <!-- Mobile Navigation Drawer -->
  <div class="mobile-nav-drawer" id="mobileDrawer">
    <div class="mobile-drawer-header">
      <div class="drawer-brand">
        <img src="assets/images/dholera-logo.svg" alt="Dholera Smart City">
        <span>Dholera SIR</span>
      </div>
      <button class="mobile-drawer-close" id="mobileDrawerClose" aria-label="Close Navigation Menu">
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>

    <div class="mobile-nav-body">
      <div class="mobile-nav-links">
        <a href="<?php echo $BASE_URI; ?>" data-section="home" class="<?php echo ($ACTIVE_NAV === 'home') ? 'active' : ''; ?>">
          <span><i class="fa-solid fa-house link-icon"></i> Home Overview</span>
          <i class="fa-solid fa-chevron-right chevron-icon"></i>
        </a>
        <a href="<?php echo $BASE_URI; ?>about" data-section="about" class="<?php echo ($ACTIVE_NAV === 'about') ? 'active' : ''; ?>">
          <span><i class="fa-solid fa-circle-info link-icon"></i> About Dholera SIR</span>
          <i class="fa-solid fa-chevron-right chevron-icon"></i>
        </a>
        <a href="<?php echo $BASE_URI; ?>plots" data-section="plots" class="<?php echo ($ACTIVE_NAV === 'plots') ? 'active' : ''; ?>">
          <span><i class="fa-solid fa-map-location-dot link-icon"></i> Plots for Sale (Rojka)</span>
          <i class="fa-solid fa-chevron-right chevron-icon"></i>
        </a>
        <a href="<?php echo $BASE_URI; ?>why-invest" data-section="why-invest" class="<?php echo ($ACTIVE_NAV === 'why-invest') ? 'active' : ''; ?>">
          <span><i class="fa-solid fa-chart-line link-icon"></i> Why Invest in Dholera</span>
          <i class="fa-solid fa-chevron-right chevron-icon"></i>
        </a>
        <a href="<?php echo $BASE_URI; ?>infrastructure" data-section="infrastructure" class="<?php echo ($ACTIVE_NAV === 'infrastructure') ? 'active' : ''; ?>">
          <span><i class="fa-solid fa-plane-departure link-icon"></i> Key Infrastructure</span>
          <i class="fa-solid fa-chevron-right chevron-icon"></i>
        </a>
        <a href="<?php echo $BASE_URI; ?>pricing" data-section="pricing" class="<?php echo ($ACTIVE_NAV === 'pricing') ? 'active' : ''; ?>">
          <span><i class="fa-solid fa-calculator link-icon"></i> Plot Price Estimator</span>
          <i class="fa-solid fa-chevron-right chevron-icon"></i>
        </a>
        <a href="<?php echo $BASE_URI; ?>gallery" data-section="gallery" class="<?php echo ($ACTIVE_NAV === 'gallery') ? 'active' : ''; ?>">
          <span><i class="fa-solid fa-images link-icon"></i> Project Gallery</span>
          <i class="fa-solid fa-chevron-right chevron-icon"></i>
        </a>
        <a href="<?php echo $BASE_URI; ?>faqs" data-section="faqs" class="<?php echo ($ACTIVE_NAV === 'faqs') ? 'active' : ''; ?>">
          <span><i class="fa-solid fa-circle-question link-icon"></i> Frequently Asked Questions</span>
          <i class="fa-solid fa-chevron-right chevron-icon"></i>
        </a>
      </div>

      <!-- Infrastructure Pages Link Group -->
      <div class="mobile-drawer-section-title">Dedicated Infrastructure Hub</div>
      <div class="mobile-nav-links">
        <a href="<?php echo $BASE_URI; ?>dholera-international-airport">
          <span><i class="fa-solid fa-plane link-icon" style="color: #b5802a;"></i> International Airport (DIACL)</span>
          <i class="fa-solid fa-chevron-right chevron-icon"></i>
        </a>
        <a href="<?php echo $BASE_URI; ?>dholera-expressway">
          <span><i class="fa-solid fa-road link-icon" style="color: #2563eb;"></i> 6-Lane Expressway (NH 751)</span>
          <i class="fa-solid fa-chevron-right chevron-icon"></i>
        </a>
        <a href="<?php echo $BASE_URI; ?>dholera-freight-corridor">
          <span><i class="fa-solid fa-train link-icon" style="color: #059669;"></i> Freight Corridor (Western DFC)</span>
          <i class="fa-solid fa-chevron-right chevron-icon"></i>
        </a>
        <a href="<?php echo $BASE_URI; ?>dholera-seaport">
          <span><i class="fa-solid fa-ship link-icon" style="color: #0284c7;"></i> Proposed Deep-Water Sea Port</span>
          <i class="fa-solid fa-chevron-right chevron-icon"></i>
        </a>
      </div>
    </div>

    <!-- Mobile Drawer Footer CTA Actions -->
    <div class="mobile-drawer-footer">
      <a href="<?php echo $PHONE_TEL; ?>" class="btn btn-call btn-sm" style="width: 100%;">
        <i class="fa-solid fa-phone-volume"></i> <span>Direct Call: <?php echo htmlspecialchars($PHONE_RAW); ?></span>
      </a>
      <a href="<?php echo $WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-sm" style="width: 100%;">
        <i class="fa-brands fa-whatsapp"></i> <span>Instant WhatsApp Chat</span>
      </a>
    </div>
  </div>
