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
 
 
 <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <!-- User Profile Section -->
    <li class="nav-item">
      <div class="d-flex sidebar-profile">
        <div class="sidebar-profile-image">
          <img src="images/faces/face29.png" alt="profile image">
          <span class="sidebar-status-indicator"></span>
        </div>
        <div class="sidebar-profile-name">
          <p class="sidebar-name">Kenneth Osborne</p>
          <p class="sidebar-designation">Staff</p>
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
      <a class="nav-link" href="index.html">
        <i class="typcn typcn-device-desktop menu-icon"></i>
        <span class="menu-title">Overview</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="calendar.html">
        <i class="typcn typcn-calendar menu-icon"></i>
        <span class="menu-title">Calendar View</span>
      </a>
    </li>

    <!-- Appointment Management -->
    <li class="nav-item">
      <p class="sidebar-menu-title">Appointments</p>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="appointments.html">
        <i class="typcn typcn-time menu-icon"></i>
        <span class="menu-title">All Appointments</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#new-appointment" aria-expanded="false">
        <i class="typcn typcn-user-add menu-icon"></i>
        <span class="menu-title">New Booking</span>
        <i class="typcn typcn-chevron-right menu-arrow"></i>
      </a>
      <div class="collapse" id="new-appointment">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="walk-in.html">Walk-in</a></li>
          <li class="nav-item"><a class="nav-link" href="phone-booking.html">Phone Booking</a></li>
          <li class="nav-item"><a class="nav-link" href="online-booking.html">Online Booking</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="waiting-list.html">
        <i class="typcn typcn-group menu-icon"></i>
        <span class="menu-title">Waiting List</span>
      </a>
    </li>

    <!-- Customer Management -->
    <li class="nav-item">
      <p class="sidebar-menu-title">Customers</p>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="customers.html">
        <i class="typcn typcn-group-outline menu-icon"></i>
        <span class="menu-title">Customer Directory</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="loyalty.html">
        <i class="typcn typcn-star-outline menu-icon"></i>
        <span class="menu-title">Loyalty Program</span>
      </a>
    </li>

    <!-- Services & Products -->
    <li class="nav-item">
      <p class="sidebar-menu-title">Services</p>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#services" aria-expanded="false">
        <i class="typcn typcn-scissors menu-icon"></i>
        <span class="menu-title">Hair Services</span>
        <i class="typcn typcn-chevron-right menu-arrow"></i>
      </a>
      <div class="collapse" id="services">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="haircuts.html">Haircuts</a></li>
          <li class="nav-item"><a class="nav-link" href="coloring.html">Coloring</a></li>
          <li class="nav-item"><a class="nav-link" href="styling.html">Styling</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="products.html">
        <i class="typcn typcn-shopping-cart menu-icon"></i>
        <span class="menu-title">Products</span>
      </a>
    </li>

    <!-- Staff Management -->
    <li class="nav-item">
      <p class="sidebar-menu-title">Staff</p>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="staff-schedule.html">
        <i class="typcn typcn-calendar-outline menu-icon"></i>
        <span class="menu-title">Schedules</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="staff-performance.html">
        <i class="typcn typcn-chart-line-outline menu-icon"></i>
        <span class="menu-title">Performance</span>
      </a>
    </li>

    <!-- Reports & Settings -->
    <li class="nav-item">
      <p class="sidebar-menu-title">System</p>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="reports.html">
        <i class="typcn typcn-document-text menu-icon"></i>
        <span class="menu-title">Reports</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="settings.html">
        <i class="typcn typcn-cog-outline menu-icon"></i>
        <span class="menu-title">Settings</span>
      </a>
    </li>
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





                  <!-- <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="typcn typcn-globe-outline menu-icon"></i>
              <span class="menu-title">Error pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
              <i class="typcn typcn-document-text menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
        </ul> -->
        <!-- <ul class="sidebar-legend">
          <li>
            <p class="sidebar-menu-title">Category</p>
          </li>
          <li class="nav-item"><a href="#" class="nav-link">#Sales</a></li>
          <li class="nav-item"><a href="#" class="nav-link">#Marketing</a></li>
          <li class="nav-item"><a href="#" class="nav-link">#Growth</a></li>
        </ul> -->