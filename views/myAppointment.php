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
    <title>My Appointments</title>
    <!-- base:css -->
    <link rel="stylesheet" href="../vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <!-- endinject --> 
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../images/favicon.png" />
    <style>
      /* Improved Typography */
      body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #333;
      }
      
      h3 {
        font-weight: 600;
        color: #2c3e50;
      }
      
      /* Card Styling */
      .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.05);
      }
      
      /* Table Improvements */
      .appointment-table {
        margin-top: 20px;
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 15px rgba(0,0,0,0.05);
      }
      
      .appointment-table thead th {
        background-color: #4B49AC;
        color: white;
        font-weight: 500;
        border: none;
        padding: 12px 16px;
        font-size: 0.9rem;
      }
      
      .appointment-table tbody tr {
        transition: all 0.2s ease;
      }
      
      .appointment-table tbody tr:hover {
        background-color: #f8f9fa;
      }
      
      .appointment-table tbody td {
        padding: 12px 16px;
        vertical-align: middle;
        border-top: 1px solid #f1f1f1;
        font-size: 0.9rem;
      }
      
      /* Cell Styling */
      .phone-cell {
        font-weight: 500;
        color: #4B49AC;
      }
      
      /* Action Buttons */
      .action-buttons .btn {
        padding: 5px 8px;
        font-size: 13px;
        margin-right: 4px;
        border-radius: 4px;
        box-shadow: none;
        transition: all 0.2s;
      }
      
      .btn-view {
        background-color: #4B49AC;
        color: white;
        border: none;
      }
      
      .btn-view:hover {
        background-color: #3a3894;
        transform: translateY(-1px);
      }
      
      .btn-whatsapp {
        background-color: #25D366;
        color: white;
        border: none;
      }
      
      .btn-whatsapp:hover {
        background-color: #1da851;
        transform: translateY(-1px);
      }
      
      /* REDESIGNED STATUS DROPDOWN - KEEPING CURRENT STRUCTURE */
      .btn-status {
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        position: relative;
        min-width: 110px;
      }
      
      .btn-status:hover {
        background: linear-gradient(135deg, #5a6268 0%, #343a40 100%);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        color: white;
      }
      
      .btn-status:focus {
        box-shadow: 0 0 0 3px rgba(108, 117, 125, 0.25);
        outline: none;
      }
      
      .btn-status::after {
        content: '▼';
        margin-left: 6px;
        font-size: 10px;
        transition: transform 0.3s ease;
      }
      
      .btn-status.active::after {
        transform: rotate(180deg);
      }
      
      /* Status dropdown */
      .status-dropdown {
        position: relative;
        display: inline-block;
      }
      
      .status-dropdown-content {
        position: fixed;
        background: white;
        min-width: 160px;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.15);
        z-index: 9999;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        border: 1px solid #e9ecef;
        overflow: hidden;
        display: none;
        pointer-events: none;
      }
      
      .status-dropdown-content.show {
        opacity: 1;
        visibility: visible;
        display: block;
        pointer-events: auto;
      }
      
      .status-dropdown-content::before {
        content: '';
        position: absolute;
        width: 12px;
        height: 12px;
        background: white;
        border: 1px solid #e9ecef;
        z-index: 10000;
      }
      
      .status-dropdown-content.arrow-down::before {
        top: -6px;
        left: 50%;
        transform: translateX(-50%) rotate(45deg);
        border-bottom: none;
        border-right: none;
      }
      
      .status-dropdown-content.arrow-up::before {
        bottom: -6px;
        left: 50%;
        transform: translateX(-50%) rotate(45deg);
        border-top: none;
        border-left: none;
      }
      
      .status-dropdown-content a {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #495057;
        padding: 12px 16px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 500;
        border-bottom: 1px solid #f8f9fa;
        transition: all 0.2s ease;
      }
      
      .status-dropdown-content a:last-child {
        border-bottom: none;
      }
      
      .status-dropdown-content a:hover {
        background: linear-gradient(90deg, #f8f9ff 0%, #ffffff 100%);
        color: #4B49AC;
        text-decoration: none;
        padding-left: 20px;
      }
      
      .status-dropdown-content a::before {
        content: '';
        width: 12px;
        height: 12px;
        border-radius: 50%;
        flex-shrink: 0;
      }
      
      .status-dropdown-content a[onclick*="'Completed'"]::before {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
      }
      
      .status-dropdown-content a[onclick*="'Confirmed'"]::before {
        background: linear-gradient(135deg, #17a2b8 0%, #6f42c1 100%);
      }
      
      .status-dropdown-content a[onclick*="'Pending'"]::before {
        background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
      }
      
      .status-dropdown-content a[onclick*="'Cancelled'"]::before {
        background: linear-gradient(135deg, #dc3545 0%, #e83e8c 100%);
      }
      
      /* Status Badges */
      .badge-status {
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 500;
        letter-spacing: 0.3px;
      }
      
      .badge-completed {
        background-color: #e6f7ee;
        color: #28a745;
        border: 1px solid #c3e6cb;
      }
      
      .badge-confirmed {
        background-color: #e6f7f9;
        color: #17a2b8;
        border: 1px solid #bee5eb;
      }
      
      .badge-pending {
        background-color: #fff8e6;
        color: #d39e00;
        border: 1px solid #ffeeba;
      }
      
      .badge-cancelled {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
      }
      
      /* Customer Avatar */
      .customer-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 10px;
        border: 2px solid #f1f1f1;
      }
      
      .customer-name {
        display: flex;
        align-items: center;
        font-weight: 500;
      }
      
      /* Enhanced dropdown interaction */
      .status-dropdown.active .status-dropdown-content {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(0);
        display: block;
      }
      
      .status-dropdown.active .btn-status {
        background: linear-gradient(135deg, #4B49AC 0%, #6C63FF 100%);
        box-shadow: 0 4px 15px rgba(75, 73, 172, 0.3);
      }
      
      /* Overlay for closing dropdown */
      .dropdown-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 999;
        display: none;
      }
      
      .dropdown-overlay.active {
        display: block;
      }
      
      /* Toast notification */
      .toast-notification {
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: #4B49AC;
        color: white;
        padding: 12px 24px;
        border-radius: 4px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        display: none;
        z-index: 1000;
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
              <a class="nav-link" href="#">
                <i class="typcn typcn-scissors mr-1"></i> Services
              </a>
            </li>
            <li class="nav-item  d-none d-lg-flex">
              <a class="nav-link active" href="index.html">
                <i class="typcn typcn-calendar mr-1"></i> Appointments
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
                <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="typcn typcn-user"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">New Appointment</h6>
                    <p class="font-weight-light small-text mb-0">
                      John Smith - 2:00 PM
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="typcn typcn-calendar"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">Appointment Reminder</h6>
                    <p class="font-weight-light small-text mb-0">
                      Mike Johnson - 11:30 AM
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
            <!-- Toast Notification -->
            <div id="toastNotification" class="toast-notification">
              <span id="toastMessage">Status updated successfully!</span>
            </div>
            
            <!-- Dropdown Overlay -->
            <div id="dropdownOverlay" class="dropdown-overlay"></div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                  <h3 class="font-weight-bold mb-0">My Appointments</h3>
                  <div>
                    <button class="btn btn-primary" id="refreshBtn">
                      <i class="typcn typcn-refresh mr-1"></i> Refresh
                    </button>
                  </div>
                </div>
                
                <div class="card">
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table id="appointmentsTable" class="table appointment-table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Customer</th>
                            <th>Phone</th>
                            <th>Service</th>
                            <th>Date & Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr id="appointment-1">
                            <td>1</td>
                            <td class="customer-name">
                              <img src="https://randomuser.me/api/portraits/men/1.jpg" class="customer-avatar" alt="John Smith">
                              <strong>John Smith</strong>
                            </td>
                            <td class="phone-cell">60123456789</td>
                            <td>Haircut & Beard Trim</td>
                            <td>Jun 15, 2024<br><small>2:00 PM - 2:45 PM</small></td>
                            <td>
                              <span id="status-1" class="badge-status badge-confirmed">Confirmed</span>
                              <div class="status-dropdown mt-1" id="dropdown-1">
                                <button class="btn btn-status btn-sm" onclick="toggleDropdown(1)">Change Status</button>
                                <div class="status-dropdown-content">
                                  <a href="#" onclick="updateStatus(1, 'Completed')">Mark as Completed</a>
                                  <a href="#" onclick="updateStatus(1, 'Pending')">Mark as Pending</a>
                                  <a href="#" onclick="updateStatus(1, 'Cancelled')">Cancel Appointment</a>
                                </div>
                              </div>
                            </td>
                            <td class="action-buttons">
                              <button class="btn btn-view btn-sm" title="View" onclick="viewAppointment(1)">
                                <i class="typcn typcn-eye"></i>
                              </button>
                              <button class="btn btn-whatsapp btn-sm" title="WhatsApp" onclick="sendWhatsApp('60123456789')">
                                <i class="typcn typcn-message"></i>
                              </button>
                            </td>
                          </tr>
                          <tr id="appointment-2">
                            <td>2</td>
                            <td class="customer-name">
                              <img src="https://randomuser.me/api/portraits/men/2.jpg" class="customer-avatar" alt="Mike Johnson">
                              <strong>Mike Johnson</strong>
                            </td>
                            <td class="phone-cell">60119876543</td>
                            <td>Premium Hair Package</td>
                            <td>Jun 16, 2024<br><small>11:30 AM - 12:30 PM</small></td>
                            <td>
                              <span id="status-2" class="badge-status badge-confirmed">Confirmed</span>
                              <div class="status-dropdown mt-1" id="dropdown-2">
                                <button class="btn btn-status btn-sm" onclick="toggleDropdown(2)">Change Status</button>
                                <div class="status-dropdown-content">
                                  <a href="#" onclick="updateStatus(2, 'Completed')">Mark as Completed</a>
                                  <a href="#" onclick="updateStatus(2, 'Pending')">Mark as Pending</a>
                                  <a href="#" onclick="updateStatus(2, 'Cancelled')">Cancel Appointment</a>
                                </div>
                              </div>
                            </td>
                            <td class="action-buttons">
                              <button class="btn btn-view btn-sm" title="View" onclick="viewAppointment(2)">
                                <i class="typcn typcn-eye"></i>
                              </button>
                              <button class="btn btn-whatsapp btn-sm" title="WhatsApp" onclick="sendWhatsApp('60119876543')">
                                <i class="typcn typcn-message"></i>
                              </button>
                            </td>
                          </tr>
                          <tr id="appointment-3">
                            <td>3</td>
                            <td class="customer-name">
                              <img src="https://randomuser.me/api/portraits/women/1.jpg" class="customer-avatar" alt="Sarah Wilson">
                              <strong>Sarah Wilson</strong>
                            </td>
                            <td class="phone-cell">60128765432</td>
                            <td>Hair Coloring</td>
                            <td>Jun 17, 2024<br><small>3:00 PM - 5:00 PM</small></td>
                            <td>
                              <span id="status-3" class="badge-status badge-pending">Pending</span>
                              <div class="status-dropdown mt-1" id="dropdown-3">
                                <button class="btn btn-status btn-sm" onclick="toggleDropdown(3)">Change Status</button>
                                <div class="status-dropdown-content">
                                  <a href="#" onclick="updateStatus(3, 'Completed')">Mark as Completed</a>
                                  <a href="#" onclick="updateStatus(3, 'Confirmed')">Confirm Appointment</a>
                                  <a href="#" onclick="updateStatus(3, 'Cancelled')">Cancel Appointment</a>
                                </div>
                              </div>
                            </td>
                            <td class="action-buttons">
                              <button class="btn btn-view btn-sm" title="View" onclick="viewAppointment(3)">
                                <i class="typcn typcn-eye"></i>
                              </button>
                              <button class="btn btn-whatsapp btn-sm" title="WhatsApp" onclick="sendWhatsApp('60128765432')">
                                <i class="typcn typcn-message"></i>
                              </button>
                            </td>
                          </tr>
                          <tr id="appointment-4">
                            <td>4</td>
                            <td class="customer-name">
                              <img src="https://randomuser.me/api/portraits/men/3.jpg" class="customer-avatar" alt="Robert Brown">
                              <strong>Robert Brown</strong>
                            </td>
                            <td class="phone-cell">60137654321</td>
                            <td>Beard Trim</td>
                            <td>Jun 14, 2024<br><small>10:00 AM - 10:30 AM</small></td>
                            <td>
                              <span id="status-4" class="badge-status badge-completed">Completed</span>
                              <div class="status-dropdown mt-1" id="dropdown-4">
                                <button class="btn btn-status btn-sm" onclick="toggleDropdown(4)">Change Status</button>
                                <div class="status-dropdown-content">
                                  <a href="#" onclick="updateStatus(4, 'Confirmed')">Mark as Confirmed</a>
                                  <a href="#" onclick="updateStatus(4, 'Pending')">Mark as Pending</a>
                                  <a href="#" onclick="updateStatus(4, 'Cancelled')">Cancel Appointment</a>
                                </div>
                              </div>
                            </td>
                            <td class="action-buttons">
                              <button class="btn btn-view btn-sm" title="View" onclick="viewAppointment(4)">
                                <i class="typcn typcn-eye"></i>
                              </button>
                              <button class="btn btn-whatsapp btn-sm" title="WhatsApp" onclick="sendWhatsApp('60137654321')">
                                <i class="typcn typcn-message"></i>
                              </button>
                            </td>
                          </tr>
                          <tr id="appointment-5">
                            <td>5</td>
                            <td class="customer-name">
                              <img src="https://randomuser.me/api/portraits/women/2.jpg" class="customer-avatar" alt="Emily Davis">
                              <strong>Emily Davis</strong>
                            </td>
                            <td class="phone-cell">60146543210</td>
                            <td>Haircut</td>
                            <td>Jun 18, 2024<br><small>4:00 PM - 4:45 PM</small></td>
                            <td>
                              <span id="status-5" class="badge-status badge-cancelled">Cancelled</span>
                              <div class="status-dropdown mt-1" id="dropdown-5">
                                <button class="btn btn-status btn-sm" onclick="toggleDropdown(5)">Change Status</button>
                                <div class="status-dropdown-content">
                                  <a href="#" onclick="updateStatus(5, 'Completed')">Mark as Completed</a>
                                  <a href="#" onclick="updateStatus(5, 'Confirmed')">Confirm Appointment</a>
                                  <a href="#" onclick="updateStatus(5, 'Pending')">Mark as Pending</a>
                                </div>
                              </div>
                            </td>
                            <td class="action-buttons">
                              <button class="btn btn-view btn-sm" title="View" onclick="viewAppointment(5)">
                                <i class="typcn typcn-eye"></i>
                              </button>
                              <button class="btn btn-whatsapp btn-sm" title="WhatsApp" onclick="sendWhatsApp('60146543210')">
                                <i class="typcn typcn-message"></i>
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- View Appointment Modal -->
          <div class="modal fade" id="viewAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="viewAppointmentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="viewAppointmentModalLabel">Appointment Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-4 text-center">
                      <img id="modalAvatar" src="https://randomuser.me/api/portraits/men/1.jpg" class="customer-avatar mb-3" style="width: 100px; height: 100px;" alt="Customer Avatar">
                      <h4 class="mb-1" id="modalCustomerName">John Smith</h4>
                      <span id="modalStatus" class="badge-status badge-confirmed mb-3">Confirmed</span>
                      <button class="btn btn-whatsapp btn-sm mb-3" id="modalWhatsAppBtn">
                        <i class="typcn typcn-message mr-1"></i> WhatsApp Customer
                      </button>
                      
                      <div class="customer-stats">
                        <div class="row">
                          <div class="col-6 stat-item">
                            <h5 class="font-weight-bold">15</h5>
                            <p class="text-muted">Total Visits</p>
                          </div>
                          <div class="col-6 stat-item">
                            <h5 class="font-weight-bold">RM450</h5>
                            <p class="text-muted">Total Spent</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label class="small text-muted mb-1">Phone Number</label>
                        <div class="form-control-plaintext" id="modalPhone">60123456789</div>
                      </div>
                      <div class="form-group">
                        <label class="small text-muted mb-1">Email Address</label>
                        <div class="form-control-plaintext" id="modalEmail">john.smith@example.com</div>
                      </div>
                      <div class="form-group">
                        <label class="small text-muted mb-1">Appointment Date & Time</label>
                        <div class="form-control-plaintext" id="modalDateTime">June 15, 2024 at 2:00 PM - 2:45 PM</div>
                      </div>
                      <div class="form-group">
                        <label class="small text-muted mb-1">Services</label>
                        <div class="card bg-light p-3" id="modalServices">
                          <ul class="mb-0">
                            <li>Haircut - RM30</li>
                            <li>Beard Trim - RM15</li>
                          </ul>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="small text-muted mb-1">Customer Notes</label>
                        <div class="card bg-light p-3" id="modalNotes">
                          Prefers clipper cut on sides. Likes to keep beard neatly trimmed.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 BarberShop Admin. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Handcrafted by <a href="#" target="_blank">Barber Team</a></span>
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
    <script src="../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
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
      // Sample appointment data
      const appointments = {
        1: {
          customer: "John Smith",
          avatar: "https://randomuser.me/api/portraits/men/1.jpg",
          phone: "60123456789",
          email: "john.smith@example.com",
          service: "Haircut & Beard Trim",
          date: "Jun 15, 2024",
          time: "2:00 PM - 2:45 PM",
          status: "Confirmed",
          services: [
            { name: "Haircut", price: "RM30" },
            { name: "Beard Trim", price: "RM15" }
          ],
          notes: "Prefers clipper cut on sides. Likes to keep beard neatly trimmed.",
          visits: 15,
          spent: "RM450"
        },
        2: {
          customer: "Mike Johnson",
          avatar: "https://randomuser.me/api/portraits/men/2.jpg",
          phone: "60119876543",
          email: "mike.johnson@example.com",
          service: "Premium Hair Package",
          date: "Jun 16, 2024",
          time: "11:30 AM - 12:30 PM",
          status: "Confirmed",
          services: [
            { name: "Premium Hair Package", price: "RM60" }
          ],
          notes: "Wants a fade haircut with styling.",
          visits: 8,
          spent: "RM320"
        },
        3: {
          customer: "Sarah Wilson",
          avatar: "https://randomuser.me/api/portraits/women/1.jpg",
          phone: "60128765432",
          email: "sarah.wilson@example.com",
          service: "Hair Coloring",
          date: "Jun 17, 2024",
          time: "3:00 PM - 5:00 PM",
          status: "Pending",
          services: [
            { name: "Hair Coloring", price: "RM120" },
            { name: "Hair Treatment", price: "RM50" }
          ],
          notes: "Wants balayage highlights. Please show color samples first.",
          visits: 3,
          spent: "RM210"
        },
        4: {
          customer: "Robert Brown",
          avatar: "https://randomuser.me/api/portraits/men/3.jpg",
          phone: "60137654321",
          email: "robert.brown@example.com",
          service: "Beard Trim",
          date: "Jun 14, 2024",
          time: "10:00 AM - 10:30 AM",
          status: "Completed",
          services: [
            { name: "Beard Trim", price: "RM15" }
          ],
          notes: "Regular customer. Likes straight razor finish.",
          visits: 22,
          spent: "RM680"
        },
        5: {
          customer: "Emily Davis",
          avatar: "https://randomuser.me/api/portraits/women/2.jpg",
          phone: "60146543210",
          email: "emily.davis@example.com",
          service: "Haircut",
          date: "Jun 18, 2024",
          time: "4:00 PM - 4:45 PM",
          status: "Cancelled",
          services: [
            { name: "Haircut", price: "RM35" }
          ],
          notes: "Will reschedule when back from vacation.",
          visits: 5,
          spent: "RM175"
        }
      };

      // Track current active dropdown
      let activeDropdown = null;

      // Enhanced toggle dropdown function
      function toggleDropdown(appointmentId) {
        const dropdown = document.getElementById(`dropdown-${appointmentId}`);
        const dropdownContent = dropdown.querySelector('.status-dropdown-content');
        const overlay = document.getElementById('dropdownOverlay');
        const button = dropdown.querySelector('.btn-status');
        
        // If this dropdown is already active, close it
        if (activeDropdown === appointmentId) {
          closeAllDropdowns();
          return;
        }
        
        // Close any other open dropdown
        closeAllDropdowns();
        
        // Get button position relative to viewport
        const buttonRect = button.getBoundingClientRect();
        const dropdownHeight = 140; // Estimated dropdown height
        const dropdownWidth = 160;
        const windowHeight = window.innerHeight;
        const windowWidth = window.innerWidth;
        
        // Calculate dropdown position
        let top, left;
        let showAbove = false;
        
        // Check if dropdown fits below the button
        if (buttonRect.bottom + dropdownHeight + 10 > windowHeight) {
          // Show above the button
          top = buttonRect.top - dropdownHeight - 10;
          showAbove = true;
        } else {
          // Show below the button  
          top = buttonRect.bottom + 10;
          showAbove = false;
        }
        
        // Center horizontally on the button
        left = buttonRect.left + (buttonRect.width / 2) - (dropdownWidth / 2);
        
        // Make sure dropdown doesn't go off screen horizontally
        if (left < 10) {
          left = 10;
        } else if (left + dropdownWidth + 10 > windowWidth) {
          left = windowWidth - dropdownWidth - 10;
        }
        
        // Apply positioning
        dropdownContent.style.top = top + 'px';
        dropdownContent.style.left = left + 'px';
        
        // Set arrow direction
        dropdownContent.classList.remove('arrow-up', 'arrow-down');
        if (showAbove) {
          dropdownContent.classList.add('arrow-up');
        } else {
          dropdownContent.classList.add('arrow-down');
        }
        
        // Open this dropdown
        dropdown.classList.add('active');
        dropdownContent.classList.add('show');
        overlay.classList.add('active');
        activeDropdown = appointmentId;
        button.classList.add('active');
      }

      // Close all dropdowns
      function closeAllDropdowns() {
        document.querySelectorAll('.status-dropdown').forEach(dropdown => {
          dropdown.classList.remove('active');
        });
        document.querySelectorAll('.btn-status').forEach(button => {
          button.classList.remove('active');
        });
        document.querySelectorAll('.status-dropdown-content').forEach(content => {
          content.classList.remove('arrow-up', 'arrow-down', 'show');
          content.style.top = '';
          content.style.left = '';
        });
        document.getElementById('dropdownOverlay').classList.remove('active');
        activeDropdown = null;
      }

      // Function to open WhatsApp with customer
      function sendWhatsApp(phoneNumber) {
        // Remove any non-digit characters
        const cleanedNumber = phoneNumber.replace(/\D/g, '');
        // Open WhatsApp chat with the customer
        window.open(`https://wa.me/${cleanedNumber}`, '_blank');
      }
      
      // Function to update appointment status
      function updateStatus(appointmentId, newStatus) {
        // Update the status in our data object
        appointments[appointmentId].status = newStatus;
        
        // Update the UI
        const statusElement = document.getElementById(`status-${appointmentId}`);
        statusElement.textContent = newStatus;
        
        // Update the badge class based on status
        statusElement.className = 'badge-status ' + getStatusClass(newStatus);
        
        // Close dropdown
        closeAllDropdowns();
        
        // Show toast notification
        showToast(`Appointment #${appointmentId} status updated to ${newStatus}`);
      }
      
      // Helper function to get CSS class for status
      function getStatusClass(status) {
        switch(status.toLowerCase()) {
          case 'completed':
            return 'badge-completed';
          case 'confirmed':
            return 'badge-confirmed';
          case 'pending':
            return 'badge-pending';
          case 'cancelled':
            return 'badge-cancelled';
          default:
            return 'badge-pending';
        }
      }
      
      // Function to show toast notification
      function showToast(message) {
        const toast = document.getElementById('toastNotification');
        const toastMessage = document.getElementById('toastMessage');
        
        toastMessage.textContent = message;
        toast.style.display = 'block';
        
        // Hide after 3 seconds
        setTimeout(() => {
          toast.style.display = 'none';
        }, 3000);
      }
      
      // Function to view appointment details
      function viewAppointment(appointmentId) {
        const appointment = appointments[appointmentId];
        
        // Populate modal with appointment data
        document.getElementById('modalCustomerName').textContent = appointment.customer;
        document.getElementById('modalAvatar').src = appointment.avatar;
        document.getElementById('modalPhone').textContent = appointment.phone;
        document.getElementById('modalEmail').textContent = appointment.email;
        document.getElementById('modalDateTime').textContent = `${appointment.date} at ${appointment.time}`;
        
        // Update status badge
        const modalStatus = document.getElementById('modalStatus');
        modalStatus.textContent = appointment.status;
        modalStatus.className = 'badge-status mb-3 ' + getStatusClass(appointment.status);
        
        // Update services list
        const servicesList = document.getElementById('modalServices');
        servicesList.innerHTML = '<ul class="mb-0">' + 
          appointment.services.map(service => `<li>${service.name} - ${service.price}</li>`).join('') + 
          '</ul>';
        
        // Update notes
        document.getElementById('modalNotes').textContent = appointment.notes;
        
        // Update stats
        document.querySelector('#viewAppointmentModal .stat-item:nth-child(1) h5').textContent = appointment.visits;
        document.querySelector('#viewAppointmentModal .stat-item:nth-child(2) h5').textContent = appointment.spent;
        
        // Update WhatsApp button
        document.getElementById('modalWhatsAppBtn').onclick = function() {
          sendWhatsApp(appointment.phone);
        };
        
        // Show modal
        $('#viewAppointmentModal').modal('show');
      }
      
      // Event listeners for closing dropdowns
      document.addEventListener('click', function(event) {
        // Check if click is outside dropdown
        if (!event.target.closest('.status-dropdown') && activeDropdown) {
          closeAllDropdowns();
        }
      });

      // Close dropdown on escape key
      document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && activeDropdown) {
          closeAllDropdowns();
        }
      });

      // Close dropdown when clicking overlay
      document.getElementById('dropdownOverlay').addEventListener('click', closeAllDropdowns);
      
      // Close dropdowns on window resize
      window.addEventListener('resize', closeAllDropdowns);
      
      $(document).ready(function() {
        // Initialize DataTable
        $('#appointmentsTable').DataTable({
          "order": [[4, "asc"]], // Sort by appointment date ascending
          "columnDefs": [
            { "targets": [4], "type": "date" } // Proper sorting for date column
          ],
          dom: 'Bfrtip',
          buttons: [
            {
              extend: 'print',
              text: '<i class="typcn typcn-printer mr-1"></i> Print',
              className: 'btn btn-outline-secondary btn-sm',
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5]
              }
            }
          ],
          "language": {
            "paginate": {
              "previous": "<i class='typcn typcn-chevron-left'></i>",
              "next": "<i class='typcn typcn-chevron-right'></i>"
            }
          }
        });
        
        // Refresh button
        $('#refreshBtn').click(function() {
          // In a real app, this would reload data from server
          showToast("Appointments refreshed");
        });
      });
    </script>
  </body>
</html>