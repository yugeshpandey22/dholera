<?php
/**
 * ============================================================================
 * DHOLERA SMART CITY PLOTS - LANDING PAGE CONFIGURATION
 * ============================================================================
 * You can easily update the Phone Number, WhatsApp Number, and other details 
 * here anytime. Changes here will instantly reflect throughout the whole website.
 * ============================================================================
 */

// 📞 Primary Contact Number (Change here anytime!)
$PHONE_RAW        = "8800384461";
$PHONE_DISPLAY    = "+91 8800384461";
$PHONE_TEL        = "tel:+918800384461";

// 💬 WhatsApp Details
$WHATSAPP_NUMBER  = "918800384461";
$WHATSAPP_MESSAGE = "Hi, I am interested in Dholera Smart City plots (Residential / Commercial / Industrial). Please share latest price list, brochure, and site visit details.";
$WHATSAPP_LINK    = "https://wa.me/" . $WHATSAPP_NUMBER . "?text=" . urlencode($WHATSAPP_MESSAGE);

// 🌐 Website & Brand Info
$SITE_NAME        = "Dholera Smart City Plots | Dholera SIR Gujarat";
$LIVE_DOMAIN      = "dholera.adikka.com";
$HTTP_HOST        = $_SERVER['HTTP_HOST'] ?? $LIVE_DOMAIN;
$IS_LOCAL         = (strpos($HTTP_HOST, 'localhost') !== false || strpos($HTTP_HOST, '127.0.0.1') !== false);
$BASE_URI         = $IS_LOCAL ? '/smartcity/' : '/';
$IS_HTTPS         = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') 
                    || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443) 
                    || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');
$SCHEME           = $IS_HTTPS ? 'https' : 'http';
$CANONICAL_URL    = $SCHEME . '://' . ($IS_LOCAL ? $HTTP_HOST : $LIVE_DOMAIN) . $BASE_URI;

// 🔍 Search Engine Verification (Google Search Console)
$GOOGLE_SITE_VERIFICATION = "sXxJAVDTb3B3toE9YnR9Ptnr6WUfXb7d9J-xe92MCnU";

// 📍 Location / Office Info
$OFFICE_LOCATION  = "Dholera Special Investment Region (SIR), TP-1 & TP-2 Activation Zone, Gujarat 382455, India";
$EMAIL_ADDRESS    = "pram.realtyrangers@gmail.com";

// 🏢 Featured Project
$PROJECT_NAME            = "Mayur Signature 2";
$PROJECT_LOCATION        = "Rojka, Dholera Smart City";
$PROJECT_TOTAL_PLOTS     = "638 Plots";
$PROJECT_TYPE            = "Residential Plots (Gated Township)";
$PROJECT_SIZES           = "121.20 to 724.21 Sq. Yds";
$PROJECT_MIN_SIZE        = 121.20;
$PROJECT_MAX_SIZE        = 724.21;
$PROJECT_BASE_RATE       = 12450;
$PROJECT_BASE_RATE_TXT   = "₹ 12,450 / sq. yd";
$PROJECT_DEV_CHARGES     = "₹ 1,003 / sq. yd (850 + 18% GST)";
$PROJECT_DEV_CHARGES_NUM = 1003;
$PROJECT_REGISTRY_MALE   = "5.9%";
$PROJECT_REGISTRY_FEMALE = "4.9%";
$PROJECT_DOC_CHARGES     = "₹ 15,400 (Fixed)";
$PROJECT_DOC_CHARGES_NUM = 15400;
$PROJECT_ASSURED_MONTHLY = "₹ 14,707 / month";
$PROJECT_ASSURED_TOTAL   = "₹ 5,29,470 (3-Year Plan, 1% TDS)";
$PROJECT_SAMPLE_SIZE     = "124.35 Sq. Yds";

// 🏭 Featured Industrial Project
$IND_PROJECT_NAME        = "Mayur Business Park";
$IND_PROJECT_LOCATION    = "Haripura, Fedra-Dhandhuka State Highway, Dholera";
$IND_PROJECT_TOTAL       = "227 Plots";
$IND_PROJECT_TYPE        = "Industrial Plots (Gated Community)";
$IND_PROJECT_SIZES       = "327.49 to 5,912.09 Sq. Yds";
$IND_PROJECT_APPROVALS   = "NA, NOC, Title Clear & Unit Plan Pass";
$IND_PROJECT_HIGHWAY     = "0 KM on 4-Lane State Highway";
$IND_PROJECT_AIRPORT     = "20 KM to Dholera Airport";
$IND_PROJECT_RATE        = 9750;
$IND_PROJECT_RATE_TXT    = "₹ 9,750 / sq. yd";
$IND_PROJECT_DEV_CHARGES = "₹ 1,003 / sq. yd (850 + 18% GST)";
$IND_PROJECT_DEV_CHARGES_NUM = 1003;
$IND_PROJECT_REGISTRY_MALE   = "5.9%";
$IND_PROJECT_REGISTRY_FEMALE = "4.9%";
$IND_PROJECT_DOC_CHARGES     = "₹ 15,400 (Fixed)";
$IND_PROJECT_DOC_CHARGES_NUM = 15400;
$IND_PROJECT_ASSURED_MONTHLY = "₹ 36,638 / month";
$IND_PROJECT_ASSURED_TOTAL   = "₹ 1,354,997 (3-Year Plan, 1% TDS)";
$IND_PROJECT_SAMPLE_SIZE     = "414.65 Sq. Yds";

// 📈 Quick Stats
$HERO_START_PRICE        = "₹ 12,450 / sq. yd*";
$ALL_IN_START_PRICE      = "₹ 14,950 / sq. yd*";
$RESIDENTIAL_START_PRICE = "₹ 12,450 / sq. yd*";
$COMMERCIAL_START_PRICE  = "₹ 12,450 / sq. yd*";
$INDUSTRIAL_START_PRICE  = "₹ 9,750 / sq. yd*";
$INDUSTRIAL_BASE_RATE    = 9750;
