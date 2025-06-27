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
    <title>All Staff Schedule Management</title>
    <!-- base:css -->
    <link rel="stylesheet" href="../vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <!-- endinject --> 
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../vendors/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="../vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../images/favicon.png" />
    <style>
      /* Enhanced Features - Original Calendar Styles Maintained */
      .fc-event {
        cursor: pointer;
        border-radius: 4px;
        font-size: 0.85em;
        padding: 2px 5px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      }
      
      .fc-event:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      }
      
      .fc-day-grid-event .fc-content {
        white-space: normal;
      }
      
      .schedule-details {
        display: none;
        position: absolute;
        background: white;
        border: 1px solid #ddd;
        padding: 15px;
        z-index: 1000;
        border-radius: 4px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.15);
      }
      
      .schedule-controls {
        margin-bottom: 20px;
        background: #f8fafc;
        border-radius: 10px;
        padding: 20px;
        border: 1px solid #e2e8f0;
      }
      
      .availability-badge {
        display: inline-block;
        padding: 3px 8px;
        border-radius: 12px;
        font-size: 0.75em;
        font-weight: 600;
        margin-right: 5px;
      }
      
      .fc-toolbar h2 {
        font-size: 1.5em;
        font-weight: 700;
      }
      
      .staff-selector {
        margin-right: 15px;
        min-width: 200px;
      }
      
      .staff-legend {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 15px;
      }
      
      .staff-legend-item {
        display: flex;
        align-items: center;
        margin-right: 15px;
        background: white;
        padding: 8px 15px;
        border-radius: 20px;
        border: 2px solid #e2e8f0;
        transition: all 0.3s ease;
        cursor: pointer;
        font-weight: 600;
      }
      
      .staff-legend-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        border-color: #6366f1;
      }
      
      .staff-legend-item.active {
        background: #6366f1;
        color: white;
        border-color: #6366f1;
      }
      
      .staff-color {
        width: 15px;
        height: 15px;
        border-radius: 3px;
        margin-right: 5px;
        display: inline-block;
        border: 2px solid white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
      }

      /* Enhanced Stats Dashboard */
      .stats-dashboard {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
      }

      .stat-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 25px;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
      }

      .stat-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 100%;
        height: 200%;
        background: rgba(255, 255, 255, 0.1);
        transform: rotate(15deg);
        pointer-events: none;
      }

      .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.2);
      }

      .stat-card.available {
        background: linear-gradient(135deg, #10b981, #059669);
      }

      .stat-card.booked {
        background: linear-gradient(135deg, #6366f1, #4f46e5);
      }

      .stat-card.total {
        background: linear-gradient(135deg, #8b5cf6, #7c3aed);
      }

      .stat-card.rate {
        background: linear-gradient(135deg, #f59e0b, #d97706);
      }

      .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        position: relative;
        z-index: 2;
      }

      .stat-label {
        font-size: 0.9rem;
        opacity: 0.9;
        position: relative;
        z-index: 2;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
      }

      .stat-icon {
        position: absolute;
        top: 15px;
        right: 15px;
        font-size: 2rem;
        opacity: 0.3;
        z-index: 1;
      }

      /* Enhanced Page Header */
      .page-header-enhanced {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 30px;
        border-radius: 15px;
        margin-bottom: 30px;
        position: relative;
        overflow: hidden;
      }

      .page-header-enhanced::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 100%;
        height: 200%;
        background: rgba(255, 255, 255, 0.1);
        transform: rotate(15deg);
        pointer-events: none;
      }

      .page-header-enhanced h3 {
        position: relative;
        z-index: 2;
        margin: 0;
        font-weight: 700;
      }

      .page-header-enhanced .header-actions {
        position: relative;
        z-index: 2;
      }

      /* Enhanced Form Controls */
      .form-control {
        border-radius: 8px;
        border: 2px solid #e2e8f0;
        padding: 12px 15px;
        transition: all 0.3s ease;
        font-weight: 500;
      }

      .form-control:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
      }

      /* Enhanced Calendar */
      .fc-view-container {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
      }

      .fc-toolbar {
        background: #f8fafc;
        padding: 20px;
        border-bottom: 2px solid #e2e8f0;
      }

      .fc-button {
        border-radius: 8px !important;
        padding: 8px 16px !important;
        font-weight: 600 !important;
        border: 2px solid #6366f1 !important;
        margin: 0 3px !important;
        transition: all 0.3s ease !important;
      }

      .fc-button-primary {
        background: #6366f1 !important;
        color: white !important;
      }

      .fc-button-primary:hover {
        background: #4f46e5 !important;
        transform: translateY(-1px) !important;
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.4) !important;
      }

      .fc-button-primary:not(.fc-state-active) {
        background: white !important;
        color: #6366f1 !important;
      }

      /* Enhanced Modal */
      .modal {
        z-index: 1050 !important;
      }
      .modal-backdrop {
        z-index: 1040 !important;
      }
      .modal-dialog {
        z-index: 1060 !important;
        position: relative;
      }
      .modal-content {
        z-index: 1070 !important;
        position: relative;
        border-radius: 15px;
        border: none;
        box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        overflow: hidden;
      }

      .modal-header {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: white;
        padding: 25px;
        border: none;
        position: relative;
      }

      .modal-title {
        font-weight: 700;
        font-size: 1.3rem;
        margin: 0;
      }

      .modal-body {
        padding: 30px;
      }

      .form-group label {
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
        display: block;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.875rem;
      }

      /* Ensure all modal elements are clickable */
      .modal-header,
      .modal-body,
      .modal-footer,
      .modal-header *,
      .modal-body *,
      .modal-footer * {
        position: relative;
        z-index: 1;
        pointer-events: auto;
      }

      .close {
        position: relative;
        z-index: 9999;
        pointer-events: auto;
        background: none;
        border: none;
        font-size: 1.5rem;
        font-weight: 700;
        line-height: 1;
        color: white;
        opacity: 0.8;
        cursor: pointer;
      }

      .close:hover,
      .close:focus {
        color: white;
        text-decoration: none;
        opacity: 1;
      }

      .btn {
        position: relative;
        z-index: 1;
        pointer-events: auto;
        border-radius: 8px;
        padding: 12px 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
      }

      .btn-primary {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: white;
      }

      .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
      }

      .btn-secondary {
        background: #6b7280;
        color: white;
      }

      .btn-secondary:hover {
        background: #4b5563;
        transform: translateY(-2px);
      }

      /* Enhanced Buttons */
      .header-btn {
        background: rgba(255, 255, 255, 0.2);
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: white;
        padding: 8px 16px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
        backdrop-filter: blur(10px);
      }

      .header-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        border-color: rgba(255, 255, 255, 0.5);
        transform: translateY(-2px);
        color: white;
        text-decoration: none;
      }

      /* Quick Actions */
      .quick-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 2px solid #e2e8f0;
      }

      .quick-btn {
        padding: 8px 16px;
        border-radius: 20px;
        border: 2px solid #e2e8f0;
        background: white;
        color: #6b7280;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.875rem;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
      }

      .quick-btn:hover {
        background: #6366f1;
        color: white;
        border-color: #6366f1;
        transform: translateY(-2px);
        text-decoration: none;
      }

      .quick-btn.danger:hover {
        background: #ef4444;
        border-color: #ef4444;
      }

      /* Toast Notification */
      .toast-notification {
        position: fixed;
        top: 20px;
        right: 20px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        padding: 15px 20px;
        border-left: 4px solid #10b981;
        z-index: 9999;
        transform: translateX(400px);
        transition: all 0.3s ease;
        min-width: 300px;
      }

      .toast-notification.show {
        transform: translateX(0);
      }

      .toast-message {
        font-weight: 600;
        color: #1f2937;
        margin: 0;
      }

      /* Loading Overlay */
      .loading-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.9);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        border-radius: 10px;
      }

      .loading-spinner {
        width: 40px;
        height: 40px;
        border: 4px solid #e2e8f0;
        border-top: 4px solid #6366f1;
        border-radius: 50%;
        animation: spin 1s linear infinite;
      }

      @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }

      /* Status Badges */
      .status-badge {
        display: inline-block;
        padding: 6px 16px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
      }

      .badge-available { background: #dcfce7; color: #166534; }
      .badge-booked { background: #dbeafe; color: #1e40af; }
      .badge-unavailable { background: #fee2e2; color: #dc2626; }
      .badge-break { background: #fef3c7; color: #d97706; }

      /* Animations */
      @keyframes fadeInUp {
        from {
          opacity: 0;
          transform: translateY(20px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .animate-fade-in {
        animation: fadeInUp 0.6s ease-out;
      }

      /* Search Enhancement */
      .search-container {
        position: relative;
      }

      .search-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #6b7280;
        font-size: 16px;
        pointer-events: none;
      }

      .search-input {
        padding-left: 40px !important;
      }

      /* Responsive Design */
      @media (max-width: 768px) {
        .stats-dashboard {
          grid-template-columns: repeat(2, 1fr);
          gap: 15px;
        }

        .schedule-controls {
          padding: 15px;
        }

        .schedule-controls .d-flex {
          flex-direction: column;
          gap: 15px;
        }

        .staff-legend {
          gap: 8px;
        }

        .staff-legend-item {
          padding: 6px 12px;
          font-size: 0.875rem;
        }

        .modal-body {
          padding: 20px;
        }

        .quick-actions {
          gap: 8px;
        }

        .page-header-enhanced {
          padding: 20px;
        }

        .stat-number {
          font-size: 2rem;
        }
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
            <li class="nav-item  d-none d-lg-flex">
              <a class="nav-link active" href="#">
                <i class="typcn typcn-calendar mr-1"></i> All Staff Schedules
              </a>
            </li>
            <li class="nav-item  d-none d-lg-flex">
              <a class="nav-link" href="index.html">
                <i class="typcn typcn-chart-bar-outline mr-1"></i> Dashboard
              </a>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-flex mr-3">
              <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="typcn typcn-bell"></i>
                <span class="count bg-danger">3</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header">Schedule Alerts</p>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="typcn typcn-calendar"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">Schedule Change</h6>
                    <p class="font-weight-light small-text mb-0">
                      Staff schedule updated
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
            <!-- Enhanced Header with Actions -->
            <div class="page-header-enhanced animate-fade-in">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-2">
                    <i class="typcn typcn-calendar mr-3"></i>
                    All Staff Schedule Management
                  </h3>
                  <p class="mb-0" style="opacity: 0.9;">Real-time overview of all staff schedules and appointments</p>
                </div>
                <div class="header-actions d-flex gap-3">
                  <button class="header-btn" id="refreshBtn">
                    <i class="typcn typcn-refresh mr-1"></i> Refresh
                  </button>
                  <button class="header-btn" id="exportBtn">
                    <i class="typcn typcn-download mr-1"></i> Export
                  </button>
                </div>
              </div>
            </div>

            <!-- Enhanced Stats Dashboard -->
            <div class="stats-dashboard animate-fade-in">
              <div class="stat-card total">
                <i class="typcn typcn-group stat-icon"></i>
                <div class="stat-number" id="totalStaff">4</div>
                <div class="stat-label">Total Staff</div>
              </div>
              <div class="stat-card available">
                <i class="typcn typcn-tick stat-icon"></i>
                <div class="stat-number" id="availableStaff">3</div>
                <div class="stat-label">Available Today</div>
              </div>
              <div class="stat-card booked">
                <i class="typcn typcn-calendar stat-icon"></i>
                <div class="stat-number" id="totalAppointments">3</div>
                <div class="stat-label">Appointments</div>
              </div>
              <div class="stat-card rate">
                <i class="typcn typcn-chart-line stat-icon"></i>
                <div class="stat-number" id="utilizationRate">75%</div>
                <div class="stat-label">Utilization</div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="card animate-fade-in">
                  <div class="card-body">
                    <!-- Enhanced Controls -->
                    <div class="schedule-controls">
                      <div class="d-flex flex-wrap align-items-center justify-content-between mb-3">
                        <h5 class="font-weight-bold mb-0">
                          <i class="typcn typcn-cog mr-2"></i>Schedule Controls
                        </h5>
                      </div>
                      
                      <div class="d-flex flex-wrap align-items-center gap-3">
                        <div class="view-filter mr-3">
                          <label class="form-label font-weight-bold mb-1">
                            <i class="typcn typcn-eye mr-1"></i>View Mode
                          </label>
                          <select id="viewFilter" class="form-control form-control-sm">
                            <option value="agendaWeek">Weekly View</option>
                            <option value="agendaDay">Daily View</option>
                            <option value="month">Monthly View</option>
                          </select>
                        </div>
                        <div class="staff-filter mr-3">
                          <label class="form-label font-weight-bold mb-1">
                            <i class="typcn typcn-user mr-1"></i>Staff Filter
                          </label>
                          <select id="staffFilter" class="form-control form-control-sm staff-selector">
                            <option value="all">All Staff</option>
                            <option value="1">John Doe</option>
                            <option value="2">Jane Smith</option>
                            <option value="3">Mike Johnson</option>
                            <option value="4">Sarah Williams</option>
                          </select>
                        </div>
                        <div class="status-filter mr-3">
                          <label class="form-label font-weight-bold mb-1">
                            <i class="typcn typcn-filter mr-1"></i>Status Filter
                          </label>
                          <select id="statusFilter" class="form-control form-control-sm">
                            <option value="all">All Statuses</option>
                            <option value="available">Available</option>
                            <option value="unavailable">Unavailable</option>
                            <option value="booked">Booked</option>
                          </select>
                        </div>
                        <div class="search-filter">
                          <label class="form-label font-weight-bold mb-1">
                            <i class="typcn typcn-zoom mr-1"></i>Quick Search
                          </label>
                          <div class="search-container">
                            <i class="typcn typcn-zoom search-icon"></i>
                            <input type="text" id="searchInput" class="form-control form-control-sm search-input" placeholder="Search appointments...">
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <!-- Enhanced Staff Legend -->
                    <div class="staff-legend">
                      <div class="staff-legend-item active" data-staff="all">
                        <span class="staff-color" style="background: linear-gradient(45deg, #4B49AC, #7DA0FA, #F3797E, #00D25B);"></span>
                        <span><i class="typcn typcn-group mr-1"></i>All Staff</span>
                      </div>
                      <div class="staff-legend-item" data-staff="1">
                        <span class="staff-color" style="background-color: #4B49AC;"></span>
                        <span>John Doe</span>
                      </div>
                      <div class="staff-legend-item" data-staff="2">
                        <span class="staff-color" style="background-color: #7DA0FA;"></span>
                        <span>Jane Smith</span>
                      </div>
                      <div class="staff-legend-item" data-staff="3">
                        <span class="staff-color" style="background-color: #F3797E;"></span>
                        <span>Mike Johnson</span>
                      </div>
                      <div class="staff-legend-item" data-staff="4">
                        <span class="staff-color" style="background-color: #00D25B;"></span>
                        <span>Sarah Williams</span>
                      </div>
                    </div>
                    
                    <!-- Calendar Container with Loading -->
                    <div style="position: relative;">
                      <div class="loading-overlay" id="loadingOverlay">
                        <div class="loading-spinner"></div>
                      </div>
                      <div id="schedule-calendar"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Enhanced Schedule Details Modal -->
          <div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="scheduleModalLabel">
                    <i class="typcn typcn-calendar mr-2"></i>Schedule Details
                  </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label><i class="typcn typcn-user mr-1"></i>Staff Member</label>
                        <input type="text" class="form-control" id="scheduleStaff" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label><i class="typcn typcn-info mr-1"></i>Status</label>
                        <div>
                          <span class="status-badge" id="scheduleStatus"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label><i class="typcn typcn-tag mr-1"></i>Type</label>
                        <input type="text" class="form-control" id="scheduleType" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label><i class="typcn typcn-user-outline mr-1"></i>Client</label>
                        <input type="text" class="form-control" id="scheduleClient" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label><i class="typcn typcn-time mr-1"></i>Start Time</label>
                        <input type="text" class="form-control" id="scheduleStart" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label><i class="typcn typcn-time mr-1"></i>End Time</label>
                        <input type="text" class="form-control" id="scheduleEnd" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label><i class="typcn typcn-scissors mr-1"></i>Service</label>
                    <input type="text" class="form-control" id="scheduleService" readonly>
                  </div>
                  <div class="form-group">
                    <label><i class="typcn typcn-document-text mr-1"></i>Notes</label>
                    <textarea class="form-control" id="scheduleNotes" rows="3" readonly></textarea>
                  </div>
                  
                  <!-- Quick Actions -->
                  <div class="quick-actions">
                    <a href="#" class="quick-btn" id="editScheduleBtn">
                      <i class="typcn typcn-edit"></i> Edit
                    </a>
                    <a href="#" class="quick-btn" id="duplicateBtn">
                      <i class="typcn typcn-duplicate"></i> Duplicate
                    </a>
                    <a href="#" class="quick-btn" id="notifyBtn">
                      <i class="typcn typcn-bell"></i> Notify
                    </a>
                    <a href="#" class="quick-btn danger" id="cancelBtn">
                      <i class="typcn typcn-times"></i> Cancel
                    </a>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="saveChangesBtn">Save Changes</button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 Barbershop Admin. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Handcrafted by <a href="#" target="_blank">Barbershop Team</a></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- Toast Notification -->
    <div class="toast-notification" id="toastNotification">
      <div class="toast-message" id="toastMessage">Action completed successfully!</div>
    </div>

    <!-- base:js -->
    <script src="../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="../vendors/moment/moment.min.js"></script>
    <script src="../vendors/fullcalendar/fullcalendar.min.js"></script>
    <script src="../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="../js/off-canvas.js"></script>
    <script src="../js/hoverable-collapse.js"></script>
    <script src="../js/template.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/todolist.js"></script>
    <!-- endinject -->
    
    <!-- Enhanced Custom JS -->
    <script>
      $(document).ready(function() {
        // Enhanced staff data
        const staffMembers = {
          1: { name: "John Doe", color: "#4B49AC", role: "Senior Barber", phone: "(555) 123-4567" },
          2: { name: "Jane Smith", color: "#7DA0FA", role: "Hair Stylist", phone: "(555) 234-5678" },
          3: { name: "Mike Johnson", color: "#F3797E", role: "Barber", phone: "(555) 345-6789" },
          4: { name: "Sarah Williams", color: "#00D25B", role: "Hair Specialist", phone: "(555) 456-7890" }
        };
        
        // Enhanced schedule data with more realistic appointments
        var scheduleItems = [
          // John Doe's schedule
          {
            id: 1,
            staffId: 1,
            title: 'John Doe - Available',
            type: 'regular',
            start: moment().day(1).hour(9).minute(0),
            end: moment().day(1).hour(17).minute(0),
            status: 'available',
            notes: 'Regular work hours - accepting walk-ins',
            color: staffMembers[1].color
          },
          {
            id: 2,
            staffId: 1,
            title: 'John Doe - Available',
            type: 'regular',
            start: moment().day(2).hour(9).minute(0),
            end: moment().day(2).hour(17).minute(0),
            status: 'available',
            notes: 'Regular work hours',
            color: staffMembers[1].color
          },
          {
            id: 3,
            staffId: 1,
            title: 'John Doe - Lunch Break',
            type: 'break',
            start: moment().day(1).hour(12).minute(0),
            end: moment().day(1).hour(13).minute(0),
            status: 'unavailable',
            notes: 'Daily lunch break',
            color: '#FFC100'
          },
          {
            id: 4,
            staffId: 1,
            title: 'Robert Johnson - Haircut',
            type: 'appointment',
            start: moment().day(2).hour(10).minute(0),
            end: moment().day(2).hour(10).minute(30),
            status: 'booked',
            client: 'Robert Johnson',
            service: 'Classic Haircut & Beard Trim',
            notes: 'Regular client - prefers #2 fade with beard trim',
            color: staffMembers[1].color
          },
          {
            id: 5,
            staffId: 1,
            title: 'Michael Brown - Premium Cut',
            type: 'appointment',
            start: moment().day(3).hour(14).minute(0),
            end: moment().day(3).hour(15).minute(0),
            status: 'booked',
            client: 'Michael Brown',
            service: 'Premium Haircut & Styling',
            notes: 'Business executive cut with styling',
            color: staffMembers[1].color
          },
          
          // Jane Smith's schedule
          {
            id: 6,
            staffId: 2,
            title: 'Jane Smith - Available',
            type: 'regular',
            start: moment().day(1).hour(10).minute(0),
            end: moment().day(1).hour(18).minute(0),
            status: 'available',
            notes: 'Specializing in color treatments and styling',
            color: staffMembers[2].color
          },
          {
            id: 7,
            staffId: 2,
            title: 'Lisa Ray - Hair Color',
            type: 'appointment',
            start: moment().day(3).hour(14).minute(0),
            end: moment().day(3).hour(16).minute(0),
            status: 'booked',
            client: 'Lisa Ray',
            service: 'Full Hair Color & Highlights',
            notes: 'Root touch-up with blonde highlights',
            color: staffMembers[2].color
          },
          {
            id: 8,
            staffId: 2,
            title: 'Emma Wilson - Styling',
            type: 'appointment',
            start: moment().day(4).hour(11).minute(0),
            end: moment().day(4).hour(12).minute(30),
            status: 'booked',
            client: 'Emma Wilson',
            service: 'Wash, Cut & Style',
            notes: 'Wedding preparation styling',
            color: staffMembers[2].color
          },
          
          // Mike Johnson's schedule
          {
            id: 9,
            staffId: 3,
            title: 'Mike Johnson - Day Off',
            type: 'time-off',
            start: moment().day(2).hour(0).minute(0),
            end: moment().day(2).hour(23).minute(59),
            status: 'unavailable',
            notes: 'Personal day off - family event',
            color: '#ef4444'
          },
          {
            id: 10,
            staffId: 3,
            title: 'Mike Johnson - Available',
            type: 'regular',
            start: moment().day(4).hour(8).minute(0),
            end: moment().day(4).hour(16).minute(0),
            status: 'available',
            notes: 'Early shift - walk-ins welcome',
            color: staffMembers[3].color
          },
          {
            id: 11,
            staffId: 3,
            title: 'James Wilson - Beard Grooming',
            type: 'appointment',
            start: moment().day(5).hour(9).minute(0),
            end: moment().day(5).hour(10).minute(0),
            status: 'booked',
            client: 'James Wilson',
            service: 'Full Beard Grooming Package',
            notes: 'Beard trim, shape, and hot towel treatment',
            color: staffMembers[3].color
          },
          
          // Sarah Williams' schedule
          {
            id: 12,
            staffId: 4,
            title: 'Sarah Williams - Available',
            type: 'regular',
            start: moment().day(5).hour(11).minute(0),
            end: moment().day(5).hour(19).minute(0),
            status: 'available',
            notes: 'Late shift - specialized treatments available',
            color: staffMembers[4].color
          },
          {
            id: 13,
            staffId: 4,
            title: 'David Miller - Beard Trim',
            type: 'appointment',
            start: moment().day(5).hour(15).minute(0),
            end: moment().day(5).hour(16).minute(0),
            status: 'booked',
            client: 'David Miller',
            service: 'Premium Beard Trim & Shape',
            notes: 'Monthly maintenance with hot towel',
            color: staffMembers[4].color
          },
          {
            id: 14,
            staffId: 4,
            title: 'Training Session',
            type: 'training',
            start: moment().day(3).hour(16).minute(0),
            end: moment().day(3).hour(17).minute(30),
            status: 'unavailable',
            notes: 'Advanced cutting techniques workshop',
            color: '#8b5cf6'
          }
        ];
        
        // Utility Functions
        function showToast(message, type = 'success') {
          $('#toastMessage').text(message);
          $('#toastNotification').addClass('show');
          setTimeout(() => {
            $('#toastNotification').removeClass('show');
          }, 3000);
        }
        
        function showLoading() {
          $('#loadingOverlay').show();
        }
        
        function hideLoading() {
          $('#loadingOverlay').hide();
        }
        
        function updateStats() {
          const today = moment().format('YYYY-MM-DD');
          const todayEvents = scheduleItems.filter(item => 
            moment(item.start).format('YYYY-MM-DD') === today
          );
          
          // Update stat cards with animation
          animateNumber('#totalStaff', Object.keys(staffMembers).length);
          animateNumber('#availableStaff', todayEvents.filter(item => item.status === 'available').length);
          animateNumber('#totalAppointments', todayEvents.filter(item => item.status === 'booked').length);
          
          // Calculate utilization rate
          const totalWorkingHours = todayEvents
            .filter(item => item.status === 'available')
            .reduce((total, item) => {
              return total + moment(item.end).diff(moment(item.start), 'hours');
            }, 0);
          
          const bookedHours = todayEvents
            .filter(item => item.status === 'booked')
            .reduce((total, item) => {
              return total + moment(item.end).diff(moment(item.start), 'hours');
            }, 0);
          
          const utilization = totalWorkingHours > 0 ? 
            Math.round((bookedHours / totalWorkingHours) * 100) : 0;
          
          animateNumber('#utilizationRate', utilization, '%');
        }
        
        function animateNumber(selector, endValue, suffix = '') {
          const element = $(selector);
          const startValue = parseInt(element.text()) || 0;
          const duration = 1000;
          const steps = 30;
          const increment = (endValue - startValue) / steps;
          let current = startValue;
          let step = 0;
          
          const timer = setInterval(() => {
            step++;
            current += increment;
            if (step >= steps) {
              current = endValue;
              clearInterval(timer);
            }
            element.text(Math.round(current) + suffix);
          }, duration / steps);
        }
        
        // Enhanced Calendar Initialization
        function initializeCalendar() {
          showLoading();
          
          setTimeout(() => {
            $('#schedule-calendar').fullCalendar({
              header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
              },
              defaultView: 'agendaWeek',
              defaultDate: new Date(),
              navLinks: true,
              editable: false,
              eventLimit: true,
              height: 'auto',
              slotDuration: '00:30:00',
              minTime: '07:00:00',
              maxTime: '21:00:00',
              businessHours: {
                dow: [1, 2, 3, 4, 5, 6],
                start: '09:00',
                end: '18:00'
              },
              events: scheduleItems,
              eventRender: function(event, element) {
                // Enhanced event rendering with better formatting
                const timeRange = moment(event.start).format('h:mm a') + 
                  ' - ' + moment(event.end).format('h:mm a');
                
                let eventContent = `
                  <div class="fc-event-main">
                    <div class="fc-event-title" style="font-weight: 600; margin-bottom: 2px;">
                      ${event.title}
                    </div>
                    <div class="fc-event-time" style="font-size: 0.75em; opacity: 0.8;">
                      ${timeRange}
                    </div>
                `;
                
                if (event.client) {
                  eventContent += `
                    <div class="fc-event-client" style="font-size: 0.75em; margin-top: 2px;">
                      <i class="typcn typcn-user" style="margin-right: 3px;"></i>${event.client}
                    </div>
                  `;
                }
                
                eventContent += '</div>';
                element.find('.fc-content').html(eventContent);
                
                // Enhanced tooltip
                const tooltipContent = `
                  <strong>${event.title}</strong><br>
                  Time: ${timeRange}<br>
                  ${event.client ? 'Client: ' + event.client + '<br>' : ''}
                  ${event.service ? 'Service: ' + event.service + '<br>' : ''}
                  Status: ${event.status.charAt(0).toUpperCase() + event.status.slice(1)}
                `;
                
                element.attr('title', tooltipContent);
                element.tooltip({ html: true, placement: 'top' });
                
                return element;
              },
              eventClick: function(calEvent, jsEvent, view) {
                // Prevent event propagation
                jsEvent.stopPropagation();
                showScheduleModal(calEvent);
              },
              dayClick: function(date, jsEvent, view) {
                console.log('Day clicked:', date.format());
                showToast('Quick add functionality coming soon!');
              },
              viewRender: function(view, element) {
                // Add fade-in animation when view changes
                element.hide().fadeIn(300);
              }
            });
            
            hideLoading();
            updateStats();
            showToast('Schedule loaded successfully!');
          }, 1000);
        }
        
        // Enhanced Modal Display
        function showScheduleModal(calEvent) {
          const staff = staffMembers[calEvent.staffId];
          
          // Populate modal fields
          $('#scheduleStaff').val(staff ? staff.name + ' (' + staff.role + ')' : 'Unknown Staff');
          $('#scheduleType').val(calEvent.type.charAt(0).toUpperCase() + calEvent.type.slice(1));
          $('#scheduleClient').val(calEvent.client || 'N/A');
          $('#scheduleService').val(calEvent.service || 'N/A');
          $('#scheduleStart').val(moment(calEvent.start).format('MMMM Do YYYY, h:mm a'));
          $('#scheduleEnd').val(moment(calEvent.end).format('MMMM Do YYYY, h:mm a'));
          $('#scheduleNotes').val(calEvent.notes);
          
          // Set status badge with appropriate styling
          const statusBadge = $('#scheduleStatus');
          const statusText = calEvent.status.charAt(0).toUpperCase() + calEvent.status.slice(1);
          statusBadge.text(statusText);
          statusBadge.removeClass('badge-available badge-booked badge-unavailable badge-break');
          statusBadge.addClass('badge-' + calEvent.status);
          
          // Store event data for actions
          $('#scheduleModal').data('eventData', calEvent);
          
          // Show/hide action buttons based on event type
          if (calEvent.status === 'booked') {
            $('#editScheduleBtn, #duplicateBtn, #notifyBtn, #cancelBtn').show();
          } else if (calEvent.status === 'available') {
            $('#editScheduleBtn, #duplicateBtn').show();
            $('#notifyBtn, #cancelBtn').hide();
          } else {
            $('#editScheduleBtn').show();
            $('#duplicateBtn, #notifyBtn, #cancelBtn').hide();
          }
          
          // Show modal with proper configuration
          setTimeout(function() {
            $('#scheduleModal').modal({
              backdrop: true,
              keyboard: true,
              focus: true,
              show: true
            });
          }, 100);
        }
        
        // Filtering Functions
        function applyFilters() {
          const staffFilter = $('#staffFilter').val();
          const statusFilter = $('#statusFilter').val();
          const searchTerm = $('#searchInput').val().toLowerCase();
          
          showLoading();
          
          setTimeout(() => {
            $('#schedule-calendar').fullCalendar('removeEvents');
            
            const filteredEvents = scheduleItems.filter(function(item) {
              const staffMatch = staffFilter === 'all' || item.staffId == staffFilter;
              const statusMatch = statusFilter === 'all' || item.status === statusFilter;
              const searchMatch = searchTerm === '' || 
                item.title.toLowerCase().includes(searchTerm) ||
                (item.client && item.client.toLowerCase().includes(searchTerm)) ||
                (item.service && item.service.toLowerCase().includes(searchTerm)) ||
                (item.notes && item.notes.toLowerCase().includes(searchTerm));
              
              return staffMatch && statusMatch && searchMatch;
            });
            
            $('#schedule-calendar').fullCalendar('addEventSource', filteredEvents);
            updateStats();
            hideLoading();
            
            // Update active legend item
            $('.staff-legend-item').removeClass('active');
            $(`.staff-legend-item[data-staff="${staffFilter}"]`).addClass('active');
            
            showToast(`Showing ${filteredEvents.length} events`);
          }, 300);
        }
        
        // Debounce function for search
        function debounce(func, wait) {
          let timeout;
          return function executedFunction(...args) {
            const later = () => {
              clearTimeout(timeout);
              func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
          };
        }
        
        // Initialize calendar
        initializeCalendar();
        
        // Event Handlers
        $('#viewFilter').change(function() {
          const newView = $(this).val();
          $('#schedule-calendar').fullCalendar('changeView', newView);
          showToast('View changed to ' + $(this).find('option:selected').text());
        });
        
        $('#staffFilter, #statusFilter').change(applyFilters);
        $('#searchInput').on('input', debounce(applyFilters, 500));
        
        // Staff legend click handlers
        $('.staff-legend-item').click(function() {
          const staffId = $(this).data('staff');
          $('#staffFilter').val(staffId).trigger('change');
        });
        
        // Fix modal interactions - ensure all click events work
        $(document).on('click', '.modal .close, .modal [data-dismiss="modal"]', function(e) {
          e.preventDefault();
          e.stopPropagation();
          $('#scheduleModal').modal('hide');
        });
        
        // Fix backdrop click
        $(document).on('click', '.modal', function(e) {
          if (e.target === this) {
            $('#scheduleModal').modal('hide');
          }
        });
        
        // Quick action handlers
        $(document).on('click', '#editScheduleBtn', function(e) {
          e.preventDefault();
          e.stopPropagation();
          const eventData = $('#scheduleModal').data('eventData');
          showToast('Opening edit interface for: ' + eventData.title);
          $('#scheduleModal').modal('hide');
        });
        
        $(document).on('click', '#duplicateBtn', function(e) {
          e.preventDefault();
          e.stopPropagation();
          const eventData = $('#scheduleModal').data('eventData');
          showToast('Event duplicated successfully!');
          $('#scheduleModal').modal('hide');
        });
        
        $(document).on('click', '#notifyBtn', function(e) {
          e.preventDefault();
          e.stopPropagation();
          const eventData = $('#scheduleModal').data('eventData');
          if (eventData.client) {
            showToast('Notification sent to ' + eventData.client);
          } else {
            showToast('Notification sent to staff member');
          }
          $('#scheduleModal').modal('hide');
        });
        
        $(document).on('click', '#cancelBtn', function(e) {
          e.preventDefault();
          e.stopPropagation();
          const eventData = $('#scheduleModal').data('eventData');
          if (confirm('Are you sure you want to cancel this appointment with ' + eventData.client + '?')) {
            showToast('Appointment cancelled. Notification sent to client.');
            $('#scheduleModal').modal('hide');
          }
        });
        
        // Refresh functionality
        $('#refreshBtn').click(function() {
          const $icon = $(this).find('i');
          $icon.addClass('typcn-refresh');
          
          setTimeout(() => {
            $('#schedule-calendar').fullCalendar('refetchEvents');
            updateStats();
            $icon.removeClass('typcn-refresh');
            showToast('Schedule refreshed successfully!');
          }, 1000);
        });
        
        // Export functionality
        $('#exportBtn').click(function() {
          showToast('Preparing export... This feature will be available soon!');
        });
        
        // Auto-refresh every 5 minutes
        setInterval(function() {
          $('#schedule-calendar').fullCalendar('refetchEvents');
          updateStats();
          console.log('Auto-refreshed at', new Date().toLocaleTimeString());
        }, 300000);
        
        // Keyboard shortcuts
        $(document).keydown(function(e) {
          if (e.ctrlKey || e.metaKey) {
            switch(e.which) {
              case 82: // Ctrl/Cmd+R
                e.preventDefault();
                $('#refreshBtn').click();
                break;
              case 70: // Ctrl/Cmd+F
                e.preventDefault();
                $('#searchInput').focus();
                break;
              case 69: // Ctrl/Cmd+E
                e.preventDefault();
                $('#exportBtn').click();
                break;
            }
          }
        });
        
        // Additional modal cleanup
        setTimeout(function() {
          $('.modal-backdrop').remove();
          $('body').removeClass('modal-open');
        }, 500);
        
        console.log('Enhanced Staff Schedule Management System initialized successfully!');
      });
    </script>
  </body>
</html>