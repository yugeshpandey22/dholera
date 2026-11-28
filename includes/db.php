<?php
/**
 * DHOLERA SMART CITY - DATABASE HELPER (MySQL & PDO)
 * Seamless database connectivity for leads and analytics.
 * Supports auto-fallback: if DB is not configured, silently uses JSON/CSV.
 */

if (!isset($DB_HOST)) {
    require_once __DIR__ . '/../config.php';
}

class DholeraDB {
    private static ?PDO $pdo = null;
    private static bool $connected = false;

    /**
     * Get or initialize PDO database connection
     */
    public static function getConnection(): ?PDO {
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        global $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS, $DB_PORT;

        // If credentials are not set, return null (fallback mode)
        if (empty($DB_NAME) || empty($DB_USER)) {
            return null;
        }

        $host = !empty($DB_HOST) ? $DB_HOST : 'localhost';
        $port = !empty($DB_PORT) ? $DB_PORT : '3306';
        $charset = 'utf8mb4';

        $dsn = "mysql:host={$host};port={$port};dbname={$DB_NAME};charset={$charset}";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_SILENT,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::ATTR_TIMEOUT            => 3,
        ];

        try {
            self::$pdo = new PDO($dsn, $DB_USER, $DB_PASS, $options);
            self::$connected = true;
            self::initTables();
            return self::$pdo;
        } catch (Throwable $e) {
            self::$connected = false;
            return null;
        }
    }

    /**
     * Automatically ensure leads and traffic tables exist
     */
    private static function initTables(): void {
        if (!self::$pdo) return;
        try {
            self::$pdo->exec("
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
                  `status` VARCHAR(50) NOT NULL DEFAULT 'New',
                  `notes` TEXT DEFAULT NULL,
                  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                  PRIMARY KEY (`id`),
                  UNIQUE KEY `idx_lead_id` (`lead_id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
            ");
        } catch (Throwable $e) {}
    }

    /**
     * Save a new lead to MySQL Database
     */
    public static function insertLead(array $lead): bool {
        $db = self::getConnection();
        if (!$db) return false;

        try {
            $stmt = $db->prepare("
                INSERT INTO `leads` 
                (`lead_id`, `name`, `phone`, `interest`, `form_source`, `traffic_source`, `traffic_type`, `device`, `ip_address`, `status`)
                VALUES
                (:lead_id, :name, :phone, :interest, :form_source, :traffic_source, :traffic_type, :device, :ip_address, :status)
                ON DUPLICATE KEY UPDATE `phone` = VALUES(`phone`)
            ");

            return $stmt->execute([
                ':lead_id'        => $lead['id'] ?? ('LD-' . time() . '-' . rand(100, 999)),
                ':name'           => $lead['name'] ?? '',
                ':phone'          => $lead['phone'] ?? '',
                ':interest'       => $lead['interest'] ?? '',
                ':form_source'    => $lead['form'] ?? 'Website Inquiry',
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
     * Fetch all leads from MySQL Database
     */
    public static function getLeads(int $limit = 500): ?array {
        $db = self::getConnection();
        if (!$db) return null;

        try {
            $stmt = $db->prepare("SELECT * FROM `leads` ORDER BY `id` DESC LIMIT :limit");
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            $rows = $stmt->fetchAll();

            // Format rows to match admin UI
            return array_map(function($r) {
                return [
                    'id'          => $r['lead_id'] ?? ('LD-' . $r['id']),
                    'name'        => $r['name'],
                    'phone'       => $r['phone'],
                    'interest'    => $r['interest'],
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
            $stmt = $db->prepare("DELETE FROM `leads` WHERE `lead_id` = :id");
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
}
