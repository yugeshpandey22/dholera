<?php
require_once dirname(__DIR__) . '/config.php';
$PAGE_TITLE       = "Ahmedabad-Dholera Expressway (NH 751) - 6-Lane Corridor, Route Map & Plot Proximity";
$PAGE_DESCRIPTION = "Complete guide to Ahmedabad-Dholera 6-Lane Expressway (NH 751). 109 km access-controlled high-speed highway with RRTS metro median, 45-min commute & prime plots near interchanges.";
$PAGE_KEYWORDS    = "Ahmedabad Dholera expressway, NH 751, Dholera expressway route map, Dholera expressway completion date, plots near Dholera expressway, Dholera metro rail, Dholera SIR connectivity";
$PAGE_CANONICAL   = $CANONICAL_URL . "dholera-expressway";
$PAGE_IMAGE       = $CANONICAL_URL . "assets/images/dholera-expressway.jpg";
$ACTIVE_NAV       = "infrastructure";

$EXTRA_HEAD = '
  <!-- Schema.org JSON-LD -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Place",
    "name": "Ahmedabad Dholera Expressway NH 751",
    "alternateName": "Dholera Greenfield Expressway & Metro Corridor",
    "description": "109-kilometer 6-lane access-controlled greenfield expressway connecting Ahmedabad (Sardar Patel Ring Road) directly to Dholera SIR and Dholera International Airport.",
    "url": "' . htmlspecialchars($CANONICAL_URL) . 'dholera-expressway",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Dholera SIR",
      "addressRegion": "Gujarat",
      "postalCode": "382455",
      "addressCountry": "IN"
    }
  }
  </script>
';

