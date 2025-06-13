<li class="nav-item nav-profile dropdown">
    <a class="nav-link dropdown-toggle pl-0 pr-0" href="#" data-toggle="dropdown" id="profileDropdown">
        <i class="typcn typcn-user-outline mr-0"></i>
        <span class="nav-profile-name"><?php echo htmlspecialchars($user->staff_name) ?></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
        <a class="dropdown-item" href="settings.php">
            <i class="typcn typcn-cog text-primary"></i>
            Settings
        </a>
        <a class="dropdown-item" href="#" id="logout-btn">  <!-- Changed this line -->
            <i class="typcn typcn-power text-primary"></i>
            Logout
        </a>
    </div>
</li>

<?php
require "../global/header.php";
?>

<script>
$(document).ready(function() {
    $('#logout-btn').click(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Logout Confirmation',
            text: 'Are you sure you want to logout?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, logout!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../controller/logout_exec.php';
            }
        });
    });
});
</script>