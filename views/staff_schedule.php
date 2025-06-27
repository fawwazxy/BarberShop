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
    <title>Staff Schedule Management</title>
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
      }
      .day-checkboxes {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 15px;
      }
      .day-checkbox-item {
        display: flex;
        align-items: center;
      }
      .time-range-container {
        display: flex;
        gap: 10px;
        margin-bottom: 15px;
      }
      .time-range-input {
        flex: 1;
      }
      .recurring-options {
        margin-bottom: 15px;
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
                <i class="typcn typcn-calendar mr-1"></i> My Schedule
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
                      Added new availability on Friday
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
                  <h3 class="font-weight-bold mb-0">My Schedule Management</h3>
                  <div>
                    <button id="addAvailabilityBtn" class="btn btn-primary">
                      <i class="typcn typcn-plus mr-1"></i> Add Availability
                    </button>
                  </div>
                </div>
                
                <div class="card">
                  <div class="card-body">
                    <div class="schedule-controls d-flex flex-wrap align-items-center mb-4">
                      <div class="view-filter mr-3">
                        <select id="viewFilter" class="form-control form-control-sm">
                          <option value="agendaWeek">Weekly View</option>
                          <option value="agendaDay">Daily View</option>
                          <option value="month">Monthly View</option>
                        </select>
                      </div>
                      <div class="status-filter mr-3">
                        <select id="statusFilter" class="form-control form-control-sm">
                          <option value="all">All Statuses</option>
                          <option value="available">Available</option>
                          <option value="unavailable">Unavailable</option>
                          <option value="booked">Booked</option>
                        </select>
                      </div>
                    </div>
                    
                    <div id="schedule-calendar"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Schedule Details Modal -->
          <div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="scheduleModalLabel">Schedule Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control" id="scheduleStatus" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control" id="scheduleType" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Start Time</label>
                        <input type="text" class="form-control" id="scheduleStart" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>End Time</label>
                        <input type="text" class="form-control" id="scheduleEnd" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Notes</label>
                    <textarea class="form-control" id="scheduleNotes" rows="3" readonly></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="editScheduleBtn">Edit</button>
                  <button type="button" class="btn btn-danger" id="deleteScheduleBtn">Delete</button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Add Availability Modal -->
          <div class="modal fade" id="addAvailabilityModal" tabindex="-1" role="dialog" aria-labelledby="addAvailabilityModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addAvailabilityModalLabel">Add Availability</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="addAvailabilityForm">
                    <div class="form-group">
                      <label>Availability Type</label>
                      <select class="form-control" id="availabilityType">
                        <option value="available">Available</option>
                        <option value="unavailable">Unavailable</option>
                      </select>
                    </div>
                    
                    <div class="day-checkboxes">
                      <div class="day-checkbox-item">
                        <div class="form-check form-check-primary">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="days" value="monday"> Monday
                          </label>
                        </div>
                      </div>
                      <div class="day-checkbox-item">
                        <div class="form-check form-check-primary">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="days" value="tuesday"> Tuesday
                          </label>
                        </div>
                      </div>
                      <div class="day-checkbox-item">
                        <div class="form-check form-check-primary">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="days" value="wednesday"> Wednesday
                          </label>
                        </div>
                      </div>
                      <div class="day-checkbox-item">
                        <div class="form-check form-check-primary">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="days" value="thursday"> Thursday
                          </label>
                        </div>
                      </div>
                      <div class="day-checkbox-item">
                        <div class="form-check form-check-primary">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="days" value="friday"> Friday
                          </label>
                        </div>
                      </div>
                      <div class="day-checkbox-item">
                        <div class="form-check form-check-primary">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="days" value="saturday"> Saturday
                          </label>
                        </div>
                      </div>
                      <div class="day-checkbox-item">
                        <div class="form-check form-check-primary">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="days" value="sunday"> Sunday
                          </label>
                        </div>
                      </div>
                    </div>
                    
                    <div class="time-range-container">
                      <div class="time-range-input">
                        <label>Start Time</label>
                        <select class="form-control" id="startTime">
                          <option value="08:00">8:00 AM</option>
                          <option value="08:30">8:30 AM</option>
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
                          <option value="17:30">5:30 PM</option>
                          <option value="18:00">6:00 PM</option>
                        </select>
                      </div>
                      <div class="time-range-input">
                        <label>End Time</label>
                        <select class="form-control" id="endTime">
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
                          <option value="17:30">5:30 PM</option>
                          <option value="18:00">6:00 PM</option>
                          <option value="18:30">6:30 PM</option>
                          <option value="19:00">7:00 PM</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="recurring-options">
                      <div class="form-check form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" id="recurringCheckbox"> Recurring weekly
                        </label>
                      </div>
                      <div id="recurringEndOptions" style="display: none; margin-top: 10px;">
                        <label>Recur Until</label>
                        <input type="text" class="form-control datepicker" id="recurringEndDate" placeholder="Select end date">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label>Notes (Optional)</label>
                      <textarea class="form-control" id="availabilityNotes" rows="3"></textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary" id="saveAvailabilityBtn">Save Availability</button>
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
        
        // Toggle recurring options
        $('#recurringCheckbox').change(function() {
          if($(this).is(':checked')) {
            $('#recurringEndOptions').show();
          } else {
            $('#recurringEndOptions').hide();
          }
        });
        
        // Sample schedule data
        var scheduleItems = [
          {
            id: 1,
            title: 'Available',
            type: 'regular',
            start: moment().day(1).hour(9).minute(0),
            end: moment().day(1).hour(17).minute(0),
            status: 'available',
            notes: 'Regular work hours',
            color: '#4B49AC'
          },
          {
            id: 2,
            title: 'Available',
            type: 'regular',
            start: moment().day(2).hour(9).minute(0),
            end: moment().day(2).hour(17).minute(0),
            status: 'available',
            notes: 'Regular work hours',
            color: '#4B49AC'
          },
          {
            id: 3,
            title: 'Available',
            type: 'regular',
            start: moment().day(3).hour(9).minute(0),
            end: moment().day(3).hour(17).minute(0),
            status: 'available',
            notes: 'Regular work hours',
            color: '#4B49AC'
          },
          {
            id: 4,
            title: 'Available',
            type: 'regular',
            start: moment().day(4).hour(9).minute(0),
            end: moment().day(4).hour(17).minute(0),
            status: 'available',
            notes: 'Regular work hours',
            color: '#4B49AC'
          },
          {
            id: 5,
            title: 'Available',
            type: 'regular',
            start: moment().day(5).hour(9).minute(0),
            end: moment().day(5).hour(17).minute(0),
            status: 'available',
            notes: 'Regular work hours',
            color: '#4B49AC'
          },
          {
            id: 6,
            title: 'Lunch Break',
            type: 'break',
            start: moment().day(1).hour(12).minute(0),
            end: moment().day(1).hour(13).minute(0),
            status: 'unavailable',
            notes: 'Daily lunch break',
            color: '#FFC100'
          },
          {
            id: 7,
            title: 'Booked - John Smith',
            type: 'appointment',
            start: moment().day(2).hour(10).minute(0),
            end: moment().day(2).hour(10).minute(30),
            status: 'booked',
            notes: 'Haircut appointment',
            color: '#7DA0FA'
          }
        ];
        
        // Initialize calendar
        $('#schedule-calendar').fullCalendar({
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
          events: scheduleItems,
          eventRender: function(event, element) {
            element.find('.fc-title').html(
              '<strong>' + event.title + '</strong><br>' + 
              '<small>' + moment(event.start).format('h:mm a') + ' - ' + moment(event.end).format('h:mm a') + '</small>'
            );
          },
          eventClick: function(calEvent, jsEvent, view) {
            // Populate modal with event data
            $('#scheduleStatus').val(calEvent.status.charAt(0).toUpperCase() + calEvent.status.slice(1));
            $('#scheduleType').val(calEvent.type.charAt(0).toUpperCase() + calEvent.type.slice(1));
            $('#scheduleStart').val(moment(calEvent.start).format('MMMM Do YYYY, h:mm a'));
            $('#scheduleEnd').val(moment(calEvent.end).format('MMMM Do YYYY, h:mm a'));
            $('#scheduleNotes').val(calEvent.notes);
            
            // Store the event ID for editing/deleting
            $('#scheduleModal').data('eventId', calEvent.id);
            
            // Show modal
            $('#scheduleModal').modal('show');
          },
          dayClick: function(date, jsEvent, view) {
            // Set default date/time when clicking on calendar
            $('#addAvailabilityModal').modal('show');
          }
        });
        
        // Change calendar view
        $('#viewFilter').change(function() {
          $('#schedule-calendar').fullCalendar('changeView', $(this).val());
        });
        
        // Filter events
        $('#statusFilter').change(function() {
          var statusFilter = $(this).val();
          
          $('#schedule-calendar').fullCalendar('removeEvents');
          $('#schedule-calendar').fullCalendar('addEventSource', 
            scheduleItems.filter(function(item) {
              return statusFilter === 'all' || item.status === statusFilter;
            })
          );
        });
        
        // Add availability button
        $('#addAvailabilityBtn').click(function() {
          $('#addAvailabilityModal').modal('show');
        });
        
        // Save new availability
        $('#saveAvailabilityBtn').click(function() {
          var selectedDays = [];
          $('input[name="days"]:checked').each(function() {
            selectedDays.push($(this).val());
          });
          
          var startTime = $('#startTime').val();
          var endTime = $('#endTime').val();
          var availabilityType = $('#availabilityType').val();
          var notes = $('#availabilityNotes').val();
          var isRecurring = $('#recurringCheckbox').is(':checked');
          var recurringEndDate = $('#recurringEndDate').val();
          
          // For demo purposes, we'll just add one week of availability
          selectedDays.forEach(function(day) {
            var dayNum = getDayNumber(day);
            var newItem = {
              id: scheduleItems.length + 1,
              title: availabilityType === 'available' ? 'Available' : 'Unavailable',
              type: availabilityType === 'available' ? 'availability' : 'unavailable',
              start: moment().day(dayNum).hour(parseInt(startTime.split(':')[0])).minute(parseInt(startTime.split(':')[1])),
              end: moment().day(dayNum).hour(parseInt(endTime.split(':')[0])).minute(parseInt(endTime.split(':')[1])),
              status: availabilityType,
              notes: notes,
              color: availabilityType === 'available' ? '#4B49AC' : '#FFC100'
            };
            
            scheduleItems.push(newItem);
            $('#schedule-calendar').fullCalendar('renderEvent', newItem, true);
          });
          
          $('#addAvailabilityModal').modal('hide');
          $('#addAvailabilityForm')[0].reset();
        });
        
        // Edit schedule item
        $('#editScheduleBtn').click(function() {
          var eventId = $('#scheduleModal').data('eventId');
          // In a real app, you would implement edit functionality here
          alert('Edit functionality would be implemented here for event ID: ' + eventId);
          $('#scheduleModal').modal('hide');
        });
        
        // Delete schedule item
        $('#deleteScheduleBtn').click(function() {
          var eventId = $('#scheduleModal').data('eventId');
          var event = $('#schedule-calendar').fullCalendar('clientEvents', eventId)[0];
          
          if (event) {
            $('#schedule-calendar').fullCalendar('removeEvents', eventId);
            scheduleItems = scheduleItems.filter(function(item) {
              return item.id !== eventId;
            });
          }
          
          $('#scheduleModal').modal('hide');
        });
        
        // Helper function to get day number from name
        function getDayNumber(dayName) {
          const days = {
            'sunday': 0,
            'monday': 1,
            'tuesday': 2,
            'wednesday': 3,
            'thursday': 4,
            'friday': 5,
            'saturday': 6
          };
          return days[dayName.toLowerCase()];
        }
      });
    </script>
  </body>
</html>