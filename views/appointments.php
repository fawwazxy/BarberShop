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
    <title>Appointment Directory</title>
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
      .time-cell {
        font-weight: 500;
        color: #4B49AC;
      }
      
      .description-cell {
        max-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
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
      
      .btn-edit {
        background-color: #FFC100;
        color: #212529;
        border: none;
      }
      
      .btn-edit:hover {
        background-color: #e0a800;
        transform: translateY(-1px);
      }
      
      .btn-delete {
        background-color: #FD7E14;
        color: white;
        border: none;
      }
      
      .btn-delete:hover {
        background-color: #e06c0c;
        transform: translateY(-1px);
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
      
      .badge-cancelled {
        background-color: #f8f9fa;
        color: #6c757d;
        border: 1px solid #e9ecef;
      }
      
      .badge-pending {
        background-color: #fff8e6;
        color: #d39e00;
        border: 1px solid #ffeeba;
      }
      
      .badge-confirmed {
        background-color: #e6f7f9;
        color: #17a2b8;
        border: 1px solid #bee5eb;
      }
      
      /* Price Cell */
      .price-cell {
        font-weight: 600;
        color: #28a745;
      }
      
      /* Modal Improvements */
      .modal-content {
        border: none;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
      }
      
      .modal-header {
        border-bottom: 1px solid #f1f1f1;
        padding: 16px 20px;
      }
      
      .modal-title {
        font-weight: 600;
        color: #2c3e50;
      }
      
      .modal-body {
        padding: 20px;
      }
      
      .modal-footer {
        border-top: 1px solid #f1f1f1;
        padding: 16px 20px;
      }
      
      /* Form Controls */
      .form-control {
        border: 1px solid #e9ecef;
        border-radius: 6px;
        padding: 8px 12px;
        font-size: 14px;
      }
      
      /* Alert */
      .alert-warning {
        background-color: #fff8e6;
        border-color: #ffeeba;
        color: #856404;
      }
      
      /* Button Improvements */
      .btn {
        font-weight: 500;
        padding: 8px 16px;
        border-radius: 6px;
        transition: all 0.2s;
      }
      
      .btn-primary {
        background-color: #4B49AC;
        border-color: #4B49AC;
      }
      
      .btn-primary:hover {
        background-color: #3a3894;
        border-color: #3a3894;
        transform: translateY(-1px);
      }
      
      /* Filter and Add Button Container */
      .filter-add-container {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
      }
      
      .filter-container {
        flex-grow: 1;
        max-width: 200px;
      }
      
      /* Customer Manual Input and Phone */
      #appointmentCustomerManual, #editAppointmentCustomerManual, #appointmentPhone, #editAppointmentPhone {
        display: none;
        margin-top: 10px;
      }
      
      #appointmentPhone.show, #editAppointmentPhone.show {
        display: block;
      }
      
      /* Responsive Adjustments */
      @media (max-width: 768px) {
        .appointment-table thead th,
        .appointment-table tbody td {
          padding: 10px 12px;
          font-size: 0.85rem;
        }
        
        .action-buttons .btn {
          padding: 4px 6px;
          font-size: 12px;
          margin-right: 3px;
        }
        
        .filter-add-container {
          flex-direction: column;
          align-items: flex-start;
        }
        
        .filter-container {
          max-width: 100%;
          width: 100%;
        }
        
        #newAppointmentBtn {
          width: 100%;
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
                      Ahmad bin Ismail - 11:30 AM
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
                      Siti Nurhaliza - 2:00 PM
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
                  <h3 class="font-weight-bold mb-0">Appointment Management</h3>
                  <div class="filter-add-container">
                    <div class="filter-container">
                      <select class="form-control" id="statusFilter">
                        <option value="">All Status</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                      </select>
                    </div>
                    <button id="newAppointmentBtn" class="btn btn-primary">
                      <i class="typcn typcn-plus mr-1"></i> Add New Appointment
                    </button>
                  </div>
                </div>
                
                <div class="card">
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table id="appointmentsTable" class="table appointment-table">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Customer</th>
                            <th>Phone</th>
                            <th>Barber</th>
                            <th>Service</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr data-id="1001">
                            <td>1001</td>
                            <td>Jun 15, 2024</td>
                            <td class="time-cell">10:00 AM</td>
                            <td>Ahmad bin Ismail</td>
                            <td>+6012-3456789</td>
                            <td>Tony Styles</td>
                            <td class="description-cell">Haircut and Beard Trim</td>
                            <td class="price-cell">RM45.00</td>
                            <td><span class="badge-status badge-confirmed">Confirmed</span></td>
                            <td class="action-buttons">
                              <button class="btn btn-view btn-sm" title="View">
                                <i class="typcn typcn-eye"></i>
                              </button>
                              <button class="btn btn-edit btn-sm" title="Edit">
                                <i class="typcn typcn-edit"></i>
                              </button>
                              <button class="btn btn-delete btn-sm" title="Delete">
                                <i class="typcn typcn-trash"></i>
                              </button>
                            </td>
                          </tr>
                          <tr data-id="1002">
                            <td>1002</td>
                            <td>Jun 15, 2024</td>
                            <td class="time-cell">11:30 AM</td>
                            <td>Siti Nurhaliza</td>
                            <td>+6013-4567890</td>
                            <td>Carl Fade</td>
                            <td class="description-cell">Premium Haircut</td>
                            <td class="price-cell">RM35.00</td>
                            <td><span class="badge-status badge-pending">Pending</span></td>
                            <td class="action-buttons">
                              <button class="btn btn-view btn-sm" title="View">
                                <i class="typcn typcn-eye"></i>
                              </button>
                              <button class="btn btn-edit btn-sm" title="Edit">
                                <i class="typcn typcn-edit"></i>
                              </button>
                              <button class="btn btn-delete btn-sm" title="Delete">
                                <i class="typcn typcn-trash"></i>
                              </button>
                            </td>
                          </tr>
                          <tr data-id="1003">
                            <td>1003</td>
                            <td>Jun 14, 2024</td>
                            <td class="time-cell">2:00 PM</td>
                            <td>Mohd Azlan</td>
                            <td>+6017-5678901</td>
                            <td>Eddie Razor</td>
                            <td class="description-cell">Hair Color and Treatment</td>
                            <td class="price-cell">RM80.00</td>
                            <td><span class="badge-status badge-completed">Completed</span></td>
                            <td class="action-buttons">
                              <button class="btn btn-view btn-sm" title="View">
                                <i class="typcn typcn-eye"></i>
                              </button>
                              <button class="btn btn-edit btn-sm" title="Edit">
                                <i class="typcn typcn-edit"></i>
                              </button>
                              <button class="btn btn-delete btn-sm" title="Delete">
                                <i class="typcn typcn-trash"></i>
                              </button>
                            </td>
                          </tr>
                          <tr data-id="1004">
                            <td>1004</td>
                            <td>Jun 13, 2024</td>
                            <td class="time-cell">4:30 PM</td>
                            <td>Nur Aisyah</td>
                            <td>+6019-6789012</td>
                            <td>Tony Styles</td>
                            <td class="description-cell">Beard Trim and Shave</td>
                            <td class="price-cell">RM25.00</td>
                            <td><span class="badge-status badge-cancelled">Cancelled</span></td>
                            <td class="action-buttons">
                              <button class="btn btn-view btn-sm" title="View">
                                <i class="typcn typcn-eye"></i>
                              </button>
                              <button class="btn btn-edit btn-sm" title="Edit">
                                <i class="typcn typcn-edit"></i>
                              </button>
                              <button class="btn btn-delete btn-sm" title="Delete">
                                <i class="typcn typcn-trash"></i>
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
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">
                      <ul class="nav nav-tabs" id="appointmentTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="true">Details</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">Customer History</a>
                        </li>
                      </ul>
                      
                      <div class="tab-content pt-3" id="appointmentTabContent">
                        <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="small text-muted mb-1">Appointment ID</label>
                                <div class="form-control-plaintext view-id"></div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="small text-muted mb-1">Status</label>
                                <div class="form-control-plaintext"><span class="badge-status view-status"></span></div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="small text-muted mb-1">Date</label>
                                <div class="form-control-plaintext view-date"></div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="small text-muted mb-1">Time</label>
                                <div class="form-control-plaintext view-time"></div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="small text-muted mb-1">Customer</label>
                                <div class="form-control-plaintext view-customer"></div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="small text-muted mb-1">Phone</label>
                                <div class="form-control-plaintext view-phone"></div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="small text-muted mb-1">Barber</label>
                                <div class="form-control-plaintext view-barber"></div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="small text-muted mb-1">Service Description</label>
                            <div class="card bg-light p-3 view-description"></div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="small text-muted mb-1">Price</label>
                                <div class="form-control-plaintext price-cell view-price"></div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="small text-muted mb-1">Duration</label>
                                <div class="form-control-plaintext view-duration"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                          <div class="table-responsive">
                            <table class="table table-sm">
                              <thead>
                                <tr>
                                  <th>Date</th>
                                  <th>Service</th>
                                  <th>Barber</th>
                                  <th>Amount</th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody class="view-history">
                              </tbody>
                            </table>
                          </div>
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
          
          <!-- Add Appointment Modal -->
          <div class="modal fade" id="addAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="addAppointmentModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addAppointmentModalLabel">Add New Appointment</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="addAppointmentForm">
                    <div class="form-group">
                      <label>Customer</label>
                      <select class="form-control" id="appointmentCustomer">
                        <option value="">Select Customer</option>
                        <option value="1">Ahmad bin Ismail</option>
                        <option value="2">Siti Nurhaliza</option>
                        <option value="3">Mohd Azlan</option>
                        <option value="4">Nur Aisyah</option>
                        <option value="other">Other</option>
                      </select>
                      <input type="text" class="form-control" id="appointmentCustomerManual" placeholder="Enter new customer name">
                    </div>
                    <div class="form-group">
                      <label>Phone</label>
                      <input type="tel" class="form-control" id="appointmentPhone" placeholder="+6012-3456789">
                    </div>
                    <div class="form-group">
                      <label>Date</label>
                      <input type="date" class="form-control" id="appointmentDate">
                    </div>
                    <div class="form-group">
                      <label>Time</label>
                      <input type="time" class="form-control" id="appointmentTime">
                    </div>
                    <div class="form-group">
                      <label>Barber</label>
                      <select class="form-control" id="appointmentBarber">
                        <option value="">Select Barber</option>
                        <option value="1">Tony Styles</option>
                        <option value="2">Carl Fade</option>
                        <option value="3">Eddie Razor</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Service Description</label>
                      <textarea class="form-control" id="appointmentDescription" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Price (RM)</label>
                      <input type="number" step="0.01" class="form-control" id="appointmentPrice" placeholder="0.00">
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" id="appointmentStatus">
                        <option value="pending">Pending</option>
                        <option value="confirmed">Confirmed</option>
                      </select>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary" id="saveAppointmentBtn">Save Appointment</button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Edit Appointment Modal -->
          <div class="modal fade" id="editAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="editAppointmentModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editAppointmentModalLabel">Edit Appointment</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="editAppointmentForm">
                    <input type="hidden" id="editAppointmentId">
                    <div class="form-group">
                      <label>Customer</label>
                      <select class="form-control" id="editAppointmentCustomer">
                        <option value="1">Ahmad bin Ismail</option>
                        <option value="2">Siti Nurhaliza</option>
                        <option value="3">Mohd Azlan</option>
                        <option value="4">Nur Aisyah</option>
                        <option value="other">Other</option>
                      </select>
                      <input type="text" class="form-control" id="editAppointmentCustomerManual" placeholder="Enter new customer name">
                    </div>
                    <div class="form-group">
                      <label>Phone</label>
                      <input type="tel" class="form-control" id="editAppointmentPhone" placeholder="+6012-3456789">
                    </div>
                    <div class="form-group">
                      <label>Date</label>
                      <input type="date" class="form-control" id="editAppointmentDate">
                    </div>
                    <div class="form-group">
                      <label>Time</label>
                      <input type="time" class="form-control" id="editAppointmentTime">
                    </div>
                    <div class="form-group">
                      <label>Barber</label>
                      <select class="form-control" id="editAppointmentBarber">
                        <option value="1">Tony Styles</option>
                        <option value="2">Carl Fade</option>
                        <option value="3">Eddie Razor</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Service Description</label>
                      <textarea class="form-control" id="editAppointmentDescription" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Price (RM)</label>
                      <input type="number" step="0.01" class="form-control" id="editAppointmentPrice">
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" id="editAppointmentStatus">
                        <option value="pending">Pending</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                      </select>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary" id="updateAppointmentBtn">Update Appointment</button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Delete Confirmation Modal -->
          <div class="modal fade" id="deleteAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="deleteAppointmentModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteAppointmentModalLabel">Confirm Delete</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to delete appointment <strong class="delete-id"></strong> for <strong class="delete-customer"></strong>? This action cannot be undone.</p>
                  <div class="alert alert-warning mt-3">
                    <i class="typcn typcn-warning mr-2"></i> This will permanently remove the appointment record.
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-danger" id="confirmDeleteAppointmentBtn">Delete Appointment</button>
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
      $(document).ready(function() {
        // Hardcoded appointment data
        let appointments = [
          {
            id: '1001',
            date: 'Jun 15, 2024',
            time: '10:00 AM',
            customer: 'Ahmad bin Ismail',
            phone: '+6012-3456789',
            barber: 'Tony Styles',
            service: 'Haircut and Beard Trim',
            price: 'RM45.00',
            status: 'confirmed',
            duration: '45 minutes',
            history: [
              { date: 'Jun 10, 2024', service: 'Haircut', barber: 'Tony Styles', amount: 'RM30.00', status: 'completed' },
              { date: 'May 27, 2024', service: 'Beard Trim', barber: 'Carl Fade', amount: 'RM15.00', status: 'completed' },
              { date: 'May 13, 2024', service: 'Haircut', barber: 'Tony Styles', amount: 'RM30.00', status: 'completed' }
            ]
          },
          {
            id: '1002',
            date: 'Jun 15, 2024',
            time: '11:30 AM',
            customer: 'Siti Nurhaliza',
            phone: '+6013-4567890',
            barber: 'Carl Fade',
            service: 'Premium Haircut',
            price: 'RM35.00',
            status: 'pending',
            duration: '30 minutes',
            history: []
          },
          {
            id: '1003',
            date: 'Jun 14, 2024',
            time: '2:00 PM',
            customer: 'Mohd Azlan',
            phone: '+6017-5678901',
            barber: 'Eddie Razor',
            service: 'Hair Color and Treatment',
            price: 'RM80.00',
            status: 'completed',
            duration: '60 minutes',
            history: []
          },
          {
            id: '1004',
            date: 'Jun 13, 2024',
            time: '4:30 PM',
            customer: 'Nur Aisyah',
            phone: '+6019-6789012',
            barber: 'Tony Styles',
            service: 'Beard Trim and Shave',
            price: 'RM25.00',
            status: 'cancelled',
            duration: '20 minutes',
            history: []
          }
        ];

        // Initialize DataTable
        let table = $('#appointmentsTable').DataTable({
          "order": [[1, "desc"], [2, "asc"]],
          "columnDefs": [
            { "targets": [1], "type": "date" },
            { "targets": [2], "type": "time" }
          ],
          dom: 'Bfrtip',
          buttons: [
            {
              extend: 'print',
              text: '<i class="typcn typcn-printer mr-1"></i> Print',
              className: 'btn btn-outline-secondary btn-sm',
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
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

        // Toggle manual customer input and phone input visibility
        $('#appointmentCustomer').on('change', function() {
          if ($(this).val() === 'other') {
            $('#appointmentCustomerManual').show();
            $('#appointmentPhone').addClass('show');
          } else {
            $('#appointmentCustomerManual').hide().val('');
            $('#appointmentPhone').addClass('show');
          }
        });

        $('#editAppointmentCustomer').on('change', function() {
          if ($(this).val() === 'other') {
            $('#editAppointmentCustomerManual').show();
            $('#editAppointmentPhone').addClass('show');
          } else {
            $('#editAppointmentCustomerManual').hide().val('');
            $('#editAppointmentPhone').addClass('show');
          }
        });

        // Status filter
        $('#statusFilter').on('change', function() {
          table.column(8).search(this.value).draw();
        });

        // New appointment button
        $('#newAppointmentBtn').click(function() {
          $('#appointmentDate').val(new Date().toISOString().substr(0, 10));
          $('#appointmentCustomer').val('');
          $('#appointmentCustomerManual').hide().val('');
          $('#appointmentPhone').addClass('show').val('');
          $('#addAppointmentModal').modal('show');
        });

        // Save new appointment
        $('#saveAppointmentBtn').click(function() {
          // Convert date to MMM DD, YYYY format
          const dateObj = new Date($('#appointmentDate').val());
          const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
          const formattedDate = `${monthNames[dateObj.getMonth()]} ${dateObj.getDate()}, ${dateObj.getFullYear()}`;

          // Convert time to HH:MM AM/PM format
          let hours = parseInt($('#appointmentTime').val().split(':')[0]);
          const minutes = $('#appointmentTime').val().split(':')[1];
          const period = hours >= 12 ? 'PM' : 'AM';
          if (hours > 12) hours -= 12;
          if (hours === 0) hours = 12;
          const formattedTime = `${hours}:${minutes} ${period}`;

          // Determine customer name
          let customerName = $('#appointmentCustomer').val() === 'other' ? $('#appointmentCustomerManual').val().trim() : $('#appointmentCustomer option:selected').text();
          if ($('#appointmentCustomer').val() === '') customerName = '';

          // Get phone number
          const phone = $('#appointmentPhone').val().trim();
          const phoneRegex = /^\+601[0-9]-[0-9]{7,8}$/;

          const newId = (Math.max(...appointments.map(a => parseInt(a.id))) + 1).toString();
          const newAppointment = {
            id: newId,
            date: formattedDate,
            time: formattedTime,
            customer: customerName,
            phone: phone,
            barber: $('#appointmentBarber option:selected').text(),
            service: $('#appointmentDescription').val().trim(),
            price: 'RM' + parseFloat($('#appointmentPrice').val()).toFixed(2),
            status: $('#appointmentStatus').val(),
            duration: '30 minutes', // Default duration
            history: []
          };

          // Validation
          if (!newAppointment.date || !newAppointment.time || !newAppointment.customer || !phone || !phoneRegex.test(phone) ||
              !newAppointment.barber || !newAppointment.service || !newAppointment.price || isNaN(parseFloat($('#appointmentPrice').val()))) {
            alert('Please fill in all required fields with valid data. Phone number must be in the format +601X-XXXXXXX.');
            return;
          }

          appointments.push(newAppointment);

          // Add row to DataTable with consistent action buttons
          const newRow = $(`
            <tr data-id="${newAppointment.id}">
              <td>${newAppointment.id}</td>
              <td>${newAppointment.date}</td>
              <td class="time-cell">${newAppointment.time}</td>
              <td>${newAppointment.customer}</td>
              <td>${newAppointment.phone}</td>
              <td>${newAppointment.barber}</td>
              <td class="description-cell">${newAppointment.service}</td>
              <td class="price-cell">${newAppointment.price}</td>
              <td><span class="badge-status badge-${newAppointment.status}">${newAppointment.status.charAt(0).toUpperCase() + newAppointment.status.slice(1)}</span></td>
              <td class="action-buttons">
                <button class="btn btn-view btn-sm" title="View"><i class="typcn typcn-eye"></i></button>
                <button class="btn btn-edit btn-sm" title="Edit"><i class="typcn typcn-edit"></i></button>
                <button class="btn btn-delete btn-sm" title="Delete"><i class="typcn typcn-trash"></i></button>
              </td>
            </tr>
          `);

          table.row.add(newRow).draw();

          $('#addAppointmentModal').modal('hide');
          $('#addAppointmentForm')[0].reset();
          $('#appointmentCustomerManual').hide();
          $('#appointmentPhone').removeClass('show').val('');
          alert('Appointment added successfully!');
        });

        // View button click handler
        $(document).on('click', '.btn-view', function() {
          const id = $(this).closest('tr').data('id').toString();
          const appointment = appointments.find(a => a.id === id);
          
          $('.view-id').text(appointment.id);
          $('.view-date').text(appointment.date);
          $('.view-time').text(appointment.time);
          $('.view-customer').text(appointment.customer);
          $('.view-phone').text(appointment.phone);
          $('.view-barber').text(appointment.barber);
          $('.view-description').text(appointment.service);
          $('.view-price').text(appointment.price);
          $('.view-status').removeClass().addClass('badge-status').addClass(`badge-${appointment.status}`).text(appointment.status.charAt(0).toUpperCase() + appointment.status.slice(1));
          $('.view-duration').text(appointment.duration);

          $('.view-history').empty();
          appointment.history.forEach(h => {
            $('.view-history').append(`
              <tr>
                <td>${h.date}</td>
                <td>${h.service}</td>
                <td>${h.barber}</td>
                <td>${h.amount}</td>
                <td><span class="badge-status badge-${h.status}">${h.status.charAt(0).toUpperCase() + h.status.slice(1)}</span></td>
              </tr>
            `);
          });

          $('#viewAppointmentModal').modal('show');
        });

        // Edit button click handler
        $(document).on('click', '.btn-edit', function() {
          const id = $(this).closest('tr').data('id').toString();
          const appointment = appointments.find(a => a.id === id);

          // Convert date to YYYY-MM-DD format
          const dateParts = appointment.date.split(' ');
          const months = {
            'Jan': '01', 'Feb': '02', 'Mar': '03', 'Apr': '04',
            'May': '05', 'Jun': '06', 'Jul': '07', 'Aug': '08',
            'Sep': '09', 'Oct': '10', 'Nov': '11', 'Dec': '12'
          };
          const formattedDate = `${dateParts[2]}-${months[dateParts[0]]}-${dateParts[1].replace(',', '')}`;
          
          // Convert time to HH:MM format
          const [time, period] = appointment.time.split(' ');
          let [hours, minutes] = time.split(':');
          hours = parseInt(hours);
          if (period === 'PM' && hours !== 12) hours += 12;
          if (period === 'AM' && hours === 12) hours = 0;
          const formattedTime = `${hours.toString().padStart(2, '0')}:${minutes}`;

          $('#editAppointmentId').val(appointment.id);
          
          // Check if customer is in dropdown options
          const customerOption = [...$('#editAppointmentCustomer option')].find(opt => opt.text === appointment.customer);
          if (customerOption) {
            $('#editAppointmentCustomer').val(customerOption.value);
            $('#editAppointmentCustomerManual').hide().val('');
          } else {
            $('#editAppointmentCustomer').val('other');
            $('#editAppointmentCustomerManual').show().val(appointment.customer);
          }
          
          $('#editAppointmentPhone').val(appointment.phone).addClass('show');
          $('#editAppointmentDate').val(formattedDate);
          $('#editAppointmentTime').val(formattedTime);
          $('#editAppointmentBarber').val([...$('#editAppointmentBarber option')].find(opt => opt.text === appointment.barber)?.value);
          $('#editAppointmentDescription').val(appointment.service);
          $('#editAppointmentPrice').val(parseFloat(appointment.price.replace('RM', '')));
          $('#editAppointmentStatus').val(appointment.status);

          $('#editAppointmentModal').modal('show');
        });

        // Update appointment
        $(document).on('click', '#updateAppointmentBtn', function() {
          const id = $('#editAppointmentId').val();
          const index = appointments.findIndex(a => a.id === id);

          // Determine customer name
          let customerName = $('#editAppointmentCustomer').val() === 'other' ? $('#editAppointmentCustomerManual').val().trim() : $('#editAppointmentCustomer option:selected').text();
          if ($('#editAppointmentCustomer').val() === '') customerName = '';

          // Get phone number
          const phone = $('#editAppointmentPhone').val().trim();
          const phoneRegex = /^\+601[0-9]-[0-9]{7,8}$/;

          // Validation
          if (!$('#editAppointmentDate').val() || !$('#editAppointmentTime').val() || !customerName || !phone || !phoneRegex.test(phone) ||
              !$('#editAppointmentBarber').val() || !$('#editAppointmentDescription').val().trim() || !$('#editAppointmentPrice').val() || isNaN(parseFloat($('#editAppointmentPrice').val()))) {
            alert('Please fill in all required fields with valid data. Phone number must be in the format +601X-XXXXXXX.');
            return;
          }

          // Convert date to MMM DD, YYYY format
          const dateObj = new Date($('#editAppointmentDate').val());
          const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
          const formattedDisplayDate = `${monthNames[dateObj.getMonth()]} ${dateObj.getDate()}, ${dateObj.getFullYear()}`;

          // Convert time to HH:MM AM/PM format
          let hours = parseInt($('#editAppointmentTime').val().split(':')[0]);
          const minutes = $('#editAppointmentTime').val().split(':')[1];
          const period = hours >= 12 ? 'PM' : 'AM';
          if (hours > 12) hours -= 12;
          if (hours === 0) hours = 12;
          const formattedDisplayTime = `${hours}:${minutes} ${period}`;

          appointments[index] = {
            ...appointments[index],
            date: formattedDisplayDate,
            time: formattedDisplayTime,
            customer: customerName,
            phone: phone,
            barber: $('#editAppointmentBarber option:selected').text(),
            service: $('#editAppointmentDescription').val().trim(),
            price: 'RM' + parseFloat($('#editAppointmentPrice').val()).toFixed(2),
            status: $('#editAppointmentStatus').val()
          };

          const updatedRow = $(`
            <tr data-id="${id}">
              <td>${id}</td>
              <td>${appointments[index].date}</td>
              <td class="time-cell">${appointments[index].time}</td>
              <td>${appointments[index].customer}</td>
              <td>${appointments[index].phone}</td>
              <td>${appointments[index].barber}</td>
              <td class="description-cell">${appointments[index].service}</td>
              <td class="price-cell">${appointments[index].price}</td>
              <td><span class="badge-status badge-${appointments[index].status}">${appointments[index].status.charAt(0).toUpperCase() + appointments[index].status.slice(1)}</span></td>
              <td class="action-buttons">
                <button class="btn btn-view btn-sm" title="View"><i class="typcn typcn-eye"></i></button>
                <button class="btn btn-edit btn-sm" title="Edit"><i class="typcn typcn-edit"></i></button>
                <button class="btn btn-delete btn-sm" title="Delete"><i class="typcn typcn-trash"></i></button>
              </td>
            </tr>
          `);

          table.row($(`tr[data-id="${id}"]`)).data(updatedRow[0].cells).draw();

          $('#editAppointmentModal').modal('hide');
          alert('Appointment updated successfully!');
        });

        // Delete button click handler
        $(document).on('click', '.btn-delete', function() {
          const id = $(this).closest('tr').data('id').toString();
          const appointment = appointments.find(a => a.id === id);
          
          $('.delete-id').text('#' + id);
          $('.delete-customer').text(appointment.customer);
          $('#confirmDeleteAppointmentBtn').data('id', id);
          
          $('#deleteAppointmentModal').modal('show');
        });

        // Confirm delete
        $(document).on('click', '#confirmDeleteAppointmentBtn', function() {
          const id = $(this).data('id');
          appointments = appointments.filter(a => a.id !== id);
          table.row($(`tr[data-id="${id}"]`)).remove().draw();
          
          $('#deleteAppointmentModal').modal('hide');
          alert('Appointment deleted successfully!');
        });
      });
    </script>
  </body>
</html>