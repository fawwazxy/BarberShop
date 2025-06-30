<?php
session_start();
require_once "../global/session_check.php";
$user = getAuthInfo($_SESSION['staff_id']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Staff Performance Dashboard</title>
    <!-- base:css -->
    <link rel="stylesheet" href="../vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <!-- endinject --> 
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../images/favicon.png" />
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
      
      body {
        font-family: 'Inter', sans-serif;
        min-height: 100vh;
      }
      
      .content-wrapper {
        background: rgba(255, 255, 255, 0.98);
        border-radius: 15px;
        margin: 15px;
        backdrop-filter: blur(10px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
      }
      
      .performance-card {
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        position: relative;
        overflow: hidden;
        border: none;
        min-height: 140px;
      }
      
      .performance-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(45deg, #FF6B35, #F7931E, #FFD23F, #06D6A0);
        background-size: 300% 300%;
        animation: gradient 3s ease infinite;
      }
      
      @keyframes gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
      }
      
      .performance-card:hover {
        transform: translateY(-5px) scale(1.01);
        box-shadow: 0 15px 35px rgba(0,0,0,0.12);
      }
      
      .performance-value {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 5px;
        background: linear-gradient(45deg, #1e3c72, #2a5298);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1.2;
      }
      
      .performance-label {
        font-size: 0.9rem;
        color: #6c757d;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
      }
      
      .star-rating {
        color: #FFB800;
        font-size: 1.5rem;
        filter: drop-shadow(0 2px 4px rgba(255, 184, 0, 0.3));
      }
      
      .progress {
        height: 8px;
        border-radius: 8px;
        background: rgba(0,0,0,0.05);
        overflow: hidden;
        box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
      }
      
      .progress-bar {
        border-radius: 8px;
        background: linear-gradient(45deg, #1e3c72, #2a5298);
        box-shadow: 0 2px 6px rgba(30, 60, 114, 0.4);
        transition: width 0.6s ease;
      }
      
      .table th {
        border-top: none;
        font-weight: 600;
        color: #495057;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
        padding: 15px 12px;
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
      }
      
      .table td {
        padding: 15px 12px;
        vertical-align: middle;
        border-top: 1px solid rgba(0,0,0,0.05);
      }
      
      .table tbody tr {
        transition: all 0.3s ease;
      }
      
      .table tbody tr:hover {
        background: linear-gradient(135deg, rgba(30, 60, 114, 0.05), rgba(42, 82, 152, 0.05));
        transform: scale(1.005);
        box-shadow: 0 3px 10px rgba(0,0,0,0.08);
      }
      
      /* Enhanced color scheme for cards with better visibility */
      .card-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        position: relative;
      }
      
      .card-primary::after {
        content: '📊';
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 2rem;
        opacity: 0.3;
      }
      
      .card-success {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        color: white;
        position: relative;
      }
      
      .card-success::after {
        content: '⭐';
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 2rem;
        opacity: 0.3;
      }
      
      .card-warning {
        background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
        color: #2c3e50;
        position: relative;
      }
      
      .card-warning::after {
        content: '💰';
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 2rem;
        opacity: 0.3;
      }
      
      .card-info {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        position: relative;
      }
      
      .card-info::after {
        content: '🔄';
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 2rem;
        opacity: 0.3;
      }
      
      .card-warning .performance-label,
      .card-warning small {
        color: rgba(44, 62, 80, 0.8) !important;
      }
      
      .card-warning .performance-value {
        background: linear-gradient(45deg, #2c3e50, #34495e);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
      }
      
      .time-period-filter, .staff-selector {
        min-width: 160px;
        border-radius: 10px;
        border: 2px solid rgba(30, 60, 114, 0.2);
        background: white;
        font-weight: 500;
        transition: all 0.3s ease;
      }
      
      .time-period-filter:hover, .staff-selector:hover {
        border-color: #1e3c72;
        box-shadow: 0 4px 12px rgba(30, 60, 114, 0.2);
        transform: translateY(-1px);
      }
      
      .staff-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 10px;
        border: 2px solid rgba(255,255,255,0.8);
        box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
      }
      
      .staff-avatar:hover {
        transform: scale(1.05);
        border-color: #1e3c72;
      }
      
      .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.06);
        transition: all 0.3s ease;
        overflow: hidden;
      }
      
      .card:hover {
        box-shadow: 0 12px 30px rgba(0,0,0,0.1);
        transform: translateY(-3px);
      }
      
      .card-title {
        font-weight: 600;
        color: #2c3e50;
        font-size: 1.2rem;
        margin-bottom: 20px;
        position: relative;
        padding-bottom: 8px;
      }
      
      .card-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 40px;
        height: 3px;
        background: linear-gradient(45deg, #1e3c72, #2a5298);
        border-radius: 2px;
      }
      
      .dropdown-menu {
        border: none;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        padding: 8px 0;
      }
      
      .dropdown-item {
        padding: 10px 16px;
        transition: all 0.3s ease;
        border-radius: 8px;
        margin: 2px 8px;
      }
      
      .dropdown-item:hover {
        background: linear-gradient(135deg, rgba(30, 60, 114, 0.1), rgba(42, 82, 152, 0.1));
        transform: translateX(3px);
      }
      
      .page-title {
        background: linear-gradient(45deg, #1e3c72, #2a5298);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: 0;
      }
      
      .performance-metric {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 15px;
        padding: 12px;
        background: rgba(255,255,255,0.1);
        border-radius: 8px;
        backdrop-filter: blur(10px);
      }
      
      .metric-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,0.2);
        font-size: 1.2rem;
      }
      
      .trend-indicator {
        display: inline-flex;
        align-items: center;
        padding: 3px 6px;
        border-radius: 15px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-left: 8px;
      }
      
      .trend-up {
        background: rgba(6, 214, 160, 0.2);
        color: #06D6A0;
      }
      
      .trend-down {
        background: rgba(255, 107, 53, 0.2);
        color: #FF6B35;
      }
      
      .notification-badge {
        animation: pulse 2s infinite;
      }
      
      @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
      }
      
      .rating-stars {
        display: inline-flex;
        gap: 1px;
      }
      
      .rating-stars i {
        transition: all 0.2s ease;
      }
      
      .rating-stars:hover i {
        transform: scale(1.05);
      }
      
      .performance-badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 15px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
      }
      
      .badge-excellent {
        background: linear-gradient(45deg, #06D6A0, #118D57);
        color: white;
      }
      
      .badge-good {
        background: linear-gradient(45deg, #4ECDC4, #44A08D);
        color: white;
      }
      
      .badge-average {
        background: linear-gradient(45deg, #FF6B35, #F7931E);
        color: white;
      }
      
      /* Make cards more compact */
      .grid-margin {
        margin-bottom: 1.5rem !important;
      }
      
      .card-body {
        padding: 1.5rem;
      }
      
      .performance-card .card-body {
        padding: 1.25rem;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img src="../images/logoss.jpg" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../images/logoss.jpg" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <ul class="navbar-nav mr-lg-2">
            <li class="nav-item d-none d-lg-flex">
              <a class="nav-link" href="calendar.php">
                <i class="typcn typcn-calendar mr-1"></i> Calendar
              </a>
            </li>
            <li class="nav-item d-none d-lg-flex">
              <a class="nav-link active" href="performance.php">
                <i class="typcn typcn-chart-bar-outline mr-1"></i> Performance
              </a>
            </li>
            <li class="nav-item d-none d-lg-flex">
              <a class="nav-link" href="#">
                <i class="typcn typcn-scissors mr-1"></i> Barbers
              </a>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-flex mr-3">
              <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="typcn typcn-bell"></i>
                <span class="count bg-danger notification-badge">4</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header">Latest Updates</p>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="typcn typcn-star"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">🌟 Outstanding Rating!</h6>
                    <p class="font-weight-light small-text mb-0">
                      Sarah received a perfect 5-star review from VIP client
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="typcn typcn-chart-line-outline"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">📈 Revenue Goal</h6>
                    <p class="font-weight-light small-text mb-0">
                      Monthly target achieved 5 days early!
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                      <i class="typcn typcn-user-add"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">💎 Premium Booking</h6>
                    <p class="font-weight-light small-text mb-0">
                      Luxury package scheduled for this afternoon
                    </p>
                  </div>
                </a>
              </div>
            </li>
            <?php
            include "../global/navprofile.php"
            ?>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
          <div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div>
          <div id="theme-settings" class="settings-panel">
            <i class="settings-close typcn typcn-delete-outline"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options" id="sidebar-light-theme">
              <div class="img-ss rounded-circle bg-light border mr-3"></div>
              Light
            </div>
            <div class="sidebar-bg-options selected" id="sidebar-dark-theme">
              <div class="img-ss rounded-circle bg-dark border mr-3"></div>
              Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
              <div class="tiles success"></div>
              <div class="tiles warning"></div>
              <div class="tiles danger"></div>
              <div class="tiles primary"></div>
              <div class="tiles info"></div>
              <div class="tiles dark"></div>
              <div class="tiles default border"></div>
            </div>
          </div>
        </div>
        <?php include "../components/sidebar.php" ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                  <h3 class="page-title">🏆 Performance Dashboard</h3>
                  <div class="d-flex">
                    <div class="dropdown mr-3">
                      <button class="btn btn-outline-secondary dropdown-toggle staff-selector" type="button" id="staffDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="../images/faces/face1.jpg" class="staff-avatar" alt="Staff">
                        All Team Members
                      </button>
                      <div class="dropdown-menu" aria-labelledby="staffDropdown">
                        <a class="dropdown-item staff-filter active" href="#" data-staff="all">
                          <img src="../images/faces/face1.jpg" class="staff-avatar" alt="All Staff">
                          🌟 All Team Members
                        </a>
                        <a class="dropdown-item staff-filter" href="#" data-staff="john">
                          <img src="../images/faces/face2.jpg" class="staff-avatar" alt="John">
                          ✂️ John Smith - Senior Stylist
                        </a>
                        <a class="dropdown-item staff-filter" href="#" data-staff="mike">
                          <img src="../images/faces/face3.jpg" class="staff-avatar" alt="Mike">
                          🪒 Mike Johnson - Master Barber
                        </a>
                        <a class="dropdown-item staff-filter" href="#" data-staff="sarah">
                          <img src="../images/faces/face4.jpg" class="staff-avatar" alt="Sarah">
                          💫 Sarah Williams - VIP Specialist
                        </a>
                        <a class="dropdown-item staff-filter" href="#" data-staff="david">
                          <img src="../images/faces/face5.jpg" class="staff-avatar" alt="David">
                          🎨 David Brown - Color Expert
                        </a>
                      </div>
                    </div>
                    <div class="dropdown">
                      <button class="btn btn-outline-secondary dropdown-toggle time-period-filter" type="button" id="timePeriodDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        📅 This Month
                      </button>
                      <div class="dropdown-menu" aria-labelledby="timePeriodDropdown">
                        <a class="dropdown-item time-filter" href="#" data-period="today">🌅 Today</a>
                        <a class="dropdown-item time-filter" href="#" data-period="week">📊 This Week</a>
                        <a class="dropdown-item time-filter active" href="#" data-period="month">📈 This Month</a>
                        <a class="dropdown-item time-filter" href="#" data-period="year">🎯 This Year</a>
                        <a class="dropdown-item time-filter" href="#" data-period="all">⭐ All Time</a>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Summary Cards for All Staff -->
                <div class="row">
                  <div class="col-md-3 grid-margin stretch-card">
                    <div class="card performance-card card-primary">
                      <div class="card-body">
                        <div class="performance-value">
                          <span id="total-appointments">428</span>
                          <span class="trend-indicator trend-up">↗ +12%</span>
                        </div>
                        <div class="performance-label">Total Appointments</div>
                        <div class="performance-metric">
                          <div>
                            <small>🏆 Top: <strong><span id="top-performer-appointments">Sarah (112)</span></strong></small><br>
                            <small>📊 Average: <strong><span id="avg-appointments">85.6</span></strong></small>
                          </div>
                          <div class="metric-icon">📅</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-3 grid-margin stretch-card">
                    <div class="card performance-card card-success">
                      <div class="card-body">
                        <div class="performance-value">
                          <span id="avg-rating-all">4.7</span>
                          <span class="trend-indicator trend-up">↗ +0.3</span>
                        </div>
                        <div class="performance-label">Excellence Rating</div>
                        <div class="rating-stars star-rating mt-2">
                          <i class="typcn typcn-star"></i>
                          <i class="typcn typcn-star"></i>
                          <i class="typcn typcn-star"></i>
                          <i class="typcn typcn-star"></i>
                          <i class="typcn typcn-star"></i>
                          <small class="ml-2">(<span id="total-reviews">284</span> reviews)</small>
                        </div>
                        <div class="performance-metric">
                          <div>
                            <small>🌟 Best: <strong><span id="top-rated-staff">Sarah (4.9)</span></strong></small>
                          </div>
                          <div class="metric-icon">⭐</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-3 grid-margin stretch-card">
                    <div class="card performance-card card-warning">
                      <div class="card-body">
                        <div class="performance-value">
                          $<span id="total-revenue">14,580</span>
                          <span class="trend-indicator trend-up">↗ +18%</span>
                        </div>
                        <div class="performance-label">Monthly Revenue</div>
                        <div class="performance-metric">
                          <div>
                            <small>💎 Top: <strong><span id="top-earner">David ($4,250)</span></strong></small><br>
                            <small>💰 Average: <strong><span id="avg-revenue">$2,915</span></strong></small>
                          </div>
                          <div class="metric-icon">💵</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-3 grid-margin stretch-card">
                    <div class="card performance-card card-info">
                      <div class="card-body">
                        <div class="performance-value">
                          <span id="avg-retention">93</span>%
                          <span class="trend-indicator trend-up">↗ +5%</span>
                        </div>
                        <div class="performance-label">Client Retention</div>
                        <div class="performance-metric">
                          <div>
                            <small>🎯 Best: <strong><span id="best-retention">Mike (96%)</span></strong></small><br>
                            <small>📈 Industry: <strong>85%</strong></small>
                          </div>
                          <div class="metric-icon">🔄</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Staff Comparison Chart -->
                <div class="row">
                  <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">🏆 Team Performance Comparison</h4>
                        <p class="card-description">Compare key metrics across all team members</p>
                        <canvas id="comparisonChart"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Individual Staff Performance -->
                <div class="row">
                  <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">📈 Appointment Trends</h4>
                        <p class="card-description">Track appointment volume over time</p>
                        <canvas id="appointmentsChart"></canvas>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">✂️ Service Portfolio</h4>
                        <p class="card-description">Most popular services breakdown</p>
                        <canvas id="servicesChart"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Staff Performance Table -->
                <div class="row">
                  <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">📊 Detailed Performance Analytics</h4>
                        <p class="card-description">Comprehensive view of team performance metrics</p>
                        <div class="table-responsive">
                          <table class="table table-hover" id="staff-performance">
                            <thead>
                              <tr>
                                <th>👨‍💼 Team Member</th>
                                <th>📅 Appointments</th>
                                <th>⭐ Rating</th>
                                <th>💰 Revenue</th>
                                <th>🔄 Retention</th>
                                <th>❤️ Repeat Clients</th>
                                <th>🎯 Performance</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                  <img src="../images/faces/face2.jpg" class="staff-avatar" alt="John">
                                  <strong>John Smith</strong><br>
                                  <small class="text-muted">Senior Stylist</small>
                                </td>
                                <td><strong>104</strong> <span class="trend-indicator trend-up">↗ +8</span></td>
                                <td>
                                  <div class="rating-stars star-rating">
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <small>4.8 (67)</small>
                                  </div>
                                </td>
                                <td><strong>$3,120</strong></td>
                                <td><strong>94%</strong></td>
                                <td><strong>78</strong></td>
                                <td>
                                  <span class="performance-badge badge-excellent">Excellent</span>
                                  <div class="progress mt-2">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <img src="../images/faces/face3.jpg" class="staff-avatar" alt="Mike">
                                  <strong>Mike Johnson</strong><br>
                                  <small class="text-muted">Master Barber</small>
                                </td>
                                <td><strong>94</strong> <span class="trend-indicator trend-up">↗ +12</span></td>
                                <td>
                                  <div class="rating-stars star-rating">
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star-half-outline"></i>
                                    <small>4.6 (52)</small>
                                  </div>
                                </td>
                                <td><strong>$2,940</strong></td>
                                <td><strong>96%</strong></td>
                                <td><strong>71</strong></td>
                                <td>
                                  <span class="performance-badge badge-excellent">Excellent</span>
                                  <div class="progress mt-2">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 92%" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <img src="../images/faces/face4.jpg" class="staff-avatar" alt="Sarah">
                                  <strong>Sarah Williams</strong><br>
                                  <small class="text-muted">VIP Specialist</small>
                                </td>
                                <td><strong>112</strong> <span class="trend-indicator trend-up">↗ +15</span></td>
                                <td>
                                  <div class="rating-stars star-rating">
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <small>4.9 (74)</small>
                                  </div>
                                </td>
                                <td><strong>$4,270</strong></td>
                                <td><strong>91%</strong></td>
                                <td><strong>89</strong></td>
                                <td>
                                  <span class="performance-badge badge-excellent">Outstanding</span>
                                  <div class="progress mt-2">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 98%" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <img src="../images/faces/face5.jpg" class="staff-avatar" alt="David">
                                  <strong>David Brown</strong><br>
                                  <small class="text-muted">Color Expert</small>
                                </td>
                                <td><strong>118</strong> <span class="trend-indicator trend-up">↗ +20</span></td>
                                <td>
                                  <div class="rating-stars star-rating">
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star-half-outline"></i>
                                    <small>4.7 (91)</small>
                                  </div>
                                </td>
                                <td><strong>$4,250</strong></td>
                                <td><strong>89%</strong></td>
                                <td><strong>84</strong></td>
                                <td>
                                  <span class="performance-badge badge-excellent">Excellent</span>
                                  <div class="progress mt-2">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 94%" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Recent Ratings Table -->
                <div class="row">
                  <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">💬 Recent Client Feedback</h4>
                        <p class="card-description">Latest reviews and client satisfaction scores</p>
                        <div class="table-responsive">
                          <table class="table table-hover" id="recent-ratings">
                            <thead>
                              <tr>
                                <th>👨‍💼 Staff Member</th>
                                <th>👤 Client</th>
                                <th>📅 Date</th>
                                <th>⭐ Rating</th>
                                <th>💭 Feedback</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                  <img src="../images/faces/face2.jpg" class="staff-avatar" alt="John">
                                  <strong>John Smith</strong>
                                </td>
                                <td><strong>Alexander Thompson</strong><br><small class="text-muted">VIP Client</small></td>
                                <td>Today, 2:30 PM</td>
                                <td>
                                  <div class="rating-stars star-rating">
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                  </div>
                                </td>
                                <td>🌟 "Absolutely exceptional service! John's attention to detail is remarkable. Best haircut I've ever had!"</td>
                              </tr>
                              <tr>
                                <td>
                                  <img src="../images/faces/face4.jpg" class="staff-avatar" alt="Sarah">
                                  <strong>Sarah Williams</strong>
                                </td>
                                <td><strong>Marcus Rodriguez</strong><br><small class="text-muted">Premium Member</small></td>
                                <td>Today, 11:15 AM</td>
                                <td>
                                  <div class="rating-stars star-rating">
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                  </div>
                                </td>
                                <td>💫 "Sarah is a true artist! The premium treatment was worth every penny. Highly recommend!"</td>
                              </tr>
                              <tr>
                                <td>
                                  <img src="../images/faces/face3.jpg" class="staff-avatar" alt="Mike">
                                  <strong>Mike Johnson</strong>
                                </td>
                                <td><strong>David Chen</strong><br><small class="text-muted">Regular Client</small></td>
                                <td>Yesterday, 4:45 PM</td>
                                <td>
                                  <div class="rating-stars star-rating">
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star-half-outline"></i>
                                  </div>
                                </td>
                                <td>🪒 "Mike's traditional shave technique is perfection. Professional and skilled barber!"</td>
                              </tr>
                              <tr>
                                <td>
                                  <img src="../images/faces/face5.jpg" class="staff-avatar" alt="David">
                                  <strong>David Brown</strong>
                                </td>
                                <td><strong>James Wilson</strong><br><small class="text-muted">New Client</small></td>
                                <td>Yesterday, 1:20 PM</td>
                                <td>
                                  <div class="rating-stars star-rating">
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                  </div>
                                </td>
                                <td>🎨 "Amazing color work! David transformed my look completely. Will definitely return!"</td>
                              </tr>
                              <tr>
                                <td>
                                  <img src="../images/faces/face4.jpg" class="staff-avatar" alt="Sarah">
                                  <strong>Sarah Williams</strong>
                                </td>
                                <td><strong>Robert Martinez</strong><br><small class="text-muted">Corporate Client</small></td>
                                <td>June 27, 3:00 PM</td>
                                <td>
                                  <div class="rating-stars star-rating">
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                  </div>
                                </td>
                                <td>💼 "Perfect for my business meetings. Sarah understands exactly what I need. Top-tier service!"</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 Professional Barbershop Management. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Crafted with ❤️ by <a href="#" target="_blank">Barbershop Excellence Team</a></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="../vendors/chart.js/Chart.min.js"></script>
    <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="../js/dataTables.select.min.js"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="../js/off-canvas.js"></script>
    <script src="../js/hoverable-collapse.js"></script>
    <script src="../js/template.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script>
      $(document).ready(function() {
        // Complete performance data for all staff and periods
        const performanceData = {
          all: {
            today: {
              completed: 24,
              avgRating: 4.8,
              reviews: 12,
              revenue: 780,
              retention: 94,
              repeatClients: 18,
              trendData: [0, 4, 8, 12, 16, 20, 22, 24],
              serviceData: [12, 5, 4, 2, 1],
              staffData: {
                john: { completed: 6, rating: 4.9, revenue: 195 },
                mike: { completed: 5, rating: 4.7, revenue: 165 },
                sarah: { completed: 7, rating: 4.9, revenue: 225 },
                david: { completed: 6, rating: 4.8, revenue: 195 }
              }
            },
            week: {
              completed: 156,
              avgRating: 4.7,
              reviews: 78,
              revenue: 4680,
              retention: 92,
              repeatClients: 118,
              trendData: [20, 25, 22, 28, 32, 24, 18],
              serviceData: [78, 28, 22, 18, 10],
              staffData: {
                john: { completed: 38, rating: 4.8, revenue: 1140 },
                mike: { completed: 35, rating: 4.6, revenue: 1050 },
                sarah: { completed: 42, rating: 4.9, revenue: 1260 },
                david: { completed: 41, rating: 4.7, revenue: 1230 }
              }
            },
            month: {
              completed: 428,
              avgRating: 4.7,
              reviews: 284,
              revenue: 14580,
              retention: 93,
              repeatClients: 322,
              trendData: [95, 108, 118, 107],
              serviceData: [214, 85, 64, 42, 23],
              staffData: {
                john: { completed: 104, rating: 4.8, revenue: 3120 },
                mike: { completed: 94, rating: 4.6, revenue: 2940 },
                sarah: { completed: 112, rating: 4.9, revenue: 4270 },
                david: { completed: 118, rating: 4.7, revenue: 4250 }
              }
            },
            year: {
              completed: 2340,
              avgRating: 4.6,
              reviews: 1450,
              revenue: 78540,
              retention: 91,
              repeatClients: 1850,
              trendData: [165, 182, 195, 210, 225, 238, 230, 245, 255, 268, 275, 260],
              serviceData: [1287, 468, 390, 156, 39],
              staffData: {
                john: { completed: 580, rating: 4.7, revenue: 18500 },
                mike: { completed: 520, rating: 4.5, revenue: 16800 },
                sarah: { completed: 640, rating: 4.8, revenue: 21240 },
                david: { completed: 600, rating: 4.6, revenue: 22000 }
              }
            },
            all: {
              completed: 6850,
              avgRating: 4.6,
              reviews: 4200,
              revenue: 245000,
              retention: 92,
              repeatClients: 5480,
              trendData: [1200, 1500, 1800, 2100],
              serviceData: [3425, 1370, 1233, 548, 274],
              staffData: {
                john: { completed: 1825, rating: 4.7, revenue: 62500 },
                mike: { completed: 1620, rating: 4.5, revenue: 54000 },
                sarah: { completed: 1850, rating: 4.8, revenue: 68500 },
                david: { completed: 1555, rating: 4.6, revenue: 60000 }
              }
            }
          },
          john: {
            today: {
              completed: 6,
              avgRating: 4.9,
              reviews: 3,
              revenue: 195,
              retention: 96,
              repeatClients: 4,
              trendData: [0, 1, 2, 3, 4, 5, 5, 6],
              serviceData: [4, 1, 1, 0, 0]
            },
            week: {
              completed: 38,
              avgRating: 4.8,
              reviews: 18,
              revenue: 1140,
              retention: 94,
              repeatClients: 28,
              trendData: [4, 6, 7, 5, 7, 6, 3],
              serviceData: [20, 8, 6, 3, 1]
            },
            month: {
              completed: 104,
              avgRating: 4.8,
              reviews: 67,
              revenue: 3120,
              retention: 94,
              repeatClients: 78,
              trendData: [20, 25, 30, 29],
              serviceData: [52, 20, 22, 8, 2]
            },
            year: {
              completed: 580,
              avgRating: 4.7,
              reviews: 340,
              revenue: 18500,
              retention: 92,
              repeatClients: 435,
              trendData: [40, 45, 50, 52, 55, 60, 58, 62, 65, 70, 68, 65],
              serviceData: [298, 116, 108, 42, 16]
            },
            all: {
              completed: 1825,
              avgRating: 4.7,
              reviews: 980,
              revenue: 62500,
              retention: 93,
              repeatClients: 1285,
              trendData: [350, 420, 480, 575],
              serviceData: [913, 365, 328, 146, 73]
            }
          },
          mike: {
            today: {
              completed: 5,
              avgRating: 4.7,
              reviews: 2,
              revenue: 165,
              retention: 96,
              repeatClients: 4,
              trendData: [0, 1, 2, 2, 3, 4, 4, 5],
              serviceData: [3, 1, 1, 0, 0]
            },
            week: {
              completed: 35,
              avgRating: 4.6,
              reviews: 16,
              revenue: 1050,
              retention: 95,
              repeatClients: 25,
              trendData: [4, 5, 6, 5, 6, 5, 4],
              serviceData: [18, 7, 6, 3, 1]
            },
            month: {
              completed: 94,
              avgRating: 4.6,
              reviews: 52,
              revenue: 2940,
              retention: 96,
              repeatClients: 71,
              trendData: [18, 22, 26, 28],
              serviceData: [47, 19, 18, 7, 3]
            },
            year: {
              completed: 520,
              avgRating: 4.5,
              reviews: 285,
              revenue: 16800,
              retention: 94,
              repeatClients: 390,
              trendData: [38, 42, 45, 48, 50, 55, 52, 55, 58, 60, 58, 55],
              serviceData: [270, 104, 94, 36, 16]
            },
            all: {
              completed: 1620,
              avgRating: 4.5,
              reviews: 825,
              revenue: 54000,
              retention: 94,
              repeatClients: 1215,
              trendData: [280, 350, 420, 570],
              serviceData: [810, 324, 292, 130, 64]
            }
          },
          sarah: {
            today: {
              completed: 7,
              avgRating: 4.9,
              reviews: 4,
              revenue: 225,
              retention: 95,
              repeatClients: 5,
              trendData: [0, 2, 3, 4, 5, 6, 6, 7],
              serviceData: [5, 1, 1, 0, 0]
            },
            week: {
              completed: 42,
              avgRating: 4.9,
              reviews: 22,
              revenue: 1260,
              retention: 93,
              repeatClients: 32,
              trendData: [5, 7, 8, 6, 8, 6, 2],
              serviceData: [24, 8, 6, 3, 1]
            },
            month: {
              completed: 112,
              avgRating: 4.9,
              reviews: 74,
              revenue: 4270,
              retention: 91,
              repeatClients: 89,
              trendData: [24, 28, 32, 28],
              serviceData: [67, 22, 15, 6, 2]
            },
            year: {
              completed: 640,
              avgRating: 4.8,
              reviews: 410,
              revenue: 21240,
              retention: 90,
              repeatClients: 512,
              trendData: [45, 50, 55, 58, 60, 65, 62, 65, 68, 70, 68, 65],
              serviceData: [384, 128, 96, 24, 8]
            },
            all: {
              completed: 1850,
              avgRating: 4.8,
              reviews: 1125,
              revenue: 68500,
              retention: 91,
              repeatClients: 1480,
              trendData: [400, 480, 560, 650],
              serviceData: [1110, 370, 259, 74, 37]
            }
          },
          david: {
            today: {
              completed: 6,
              avgRating: 4.8,
              reviews: 3,
              revenue: 195,
              retention: 92,
              repeatClients: 3,
              trendData: [0, 1, 2, 3, 4, 5, 5, 6],
              serviceData: [2, 2, 1, 1, 0]
            },
            week: {
              completed: 41,
              avgRating: 4.7,
              reviews: 20,
              revenue: 1230,
              retention: 90,
              repeatClients: 33,
              trendData: [5, 7, 8, 6, 8, 5, 2],
              serviceData: [20, 8, 8, 4, 1]
            },
            month: {
              completed: 118,
              avgRating: 4.7,
              reviews: 91,
              revenue: 4250,
              retention: 89,
              repeatClients: 84,
              trendData: [26, 30, 34, 28],
              serviceData: [59, 24, 20, 12, 3]
            },
            year: {
              completed: 600,
              avgRating: 4.6,
              reviews: 415,
              revenue: 22000,
              retention: 88,
              repeatClients: 480,
              trendData: [42, 48, 52, 55, 58, 60, 58, 60, 62, 65, 62, 60],
              serviceData: [300, 120, 120, 48, 12]
            },
            all: {
              completed: 1555,
              avgRating: 4.6,
              reviews: 1070,
              revenue: 60000,
              retention: 89,
              repeatClients: 1244,
              trendData: [320, 400, 480, 575],
              serviceData: [777, 311, 233, 155, 79]
            }
          }
        };
        
        // Time period labels
        const trendLabels = {
          today: ['9AM', '10AM', '11AM', '12PM', '1PM', '2PM', '3PM', '4PM'],
          week: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
          month: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
          year: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          all: ['2020', '2021', '2022', '2023']
        };
        
        // Initialize charts
        let comparisonChart, appointmentsChart, servicesChart;
        
        // Initialize charts function
        function initCharts(staff = 'all', period = 'month') {
          const data = performanceData[staff][period];
          const labels = trendLabels[period];
          
          // Comparison Chart (only for all staff view)
          if (staff === 'all') {
            const comparisonCtx = document.getElementById('comparisonChart').getContext('2d');
            if (comparisonChart) {
              comparisonChart.destroy();
            }
            
            const allStaffData = performanceData.all[period].staffData;
            comparisonChart = new Chart(comparisonCtx, {
              type: 'bar',
              data: {
                labels: ['John Smith', 'Mike Johnson', 'Sarah Williams', 'David Brown'],
                datasets: [
                  {
                    label: 'Appointments',
                    data: [
                      allStaffData.john.completed,
                      allStaffData.mike.completed,
                      allStaffData.sarah.completed,
                      allStaffData.david.completed
                    ],
                    backgroundColor: 'rgba(30, 60, 114, 0.8)',
                    borderColor: 'rgba(30, 60, 114, 1)',
                    borderWidth: 2,
                    borderRadius: 6,
                    borderSkipped: false,
                  },
                  {
                    label: 'Revenue ($)',
                    data: [
                      allStaffData.john.revenue,
                      allStaffData.mike.revenue,
                      allStaffData.sarah.revenue,
                      allStaffData.david.revenue
                    ],
                    backgroundColor: 'rgba(255, 107, 53, 0.8)',
                    borderColor: 'rgba(255, 107, 53, 1)',
                    borderWidth: 2,
                    borderRadius: 6,
                    borderSkipped: false,
                  }
                ]
              },
              options: {
                responsive: true,
                plugins: {
                  legend: {
                    position: 'top',
                    labels: {
                      usePointStyle: true,
                      font: {
                        family: 'Inter',
                        weight: '500'
                      }
                    }
                  },
                  tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    titleFont: {
                      family: 'Inter',
                      weight: '600'
                    },
                    bodyFont: {
                      family: 'Inter'
                    },
                    cornerRadius: 8,
                    callbacks: {
                      label: function(context) {
                        let label = context.dataset.label || '';
                        if (label) {
                          label += ': ';
                        }
                        if (context.dataset.label === 'Revenue ($)') {
                          label += '$' + context.raw.toLocaleString();
                        } else {
                          label += context.raw;
                        }
                        return label;
                      }
                    }
                  }
                },
                scales: {
                  y: {
                    beginAtZero: true,
                    grid: {
                      color: 'rgba(0, 0, 0, 0.05)'
                    },
                    ticks: {
                      font: {
                        family: 'Inter'
                      }
                    }
                  },
                  x: {
                    grid: {
                      display: false
                    },
                    ticks: {
                      font: {
                        family: 'Inter'
                      }
                    }
                  }
                }
              }
            });
          }
          
          // Appointments Trend Chart
          const appointmentsCtx = document.getElementById('appointmentsChart').getContext('2d');
          if (appointmentsChart) {
            appointmentsChart.destroy();
          }
          
          appointmentsChart = new Chart(appointmentsCtx, {
            type: 'line',
            data: {
              labels: labels,
              datasets: [{
                label: staff === 'all' ? 'Total Appointments' : 'My Appointments',
                data: data.trendData,
                backgroundColor: staff === 'all' ? 'rgba(30, 60, 114, 0.1)' : 'rgba(6, 214, 160, 0.1)',
                borderColor: staff === 'all' ? 'rgba(30, 60, 114, 1)' : 'rgba(6, 214, 160, 1)',
                borderWidth: 3,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: staff === 'all' ? 'rgba(30, 60, 114, 1)' : 'rgba(6, 214, 160, 1)',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 5,
                pointHoverRadius: 7,
              }]
            },
            options: {
              responsive: true,
              plugins: {
                legend: {
                  position: 'top',
                  labels: {
                    usePointStyle: true,
                    font: {
                      family: 'Inter',
                      weight: '500'
                    }
                  }
                },
                tooltip: {
                  backgroundColor: 'rgba(0, 0, 0, 0.8)',
                  titleFont: {
                    family: 'Inter',
                    weight: '600'
                  },
                  bodyFont: {
                    family: 'Inter'
                  },
                  cornerRadius: 8,
                }
              },
              scales: {
                y: {
                  beginAtZero: true,
                  grid: {
                    color: 'rgba(0, 0, 0, 0.05)'
                  },
                  ticks: {
                    font: {
                      family: 'Inter'
                    }
                  }
                },
                x: {
                  grid: {
                    display: false
                  },
                  ticks: {
                    font: {
                      family: 'Inter'
                    }
                  }
                }
              }
            }
          });
          
          // Services Distribution Chart
          const servicesCtx = document.getElementById('servicesChart').getContext('2d');
          if (servicesChart) {
            servicesChart.destroy();
          }
          servicesChart = new Chart(servicesCtx, {
            type: 'doughnut',
            data: {
              labels: ['✂️ Haircut', '🪒 Shave', '🧔 Beard Trim', '🎨 Hair Color', '💎 Premium Package'],
              datasets: [{
                data: data.serviceData,
                backgroundColor: [
                  'rgba(30, 60, 114, 0.8)',
                  'rgba(255, 184, 0, 0.8)',
                  'rgba(6, 214, 160, 0.8)',
                  'rgba(255, 107, 53, 0.8)',
                  'rgba(78, 205, 196, 0.8)'
                ],
                borderColor: [
                  'rgba(30, 60, 114, 1)',
                  'rgba(255, 184, 0, 1)',
                  'rgba(6, 214, 160, 1)',
                  'rgba(255, 107, 53, 1)',
                  'rgba(78, 205, 196, 1)'
                ],
                borderWidth: 2,
                hoverOffset: 8
              }]
            },
            options: {
              responsive: true,
              plugins: {
                legend: {
                  position: 'right',
                  labels: {
                    usePointStyle: true,
                    font: {
                      family: 'Inter',
                      weight: '500'
                    },
                    padding: 15
                  }
                },
                tooltip: {
                  backgroundColor: 'rgba(0, 0, 0, 0.8)',
                  titleFont: {
                    family: 'Inter',
                    weight: '600'
                  },
                  bodyFont: {
                    family: 'Inter'
                  },
                  cornerRadius: 8,
                }
              },
              cutout: '60%'
            }
          });
        }
        
        // Update performance metrics with smooth transitions
        function updateMetrics(staff, period) {
          const data = performanceData[staff][period];
          const allStaffData = performanceData.all[period];
          
          if (staff === 'all') {
            // Update summary cards for all staff view
            updateValue('#total-appointments', allStaffData.completed);
            $('#top-performer-appointments').text("Sarah (" + allStaffData.staffData.sarah.completed + ")");
            $('#avg-appointments').text((allStaffData.completed / 4).toFixed(1));
            
            updateValue('#avg-rating-all', allStaffData.avgRating, 1);
            $('#total-reviews').text(allStaffData.reviews);
            $('#top-rated-staff').text("Sarah (" + allStaffData.staffData.sarah.rating + ")");
            
            updateValue('#total-revenue', allStaffData.revenue);
            $('#top-earner').text("David ($" + allStaffData.staffData.david.revenue.toLocaleString() + ")");
            $('#avg-revenue').text("$" + (allStaffData.revenue / 4).toLocaleString());
            
            updateValue('#avg-retention', allStaffData.retention);
            $('#best-retention').text("Mike (96%)");
            
            // Restore original labels for team view
            $('.performance-label').eq(0).text('Total Appointments');
            $('.performance-label').eq(1).text('Excellence Rating');
            $('.performance-label').eq(2).text('Monthly Revenue');
            $('.performance-label').eq(3).text('Client Retention');
          } else {
            // Update for individual staff member
            updateValue('#total-appointments', data.completed);
            $('#top-performer-appointments').text("Target: " + Math.round(data.completed * 1.1));
            $('#avg-appointments').text("Personal Best");
            
            updateValue('#avg-rating-all', data.avgRating, 1);
            $('#total-reviews').text(data.reviews);
            $('#top-rated-staff').text("Goal: 5.0");
            
            updateValue('#total-revenue', data.revenue);
            $('#top-earner').text("Target: $" + Math.round(data.revenue * 1.15).toLocaleString());
            $('#avg-revenue').text("This Period");
            
            updateValue('#avg-retention', data.retention);
            $('#best-retention').text("Goal: 98%");
            
            // Update card labels for individual view
            $('.performance-label').eq(0).text('Appointments');
            $('.performance-label').eq(1).text('Rating');
            $('.performance-label').eq(2).text('Revenue');
            $('.performance-label').eq(3).text('Retention');
          }
        }
        
        // Update values with smart animation (only animate if value actually changes)
        function updateValue(selector, newValue, decimals = 0) {
          const element = $(selector);
          const currentText = element.text().replace(/,/g, '');
          const currentValue = decimals > 0 ? parseFloat(currentText) : parseInt(currentText);
          
          // Only animate if the value is actually different
          if (Math.abs(currentValue - newValue) > 0.1) {
            animateValue(selector, currentValue, newValue, 800, decimals);
          } else {
            // Just set the value directly if it's the same or very close
            element.text(decimals > 0 ? newValue.toFixed(decimals) : Math.floor(newValue).toLocaleString());
          }
        }
        
        // Animate number values smoothly
        function animateValue(selector, start, end, duration, decimals = 0) {
          const element = $(selector);
          
          // Clear any existing animation
          element.stop(true, false);
          
          const range = end - start;
          const startTime = Date.now();
          
          function updateAnimation() {
            const elapsed = Date.now() - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            // Use easing function for smoother animation
            const easeProgress = 1 - Math.pow(1 - progress, 3);
            const current = start + (range * easeProgress);
            
            if (decimals > 0) {
              element.text(current.toFixed(decimals));
            } else {
              element.text(Math.floor(current).toLocaleString());
            }
            
            if (progress < 1) {
              requestAnimationFrame(updateAnimation);
            } else {
              // Ensure final value is exact
              element.text(decimals > 0 ? end.toFixed(decimals) : Math.floor(end).toLocaleString());
            }
          }
          
          requestAnimationFrame(updateAnimation);
        }
        
        // Staff filter handler
        $('.staff-filter').on('click', function(e) {
          e.preventDefault();
          const staff = $(this).data('staff');
          
          $('.staff-filter').removeClass('active');
          $(this).addClass('active');
          
          if (staff === 'all') {
            $('#staffDropdown').html('<img src="../images/faces/face1.jpg" class="staff-avatar" alt="Staff"> 🌟 All Team Members');
          } else {
            const name = $(this).text().trim();
            const img = $(this).find('img').clone();
            $('#staffDropdown').empty().append(img).append(name);
          }
          
          const period = $('.time-filter.active').data('period');
          
          setTimeout(() => updateMetrics(staff, period), 100);
          setTimeout(() => initCharts(staff, period), 200);
          
          if (staff === 'all') {
            $('#comparisonChart').closest('.card').fadeIn(300);
          } else {
            $('#comparisonChart').closest('.card').fadeOut(300);
          }
        });
        
        // Time period filter handler
        $('.time-filter').on('click', function(e) {
          e.preventDefault();
          const period = $(this).data('period');
          
          $('.time-filter').removeClass('active');
          $(this).addClass('active');
          
          const icon = $(this).text().split(' ')[0];
          const text = $(this).text().substring(2);
          $('#timePeriodDropdown').html(icon + ' ' + text);
          
          const staff = $('.staff-filter.active').data('staff');
          
          setTimeout(() => updateMetrics(staff, period), 100);
          setTimeout(() => initCharts(staff, period), 200);
        });
        
        // Initialize data tables
        if ($('#staff-performance').length) {
          $('#staff-performance').DataTable({
            "aLengthMenu": [
              [5, 10, 15, -1],
              [5, 10, 15, "All"]
            ],
            "iDisplayLength": 10,
            "language": {
              search: "",
              searchPlaceholder: "Search team members..."
            },
            "order": [[1, "desc"]],
            "columnDefs": [
              { "orderable": false, "targets": 6 }
            ]
          });
        }
        
        if ($('#recent-ratings').length) {
          $('#recent-ratings').DataTable({
            "aLengthMenu": [
              [5, 10, 15, -1],
              [5, 10, 15, "All"]
            ],
            "iDisplayLength": 5,
            "language": {
              search: "",
              searchPlaceholder: "Search feedback..."
            },
            "order": [[2, "desc"]],
            "columnDefs": [
              { "orderable": false, "targets": [3, 4] }
            ]
          });
        }
        
        // Initial load
        setTimeout(() => updateMetrics('all', 'month'), 300);
        setTimeout(() => initCharts('all', 'month'), 500);
      });
    </script>
  </body>
</html>