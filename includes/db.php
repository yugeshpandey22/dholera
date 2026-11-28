<?php
/**
 * DHOLERA SMART CITY - HYBRID DATABASE HELPER
 * Supports MySQL / MariaDB and automatic SQLite database.
 * Auto-creates tables and provides fail-safe JSON/CSV fallback.
 */

if (!isset($DB_HOST)) {
    require_once __DIR__ . '/../config.php';
}

class DholeraDB {
    private static ?PDO $pdo = null;
    private static string $driverType = 'none';

    /**
     * Get or initialize database connection (MySQL or SQLite)
     */
    public static function getConnection(): ?PDO {
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        global $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS, $DB_PORT;

        // 1. Try MySQL if credentials are provided in config.php
        if (!empty($DB_NAME) && !empty($DB_USER)) {
            try {
                $host = !empty($DB_HOST) ? $DB_HOST : 'localhost';
                $port = !empty($DB_PORT) ? $DB_PORT : '3306';
                $dsn = "mysql:host={$host};port={$port};dbname={$DB_NAME};charset=utf8mb4";
                self::$pdo = new PDO($dsn, $DB_USER, $DB_PASS, [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_SILENT,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_TIMEOUT            => 3,
                ]);
                self::$driverType = 'mysql';
                self::initTables('mysql');
                return self::$pdo;
            } catch (Throwable $e) {}
        }

        // 2. Try Automatic SQLite Database in data/dholera_database.sqlite (Zero-Config SQL Database)
        try {
            $drivers = PDO::getAvailableDrivers();
            if (in_array('sqlite', $drivers)) {
                $dataDir = dirname(__DIR__) . '/data';
                if (!is_dir($dataDir)) {
                    @mkdir($dataDir, 0755, true);
                }
                $sqliteFile = $dataDir . '/dholera_database.sqlite';
                self::$pdo = new PDO("sqlite:" . $sqliteFile, null, null, [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_SILENT,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
                @chmod($sqliteFile, 0666);
                self::$driverType = 'sqlite';
                self::initTables('sqlite');
                return self::$pdo;
            }
        } catch (Throwable $e) {}

        return null;
    }

    /**
     * Automatically ensure tables exist
     */
    private static function initTables(string $driver): void {
        if (!self::$pdo) return;
        try {
            if ($driver === 'sqlite') {
                self::$pdo->exec("
                    CREATE TABLE IF NOT EXISTS leads (
                      id INTEGER PRIMARY KEY AUTOINCREMENT,
                      lead_id TEXT UNIQUE,
                      name TEXT NOT NULL,
                      phone TEXT NOT NULL,
                      email TEXT DEFAULT NULL,
                      interest TEXT DEFAULT 'Residential Plots',
                      message TEXT DEFAULT NULL,
                      form_source TEXT DEFAULT 'Contact Us Form',
                      traffic_source TEXT DEFAULT 'Direct Traffic',
                      traffic_type TEXT DEFAULT 'Direct',
                      device TEXT DEFAULT 'Mobile',
                      ip_address TEXT DEFAULT NULL,
                      status TEXT DEFAULT 'New',
                      notes TEXT DEFAULT NULL,
                      created_at DATETIME DEFAULT CURRENT_TIMESTAMP
                    );
                ");
            } else {
                self::$pdo->exec("
                    CREATE TABLE IF NOT EXISTS `leads` (
                      `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                      `lead_id` VARCHAR(64) NOT NULL,
                      `name` VARCHAR(150) NOT NULL,
                      `phone` VARCHAR(20) NOT NULL,
                      `email` VARCHAR(150) DEFAULT NULL,
                      `interest` VARCHAR(255) DEFAULT 'Residential Plots',
                      `message` TEXT DEFAULT NULL,
                      `form_source` VARCHAR(100) DEFAULT 'Contact Us Form',
                      `traffic_source` VARCHAR(100) DEFAULT 'Direct Traffic',
                      `traffic_type` VARCHAR(50) DEFAULT 'Direct',
                      `device` VARCHAR(30) DEFAULT 'Mobile',
                      `ip_address` VARCHAR(45) DEFAULT NULL,
                      `status` VARCHAR(50) NOT NULL DEFAULT 'New',
                      `notes` TEXT DEFAULT NULL,
                      `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                      PRIMARY KEY (`id`),
                      UNIQUE KEY `idx_lead_id` (`lead_id`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
                ");
            }
        } catch (Throwable $e) {}
    }

    /**
     * Save a lead into SQL Database
     */
    public static function insertLead(array $lead): bool {
        $db = self::getConnection();
        if (!$db) return false;

        try {
            if (self::$driverType === 'sqlite') {
                $stmt = $db->prepare("
                    INSERT OR REPLACE INTO leads 
                    (lead_id, name, phone, email, interest, message, form_source, traffic_source, traffic_type, device, ip_address, status)
                    VALUES
                    (:lead_id, :name, :phone, :email, :interest, :message, :form_source, :traffic_source, :traffic_type, :device, :ip_address, :status)
                ");
            } else {
                $stmt = $db->prepare("
                    INSERT INTO `leads` 
                    (`lead_id`, `name`, `phone`, `email`, `interest`, `message`, `form_source`, `traffic_source`, `traffic_type`, `device`, `ip_address`, `status`)
                    VALUES
                    (:lead_id, :name, :phone, :email, :interest, :message, :form_source, :traffic_source, :traffic_type, :device, :ip_address, :status)
                    ON DUPLICATE KEY UPDATE `phone` = VALUES(`phone`)
                ");
            }

            return $stmt->execute([
                ':lead_id'        => $lead['id'] ?? ('LD-' . time() . '-' . rand(100, 999)),
                ':name'           => $lead['name'] ?? '',
                ':phone'          => $lead['phone'] ?? '',
                ':email'          => $lead['email'] ?? '',
                ':interest'       => $lead['interest'] ?? '',
                ':message'        => $lead['message'] ?? '',
                ':form_source'    => $lead['form'] ?? 'Contact Us Form',
                ':traffic_source' => $lead['source'] ?? 'Direct',
                ':traffic_type'   => $lead['source_type'] ?? 'Direct',
                ':device'         => $lead['device'] ?? 'Mobile',
                ':ip_address'     => $lead['ip'] ?? '',
                ':status'         => $lead['status'] ?? 'New'
            ]);
        } catch (Throwable $e) {
            return false;
        }
    }

    /**
     * Fetch all leads from SQL Database
     */
    public static function getLeads(int $limit = 500): ?array {
        $db = self::getConnection();
        if (!$db) return null;

        try {
            $stmt = $db->prepare("SELECT * FROM leads ORDER BY id DESC LIMIT :limit");
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            $rows = $stmt->fetchAll();

            return array_map(function($r) {
                return [
                    'id'          => $r['lead_id'] ?? ('LD-' . $r['id']),
                    'name'        => $r['name'],
                    'phone'       => $r['phone'],
                    'email'       => $r['email'] ?? '',
                    'interest'    => $r['interest'],
                    'message'     => $r['message'] ?? '',
                    'form'        => $r['form_source'],
                    'source'      => $r['traffic_source'],
                    'source_type' => $r['traffic_type'],
                    'device'      => $r['device'],
                    'ip'          => $r['ip_address'],
                    'time'        => date('d-M-Y h:i A', strtotime($r['created_at'])),
                    'status'      => $r['status']
                ];
            }, $rows);
        } catch (Throwable $e) {
            return null;
        }
    }

    /**
     * Delete a lead by lead_id
     */
    public static function deleteLead(string $leadId): bool {
        $db = self::getConnection();
        if (!$db) return false;

        try {
            $stmt = $db->prepare("DELETE FROM leads WHERE lead_id = :id");
            return $stmt->execute([':id' => $leadId]);
        } catch (Throwable $e) {
            return false;
        }
    }

    /**
     * Check if database connection is active
     */
    public static function isConnected(): bool {
        return self::getConnection() !== null;
    }

    /**
     * Get active driver ('mysql', 'sqlite', or 'none')
     */
    public static function getDriverType(): string {
        return self::$driverType;
    }
}
