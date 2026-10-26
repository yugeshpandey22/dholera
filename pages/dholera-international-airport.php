<?php
require_once dirname(__DIR__) . '/config.php';
$PAGE_TITLE       = "Dholera International Airport (DIACL) - Runway Specs, Master Plan & Plot Proximity";
$PAGE_DESCRIPTION = "Complete guide to Dholera Greenfield International Airport (DIACL). Dual 4,000m Code 4E runways, cargo terminal, fast-track construction timeline & high-ROI investment plots in Dholera SIR.";
$PAGE_KEYWORDS    = "Dholera international airport, DIACL, Dholera airport runway length, Dholera airport construction status, Dholera greenfield airport completion date, plots near Dholera airport, Dholera SIR infrastructure";
$PAGE_CANONICAL   = $CANONICAL_URL . "dholera-international-airport";
$PAGE_IMAGE       = $CANONICAL_URL . "assets/images/dholera-airport.jpg";
$ACTIVE_NAV       = "infrastructure";

$EXTRA_HEAD = '
  <!-- Schema.org JSON-LD -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Airport",
    "name": "Dholera Greenfield International Airport",
    "alternateName": "DIACL Dholera Airport",
    "description": "Greenfield international airport in Dholera SIR Gujarat featuring dual 4,000m category 4E runways and dedicated multi-modal cargo hub.",
    "url": "' . htmlspecialchars($CANONICAL_URL) . 'dholera-international-airport",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Navagam, Dholera",
      "addressRegion": "Gujarat",
      "postalCode": "382455",
      "addressCountry": "IN"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": "22.2500",
      "longitude": "72.2000"
    }
  }
  </script>
';

