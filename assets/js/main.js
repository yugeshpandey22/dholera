/**
 * DHOLERA SMART CITY PLOTS - INTERACTIVE LOGIC & SEO SCRIPTS
 */

// ============================================================================
// SECURITY & ANTI-INSPECT PROTECTION
// Disables Right-Click Context Menu, Ctrl+U (View Source), F12 & DevTools Shortcuts
// ============================================================================
(function() {
  'use strict';

  // 1. Disable Right-Click Context Menu (Prevents 'View Page Source' & 'Inspect')
  document.addEventListener('contextmenu', function(e) {
    var targetTag = e.target && e.target.tagName ? e.target.tagName.toUpperCase() : '';
    // Allow right click only on text inputs / textareas so users can paste their inquiries
    if (targetTag === 'INPUT' || targetTag === 'TEXTAREA') {
      return true;
    }
    e.preventDefault();
    e.stopPropagation();
    return false;
  }, true);

  // 2. Disable Keyboard Shortcuts (Ctrl+U, F12, Ctrl+Shift+I/J/C, Ctrl+S)
  document.addEventListener('keydown', function(e) {
    // F12 (DevTools)
    if (e.key === 'F12' || e.keyCode === 123) {
      e.preventDefault();
      e.stopPropagation();
      return false;
    }

    var isCtrlOrCmd = e.ctrlKey || e.metaKey;

    // Ctrl+U / Cmd+Option+U (View Source)
    if (isCtrlOrCmd && (e.key === 'u' || e.key === 'U' || e.keyCode === 85)) {
      e.preventDefault();
      e.stopPropagation();
      return false;
    }

    // Ctrl+Shift+I, Ctrl+Shift+J, Ctrl+Shift+C (Inspect Element & Console)
    if (isCtrlOrCmd && e.shiftKey && (
      e.key === 'I' || e.key === 'i' || e.keyCode === 73 ||
      e.key === 'J' || e.key === 'j' || e.keyCode === 74 ||
      e.key === 'C' || e.key === 'c' || e.keyCode === 67
    )) {
      e.preventDefault();
      e.stopPropagation();
      return false;
    }

    // Ctrl+S / Cmd+S (Save Page)
    if (isCtrlOrCmd && (e.key === 's' || e.key === 'S' || e.keyCode === 83)) {
      e.preventDefault();
      e.stopPropagation();
      return false;
    }
  }, true);
})();

