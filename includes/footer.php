<?php
/**
 * Common Footer Template
 * Dholera Smart City Plots
 */
if (!isset($PHONE_RAW)) {
  require_once __DIR__ . '/../config.php';
}
?>
  <!-- ======================================================================
       LUXURY FOOTER
       ====================================================================== -->
  <footer class="footer">
    <div class="container">
      <div class="footer-grid">
        <!-- Col 1: Brand Info -->
        <div>
          <a href="<?php echo $BASE_URI; ?>" class="footer-logo-box" title="Dholera Special Investment Region" data-section="home">
            <img src="assets/images/dholera-logo.svg" alt="Dholera Special Investment Region Logo" class="footer-logo-img">
          </a>
          <p class="footer-about-text">
            Specializing in verified residential and industrial plots for sale in Dholera Special Investment Region (SIR), Gujarat. Providing 100% legal title-clear land advisory with zero brokerage.
          </p>
          <div class="footer-trust-badge">
            <i class="fa-solid fa-shield-halved"></i>
            <span>Govt. Backed DMIC Greenfield Smart City</span>
          </div>
        </div>

        <!-- Col 2: Quick Links -->
        <div>
          <h4 class="footer-heading">Quick Navigation</h4>
          <div class="footer-links-list">
            <a href="<?php echo $BASE_URI; ?>" data-section="home"><i class="fa-solid fa-chevron-right"></i> Home Overview</a>
            <a href="<?php echo $BASE_URI; ?>about" data-section="about"><i class="fa-solid fa-chevron-right"></i> About Dholera SIR</a>
            <a href="<?php echo $BASE_URI; ?>plots" data-section="plots"><i class="fa-solid fa-chevron-right"></i> Residential &amp; Industrial Plots</a>
            <a href="<?php echo $BASE_URI; ?>why-invest" data-section="why-invest"><i class="fa-solid fa-chevron-right"></i> Why Invest in Dholera</a>
            <a href="<?php echo $BASE_URI; ?>dholera-international-airport"><i class="fa-solid fa-chevron-right"></i> International Airport (DIACL)</a>
            <a href="<?php echo $BASE_URI; ?>dholera-expressway"><i class="fa-solid fa-chevron-right"></i> 6-Lane Expressway (NH 751)</a>
            <a href="<?php echo $BASE_URI; ?>dholera-freight-corridor"><i class="fa-solid fa-chevron-right"></i> Freight Corridor (Western DFC)</a>
            <a href="<?php echo $BASE_URI; ?>dholera-seaport"><i class="fa-solid fa-chevron-right"></i> Proposed Deep-Water Sea Port</a>
            <a href="<?php echo $BASE_URI; ?>pricing" data-section="pricing"><i class="fa-solid fa-chevron-right"></i> Plot Price Estimator</a>
            <a href="<?php echo $BASE_URI; ?>faqs" data-section="faqs"><i class="fa-solid fa-chevron-right"></i> Frequently Asked Questions</a>
          </div>
        </div>

        <!-- Col 3: Direct Contact Details -->
        <div>
          <h4 class="footer-heading">Direct Investor Desk</h4>
          <div class="footer-contact-item">
            <i class="fa-solid fa-phone"></i>
            <div>
              <strong style="color: #94a3b8; font-size: 0.78rem; text-transform: uppercase;">Call Us Directly:</strong><br>
              <a href="<?php echo $PHONE_TEL; ?>" style="color: #ffffff; font-weight: 700; font-size: 0.95rem;"><?php echo htmlspecialchars($PHONE_DISPLAY); ?></a>
            </div>
          </div>
          <div class="footer-contact-item">
            <i class="fa-brands fa-whatsapp" style="color: #25d366;"></i>
            <div>
              <strong style="color: #94a3b8; font-size: 0.78rem; text-transform: uppercase;">Instant WhatsApp:</strong><br>
              <a href="<?php echo $WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer" style="color: #25d366; font-weight: 700;">+91 <?php echo htmlspecialchars($PHONE_RAW); ?></a>
            </div>
          </div>
          <div class="footer-contact-item">
            <i class="fa-solid fa-envelope" style="color: #38bdf8;"></i>
            <div>
              <strong style="color: #94a3b8; font-size: 0.78rem; text-transform: uppercase;">Email Assistance:</strong><br>
              <a href="mailto:<?php echo htmlspecialchars($EMAIL_ADDRESS); ?>" style="color: #ffffff;"><?php echo htmlspecialchars($EMAIL_ADDRESS); ?></a>
            </div>
          </div>
          <div class="footer-contact-item">
            <i class="fa-solid fa-location-dot" style="color: #f59e0b;"></i>
            <div>
              <strong style="color: #94a3b8; font-size: 0.78rem; text-transform: uppercase;">Site / Regional Office:</strong><br>
              <span style="color: #cbd5e1; font-size: 0.82rem; line-height: 1.4; display: block; margin-top: 2px;"><?php echo htmlspecialchars($OFFICE_LOCATION); ?></span>
            </div>
          </div>
        </div>

        <!-- Col 4: Free Site Visit Advisory Card -->
        <div>
          <h4 class="footer-heading">Site Visit Advisory</h4>
          <div class="footer-cta-card">
            <span class="f-cta-badge"><i class="fa-solid fa-car-side"></i> Free Guided Tour</span>
            <h5 class="f-cta-title">Inspect Dholera SIR On-Ground</h5>
            <p class="f-cta-desc">
              Daily guided inspections arranged from Ahmedabad. Review actual activation zones, ABCD building, and your plot coordinates before booking.
            </p>
            <a href="<?php echo $WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer" class="btn-footer-visit whatsapp-pulse">
              <i class="fa-brands fa-whatsapp"></i> Book Site Visit on WhatsApp
            </a>
          </div>
        </div>
      </div>

      <!-- Bottom Bar with Mineib Creative Technology Credit -->
      <div class="footer-bottom">
        <div>&copy; <?php echo date('Y'); ?> Realty Rangers. All Rights Reserved.</div>
        <div class="footer-credit">
          <span>Designed &amp; Developed by</span>
          <a href="https://mineib.com/" target="_blank" rel="noopener noreferrer" class="credit-link" title="Mineib Creative Technology - Digital Agency &amp; Web Solutions">
            <i class="fa-solid fa-laptop-code"></i>
            <span>Mineib Creative Technology</span>
          </a>
        </div>
      </div>
    </div>
  </footer>

  <!-- ======================================================================
       STICKY FLOATING ACTION BUTTONS (MOBILE & DESKTOP)
       ====================================================================== -->
  <!-- Mobile Bottom Sticky Bar -->
  <div class="mobile-sticky-bar">
    <a href="<?php echo $PHONE_TEL; ?>" class="btn btn-call">
      <i class="fa-solid fa-phone"></i> <span>Call: <?php echo htmlspecialchars($PHONE_RAW); ?></span>
    </a>
    <a href="<?php echo $WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp">
      <i class="fa-brands fa-whatsapp"></i> <span>WhatsApp</span>
    </a>
  </div>

  <!-- Desktop Floating Bottom-Right Buttons -->
  <div class="desktop-floating-actions">
    <a href="<?php echo $WHATSAPP_LINK; ?>" target="_blank" rel="noopener noreferrer" class="floating-btn wa-float whatsapp-pulse" aria-label="Chat on WhatsApp">
      <i class="fa-brands fa-whatsapp"></i>
      <span class="tooltip-text">Chat on WhatsApp</span>
    </a>
    <a href="<?php echo $PHONE_TEL; ?>" class="floating-btn call-float pulse-animation" aria-label="Call Specialist">
      <i class="fa-solid fa-phone"></i>
      <span class="tooltip-text">Call: <?php echo htmlspecialchars($PHONE_DISPLAY); ?></span>
    </a>
  </div>

  <!-- Bootstrap 5 JavaScript Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Main JavaScript File -->
  <script src="assets/js/main.js?v=<?php echo time(); ?>"></script>
  <?php if (!empty($EXTRA_SCRIPTS)) { echo $EXTRA_SCRIPTS; } ?>
</body>

</html>