require_once dirname(__DIR__) . '/includes/header.php';
?>


  <!-- ======================================================================
       3. AIRPORT PAGE HERO SECTION
       ====================================================================== -->
  <section class="airport-hero">
    <img src="assets/images/dholera-airport.jpg" alt="Dholera Greenfield International Airport Development" class="airport-hero-bg">
    <div class="container">
      <div class="airport-breadcrumbs">
        <a href="<?php echo $BASE_URI; ?>"><i class="fa-solid fa-house"></i> Home</a>
        <i class="fa-solid fa-chevron-right" style="font-size: 0.65rem;"></i>
        <a href="<?php echo $BASE_URI; ?>infrastructure">Infrastructure</a>
        <i class="fa-solid fa-chevron-right" style="font-size: 0.65rem;"></i>
        <span style="color: var(--accent-gold);">Dholera International Airport</span>
      </div>

      <div class="airport-status-badge">
        <span class="status-live-dot"></span> Phase 1 Fast-Track Development &bull; DIACL Joint Venture
      </div>

      <h1 class="airport-hero-title">
        Dholera Greenfield <br><span class="text-gradient-gold">International Airport</span>
      </h1>

      <p class="airport-hero-sub">
        India’s upcoming premier aviation and multi-modal logistics hub, spanning <strong>3,523 acres</strong> with dual <strong>4,000-meter runways</strong> capable of operating Category 4E wide-body aircraft like the Airbus A380 &amp; Boeing 777.
      </p>

      <div class="airport-hero-actions">
        <a href="<?php echo $WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp">
          <i class="fa-brands fa-whatsapp"></i> <span>Inquire for Airport Corridor Plots</span>
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
          <div class="airport-stat-icon"><i class="fa-solid fa-plane-departure"></i></div>
          <div class="airport-stat-val">4,000m</div>
          <div class="airport-stat-lbl">Dual 4E Runways</div>
        </div>

        <div class="airport-stat-card">
          <div class="airport-stat-icon"><i class="fa-solid fa-vector-square"></i></div>
          <div class="airport-stat-val">3,523 Acres</div>
          <div class="airport-stat-lbl">Total Land Parcel</div>
        </div>

        <div class="airport-stat-card">
          <div class="airport-stat-icon"><i class="fa-solid fa-users"></i></div>
          <div class="airport-stat-val">3.5M &rarr; 50M</div>
          <div class="airport-stat-lbl">Passenger Capacity</div>
        </div>

        <div class="airport-stat-card">
          <div class="airport-stat-icon"><i class="fa-solid fa-indian-rupee-sign"></i></div>
          <div class="airport-stat-val">₹ 1,305 Cr</div>
          <div class="airport-stat-lbl">Phase 1 Investment</div>
        </div>

        <div class="airport-stat-card">
          <div class="airport-stat-icon"><i class="fa-solid fa-location-crosshairs"></i></div>
          <div class="airport-stat-val">15 Km</div>
          <div class="airport-stat-lbl">Distance to SIR &amp; Plots</div>
        </div>

        <div class="airport-stat-card">
          <div class="airport-stat-icon"><i class="fa-solid fa-boxes-packing"></i></div>
          <div class="airport-stat-val">Multi-Modal</div>
          <div class="airport-stat-lbl">Cargo &amp; Freight Hub</div>
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
          <img src="assets/images/dholera-airport.jpg" alt="Dholera International Airport Aerial Master Plan View" loading="lazy">
          <div class="airport-media-caption">
            <strong>Dholera International Airport (DIACL)</strong> &bull; Fast-Track Phase 1 Passenger &amp; Dedicated Air Cargo Terminal.
          </div>
        </div>

        <div>
          <span class="section-tag"><i class="fa-solid fa-certificate"></i> Project Overview</span>
          <h2 style="font-size: 2.1rem; font-weight: 900; color: #0f172a; line-height: 1.25; margin-bottom: 16px;">
            The Next-Generation Aviation Gateway of Western India
          </h2>
          <p style="font-size: 0.95rem; color: #475569; line-height: 1.65; margin-bottom: 16px;">
            Constructed by the <strong>Dholera International Airport Company Limited (DIACL)</strong>—a joint venture between the <strong>Airports Authority of India (AAI - 51%)</strong>, <strong>Government of Gujarat (33%)</strong>, and <strong>NICDIT (16%)</strong>—this greenfield facility is master-planned to handle Gujarat’s surging industrial air cargo and international passenger traffic.
          </p>
          <p style="font-size: 0.95rem; color: #475569; line-height: 1.65; margin-bottom: 24px;">
            Located at <strong>Navagam village</strong>, just <strong>15 kilometers</strong> from Dholera Special Investment Region (SIR) Activation Zone, the airport solves the saturation problem of Ahmedabad’s Sardar Vallabhbhai Patel International (SVPI) Airport, acting as a second international hub with seamless expressway connectivity.
          </p>

          <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 14px 18px; display: flex; gap: 14px; align-items: center;">
            <i class="fa-solid fa-shield-halved" style="color: #10b981; font-size: 1.6rem; flex-shrink: 0;"></i>
            <div style="font-size: 0.88rem; color: #334155;">
              <strong>Strategic Govt. Priority:</strong> All environmental clearances, land acquisitions, and runway civil contracts have been fast-tracked for operational commercial flight readiness.
            </div>
          </div>
        </div>
      </div>

      <!-- Specs 4-Box Grid -->
      <div class="airport-specs-grid" style="margin-top: 48px;">
        <div class="airport-spec-box">
          <div class="airport-spec-icon-box"><i class="fa-solid fa-plane"></i></div>
          <div class="airport-spec-body">
            <h4>Code 4E Wide-Body Runways</h4>
            <p>Phase 1 features a 4,000-meter primary runway and 3,200-meter secondary runway capable of landing Boeing 777-300ER, Boeing 747 freighters, and Airbus A380 aircraft without payload limits.</p>
          </div>
        </div>

        <div class="airport-spec-box">
          <div class="airport-spec-icon-box"><i class="fa-solid fa-truck-fast"></i></div>
          <div class="airport-spec-body">
            <h4>Dedicated Air Cargo &amp; Cold Chain Hub</h4>
            <p>Engineered for high-value logistics, including temperature-controlled cold storage for Gujarat’s pharma clusters and secure rapid handling for Tata's ₹91,000 Cr semiconductor chip fabrication.</p>
          </div>
        </div>

        <div class="airport-spec-box">
          <div class="airport-spec-icon-box"><i class="fa-solid fa-road"></i></div>
          <div class="airport-spec-body">
            <h4>Ahmedabad-Dholera Expressway Link</h4>
            <p>Direct grade-separated interchange connecting the 109 km 6-lane access-controlled expressway (NH 751), ensuring a fast 45-minute drive from Ahmedabad to the airport departure terminal.</p>
          </div>
        </div>

        <div class="airport-spec-box">
          <div class="airport-spec-icon-box"><i class="fa-solid fa-train-subway"></i></div>
          <div class="airport-spec-body">
            <h4>Integrated Metro &amp; Rapid Rail (RRTS)</h4>
            <p>Planned dedicated metro station inside the airport terminal complex linking directly to Ahmedabad SVPI Airport, GIFT City, and Dholera City Center for seamless inter-city transit.</p>
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
        <h2 class="section-title">Distance Matrix from Dholera International Airport</h2>
        <p class="section-desc">
          Strategically positioned to serve Dholera SIR, Ahmedabad, and the entire Saurashtra-Central Gujarat industrial corridor.
        </p>
      </div>

      <div style="max-width: 900px; margin: 0 auto; overflow-x: auto;">
        <table class="distance-matrix-table">
          <thead>
            <tr>
              <th>Destination / Key Zone</th>
              <th>Distance (Km)</th>
              <th>Estimated Travel Time</th>
              <th>Access Route</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>Mayur Signature 2 (Rojka Township)</strong></td>
              <td><span class="dist-badge">15 – 18 Km</span></td>
              <td><strong>15 – 18 Mins</strong></td>
              <td>Direct 55m Arterial Central Highway</td>
            </tr>
            <tr>
              <td><strong>Dholera SIR TP-1 &amp; TP-2 Activation Zone</strong></td>
              <td><span class="dist-badge">15 Km</span></td>
              <td><strong>15 Mins</strong></td>
              <td>Town Planning Expressway Link Road</td>
            </tr>
            <tr>
              <td><strong>Tata Semiconductor Fab Hub (Dholera)</strong></td>
              <td><span class="dist-badge">14 Km</span></td>
              <td><strong>14 Mins</strong></td>
              <td>Dedicated High-Tech Industrial Feeder Corridor</td>
            </tr>
            <tr>
              <td><strong>Ahmedabad Ring Road (Sarkhej)</strong></td>
              <td><span class="dist-badge">75 Km</span></td>
              <td><strong>45 Mins</strong></td>
              <td>109 Km 6-Lane Expressway (NH 751)</td>
            </tr>
            <tr>
              <td><strong>Bhavnagar Commercial City Center</strong></td>
              <td><span class="dist-badge">60 Km</span></td>
              <td><strong>45 Mins</strong></td>
              <td>NH 751 Extension / Coastal Highway</td>
            </tr>
            <tr>
              <td><strong>Vadodara Industrial Corridor</strong></td>
              <td><span class="dist-badge">110 Km</span></td>
              <td><strong>75 Mins</strong></td>
              <td>Via Tarapur-Vasad 6-Lane Expressway</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- ======================================================================
       7. REAL ESTATE AEROTROPOLIS INVESTMENT IMPACT
       ====================================================================== -->
  <section class="airport-section" style="background: #ffffff;">
    <div class="container">
      <div class="section-header">
        <span class="section-tag"><i class="fa-solid fa-chart-line"></i> The Aerotropolis Effect</span>
        <h2 class="section-title">Why Land Near Dholera Airport Delivers 3X – 5X Appreciation</h2>
        <p class="section-desc">
          Historical data across Indian smart cities proves that infrastructure-backed international airports create exponential land value appreciation.
        </p>
      </div>

      <div class="aerotropolis-grid">
        <div class="aero-card">
          <div class="aero-num">01</div>
          <h4>The Airport Multiplier Effect</h4>
          <p>Global aerotropolises like Bangalore (Devanahalli), Hyderabad (Shamshabad), and Noida (Jewar) saw agricultural and plotted land surge by <strong>300% to 700%</strong> between runway construction and first commercial flight operations.</p>
        </div>

        <div class="aero-card">
          <div class="aero-num">02</div>
          <h4>Massive Commercial &amp; Hotel Inflow</h4>
          <p>Airport corridors generate unprecedented demand for international transit hotels, commercial corporate plazas, airline crew accommodation, and automated logistics warehouses, driving high rental yields.</p>
        </div>

        <div class="aero-card">
          <div class="aero-num">03</div>
          <h4>Rojka &amp; TP Zones: Prime Beneficiaries</h4>
          <p>Residential gated townships situated 15–20 minutes from the terminal—such as <strong>Rojka (Mayur Signature 2)</strong>—offer the sweet spot: peaceful suburban luxury living away from flight path noise, yet rapid airport access.</p>
        </div>
      </div>

      <!-- Spotlight on Mayur Signature 2 -->
      <div style="margin-top: 48px; background: linear-gradient(135deg, #070d19 0%, #0f1c38 100%); border: 1.5px solid #d4af37; border-radius: 16px; padding: 32px 28px; color: #ffffff; display: flex; flex-direction: column; gap: 20px;">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 14px;">
          <div>
            <span style="background: #fef3c7; color: #92400e; font-size: 0.72rem; font-weight: 800; padding: 4px 12px; border-radius: 999px; text-transform: uppercase;">Featured Investment Opportunity</span>
            <h3 style="font-size: 1.6rem; font-weight: 900; margin-top: 8px; color: #ffffff;"><?php echo htmlspecialchars($PROJECT_NAME); ?> &bull; Rojka, Dholera</h3>
            <p style="color: #cbd5e1; font-size: 0.92rem; margin-top: 4px;">638 Plots Approved Gated Community &bull; Just 15–18 Mins from Dholera International Airport</p>
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
       8. FREQUENTLY ASKED QUESTIONS (AIRPORT SPECIFIC)
       ====================================================================== -->
  <section class="airport-section" style="background: #f8fafc; border-top: 1px solid #e2e8f0;">
    <div class="container">
      <div class="section-header">
        <span class="section-tag"><i class="fa-solid fa-circle-question"></i> Airport FAQs</span>
        <h2 class="section-title">Common Questions About Dholera International Airport</h2>
        <p class="section-desc">
          Key facts on project timelines, airlines, runway readiness, and real estate impact.
        </p>
      </div>

      <div class="airport-faq-wrap">
        <div class="faq-accordion">
          <!-- FAQ 1 -->
          <div class="faq-item active">
            <button class="faq-question" type="button" aria-expanded="true">
              <div class="faq-q-left">
                <span class="faq-q-num">01</span>
                <span class="faq-q-title">When is Dholera International Airport expected to become operational?</span>
              </div>
              <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
            </button>
            <div class="faq-answer" style="display: block;">
              <div class="faq-answer-inner">
                <p>
                  Phase 1 of Dholera Greenfield International Airport is on a <strong>fast-track construction timeline</strong> with completion and commercial cargo and flight trials targeted for <strong>2025–2026</strong>. Runway civil works, terminal building foundation, and air traffic control (ATC) equipment tenders have been awarded by DIACL.
                </p>
              </div>
            </div>
          </div>

          <!-- FAQ 2 -->
          <div class="faq-item">
            <button class="faq-question" type="button" aria-expanded="false">
              <div class="faq-q-left">
                <span class="faq-q-num">02</span>
                <span class="faq-q-title">Will Dholera Airport replace Ahmedabad’s SVPI Airport?</span>
              </div>
              <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
            </button>
            <div class="faq-answer">
              <div class="faq-answer-inner">
                <p>
                  No, Dholera Airport will not replace Ahmedabad SVPI Airport. It will function as a <strong>second complementary international aviation hub</strong>. With Ahmedabad's current single-runway airport facing extreme airspace and terminal saturation, Dholera will handle wide-body long-haul flights, massive international air freight, and spillover passenger traffic.
                </p>
              </div>
            </div>
          </div>

          <!-- FAQ 3 -->
          <div class="faq-item">
            <button class="faq-question" type="button" aria-expanded="false">
              <div class="faq-q-left">
                <span class="faq-q-num">03</span>
                <span class="faq-q-title">How long are the runways and which aircraft can land?</span>
              </div>
              <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
            </button>
            <div class="faq-answer">
              <div class="faq-answer-inner">
                <p>
                  Dholera International Airport features dual runways: a primary <strong>4,000-meter Code 4E runway</strong> and a secondary <strong>3,200-meter runway</strong>. These are among the longest commercial runways in India, fully capable of operating wide-body passenger airliners like the <strong>Airbus A380, A350, Boeing 777-300ER</strong>, and heavy intercontinental cargo freighters without payload restrictions.
                </p>
              </div>
            </div>
          </div>

          <!-- FAQ 4 -->
          <div class="faq-item">
            <button class="faq-question" type="button" aria-expanded="false">
              <div class="faq-q-left">
                <span class="faq-q-num">04</span>
                <span class="faq-q-title">How does airport proximity impact plot prices in Rojka and Dholera SIR?</span>
              </div>
              <div class="faq-icon"><i class="fa-solid fa-chevron-down"></i></div>
            </button>
            <div class="faq-answer">
              <div class="faq-answer-inner">
                <p>
                  Historically, land located within a 15–20 minute drive of new international airports in India experiences the highest capital appreciation (300% to 500% over 3 to 5 years). Plots in <strong>Rojka (such as Mayur Signature 2)</strong> are ideally situated ~15 km from the airport, enjoying direct highway connectivity without noise pollution, making them the top choice for investors seeking immediate registry and assured high rental demand.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======================================================================
       9. BOTTOM CTA BANNER (DIRECT CALL & WHATSAPP)
       ====================================================================== -->
  <section class="bottom-cta-banner" id="contact">
    <div class="container">
      <div class="cta-box-inner">
        <h2 class="cta-box-title">Acquire High-Value Plots Along the Dholera Airport Corridor</h2>
        <p class="cta-box-desc">
          Verified clear-title residential and industrial plots within minutes of Dholera International Airport (DIACL). 100% legal registry, direct highway connectivity, and massive aerotropolis capital appreciation.
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
