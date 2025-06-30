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
    <title>Customer Directory</title>
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
      .customer-table {
        margin-top: 20px;
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 15px rgba(0,0,0,0.05);
      }
      
      .customer-table thead th {
        background-color: #4B49AC;
        color: white;
        font-weight: 500;
        border: none;
        padding: 12px 16px;
        font-size: 0.9rem;
      }
      
      .customer-table tbody tr {
        transition: all 0.2s ease;
      }
      
      .customer-table tbody tr:hover {
        background-color: #f8f9fa;
      }
      
      .customer-table tbody td {
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
      
      .email-cell {
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
      
      .badge-active {
        background-color: #e6f7ee;
        color: #28a745;
        border: 1px solid #c3e6cb;
      }
      
      .badge-inactive {
        background-color: #f8f9fa;
        color: #6c757d;
        border: 1px solid #e9ecef;
      }
      
      .badge-completed {
        background-color: #e6f7f9;
        color: #17a2b8;
        border: 1px solid #bee5eb;
      }
      
      .badge-pending {
        background-color: #fff8e6;
        color: #d39e00;
        border: 1px solid #ffeeba;
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
      
      /* Stats in View Modal */
      .customer-stats {
        background: #f9f9f9;
        border-radius: 8px;
        padding: 15px;
        margin-top: 15px;
      }
      
      .stat-item {
        text-align: center;
        padding: 0 10px;
      }
      
      .stat-item h5 {
        font-weight: 600;
        margin-bottom: 5px;
      }
      
      .stat-item p {
        font-size: 12px;
        color: #6c757d;
        margin-bottom: 0;
      }
      
      /* Tab Navigation */
      .nav-tabs {
        border-bottom: 1px solid #f1f1f1;
      }
      
      .nav-tabs .nav-link {
        border: none;
        color: #6c757d;
        font-weight: 500;
        padding: 10px 15px;
      }
      
      .nav-tabs .nav-link.active {
        color: #4B49AC;
        border-bottom: 2px solid #4B49AC;
        background: transparent;
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
      
      /* Responsive Adjustments */
      @media (max-width: 768px) {
        .customer-table thead th,
        .customer-table tbody td {
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
        
        #newCustomerBtn {
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
                <i class="typcn typcn-user mr-1"></i> Customers
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
                    <h6 class="preview-subject font-weight-normal">New Customer</h6>
                    <p class="font-weight-light small-text mb-0">
                      Ahmad bin Ismail registered
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
                    <h6 class="preview-subject font-weight-normal">Appointment</h6>
                    <p class="font-weight-light small-text mb-0">
                      Siti Nurhaliza - 11:30 AM
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
                  <h3 class="font-weight-bold mb-0">Customer Management</h3>
                  <div class="filter-add-container">
                    <div class="filter-container">
                      <select class="form-control" id="statusFilter">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                      </select>
                    </div>
                    <button id="newCustomerBtn" class="btn btn-primary">
                      <i class="typcn typcn-plus mr-1"></i> Add New Customer
                    </button>
                  </div>
                </div>
                
                <div class="card">
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table id="customersTable" class="table customer-table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Customer</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Last Appointment</th>
                            <th>Total Spent</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr data-id="1">
                            <td>1</td>
                            <td class="customer-name">
                              <img src="https://randomuser.me/api/portraits/men/11.jpg" class="customer-avatar" alt="Ahmad bin Ismail">
                              <strong>Ahmad bin Ismail</strong>
                            </td>
                            <td class="phone-cell">+6012-3456789</td>
                            <td class="email-cell">ahmad.ismail@example.com</td>
                            <td>Jun 15, 2024<br><small>Haircut and Beard Trim - RM45</small></td>
                            <td class="price-cell">RM450.00</td>
                            <td><span class="badge-status badge-active">Active</span></td>
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
                          <tr data-id="2">
                            <td>2</td>
                            <td class="customer-name">
                              <img src="https://randomuser.me/api/portraits/women/12.jpg" class="customer-avatar" alt="Siti Nurhaliza">
                              <strong>Siti Nurhaliza</strong>
                            </td>
                            <td class="phone-cell">+6013-4567890</td>
                            <td class="email-cell">siti.nurhaliza@example.com</td>
                            <td>Jun 15, 2024<br><small>Premium Haircut - RM35</small></td>
                            <td class="price-cell">RM180.00</td>
                            <td><span class="badge-status badge-active">Active</span></td>
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
                          <tr data-id="3">
                            <td>3</td>
                            <td class="customer-name">
                              <img src="https://randomuser.me/api/portraits/men/13.jpg" class="customer-avatar" alt="Mohd Azlan">
                              <strong>Mohd Azlan</strong>
                            </td>
                            <td class="phone-cell">+6017-5678901</td>
                            <td class="email-cell">mohd.azlan@example.com</td>
                            <td>Jun 14, 2024<br><small>Hair Color and Treatment - RM80</small></td>
                            <td class="price-cell">RM320.00</td>
                            <td><span class="badge-status badge-inactive">Inactive</span></td>
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
                          <tr data-id="4">
                            <td>4</td>
                            <td class="customer-name">
                              <img src="https://randomuser.me/api/portraits/women/14.jpg" class="customer-avatar" alt="Nur Aisyah">
                              <strong>Nur Aisyah</strong>
                            </td>
                            <td class="phone-cell">+6019-6789012</td>
                            <td class="email-cell">nur.aisyah@example.com</td>
                            <td>Jun 13, 2024<br><small>Beard Trim and Shave - RM25</small></td>
                            <td class="price-cell">RM200.00</td>
                            <td><span class="badge-status badge-active">Active</span></td>
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
          
          <!-- View Customer Modal -->
          <div class="modal fade" id="viewCustomerModal" tabindex="-1" role="dialog" aria-labelledby="viewCustomerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="viewCustomerModalLabel">Customer Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-4 text-center">
                      <img src="" class="customer-avatar mb-3 view-avatar" style="width: 100px; height: 100px;" alt="Customer Avatar">
                      <h4 class="mb-1 view-name"></h4>
                      <span class="badge-status mb-3 view-status"></span>
                      
                      <div class="customer-stats">
                        <div class="row">
                          <div class="col-4 stat-item">
                            <h5 class="font-weight-bold view-visits"></h5>
                            <p class="text-muted">Visits</p>
                          </div>
                          <div class="col-4 stat-item">
                            <h5 class="font-weight-bold view-total"></h5>
                            <p class="text-muted">Total</p>
                          </div>
                          <div class="col-4 stat-item">
                            <h5 class="font-weight-bold view-avg"></h5>
                            <p class="text-muted">Avg/Visit</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <ul class="nav nav-tabs" id="customerTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="true">Details</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">Appointments</a>
                        </li>
                      </ul>
                      
                      <div class="tab-content pt-3" id="customerTabContent">
                        <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="small text-muted mb-1">Phone Number</label>
                                <div class="form-control-plaintext view-phone"></div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="small text-muted mb-1">Email Address</label>
                                <div class="form-control-plaintext view-email"></div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="small text-muted mb-1">Customer Notes</label>
                            <div class="card bg-light p-3 view-notes"></div>
                          </div>
                        </div>
                        
                        <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                          <div class="table-responsive">
                            <table class="table table-sm history-table">
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
          
          <!-- Add Customer Modal -->
          <div class="modal fade" id="addCustomerModal" tabindex="-1" role="dialog" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addCustomerModalLabel">Add New Customer</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="addCustomerForm">
                    <div class="form-group">
                      <label>Full Name</label>
                      <input type="text" class="form-control" id="customerName" placeholder="Enter customer name">
                    </div>
                    <div class="form-group">
                      <label>Phone Number</label>
                      <input type="tel" class="form-control" id="customerPhone" placeholder="+6012-3456789">
                    </div>
                    <div class="form-group">
                      <label>Email Address</label>
                      <input type="email" class="form-control" id="customerEmail" placeholder="Enter email address">
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" id="customerStatus">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                      </select>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary" id="saveCustomerBtn">Save Customer</button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Edit Customer Modal -->
          <div class="modal fade" id="editCustomerModal" tabindex="-1" role="dialog" aria-labelledby="editCustomerModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editCustomerModalLabel">Edit Customer</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="editCustomerForm">
                    <input type="hidden" id="editCustomerId">
                    <div class="form-group">
                      <label>Full Name</label>
                      <input type="text" class="form-control" id="editCustomerName">
                    </div>
                    <div class="form-group">
                      <label>Phone Number</label>
                      <input type="tel" class="form-control" id="editCustomerPhone" placeholder="+6012-3456789">
                    </div>
                    <div class="form-group">
                      <label>Email Address</label>
                      <input type="email" class="form-control" id="editCustomerEmail">
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" id="editCustomerStatus">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Notes</label>
                      <textarea class="form-control" id="editCustomerNotes" rows="3"></textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary" id="updateCustomerBtn">Update Customer</button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Delete Confirmation Modal -->
          <div class="modal fade" id="deleteCustomerModal" tabindex="-1" role="dialog" aria-labelledby="deleteCustomerModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteCustomerModalLabel">Confirm Delete</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to delete <strong class="delete-name"></strong>? This action cannot be undone.</p>
                  <div class="alert alert-warning mt-3">
                    <i class="typcn typcn-warning mr-2"></i> This will permanently remove all customer data including appointment history.
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-danger" id="confirmDeleteCustomerBtn">Delete Customer</button>
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
        // Hardcoded customer data
        let customers = [
          {
            id: '1',
            name: 'Ahmad bin Ismail',
            avatar: 'https://randomuser.me/api/portraits/men/11.jpg',
            phone: '+6012-3456789',
            email: 'ahmad.ismail@example.com',
            lastAppointment: { date: 'Jun 15, 2024', service: 'Haircut and Beard Trim', price: 'RM45' },
            totalSpent: 'RM450.00',
            visits: 15,
            status: 'active',
            notes: 'Regular customer, prefers haircut every 3 weeks. Likes clipper cut on sides.',
            history: [
              { date: 'Jun 15, 2024', service: 'Haircut and Beard Trim', barber: 'Tony Styles', amount: 'RM45.00', status: 'confirmed' },
              { date: 'Jun 10, 2024', service: 'Haircut', barber: 'Tony Styles', amount: 'RM30.00', status: 'completed' },
              { date: 'May 27, 2024', service: 'Beard Trim', barber: 'Carl Fade', amount: 'RM15.00', status: 'completed' },
              { date: 'May 13, 2024', service: 'Haircut', barber: 'Tony Styles', amount: 'RM30.00', status: 'completed' }
            ]
          },
          {
            id: '2',
            name: 'Siti Nurhaliza',
            avatar: 'https://randomuser.me/api/portraits/women/12.jpg',
            phone: '+6013-4567890',
            email: 'siti.nurhaliza@example.com',
            lastAppointment: { date: 'Jun 15, 2024', service: 'Premium Haircut', price: 'RM35' },
            totalSpent: 'RM180.00',
            visits: 12,
            status: 'active',
            notes: 'Prefers quick premium haircuts.',
            history: [
              { date: 'Jun 15, 2024', service: 'Premium Haircut', barber: 'Carl Fade', amount: 'RM35.00', status: 'pending' }
            ]
          },
          {
            id: '3',
            name: 'Mohd Azlan',
            avatar: 'https://randomuser.me/api/portraits/men/13.jpg',
            phone: '+6017-5678901',
            email: 'mohd.azlan@example.com',
            lastAppointment: { date: 'Jun 14, 2024', service: 'Hair Color and Treatment', price: 'RM80' },
            totalSpent: 'RM320.00',
            visits: 4,
            status: 'inactive',
            notes: 'Occasional customer, prefers premium services.',
            history: [
              { date: 'Jun 14, 2024', service: 'Hair Color and Treatment', barber: 'Eddie Razor', amount: 'RM80.00', status: 'completed' }
            ]
          },
          {
            id: '4',
            name: 'Nur Aisyah',
            avatar: 'https://randomuser.me/api/portraits/women/14.jpg',
            phone: '+6019-6789012',
            email: 'nur.aisyah@example.com',
            lastAppointment: { date: 'Jun 13, 2024', service: 'Beard Trim and Shave', price: 'RM25' },
            totalSpent: 'RM200.00',
            visits: 4,
            status: 'active',
            notes: 'Likes hair and beard services.',
            history: [
              { date: 'Jun 13, 2024', service: 'Beard Trim and Shave', barber: 'Tony Styles', amount: 'RM25.00', status: 'cancelled' }
            ]
          }
        ];

        // Initialize DataTable
        let table = $('#customersTable').DataTable({
          "order": [[4, "desc"]],
          "columnDefs": [
            { "targets": [4], "type": "date" }
          ],
          dom: 'Bfrtip',
          buttons: [
            {
              extend: 'print',
              text: '<i class="typcn typcn-printer mr-1"></i> Print',
              className: 'btn btn-outline-secondary btn-sm',
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6]
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

        // Status filter
        $('#statusFilter').on('change', function() {
          table.column(6).search(this.value).draw();
        });

        // New customer button
        $('#newCustomerBtn').click(function() {
          $('#addCustomerForm')[0].reset();
          $('#customerPhone').val('');
          $('#addCustomerModal').modal('show');
        });

        // Save new customer
        $('#saveCustomerBtn').click(function() {
          const phone = $('#customerPhone').val().trim();
          const phoneRegex = /^\+601[0-9]-[0-9]{7,8}$/;
          
          const newCustomer = {
            id: (Math.max(...customers.map(c => parseInt(c.id))) + 1).toString(),
            name: $('#customerName').val().trim(),
            avatar: 'https://randomuser.me/api/portraits/men/' + (parseInt(customers.length) + 1) + '.jpg', // Placeholder
            phone: phone,
            email: $('#customerEmail').val().trim(),
            lastAppointment: { date: '-', service: '-', price: '-' },
            totalSpent: 'RM0.00',
            visits: 0,
            status: $('#customerStatus').val(),
            notes: '',
            history: []
          };

          // Validation
          if (!newCustomer.name || !phone || !phoneRegex.test(phone) || !newCustomer.email) {
            alert('Please fill in all required fields. Phone number must be in the format +601X-XXXXXXX.');
            return;
          }

          customers.push(newCustomer);

          // Add row to DataTable
          const newRow = $(`
            <tr data-id="${newCustomer.id}">
              <td>${newCustomer.id}</td>
              <td class="customer-name">
                <img src="${newCustomer.avatar}" class="customer-avatar" alt="${newCustomer.name}">
                <strong>${newCustomer.name}</strong>
              </td>
              <td class="phone-cell">${newCustomer.phone}</td>
              <td class="email-cell">${newCustomer.email}</td>
              <td>${newCustomer.lastAppointment.date}<br><small>${newCustomer.lastAppointment.service} - ${newCustomer.lastAppointment.price}</small></td>
              <td class="price-cell">${newCustomer.totalSpent}</td>
              <td><span class="badge-status badge-${newCustomer.status}">${newCustomer.status.charAt(0).toUpperCase() + newCustomer.status.slice(1)}</span></td>
              <td class="action-buttons">
                <button class="btn btn-view btn-sm" title="View"><i class="typcn typcn-eye"></i></button>
                <button class="btn btn-edit btn-sm" title="Edit"><i class="typcn typcn-edit"></i></button>
                <button class="btn btn-delete btn-sm" title="Delete"><i class="typcn typcn-trash"></i></button>
              </td>
            </tr>
          `);

          table.row.add(newRow).draw();

          $('#addCustomerModal').modal('hide');
          $('#addCustomerForm')[0].reset();
          alert('Customer added successfully!');
        });

        // View button click handler
        $(document).on('click', '.btn-view', function() {
          const id = $(this).closest('tr').data('id').toString();
          const customer = customers.find(c => c.id === id);

          $('.view-avatar').attr('src', customer.avatar).attr('alt', customer.name);
          $('.view-name').text(customer.name);
          $('.view-status').removeClass().addClass('badge-status').addClass(`badge-${customer.status}`).text(customer.status.charAt(0).toUpperCase() + customer.status.slice(1));
          $('.view-phone').text(customer.phone);
          $('.view-email').text(customer.email);
          $('.view-notes').text(customer.notes || 'No notes available');
          $('.view-visits').text(customer.visits);
          $('.view-total').text(customer.totalSpent);
          $('.view-avg').text(customer.visits > 0 ? 'RM' + (parseFloat(customer.totalSpent.replace('RM', '')) / customer.visits).toFixed(2) : 'RM0.00');

          $('.view-history').empty();
          customer.history.forEach(h => {
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

          $('#viewCustomerModal').modal('show');
        });

        // Edit button click handler
        $(document).on('click', '.btn-edit', function() {
          const id = $(this).closest('tr').data('id').toString();
          const customer = customers.find(c => c.id === id);

          $('#editCustomerId').val(customer.id);
          $('#editCustomerName').val(customer.name);
          $('#editCustomerPhone').val(customer.phone);
          $('#editCustomerEmail').val(customer.email);
          $('#editCustomerStatus').val(customer.status);
          $('#editCustomerNotes').val(customer.notes);

          $('#editCustomerModal').modal('show');
        });

        // Update customer
        $('#updateCustomerBtn').click(function() {
          const id = $('#editCustomerId').val();
          const index = customers.findIndex(c => c.id === id);
          const phone = $('#editCustomerPhone').val().trim();
          const phoneRegex = /^\+601[0-9]-[0-9]{7,8}$/;

          // Validation
          if (!$('#editCustomerName').val().trim() || !phone || !phoneRegex.test(phone) || !$('#editCustomerEmail').val().trim()) {
            alert('Please fill in all required fields. Phone number must be in the format +601X-XXXXXXX.');
            return;
          }

          customers[index] = {
            ...customers[index],
            name: $('#editCustomerName').val().trim(),
            phone: phone,
            email: $('#editCustomerEmail').val().trim(),
            status: $('#editCustomerStatus').val(),
            notes: $('#editCustomerNotes').val().trim()
          };

          const updatedRow = $(`
            <tr data-id="${id}">
              <td>${id}</td>
              <td class="customer-name">
                <img src="${customers[index].avatar}" class="customer-avatar" alt="${customers[index].name}">
                <strong>${customers[index].name}</strong>
              </td>
              <td class="phone-cell">${customers[index].phone}</td>
              <td class="email-cell">${customers[index].email}</td>
              <td>${customers[index].lastAppointment.date}<br><small>${customers[index].lastAppointment.service} - ${customers[index].lastAppointment.price}</small></td>
              <td class="price-cell">${customers[index].totalSpent}</td>
              <td><span class="badge-status badge-${customers[index].status}">${customers[index].status.charAt(0).toUpperCase() + customers[index].status.slice(1)}</span></td>
              <td class="action-buttons">
                <button class="btn btn-view btn-sm" title="View"><i class="typcn typcn-eye"></i></button>
                <button class="btn btn-edit btn-sm" title="Edit"><i class="typcn typcn-edit"></i></button>
                <button class="btn btn-delete btn-sm" title="Delete"><i class="typcn typcn-trash"></i></button>
              </td>
            </tr>
          `);

          table.row($(`tr[data-id="${id}"]`)).data(updatedRow[0].cells).draw();

          $('#editCustomerModal').modal('hide');
          alert('Customer updated successfully!');
        });

        // Delete button click handler
        $(document).on('click', '.btn-delete', function() {
          const id = $(this).closest('tr').data('id').toString();
          const customer = customers.find(c => c.id === id);

          $('.delete-name').text(customer.name);
          $('#confirmDeleteCustomerBtn').data('id', id);

          $('#deleteCustomerModal').modal('show');
        });

        // Confirm delete
        $('#confirmDeleteCustomerBtn').click(function() {
          const id = $(this).data('id');
          customers = customers.filter(c => c.id !== id);
          table.row($(`tr[data-id="${id}"]`)).remove().draw();

          $('#deleteCustomerModal').modal('hide');
          alert('Customer deleted successfully!');
        });

        // Initialize history table
        $('.history-table').DataTable({
          "order": [[0, "desc"]],
          "searching": false,
          "paging": false,
          "info": false
        });
      });
    </script>
  </body>
</html>