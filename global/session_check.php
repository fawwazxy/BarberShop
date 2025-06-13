<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'barber');

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require "../global/header.php";


// Check if user is logged in
if (!isset($_SESSION["auth"]) || $_SESSION["auth"] !== true) {
    echo '<script>
    $(document).ready(function() {
        Swal.fire({
            title: "Access Failed",
            text: "Please login to access the system.",
            icon: "warning",
            confirmButtonText: "OK",
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "../views/login.php";
            }
        });
    });
    </script>';
    exit;
}

// Safely get staff_id from session with null coalescing
$auth_id = $_SESSION['staff_id'] ?? null;
if (!$auth_id) {
    echo '<script>
    $(document).ready(function() {
        Swal.fire({
            title: "Session Error",
            text: "Your session is invalid. Please login again.",
            icon: "error",
            confirmButtonText: "OK"
        }).then(() => {
            window.location.href = "../views/login.php";
        });
    });
    </script>';
    exit;
}

/**
 * Get authenticated user information
 */
function getAuthInfo($userID) {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    
    if (!$conn) {
        error_log("Database connection error: " . mysqli_connect_error());
        return false;
    }

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM staff WHERE staff_id = ?");
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    
    $result = $stmt->get_result();
    return $result->fetch_object();
}

/**
 * Restrict access based on user role
 */
function blockAccess($role_list) {
    if (!isset($_SESSION['role']) || in_array($_SESSION['role'], $role_list)) {
        echo '<script>
        $(document).ready(function() {
            Swal.fire({
                title: "Request Declined!",
                text: "You are not authorized to access this page",
                icon: "warning",
                confirmButtonText: "OK",
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.history.back();
                }
            });
        });
        </script>';
        exit();
    }
}