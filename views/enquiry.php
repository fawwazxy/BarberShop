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
    <title>Enquiry Management</title>
    <!-- base:css -->
    <link rel="stylesheet" href="../vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../images/favicon.png" />
    <style>
      .inquiry-table {
        width: 100%;
        border-collapse: collapse;
      }
      .inquiry-table th, .inquiry-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
      }
      .inquiry-table th {
        background-color: #f8f9fa;
      }
      .inquiry-table tr:hover {
        background-color: #f1f1f1;
      }
      .action-btn {
        margin-right: 5px;
      }
      .filter-controls {
        margin-bottom: 20px;
      }
      .filter-controls .form-control {
        margin-right: 15px;
        max-width: 200px;
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
                <i class="typcn typcn-messages mr-1"></i> Enquiries
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
                <p class="mb-0 font-weight-normal float-left dropdown-header">New Enquiries</p>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="typcn typcn-user"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">New Inquiry</h6>
                    <p class="font-weight-light small-text mb-0">
                      John Doe - Booking Request
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
                  <h3 class="font-weight-bold mb-0">Enquiry Management</h3>
                </div>
                
                <div class="card">
                  <div class="card-body">
                    <div class="filter-controls d-flex flex-wrap align-items-center mb-4">
                      <div class="mr-3">
                        <input type="text" id="nameFilter" class="form-control form-control-sm" placeholder="Filter by Name">
                      </div>
                      <div class="mr-3">
                        <input type="text" id="subjectFilter" class="form-control form-control-sm" placeholder="Filter by Subject">
                      </div>
                      <div>
                        <select id="statusFilter" class="form-control form-control-sm">
                          <option value="all">All Statuses</option>
                          <option value="new">New</option>
                          <option value="in_progress">In Progress</option>
                          <option value="resolved">Resolved</option>
                        </select>
                      </div>
                    </div>
                    
                    <table class="inquiry-table" id="inquiryTable">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Subject</th>
                          <th>Status</th>
                          <th>Date</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Inquiries will be populated via JavaScript -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Inquiry Details Modal -->
          <div class="modal fade" id="inquiryModal" tabindex="-1" role="dialog" aria-labelledby="inquiryModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="inquiryModalLabel">Inquiry Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="inquiryName" readonly>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="inquiryEmail" readonly>
                  </div>
                  <div class="form-group">
                    <label>Subject</label>
                    <input type="text" class="form-control" id="inquirySubject" readonly>
                  </div>
                  <div class="form-group">
                    <label>Message</label>
                    <textarea class="form-control" id="inquiryMessage" rows="5" readonly></textarea>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" id="inquiryStatus">
                      <option value="new">New</option>
                      <option value="in_progress">In Progress</option>
                      <option value="resolved">Resolved</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Response</label>
                    <textarea class="form-control" id="inquiryResponse" rows="3" placeholder="Enter response"></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="saveResponseBtn">Save Response</button>
                  <button type="button" class="btn btn-danger" id="deleteInquiryBtn">Delete</button>
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
    <!-- Include Moment.js via CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
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
        // Sample inquiry data (replace with dynamic fetch from backend)
        var inquiries = [
          {
            id: 1,
            name: 'John Doe',
            email: 'john.doe@example.com',
            subject: 'Booking Request',
            message: 'I’d like to book a haircut for tomorrow.',
            status: 'new',
            created_at: moment().subtract(1, 'days').format('YYYY-MM-DD HH:mm'),
            response: ''
          },
          {
            id: 2,
            name: 'Jane Smith',
            email: 'jane.smith@example.com',
            subject: 'Price Inquiry',
            message: 'What’s the price for a beard trim?',
            status: 'in_progress',
            created_at: moment().subtract(2, 'days').format('YYYY-MM-DD HH:mm'),
            response: 'Beard trim is $15. Let us know if you’d like to book!'
          },
          {
            id: 3,
            name: 'Michael Brown',
            email: 'michael.brown@example.com',
            subject: 'Availability Check',
            message: 'Is Tony Styles available this Friday?',
            status: 'new',
            created_at: moment().subtract(3, 'days').format('YYYY-MM-DD HH:mm'),
            response: ''
          },
          {
            id: 4,
            name: 'Sarah Johnson',
            email: 'sarah.johnson@example.com',
            subject: 'Service Details',
            message: 'Can you tell me about the Premium Package?',
            status: 'resolved',
            created_at: moment().subtract(4, 'days').format('YYYY-MM-DD HH:mm'),
            response: 'The Premium Package includes haircut, shave, and facial for $80.'
          },
          {
            id: 5,
            name: 'Robert Lee',
            email: 'robert.lee@example.com',
            subject: 'Cancellation',
            message: 'I need to cancel my appointment from last week.',
            status: 'in_progress',
            created_at: moment().subtract(5, 'days').format('YYYY-MM-DD HH:mm'),
            response: 'Please provide your appointment date and time for confirmation.'
          },
          {
            id: 6,
            name: 'Emily Davis',
            email: 'emily.davis@example.com',
            subject: 'New Customer',
            message: 'I’m new here, what services do you offer?',
            status: 'new',
            created_at: moment().subtract(6, 'days').format('YYYY-MM-DD HH:mm'),
            response: ''
          },
          {
            id: 7,
            name: 'David Wilson',
            email: 'david.wilson@example.com',
            subject: 'Hair Color',
            message: 'Do you offer hair coloring services?',
            status: 'resolved',
            created_at: moment().subtract(7, 'days').format('YYYY-MM-DD HH:mm'),
            response: 'Yes, we offer hair coloring for $50. Book an appointment!'
          },
          {
            id: 8,
            name: 'Lisa Anderson',
            email: 'lisa.anderson@example.com',
            subject: 'Location Inquiry',
            message: 'Where is your shop located?',
            status: 'new',
            created_at: moment().subtract(8, 'days').format('YYYY-MM-DD HH:mm'),
            response: ''
          },
          {
            id: 9,
            name: 'Thomas Clark',
            email: 'thomas.clark@example.com',
            subject: 'Follow-Up',
            message: 'Can you follow up on my last inquiry?',
            status: 'in_progress',
            created_at: moment().subtract(9, 'days').format('YYYY-MM-DD HH:mm'),
            response: 'We’re reviewing your previous request. Will update soon!'
          },
          {
            id: 10,
            name: 'Anna White',
            email: 'anna.white@example.com',
            subject: 'Special Offer',
            message: 'Are there any special offers for new customers?',
            status: 'resolved',
            created_at: moment().subtract(10, 'days').format('YYYY-MM-DD HH:mm'),
            response: 'Yes, 10% off for first-time customers. Contact us to book!'
          }
        ];

        // Populate inquiry table
        function renderInquiries() {
          console.log('Rendering inquiries:', inquiries); // Debug log
          var filteredInquiries = inquiries.filter(function(inq) {
            var nameMatch = $('#nameFilter').val() ? inq.name.toLowerCase().includes($('#nameFilter').val().toLowerCase()) : true;
            var subjectMatch = $('#subjectFilter').val() ? inq.subject.toLowerCase().includes($('#subjectFilter').val().toLowerCase()) : true;
            var statusMatch = $('#statusFilter').val() === 'all' ? true : inq.status === $('#statusFilter').val();
            return nameMatch && subjectMatch && statusMatch;
          });

          var tbody = $('#inquiryTable tbody');
          tbody.empty();
          if (filteredInquiries.length === 0) {
            tbody.append($('<tr>').append($('<td colspan="6" class="text-center">No inquiries found.</td>')));
          } else {
            filteredInquiries.forEach(function(inq) {
              var row = $('<tr>').data('id', inq.id);
              row.append($('<td>').text(inq.name));
              row.append($('<td>').text(inq.email));
              row.append($('<td>').text(inq.subject));
              row.append($('<td>').text(inq.status.charAt(0).toUpperCase() + inq.status.slice(1)));
              row.append($('<td>').text(inq.created_at));
              var actions = $('<td>').addClass('text-right');
              actions.append($('<button>').addClass('btn btn-info action-btn btn-sm').text('View').click(function() {
                $('#inquiryName').val(inq.name);
                $('#inquiryEmail').val(inq.email);
                $('#inquirySubject').val(inq.subject);
                $('#inquiryMessage').val(inq.message);
                $('#inquiryStatus').val(inq.status);
                $('#inquiryResponse').val(inq.response);
                $('#inquiryModal').data('id', inq.id).modal('show');
              }));
              actions.append($('<button>').addClass('btn btn-danger action-btn btn-sm ml-2').text('Delete').click(function() {
                if (confirm('Are you sure you want to delete this inquiry?')) {
                  inquiries = inquiries.filter(function(i) { return i.id !== inq.id; });
                  renderInquiries();
                }
              }));
              row.append(actions);
              tbody.append(row);
            });
          }
        }

        // Filter events
        $('#nameFilter, #subjectFilter, #statusFilter').on('input change', function() {
          renderInquiries();
        });

        // Save response
        $('#saveResponseBtn').click(function() {
          var id = $('#inquiryModal').data('id');
          var inquiry = inquiries.find(function(inq) { return inq.id === id; });
          if (inquiry) {
            inquiry.status = $('#inquiryStatus').val();
            inquiry.response = $('#inquiryResponse').val();
            renderInquiries();
            $('#inquiryModal').modal('hide');
          }
        });

        // Initial render
        renderInquiries();
      });
    </script>
  </body>
</html>