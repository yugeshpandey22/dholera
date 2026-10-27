<?php
require_once __DIR__ . '/config.php';

// Clean URL Route Handler (e.g. /smartcity/about, /smartcity/plots, /smartcity/why-invest)
$routeParam = trim($_GET['route'] ?? '', '/');
if (empty($routeParam)) {
  $uriPath = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
  $uriPath = preg_replace('#^/smartcity/?#i', '', $uriPath);
  $routeParam = trim($uriPath, '/');
}

$ROUTED_SECTIONS = [
  'about' => [
    'section' => 'about',
    'title' => 'About Dholera SIR | Dholera Greenfield Smart City Master Plan & Development',
    'desc' => 'Discover Dholera Special Investment Region (SIR) - India’s 1st platinum-rated greenfield smart city spanning 920 sq. km. Explore Halcrow master planning, activation zones TP1 & TP2, and clear-title plots.',
    'keywords' => 'About Dholera SIR, Dholera Smart City master plan, Dholera SIR development, Dholera activation zone TP1 TP2, Halcrow Dholera master plan'
  ],
  'plots' => [
    'section' => 'plots',
    'title' => 'Dholera Smart City Plots for Sale | Residential & Industrial Land in SIR',
    'desc' => 'Explore verified residential and industrial plots in Dholera SIR. Clear title, NA approval, and ready for immediate sale deed registry with zero brokerage.',
    'keywords' => 'Dholera Smart City plots, Dholera plots for sale, Dholera land for sale, Dholera residential plots, Dholera industrial plots'
  ],
  'residential-plots' => [
    'section' => 'plots',
    'title' => 'Dholera Residential Plots for Sale | Gated Townships in TP1 & TP2 Zones',
    'desc' => 'Buy title-clear residential plots in Dholera SIR. Sizes from 150 to 1,000+ sq. yards in premium gated townships with complete underground utilities.',
    'keywords' => 'Dholera residential plots, residential plots in Dholera SIR, buy villa plots Dholera, TP1 residential plots, TP2 residential plots'
  ],
  'swastik' => [
    'section' => 'plots',
    'title' => 'Mayur Swastik II Residential Plots | Kamiyala Road, Dholera SIR',
    'desc' => 'Explore Mayur Swastik II residential plots on Kamiyala Road, Dholera. 433 NA approved gated township plots (124 to 404 sq. yds) with 3-year assured returns.',
    'keywords' => 'Mayur Swastik II, Mayur Swastik 2 Dholera, Kamiyala residential plots Dholera, Dholera residential plots'
  ],
  'industrial-plots' => [
    'section' => 'plots',
    'title' => 'Dholera Industrial Land & Plots | Near Tata Semiconductor Fab Ecosystem',
    'desc' => 'Invest in industrial land in Dholera SIR. Heavy power grid, DFC railway connectivity, and heavy logistics access near Tata Electronics Semiconductor Fab.',
    'keywords' => 'Dholera industrial plots, industrial land Dholera SIR, Tata semiconductor fab plots, warehousing land Dholera'
  ],
  'why-invest' => [
    'section' => 'why-invest',
    'title' => 'Why Invest in Dholera SIR? | High-ROI Property & Land Investment Corridor',
    'desc' => 'Discover why institutional funds and smart investors are acquiring Dholera SIR plots. 25-35% YoY capital appreciation, Tata Mega Fab anchor, and triple government backing.',
    'keywords' => 'Why invest in Dholera, Dholera property investment, Dholera land investment ROI, Dholera SIR investment benefits'
  ],
  'infrastructure' => [
    'section' => 'infrastructure',
    'title' => 'Dholera SIR Infrastructure Updates | Airport, Expressway, Metro & ABCD Building',
    'desc' => 'Latest progress on Dholera International Airport (2026), Ahmedabad 6-Lane Expressway (2025), High-Speed Metro Rail, and ABCD Command & Control Center.',
    'keywords' => 'Dholera infrastructure, Dholera international airport progress, Ahmedabad Dholera expressway opening date, Dholera metro rail'
  ],
  'pricing' => [
    'section' => 'pricing',
    'title' => 'Dholera Plots Price & ROI Estimator | Current Rates per Sq. Yard & Land Valuation',
    'desc' => 'Calculate your estimated plot cost and projected 3-5 year ROI in Dholera SIR. Transparent verified plot pricing and capital appreciation projections with zero brokerage.',
    'keywords' => 'Dholera plots price, Dholera land rate per sq yard, Dholera plot price calculator, Dholera property cost'
  ],
  'gallery' => [
    'section' => 'gallery',
    'title' => 'Dholera Smart City Ground Gallery | Actual On-Site Photos & Roads',
    'desc' => 'View verified on-ground photos of Dholera SIR development: ABCD Building, underground utility canals, multi-lane roads, and live plots.',
    'keywords' => 'Dholera photos, Dholera site photos, Dholera ground progress images, ABCD building Dholera'
  ],
  'faqs' => [
    'section' => 'faqs',
    'title' => 'Dholera Smart City Plots FAQs | Prices, Registry, NA Approvals & Site Visit Answers',
    'desc' => 'Frequently asked questions about buying Dholera Smart City plots, NA approvals, title verification, registry process, and free guided site visits.',
    'keywords' => 'Dholera plots FAQ, is Dholera safe to invest, Dholera NA clear title, how to visit Dholera SIR'
  ],
  'contact' => [
    'section' => 'contact',
    'title' => 'Contact Dholera SIR Investment Desk | Free Guided Site Visit & Brochure',
    'desc' => 'Connect directly with our senior Dholera SIR land advisory desk. Call +91 ' . $PHONE_RAW . ' or WhatsApp for instant brochures, price sheets, and free guided tours.',
    'keywords' => 'Contact Dholera advisory, Dholera site visit booking, Dholera property dealer phone number'
  ],
];

$CURRENT_ROUTE = $routeParam;
$ACTIVE_SECTION = $ROUTED_SECTIONS[$routeParam]['section'] ?? '';

if (!empty($routeParam) && isset($ROUTED_SECTIONS[$routeParam])) {
  $PAGE_TITLE = $ROUTED_SECTIONS[$routeParam]['title'];
  $PAGE_DESC = $ROUTED_SECTIONS[$routeParam]['desc'];
  $PAGE_KEYWORDS = $ROUTED_SECTIONS[$routeParam]['keywords'] . ', ' . $SITE_NAME;
  $PAGE_CANONICAL = rtrim($CANONICAL_URL, '/') . '/' . $routeParam;
} else {
  $PAGE_TITLE = "Dholera Smart City Plots | Residential & Industrial Land in Dholera SIR";
  $PAGE_DESC = "Explore prime Dholera Smart City plots for sale. Verified Dholera residential plots & industrial plots in Dholera SIR Gujarat. Check latest Dholera plots price, high-ROI property investment & land for sale. Call/WhatsApp: " . $PHONE_DISPLAY . ".";
  $PAGE_KEYWORDS = "Dholera Smart City plots, Dholera residential plots, Dholera industrial plots, Plots for sale in Dholera, Dholera SIR plots, Dholera property investment, Buy land in Dholera, Dholera plots price, Dholera land investment, Dholera property for sale, Dholera SIR smart city, Dholera international airport plots, Dholera expressway plots";
  $PAGE_CANONICAL = $CANONICAL_URL;
}
ob_start();
?>
<!-- Structured Data / Schema.org (JSON-LD) for High Ranking & Rich Snippets -->
<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [{
        "@type": "RealEstateAgent",
        "@id": "<?php echo $CANONICAL_URL; ?>#organization",
        "name": "Dholera Smart City Plots Advisory",
        "url": "<?php echo $CANONICAL_URL; ?>",
        "logo": "<?php echo $CANONICAL_URL; ?>assets/images/dholera-logo.jpg",
        "image": "<?php echo $CANONICAL_URL; ?>assets/images/dholera-hero.jpg",
        "description": "Leading real estate advisory specializing in Dholera Smart City plots, Dholera residential plots, and industrial land investments in Dholera SIR, Gujarat.",
        "telephone": "<?php echo $PHONE_RAW; ?>",
        "priceRange": "₹₹",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "TP-1 & TP-2 Activation Area, Dholera SIR",
          "addressLocality": "Dholera",
          "addressRegion": "Gujarat",
          "postalCode": "382455",
          "addressCountry": "IN"
        },
        "geo": {
          "@type": "GeoCoordinates",
          "latitude": "22.2475",
          "longitude": "72.1932"
        },
        "openingHoursSpecification": {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
          "opens": "08:00",
          "closes": "21:00"
        }
      },
      {
        "@type": "ItemList",
        "name": "Featured Dholera SIR Land & Plotted Projects",
        "description": "Government approved NA clear-title residential and industrial plotted communities in Dholera SIR.",
        "numberOfItems": 3,
        "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "Mayur Signature 2 Residential Plots, Rojka",
            "url": "<?php echo $CANONICAL_URL; ?>residential-plots",
            "image": "<?php echo $CANONICAL_URL; ?>assets/images/dholera-residential.jpg"
          },
          {
            "@type": "ListItem",
            "position": 2,
            "name": "Mayur Swastik II Residential Plots, Kamiyala",
            "url": "<?php echo $CANONICAL_URL; ?>swastik",
            "image": "<?php echo $CANONICAL_URL; ?>assets/images/dholera-hero-fresh.jpg"
          },
          {
            "@type": "ListItem",
            "position": 3,
            "name": "Mayur Business Park Industrial Land",
            "url": "<?php echo $CANONICAL_URL; ?>industrial-plots",
            "image": "<?php echo $CANONICAL_URL; ?>assets/images/dholera-industrial.jpg"
          }
        ]
      },
      {
        "@type": "FAQPage",
        "mainEntity": [{
            "@type": "Question",
            "name": "What is Dholera SIR and why is it called India's first greenfield smart city?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Dholera Special Investment Region (SIR) is India's largest planned greenfield smart city spanning 920 sq km, backed by the Government of India and the Government of Gujarat. It features underground sensor-based utilities, 22.5 sq km activation zone, expressway, and an international airport."
            }
          },
          {
            "@type": "Question",
            "name": "What are the details, sizes, and prices of residential plots in Rojka, Dholera?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Our featured residential plotted community in Rojka, Dholera Smart City features 638 plots ranging from 121.20 to 724.21 sq. yds with a base rate of ₹12,450 per sq. yard, development charges of ₹1,003/yd, documentation ₹15,400, registry 5.9% male / 4.9% female, with 100% legal NA clear titles and immediate sale deed registry."
            }
          },
          {
            "@type": "Question",
            "name": "What is the current price of plots in Dholera Smart City?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Residential plot prices in Dholera Smart City benchmark at ₹12,450 per sq. yard with clear title legal registry, depending on location, town planning (TP) scheme, proximity to the expressway, and road width."
            }
          },
          {
            "@type": "Question",
            "name": "Are plots for sale in Dholera legal and title clear?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Yes, our listed Dholera residential and industrial plots feature 100% clear titles, government NA (Non-Agricultural) clearance, NOC approvals, and immediate registry with complete legal documentation."
            }
          },
          {
            "@type": "Question",
            "name": "Is Dholera a good investment for property and land?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Yes, Dholera property investment offers exponential capital appreciation driven by mega infrastructure developments such as the Tata Semiconductor Fab, Dholera International Airport, and Ahmedabad-Dholera Expressway."
            }
          },
          {
            "@type": "Question",
            "name": "How can I book a site visit to Dholera SIR?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "You can schedule a free guided site visit directly by calling +91 <?php echo $PHONE_RAW; ?> or sending a WhatsApp message to +91 <?php echo $PHONE_RAW; ?>."
            }
          }
        ]
      }
    ]
  }
