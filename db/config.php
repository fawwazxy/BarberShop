<?php
// Set default timezone
date_default_timezone_set("Asia/Kuala_Lumpur");

/**
 * Database Configuration
 */
if (!defined('DB_HOST')) define('DB_HOST', 'localhost');
if (!defined('DB_USER')) define('DB_USER', 'root');
if (!defined('DB_PASSWORD')) define('DB_PASSWORD', '');
if (!defined('DB_DATABASE')) define('DB_DATABASE', 'barber');

/**
 * Database Connection Singleton
 */
function db() {
    static $conn = null;
    
    if ($conn === null) {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        
        // Check connection
        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        
        // Set charset to utf8
        mysqli_set_charset($conn, "utf8");
    }
    
    return $conn;
}

// Initialize connection on include
$GLOBALS['conn'] = db();