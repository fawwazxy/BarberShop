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
                      John Smith - 11:30 AM
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
                      Mike Johnson - 2:00 PM
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
                  <div>
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
                            <th>Barber</th>
                            <th>Service</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1001</td>
                            <td>Jun 15, 2024</td>
                            <td class="time-cell">10:00 AM</td>
                            <td>John Smith</td>
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
                          <tr>
                            <td>1002</td>
                            <td>Jun 15, 2024</td>
                            <td class="time-cell">11:30 AM</td>
                            <td>Mike Johnson</td>
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
                          <tr>
                            <td>1003</td>
                            <td>Jun 14, 2024</td>
                            <td class="time-cell">2:00 PM</td>
                            <td>Sarah Wilson</td>
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
                          <tr>
                            <td>1004</td>
                            <td>Jun 13, 2024</td>
                            <td class="time-cell">4:30 PM</td>
                            <td>Robert Brown</td>
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
                    <span aria-hidden="true">&times;</span>
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
                                <div class="form-control-plaintext">1001</div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="small text-muted mb-1">Status</label>
                                <div class="form-control-plaintext"><span class="badge-status badge-confirmed">Confirmed</span></div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="small text-muted mb-1">Date</label>
                                <div class="form-control-plaintext">Jun 15, 2024</div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="small text-muted mb-1">Time</label>
                                <div class="form-control-plaintext">10:00 AM</div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="small text-muted mb-1">Customer</label>
                                <div class="form-control-plaintext">John Smith</div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="small text-muted mb-1">Barber</label>
                                <div class="form-control-plaintext">Tony Styles</div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="small text-muted mb-1">Service Description</label>
                            <div class="card bg-light p-3">
                              Haircut and Beard Trim - Customer requested a fade on the sides with about an inch off the top. Beard should be trimmed to 5mm length.
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="small text-muted mb-1">Price</label>
                                <div class="form-control-plaintext price-cell">RM45.00</div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="small text-muted mb-1">Duration</label>
                                <div class="form-control-plaintext">45 minutes</div>
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
                              <tbody>
                                <tr>
                                  <td>Jun 10, 2024</td>
                                  <td>Haircut</td>
                                  <td>Tony Styles</td>
                                  <td>RM30.00</td>
                                  <td><span class="badge-status badge-completed">Completed</span></td>
                                </tr>
                                <tr>
                                  <td>May 27, 2024</td>
                                  <td>Beard Trim</td>
                                  <td>Carl Fade</td>
                                  <td>RM15.00</td>
                                  <td><span class="badge-status badge-completed">Completed</span></td>
                                </tr>
                                <tr>
                                  <td>May 13, 2024</td>
                                  <td>Haircut</td>
                                  <td>Tony Styles</td>
                                  <td>RM30.00</td>
                                  <td><span class="badge-status badge-completed">Completed</span></td>
                                </tr>
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
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="addAppointmentForm">
                    <div class="form-group">
                      <label>Customer</label>
                      <select class="form-control" id="appointmentCustomer">
                        <option value="">Select Customer</option>
                        <option value="1">John Smith</option>
                        <option value="2">Mike Johnson</option>
                        <option value="3">Sarah Wilson</option>
                        <option value="4">Robert Brown</option>
                      </select>
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
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="editAppointmentForm">
                    <div class="form-group">
                      <label>Customer</label>
                      <select class="form-control" id="editAppointmentCustomer">
                        <option value="1" selected>John Smith</option>
                        <option value="2">Mike Johnson</option>
                        <option value="3">Sarah Wilson</option>
                        <option value="4">Robert Brown</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Date</label>
                      <input type="date" class="form-control" id="editAppointmentDate" value="2024-06-15">
                    </div>
                    <div class="form-group">
                      <label>Time</label>
                      <input type="time" class="form-control" id="editAppointmentTime" value="10:00">
                    </div>
                    <div class="form-group">
                      <label>Barber</label>
                      <select class="form-control" id="editAppointmentBarber">
                        <option value="1" selected>Tony Styles</option>
                        <option value="2">Carl Fade</option>
                        <option value="3">Eddie Razor</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Service Description</label>
                      <textarea class="form-control" id="editAppointmentDescription" rows="3">Haircut and Beard Trim</textarea>
                    </div>
                    <div class="form-group">
                      <label>Price (RM)</label>
                      <input type="number" step="0.01" class="form-control" id="editAppointmentPrice" value="45.00">
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" id="editAppointmentStatus">
                        <option value="pending">Pending</option>
                        <option value="confirmed" selected>Confirmed</option>
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
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to delete appointment <strong>#1001</strong> for <strong>John Smith</strong>? This action cannot be undone.</p>
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
        // Initialize DataTable
        $('#appointmentsTable').DataTable({
          "order": [[1, "desc"], [2, "asc"]], // Sort by Date descending, then Time ascending
          "columnDefs": [
            { "targets": [1], "type": "date" }, // Proper sorting for date column
            { "targets": [2], "type": "time" }  // Proper sorting for time column
          ],
          dom: 'Bfrtip',
          buttons: [
            {
              extend: 'print',
              text: '<i class="typcn typcn-printer mr-1"></i> Print',
              className: 'btn btn-outline-secondary btn-sm',
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7]
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
        
        // New appointment button
        $('#newAppointmentBtn').click(function() {
          // Set default date to today
          $('#appointmentDate').val(new Date().toISOString().substr(0, 10));
          $('#addAppointmentModal').modal('show');
        });
        
        // Save new appointment
        $('#saveAppointmentBtn').click(function() {
          $('#addAppointmentModal').modal('hide');
          $('#addAppointmentForm')[0].reset();
          alert('Appointment added successfully!');
        });
        
        // View button click handler
        $('.btn-view').click(function() {
          $('#viewAppointmentModal').modal('show');
        });
        
        // Edit button click handler
        $('.btn-edit').click(function() {
          $('#editAppointmentModal').modal('show');
        });
        
        // Delete button click handler
        $('.btn-delete').click(function() {
          $('#deleteAppointmentModal').modal('show');
        });
        
        // Update appointment
        $('#updateAppointmentBtn').click(function() {
          $('#editAppointmentModal').modal('hide');
          alert('Appointment updated successfully!');
        });
        
        // Confirm delete
        $('#confirmDeleteAppointmentBtn').click(function() {
          $('#deleteAppointmentModal').modal('hide');
          alert('Appointment deleted successfully!');
        });
      });
    </script>
  </body>
</html>