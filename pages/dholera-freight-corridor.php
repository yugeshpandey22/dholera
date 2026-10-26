<?php
require_once dirname(__DIR__) . '/config.php';
$PAGE_TITLE       = "Western Dedicated Freight Corridor (DFC) - Dholera SIR Rail Logistics & Cargo Hub";
$PAGE_DESCRIPTION = "Complete guide to Western Dedicated Freight Corridor (DFC) in Dholera SIR. High-speed double-stack electrified container rail linking Delhi-Mumbai with multi-modal cargo terminal.";
$PAGE_KEYWORDS    = "Western DFC Dholera, Dedicated freight corridor Dholera, Dholera multi modal logistics park, Dholera cargo rail, industrial plots near DFC Dholera, Dholera SIR rail connectivity";
$PAGE_CANONICAL   = $CANONICAL_URL . "dholera-freight-corridor";
$PAGE_IMAGE       = $CANONICAL_URL . "assets/images/dholera-freight.jpg";
$ACTIVE_NAV       = "infrastructure";

$EXTRA_HEAD = '
  <!-- Schema.org JSON-LD -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Place",
    "name": "Western Dedicated Freight Corridor (DFC) Dholera SIR",
    "alternateName": "Dholera Multi-Modal Logistics Hub & Double-Stack Freight Rail",
    "description": "High-speed electrified heavy-haul rail corridor connecting Dholera Special Investment Region directly to Jawaharlal Nehru Port Trust (JNPT) and northern industrial centers of Delhi NCR.",
    "url": "' . htmlspecialchars($CANONICAL_URL) . 'dholera-freight-corridor",
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
       3. FREIGHT CORRIDOR HERO SECTION
       ====================================================================== -->
  <section class="airport-hero">
    <img src="assets/images/dholera-freight.jpg" alt="Dedicated Freight Corridor Western Rail Line for Dholera" class="airport-hero-bg">
    <div class="container">
      <div class="airport-breadcrumbs">
        <a href="<?php echo $BASE_URI; ?>"><i class="fa-solid fa-house"></i> Home</a>
        <i class="fa-solid fa-chevron-right" style="font-size: 0.65rem;"></i>
        <a href="<?php echo $BASE_URI; ?>infrastructure">Infrastructure</a>
        <i class="fa-solid fa-chevron-right" style="font-size: 0.65rem;"></i>
        <span style="color: var(--accent-gold);">Dedicated Freight Corridor (Western DFC)</span>
      </div>

      <div class="airport-status-badge">
        <span class="status-live-dot"></span> DMIC Core Lifeline &bull; Heavy Industrial Logistics
      </div>

      <h1 class="airport-hero-title">
        Western Dedicated <br><span class="text-gradient-gold">Freight Corridor (DFC)</span>
      </h1>

      <p class="airport-hero-sub">
        High-speed <strong>electrified double-stack container rail network</strong> connecting Dholera SIR directly to Northern India’s consumption centers and Western India’s major deep-sea ports with zero passenger-train interference.
      </p>

      <div class="airport-hero-actions">
        <a href="<?php echo $WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp">
          <i class="fa-brands fa-whatsapp"></i> <span>Inquire for Logistics &amp; Industrial Plots</span>
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
          <div class="airport-stat-icon"><i class="fa-solid fa-route"></i></div>
          <div class="airport-stat-val">1,504 Km</div>
          <div class="airport-stat-lbl">Total WDFC Length</div>
        </div>

        <div class="airport-stat-card">
          <div class="airport-stat-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
          <div class="airport-stat-val">Double-Stack</div>
          <div class="airport-stat-lbl">Container Train Capability</div>
        </div>

        <div class="airport-stat-card">
          <div class="airport-stat-icon"><i class="fa-solid fa-bolt"></i></div>
          <div class="airport-stat-val">100 km/h</div>
          <div class="airport-stat-lbl">High-Speed Freight Movement</div>
        </div>

        <div class="airport-stat-card">
          <div class="airport-stat-icon"><i class="fa-solid fa-weight-hanging"></i></div>
          <div class="airport-stat-val">25-Tonne</div>
          <div class="airport-stat-lbl">Axle Load Capacity</div>
        </div>

        <div class="airport-stat-card">
          <div class="airport-stat-icon"><i class="fa-solid fa-warehouse"></i></div>
          <div class="airport-stat-val">Multi-Modal</div>
          <div class="airport-stat-lbl">Dedicated Logistics Park (MMLP)</div>
        </div>

        <div class="airport-stat-card">
          <div class="airport-stat-icon"><i class="fa-solid fa-ship"></i></div>
          <div class="airport-stat-val">Direct Ports</div>
          <div class="airport-stat-lbl">JNPT &amp; Mundra Line</div>
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
          <img src="assets/images/dholera-freight.jpg" alt="Western Dedicated Freight Corridor Electric Cargo Train Dholera SIR" loading="lazy">
          <div class="airport-media-caption">
            <strong>Western Dedicated Freight Corridor (DFC)</strong> &bull; Heavy-haul electrified rail carrying double-stack containers directly through Dholera SIR.
          </div>
        </div>

        <div>
          <span class="section-tag"><i class="fa-solid fa-train-subway"></i> Industrial Lifeline</span>
          <h2 style="font-size: 2.1rem; font-weight: 900; color: #0f172a; line-height: 1.25; margin-bottom: 16px;">
            Seamless Rail Logistics Powering Dholera’s Global Manufacturing Hub
          </h2>
          <p style="font-size: 0.95rem; color: #475569; line-height: 1.65; margin-bottom: 16px;">
            The 1,504-kilometer <strong>Western Dedicated Freight Corridor (WDFC)</strong>, developed under the flagship Delhi-Mumbai Industrial Corridor (DMIC), is India's most advanced freight rail line. It operates completely segregated from passenger train congestion with modern 2x25 kV AC electrification.
          </p>
          <p style="font-size: 0.95rem; color: #475569; line-height: 1.65; margin-bottom: 24px;">
            A direct spur line connects Dholera SIR’s <strong>Multi-Modal Logistics Park (MMLP)</strong> and Inland Container Depots (ICD), enabling manufacturing units like <strong>Tata's ₹91,000 Cr Semiconductor Fab</strong> to dispatch containerized cargo to Mumbai’s JNPT port in under 14 hours.
          </p>

          <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 14px 18px; display: flex; gap: 14px; align-items: center;">
            <i class="fa-solid fa-shield-halved" style="color: #10b981; font-size: 1.6rem; flex-shrink: 0;"></i>
            <div style="font-size: 0.88rem; color: #334155;">
              <strong>Massive Cost Savings:</strong> Rail freight reduces industrial transportation costs by 35% to 45% compared to conventional road transport, providing an unbeatable competitive edge.
            </div>
          </div>
        </div>
      </div>

      <!-- Specs 4-Box Grid -->
      <div class="airport-specs-grid" style="margin-top: 48px;">
        <div class="airport-spec-box">
          <div class="airport-spec-icon-box"><i class="fa-solid fa-boxes-stacked"></i></div>
          <div class="airport-spec-body">
            <h4>Double-Stack Container Haul</h4>
            <p>Purpose-engineered overhead clearance of 7.1 meters allows running double-stack container trains, doubling cargo throughput per train compared to standard rail networks.</p>
          </div>
        </div>

        <div class="airport-spec-box">
          <div class="airport-spec-icon-box"><i class="fa-solid fa-clock-rotate-left"></i></div>
          <div class="airport-spec-body">
            <h4>Sub-14 Hr Port Connectivity</h4>
            <p>Guaranteed average freight speeds of 100 km/h reduce port turnaround times to JNPT (Mumbai) and Mundra to less than 14 to 18 hours, eliminating costly demurrage fees.</p>
          </div>
        </div>

        <div class="airport-spec-box">
          <div class="airport-spec-icon-box"><i class="fa-solid fa-warehouse"></i></div>
          <div class="airport-spec-body">
            <h4>Multi-Modal Logistics Park (MMLP)</h4>
            <p>Integrated automated warehousing, customs bonded inland container depot (ICD), cold chain storage, and multi-modal container transshipment yards inside Dholera SIR.</p>
          </div>
        </div>

        <div class="airport-spec-box">
          <div class="airport-spec-icon-box"><i class="fa-solid fa-microchip"></i></div>
          <div class="airport-spec-body">
            <h4>Semiconductor &amp; Clean-Tech Support</h4>
            <p>Vibration-isolated specialized freight wagons safely transport ultra-sensitive semiconductor equipment, chemicals, solar ingots, and automotive battery packs.</p>
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
        <span class="section-tag"><i class="fa-solid fa-compass"></i> Cargo Transit Times</span>
        <h2 class="section-title">Freight Transit Times from Dholera SIR Logistics Terminal</h2>
        <p class="section-desc">
          Accelerating trade velocity between Dholera manufacturers and national consumption gateways.
        </p>
      </div>

      <div style="max-width: 900px; margin: 0 auto; overflow-x: auto;">
        <table class="distance-matrix-table">
          <thead>
            <tr>
              <th>Logistics Hub / Sea Port Destination</th>
              <th>Rail Distance (Km)</th>
              <th>DFC Transit Duration</th>
              <th>Logistics Advantage</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>JNPT / Navi Mumbai Deep Sea Port</strong></td>
              <td><span class="dist-badge">540 Km</span></td>
              <td><strong>12 – 14 Hours</strong></td>
              <td>Direct Double-Stack Line to India’s Largest Container Port</td>
            </tr>
            <tr>
              <td><strong>Mundra Port (Kutch Coast)</strong></td>
              <td><span class="dist-badge">380 Km</span></td>
              <td><strong>8 – 10 Hours</strong></td>
              <td>Rapid Export Processing for Engineering &amp; Chemical Cargo</td>
            </tr>
            <tr>
              <td><strong>Dadri ICD (Delhi NCR Logistics Hub)</strong></td>
              <td><span class="dist-badge">920 Km</span></td>
              <td><strong>18 – 20 Hours</strong></td>
              <td>Direct Delivery to Northern India Consumer Markets</td>
            </tr>
            <tr>
              <td><strong>Sanand Automobile &amp; Industrial Cluster</strong></td>
              <td><span class="dist-badge">65 Km</span></td>
              <td><strong>1.5 Hours</strong></td>
              <td>Just-in-Time Component Supply for EV &amp; Auto Manufacturers</td>
            </tr>
            <tr>
              <td><strong>Dholera Greenfield International Airport Cargo</strong></td>
              <td><span class="dist-badge">15 Km</span></td>
              <td><strong>20 Mins</strong></td>
              <td>Seamless Multi-Modal Air-Rail Intermodal Transfer</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- ======================================================================
       7. REAL ESTATE & INDUSTRIAL IMPACT
       ====================================================================== -->
  <section class="airport-section" style="background: #ffffff;">
    <div class="container">
      <div class="section-header">
        <span class="section-tag"><i class="fa-solid fa-chart-line"></i> Industrial Plot Value</span>
        <h2 class="section-title">Why Logistics &amp; Industrial Plots in Dholera Are Premier Assets</h2>
        <p class="section-desc">
          Properties adjoining the DFC rail terminal command the highest commercial rental yields and rapid capital gains.
        </p>
      </div>

      <div class="aerotropolis-grid">
        <div class="aero-card">
          <div class="aero-num">01</div>
          <h4>Zero Brokerage Industrial Land</h4>
          <p>Title-clear, NA-approved industrial parcels from <strong>1,000 sq. meters to 50+ acres</strong> in TP1 and TP2 with pre-laid high-tension power, gas grid, and industrial water pipelines.</p>
        </div>

        <div class="aero-card">
          <div class="aero-num">02</div>
          <h4>Supply Chain Anchor Tenants</h4>
          <p>Global suppliers for Tata Electronics, Foxconn, and automotive giants require immediate proximity to DFC freight yards for smooth parts warehousing and just-in-time delivery.</p>
        </div>

        <div class="aero-card">
          <div class="aero-num">03</div>
          <h4>Massive Industrial Rental Yields</h4>
          <p>Warehousing and distribution parks along freight corridors typically generate <strong>10% to 14% annual rental yields</strong>, significantly higher than conventional real estate.</p>
        </div>
      </div>

      <!-- Spotlight on Gated Investment Community -->
      <div style="margin-top: 48px; background: linear-gradient(135deg, #070d19 0%, #0f1c38 100%); border: 1.5px solid #d4af37; border-radius: 16px; padding: 32px 28px; color: #ffffff; display: flex; flex-direction: column; gap: 20px;">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 14px;">
          <div>
            <span style="background: #fef3c7; color: #92400e; font-size: 0.72rem; font-weight: 800; padding: 4px 12px; border-radius: 999px; text-transform: uppercase;">Featured Investment Opportunity</span>
            <h3 style="font-size: 1.6rem; font-weight: 900; margin-top: 8px; color: #ffffff;"><?php echo htmlspecialchars($PROJECT_NAME); ?> &bull; Rojka, Dholera</h3>
            <p style="color: #cbd5e1; font-size: 0.92rem; margin-top: 4px;">638 Plots Approved Gated Community &bull; Fast Access to Dholera Industrial &amp; DFC Hub</p>
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
              <i class="fa-brands fa-whatsapp"></i> <span>Get Price List &amp; Industrial Maps</span>
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
       8. FREQUENTLY ASKED QUESTIONS (DFC SPECIFIC)
       ====================================================================== -->
  <section class="airport-section" style="background: #f8fafc; border-top: 1px solid #e2e8f0;">
    <div class="container">
      <div class="section-header">
        <span class="section-tag"><i class="fa-solid fa-circle-question"></i> DFC FAQs</span>
        <h2 class="section-title">Common Questions About Western DFC &amp; Dholera SIR</h2>
        <p class="section-desc">
          Key facts on freight timelines, container handling, industrial zones, and land acquisition.
        </p>
      </div>

      <div class="airport-faq-wrap">
        <div class="faq-accordion">
          <!-- FAQ 1 -->
          <div class="faq-item active">
            <button class="faq-question" type="button" aria-expanded="true">
              <div class="faq-q-left">
                <span class="faq-q-num">01</span>
                <span class="faq-q-title">What is the Western Dedicated Freight Corridor (DFC)?</span>
              </div>
              <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
            </button>
            <div class="faq-answer" style="display: block;">
              <div class="faq-answer-inner">
                <p>
                  The Western DFC is a dedicated 1,504 km double-track electrified rail corridor running between Dadri (near Delhi) and JNPT (Mumbai). Built exclusively for heavy freight, it allows double-stack container trains to operate at 100 km/h with no passenger traffic delays.
                </p>
              </div>
            </div>
          </div>

          <!-- FAQ 2 -->
          <div class="faq-item">
            <button class="faq-question" type="button" aria-expanded="false">
              <div class="faq-q-left">
                <span class="faq-q-num">02</span>
                <span class="faq-q-title">How does DFC directly connect to Dholera SIR?</span>
              </div>
              <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
            </button>
            <div class="faq-answer">
              <div class="faq-answer-inner">
                <p>
                  A specialized direct rail link connects the mainline WDFC directly into Dholera SIR’s dedicated Multi-Modal Logistics Park (MMLP) and Inland Container Depot (ICD), providing factories with on-site container loading facilities.
                </p>
              </div>
            </div>
          </div>

          <!-- FAQ 3 -->
          <div class="faq-item">
            <button class="faq-question" type="button" aria-expanded="false">
              <div class="faq-q-left">
                <span class="faq-q-num">03</span>
                <span class="faq-q-title">How will DFC benefit the Tata Semiconductor Fabrication plant?</span>
              </div>
              <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
            </button>
            <div class="faq-answer">
              <div class="faq-answer-inner">
                <p>
                  Semiconductor manufacturing requires reliable, timely delivery of raw wafers, specialized gases, chemicals, and finished chips. The vibration-controlled electric rail freight guarantees smooth, predictable port transit without the risks of highway congestion.
                </p>
              </div>
            </div>
          </div>

          <!-- FAQ 4 -->
          <div class="faq-item">
            <button class="faq-question" type="button" aria-expanded="false">
              <div class="faq-q-left">
                <span class="faq-q-num">04</span>
                <span class="faq-q-title">Can individual investors buy industrial or warehouse plots in Dholera?</span>
              </div>
              <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
            </button>
            <div class="faq-answer">
              <div class="faq-answer-inner">
                <p>
                  Yes, verified clear-title industrial and residential land parcels are available for investors and businesses in TP1 and TP2 zones, with full government single-window approvals and legal sale deed registry.
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
        <h2 class="cta-box-title">Acquire High-Yield Logistics &amp; Industrial Land in Dholera SIR</h2>
        <p class="cta-box-desc">
          Clear-title industrial plots situated adjacent to Dholera’s freight rail feeder corridors. Full NA approval, ready registry, and pre-laid plug-and-play underground infrastructure.
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