document.addEventListener('DOMContentLoaded', () => {
  // Config reference
  const CONFIG = window.DHOLERA_CONFIG || {
    phone: '8800384461',
    phoneFormatted: '+91 8800384461',
    whatsapp: '918800384461',
    defaultMsg: 'Hi, I am interested in Dholera Smart City plots. Please share details.'
  };

  // 1. Mobile Menu Toggle & Backdrop Overlay
  const mobileToggle = document.getElementById('mobileToggle');
  const mobileDrawer = document.getElementById('mobileDrawer');
  let mobileOverlay = document.getElementById('mobileDrawerOverlay');

  // Create backdrop overlay if not present in the DOM
  if (!mobileOverlay && mobileDrawer) {
    mobileOverlay = document.createElement('div');
    mobileOverlay.id = 'mobileDrawerOverlay';
    mobileOverlay.className = 'mobile-drawer-overlay';
    document.body.appendChild(mobileOverlay);
  }

  const openMobileMenu = () => {
    if (!mobileDrawer) return;
    mobileDrawer.classList.add('open');
    if (mobileToggle) {
      mobileToggle.classList.add('active');
      mobileToggle.setAttribute('aria-expanded', 'true');
    }
    if (mobileOverlay) {
      mobileOverlay.classList.add('active');
    }
    document.body.classList.add('menu-open');
  };

  const closeMobileMenu = () => {
    if (!mobileDrawer) return;
    mobileDrawer.classList.remove('open');
    if (mobileToggle) {
      mobileToggle.classList.remove('active');
      mobileToggle.setAttribute('aria-expanded', 'false');
    }
    if (mobileOverlay) {
      mobileOverlay.classList.remove('active');
    }
    document.body.classList.remove('menu-open');
  };

  if (mobileToggle && mobileDrawer) {
    mobileToggle.addEventListener('click', (e) => {
      e.stopPropagation();
      if (mobileDrawer.classList.contains('open')) {
        closeMobileMenu();
      } else {
        openMobileMenu();
      }
    });

    if (mobileOverlay) {
      mobileOverlay.addEventListener('click', closeMobileMenu);
    }

    const drawerCloseBtn = document.getElementById('mobileDrawerClose') || mobileDrawer.querySelector('.mobile-drawer-close');
    if (drawerCloseBtn) {
      drawerCloseBtn.addEventListener('click', closeMobileMenu);
    }

    // Close on link click
    mobileDrawer.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        closeMobileMenu();
      });
    });

    // Close on Escape key press
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && mobileDrawer.classList.contains('open')) {
        closeMobileMenu();
      }
    });
  }

  const getBaseUri = () => {
    if (CONFIG && CONFIG.baseUri) return CONFIG.baseUri;
    return window.location.pathname.indexOf('/smartcity') !== -1 ? '/smartcity/' : '/';
  };

  // 2. Clean URL Routing & Smooth Section Scrolling
  const scrollToSection = (sectionId, updateUrl = true, push = true) => {
    if (!sectionId) return;
    const target = document.getElementById(sectionId);
    if (target) {
      const headerOffset = 76;
      const elementPosition = target.getBoundingClientRect().top;
      const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
      window.scrollTo({
        top: Math.max(0, offsetPosition),
        behavior: 'smooth'
      });

      if (updateUrl && window.history && window.history.pushState) {
        const baseUri = getBaseUri();
        const cleanUrl = (sectionId === 'home') ? baseUri : baseUri + sectionId;
        if (push) {
          window.history.pushState({ section: sectionId }, '', cleanUrl);
        } else {
          window.history.replaceState({ section: sectionId }, '', cleanUrl);
        }
      }
    }
  };

  // Intercept navigation clicks for Clean URLs (without hash)
  document.querySelectorAll('a[data-section], a[href^="#"], .nav-menu a, .mobile-nav-links a, .footer-links-list a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      let section = this.getAttribute('data-section');
      if (!section) {
        const href = this.getAttribute('href') || '';
        if (href.startsWith('#')) {
          section = href.substring(1);
        } else if (!href.includes('://') && !href.startsWith('tel:') && !href.startsWith('mailto:')) {
          section = href.replace(/^\/?(smartcity\/)?/i, '').replace(/\/$/, '');
        }
      }

      if (section && (section === 'home' || document.getElementById(section))) {
        e.preventDefault();
        scrollToSection(section, true, true);
        closeMobileMenu();
      }
    });
  });

  // Handle Browser Back / Forward Buttons
  window.addEventListener('popstate', (e) => {
    let sectionId = (e.state && e.state.section);
    if (!sectionId) {
      const path = window.location.pathname.replace(/^\/smartcity\/?/i, '').replace(/^\//, '').replace(/\/$/, '');
      sectionId = path || 'home';
    }
    scrollToSection(sectionId, false);
  });

  // Initial Route Auto-Scroll on Page Load (e.g. when opening /smartcity/about directly)
  let initialSection = (CONFIG && CONFIG.targetSection) || '';
  if (!initialSection && window.location.hash) {
    initialSection = window.location.hash.replace('#', '');
  }
  if (!initialSection) {
    const cleanPath = window.location.pathname.replace(/^\/smartcity\/?/i, '').replace(/^\//, '').replace(/\/$/, '');
    if (cleanPath && (cleanPath === 'home' || document.getElementById(cleanPath))) {
      initialSection = cleanPath;
    }
  }
  if (initialSection && initialSection !== 'home') {
    setTimeout(() => {
      scrollToSection(initialSection, false);
    }, 150);
  }

  // Active Navigation Highlight on Scroll (ScrollSpy with Clean URL update)
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.nav-link');
  let scrollTimeout;

  const highlightNavOnScroll = () => {
    const scrollY = window.pageYOffset;
    sections.forEach(current => {
      const sectionHeight = current.offsetHeight;
      const sectionTop = current.offsetTop - 120;
      const sectionId = current.getAttribute('id');

      if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
        navLinks.forEach(link => {
          link.classList.remove('active');
          const linkSec = link.getAttribute('data-section') || link.getAttribute('href')?.replace('#', '');
          if (linkSec === sectionId || (sectionId === 'home' && (linkSec === 'home' || linkSec === ''))) {
            link.classList.add('active');
          }
        });

        // Gently update address bar to clean URL as user scrolls
        clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(() => {
          const baseUri = getBaseUri();
          const cleanUrl = (sectionId === 'home') ? baseUri : baseUri + sectionId;
          if (window.history && window.history.replaceState && window.location.pathname !== cleanUrl && !window.location.pathname.endsWith('.php')) {
            window.history.replaceState({ section: sectionId }, '', cleanUrl);
          }
        }, 150);
      }
    });
  };

  window.addEventListener('scroll', highlightNavOnScroll, { passive: true });

  // 3. Interactive Plot Price & ROI Calculator (Luxury Redesign)
  const plotTypeSelect = document.getElementById('calcPlotType');
  const catCards = document.querySelectorAll('.calc-cat-card');
  const plotSizeRange = document.getElementById('calcPlotSize');
  const plotSizeDisplay = document.getElementById('calcSizeVal');
  const sqFtDisplay = document.getElementById('calcSqFtVal');
  const presetChips = document.querySelectorAll('.preset-chip');
  const breakdownRate = document.getElementById('calcBreakdownRate');
  const breakdownArea = document.getElementById('calcBreakdownArea');
  const breakdownToken = document.getElementById('calcBreakdownToken');
  const estPriceDisplay = document.getElementById('calcEstPrice');
  const projRoiDisplay = document.getElementById('calcProjRoi');
  const projRoiVal = document.getElementById('calcProjRoiVal');
  const calcWhatsAppBtn = document.getElementById('calcWhatsAppBtn');

  // Sync category cards click
  catCards.forEach(card => {
    card.addEventListener('click', () => {
      catCards.forEach(c => c.classList.remove('active'));
      card.classList.add('active');
      const selectedType = card.getAttribute('data-type');
      if (plotTypeSelect) {
        plotTypeSelect.value = selectedType;
      }
      onPlotTypeChange(selectedType);
    });
  });

  const onPlotTypeChange = (selectedType) => {
    if (!plotSizeRange) return;
    if (selectedType === 'residential') {
      plotSizeRange.min = '121';
      plotSizeRange.max = '724';
      plotSizeRange.step = '1';
      plotSizeRange.value = '124';
    } else if (selectedType === 'commercial') {
      plotSizeRange.min = '300';
      plotSizeRange.max = '5000';
      plotSizeRange.step = '50';
      plotSizeRange.value = '500';
    } else if (selectedType === 'industrial') {
      plotSizeRange.min = '1000';
      plotSizeRange.max = '10000';
      plotSizeRange.step = '100';
      plotSizeRange.value = '2000';
    }
    calculateEstimate();
  };

  // Sync preset size chips click
  presetChips.forEach(chip => {
    chip.addEventListener('click', () => {
      presetChips.forEach(c => c.classList.remove('active'));
      chip.classList.add('active');
      const sizeVal = parseFloat(chip.getAttribute('data-size'));
      if (plotSizeRange && !isNaN(sizeVal)) {
        plotSizeRange.value = Math.round(sizeVal);
      }
      calculateEstimate();
    });
  });

  const calculateEstimate = () => {
    if (!plotSizeRange) return;

    // Get selected type (fallback to select if available)
    let type = 'residential';
    const activeCard = document.querySelector('.calc-cat-card.active');
    if (activeCard) {
      type = activeCard.getAttribute('data-type');
    } else if (plotTypeSelect) {
      type = plotTypeSelect.value;
    }

    const size = parseFloat(plotSizeRange.value) || 124;
    const sqFt = Math.round(size * 9); // 1 Sq Yard = 9 Sq Feet
    
    // Rates & Charges based on notebook specs
    let baseRate = 12450;
    let devRate = 1003; // 850 + 18% GST
    let docCharges = 15400; // Fixed
    
    if (type === 'commercial') {
      baseRate = 5500;
      devRate = 0;
      docCharges = 0;
    } else if (type === 'industrial') {
      baseRate = 9750;
      devRate = 0;
      docCharges = 0;
    }

    const landTotal = Math.round(size * baseRate);
    const devTotal = Math.round(size * devRate);
    const estTotal = landTotal + devTotal + docCharges;
    const bookingToken = Math.round(landTotal * 0.1); // 10% token

    // Format currency in Indian Rupees style
    const formatINR = (val) => {
      return '₹ ' + Math.round(val).toLocaleString('en-IN');
    };

    // Update slider track fill gradient dynamically
    const min = parseFloat(plotSizeRange.min || '121');
    const max = parseFloat(plotSizeRange.max || '724');
    const percentage = Math.max(0, Math.min(100, ((size - min) / (max - min)) * 100));
    const accentColor = type === 'commercial' ? '#2563eb' : (type === 'industrial' ? '#d97706' : '#dc2626');
    plotSizeRange.style.background = `linear-gradient(to right, ${accentColor} 0%, ${accentColor} ${percentage}%, #e2e8f0 ${percentage}%, #e2e8f0 100%)`;

    // Sync preset chip active state if matching
    presetChips.forEach(chip => {
      const chipSize = parseFloat(chip.getAttribute('data-size'));
      if (Math.round(chipSize) === Math.round(size)) {
        chip.classList.add('active');
      } else {
        chip.classList.remove('active');
      }
    });

    const isSamplePlot = Math.abs(size - 124) < 1;
    const displaySize = isSamplePlot ? '124.35 Sq. Yds' : `${size} Sq. Yds`;
    const displaySqFt = isSamplePlot ? '(1,119 Sq. Ft)' : `(${sqFt.toLocaleString('en-IN')} Sq. Ft)`;

    if (plotSizeDisplay) plotSizeDisplay.textContent = displaySize;
    if (sqFtDisplay) sqFtDisplay.textContent = displaySqFt;
    if (breakdownRate) breakdownRate.textContent = `${formatINR(baseRate)} / yd`;
    if (breakdownArea) breakdownArea.textContent = displaySize;
    if (breakdownToken) breakdownToken.textContent = formatINR(bookingToken);
    if (estPriceDisplay) estPriceDisplay.textContent = formatINR(estTotal);

    const breakdownDev = document.getElementById('calcBreakdownDev');
    if (breakdownDev) {
      breakdownDev.textContent = devRate > 0 ? `${formatINR(devRate)} / yd` : 'Included';
    }

    const roiBadge = document.getElementById('calcRoiBadge');
    const roiTimeline = document.getElementById('calcRoiTimeline');
    const chargesInfo = document.getElementById('calcChargesInfo');

    if (type === 'residential') {
      // Residential (Rojka) Assured Return calculation
      // Notebook benchmark: 124.35 sq yd plot yields ₹ 14,707/month and ₹ 5,29,470 total over 3 years
      const monthlyPayout = isSamplePlot ? 14707 : Math.round((size / 124.35) * 14707);
      const totalPayout = isSamplePlot ? 529470 : (monthlyPayout * 36);

      if (roiBadge) {
        roiBadge.innerHTML = '<i class="fa-solid fa-shield-check"></i> 3-Year Assured Return';
      }
      if (roiTimeline) {
        roiTimeline.textContent = '1% TDS Payout Plan';
      }
      if (projRoiVal) {
        projRoiVal.textContent = `${formatINR(monthlyPayout)} / mo`;
      }
      if (projRoiDisplay) {
        projRoiDisplay.innerHTML = `<i class="fa-solid fa-circle-check"></i> Total 3-Yr Return: <strong>${formatINR(totalPayout)}</strong>`;
      }
      if (chargesInfo) chargesInfo.style.display = 'flex';
    } else {
      // Commercial & Industrial: Appreciation model
      const multiplier = type === 'commercial' ? 2.1 : 2.2;
      const projectedValuation = Math.round(landTotal * multiplier);

      if (roiBadge) {
        roiBadge.innerHTML = '<i class="fa-solid fa-arrow-trend-up"></i> Projected Growth';
      }
      if (roiTimeline) {
        roiTimeline.textContent = 'By 2029';
      }
      if (projRoiVal) {
        projRoiVal.textContent = `${formatINR(projectedValuation)}*`;
      }
      if (projRoiDisplay) {
        projRoiDisplay.innerHTML = `<i class="fa-solid fa-chart-line"></i> High Growth Expressway Corridor`;
      }
      if (chargesInfo) chargesInfo.style.display = 'none';
    }

    // Update WhatsApp link with pre-filled details
    if (calcWhatsAppBtn) {
      let customMsg = '';
      if (type === 'residential') {
        customMsg = `Hi, I checked Residential Plots (Rojka, Dholera) for ${displaySize}. Total package estimate is ${formatINR(estTotal)} (Rate: ₹ 12,450/yd, Dev: ₹ 1,003/yd, Fixed Docs: ₹ 15,400) with 3-Year Assured Return Plan. Please share layout plan & available plot numbers.`;
      } else {
        const typeName = type === 'commercial' ? 'Commercial Plot' : 'Industrial Plot';
        customMsg = `Hi, I calculated an estimate for ${displaySize} ${typeName} in Dholera SIR (${formatINR(estTotal)}). Please share the available plots, layout plan & special offers.`;
      }
      calcWhatsAppBtn.href = `https://wa.me/${CONFIG.whatsapp}?text=${encodeURIComponent(customMsg)}`;
    }
  };

  if (plotTypeSelect && plotSizeRange) {
    plotTypeSelect.addEventListener('change', () => {
      catCards.forEach(c => {
        if (c.getAttribute('data-type') === plotTypeSelect.value) {
          c.classList.add('active');
        } else {
          c.classList.remove('active');
        }
      });
      onPlotTypeChange(plotTypeSelect.value);
    });
    plotSizeRange.addEventListener('input', calculateEstimate);
    // Initial run
    calculateEstimate();
  }

  // 4. FAQ Accordion & Category Filter
  const faqFilterBtns = document.querySelectorAll('.faq-filter-btn');
  const faqItems = document.querySelectorAll('.faq-item');

  if (faqFilterBtns.length > 0) {
    faqFilterBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const filter = btn.getAttribute('data-filter');
        faqFilterBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        let firstItemFound = false;
        faqItems.forEach(item => {
          const itemCat = item.getAttribute('data-category');
          const isMatch = (filter === 'all' || itemCat === filter);

          if (isMatch) {
            item.style.display = '';
            const qBtn = item.querySelector('.faq-question');
            if (!firstItemFound) {
              item.classList.add('active');
              if (qBtn) qBtn.setAttribute('aria-expanded', 'true');
              firstItemFound = true;
            } else {
              item.classList.remove('active');
              if (qBtn) qBtn.setAttribute('aria-expanded', 'false');
            }
          } else {
            item.style.display = 'none';
            item.classList.remove('active');
            const qBtn = item.querySelector('.faq-question');
            if (qBtn) qBtn.setAttribute('aria-expanded', 'false');
          }
        });
      });
    });
  }

  faqItems.forEach(item => {
    const questionBtn = item.querySelector('.faq-question');
    if (questionBtn) {
      questionBtn.addEventListener('click', () => {
        const isActive = item.classList.contains('active');
        // Close other visible items
        faqItems.forEach(otherItem => {
          otherItem.classList.remove('active');
          const otherBtn = otherItem.querySelector('.faq-question');
          if (otherBtn) otherBtn.setAttribute('aria-expanded', 'false');
        });
        // Toggle current item
        if (!isActive) {
          item.classList.add('active');
          questionBtn.setAttribute('aria-expanded', 'true');
        } else {
          item.classList.remove('active');
          questionBtn.setAttribute('aria-expanded', 'false');
        }
      });
    }
  });

  // 5. Header Box Shadow on Scroll
  const header = document.querySelector('.header');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 40) {
      header.style.boxShadow = '0 6px 20px rgba(0, 0, 0, 0.1)';
    } else {
      header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.06)';
    }
  });
});
