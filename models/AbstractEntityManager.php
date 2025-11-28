<?php

// Models.
include_once("DBConnect.php");

// Abstract database interaction class.
abstract class AbstractEntityManager {
    
    // Copy of the database connection instance.
    protected $db;

    // Fetch a copy of the database connection instance.
    public function __construct() {
        $this->db = DBConnect::getInstance();
    }
}