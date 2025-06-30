<style>
    /* Fixed Sidebar CSS - Add this to your main CSS file */
.sidebar.sidebar-offcanvas {
    position: fixed !important;
    top: 0;
    left: 0;
    height: 100vh !important;
    overflow-y: auto !important;
    overflow-x: hidden !important;
    z-index: 1000;
}

/* Adjust main content to not hide behind sidebar */
.page-body-wrapper {
    margin-left: 260px; /* Adjust based on your sidebar width */
}

.main-panel {
    margin-left: 0;
}

/* Custom scrollbar for sidebar */
.sidebar::-webkit-scrollbar {
    width: 6px;
}

.sidebar::-webkit-scrollbar-track {
    background: rgba(0,0,0,0.1);
}

.sidebar::-webkit-scrollbar-thumb {
    background: rgba(0,0,0,0.3);
    border-radius: 3px;
}

/* Mobile responsive */
@media (max-width: 991px) {
    .sidebar.sidebar-offcanvas {
        transform: translateX(-100%);
    }
    
    .sidebar.sidebar-offcanvas.active {
        transform: translateX(0);
    }
    
    .page-body-wrapper {
        margin-left: 0;
    }
}

/* Submenu toggle functionality */
.nav-link[data-toggle="collapse"] .menu-arrow {
    transition: transform 0.3s ease;
}

.nav-link[data-toggle="collapse"][aria-expanded="true"] .menu-arrow {
    transform: rotate(90deg);
}
</style>

<?php
require_once "../global/session_check.php";
$user = getAuthInfo($_SESSION['staff_id']);
?>
 
<!-- partial -->
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <!-- User Profile Section -->
    <li class="nav-item">
      <div class="d-flex sidebar-profile">
        <div class="sidebar-profile-image">
          <img src="../images/faces/face29.png" alt="profile image">
          <span class="sidebar-status-indicator"></span>
        </div>
        <div class="sidebar-profile-name">
          <p class="sidebar-name"><?php echo htmlspecialchars($user->staff_name) ?></p>
          <p class="sidebar-designation"><?php echo htmlspecialchars(ucfirst($user->role)) ?></p>
        </div>
      </div>
      <div class="nav-search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search..." aria-label="search">
          <div class="input-group-append">
            <span class="input-group-text">
              <i class="typcn typcn-zoom"></i>
            </span>
          </div>
        </div>
      </div>
    </li>

    <!-- Dashboard Section -->
    <li class="nav-item">
      <p class="sidebar-menu-title">Dashboard</p>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../views/dashboard.php">
        <i class="typcn typcn-device-desktop menu-icon"></i>
        <span class="menu-title">Overview</span>
      </a>
    </li>
        <li class="nav-item">
      <a class="nav-link" href="../views/income.php">
        <i class="typcn typcn-device-desktop menu-icon"></i>
        <span class="menu-title">Income Statistics</span>
      </a>
    </li>
    
    <?php if ($user->role === 'admin'): ?>
    <!-- Admin menu items -->
    <li class="nav-item">
      <p class="sidebar-menu-title">Management</p>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../views/all_staffschedule.php">
        <i class="typcn typcn-calendar-outline menu-icon"></i>
        <span class="menu-title">Staff Schedules</span>
      </a>
    </li>
        <li class="nav-item">
      <a class="nav-link" href="appointments.php">
        <i class="typcn typcn-chart-line-outline menu-icon"></i>
        <span class="menu-title">Appointments</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="perfomance.php">
        <i class="typcn typcn-chart-line-outline menu-icon"></i>
        <span class="menu-title">Staff Performance</span>
      </a>
    </li>
    <li class="nav-item">
      <p class="sidebar-menu-title">Review</p>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="Feedback.php">
        <i class="typcn typcn-document-text menu-icon"></i>
        <span class="menu-title">Feedback</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../views/customer.php">
        <i class="typcn typcn-group-outline menu-icon"></i>
        <span class="menu-title">Customer Directory</span>
      </a>
    </li>
    
    <?php else: ?>
    <!-- Regular staff menu items -->
    <li class="nav-item">
      <p class="sidebar-menu-title">My Work</p>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../views/staff_schedule.php">
        <i class="typcn typcn-calendar-outline menu-icon"></i>
        <span class="menu-title">My Schedule</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="myAppointment.php">
        <i class="typcn typcn-time menu-icon"></i>
        <span class="menu-title">My Appointments</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../views/myPerfomance.php">
        <i class="typcn typcn-chart-line-outline menu-icon"></i>
        <span class="menu-title">My Performance</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#services" aria-expanded="false">
        <i class="typcn typcn-scissors menu-icon"></i>
        <span class="menu-title">My Services</span>
        <i class="typcn typcn-chevron-right menu-arrow"></i>
      </a>
      <div class="collapse" id="services">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="../views/services.php">Haircuts</a></li>
          <li class="nav-item"><a class="nav-link" href="coloring.html">Coloring</a></li>
          <li class="nav-item"><a class="nav-link" href="styling.html">Styling</a></li>
        </ul>
      </div>
    </li>
    <?php endif; ?>
  </ul>
</nav>

<script>
    // Make sure the active menu items stay visible when scrolling
document.addEventListener('DOMContentLoaded', function() {
  const sidebar = document.getElementById('sidebar');
  const currentActive = sidebar.querySelector('.nav-item.active');
  
  if(currentActive) {
    currentActive.scrollIntoView({block: "center"});
  }
});
</script>