require_once dirname(__DIR__) . '/includes/header.php';
?>


  <!-- ======================================================================
       3. EXPRESSWAY HERO SECTION
       ====================================================================== -->
  <section class="airport-hero">
    <img src="assets/images/dholera-expressway.jpg" alt="Ahmedabad Dholera 6-Lane Access-Controlled Expressway NH 751" class="airport-hero-bg">
    <div class="container">
      <div class="airport-breadcrumbs">
        <a href="<?php echo $BASE_URI; ?>"><i class="fa-solid fa-house"></i> Home</a>
        <i class="fa-solid fa-chevron-right" style="font-size: 0.65rem;"></i>
        <a href="<?php echo $BASE_URI; ?>infrastructure">Infrastructure</a>
        <i class="fa-solid fa-chevron-right" style="font-size: 0.65rem;"></i>
        <span style="color: var(--accent-gold);">Ahmedabad-Dholera Expressway (NH 751)</span>
      </div>

      <div class="airport-status-badge">
        <span class="status-live-dot"></span> NHAI Greenfield Corridor &bull; Near Completion
      </div>

      <h1 class="airport-hero-title">
        Ahmedabad &ndash; Dholera <br><span class="text-gradient-gold">6-Lane Greenfield Expressway</span>
      </h1>

      <p class="airport-hero-sub">
        India’s premier high-speed transport corridor (NH 751) linking Ahmedabad directly to <strong>Dholera SIR Activation Zone &amp; Greenfield Airport</strong> in just <strong>45 minutes</strong>, complete with a dedicated median reserved for <strong>High-Speed RRTS Metro Rail</strong>.
      </p>

      <div class="airport-hero-actions">
        <a href="<?php echo $WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp">
          <i class="fa-brands fa-whatsapp"></i> <span>Inquire for Expressway Corridor Plots</span>
        </a>
        <a href="<?php echo $PHONE_TEL; ?>" class="btn btn-call">
          <i class="fa-solid fa-phone"></i> <span>Instant Call: +91 <?php echo htmlspecialchars($PHONE_RAW); ?></span>
        </a>
        <a href="<?php echo $BASE_URI; ?>plots" class="btn btn-outline" style="border-color: rgba(255,255,255,0.3); color: #ffffff;">
          <i class="fa-solid fa-map-location-dot"></i> <span>View Nearby Plots</span>
        </a>
      </div>
    </div>
  </section>

  <!-- ======================================================================
       4. 6 KEY METRICS STAT BAR
       ====================================================================== -->
  <section style="position: relative; z-index: 5; margin-bottom: 20px;">
    <div class="container">
      <div class="airport-stats-bar">
        <div class="airport-stat-card">
          <div class="airport-stat-icon"><i class="fa-solid fa-road"></i></div>
          <div class="airport-stat-val">109 Km</div>
          <div class="airport-stat-lbl">Total Corridor Length</div>
        </div>

        <div class="airport-stat-card">
          <div class="airport-stat-icon"><i class="fa-solid fa-gauge-high"></i></div>
          <div class="airport-stat-val">45 Mins</div>
          <div class="airport-stat-lbl">Ahmedabad to Dholera SIR</div>
        </div>

        <div class="airport-stat-card">
          <div class="airport-stat-icon"><i class="fa-solid fa-arrows-split-up-and-left"></i></div>
          <div class="airport-stat-val">6-Lane</div>
          <div class="airport-stat-lbl">Expandable to 8 Lanes</div>
        </div>

        <div class="airport-stat-card">
          <div class="airport-stat-icon"><i class="fa-solid fa-train"></i></div>
          <div class="airport-stat-val">RRTS Metro</div>
          <div class="airport-stat-lbl">Dedicated Rail Median</div>
        </div>

        <div class="airport-stat-card">
          <div class="airport-stat-icon"><i class="fa-solid fa-indian-rupee-sign"></i></div>
          <div class="airport-stat-val">₹ 4,200 Cr</div>
          <div class="airport-stat-lbl">Total Project Outlay</div>
        </div>

        <div class="airport-stat-card">
          <div class="airport-stat-icon"><i class="fa-solid fa-shield-halved"></i></div>
          <div class="airport-stat-val">120 km/h</div>
          <div class="airport-stat-lbl">Design Driving Speed</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======================================================================
       5. DETAILED MASTER PLAN & SPECIFICATIONS
       ====================================================================== -->
  <section class="airport-section" style="background: #ffffff;">
    <div class="container">
      <div class="airport-overview-grid">
        <div class="airport-media-box">
          <img src="assets/images/dholera-expressway.jpg" alt="Ahmedabad Dholera 6-Lane Access-Controlled Expressway Construction" loading="lazy">
          <div class="airport-media-caption">
            <strong>Ahmedabad-Dholera Expressway (NH 751)</strong> &bull; 109 km Access-Controlled High-Speed Greenfield Highway.
          </div>
        </div>

        <div>
          <span class="section-tag"><i class="fa-solid fa-layer-group"></i> Project Overview</span>
          <h2 style="font-size: 2.1rem; font-weight: 900; color: #0f172a; line-height: 1.25; margin-bottom: 16px;">
            The High-Speed Economic Lifeline Connecting Ahmedabad &amp; Dholera SIR
          </h2>
          <p style="font-size: 0.95rem; color: #475569; line-height: 1.65; margin-bottom: 16px;">
            Constructed by the <strong>National Highways Authority of India (NHAI)</strong> in 4 major civil packages with an investment exceeding <strong>₹4,200 Crores</strong>, the Ahmedabad-Dholera Expressway (NH 751) is a 109-kilometer, 6-lane access-controlled greenfield highway engineered for a design speed of 120 km/h.
          </p>
          <p style="font-size: 0.95rem; color: #475569; line-height: 1.65; margin-bottom: 24px;">
            Starting from <strong>Sardar Patel Ring Road (Sarkhej)</strong> in southwestern Ahmedabad, the corridor runs south through Dholka and Fedara before terminating directly at Dholera SIR’s <strong>Activation Zone (TP1 &amp; TP2)</strong> and the <strong>Dholera International Airport</strong> interchange, with a southern extension to Bhavnagar.
          </p>

          <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 14px 18px; display: flex; gap: 14px; align-items: center;">
            <i class="fa-solid fa-shield-halved" style="color: #10b981; font-size: 1.6rem; flex-shrink: 0;"></i>
            <div style="font-size: 0.88rem; color: #334155;">
              <strong>Fast-Track Completion:</strong> Over 85% of physical civil construction, flyovers, and asphalt pavement works have been completed with early commissioning phases underway.
            </div>
          </div>
        </div>
      </div>

      <!-- Specs 4-Box Grid -->
      <div class="airport-specs-grid" style="margin-top: 48px;">
        <div class="airport-spec-box">
          <div class="airport-spec-icon-box"><i class="fa-solid fa-road"></i></div>
          <div class="airport-spec-body">
            <h4>120-Meter Right of Way (RoW)</h4>
            <p>Spanning an ultra-wide 120-meter greenfield land strip, accommodating 6 high-speed express lanes, wide paved shoulders, service roads, and planned future 8-lane expansion.</p>
          </div>
        </div>

        <div class="airport-spec-box">
          <div class="airport-spec-icon-box"><i class="fa-solid fa-train"></i></div>
          <div class="airport-spec-body">
            <h4>Integrated RRTS High-Speed Metro</h4>
            <p>A dedicated wide central median is reserved for the Ahmedabad-Dholera Regional Rapid Transit System (RRTS) Metro, enabling seamless 35-minute rail transit between cities.</p>
          </div>
        </div>

        <div class="airport-spec-box">
          <div class="airport-spec-icon-box"><i class="fa-solid fa-arrows-split-up-and-left"></i></div>
          <div class="airport-spec-body">
            <h4>Grade-Separated Interchanges</h4>
            <p>Automated trumpet and cloverleaf interchanges connect Sanand auto hub, Dholka, Fedara, Dholera Greenfield Airport, and Town Planning activation zones with zero traffic bottlenecks.</p>
          </div>
        </div>

        <div class="airport-spec-box">
          <div class="airport-spec-icon-box"><i class="fa-solid fa-tower-broadcast"></i></div>
          <div class="airport-spec-body">
            <h4>Intelligent Transport Systems (ITS)</h4>
            <p>Advanced fiber-optic surveillance, speed sensors, electronic toll collection (FASTag), automated weather alerts, and 24x7 highway emergency patrol units.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======================================================================
       6. DISTANCE MATRIX TO KEY ECONOMIC HUBS
       ====================================================================== -->
  <section class="airport-section" style="background: #f8fafc; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">
    <div class="container">
      <div class="section-header">
        <span class="section-tag"><i class="fa-solid fa-compass"></i> Proximity &amp; Commute</span>
        <h2 class="section-title">Distance Matrix via Ahmedabad-Dholera Expressway</h2>
        <p class="section-desc">
          Transforming travel times across Central Gujarat and unlocking prime residential and industrial land corridors.
        </p>
      </div>

      <div style="max-width: 900px; margin: 0 auto; overflow-x: auto;">
        <table class="distance-matrix-table">
          <thead>
            <tr>
              <th>Destination / Key Economic Zone</th>
              <th>Distance (Km)</th>
              <th>Estimated Travel Time</th>
              <th>Access Highway / Interchange</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>Mayur Signature 2 (Rojka Gated Township)</strong></td>
              <td><span class="dist-badge">8 Km</span></td>
              <td><strong>7 – 8 Mins</strong></td>
              <td>Direct Exit via Fedara-Rojka Central Arterial Road</td>
            </tr>
            <tr>
              <td><strong>Dholera SIR TP-1 &amp; TP-2 Activation Zone</strong></td>
              <td><span class="dist-badge">5 Km</span></td>
              <td><strong>5 Mins</strong></td>
              <td>Direct Mainline Terminal Interchange (ABCD Building)</td>
            </tr>
            <tr>
              <td><strong>Dholera Greenfield International Airport</strong></td>
              <td><span class="dist-badge">12 Km</span></td>
              <td><strong>10 Mins</strong></td>
              <td>Dedicated Airport Toll Interchange Flyover</td>
            </tr>
            <tr>
              <td><strong>Tata Semiconductor Fab &amp; Industrial Hub</strong></td>
              <td><span class="dist-badge">7 Km</span></td>
              <td><strong>6 Mins</strong></td>
              <td>Heavy Haul Feeder Corridor (Activation Zone)</td>
            </tr>
            <tr>
              <td><strong>Ahmedabad SP Ring Road (Sarkhej)</strong></td>
              <td><span class="dist-badge">75 Km</span></td>
              <td><strong>45 Mins</strong></td>
              <td>109 Km 6-Lane Expressway Mainline (NH 751)</td>
            </tr>
            <tr>
              <td><strong>Sanand Auto &amp; Micron Semiconductor Hub</strong></td>
              <td><span class="dist-badge">45 Km</span></td>
              <td><strong>35 Mins</strong></td>
              <td>Via Dholka-Sanand High-Speed Connector</td>
            </tr>
            <tr>
              <td><strong>Bhavnagar Commercial City Center</strong></td>
              <td><span class="dist-badge">60 Km</span></td>
              <td><strong>45 Mins</strong></td>
              <td>South Expressway Extension / Coastal Link</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- ======================================================================
       7. REAL ESTATE APPRECIATION IMPACT
       ====================================================================== -->
  <section class="airport-section" style="background: #ffffff;">
    <div class="container">
      <div class="section-header">
        <span class="section-tag"><i class="fa-solid fa-chart-line"></i> Capital Appreciation</span>
        <h2 class="section-title">Why Plots Near Ahmedabad-Dholera Expressway Are Booming</h2>
        <p class="section-desc">
          Every major global smart city sees its highest capital appreciation along its primary access-controlled expressway corridor.
        </p>
      </div>

      <div class="aerotropolis-grid">
        <div class="aero-card">
          <div class="aero-num">01</div>
          <h4>Massive Historical Appreciation</h4>
          <p>Indian expressway corridors like Yamuna Expressway and Mumbai-Pune Expressway delivered <strong>400% to 800% ROI</strong> within 3 to 5 years of opening. Dholera Expressway plots are currently mirroring this proven wealth cycle.</p>
        </div>

        <div class="aero-card">
          <div class="aero-num">02</div>
          <h4>Sub-45 Min Commutable Living</h4>
          <p>Executives and engineers working in Ahmedabad, Sanand, and GIFT City can comfortably reside in Dholera’s master-planned gated villa communities and commute effortlessly via expressway and upcoming metro rail.</p>
        </div>

        <div class="aero-card">
          <div class="aero-num">03</div>
          <h4>Commercial &amp; Logistics Hub Surge</h4>
          <p>Land parcels situated along expressway feeder corridors command premium commercial leasing rates for fuel plazas, corporate transit parks, warehousing clusters, and retail shopping hubs.</p>
        </div>
      </div>

      <!-- Spotlight on Mayur Signature 2 -->
      <div style="margin-top: 48px; background: linear-gradient(135deg, #070d19 0%, #0f1c38 100%); border: 1.5px solid #d4af37; border-radius: 16px; padding: 32px 28px; color: #ffffff; display: flex; flex-direction: column; gap: 20px;">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 14px;">
          <div>
            <span style="background: #fef3c7; color: #92400e; font-size: 0.72rem; font-weight: 800; padding: 4px 12px; border-radius: 999px; text-transform: uppercase;">Prime Expressway Township</span>
            <h3 style="font-size: 1.6rem; font-weight: 900; margin-top: 8px; color: #ffffff;"><?php echo htmlspecialchars($PROJECT_NAME); ?> &bull; Rojka, Dholera</h3>
            <p style="color: #cbd5e1; font-size: 0.92rem; margin-top: 4px;">638 Plots Approved Gated Community &bull; Just 8 Mins from Dholera Expressway Exit</p>
          </div>
          <div style="text-align: right;">
            <div style="font-size: 0.76rem; color: #fde047; font-weight: 700; text-transform: uppercase;">Plot Rate Starting From</div>
            <div style="font-size: 1.8rem; font-weight: 900; color: #fbbf24; font-family: 'Outfit', sans-serif;"><?php echo htmlspecialchars($PROJECT_BASE_RATE_TXT); ?>*</div>
            <div style="font-size: 0.76rem; color: #34d399; font-weight: 600;">3-Yr Assured Return: <?php echo htmlspecialchars($PROJECT_ASSURED_MONTHLY); ?></div>
          </div>
        </div>

        <div style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 18px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 14px;">
          <div style="font-size: 0.85rem; color: #94a3b8;">
            <i class="fa-solid fa-circle-check" style="color: #10b981;"></i> 100% Clear Title Registry &bull; Male 5.9% / Female 4.9% &bull; Instant WhatsApp Brochure
          </div>
          <div style="display: flex; gap: 10px;">
            <a href="<?php echo $WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-sm">
              <i class="fa-brands fa-whatsapp"></i> <span>Get Price List &amp; Layout Plan</span>
            </a>
            <a href="<?php echo $PHONE_TEL; ?>" class="btn btn-call btn-sm">
              <i class="fa-solid fa-phone"></i> <span>Call: +91 <?php echo htmlspecialchars($PHONE_RAW); ?></span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======================================================================
       8. FREQUENTLY ASKED QUESTIONS (EXPRESSWAY SPECIFIC)
       ====================================================================== -->
  <section class="airport-section" style="background: #f8fafc; border-top: 1px solid #e2e8f0;">
    <div class="container">
      <div class="section-header">
        <span class="section-tag"><i class="fa-solid fa-circle-question"></i> Expressway FAQs</span>
        <h2 class="section-title">Common Questions About Ahmedabad-Dholera Expressway</h2>
        <p class="section-desc">
          Everything you need to know about route status, travel times, toll gates, and real estate appreciation.
        </p>
      </div>

      <div class="airport-faq-wrap">
        <div class="faq-accordion">
          <!-- FAQ 1 -->
          <div class="faq-item active">
            <button class="faq-question" type="button" aria-expanded="true">
              <div class="faq-q-left">
                <span class="faq-q-num">01</span>
                <span class="faq-q-title">When will the Ahmedabad-Dholera Expressway be fully open to traffic?</span>
              </div>
              <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
            </button>
            <div class="faq-answer" style="display: block;">
              <div class="faq-answer-inner">
                <p>
                  The expressway is on an aggressive <strong>fast-track completion schedule by NHAI</strong>. Over 85% of physical civil works have been accomplished across all 4 construction packages. The corridor is slated to open for vehicular trials and commercial operations in <strong>2025</strong>, synchronizing with the launch of Dholera International Airport.
                </p>
              </div>
            </div>
          </div>

          <!-- FAQ 2 -->
          <div class="faq-item">
            <button class="faq-question" type="button" aria-expanded="false">
              <div class="faq-q-left">
                <span class="faq-q-num">02</span>
                <span class="faq-q-title">What is the starting point of the Expressway in Ahmedabad?</span>
              </div>
              <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
            </button>
            <div class="faq-answer">
              <div class="faq-answer-inner">
                <p>
                  The expressway originates at <strong>Sardar Patel Ring Road (Sarkhej junction)</strong> in southwestern Ahmedabad. It offers quick, zero-signal access for travelers coming from SG Highway, Prahlad Nagar, Bopal, and Sanand.
                </p>
              </div>
            </div>
          </div>

          <!-- FAQ 3 -->
          <div class="faq-item">
            <button class="faq-question" type="button" aria-expanded="false">
              <div class="faq-q-left">
                <span class="faq-q-num">03</span>
                <span class="faq-q-title">How is the Metro Rail integrated with the Expressway?</span>
              </div>
              <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
            </button>
            <div class="faq-answer">
              <div class="faq-answer-inner">
                <p>
                  The central median of the 120-meter Right of Way (RoW) has been engineered and legally reserved for the <strong>Ahmedabad-Dholera Regional Rapid Transit System (RRTS) Metro</strong>. This allows high-speed electric trains to travel directly down the median strip, linking Ahmedabad Metro to Dholera SIR and the international airport.
                </p>
              </div>
            </div>
          </div>

          <!-- FAQ 4 -->
          <div class="faq-item">
            <button class="faq-question" type="button" aria-expanded="false">
              <div class="faq-q-left">
                <span class="faq-q-num">04</span>
                <span class="faq-q-title">How does the expressway impact land and plot prices in Dholera SIR?</span>
              </div>
              <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
            </button>
            <div class="faq-answer">
              <div class="faq-answer-inner">
                <p>
                  Land values near major expressway interchanges and Town Planning zones typically appreciate by <strong>3X to 5X</strong> upon toll commissioning. Investors who acquire clear-title plots in gated communities like Mayur Signature 2 (Rojka) prior to highway opening secure the highest capital gains.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======================================================================
       9. CTA BANNER (DIRECT CALL & WHATSAPP)
       ====================================================================== -->
  <section class="bottom-cta-banner" id="contact">
    <div class="container">
      <div class="cta-box-inner">
        <h2 class="cta-box-title">Acquire Prime Plots Along the Dholera Expressway Corridor</h2>
        <p class="cta-box-desc">
          Clear-title residential villa plots and industrial parcels situated within 5 to 10 minutes of major expressway interchanges. Complete development, 100% legal registry, and proven high capital appreciation.
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

<?php
require_once dirname(__DIR__) . '/includes/footer.php';
?>
