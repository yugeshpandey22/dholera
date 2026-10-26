# Dholera Smart City Plots Portal

Official web portal and landing platform for **Dholera Smart City Plots** (Dholera Special Investment Region - SIR, Gujarat).

## 🚀 Overview
- **Domain:** [http://dholera.adikka.com/](http://dholera.adikka.com/)
- **Tech Stack:** PHP 7.4+ / 8.x, Vanilla CSS3, JavaScript (ES6+), Apache HTTP Server with mod_rewrite.
- **Key Features:**
  - High-conversion responsive design optimized for mobile and desktop.
  - Modular architecture with reusable components (`includes/header.php`, `includes/footer.php`).
  - Dedicated infrastructure pages (`pages/dholera-international-airport.php`, `pages/dholera-expressway.php`, `pages/dholera-freight-corridor.php`, `pages/dholera-seaport.php`).
  - Centralized configuration via `config.php` (phone numbers, WhatsApp links, project rates, and SEO settings).
  - Clean URL rewriting with `.htaccess`.
  - Full SEO optimization with Google Search Console verification, Schema.org JSON-LD structured data, and dynamic XML sitemap.

## 📂 Project Structure
```text
smartcity/
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── images/
│   └── js/
│       └── main.js
├── includes/
│   ├── header.php
│   └── footer.php
├── pages/
│   ├── dholera-international-airport.php
│   ├── dholera-expressway.php
│   ├── dholera-freight-corridor.php
│   └── dholera-seaport.php
├── .htaccess
├── config.php
├── index.php
├── robots.txt
└── sitemap.xml
```

## 🛠️ Local Development (XAMPP)
1. Place the project directory into `C:/xampp/htdocs/smartcity`.
2. Start Apache from the XAMPP Control Panel.
3. Open `http://localhost/smartcity/` in your web browser.
