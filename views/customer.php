<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Barbershop Appointments</title>
    <!-- base:css -->
    <link rel="stylesheet" href="../vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <!-- endinject --> 
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../images/favicon.png" />
    <style>
      .dataTables_wrapper {
        padding-top: 10px;
      }
      .appointment-status {
        display: inline-block;
        padding: 3px 8px;
        border-radius: 12px;
        font-size: 0.75em;
        font-weight: 600;
      }
      .status-confirmed {
        background-color: #d4edda;
        color: #155724;
      }
      .status-pending {
        background-color: #fff3cd;
        color: #856404;
      }
      .status-completed {
        background-color: #d1ecf1;
        color: #0c5460;
      }
      .service-badge {
        display: inline-block;
        padding: 3px 8px;
        border-radius: 12px;
        font-size: 0.75em;
        font-weight: 600;
        margin-right: 5px;
        background-color: #4B49AC;
        color: white;
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
                <i class="typcn typcn-calendar mr-1"></i> Calendar
              </a>
            </li>
            <li class="nav-item  d-none d-lg-flex">
              <a class="nav-link active" href="index.html">
                <i class="typcn typcn-chart-bar-outline mr-1"></i> Dashboard
              </a>
            </li>
            <li class="nav-item  d-none d-lg-flex">
              <a class="nav-link" href="#">
                <i class="typcn typcn-scissors mr-1"></i> Barbers
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
                <p class="mb-0 font-weight-normal float-left dropdown-header">Appointment Alerts</p>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="typcn typcn-user"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">New Appointment</h6>
                    <p class="font-weight-light small-text mb-0">
                      John Smith - 10:00 AM
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
                    <h6 class="preview-subject font-weight-normal">Reminder</h6>
                    <p class="font-weight-light small-text mb-0">
                      Mike Johnson - 11:30 AM
                    </p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle pl-0 pr-0" href="#" data-toggle="dropdown" id="profileDropdown">
                <i class="typcn typcn-user-outline mr-0"></i>
                <span class="nav-profile-name">Barber Admin</span>
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
                  <h3 class="font-weight-bold mb-0">Appointments</h3>
                  <div>
                    <button id="newAppointmentBtn" class="btn btn-primary">
                      <i class="typcn typcn-plus mr-1"></i> New Appointment
                    </button>
                  </div>
                </div>
                
                <div class="card">
                  <div class="card-body">
                    <div class="calendar-controls d-flex flex-wrap align-items-center mb-4">
                      <div class="barber-filter mr-3">
                        <select id="barberFilter" class="form-control form-control-sm">
                          <option value="">All Barbers</option>
                          <option value="Tony Styles">Tony Styles</option>
                          <option value="Mike Clipper">Mike Clipper</option>
                          <option value="Eddie Razor">Eddie Razor</option>
                          <option value="Carl Fade">Carl Fade</option>
                        </select>
                      </div>
                      <div class="service-filter mr-3">
                        <select id="serviceFilter" class="form-control form-control-sm">
                          <option value="">All Services</option>
                          <option value="Haircut">Haircut</option>
                          <option value="Shave">Shave</option>
                          <option value="Beard Trim">Beard Trim</option>
                          <option value="Hair Color">Hair Color</option>
                        </select>
                      </div>
                      <div class="status-filter">
                        <select id="statusFilter" class="form-control form-control-sm">
                          <option value="">All Statuses</option>
                          <option value="confirmed">Confirmed</option>
                          <option value="pending">Pending</option>
                          <option value="completed">Completed</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="table-responsive">
                      <table id="appointmentsTable" class="table table-hover">
                        <thead>
                          <tr>
                            <th>Customer</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Appointment Date</th>
                            <th>Services</th>
                            <th>Barber</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>John Smith</td>
                            <td>(555) 123-4567</td>
                            <td>john.smith@example.com</td>
                            <td>2023-06-15 10:00 AM</td>
                            <td><span class="service-badge">Haircut</span></td>
                            <td>Tony Styles</td>
                            <td>$30.00</td>
                            <td><span class="appointment-status status-confirmed">Confirmed</span></td>
                            <td>
                              <button class="btn btn-sm btn-info">View</button>
                              <button class="btn btn-sm btn-warning">Edit</button>
                            </td>
                          </tr>
                          <tr>
                            <td>Mike Johnson</td>
                            <td>(555) 987-6543</td>
                            <td>mike.johnson@example.com</td>
                            <td>2023-06-15 11:30 AM</td>
                            <td><span class="service-badge">Beard Trim</span></td>
                            <td>Carl Fade</td>
                            <td>$15.00</td>
                            <td><span class="appointment-status status-confirmed">Confirmed</span></td>
                            <td>
                              <button class="btn btn-sm btn-info">View</button>
                              <button class="btn btn-sm btn-warning">Edit</button>
                            </td>
                          </tr>
                          <tr>
                            <td>Robert Brown</td>
                            <td>(555) 456-7890</td>
                            <td>robert.brown@example.com</td>
                            <td>2023-06-16 2:00 PM</td>
                            <td>
                              <span class="service-badge">Haircut</span>
                              <span class="service-badge">Shave</span>
                              <span class="service-badge">Facial</span>
                            </td>
                            <td>Tony Styles</td>
                            <td>$80.00</td>
                            <td><span class="appointment-status status-pending">Pending</span></td>
                            <td>
                              <button class="btn btn-sm btn-info">View</button>
                              <button class="btn btn-sm btn-warning">Edit</button>
                            </td>
                          </tr>
                          <tr>
                            <td>David Wilson</td>
                            <td>(555) 789-0123</td>
                            <td>david.wilson@example.com</td>
                            <td>2023-06-17 9:00 AM</td>
                            <td><span class="service-badge">Hair Color</span></td>
                            <td>Eddie Razor</td>
                            <td>$50.00</td>
                            <td><span class="appointment-status status-completed">Completed</span></td>
                            <td>
                              <button class="btn btn-sm btn-info">View</button>
                              <button class="btn btn-sm btn-warning">Edit</button>
                            </td>
                          </tr>
                          <tr>
                            <td>James Davis</td>
                            <td>(555) 234-5678</td>
                            <td>james.davis@example.com</td>
                            <td>2023-06-17 1:30 PM</td>
                            <td><span class="service-badge">Haircut</span> <span class="service-badge">Beard Trim</span></td>
                            <td>Mike Clipper</td>
                            <td>$45.00</td>
                            <td><span class="appointment-status status-confirmed">Confirmed</span></td>
                            <td>
                              <button class="btn btn-sm btn-info">View</button>
                              <button class="btn btn-sm btn-warning">Edit</button>
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
          
          <!-- Appointment Details Modal -->
          <div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="appointmentModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="appointmentModalLabel">Appointment Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Customer</label>
                        <input type="text" class="form-control" id="customerName" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" id="customerPhone" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="customerEmail" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Date & Time</label>
                        <input type="text" class="form-control" id="appointmentTime" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Services</label>
                        <input type="text" class="form-control" id="serviceType" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Barber</label>
                        <input type="text" class="form-control" id="barberName" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Total Price</label>
                        <input type="text" class="form-control" id="totalPrice" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control" id="appointmentStatus" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Notes</label>
                    <textarea class="form-control" id="appointmentNotes" rows="3" readonly></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Edit</button>
                  <button type="button" class="btn btn-danger">Cancel</button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- New Appointment Modal -->
          <div class="modal fade" id="newAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="newAppointmentModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="newAppointmentModalLabel">New Appointment</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="newAppointmentForm">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Customer</label>
                          <select class="form-control" id="newCustomer">
                            <option value="">Select Customer</option>
                            <option value="john">John Smith</option>
                            <option value="mike">Mike Johnson</option>
                            <option value="david">David Wilson</option>
                            <option value="robert">Robert Brown</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Phone</label>
                          <input type="text" class="form-control" id="newPhone" placeholder="Customer phone">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" class="form-control" id="newEmail" placeholder="Customer email">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Service</label>
                          <select class="form-control" id="newService">
                            <option value="">Select Service</option>
                            <option value="haircut">Haircut ($30)</option>
                            <option value="shave">Shave ($20)</option>
                            <option value="beard">Beard Trim ($15)</option>
                            <option value="color">Hair Color ($50)</option>
                            <option value="package">Premium Package ($80)</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Barber</label>
                          <select class="form-control" id="newBarber">
                            <option value="">Select Barber</option>
                            <option value="tony">Tony Styles</option>
                            <option value="mike">Mike Clipper</option>
                            <option value="eddie">Eddie Razor</option>
                            <option value="carl">Carl Fade</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Status</label>
                          <select class="form-control" id="newStatus">
                            <option value="confirmed">Confirmed</option>
                            <option value="pending">Pending</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Date</label>
                          <input type="text" class="form-control datepicker" id="newDate" placeholder="Select date">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Time</label>
                          <select class="form-control" id="newTime">
                            <option value="09:00">9:00 AM</option>
                            <option value="09:30">9:30 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="10:30">10:30 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="11:30">11:30 AM</option>
                            <option value="12:00">12:00 PM</option>
                            <option value="12:30">12:30 PM</option>
                            <option value="13:00">1:00 PM</option>
                            <option value="13:30">1:30 PM</option>
                            <option value="14:00">2:00 PM</option>
                            <option value="14:30">2:30 PM</option>
                            <option value="15:00">3:00 PM</option>
                            <option value="15:30">3:30 PM</option>
                            <option value="16:00">4:00 PM</option>
                            <option value="16:30">4:30 PM</option>
                            <option value="17:00">5:00 PM</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Notes</label>
                      <textarea class="form-control" id="newNotes" rows="3"></textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary" id="saveAppointmentBtn">Save Appointment</button>
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
    <!-- base:js -->
    <script src="../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
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
        // Initialize datepicker
        $('.datepicker').datepicker({
          format: 'yyyy-mm-dd',
          todayHighlight: true,
          autoclose: true
        });
        
        // Initialize DataTable
        var table = $('#appointmentsTable').DataTable({
          "order": [[3, "asc"]],
          "responsive": true,
          "initComplete": function() {
            // Add filter event handlers
            $('#barberFilter').on('change', function() {
              table.column(5).search(this.value).draw();
            });
            
            $('#serviceFilter').on('change', function() {
              table.column(4).search(this.value).draw();
            });
            
            $('#statusFilter').on('change', function() {
              table.column(7).search(this.value).draw();
            });
          }
        });
        
        // View button click handler
        $('#appointmentsTable tbody').on('click', 'button.btn-info', function() {
          var data = table.row($(this).parents('tr')).data();
          $('#customerName').val(data[0]);
          $('#customerPhone').val(data[1]);
          $('#customerEmail').val(data[2]);
          $('#appointmentTime').val(data[3]);
          $('#serviceType').val(data[4].replace(/<[^>]*>/g, '')); // Remove HTML tags
          $('#barberName').val(data[5]);
          $('#totalPrice').val(data[6]);
          $('#appointmentStatus').val(data[7].replace(/<[^>]*>/g, '')); // Remove HTML tags
          $('#appointmentNotes').val("Sample notes for " + data[0]);
          $('#appointmentModal').modal('show');
        });
        
        // New appointment button
        $('#newAppointmentBtn').click(function() {
          $('#newAppointmentModal').modal('show');
        });
        
        // Save new appointment
        $('#saveAppointmentBtn').click(function() {
          // Get form values
          var customer = $('#newCustomer option:selected').text();
          var phone = $('#newPhone').val();
          var email = $('#newEmail').val();
          var date = $('#newDate').val();
          var time = $('#newTime option:selected').text();
          var service = $('#newService option:selected').text().split(' (')[0];
          var barber = $('#newBarber option:selected').text();
          var status = $('#newStatus').val();
          var price = getServicePrice($('#newService').val());
          
          // Add to table
          table.row.add([
            customer,
            phone,
            email,
            date + ' ' + time,
            '<span class="service-badge">' + service + '</span>',
            barber,
            price,
            '<span class="appointment-status status-' + status + '">' + status.charAt(0).toUpperCase() + status.slice(1) + '</span>',
            '<button class="btn btn-sm btn-info">View</button> <button class="btn btn-sm btn-warning">Edit</button>'
          ]).draw();
          
          // Reset and close modal
          $('#newAppointmentForm')[0].reset();
          $('#newAppointmentModal').modal('hide');
        });
        
        // Helper function to get price based on service
        function getServicePrice(service) {
          switch(service) {
            case 'haircut': return '$30.00';
            case 'shave': return '$20.00';
            case 'beard': return '$15.00';
            case 'color': return '$50.00';
            case 'package': return '$80.00';
            default: return '$0.00';
          }
        }
      });
    </script>
  </body>
</html>