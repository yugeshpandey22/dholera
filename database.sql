-- =====================================================================
-- DHOLERA SMART CITY (DHOLERA.TOP) - COMPLETE DATABASE SCHEMA
-- Compatible with MySQL 5.7+, MySQL 8.0+, MariaDB 10+
-- Collation: utf8mb4_unicode_ci
-- =====================================================================

CREATE DATABASE IF NOT EXISTS `dholera_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `dholera_db`;

-- ---------------------------------------------------------------------
-- 1. LEADS TABLE (Stores all inquiries from website & ads)
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `leads` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `lead_id` VARCHAR(64) NOT NULL,
  `name` VARCHAR(150) NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  `interest` VARCHAR(255) DEFAULT 'Residential Plots',
  `form_source` VARCHAR(100) DEFAULT 'Website Inquiry',
  `traffic_source` VARCHAR(100) DEFAULT 'Direct Traffic',
  `traffic_type` VARCHAR(50) DEFAULT 'Direct',
  `device` VARCHAR(30) DEFAULT 'Mobile',
  `ip_address` VARCHAR(45) DEFAULT NULL,
  `status` ENUM('New', 'Contacted', 'Interested', 'Site Visit Booked', 'Closed', 'Invalid') NOT NULL DEFAULT 'New',
  `notes` TEXT DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_lead_id` (`lead_id`),
  KEY `idx_phone` (`phone`),
  KEY `idx_created_at` (`created_at`),
  KEY `idx_traffic_type` (`traffic_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- 2. DAILY TRAFFIC STATS TABLE (Daily Aggregated Analytics)
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `traffic_stats` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `stat_date` DATE NOT NULL,
  `views` INT UNSIGNED NOT NULL DEFAULT 0,
  `unique_visitors` INT UNSIGNED NOT NULL DEFAULT 0,
  `google_ads` INT UNSIGNED NOT NULL DEFAULT 0,
  `instagram_ads` INT UNSIGNED NOT NULL DEFAULT 0,
  `meta_ads` INT UNSIGNED NOT NULL DEFAULT 0,
  `google_organic` INT UNSIGNED NOT NULL DEFAULT 0,
  `direct` INT UNSIGNED NOT NULL DEFAULT 0,
  `other` INT UNSIGNED NOT NULL DEFAULT 0,
  `mobile_count` INT UNSIGNED NOT NULL DEFAULT 0,
  `desktop_count` INT UNSIGNED NOT NULL DEFAULT 0,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_stat_date` (`stat_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- 3. VISITORS LOG TABLE (Real-Time Visitor Activity Stream)
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `visitors_log` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` VARCHAR(45) DEFAULT NULL,
  `source_name` VARCHAR(100) DEFAULT 'Direct Traffic',
  `source_type` VARCHAR(50) DEFAULT 'Direct',
  `device` VARCHAR(30) DEFAULT 'Mobile',
  `page_url` VARCHAR(255) DEFAULT '/',
  `referrer` VARCHAR(255) DEFAULT 'Direct',
  `visited_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_visited_at` (`visited_at`),
  KEY `idx_source_type` (`source_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- 4. ADMIN USERS TABLE (Optional - For Secure DB Auth)
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password_hash` VARCHAR(255) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `role` VARCHAR(20) NOT NULL DEFAULT 'admin',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
