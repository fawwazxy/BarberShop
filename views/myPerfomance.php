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
    <title>My Performance Metrics</title>
    <!-- base:css -->
    <link rel="stylesheet" href="../vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <!-- endinject --> 
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../vendors/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="../vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../vendors/chart.js/Chart.min.css">
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
      .performance-stats {
        background: #fff;
        border-radius: 4px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
      }
      .stat-card {
        text-align: center;
        padding: 15px;
        border-radius: 4px;
        margin-bottom: 15px;
        background: #f8f9fa;
      }
      .stat-card h3 {
        font-size: 1.8rem;
        font-weight: 600;
        margin-bottom: 5px;
      }
      .stat-card p {
        color: #6c757d;
        margin-bottom: 0;
      }
      .rating-stars {
        color: #FFC107;
        font-size: 1.5rem;
      }
      .chart-container {
        position: relative;
        height: 300px;
        margin-bottom: 20px;
      }
      .performance-tabs .nav-link {
        font-weight: 500;
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
                <i class="typcn typcn-chart-line mr-1"></i> Performance
              </a>
            </li>
            <li class="nav-item  d-none d-lg-flex">
              <a class="nav-link" href="index.html">
                <i class="typcn typcn-home mr-1"></i> Dashboard
              </a>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
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
                  <h3 class="font-weight-bold mb-0">My Performance Metrics</h3>
                  <div>
                    <select id="timePeriod" class="form-control">
                      <option value="week">This Week</option>
                      <option value="month">This Month</option>
                      <option value="quarter">This Quarter</option>
                      <option value="year">This Year</option>
                    </select>
                  </div>
                </div>
                
                <!-- Performance Stats Cards -->
                <div class="row">
                  <div class="col-md-3">
                    <div class="stat-card">
                      <h3>24</h3>
                      <p>Appointments Completed</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="stat-card">
                      <h3>4.8</h3>
                      <p>Average Rating</p>
                      <div class="rating-stars">
                        <i class="typcn typcn-star"></i>
                        <i class="typcn typcn-star"></i>
                        <i class="typcn typcn-star"></i>
                        <i class="typcn typcn-star"></i>
                        <i class="typcn typcn-star-half"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="stat-card">
                      <h3>92%</h3>
                      <p>Customer Retention</p>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="stat-card">
                      <h3>$1,240</h3>
                      <p>Total Revenue</p>
                    </div>
                  </div>
                </div>
                
                <!-- Charts Row -->
                <div class="row mt-4">
                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Appointments Trend</h4>
                        <div class="chart-container">
                          <canvas id="appointmentsChart"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Service Distribution</h4>
                        <div class="chart-container">
                          <canvas id="servicesChart"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Calendar and Reviews -->
                <div class="row mt-4">
                  <div class="col-md-8">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">My Appointments Calendar</h4>
                        <div id="calendar"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Recent Customer Feedback</h4>
                        <div class="reviews-container">
                          <div class="review-item mb-3 p-3 border-bottom">
                            <div class="d-flex justify-content-between">
                              <strong>John Smith</strong>
                              <div class="rating-stars">
                                <i class="typcn typcn-star"></i>
                                <i class="typcn typcn-star"></i>
                                <i class="typcn typcn-star"></i>
                                <i class="typcn typcn-star"></i>
                                <i class="typcn typcn-star"></i>
                              </div>
                            </div>
                            <p class="mb-1">"Great haircut as always! Tony knows exactly what I want."</p>
                            <small class="text-muted">2 days ago</small>
                          </div>
                          <div class="review-item mb-3 p-3 border-bottom">
                            <div class="d-flex justify-content-between">
                              <strong>Mike Johnson</strong>
                              <div class="rating-stars">
                                <i class="typcn typcn-star"></i>
                                <i class="typcn typcn-star"></i>
                                <i class="typcn typcn-star"></i>
                                <i class="typcn typcn-star"></i>
                                <i class="typcn typcn-star-outline"></i>
                              </div>
                            </div>
                            <p class="mb-1">"Good service but had to wait 10 minutes past my appointment time."</p>
                            <small class="text-muted">1 week ago</small>
                          </div>
                          <div class="review-item mb-3 p-3 border-bottom">
                            <div class="d-flex justify-content-between">
                              <strong>David Wilson</strong>
                              <div class="rating-stars">
                                <i class="typcn typcn-star"></i>
                                <i class="typcn typcn-star"></i>
                                <i class="typcn typcn-star"></i>
                                <i class="typcn typcn-star"></i>
                                <i class="typcn typcn-star"></i>
                              </div>
                            </div>
                            <p class="mb-1">"Best barber in town! The fade was perfect."</p>
                            <small class="text-muted">2 weeks ago</small>
                          </div>
                          <a href="#" class="btn btn-outline-primary btn-block mt-2">View All Feedback</a>
                        </div>
                      </div>
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
                        <input type="text" class="form-control" id="customerName" value="John Smith" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Rating</label>
                        <div class="rating-stars">
                          <i class="typcn typcn-star"></i>
                          <i class="typcn typcn-star"></i>
                          <i class="typcn typcn-star"></i>
                          <i class="typcn typcn-star"></i>
                          <i class="typcn typcn-star"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Service</label>
                        <input type="text" class="form-control" id="serviceType" value="Haircut & Beard Trim" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Duration</label>
                        <input type="text" class="form-control" value="45 minutes" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Date & Time</label>
                        <input type="text" class="form-control" value="June 15, 2023 - 10:00 AM" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Revenue</label>
                        <input type="text" class="form-control" value="$45.00" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Customer Feedback</label>
                    <textarea class="form-control" rows="3" readonly>"Tony did an amazing job with my haircut and beard trim. Will definitely come back!"</textarea>
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
    <script src="../vendors/chart.js/Chart.min.js"></script>
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
        // Sample performance data
        var performanceData = {
          appointments: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            data: [18, 22, 25, 20, 26, 24]
          },
          ratings: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            data: [4.5, 4.6, 4.7, 4.8, 4.8, 4.9]
          },
          services: {
            labels: ['Haircut', 'Shave', 'Beard Trim', 'Hair Color', 'Package'],
            data: [45, 15, 25, 10, 5]
          }
        };
        
        // Initialize charts
        var appointmentsCtx = document.getElementById('appointmentsChart').getContext('2d');
        var appointmentsChart = new Chart(appointmentsCtx, {
          type: 'line',
          data: {
            labels: performanceData.appointments.labels,
            datasets: [{
              label: 'Appointments Completed',
              data: performanceData.appointments.data,
              backgroundColor: 'rgba(75, 73, 172, 0.2)',
              borderColor: 'rgba(75, 73, 172, 1)',
              borderWidth: 2,
              pointBackgroundColor: 'rgba(75, 73, 172, 1)',
              pointRadius: 4,
              tension: 0.1
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              y: {
                beginAtZero: false,
                min: 15,
                max: 30
              }
            }
          }
        });
        
        var servicesCtx = document.getElementById('servicesChart').getContext('2d');
        var servicesChart = new Chart(servicesCtx, {
          type: 'doughnut',
          data: {
            labels: performanceData.services.labels,
            datasets: [{
              data: performanceData.services.data,
              backgroundColor: [
                '#4B49AC',
                '#FFC100',
                '#7DA0FA',
                '#FD7E14',
                '#1B2A4E'
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
              legend: {
                position: 'right'
              }
            }
          }
        });
        
        // Sample appointment data
        var appointments = [
          {
            id: 1,
            title: 'John Smith - Haircut',
            customer: 'John Smith',
            start: moment().hour(10).minute(0),
            end: moment().hour(10).minute(30),
            service: 'Haircut',
            status: 'completed',
            rating: 5,
            revenue: 30,
            color: '#4B49AC'
          },
          {
            id: 2,
            title: 'Mike Johnson - Beard Trim',
            customer: 'Mike Johnson',
            start: moment().hour(11).minute(30),
            end: moment().hour(12).minute(0),
            service: 'Beard Trim',
            status: 'completed',
            rating: 4,
            revenue: 15,
            color: '#FFC100'
          },
          {
            id: 3,
            title: 'Robert Brown - Premium',
            customer: 'Robert Brown',
            start: moment().add(1, 'days').hour(14).minute(0),
            end: moment().add(1, 'days').hour(15).minute(0),
            service: 'Premium Package',
            status: 'completed',
            rating: 5,
            revenue: 80,
            color: '#7DA0FA'
          },
          {
            id: 4,
            title: 'David Wilson - Hair Color',
            customer: 'David Wilson',
            start: moment().add(2, 'days').hour(9).minute(0),
            end: moment().add(2, 'days').hour(10).minute(30),
            service: 'Hair Color',
            status: 'completed',
            rating: 5,
            revenue: 50,
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
          editable: false,
          eventLimit: true,
          events: appointments,
          eventRender: function(event, element) {
            var ratingStars = '';
            for (var i = 0; i < 5; i++) {
              if (i < event.rating) {
                ratingStars += '<i class="typcn typcn-star"></i>';
              } else {
                ratingStars += '<i class="typcn typcn-star-outline"></i>';
              }
            }
            
            element.find('.fc-title').html(
              '<strong>' + event.customer + '</strong><br>' + 
              '<span>' + event.service + '</span><br>' +
              '<small class="rating-stars">' + ratingStars + '</small>'
            );
          },
          eventClick: function(calEvent, jsEvent, view) {
            // Populate modal with event data
            $('#customerName').val(calEvent.customer);
            $('#serviceType').val(calEvent.service);
            
            // Show modal
            $('#appointmentModal').modal('show');
          }
        });
        
        // Time period filter
        $('#timePeriod').change(function() {
          var period = $(this).val();
          // In a real app, you would fetch new data based on the selected period
          console.log('Time period changed to: ' + period);
          
          // Update charts with filtered data (simulated)
          if (period === 'month') {
            appointmentsChart.data.datasets[0].data = [20, 22, 24, 26, 28, 30];
            appointmentsChart.update();
          } else if (period === 'year') {
            appointmentsChart.data.labels = ['Q1', 'Q2', 'Q3', 'Q4'];
            appointmentsChart.data.datasets[0].data = [75, 82, 78, 85];
            appointmentsChart.update();
          } else {
            // Reset to default
            appointmentsChart.data.labels = performanceData.appointments.labels;
            appointmentsChart.data.datasets[0].data = performanceData.appointments.data;
            appointmentsChart.update();
          }
        });
      });
    </script>
  </body>
</html>