</script>
<?php
$EXTRA_HEAD = ob_get_clean();
$PAGE_DESCRIPTION = $PAGE_DESC;
$ACTIVE_NAV = $ACTIVE_SECTION ?: 'home';

require_once __DIR__ . '/includes/header.php';
?>

<main>
  <!-- ======================================================================
         3. HERO SECTION - ULTRA HIGH IMPACT WITH DIRECT CONNECT (NO FORMS)
         ====================================================================== -->
  <section class="hero-section" id="home">
    <div class="container">
      <div class="hero-grid">
        <!-- Hero Left Content -->
        <div class="hero-content">
          <div class="hero-badge">
            <i class="fa-solid fa-city"></i> Invest Today In Tomorrow's Smart City
          </div>
          <h1 class="hero-title">
            <span class="highlight-red">Dholera</span> Smart City Plots <br>
            <span class="highlight-gold">Residential &amp; Industrial</span> Land for Sale
          </h1>
          <p class="hero-subtitle">
            Secure high-ROI <strong>Dholera SIR plots</strong> in India's first platinum-rated greenfield smart city. 100% legal, clear title, NA-approved plots with world-class expressway, airport & metro connectivity.
          </p>

          <!-- Feature Badges -->
          <div class="hero-features-row">
            <div class="hero-feat-item">
              <div class="hero-feat-icon"><i class="fa-solid fa-landmark"></i></div>
              <div class="hero-feat-text">Govt. Planned Greenfield City</div>
            </div>
            <div class="hero-feat-item">
              <div class="hero-feat-icon"><i class="fa-solid fa-plane-departure"></i></div>
              <div class="hero-feat-text">International Airport Zone</div>
            </div>
            <div class="hero-feat-item">
              <div class="hero-feat-icon"><i class="fa-solid fa-microchip"></i></div>
              <div class="hero-feat-text">Tata Semiconductor Hub</div>
            </div>
            <div class="hero-feat-item">
              <div class="hero-feat-icon"><i class="fa-solid fa-road"></i></div>
              <div class="hero-feat-text">6-Lane Expressway & Metro</div>
            </div>
            <div class="hero-feat-item">
              <div class="hero-feat-icon"><i class="fa-solid fa-file-shield"></i></div>
              <div class="hero-feat-text">100% Clear Title & NA Plots</div>
            </div>
            <div class="hero-feat-item">
              <div class="hero-feat-icon"><i class="fa-solid fa-chart-line"></i></div>
              <div class="hero-feat-text">High Capital Appreciation</div>
            </div>
          </div>

          <!-- Hero Action CTAs -->
          <div class="hero-cta-group">
            <a href="<?php echo $WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg whatsapp-pulse">
              <i class="fa-brands fa-whatsapp fa-lg"></i> <span>Chat on WhatsApp</span>
            </a>
            <a href="<?php echo $PHONE_TEL; ?>" class="btn btn-call btn-lg pulse-animation">
              <i class="fa-solid fa-phone"></i> <span>Direct Call: <?php echo htmlspecialchars($PHONE_DISPLAY); ?></span>
            </a>
            <a href="#plots" class="btn btn-gold btn-lg">
              <i class="fa-solid fa-map-location-dot"></i> <span>Explore Verified Plots</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======================================================================
         4. QUICK CATEGORY BOXES (RESIDENTIAL & INDUSTRIAL)
         ====================================================================== -->
  <section class="quick-cards-section">
    <div class="container">
      <div class="quick-cards-grid">
        <!-- Mayur Signature 2 Residential Card -->
        <a href="#residential-plots" class="quick-card">
          <div class="qc-left">
            <div class="qc-icon-box">
              <i class="fa-solid fa-house-chimney"></i>
            </div>
            <div>
              <h3 class="qc-title"><?php echo htmlspecialchars($PROJECT_NAME); ?> <span class="qc-badge">Residential</span></h3>
              <p class="qc-subtitle">Residential Plots &bull; Rojka (638 NA Approved)</p>
            </div>
          </div>
          <div class="qc-action-arrow">
            <i class="fa-solid fa-arrow-right"></i>
          </div>
        </a>

        <!-- Mayur Swastik II Residential Card -->
        <a href="#residential-swastik" class="quick-card">
          <div class="qc-left">
            <div class="qc-icon-box">
              <i class="fa-solid fa-tree-city"></i>
            </div>
            <div>
              <h3 class="qc-title"><?php echo htmlspecialchars($RES2_PROJECT_NAME); ?> <span class="qc-badge">Residential</span></h3>
              <p class="qc-subtitle">Residential Plots &bull; Kamiyala Road (433 NA Approved)</p>
            </div>
          </div>
          <div class="qc-action-arrow">
            <i class="fa-solid fa-arrow-right"></i>
          </div>
        </a>

        <!-- Mayur Business Park Industrial Card -->
        <a href="#industrial-plots" class="quick-card industrial">
          <div class="qc-left">
            <div class="qc-icon-box">
              <i class="fa-solid fa-industry"></i>
            </div>
            <div>
              <h3 class="qc-title"><?php echo htmlspecialchars($IND_PROJECT_NAME); ?> <span class="qc-badge">Industrial</span></h3>
              <p class="qc-subtitle">Industrial Plots &bull; Haripura Highway (227 NA Approved)</p>
            </div>
          </div>
          <div class="qc-action-arrow">
            <i class="fa-solid fa-arrow-right"></i>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- ======================================================================
         5. KEY HIGHLIGHTS STRIP
         ====================================================================== -->
  <section class="highlights-strip">
    <div class="container">
      <div class="highlights-row">
        <div class="highlight-box">
          <div class="hl-icon"><i class="fa-solid fa-plane-departure"></i></div>
          <div>
            <div class="hl-text-title">International Airport</div>
            <div class="hl-text-sub">Cargo & Passenger Hub</div>
          </div>
        </div>

        <div class="highlight-box">
          <div class="hl-icon"><i class="fa-solid fa-road"></i></div>
          <div>
            <div class="hl-text-title">Expressway & Metro</div>
            <div class="hl-text-sub">Ahmedabad in 45 Mins</div>
          </div>
        </div>

        <div class="highlight-box">
          <div class="hl-icon"><i class="fa-solid fa-train"></i></div>
          <div>
            <div class="hl-text-title">Dedicated Freight Corridor</div>
            <div class="hl-text-sub">Fast Multi-Modal Logistics</div>
          </div>
        </div>

        <div class="highlight-box">
          <div class="hl-icon"><i class="fa-solid fa-ship"></i></div>
          <div>
            <div class="hl-text-title">Proposed Sea Port</div>
            <div class="hl-text-sub">Global Trade Gateway</div>
          </div>
        </div>

        <div class="highlight-box">
          <div class="hl-icon"><i class="fa-solid fa-city"></i></div>
          <div>
            <div class="hl-text-title">Activation Zone TP1 & TP2</div>
            <div class="hl-text-sub">Ready Plug-and-Play Infra</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======================================================================
         6. ABOUT DHOLERA SIR SECTION
         ====================================================================== -->
  <section class="section-padding about-section" id="about">
    <div class="container">
      <div class="about-grid">
        <!-- Image Box with Badge -->
        <div class="about-img-box">
          <img src="assets/images/dholera-hero.jpg" alt="Dholera SIR Greenfield Smart City Master Plan Overview" loading="lazy">
          <div class="about-img-badge">
            <div class="aib-title">India's First Greenfield Smart City</div>
            <div class="aib-desc">Total Area: 920 Sq. Km | Platinum Rated by IGBC</div>
          </div>
        </div>

        <!-- Content Box -->
        <div class="about-content-box">
          <span class="section-tag">About Dholera SIR</span>
          <h2 class="section-title">The Future of Urban Living &amp; High-Yield Property Investment</h2>
          <p class="about-text">
            <strong>Dholera Special Investment Region (SIR)</strong> is India’s flagship greenfield smart city project being developed under the Delhi-Mumbai Industrial Corridor (DMIC). Spanning over 920 sq. km (larger than Singapore), Dholera is engineered with subterranean ICT-enabled utilities, automated waste management, recycled water networks, and smart power grids.
          </p>
          <p class="about-text">
            Whether you are looking to <strong>buy land in Dholera</strong> for family living or looking for an exponential <strong>Dholera property investment</strong>, this mega city promises unparalleled return on investment backed by the Central and Gujarat Governments.
          </p>

          <!-- Stats Grid -->
          <div class="about-stats-grid">
            <div class="about-stat-card">
              <div class="asc-num">920+</div>
              <div class="asc-label">Sq. Km Total Area</div>
            </div>
            <div class="about-stat-card">
              <div class="asc-num">₹ 91,000 Cr+</div>
              <div class="asc-label">Tata Semiconductor Fab</div>
            </div>
            <div class="about-stat-card">
              <div class="asc-num">22.5</div>
              <div class="asc-label">Sq. Km Activation Zone</div>
            </div>
            <div class="about-stat-card">
              <div class="asc-num">100%</div>
              <div class="asc-label">Underground Utilities</div>
            </div>
          </div>

          <div class="about-cta-row">
            <a href="<?php echo $PHONE_TEL; ?>" class="btn btn-call">
              <i class="fa-solid fa-phone"></i> Call for Site Visit
            </a>
            <a href="<?php echo $WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp">
              <i class="fa-brands fa-whatsapp"></i> Download Master Plan (PDF)
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======================================================================
         7. OUR PLOT OPTIONS (RESIDENTIAL & INDUSTRIAL PLOTS)
         ====================================================================== -->
  <section class="section-padding plots-section" id="plots">
    <div class="container">
      <div class="section-header">
        <span class="section-tag"><i class="fa-solid fa-layer-group"></i> Verified Land Opportunities</span>
        <h2 class="section-title">Plots for Sale in Dholera: Residential &amp; Industrial Land</h2>
        <p class="section-desc">
          Explore verified <strong>Dholera residential plots</strong>, prime gated communities, and <strong>Dholera industrial plots</strong> for sale with 100% legal NA approvals and immediate registry.
        </p>
      </div>

      <div class="ref-plots-grid">
        <!-- Residential Plot Card: Mayur Signature 2 Spotlight -->
        <article class="ref-plot-card is-featured-card" id="residential-plots">
          <div class="ref-plot-img-box">
            <img src="assets/images/dholera-residential.jpg" alt="Mayur Signature 2 Residential Plots in Rojka Dholera Smart City" class="ref-plot-img" loading="lazy">
            <span class="ref-floating-flag"><i class="fa-solid fa-house-chimney"></i> Residential Project</span>
            <span class="ref-floating-status"><span class="status-live-dot"></span> Booking Open</span>
          </div>

          <div class="ref-plot-content">
            <span class="ref-project-pill"><i class="fa-solid fa-star"></i> Featured Residential Project</span>
            <h3 class="ref-plot-title"><?php echo htmlspecialchars($PROJECT_NAME); ?></h3>
            <div class="ref-project-loc">
              <i class="fa-solid fa-location-dot"></i>
              <span><?php echo htmlspecialchars($PROJECT_LOCATION); ?> &bull; Gated Residential Zone</span>
            </div>

            <ul class="ref-plot-checklist">
              <li>
                <span class="ref-dot-check"><i class="fa-solid fa-circle-check"></i></span>
                <span>Project Type: <strong>Residential Plots (Gated Community)</strong></span>
              </li>
              <li>
                <span class="ref-dot-check"><i class="fa-solid fa-circle-check"></i></span>
                <span>Total Inventory: <strong><?php echo htmlspecialchars($PROJECT_TOTAL_PLOTS); ?></strong> (<strong><?php echo htmlspecialchars($PROJECT_SIZES); ?></strong>)</span>
              </li>
              <li>
                <span class="ref-dot-check"><i class="fa-solid fa-circle-check"></i></span>
                <span>Dev. Charges: <strong><?php echo htmlspecialchars($PROJECT_DEV_CHARGES); ?></strong></span>
              </li>
              <li>
                <span class="ref-dot-check"><i class="fa-solid fa-circle-check"></i></span>
                <span>Registry: <strong>Male <?php echo htmlspecialchars($PROJECT_REGISTRY_MALE); ?> | Female <?php echo htmlspecialchars($PROJECT_REGISTRY_FEMALE); ?></strong> &bull; Docs: <strong><?php echo htmlspecialchars($PROJECT_DOC_CHARGES); ?></strong></span>
              </li>
            </ul>

            <!-- Card Bottom Group (Aligned to Card Bottom) -->
            <div class="ref-plot-bottom">
              <!-- 3 Years Assured Return Box -->
              <div class="ref-assured-compact">
                <div class="assured-compact-row">
                  <span class="assured-tag"><i class="fa-solid fa-shield-halved"></i> 3 Years Assured Return (1%)*:</span>
                  <strong class="assured-payout">₹ 14,707 / month</strong>
                </div>
                <div class="assured-compact-sub">
                  For Example: Total Return: <strong>₹ 5,29,470</strong> (3-Year Plan, 1% TDS) (on 124.35 Sq. Yds plot)
                </div>
              </div>

              <div class="ref-plot-price-strip">
                <span class="ref-price-val">Plot Rate: <strong><?php echo htmlspecialchars($PROJECT_BASE_RATE_TXT); ?>*</strong></span>
                <span class="ref-size-tag">121 - 724 Sq. Yds</span>
              </div>

              <a href="<?php echo $WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer" class="ref-btn-gold">
                <span>Inquire for <?php echo htmlspecialchars($PROJECT_NAME); ?></span>
                <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </article>

        <!-- Residential Plot Card 2: Mayur Swastik II Spotlight -->
        <article class="ref-plot-card is-featured-card" id="residential-swastik">
          <div class="ref-plot-img-box">
            <img src="assets/images/dholera-hero-fresh.jpg" alt="Mayur Swastik II Residential Plots in Kamiyala Dholera Smart City" class="ref-plot-img" loading="lazy">
            <span class="ref-floating-flag"><i class="fa-solid fa-house-chimney"></i> Residential Project</span>
            <span class="ref-floating-status"><span class="status-live-dot"></span> Booking Open</span>
          </div>

          <div class="ref-plot-content">
            <span class="ref-project-pill"><i class="fa-solid fa-star"></i> Featured Residential Project</span>
            <h3 class="ref-plot-title"><?php echo htmlspecialchars($RES2_PROJECT_NAME); ?></h3>
            <div class="ref-project-loc">
              <i class="fa-solid fa-location-dot"></i>
              <span><?php echo htmlspecialchars($RES2_PROJECT_LOCATION); ?></span>
            </div>

            <ul class="ref-plot-checklist">
              <li>
                <span class="ref-dot-check"><i class="fa-solid fa-circle-check"></i></span>
                <span>Project Type: <strong>Residential Plots (Gated Community)</strong></span>
              </li>
              <li>
                <span class="ref-dot-check"><i class="fa-solid fa-circle-check"></i></span>
                <span>Total Inventory: <strong><?php echo htmlspecialchars($RES2_PROJECT_TOTAL); ?></strong> (<strong><?php echo htmlspecialchars($RES2_PROJECT_SIZES); ?></strong>)</span>
              </li>
              <li>
                <span class="ref-dot-check"><i class="fa-solid fa-circle-check"></i></span>
                <span>Dev. Charges: <strong><?php echo htmlspecialchars($RES2_PROJECT_DEV_CHARGES); ?></strong></span>
              </li>
              <li>
                <span class="ref-dot-check"><i class="fa-solid fa-circle-check"></i></span>
                <span>Registry: <strong>Male <?php echo htmlspecialchars($RES2_PROJECT_REGISTRY_MALE); ?> | Female <?php echo htmlspecialchars($RES2_PROJECT_REGISTRY_FEMALE); ?></strong> &bull; Docs: <strong><?php echo htmlspecialchars($RES2_PROJECT_DOC_CHARGES); ?></strong></span>
              </li>
            </ul>

            <!-- Card Bottom Group (Aligned to Card Bottom) -->
            <div class="ref-plot-bottom">
              <!-- 3 Years Assured Return Box -->
              <div class="ref-assured-compact">
                <div class="assured-compact-row">
                  <span class="assured-tag"><i class="fa-solid fa-shield-halved"></i> 3 Years Assured Return (1%)*:</span>
                  <strong class="assured-payout"><?php echo htmlspecialchars($RES2_PROJECT_ASSURED_MONTHLY); ?></strong>
                </div>
                <div class="assured-compact-sub">
                  For Example: Total Return: <strong><?php echo htmlspecialchars($RES2_PROJECT_ASSURED_TOTAL); ?></strong> (on <?php echo htmlspecialchars($RES2_PROJECT_SAMPLE_SIZE); ?> plot)
                </div>
              </div>

              <div class="ref-plot-price-strip">
                <span class="ref-price-val">Plot Rate: <strong><?php echo htmlspecialchars($RES2_PROJECT_BASE_RATE_TXT); ?>*</strong></span>
                <span class="ref-size-tag">124 - 404 Sq. Yds</span>
              </div>

              <?php
              $WHATSAPP_SWASTIK = "https://wa.me/" . $WHATSAPP_NUMBER . "?text=" . urlencode("Hi, I am interested in Mayur Swastik II (Residential Plots in Kamiyala, Dholera). Please share brochure, layout plan, and latest price details.");
              ?>
              <a href="<?php echo $WHATSAPP_SWASTIK; ?>" target="_blank" rel="noopener noreferrer" class="ref-btn-gold">
                <span>Inquire for <?php echo htmlspecialchars($RES2_PROJECT_NAME); ?></span>
                <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </article>

        <!-- Industrial Plot Card: Mayur Business Park Spotlight -->
        <article class="ref-plot-card is-featured-card" id="industrial-plots">
          <div class="ref-plot-img-box">
            <img src="assets/images/dholera-industrial.jpg" alt="Mayur Business Park Industrial Open Plots on Fedra-Dhandhuka Highway Dholera" class="ref-plot-img" loading="lazy">
            <span class="ref-floating-flag"><i class="fa-solid fa-industry"></i> Industrial Featured</span>
            <span class="ref-floating-status"><span class="status-live-dot"></span> Booking Open</span>
          </div>

          <div class="ref-plot-content">
            <span class="ref-project-pill pill-industrial"><i class="fa-solid fa-star"></i> Featured Industrial Project</span>
            <h3 class="ref-plot-title"><?php echo htmlspecialchars($IND_PROJECT_NAME); ?></h3>
            <div class="ref-project-loc">
              <i class="fa-solid fa-location-dot"></i>
              <span>Haripura, Fedra-Dhandhuka State Highway, Dholera Smart City</span>
            </div>

            <ul class="ref-plot-checklist">
              <li>
                <span class="ref-dot-check"><i class="fa-solid fa-circle-check"></i></span>
                <span>Project Type: <strong><?php echo htmlspecialchars($IND_PROJECT_TYPE); ?></strong></span>
              </li>
              <li>
                <span class="ref-dot-check"><i class="fa-solid fa-circle-check"></i></span>
                <span>Total Inventory: <strong><?php echo htmlspecialchars($IND_PROJECT_TOTAL); ?></strong> (<strong><?php echo htmlspecialchars($IND_PROJECT_SIZES); ?></strong>)</span>
              </li>
              <li>
                <span class="ref-dot-check"><i class="fa-solid fa-circle-check"></i></span>
                <span>Dev. Charges: <strong>₹ 1,003 / sq. yd (850 + 18% GST)</strong></span>
              </li>
              <li>
                <span class="ref-dot-check"><i class="fa-solid fa-circle-check"></i></span>
                <span>Registry: <strong>Male 5.9% | Female 4.9% &bull; Docs: ₹ 15,400 (Fixed)</strong></span>
              </li>
            </ul>

            <!-- Card Bottom Group (Aligned to Card Bottom) -->
            <div class="ref-plot-bottom">
              <!-- 3 Years Assured Return Box for Mayur Business Park -->
              <div class="ref-assured-compact">
                <div class="assured-compact-row">
                  <span class="assured-tag"><i class="fa-solid fa-shield-halved"></i> 3 Years Assured Return (1%)*:</span>
                  <strong class="assured-payout"><?php echo htmlspecialchars($IND_PROJECT_ASSURED_MONTHLY); ?></strong>
                </div>
                <div class="assured-compact-sub">
                  For Example: Total Return: <strong><?php echo htmlspecialchars($IND_PROJECT_ASSURED_TOTAL); ?></strong> (on <?php echo htmlspecialchars($IND_PROJECT_SAMPLE_SIZE); ?> plot)
                </div>
              </div>

              <div class="ref-plot-price-strip">
                <span class="ref-price-val">Plot Rate: <strong><?php echo htmlspecialchars($IND_PROJECT_RATE_TXT); ?>*</strong></span>
                <span class="ref-size-tag">327 - 5,912 Sq. Yds</span>
              </div>

              <?php
              $WHATSAPP_MAYUR_BP = "https://wa.me/" . $WHATSAPP_NUMBER . "?text=" . urlencode("Hi, I am interested in Mayur Business Park (Industrial Plots in Haripura, Dholera). Please share brochure, layout plan, and latest price details.");
              ?>
              <a href="<?php echo $WHATSAPP_MAYUR_BP; ?>" target="_blank" rel="noopener noreferrer" class="ref-btn-gold">
                <span>Inquire for <?php echo htmlspecialchars($IND_PROJECT_NAME); ?></span>
                <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ======================================================================
         8. WHY INVEST IN DHOLERA SMART CITY?
         ====================================================================== -->
  <section class="section-padding why-invest-section" id="why-invest">
    <div class="container">
      <div class="section-header text-center">
        <span class="section-tag"><i class="fa-solid fa-gem"></i> Dholera Property Investment</span>
        <h2 class="section-title">Why Dholera Land Investment & Property Offers High ROI</h2>
        <p class="section-desc">
          India's most lucrative property corridor backed by the Central &amp; Gujarat Governments. Discover why smart investors looking to <strong>buy land in Dholera</strong> choose <strong>Dholera SIR plots</strong> for guaranteed 25-35% annual capital appreciation.
        </p>
      </div>

      <!-- 4 Top Impact Metric Stat Cards -->
      <div class="why-stats-bar">
        <div class="why-stat-box">
          <span class="stat-number">920 <small>Sq. Km</small></span>
          <span class="stat-label">Planned Smart City Area</span>
          <span class="stat-sublabel">2x Mumbai &bull; Larger than Singapore</span>
        </div>
        <div class="why-stat-box highlight-gold">
          <span class="stat-number">₹91,000 <small>Cr+</small></span>
          <span class="stat-label">Tata Semiconductor Mega Fab</span>
          <span class="stat-sublabel">India’s 1st Chip Ecosystem &bull; 800K Jobs</span>
        </div>
        <div class="why-stat-box highlight-green">
          <span class="stat-number">25 - 35%</span>
          <span class="stat-label">Historical YoY Land ROI</span>
          <span class="stat-sublabel">Consistent High Capital Growth</span>
        </div>
        <div class="why-stat-box">
          <span class="stat-number">45 <small>Mins</small></span>
          <span class="stat-label">Ahmedabad 6-Lane Expressway</span>
          <span class="stat-sublabel">Signal-Free High-Speed Transit (2025)</span>
        </div>
      </div>

      <!-- 6 Core Investment Driver Cards -->
      <div class="why-grid">
        <!-- Card 1 -->
        <div class="why-card">
          <div class="why-card-header">
            <div class="why-icon-box icon-red">
              <i class="fa-solid fa-map-location-dot"></i>
            </div>
            <span class="why-stat-pill pill-red">Global Blueprint</span>
          </div>
          <h3 class="why-title">World-Class Greenfield Master Plan</h3>
          <p class="why-desc">
            Master-planned by British engineering giant <strong>Halcrow &amp; Cisco</strong>, Dholera is India's 1st platinum-rated industrial smart city spanning <strong>920 sq. km</strong> with visionary urban zoning.
          </p>
          <ul class="why-points-list">
            <li>
              <i class="fa-solid fa-circle-check"></i>
              <span><strong>Strict Town Planning (TP1 &amp; TP2):</strong> Residential sectors are cleanly segregated from heavy industrial zones.</span>
            </li>
            <li>
              <i class="fa-solid fa-circle-check"></i>
              <span><strong>Zero Urban Congestion:</strong> Wide 55m and 70m internal arterial expressways with dedicated green buffers.</span>
            </li>
            <li>
              <i class="fa-solid fa-circle-check"></i>
              <span><strong>Complete Self-Sustaining City:</strong> Integrated shopping high-streets, sports zones, healthcare and education hubs.</span>
            </li>
          </ul>
          <div class="why-card-footer">
            <i class="fa-solid fa-shield-halved"></i>
            <span>6x Size of Shanghai Pudong &bull; 100% Future-Proof City</span>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="why-card">
          <div class="why-card-header">
            <div class="why-icon-box icon-gold">
              <i class="fa-solid fa-microchip"></i>
            </div>
            <span class="why-stat-pill pill-gold">High Rental Yield</span>
          </div>
          <h3 class="why-title">Semiconductor &amp; High-Tech Hub</h3>
          <p class="why-desc">
            Anchored by <strong>Tata Electronics &amp; Taiwan's PSMC</strong> mega semiconductor fab plant with ₹91,000 Cr+ investment, establishing Dholera as the Silicon Valley of Gujarat.
          </p>
          <ul class="why-points-list">
            <li>
              <i class="fa-solid fa-circle-check"></i>
              <span><strong>800,000+ Direct &amp; Indirect Jobs:</strong> Massive influx of high-income engineers, executives, and skilled technicians.</span>
            </li>
            <li>
              <i class="fa-solid fa-circle-check"></i>
              <span><strong>Tier-1 Ancillary Ecosystem:</strong> Global supply chain vendors, clean-room manufacturers, and MSME clusters.</span>
            </li>
            <li>
              <i class="fa-solid fa-circle-check"></i>
              <span><strong>Massive Housing Demand:</strong> High-yield rental opportunities for residential villas, serviced apartments, and retail centers.</span>
            </li>
          </ul>
          <div class="why-card-footer">
            <i class="fa-solid fa-bolt"></i>
            <span>India’s 1st Semiconductor Fab Ecosystem &bull; High Liquidity</span>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="why-card">
          <div class="why-card-header">
            <div class="why-icon-box icon-blue">
              <i class="fa-solid fa-landmark-dome"></i>
            </div>
            <span class="why-stat-pill pill-blue">100% Legal Title</span>
          </div>
          <h3 class="why-title">Triple Government-Backed Security</h3>
          <p class="why-desc">
            Jointly developed by the <strong>Central Government of India (NICDC)</strong> and <strong>Gujarat State Government (GIDB)</strong> under the Delhi-Mumbai Industrial Corridor (DMIC).
          </p>
          <ul class="why-points-list">
            <li>
              <i class="fa-solid fa-circle-check"></i>
              <span><strong>100% Pre-Sanctioned NA Clearance:</strong> Official Non-Agricultural conversion verified and cleared.</span>
            </li>
            <li>
              <i class="fa-solid fa-circle-check"></i>
              <span><strong>Immediate Sub-Registrar Sale Deed:</strong> Direct registry in buyer's name with zero third-party or middleman risk.</span>
            </li>
            <li>
              <i class="fa-solid fa-circle-check"></i>
              <span><strong>Clear 7/12 &amp; Property Card Mutation:</strong> Freehold title ownership with complete verified 30-year chain documents.</span>
            </li>
          </ul>
          <div class="why-card-footer">
            <i class="fa-solid fa-certificate"></i>
            <span>100% Title Clear &bull; Freehold Ownership &bull; Zero Litigation</span>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="why-card">
          <div class="why-card-header">
            <div class="why-icon-box icon-purple">
              <i class="fa-solid fa-plane-departure"></i>
            </div>
            <span class="why-stat-pill pill-purple">Quad Multi-Modal</span>
          </div>
          <h3 class="why-title">Quad Multi-Modal Super Transit</h3>
          <p class="why-desc">
            Strategically linked through four world-class transport corridors, ensuring effortless passenger travel and fast international export-import logistics.
          </p>
          <ul class="why-points-list">
            <li>
              <i class="fa-solid fa-circle-check"></i>
              <span><strong>Dholera International Airport:</strong> Dedicated passenger &amp; 4,014m cargo runway (operational by 2026).</span>
            </li>
            <li>
              <i class="fa-solid fa-circle-check"></i>
              <span><strong>Ahmedabad 6-Lane Expressway:</strong> Direct 45-minute signal-free highway connecting Dholera to Ahmedabad.</span>
            </li>
            <li>
              <i class="fa-solid fa-circle-check"></i>
              <span><strong>Metro Rail &amp; DFC Freight Link:</strong> Rapid mass transit metro and direct freight corridor from Dadri to JNPT Mumbai.</span>
            </li>
          </ul>
          <div class="why-card-footer">
            <i class="fa-solid fa-road"></i>
            <span>Fastest Multimodal Transport Gateway in Western India</span>
          </div>
        </div>

        <!-- Card 5 -->
        <div class="why-card">
          <div class="why-card-header">
            <div class="why-icon-box icon-green">
              <i class="fa-solid fa-arrow-trend-up"></i>
            </div>
            <span class="why-stat-pill pill-green">High Appreciation</span>
          </div>
          <h3 class="why-title">Early-Entry Capital Multiplier</h3>
          <p class="why-desc">
            While saturated metro cities require multi-crore investments with stagnant 4-6% returns, Dholera land offers high-growth ground-floor entry with clear-title legal registry and explosive upside.
          </p>
          <ul class="why-points-list">
            <li>
              <i class="fa-solid fa-circle-check"></i>
              <span><strong>Low Ticket Size:</strong> High-net-worth quality assets accessible to smart retail and NRI investors.</span>
            </li>
            <li>
              <i class="fa-solid fa-circle-check"></i>
              <span><strong>Proven 25% to 35% Annual Growth:</strong> Uninterrupted capital appreciation as infrastructure reaches physical milestones.</span>
            </li>
            <li>
              <i class="fa-solid fa-circle-check"></i>
              <span><strong>3x to 5x Expected Appreciation:</strong> Maximum wealth inflection occurring between groundbreaking and airport opening.</span>
            </li>
          </ul>
          <div class="why-card-footer">
            <i class="fa-solid fa-arrow-trend-up"></i>
            <span>High ROI Multiplier &bull; Outperforms Equity &amp; Gold</span>
          </div>
        </div>

        <!-- Card 6 -->
        <div class="why-card">
          <div class="why-card-header">
            <div class="why-icon-box icon-teal">
              <i class="fa-solid fa-network-wired"></i>
            </div>
            <span class="why-stat-pill pill-teal">Platinum Certified</span>
          </div>
          <h3 class="why-title">Underground Sensorized Utilities</h3>
          <p class="why-desc">
            India's 1st <strong>IGBC Platinum-Certified</strong> Greenfield Smart City. Built with complete subterranean multi-utility ducts so roads will never be dug up for maintenance.
          </p>
          <ul class="why-points-list">
            <li>
              <i class="fa-solid fa-circle-check"></i>
              <span><strong>Pre-Laid Subsurface Ducts:</strong> Power, high-speed fiber, potable drinking water, and recycled utility lines.</span>
            </li>
            <li>
              <i class="fa-solid fa-circle-check"></i>
              <span><strong>Automated Vacuum Waste Collection:</strong> Sealed underground suction chutes with 0% open waste.</span>
            </li>
            <li>
              <i class="fa-solid fa-circle-check"></i>
              <span><strong>ABCD Command &amp; Control Center:</strong> City-wide 24/7 digital SCADA IoT monitoring for traffic, safety &amp; water.</span>
            </li>
          </ul>
          <div class="why-card-footer">
            <i class="fa-solid fa-city"></i>
            <span>Zero Waterlogging &bull; 100% Green Renewable Energy</span>
          </div>
        </div>
      </div>

      <!-- Bottom Early-Mover Callout Banner -->
      <div class="why-cta-banner">
        <div class="why-cta-left">
          <span class="why-cta-badge"><i class="fa-solid fa-fire"></i> High-Growth Wealth Window</span>
          <h3 class="why-cta-title">Why Buying Plots in Dholera SIR Today Yields Maximum Wealth</h3>
          <p class="why-cta-desc">
            Look at Gurgaon in 2002 or Navi Mumbai before the airport—early investors generated 400% to 800% wealth creation. Dholera SIR is at that exact golden inflection stage right now. Lock in NA clear-title plots before expressway and airport inauguration price surges.
          </p>
        </div>
        <div class="why-cta-right">
          <div class="why-cta-btns">
            <a href="<?php echo $PHONE_TEL; ?>" class="btn btn-call pulse-animation">
              <i class="fa-solid fa-phone-volume"></i> <span>Direct Call: <?php echo htmlspecialchars($PHONE_DISPLAY); ?></span>
            </a>
            <a href="<?php echo $WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp whatsapp-pulse">
              <i class="fa-brands fa-whatsapp"></i> <span>Request SIR Price Sheet</span>
            </a>
          </div>
          <div class="why-cta-guarantee">
            <i class="fa-solid fa-shield-halved"></i> <span>100% Free Advisory &bull; Guided Site Visits Arranged Daily from Ahmedabad</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======================================================================
         9. KEY INFRASTRUCTURE AROUND DHOLERA
         ====================================================================== -->
  <section class="section-padding infra-section" id="infrastructure">
    <div class="container">
      <div class="section-header">
        <span class="section-tag" style="background: rgba(245, 158, 11, 0.2); color: var(--accent-gold);">World-Class Infrastructure</span>
        <h2 class="section-title">Key Infrastructure Around Dholera SIR</h2>
        <p class="section-desc">
          Transforming connectivity and logistics for investors, manufacturers, and homeowners.
        </p>
      </div>

      <div class="infra-grid">
        <!-- Airport -->
        <div class="infra-card infra-featured-card">
          <div class="infra-card-media">
            <img src="assets/images/dholera-airport.jpg" alt="Dholera Greenfield International Airport Development" loading="lazy">
            <span class="infra-badge-floating"><i class="fa-solid fa-plane"></i> Aviation Hub</span>
          </div>
          <div class="infra-card-content">
            <h3 class="infra-title"><a href="dholera-international-airport" style="color:inherit; text-decoration:none;">Dholera International Airport</a></h3>
            <span class="infra-status"><i class="fa-solid fa-bolt"></i> Under Development / Fast Track</span>
            <p class="infra-desc">
              4,000-meter runways capable of handling wide-body passenger aircraft &amp; heavy air cargo. Located just 15 km from the city.
            </p>
            <a href="dholera-international-airport" class="infra-btn-link">
              <span>View Full Airport Master Plan</span>
              <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <!-- Expressway -->
        <div class="infra-card">
          <div class="infra-card-media">
            <a href="dholera-expressway">
              <img src="assets/images/dholera-expressway.jpg" alt="Ahmedabad Dholera 6-lane Access-Controlled Expressway" loading="lazy">
            </a>
            <span class="infra-badge-floating"><i class="fa-solid fa-road"></i> 6-Lane Corridor</span>
          </div>
          <div class="infra-card-content">
            <h3 class="infra-title"><a href="dholera-expressway" style="color:inherit; text-decoration:none;">Expressway Connectivity</a></h3>
            <span class="infra-status"><i class="fa-solid fa-bolt"></i> 109 Km Access-Controlled NH 751</span>
            <p class="infra-desc">
              High-speed 6-lane greenfield expressway reducing commute time between Ahmedabad &amp; Dholera SIR to just 45 minutes, with integrated RRTS metro median.
            </p>
            <a href="dholera-expressway" class="infra-btn-link">
              <span>View Expressway Specifications</span>
              <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <!-- DFC -->
        <div class="infra-card">
          <div class="infra-card-media">
            <a href="dholera-freight-corridor">
              <img src="assets/images/dholera-freight.jpg" alt="Dedicated Freight Corridor Western Rail Line for Dholera" loading="lazy">
            </a>
            <span class="infra-badge-floating"><i class="fa-solid fa-train"></i> Western DFC</span>
          </div>
          <div class="infra-card-content">
            <h3 class="infra-title"><a href="dholera-freight-corridor" style="color:inherit; text-decoration:none;">Dedicated Freight Corridor</a></h3>
            <span class="infra-status"><i class="fa-solid fa-bolt"></i> Heavy Logistics &amp; Rail Cargo</span>
            <p class="infra-desc">
              Seamless electrified double-stack rail connectivity linking Delhi-Mumbai economic corridor directly through Dholera SIR heavy logistics &amp; cargo terminals.
            </p>
            <a href="dholera-freight-corridor" class="infra-btn-link">
              <span>View Freight Corridor Route</span>
              <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <!-- Sea Port -->
        <div class="infra-card">
          <div class="infra-card-media">
            <a href="dholera-seaport">
              <img src="assets/images/dholera-seaport.jpg" alt="Proposed Deep-Water Sea Port for Dholera Smart City" loading="lazy">
            </a>
            <span class="infra-badge-floating"><i class="fa-solid fa-ship"></i> Maritime Gateway</span>
          </div>
          <div class="infra-card-content">
            <h3 class="infra-title"><a href="dholera-seaport" style="color:inherit; text-decoration:none;">Proposed Sea Port</a></h3>
            <span class="infra-status"><i class="fa-solid fa-anchor"></i> Gulf of Khambhat Terminal</span>
            <p class="infra-desc">
              Deep-water multipurpose ocean cargo port opening international shipping lines for Dholera semiconductor, defense, chemical, and automotive exports.
            </p>
            <a href="dholera-seaport" class="infra-btn-link">
              <span>View Sea Port Master Plan</span>
              <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======================================================================
         10. INTERACTIVE PLOT PRICE & INVESTMENT CALCULATOR (LUXURY FINTECH DESIGN)
         ====================================================================== -->
  <section class="section-padding calculator-section" id="pricing">
    <div class="container">
      <div class="section-header">
        <span class="section-tag"><i class="fa-solid fa-calculator"></i> Transparent Land Pricing</span>
        <h2 class="section-title">Dholera Plots Price & Land Investment ROI Estimator</h2>
        <p class="section-desc">
          Check current <strong>Dholera plots price</strong> per sq. yard, calculate your booking token, and project your capital appreciation for <strong>Dholera property for sale</strong>.
        </p>
      </div>

      <div class="calc-box-luxury">
        <div class="calc-grid-luxury">
          <!-- Left: Interactive Controls -->
          <div class="calc-controls-col">
            <!-- Category Tabs -->
            <div class="calc-group">
              <div class="calc-group-header">
                <span class="calc-label"><i class="fa-solid fa-shapes"></i> 1. Select Plot Category</span>
                <span class="calc-hint">Indicative 2026 Base Rates</span>
              </div>

              <!-- Hidden select for form compatibility -->
              <select id="calcPlotType" class="calc-select-hidden">
                <option value="residential" selected><?php echo htmlspecialchars($PROJECT_NAME); ?> (Residential)</option>
                <option value="swastik"><?php echo htmlspecialchars($RES2_PROJECT_NAME); ?> (Residential)</option>
                <option value="industrial"><?php echo htmlspecialchars($IND_PROJECT_NAME); ?> (Industrial)</option>
              </select>

              <!-- Visual Category Cards / Tabs -->
              <div class="calc-category-tabs" role="tablist">
                <button type="button" class="calc-cat-card active" data-type="residential">
                  <div class="cat-icon-badge residential"><i class="fa-solid fa-house-chimney"></i></div>
                  <div class="cat-info">
                    <span class="cat-name"><?php echo htmlspecialchars($PROJECT_NAME); ?></span>
                    <span class="cat-rate">₹12,450 <small>/ sq.yd</small></span>
                  </div>
                  <div class="cat-active-check"><i class="fa-solid fa-circle-check"></i></div>
                </button>

                <button type="button" class="calc-cat-card" data-type="swastik">
                  <div class="cat-icon-badge residential"><i class="fa-solid fa-tree-city"></i></div>
                  <div class="cat-info">
                    <span class="cat-name"><?php echo htmlspecialchars($RES2_PROJECT_NAME); ?></span>
                    <span class="cat-rate">₹12,450 <small>/ sq.yd</small></span>
                  </div>
                  <div class="cat-active-check"><i class="fa-solid fa-circle-check"></i></div>
                </button>

                <button type="button" class="calc-cat-card" data-type="industrial">
                  <div class="cat-icon-badge industrial"><i class="fa-solid fa-industry"></i></div>
                  <div class="cat-info">
                    <span class="cat-name"><?php echo htmlspecialchars($IND_PROJECT_NAME); ?></span>
                    <span class="cat-rate">₹9,750 <small>/ sq.yd</small></span>
                  </div>
                  <div class="cat-active-check"><i class="fa-solid fa-circle-check"></i></div>
                </button>
              </div>
            </div>

            <!-- Plot Size Slider & Preset Chips -->
            <div class="calc-group">
              <div class="calc-group-header">
                <span class="calc-label"><i class="fa-solid fa-ruler-combined"></i> 2. Choose Plot Size</span>
                <div class="calc-size-live-badge">
                  <strong id="calcSizeVal">124.35 Sq. Yds</strong>
                  <span id="calcSqFtVal">(1,119 Sq. Ft)</span>
                </div>
              </div>

              <!-- Custom Slider -->
              <div class="luxury-slider-wrap">
                <input type="range" id="calcPlotSize" class="luxury-range" min="121" max="724" step="1" value="124" aria-label="Select plot size in square yards">
              </div>

              <!-- Quick Preset Chips -->
              <div class="size-preset-chips">
                <span class="preset-label">Available Sizes:</span>
                <button type="button" class="preset-chip" data-size="121">121 Yd (Min)</button>
                <button type="button" class="preset-chip active" data-size="124">124 Yd (Sample)</button>
                <button type="button" class="preset-chip" data-size="200">200 Yd</button>
                <button type="button" class="preset-chip" data-size="350">350 Yd</button>
                <button type="button" class="preset-chip" data-size="500">500 Yd</button>
                <button type="button" class="preset-chip" data-size="724">724 Yd (Max)</button>
              </div>
            </div>

            <!-- Live Cost Breakdown Cards -->
            <div class="calc-breakdown-row">
              <div class="breakdown-item">
                <span class="bd-label">Base Land Rate</span>
                <strong class="bd-val" id="calcBreakdownRate">₹ 12,450 / yd</strong>
              </div>
              <div class="breakdown-item">
                <span class="bd-label">Dev. Charges (with GST)</span>
                <strong class="bd-val" id="calcBreakdownDev">₹ 1,003 / yd</strong>
              </div>
              <div class="breakdown-item highlight">
                <span class="bd-label">Est. Booking Token (10%)</span>
                <strong class="bd-val" id="calcBreakdownToken">₹ 1,54,800</strong>
              </div>
            </div>

            <div class="calc-charges-info" id="calcChargesInfo">
              <div><i class="fa-solid fa-stamp" style="color:var(--accent-gold);"></i> Registry: <strong>Male 5.9% | Female 4.9%</strong></div>
              <div><i class="fa-solid fa-file-invoice" style="color:var(--accent-red);"></i> Fixed Docs: <strong>₹ 15,400</strong></div>
              <div><i class="fa-solid fa-layer-group" style="color:var(--primary);"></i> Units: <strong>638 Plots (Rojka)</strong></div>
            </div>

            <div class="calc-disclaimer">
              <i class="fa-solid fa-circle-info"></i>
              <span>All rates &amp; specifications directly benchmarked to <?php echo htmlspecialchars($PROJECT_NAME); ?> (Rojka). Corner plots and premium location charges may apply.</span>
            </div>
          </div>

          <!-- Right: Luxury Obsidian Output Card -->
          <div class="calc-result-col">
            <div class="luxury-result-card">
              <!-- Card Header Tag -->
              <div class="res-card-top-tag">
                <span class="pulse-dot"></span>
                <span>LIVE INVESTMENT SUMMARY</span>
              </div>

              <!-- Total Amount -->
              <div class="res-price-section">
                <div class="res-price-label">Estimated Total Package (Land + Dev + Docs)</div>
                <div class="res-price-value" id="calcEstPrice">₹ 16,88,280</div>
                <div class="res-price-subtext">100% Legal Registry Ready Value in Rojka</div>
              </div>

              <!-- ROI Projection / Assured Return Box -->
              <div class="res-roi-card" id="calcRoiBox">
                <div class="roi-card-header">
                  <span class="roi-badge" id="calcRoiBadge"><i class="fa-solid fa-shield-halved"></i> 3 Years Assured Return (1%)*</span>
                  <span class="roi-timeline" id="calcRoiTimeline">1% TDS Payout Plan</span>
                </div>
                <div class="roi-future-val" id="calcProjRoiVal">₹ 14,707 / mo</div>
                <div class="roi-growth-note" id="calcProjRoi">
                  <i class="fa-solid fa-circle-check"></i> For Example: Total Return: <strong>₹ 5,29,470</strong> (on 124.35 Yd plot)
                </div>
              </div>

              <!-- Feature Trust Badges -->
              <div class="res-trust-list">
                <div class="trust-point"><i class="fa-solid fa-circle-check"></i> 100% NA / Title Clear Plots in Rojka &bull; Haripura</div>
                <div class="trust-point"><i class="fa-solid fa-circle-check"></i> Immediate Registry &amp; Revenue Mutation</div>
                <div class="trust-point"><i class="fa-solid fa-circle-check"></i> 3 Years Assured Return (1%)* Guarantee Scheme</div>
              </div>

              <!-- Direct Action CTAs -->
              <div class="res-cta-group">
                <a href="<?php echo $WHATSAPP_LINK; ?>" id="calcWhatsAppBtn" target="_blank" rel="noopener noreferrer" class="btn btn-luxury-whatsapp whatsapp-pulse">
                  <i class="fa-brands fa-whatsapp fa-lg"></i>
                  <span>Lock Estimate on WhatsApp</span>
                </a>
                <a href="<?php echo $PHONE_TEL; ?>" class="btn btn-luxury-call">
                  <i class="fa-solid fa-phone"></i>
                  <span>Instant Call: <?php echo htmlspecialchars($PHONE_DISPLAY); ?></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======================================================================
         11. PROJECT GALLERY
         ====================================================================== -->
  <section class="section-padding gallery-section" id="gallery">
    <div class="container">
      <div class="section-header">
        <span class="section-tag">Project Gallery</span>
        <h2 class="section-title">A Glimpse of Dholera’s Ground Development</h2>
        <p class="section-desc">
          Take a look at real infrastructure progress, completed activation buildings, and modern township avenues.
        </p>
      </div>

      <div class="gallery-grid">
        <div class="gallery-item">
          <img src="assets/images/dholera-hero.jpg" alt="Dholera Smart City Skyline and Central Business District" loading="lazy">
          <div class="gallery-overlay">
            <span class="gallery-caption">Futuristic CBD & Waterways</span>
          </div>
        </div>

        <div class="gallery-item">
          <img src="assets/images/dholera-commercial.jpg" alt="Smart City Boulevard and Center in Dholera SIR" loading="lazy">
          <div class="gallery-overlay">
            <span class="gallery-caption">Smart City Center Boulevard</span>
          </div>
        </div>

        <div class="gallery-item">
          <img src="assets/images/dholera-residential.jpg" alt="Planned Residential Plotted Township in Dholera SIR" loading="lazy">
          <div class="gallery-overlay">
            <span class="gallery-caption">Residential Gated Community</span>
          </div>
        </div>

        <div class="gallery-item">
          <img src="assets/images/dholera-industrial.jpg" alt="Industrial Manufacturing Zone and Logistics Warehouses" loading="lazy">
          <div class="gallery-overlay">
            <span class="gallery-caption">High-Tech Industrial Hub</span>
          </div>
        </div>

        <div class="gallery-item">
          <img src="assets/images/dholera-airport.jpg" alt="Dholera Greenfield International Airport and Expressway Link" loading="lazy">
          <div class="gallery-overlay">
            <span class="gallery-caption">International Airport & Metro</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======================================================================
         12. WHAT INVESTORS SAY (TESTIMONIALS)
         ====================================================================== -->
  <section class="section-padding testimonials-section">
    <div class="container">
      <div class="section-header">
        <span class="section-tag">Investor Trust</span>
        <h2 class="section-title">Trusted by Real Estate Investors & Businesses</h2>
        <p class="section-desc">
          See why experienced property investors from across India and NRIs choose Dholera.
        </p>
      </div>

      <div class="test-grid">
        <div class="test-card">
          <div class="test-stars">★★★★★</div>
          <p class="test-quote">
            "Dholera SIR is a true game-changer for real estate investment. The transparency in title clearance and clear NA status gave me 100% confidence to book 2 residential plots in TP-2."
          </p>
          <div class="test-author-box">
            <div class="test-avatar">RM</div>
            <div>
              <div class="test-name">Rakesh Mehta</div>
              <div class="test-role">Investor, Mumbai</div>
            </div>
          </div>
        </div>

        <div class="test-card">
          <div class="test-stars">★★★★★</div>
          <p class="test-quote">
            "We were looking for industrial land for our precision auto component manufacturing. With Tata semiconductor fab coming up, Dholera industrial plots are the best decision we made."
          </p>
          <div class="test-author-box">
            <div class="test-avatar">NS</div>
            <div>
              <div class="test-name">Neha Shah</div>
              <div class="test-role">Business Owner, Ahmedabad</div>
            </div>
          </div>
        </div>

        <div class="test-card">
          <div class="test-stars">★★★★★</div>
          <p class="test-quote">
            "Being an NRI, verified paperwork and site visit assistance were my top concerns. The team answered all queries over WhatsApp and arranged a virtual walkthrough. Highly recommended!"
          </p>
          <div class="test-author-box">
            <div class="test-avatar">AP</div>
            <div>
              <div class="test-name">Amit Patel</div>
              <div class="test-role">NRI Investor, Dubai</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======================================================================
         13. FREQUENTLY ASKED QUESTIONS (FAQ ACCORDION WITH SCHEMA MARKUP)
         ====================================================================== -->
  <section class="section-padding faq-section" id="faqs">
    <div class="container">
      <div class="section-header">
        <span class="section-tag">Questions Answered</span>
        <h2 class="section-title">Frequently Asked Questions</h2>
        <p class="section-desc">
          Everything you need to know about buying <strong>Dholera Smart City plots</strong>, prices, and registry.
        </p>
      </div>

      <div class="faq-layout-grid">
        <!-- Left Column: Sticky Investor Helpdesk Card -->
        <div class="faq-sidebar">
          <div class="faq-support-card">
            <div class="faq-desk-top">
              <span class="faq-desk-pill"><i class="fa-solid fa-headset"></i> Investor Helpdesk</span>
              <div class="faq-desk-status">
                <span class="status-pulse-dot"></span>
                <span>Online Now</span>
              </div>
            </div>

            <h3 class="faq-desk-title">Have Questions Not Answered Here?</h3>
            <p class="faq-desk-desc">
              Speak directly with our senior Dholera SIR plot specialist. Get instant zone maps, NA title documentation, and latest price sheets without any obligation.
            </p>

            <div class="faq-desk-highlights">
              <div class="desk-hl-item">
                <i class="fa-solid fa-circle-check"></i>
                <span>100% Free Consultation &amp; Zero Brokerage</span>
              </div>
              <div class="desk-hl-item">
                <i class="fa-solid fa-circle-check"></i>
                <span>Direct Sub-Registrar Legal Guidance</span>
              </div>
              <div class="desk-hl-item">
                <i class="fa-solid fa-circle-check"></i>
                <span>Free Guided Site Visit from Ahmedabad</span>
              </div>
            </div>

            <div class="faq-desk-ctas">
              <a href="<?php echo $PHONE_TEL; ?>" class="btn btn-call btn-block pulse-animation">
                <i class="fa-solid fa-phone-volume"></i> <span>Direct Call: <?php echo htmlspecialchars($PHONE_DISPLAY); ?></span>
              </a>
              <a href="<?php echo $WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-block whatsapp-pulse">
                <i class="fa-brands fa-whatsapp"></i> <span>Instant WhatsApp Chat</span>
              </a>
            </div>

            <div class="faq-desk-footer">
              <i class="fa-solid fa-shield-halved"></i> <span>Govt. Backed DMIC Greenfield Smart City</span>
            </div>
          </div>
        </div>

        <!-- Right Column: Interactive Filter Tabs + Luxury Accordion List -->
        <div class="faq-main-content">
          <!-- Filter Pills -->
          <div class="faq-filter-bar">
            <button class="faq-filter-btn active" data-filter="all" type="button">
              <i class="fa-solid fa-layer-group"></i> All Questions (7)
            </button>
            <button class="faq-filter-btn" data-filter="overview" type="button">
              <i class="fa-solid fa-city"></i> Smart City Overview
            </button>
            <button class="faq-filter-btn" data-filter="pricing" type="button">
              <i class="fa-solid fa-coins"></i> Prices &amp; Sizes
            </button>
            <button class="faq-filter-btn" data-filter="legal" type="button">
              <i class="fa-solid fa-certificate"></i> Legal &amp; Title
            </button>
            <button class="faq-filter-btn" data-filter="visit" type="button">
              <i class="fa-solid fa-car-side"></i> Guided Site Visit
            </button>
          </div>

          <!-- Accordion List -->
          <div class="faq-container">
            <!-- Item 1 -->
            <div class="faq-item active" data-category="overview">
              <button class="faq-question" type="button" aria-expanded="true">
                <div class="faq-q-left">
                  <span class="faq-q-num">01</span>
                  <div class="faq-q-text-wrap">
                    <span class="faq-q-badge"><i class="fa-solid fa-city"></i> Greenfield Infrastructure</span>
                    <span class="faq-q-title">What is Dholera SIR and why is it special?</span>
                  </div>
                </div>
                <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
              </button>
              <div class="faq-answer">
                <div class="faq-answer-inner">
                  <p>
                    Dholera Special Investment Region (SIR) is India’s first platinum-rated greenfield smart city spanning <strong>920 sq. km</strong> (larger than Singapore). Developed with world-class planning by <strong>Halcrow, Cisco, and AECOM</strong>, it features complete underground sensorized utilities, dedicated industrial zones, and multi-modal transport including an international airport.
                  </p>
                  <div class="faq-highlight-chips">
                    <span class="faq-chip"><i class="fa-solid fa-check"></i> 920 Sq. Km Total Area</span>
                    <span class="faq-chip"><i class="fa-solid fa-check"></i> Underground Sensorized Utilities</span>
                    <span class="faq-chip"><i class="fa-solid fa-check"></i> Halcrow &amp; AECOM Master Plan</span>
                    <span class="faq-chip"><i class="fa-solid fa-check"></i> IGBC Platinum Smart City</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Item 2: Mayur Signature 2 Spotlight -->
            <div class="faq-item" data-category="pricing">
              <button class="faq-question" type="button" aria-expanded="false">
                <div class="faq-q-left">
                  <span class="faq-q-num">02</span>
                  <div class="faq-q-text-wrap">
                    <span class="faq-q-badge"><i class="fa-solid fa-gem"></i> Project Spotlight</span>
                    <span class="faq-q-title">What are the complete details, sizes &amp; prices of Mayur Signature 2 in Rojka, Dholera?</span>
                  </div>
                </div>
                <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
              </button>
              <div class="faq-answer">
                <div class="faq-answer-inner">
                  <p>
                    <strong>Mayur Signature 2</strong> is a premier 638-unit residential plotted community located in <strong>Rojka, Dholera Smart City</strong>. Complete transparent specifications include:
                  </p>
                  <div class="faq-price-mini-grid" style="grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));">
                    <div class="faq-price-box">
                      <span class="p-type">Base Land Rate</span>
                      <span class="p-val">₹ 12,450 / sq. yd</span>
                    </div>
                    <div class="faq-price-box">
                      <span class="p-type">Development Charges</span>
                      <span class="p-val">₹ 1,003 / yd (850+18% GST)</span>
                    </div>
                    <div class="faq-price-box">
                      <span class="p-type">Registry Stamp Duty</span>
                      <span class="p-val">Male 5.9% | Female 4.9%</span>
                    </div>
                    <div class="faq-price-box">
                      <span class="p-type">Fixed Documentation</span>
                      <span class="p-val">₹ 15,400 (Fixed)</span>
                    </div>
                  </div>
                  <p style="margin-top: 14px;">
                    🌟 <strong>100% Clear Title &amp; High Growth:</strong> Features complete Non-Agricultural (NA) government clearance, immediate registered sale deed with individual sub-plot demarcation, ready for construction or high-growth investment. Plot sizes range from <strong>121.20 sq. yds to 724.21 sq. yds</strong>.
                  </p>
                  <div class="faq-highlight-chips" style="margin-top: 10px;">
                    <span class="faq-chip"><i class="fa-solid fa-check"></i> 638 Approved Residential Plots</span>
                    <span class="faq-chip"><i class="fa-solid fa-check"></i> Rojka Prime Location</span>
                    <span class="faq-chip"><i class="fa-solid fa-check"></i> Clear Title &amp; Immediate Registry</span>
                    <span class="faq-chip"><i class="fa-solid fa-check"></i> 100% Gated Township</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Item 3 -->
            <div class="faq-item" data-category="pricing">
              <button class="faq-question" type="button" aria-expanded="false">
                <div class="faq-q-left">
                  <span class="faq-q-num">03</span>
                  <div class="faq-q-text-wrap">
                    <span class="faq-q-badge"><i class="fa-solid fa-indian-rupee-sign"></i> Plot Rates &amp; Pricing</span>
                    <span class="faq-q-title">What is the current Dholera plots price per sq. yard?</span>
                  </div>
                </div>
                <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
              </button>
              <div class="faq-answer">
                <div class="faq-answer-inner">
                  <p>
                    Dholera residential plots are available at <strong>₹12,450 per sq. yard</strong> with clear NA titles, immediate registry, and complete gated township amenities. Rates vary depending on the Town Planning scheme (TP-1, TP-2), proximity to the 6-lane Expressway, and internal road width.
                  </p>
                  <div class="faq-price-mini-grid">
                    <div class="faq-price-box">
                      <span class="p-type">Residential Plots</span>
                      <span class="p-val">₹12,450 / sq. yd</span>
                    </div>
                    <div class="faq-price-box">
                      <span class="p-type">Mayur Swastik II</span>
                      <span class="p-val">₹12,450 / sq. yd</span>
                    </div>
                    <div class="faq-price-box">
                      <span class="p-type">Industrial Land</span>
                      <span class="p-val">₹ 9,750 / sq. yd</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Item 4 -->
            <div class="faq-item" data-category="pricing">
              <button class="faq-question" type="button" aria-expanded="false">
                <div class="faq-q-left">
                  <span class="faq-q-num">04</span>
                  <div class="faq-q-text-wrap">
                    <span class="faq-q-badge"><i class="fa-solid fa-ruler-combined"></i> Plot Configurations</span>
                    <span class="faq-q-title">What plot sizes are available for sale in Dholera?</span>
                  </div>
                </div>
                <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
              </button>
              <div class="faq-answer">
                <div class="faq-answer-inner">
                  <p>
                    Plot sizes cater to all investor requirements, from individual home builders to global industrial conglomerates:
                  </p>
                  <div class="faq-sizes-grid">
                    <div class="faq-size-card">
                      <div class="sc-icon"><i class="fa-solid fa-house"></i></div>
                      <div>
                        <strong>Mayur Signature 2 (Residential):</strong>
                        <span>638 Plots (121.20 to 724.21 sq. yards) in Rojka, Dholera SIR.</span>
                      </div>
                    </div>
                    <div class="faq-size-card">
                      <div class="sc-icon"><i class="fa-solid fa-tree-city"></i></div>
                      <div>
                        <strong>Mayur Swastik II (Residential):</strong>
                        <span>433 Plots (123.78 to 403.76 sq. yards) on Anandpur-Kamiyala Road.</span>
                      </div>
                    </div>
                    <div class="faq-size-card">
                      <div class="sc-icon"><i class="fa-solid fa-industry"></i></div>
                      <div>
                        <strong>Mayur Business Park (Industrial):</strong>
                        <span>227 Plots (327.49 to 5,912.09 sq. yards) on Fedra-Dhandhuka State Highway.</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Item 5 -->
            <div class="faq-item" data-category="legal">
              <button class="faq-question" type="button" aria-expanded="false">
                <div class="faq-q-left">
                  <span class="faq-q-num">05</span>
                  <div class="faq-q-text-wrap">
                    <span class="faq-q-badge"><i class="fa-solid fa-certificate"></i> Legal &amp; Clear Title</span>
                    <span class="faq-q-title">Are plots for sale in Dholera legal, NA-approved &amp; title clear?</span>
                  </div>
                </div>
                <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
              </button>
              <div class="faq-answer">
                <div class="faq-answer-inner">
                  <p>
                    Yes, <strong>100% of the plots offered are NA (Non-Agricultural)</strong>, NOC cleared, and legally sound with complete chain documents, ready for immediate sale deed registry and legal mutation.
                  </p>
                  <div class="faq-highlight-chips">
                    <span class="faq-chip legal"><i class="fa-solid fa-shield-check"></i> 100% Title Clear</span>
                    <span class="faq-chip legal"><i class="fa-solid fa-shield-check"></i> NA Permission Approved</span>
                    <span class="faq-chip legal"><i class="fa-solid fa-shield-check"></i> Immediate Registered Sale Deed</span>
                    <span class="faq-chip legal"><i class="fa-solid fa-shield-check"></i> Revenue 7/12 &amp; Property Card Mutation</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Item 6 -->
            <div class="faq-item" data-category="legal">
              <button class="faq-question" type="button" aria-expanded="false">
                <div class="faq-q-left">
                  <span class="faq-q-num">06</span>
                  <div class="faq-q-text-wrap">
                    <span class="faq-q-badge"><i class="fa-solid fa-chart-line"></i> Safety &amp; Appreciation</span>
                    <span class="faq-q-title">Is Dholera property investment and land investment safe for high ROI?</span>
                  </div>
                </div>
                <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
              </button>
              <div class="faq-answer">
                <div class="faq-answer-inner">
                  <p>
                    Absolutely. Dholera SIR is strongly backed by the <strong>Central Government of India under DMIC</strong> and the Gujarat State Government. With major anchor projects like the <strong>Tata Semiconductor Fab (₹91,000 Cr+)</strong> and the <strong>Dholera International Airport</strong>, the region has guaranteed economic momentum.
                  </p>
                  <div class="faq-highlight-chips">
                    <span class="faq-chip gold"><i class="fa-solid fa-bolt"></i> Tata Semiconductor Fab Anchor</span>
                    <span class="faq-chip gold"><i class="fa-solid fa-plane-departure"></i> International Airport (2026)</span>
                    <span class="faq-chip gold"><i class="fa-solid fa-road"></i> 6-Lane Expressway (2025)</span>
                    <span class="faq-chip gold"><i class="fa-solid fa-arrow-trend-up"></i> 25-35% YoY Appreciation Trend</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Item 7 -->
            <div class="faq-item" data-category="visit">
              <button class="faq-question" type="button" aria-expanded="false">
                <div class="faq-q-left">
                  <span class="faq-q-num">07</span>
                  <div class="faq-q-text-wrap">
                    <span class="faq-q-badge"><i class="fa-solid fa-car-side"></i> Guided Site Visit</span>
                    <span class="faq-q-title">Can I visit the site before booking a plot in Dholera?</span>
                  </div>
                </div>
                <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
              </button>
              <div class="faq-answer">
                <div class="faq-answer-inner">
                  <p>
                    Yes, we arrange free guided site visits directly from Ahmedabad. You can inspect the ground progress, roads, ABCD building, and your chosen plot location in person. Just call or message us on WhatsApp to schedule your visit!
                  </p>
                  <div class="faq-visit-action">
                    <a href="<?php echo $WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-sm whatsapp-pulse">
                      <i class="fa-brands fa-whatsapp"></i> <span>Book Free Site Visit on WhatsApp</span>
                    </a>
                    <a href="<?php echo $PHONE_TEL; ?>" class="btn btn-call btn-sm pulse-animation">
                      <i class="fa-solid fa-phone"></i> <span>Call: <?php echo htmlspecialchars($PHONE_DISPLAY); ?></span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======================================================================
         14. IN-DEPTH ONPAGE SEO CONTENT (OPTIMIZED FOR GOOGLE RANKING)
         ====================================================================== -->
  <section class="seo-content-section" id="seo-details">
    <div class="container">
      <!-- Top Guide Featured Banner -->
      <div class="seo-guide-hero">
        <div>
          <span class="section-tag" style="background: rgba(245, 158, 11, 0.2); color: var(--accent-gold); margin-bottom: 8px;">
            <i class="fa-solid fa-book-open"></i> Investor Knowledge Hub
          </span>
          <h2 class="seo-guide-title">Complete Guide to Dholera Property Investment & Plots for Sale</h2>
          <p class="seo-guide-desc">
            Looking to <strong>buy land in Dholera</strong>? <strong>Dholera Smart City plots</strong> represent one of the most lucrative real estate investment opportunities in modern India. Located in the Ahmedabad district of Gujarat, the <strong>Dholera SIR plots</strong> region is envisioned as a global manufacturing and smart industrial hub larger than Singapore.
          </p>
        </div>

        <div class="seo-metrics-box">
          <div class="seo-metric-row">
            <i class="fa-solid fa-chart-line"></i>
            <span><strong>25-35% YoY</strong> Capital Growth in Active Town Planning Zones</span>
          </div>
          <div class="seo-metric-row">
            <i class="fa-solid fa-microchip"></i>
            <span><strong>₹ 91,000 Cr+</strong> Tata Electronics Semiconductor Mega Fab</span>
          </div>
          <div class="seo-metric-row">
            <i class="fa-solid fa-road"></i>
            <span><strong>45 Mins</strong> Commute to Ahmedabad via 6-Lane Expressway</span>
          </div>
        </div>
      </div>

      <!-- 3-Column Topic Cards Grid -->
      <div class="seo-cards-grid">
        <!-- Card 1 -->
        <article class="seo-article-card">
          <span class="article-category-badge"><i class="fa-solid fa-house-chimney"></i> Residential Living</span>
          <h3 class="article-title">Why Invest in Dholera Residential Plots?</h3>
          <p class="article-text">
            The demand for <strong>Dholera residential plots</strong> is surging rapidly as infrastructure development reaches milestone stages. With self-sustaining amenities like continuous potable tap water, automated underground garbage chutes, 100% covered stormwater canals, and smart streetlighting, residential townships inside TP1 and TP2 are tailored for future-proof luxury living.
          </p>
          <div class="article-highlight-pill">
            <i class="fa-solid fa-circle-check"></i>
            <span>100% NA, Title Clear & Registry Ready</span>
          </div>
        </article>

        <!-- Card 2 -->
        <article class="seo-article-card">
          <span class="article-category-badge"><i class="fa-solid fa-industry"></i> Industrial Boom</span>
          <h3 class="article-title">Industrial Boom: Mayur Business Park &amp; Semiconductor Corridor</h3>
          <p class="article-text">
            With the establishment of India's first semiconductor fab by Tata Electronics (₹91,000 Cr+) and thoughtfully planned industrial projects like <strong>Mayur Business Park</strong> on the Fedra-Dhandhuka 4-Lane State Highway (227 NA unit-plan-passed plots from 327 to 5,912 sq. yds), <strong>Dholera industrial plots</strong> offer unparalleled connectivity, power, and logistics infrastructure.
          </p>
          <div class="article-highlight-pill">
            <i class="fa-solid fa-circle-check"></i>
            <span>0 KM 4-Lane State Highway &bull; 20 KM to Airport</span>
          </div>
        </article>

        <!-- Card 3 -->
        <article class="seo-article-card">
          <span class="article-category-badge"><i class="fa-solid fa-coins"></i> Valuation & Pricing</span>
          <h3 class="article-title">Understanding Dholera Plots Price & Value Drivers</h3>
          <p class="article-text">
            The current <strong>Dholera plots price</strong> provides an unmatched entry point for early-stage investors before the opening of the <strong>Dholera Greenfield International Airport</strong> and the Ahmedabad-Dholera Expressway. Compared to saturated metros, land in Dholera offers exponential appreciation potential over the next 3 to 7 years.
          </p>
          <div class="article-highlight-pill">
            <i class="fa-solid fa-circle-check"></i>
            <span>High ROI Corridor Backed by Govt.</span>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ======================================================================
         15. BOTTOM CTA BANNER (DIRECT CALL & WHATSAPP)
         ====================================================================== -->
  <section class="bottom-cta-banner" id="contact">
    <div class="container">
      <div class="cta-box-inner">
        <h2 class="cta-box-title">Don't Miss India’s Biggest Investment Wave</h2>
        <p class="cta-box-desc">
          Join thousands of smart investors securing clear-title plots in Dholera SIR. Connect directly with our on-site team for genuine rates, instant site visits, and brochure.
        </p>
        <div class="cta-buttons-row">
          <a href="<?php echo $PHONE_TEL; ?>" class="btn btn-call btn-lg pulse-animation">
            <i class="fa-solid fa-phone-volume"></i> <span>Direct Call: <?php echo htmlspecialchars($PHONE_DISPLAY); ?></span>
          </a>
          <a href="<?php echo $WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg whatsapp-pulse">
            <i class="fa-brands fa-whatsapp"></i> <span>Chat on WhatsApp</span>
          </a>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
require_once __DIR__ . '/includes/footer.php';
?>