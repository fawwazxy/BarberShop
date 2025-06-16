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
    <title>Waiting List | BarberShop</title>
    <!-- base:css -->
    <link rel="stylesheet" href="../vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <!-- endinject --> 
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../images/favicon.png" />
    <style>
      :root {
        --primary-color: #4B49AC;
        --secondary-color: #7C7AB8;
        --success-color: #28a745;
        --warning-color: #FFC100;
        --danger-color: #FD7E14;
        --light-color: #f8f9fa;
      }
      
      body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #333;
      }
      
      h3 {
        font-weight: 600;
        color: #2c3e50;
      }
      
      /* Waiting List Card */
      .waiting-list-card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        margin-bottom: 20px;
      }
      
      .waiting-list-header {
        background-color: var(--primary-color);
        color: white;
        padding: 15px 20px;
        border-radius: 10px 10px 0 0;
      }
      
      /* Waiting List Table */
      .waiting-list-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
      }
      
      .waiting-list-table thead th {
        background-color: var(--secondary-color);
        color: white;
        font-weight: 500;
        padding: 12px 16px;
        font-size: 0.9rem;
      }
      
      .waiting-list-table tbody tr {
        transition: all 0.2s ease;
      }
      
      .waiting-list-table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
      }
      
      .waiting-list-table tbody tr:hover {
        background-color: #f1f1f1;
      }
      
      .waiting-list-table tbody td {
        padding: 12px 16px;
        vertical-align: middle;
        border-bottom: 1px solid #f1f1f1;
        font-size: 0.9rem;
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
      
      /* Status Badges */
      .badge-status {
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 500;
        letter-spacing: 0.3px;
      }
      
      .badge-waiting {
        background-color: #e6f7f9;
        color: #17a2b8;
        border: 1px solid #bee5eb;
      }
      
      .badge-in-progress {
        background-color: #fff8e6;
        color: #d39e00;
        border: 1px solid #ffeeba;
      }
      
      .badge-completed {
        background-color: #e6f7ee;
        color: #28a745;
        border: 1px solid #c3e6cb;
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
      
      .btn-start {
        background-color: var(--success-color);
        color: white;
        border: none;
      }
      
      .btn-start:hover {
        background-color: #218838;
        transform: translateY(-1px);
      }
      
      .btn-complete {
        background-color: var(--primary-color);
        color: white;
        border: none;
      }
      
      .btn-complete:hover {
        background-color: #3a3894;
        transform: translateY(-1px);
      }
      
      .btn-cancel {
        background-color: var(--danger-color);
        color: white;
        border: none;
      }
      
      .btn-cancel:hover {
        background-color: #e06c0c;
        transform: translateY(-1px);
      }
      
      /* Waiting Time Indicator */
      .waiting-time {
        font-weight: 600;
      }
      
      .waiting-time.short {
        color: var(--success-color);
      }
      
      .waiting-time.medium {
        color: var(--warning-color);
      }
      
      .waiting-time.long {
        color: var(--danger-color);
      }
      
      /* Current Service Card */
      .current-service-card {
        background-color: var(--light-color);
        border-left: 4px solid var(--primary-color);
        border-radius: 6px;
        padding: 15px;
        margin-bottom: 20px;
      }
      
      .current-service-title {
        color: var(--primary-color);
        font-weight: 600;
        margin-bottom: 10px;
      }
      
      /* Stats Cards */
      .stats-card {
        border-radius: 8px;
        padding: 15px;
        color: white;
        margin-bottom: 20px;
      }
      
      .stats-card .stats-title {
        font-size: 14px;
        opacity: 0.9;
        margin-bottom: 5px;
      }
      
      .stats-card .stats-value {
        font-size: 24px;
        font-weight: 600;
      }
      
      .stats-waiting {
        background-color: var(--secondary-color);
      }
      
      .stats-in-progress {
        background-color: var(--warning-color);
      }
      
      .stats-completed {
        background-color: var(--success-color);
      }
      
      /* Responsive Adjustments */
      @media (max-width: 768px) {
        .waiting-list-table thead th,
        .waiting-list-table tbody td {
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
              <a class="nav-link active" href="#">
                <i class="typcn typcn-time mr-1"></i> Waiting List
              </a>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-flex mr-3">
              <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="typcn typcn-bell"></i>
                <span class="count bg-danger">2</span>
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
                    <h6 class="preview-subject font-weight-normal">New Customer</h6>
                    <p class="font-weight-light small-text mb-0">
                      Michael added to waiting list
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="typcn typcn-time"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">Waiting Time</h6>
                    <p class="font-weight-light small-text mb-0">
                      John has been waiting 25 mins
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
                  <h3 class="font-weight-bold mb-0">Waiting List Management</h3>
                  <div>
                    <button id="newWaitingBtn" class="btn btn-primary">
                      <i class="typcn typcn-plus mr-1"></i> Add to Waiting List
                    </button>
                  </div>
                </div>
                
                <!-- Current Service Section -->
                <div class="current-service-card">
                  <div class="current-service-title">
                    <i class="typcn typcn-scissors mr-2"></i> Currently Serving
                  </div>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="customer-name">
                      <img src="https://randomuser.me/api/portraits/men/32.jpg" class="customer-avatar" alt="David Wilson">
                      <div>
                        <strong>David Wilson</strong>
                        <div class="text-muted small">Haircut & Beard Trim</div>
                      </div>
                    </div>
                    <div>
                      <span class="badge-status badge-in-progress">In Progress</span>
                      <button class="btn btn-complete btn-sm ml-2">
                        <i class="typcn typcn-tick"></i> Complete
                      </button>
                    </div>
                  </div>
                </div>
                
                <!-- Stats Cards -->
                <div class="row">
                  <div class="col-md-4">
                    <div class="stats-card stats-waiting">
                      <div class="stats-title">Waiting</div>
                      <div class="stats-value">5</div>
                      <div class="small">Customers in queue</div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="stats-card stats-in-progress">
                      <div class="stats-title">In Progress</div>
                      <div class="stats-value">1</div>
                      <div class="small">Being served now</div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="stats-card stats-completed">
                      <div class="stats-title">Completed</div>
                      <div class="stats-value">8</div>
                      <div class="small">Today</div>
                    </div>
                  </div>
                </div>
                
                <!-- Waiting List Table -->
                <div class="card waiting-list-card">
                  <div class="waiting-list-header">
                    <i class="typcn typcn-time mr-2"></i> Waiting Queue
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table id="waitingListTable" class="table waiting-list-table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Service</th>
                            <th>Waiting Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td class="customer-name">
                              <img src="https://randomuser.me/api/portraits/men/1.jpg" class="customer-avatar" alt="John Smith">
                              <strong>John Smith</strong>
                            </td>
                            <td>Premium Haircut</td>
                            <td class="waiting-time medium">15 min</td>
                            <td><span class="badge-status badge-waiting">Waiting</span></td>
                            <td class="action-buttons">
                              <button class="btn btn-start btn-sm" title="Start Service">
                                <i class="typcn typcn-media-play"></i>
                              </button>
                              <button class="btn btn-cancel btn-sm" title="Cancel">
                                <i class="typcn typcn-times"></i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td class="customer-name">
                              <img src="https://randomuser.me/api/portraits/women/2.jpg" class="customer-avatar" alt="Sarah Johnson">
                              <strong>Sarah Johnson</strong>
                            </td>
                            <td>Hair Color</td>
                            <td class="waiting-time short">5 min</td>
                            <td><span class="badge-status badge-waiting">Waiting</span></td>
                            <td class="action-buttons">
                              <button class="btn btn-start btn-sm" title="Start Service">
                                <i class="typcn typcn-media-play"></i>
                              </button>
                              <button class="btn btn-cancel btn-sm" title="Cancel">
                                <i class="typcn typcn-times"></i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td class="customer-name">
                              <img src="https://randomuser.me/api/portraits/men/3.jpg" class="customer-avatar" alt="Michael Brown">
                              <strong>Michael Brown</strong>
                            </td>
                            <td>Beard Trim</td>
                            <td class="waiting-time long">25 min</td>
                            <td><span class="badge-status badge-waiting">Waiting</span></td>
                            <td class="action-buttons">
                              <button class="btn btn-start btn-sm" title="Start Service">
                                <i class="typcn typcn-media-play"></i>
                              </button>
                              <button class="btn btn-cancel btn-sm" title="Cancel">
                                <i class="typcn typcn-times"></i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td class="customer-name">
                              <img src="https://randomuser.me/api/portraits/women/4.jpg" class="customer-avatar" alt="Emily Davis">
                              <strong>Emily Davis</strong>
                            </td>
                            <td>Haircut & Blow Dry</td>
                            <td class="waiting-time medium">10 min</td>
                            <td><span class="badge-status badge-waiting">Waiting</span></td>
                            <td class="action-buttons">
                              <button class="btn btn-start btn-sm" title="Start Service">
                                <i class="typcn typcn-media-play"></i>
                              </button>
                              <button class="btn btn-cancel btn-sm" title="Cancel">
                                <i class="typcn typcn-times"></i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td class="customer-name">
                              <img src="https://randomuser.me/api/portraits/men/5.jpg" class="customer-avatar" alt="Robert Wilson">
                              <strong>Robert Wilson</strong>
                            </td>
                            <td>Clipper Cut</td>
                            <td class="waiting-time short">2 min</td>
                            <td><span class="badge-status badge-waiting">Waiting</span></td>
                            <td class="action-buttons">
                              <button class="btn btn-start btn-sm" title="Start Service">
                                <i class="typcn typcn-media-play"></i>
                              </button>
                              <button class="btn btn-cancel btn-sm" title="Cancel">
                                <i class="typcn typcn-times"></i>
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
          
          <!-- Add to Waiting List Modal -->
          <div class="modal fade" id="addWaitingModal" tabindex="-1" role="dialog" aria-labelledby="addWaitingModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addWaitingModalLabel">Add to Waiting List</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="addWaitingForm">
                    <div class="form-group">
                      <label>Customer</label>
                      <select class="form-control" id="waitingCustomer">
                        <option value="">Select Customer</option>
                        <option value="1">John Smith</option>
                        <option value="2">Sarah Johnson</option>
                        <option value="3">Michael Brown</option>
                        <option value="4">Emily Davis</option>
                        <option value="5">Robert Wilson</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Service</label>
                      <select class="form-control" id="waitingService">
                        <option value="">Select Service</option>
                        <option value="1">Haircut - RM30</option>
                        <option value="2">Beard Trim - RM15</option>
                        <option value="3">Hair Color - RM50</option>
                        <option value="4">Premium Package - RM80</option>
                        <option value="5">Clipper Cut - RM25</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Notes</label>
                      <textarea class="form-control" id="waitingNotes" rows="3" placeholder="Any special requests or notes"></textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary" id="saveWaitingBtn">Add to List</button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Start Service Modal -->
          <div class="modal fade" id="startServiceModal" tabindex="-1" role="dialog" aria-labelledby="startServiceModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="startServiceModalLabel">Start Service</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you ready to start service for <strong>John Smith</strong>?</p>
                  <div class="form-group">
                    <label>Select Barber</label>
                    <select class="form-control" id="serviceBarber">
                      <option value="">Select Barber</option>
                      <option value="1">Tony Styles</option>
                      <option value="2">Carl Fade</option>
                      <option value="3">Eddie Razor</option>
                    </select>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary" id="confirmStartServiceBtn">Start Service</button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Complete Service Modal -->
          <div class="modal fade" id="completeServiceModal" tabindex="-1" role="dialog" aria-labelledby="completeServiceModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="completeServiceModalLabel">Complete Service</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Mark service as completed for <strong>David Wilson</strong>?</p>
                  <div class="form-group">
                    <label>Service Notes</label>
                    <textarea class="form-control" id="serviceNotes" rows="3" placeholder="Any notes about the service"></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary" id="confirmCompleteServiceBtn">Complete Service</button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Cancel Waiting Modal -->
          <div class="modal fade" id="cancelWaitingModal" tabindex="-1" role="dialog" aria-labelledby="cancelWaitingModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="cancelWaitingModalLabel">Cancel Waiting</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to remove <strong>John Smith</strong> from the waiting list?</p>
                  <div class="alert alert-warning mt-3">
                    <i class="typcn typcn-warning mr-2"></i> This action cannot be undone.
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-danger" id="confirmCancelWaitingBtn">Remove from List</button>
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
        $('#waitingListTable').DataTable({
          "order": [[0, "asc"]], // Sort by position in queue
          "language": {
            "paginate": {
              "previous": "<i class='typcn typcn-chevron-left'></i>",
              "next": "<i class='typcn typcn-chevron-right'></i>"
            }
          }
        });
        
        // New waiting list button
        $('#newWaitingBtn').click(function() {
          $('#addWaitingModal').modal('show');
        });
        
        // Save new waiting list entry
        $('#saveWaitingBtn').click(function() {
          $('#addWaitingModal').modal('hide');
          $('#addWaitingForm')[0].reset();
          alert('Customer added to waiting list successfully!');
        });
        
        // Start service button click handler
        $('.btn-start').click(function() {
          $('#startServiceModal').modal('show');
        });
        
        // Complete service button click handler
        $('.btn-complete').click(function() {
          $('#completeServiceModal').modal('show');
        });
        
        // Cancel waiting button click handler
        $('.btn-cancel').click(function() {
          $('#cancelWaitingModal').modal('show');
        });
        
        // Confirm start service
        $('#confirmStartServiceBtn').click(function() {
          $('#startServiceModal').modal('hide');
          alert('Service started successfully!');
        });
        
        // Confirm complete service
        $('#confirmCompleteServiceBtn').click(function() {
          $('#completeServiceModal').modal('hide');
          alert('Service marked as completed!');
        });
        
        // Confirm cancel waiting
        $('#confirmCancelWaitingBtn').click(function() {
          $('#cancelWaitingModal').modal('hide');
          alert('Customer removed from waiting list!');
        });
        
        // Update waiting times every minute
        setInterval(updateWaitingTimes, 60000);
        
        function updateWaitingTimes() {
          $('.waiting-time').each(function() {
            let currentTime = parseInt($(this).text());
            let newTime = currentTime + 1;
            $(this).text(newTime + ' min');
            
            // Update color based on waiting time
            $(this).removeClass('short medium long');
            if(newTime < 10) {
              $(this).addClass('short');
            } else if(newTime < 20) {
              $(this).addClass('medium');
            } else {
              $(this).addClass('long');
            }
          });
        }
      });
    </script>
  </body>
</html>