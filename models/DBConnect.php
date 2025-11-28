<?php

// Config.
include_once("./config/config.php");

// Database singleton manager.
class DBConnect
{
    // Unique manager and database instance.
    private static $instance;
    private $db;

    // Instantiate singleton manager.
    private function __construct() {

        // Database connection.
        $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    // Get unique DBConnect instance.
    public static function getInstance() : DBConnect {
        
        // Create and return unique instance.
        if (!self::$instance) {
            self::$instance = new DBConnect();
        }
        return self::$instance;
    }

    // Get unique PDO instance.
    public function getPDO() : PDO {
        return $this->db;
    }

    // Send formatted query to SQL database.
    public function query(string $sql, ?array $params = null) : PDOStatement {

        // Use prepare method when parameters are specified.
        if ($params == null) {
            $query = $this->db->query($sql);
        } else {
            $query = $this->db->prepare($sql);
            $query->execute($params);
        }
        return $query;
    }
}