<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Service Directory</title>
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
      .service-table {
        margin-top: 20px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
      }
      .service-table thead th {
        background-color: #4B49AC;
        color: white;
        font-weight: 600;
        border: none;
        padding: 15px 20px;
      }
      .service-table tbody tr {
        transition: all 0.3s ease;
      }
      .service-table tbody tr:hover {
        background-color: #f8f9fa;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      }
      .service-table tbody td {
        padding: 15px 20px;
        vertical-align: middle;
        border-top: 1px solid #e9ecef;
      }
      .price-cell {
        font-weight: 600;
        color: #4B49AC;
      }
      .description-cell {
        max-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }
      .action-buttons .btn {
        padding: 5px 10px;
        font-size: 14px;
        margin-right: 5px;
        border-radius: 4px;
        box-shadow: none;
      }
      .btn-edit {
        background-color: #FFC100;
        color: #212529;
        border: none;
      }
      .btn-edit:hover {
        background-color: #e0a800;
      }
      .btn-delete {
        background-color: #FD7E14;
        color: white;
        border: none;
      }
      .btn-delete:hover {
        background-color: #e06c0c;
      }
      .badge-status {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
      }
      .badge-active {
        background-color: #28a745;
        color: white;
      }
      .badge-inactive {
        background-color: #6c757d;
        color: white;
      }
      .search-box {
        margin-bottom: 20px;
      }
      .table-responsive {
        border-radius: 10px;
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
                <i class="typcn typcn-scissors mr-1"></i> Services
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
                <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="typcn typcn-scissors"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">New Service Added</h6>
                    <p class="font-weight-light small-text mb-0">
                      Skin Fade Service
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="typcn typcn-edit"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">Update Required</h6>
                    <p class="font-weight-light small-text mb-0">
                      Hair Color Service
                    </p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle pl-0 pr-0" href="#" data-toggle="dropdown" id="profileDropdown">
                <i class="typcn typcn-user-outline mr-0"></i>
                <span class="nav-profile-name">Admin</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item">
                  <i class="typcn typcn-cog text-primary"></i>
                  Settings
                </a>
                <a class="dropdown-item">
                  <i class="typcn typcn-power text-primary"></i>
                  Logout
                </a>
              </div>
            </li>
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
                  <h3 class="font-weight-bold mb-0">Service Management</h3>
                  <div>
                    <button id="newServiceBtn" class="btn btn-primary">
                      <i class="typcn typcn-plus mr-1"></i> Add New Service
                    </button>
                  </div>
                </div>
                
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="servicesTable" class="table service-table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Service Name</th>
                            <th>Price (RM)</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td><strong>Haircut</strong></td>
                            <td class="price-cell">20.00</td>
                            <td class="description-cell">Basic haircut service with clippers or scissors</td>
                            <td><span class="badge-status badge-active">Active</span></td>
                            <td>2024-01-15 09:30:00</td>
                            <td class="action-buttons">
                              <button class="btn btn-edit btn-sm">
                                <i class="typcn typcn-edit"></i> Edit
                              </button>
                              <button class="btn btn-delete btn-sm">
                                <i class="typcn typcn-trash"></i> Delete
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td><strong>Skin Fade</strong></td>
                            <td class="price-cell">25.00</td>
                            <td class="description-cell">Precision fade that blends to the skin</td>
                            <td><span class="badge-status badge-active">Active</span></td>
                            <td>2024-02-20 10:15:00</td>
                            <td class="action-buttons">
                              <button class="btn btn-edit btn-sm">
                                <i class="typcn typcn-edit"></i> Edit
                              </button>
                              <button class="btn btn-delete btn-sm">
                                <i class="typcn typcn-trash"></i> Delete
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td><strong>Scissor Cut</strong></td>
                            <td class="price-cell">22.00</td>
                            <td class="description-cell">Haircut using only scissors for a softer look</td>
                            <td><span class="badge-status badge-inactive">Inactive</span></td>
                            <td>2024-03-05 11:45:00</td>
                            <td class="action-buttons">
                              <button class="btn btn-edit btn-sm">
                                <i class="typcn typcn-edit"></i> Edit
                              </button>
                              <button class="btn btn-delete btn-sm">
                                <i class="typcn typcn-trash"></i> Delete
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td><strong>Hair Wash and Shampoo</strong></td>
                            <td class="price-cell">10.00</td>
                            <td class="description-cell">Professional hair washing with premium shampoo</td>
                            <td><span class="badge-status badge-active">Active</span></td>
                            <td>2024-01-10 14:20:00</td>
                            <td class="action-buttons">
                              <button class="btn btn-edit btn-sm">
                                <i class="typcn typcn-edit"></i> Edit
                              </button>
                              <button class="btn btn-delete btn-sm">
                                <i class="typcn typcn-trash"></i> Delete
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td><strong>Hair Styling</strong></td>
                            <td class="price-cell">8.00</td>
                            <td class="description-cell">Professional styling with pomade or gel</td>
                            <td><span class="badge-status badge-active">Active</span></td>
                            <td>2024-04-12 16:30:00</td>
                            <td class="action-buttons">
                              <button class="btn btn-edit btn-sm">
                                <i class="typcn typcn-edit"></i> Edit
                              </button>
                              <button class="btn btn-delete btn-sm">
                                <i class="typcn typcn-trash"></i> Delete
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>6</td>
                            <td><strong>Hair Color</strong></td>
                            <td class="price-cell">40.00</td>
                            <td class="description-cell">Full hair coloring service with premium products</td>
                            <td><span class="badge-status badge-active">Active</span></td>
                            <td>2024-02-28 13:10:00</td>
                            <td class="action-buttons">
                              <button class="btn btn-edit btn-sm">
                                <i class="typcn typcn-edit"></i> Edit
                              </button>
                              <button class="btn btn-delete btn-sm">
                                <i class="typcn typcn-trash"></i> Delete
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>7</td>
                            <td><strong>Anti-Dandruff Treatment</strong></td>
                            <td class="price-cell">30.00</td>
                            <td class="description-cell">Specialized treatment for dandruff control</td>
                            <td><span class="badge-status badge-active">Active</span></td>
                            <td>2024-03-15 10:45:00</td>
                            <td class="action-buttons">
                              <button class="btn btn-edit btn-sm">
                                <i class="typcn typcn-edit"></i> Edit
                              </button>
                              <button class="btn btn-delete btn-sm">
                                <i class="typcn typcn-trash"></i> Delete
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>8</td>
                            <td><strong>Hair Fall Treatment</strong></td>
                            <td class="price-cell">35.00</td>
                            <td class="description-cell">Treatment to reduce hair fall and strengthen hair</td>
                            <td><span class="badge-status badge-active">Active</span></td>
                            <td>2024-01-22 15:20:00</td>
                            <td class="action-buttons">
                              <button class="btn btn-edit btn-sm">
                                <i class="typcn typcn-edit"></i> Edit
                              </button>
                              <button class="btn btn-delete btn-sm">
                                <i class="typcn typcn-trash"></i> Delete
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td><strong>Beard Trim</strong></td>
                            <td class="price-cell">15.00</td>
                            <td class="description-cell">Precision beard shaping and trimming</td>
                            <td><span class="badge-status badge-active">Active</span></td>
                            <td>2024-02-05 11:30:00</td>
                            <td class="action-buttons">
                              <button class="btn btn-edit btn-sm">
                                <i class="typcn typcn-edit"></i> Edit
                              </button>
                              <button class="btn btn-delete btn-sm">
                                <i class="typcn typcn-trash"></i> Delete
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
          
          <!-- Add Service Modal -->
          <div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="addServiceModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addServiceModalLabel">Add New Service</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="addServiceForm">
                    <div class="form-group">
                      <label>Service Name</label>
                      <input type="text" class="form-control" id="serviceName" placeholder="Enter service name">
                    </div>
                    <div class="form-group">
                      <label>Price (RM)</label>
                      <input type="number" step="0.01" class="form-control" id="servicePrice" placeholder="Enter service price">
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" id="serviceDescription" placeholder="Enter service description"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" id="serviceStatus">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                      </select>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary" id="saveServiceBtn">Save Service</button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Edit Service Modal -->
          <div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="editServiceModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="editServiceForm">
                    <div class="form-group">
                      <label>Service Name</label>
                      <input type="text" class="form-control" id="editServiceName" value="Haircut">
                    </div>
                    <div class="form-group">
                      <label>Price (RM)</label>
                      <input type="number" step="0.01" class="form-control" id="editServicePrice" value="20.00">
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" id="editServiceDescription">Basic haircut service with clippers or scissors</textarea>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" id="editServiceStatus">
                        <option value="active" selected>Active</option>
                        <option value="inactive">Inactive</option>
                      </select>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary" id="updateServiceBtn">Update Service</button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Delete Confirmation Modal -->
          <div class="modal fade" id="deleteServiceModal" tabindex="-1" role="dialog" aria-labelledby="deleteServiceModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteServiceModalLabel">Confirm Delete</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to delete <strong>Haircut</strong> service? This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete Service</button>
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
        $('#servicesTable').DataTable({
          "order": [[5, "desc"]], // Sort by Created At column descending
          "columnDefs": [
            { "targets": [5], "type": "date" } // Proper sorting for date column
          ]
        });
        
        // Initialize datepicker
        $('.datepicker').datepicker({
          format: 'yyyy-mm-dd',
          todayHighlight: true,
          autoclose: true
        });
        
        // New service button
        $('#newServiceBtn').click(function() {
          $('#addServiceModal').modal('show');
        });
        
        // Save new service
        $('#saveServiceBtn').click(function() {
          $('#addServiceModal').modal('hide');
          $('#addServiceForm')[0].reset();
          alert('Service added successfully!');
        });
        
        // Edit button click handler
        $('.btn-edit').click(function() {
          $('#editServiceModal').modal('show');
        });
        
        // Delete button click handler
        $('.btn-delete').click(function() {
          $('#deleteServiceModal').modal('show');
        });
        
        // Update service
        $('#updateServiceBtn').click(function() {
          $('#editServiceModal').modal('hide');
          alert('Service updated successfully!');
        });
        
        // Confirm delete
        $('#confirmDeleteBtn').click(function() {
          $('#deleteServiceModal').modal('hide');
          alert('Service deleted successfully!');
        });
      });
    </script>
  </body>
</html>