<?php
require_once '../db/config.php';
date_default_timezone_set("Asia/Kuala_lumpur");

function login($username) {
    $conn = db(); 
    $sql = "SELECT * FROM staff WHERE username = '$username'";
    return $conn->query($sql);
}

?>