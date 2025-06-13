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
    <title>Barbershop Calendar</title>
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
      .fc-event {
        cursor: pointer;
        border-radius: 4px;
        font-size: 0.85em;
        padding: 2px 5px;
      }
      .fc-day-grid-event .fc-content {
        white-space: normal;
      }
      .appointment-details {
        display: none;
        position: absolute;
        background: white;
        border: 1px solid #ddd;
        padding: 15px;
        z-index: 1000;
        border-radius: 4px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.15);
      }
      .calendar-controls {
        margin-bottom: 20px;
      }
      .barber-filter {
        margin-right: 15px;
      }
      .service-badge {
        display: inline-block;
        padding: 3px 8px;
        border-radius: 12px;
        font-size: 0.75em;
        font-weight: 600;
        margin-right: 5px;
      }
      .fc-toolbar h2 {
        font-size: 1.5em;
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
                <i class="typcn typcn-calendar mr-1"></i> Calendar
              </a>
            </li>
            <li class="nav-item  d-none d-lg-flex">
              <a class="nav-link" href="index.html">
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
                  <h3 class="font-weight-bold mb-0">Appointment Calendar</h3>
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
                          <option value="all">All Barbers</option>
                          <option value="tony">Tony Styles</option>
                          <option value="mike">Mike Clipper</option>
                          <option value="eddie">Eddie Razor</option>
                          <option value="carl">Carl Fade</option>
                        </select>
                      </div>
                      <div class="service-filter mr-3">
                        <select id="serviceFilter" class="form-control form-control-sm">
                          <option value="all">All Services</option>
                          <option value="haircut">Haircut</option>
                          <option value="shave">Shave</option>
                          <option value="beard">Beard Trim</option>
                          <option value="color">Hair Color</option>
                        </select>
                      </div>
                      <div class="status-filter">
                        <select id="statusFilter" class="form-control form-control-sm">
                          <option value="all">All Statuses</option>
                          <option value="confirmed">Confirmed</option>
                          <option value="pending">Pending</option>
                          <option value="completed">Completed</option>
                        </select>
                      </div>
                    </div>
                    
                    <div id="calendar"></div>
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
                        <label>Service</label>
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
                        <label>Date & Time</label>
                        <input type="text" class="form-control" id="appointmentTime" readonly>
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
    <!-- Custom js for this page-->
    <script>
      $(document).ready(function() {
        // Initialize datepicker
        $('.datepicker').datepicker({
          format: 'yyyy-mm-dd',
          todayHighlight: true,
          autoclose: true
        });
        
        // Sample appointment data
        var appointments = [
          {
            id: 1,
            title: 'John Smith - Haircut',
            customer: 'John Smith',
            phone: '(555) 123-4567',
            start: moment().hour(10).minute(0),
            end: moment().hour(10).minute(30),
            service: 'Haircut',
            barber: 'Tony Styles',
            status: 'confirmed',
            notes: 'Regular customer, prefers clipper cut on sides',
            color: '#4B49AC'
          },
          {
            id: 2,
            title: 'Mike Johnson - Beard Trim',
            customer: 'Mike Johnson',
            phone: '(555) 987-6543',
            start: moment().hour(11).minute(30),
            end: moment().hour(12).minute(0),
            service: 'Beard Trim',
            barber: 'Carl Fade',
            status: 'confirmed',
            notes: 'First time customer, wants beard shaped',
            color: '#FFC100'
          },
          {
            id: 3,
            title: 'Robert Brown - Premium',
            customer: 'Robert Brown',
            phone: '(555) 456-7890',
            start: moment().add(1, 'days').hour(14).minute(0),
            end: moment().add(1, 'days').hour(15).minute(0),
            service: 'Premium Package',
            barber: 'Tony Styles',
            status: 'pending',
            notes: 'VIP customer, haircut + shave + facial',
            color: '#7DA0FA'
          },
          {
            id: 4,
            title: 'David Wilson - Hair Color',
            customer: 'David Wilson',
            phone: '(555) 789-0123',
            start: moment().add(2, 'days').hour(9).minute(0),
            end: moment().add(2, 'days').hour(10).minute(30),
            service: 'Hair Color',
            barber: 'Eddie Razor',
            status: 'confirmed',
            notes: 'Gray coverage, natural brown',
            color: '#FD7E14'
          }
        ];
        
        // Initialize calendar
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          defaultView: 'agendaWeek',
          defaultDate: new Date(),
          navLinks: true,
          editable: true,
          eventLimit: true,
          events: appointments,
          eventRender: function(event, element) {
            element.find('.fc-title').html(
              '<strong>' + event.customer + '</strong><br>' + 
              '<span class="service-badge" style="background:' + event.color + '">' + event.service + '</span>' +
              '<small>' + moment(event.start).format('h:mm a') + ' - ' + moment(event.end).format('h:mm a') + '</small>'
            );
          },
          eventClick: function(calEvent, jsEvent, view) {
            // Populate modal with event data
            $('#customerName').val(calEvent.customer);
            $('#customerPhone').val(calEvent.phone);
            $('#serviceType').val(calEvent.service);
            $('#barberName').val(calEvent.barber);
            $('#appointmentTime').val(
              moment(calEvent.start).format('MMMM Do YYYY, h:mm a') + ' - ' + 
              moment(calEvent.end).format('h:mm a')
            );
            $('#appointmentStatus').val(calEvent.status.charAt(0).toUpperCase() + calEvent.status.slice(1));
            $('#appointmentNotes').val(calEvent.notes);
            
            // Show modal
            $('#appointmentModal').modal('show');
          },
          dayClick: function(date, jsEvent, view) {
            // Set default date/time when clicking on calendar
            $('#newDate').val(date.format('YYYY-MM-DD'));
            $('#newTime').val(date.format('HH:mm'));
            $('#newAppointmentModal').modal('show');
          }
        });
        
        // Filter events
        $('#barberFilter, #serviceFilter, #statusFilter').change(function() {
          var barberFilter = $('#barberFilter').val();
          var serviceFilter = $('#serviceFilter').val();
          var statusFilter = $('#statusFilter').val();
          
          $('#calendar').fullCalendar('removeEvents');
          $('#calendar').fullCalendar('addEventSource', 
            appointments.filter(function(appt) {
              return (barberFilter === 'all' || appt.barber.toLowerCase().includes(barberFilter)) &&
                     (serviceFilter === 'all' || appt.service.toLowerCase().includes(serviceFilter)) &&
                     (statusFilter === 'all' || appt.status === statusFilter);
            })
          );
        });
        
        // New appointment button
        $('#newAppointmentBtn').click(function() {
          $('#newAppointmentModal').modal('show');
        });
        
        // Save new appointment
        $('#saveAppointmentBtn').click(function() {
          var newAppt = {
            id: appointments.length + 1,
            title: $('#newCustomer option:selected').text() + ' - ' + $('#newService option:selected').text().split(' (')[0],
            customer: $('#newCustomer option:selected').text(),
            phone: '(555) 000-0000', // Default for demo
            start: moment($('#newDate').val() + ' ' + $('#newTime').val()),
            end: moment($('#newDate').val() + ' ' + $('#newTime').val()).add(30, 'minutes'),
            service: $('#newService option:selected').text().split(' (')[0],
            barber: $('#newBarber option:selected').text(),
            status: $('#newStatus').val(),
            notes: $('#newNotes').val(),
            color: getServiceColor($('#newService').val())
          };
          
          appointments.push(newAppt);
          $('#calendar').fullCalendar('renderEvent', newAppt, true);
          $('#newAppointmentModal').modal('hide');
          $('#newAppointmentForm')[0].reset();
        });
        
        // Helper function to get color based on service
        function getServiceColor(service) {
          switch(service) {
            case 'haircut': return '#4B49AC';
            case 'shave': return '#FFC100';
            case 'beard': return '#7DA0FA';
            case 'color': return '#FD7E14';
            case 'package': return '#1B2A4E';
            default: return '#4B49AC';
          }
        }
      });
    </script>
  </body>
</html>