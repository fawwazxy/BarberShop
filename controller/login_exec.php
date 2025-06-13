<?php
session_start();
require "../model/userfunction.php";

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$fail = '';

echo $username;
echo $password;


// Call login function
$login = login($username);

if(mysqli_num_rows($login) > 0) {
    $login = $login->fetch_assoc();

    if (password_verify($password, $login['password'])) {
        // Regenerate session ID for security
        session_regenerate_id(true);
        
        // Set session variables
        $_SESSION["auth"] = true;
        $_SESSION["staff_id"] = $login['staff_id'];
        $_SESSION["name"] = $login['staff_name'];
        $_SESSION["username"] = $login['username'];

        // Redirect to dashboard
        echo "<script>window.location.href = '../views/dashboard.php';</script>";
        exit();
    } else {
        $fail = 'Failed to login. Invalid Username or Password.';
    }
} else {
    $fail = "Username not found!";
}

require "../global/header.php";

if($fail != ""): ?>
<script>
    $(document).ready(function() {
        Swal.fire({
            title: 'Login Failed',
            text: '<?php echo addslashes($fail); ?>',
            icon: 'error',
            confirmButtonText: 'OK',
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.history.back();
            }
        });
    });
</script>
<?php endif; ?>