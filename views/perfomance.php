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
    <title>Staff Performance Dashboard</title>
    <!-- base:css -->
    <link rel="stylesheet" href="../vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <!-- endinject --> 
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../images/favicon.png" />
    <style>
      .performance-card {
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        transition: transform 0.3s ease;
      }
      .performance-card:hover {
        transform: translateY(-5px);
      }
      .performance-value {
        font-size: 2rem;
        font-weight: 600;
      }
      .performance-label {
        font-size: 0.9rem;
        color: #6c757d;
      }
      .star-rating {
        color: #FFC107;
        font-size: 1.5rem;
      }
      .progress {
        height: 10px;
        border-radius: 5px;
      }
      .table th {
        border-top: none;
      }
      .recent-appointments {
        max-height: 400px;
        overflow-y: auto;
      }
      /* New color scheme for cards */
      .card-primary {
        background: linear-gradient(135deg, #4B49AC 0%, #7B79FF 100%);
        color: white;
      }
      .card-success {
        background: linear-gradient(135deg, #28A745 0%, #5CE17F 100%);
        color: white;
      }
      .card-warning {
        background: linear-gradient(135deg, #FFC107 0%, #FFD55B 100%);
        color: #1F1F1F;
      }
      .card-info {
        background: linear-gradient(135deg, #17A2B8 0%, #5BC0DE 100%);
        color: white;
      }
      .card-danger {
        background: linear-gradient(135deg, #DC3545 0%, #FF6B7F 100%);
        color: white;
      }
      /* Fix for dark text on warning card */
      .card-warning .performance-label,
      .card-warning small {
        color: rgba(0,0,0,0.7) !important;
      }
      .time-period-filter {
        min-width: 150px;
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
              <a class="nav-link" href="calendar.php">
                <i class="typcn typcn-calendar mr-1"></i> Calendar
              </a>
            </li>
            <li class="nav-item  d-none d-lg-flex">
              <a class="nav-link active" href="performance.php">
                <i class="typcn typcn-chart-bar-outline mr-1"></i> Performance
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
                <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="typcn typcn-user"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">New Rating</h6>
                    <p class="font-weight-light small-text mb-0">
                      You received 5 stars from John D.
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
                    <h6 class="preview-subject font-weight-normal">Performance Update</h6>
                    <p class="font-weight-light small-text mb-0">
                      Your monthly target is 85% complete
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
                  <h3 class="font-weight-bold mb-0">Staff Performance Dashboard</h3>
                  <div>
                    <div class="dropdown">
                      <button class="btn btn-outline-secondary dropdown-toggle time-period-filter" type="button" id="timePeriodDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        This Month
                      </button>
                      <div class="dropdown-menu" aria-labelledby="timePeriodDropdown">
                        <a class="dropdown-item time-filter" href="#" data-period="today">Today</a>
                        <a class="dropdown-item time-filter" href="#" data-period="week">This Week</a>
                        <a class="dropdown-item time-filter active" href="#" data-period="month">This Month</a>
                        <a class="dropdown-item time-filter" href="#" data-period="year">This Year</a>
                        <a class="dropdown-item time-filter" href="#" data-period="all">All Time</a>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-3 grid-margin stretch-card">
                    <div class="card performance-card card-primary">
                      <div class="card-body">
                        <div class="performance-value"><span id="completed-appointments">87</span></div>
                        <div class="performance-label">Appointments Completed</div>
                        <div class="mt-3">
                          <div class="d-flex justify-content-between mb-2">
                            <small>Monthly Target: <span id="appointment-target">100</span></small>
                            <small><span id="appointment-percent">87</span>%</small>
                          </div>
                          <div class="progress">
                            <div class="progress-bar bg-light" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-3 grid-margin stretch-card">
                    <div class="card performance-card card-success">
                      <div class="card-body">
                        <div class="performance-value"><span id="avg-rating">4.7</span></div>
                        <div class="performance-label">Average Rating</div>
                        <div class="star-rating mt-2">
                          <i class="typcn typcn-star"></i>
                          <i class="typcn typcn-star"></i>
                          <i class="typcn typcn-star"></i>
                          <i class="typcn typcn-star"></i>
                          <i class="typcn typcn-star-half-outline"></i>
                          <small class="ml-2">(<span id="review-count">42</span> reviews)</small>
                        </div>
                        <div class="mt-3">
                          <small>+<span id="rating-change">2.5</span>% from last month</small>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-3 grid-margin stretch-card">
                    <div class="card performance-card card-warning">
                      <div class="card-body">
                        <div class="performance-value">$<span id="revenue">2,450</span></div>
                        <div class="performance-label">Revenue Generated</div>
                        <div class="mt-3">
                          <div class="d-flex justify-content-between mb-2">
                            <small>Monthly Target: $<span id="revenue-target">3,000</span></small>
                            <small><span id="revenue-percent">81.6</span>%</small>
                          </div>
                          <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 81.6%; background-color: rgba(0,0,0,0.2)" aria-valuenow="81.6" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-3 grid-margin stretch-card">
                    <div class="card performance-card card-info">
                      <div class="card-body">
                        <div class="performance-value"><span id="retention-rate">92</span>%</div>
                        <div class="performance-label">Client Retention</div>
                        <div class="mt-3">
                          <div class="d-flex justify-content-between mb-2">
                            <small>Repeat Clients: <span id="repeat-clients">65</span></small>
                            <small>Industry Avg: 85%</small>
                          </div>
                          <div class="progress">
                            <div class="progress-bar bg-light" role="progressbar" style="width: 92%" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Appointments Trend</h4>
                        <canvas id="appointmentsChart"></canvas>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Service Distribution</h4>
                        <canvas id="servicesChart"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Recent Ratings</h4>
                        <div class="table-responsive">
                          <table class="table table-hover" id="recent-ratings">
                            <thead>
                              <tr>
                                <th>Client</th>
                                <th>Date</th>
                                <th>Rating</th>
                                <th>Feedback</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>John Smith</td>
                                <td>May 15, 2023</td>
                                <td>
                                  <div class="star-rating">
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                  </div>
                                </td>
                                <td>Excellent service as always!</td>
                              </tr>
                              <tr>
                                <td>Mike Johnson</td>
                                <td>May 14, 2023</td>
                                <td>
                                  <div class="star-rating">
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star-outline"></i>
                                  </div>
                                </td>
                                <td>Great haircut, will come back</td>
                              </tr>
                              <tr>
                                <td>David Wilson</td>
                                <td>May 12, 2023</td>
                                <td>
                                  <div class="star-rating">
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star-outline"></i>
                                    <i class="typcn typcn-star-outline"></i>
                                  </div>
                                </td>
                                <td>Good but had to wait 15 mins</td>
                              </tr>
                              <tr>
                                <td>Robert Brown</td>
                                <td>May 10, 2023</td>
                                <td>
                                  <div class="star-rating">
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star"></i>
                                    <i class="typcn typcn-star-half-outline"></i>
                                  </div>
                                </td>
                                <td>Very professional, almost perfect</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Recent Appointments</h4>
                        <div class="table-responsive recent-appointments">
                          <table class="table table-hover" id="recent-appointments">
                            <thead>
                              <tr>
                                <th>Client</th>
                                <th>Service</th>
                                <th>Date/Time</th>
                                <th>Status</th>
                                <th>Amount</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>John Smith</td>
                                <td>Haircut</td>
                                <td>May 15, 2023 10:00 AM</td>
                                <td><label class="badge badge-success">Completed</label></td>
                                <td>$30</td>
                              </tr>
                              <tr>
                                <td>Mike Johnson</td>
                                <td>Beard Trim</td>
                                <td>May 14, 2023 2:30 PM</td>
                                <td><label class="badge badge-success">Completed</label></td>
                                <td>$15</td>
                              </tr>
                              <tr>
                                <td>David Wilson</td>
                                <td>Hair Color</td>
                                <td>May 12, 2023 9:00 AM</td>
                                <td><label class="badge badge-success">Completed</label></td>
                                <td>$50</td>
                              </tr>
                              <tr>
                                <td>Robert Brown</td>
                                <td>Premium Package</td>
                                <td>May 10, 2023 3:00 PM</td>
                                <td><label class="badge badge-success">Completed</label></td>
                                <td>$80</td>
                              </tr>
                              <tr>
                                <td>Sarah Davis</td>
                                <td>Shave</td>
                                <td>May 9, 2023 11:00 AM</td>
                                <td><label class="badge badge-success">Completed</label></td>
                                <td>$20</td>
                              </tr>
                              <tr>
                                <td>James Wilson</td>
                                <td>Haircut</td>
                                <td>May 8, 2023 4:30 PM</td>
                                <td><label class="badge badge-success">Completed</label></td>
                                <td>$30</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
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
    <script src="../vendors/chart.js/Chart.min.js"></script>
    <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="../js/dataTables.select.min.js"></script>
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
        // Sample data for different time periods
        const performanceData = {
          today: {
            completed: 5,
            target: 8,
            rating: 4.8,
            reviews: 2,
            ratingChange: 0.2,
            revenue: 150,
            revenueTarget: 240,
            retention: 95,
            repeatClients: 3,
            trendData: [0, 1, 2, 2, 3, 4, 5],
            serviceData: [3, 1, 1, 0, 0]
          },
          week: {
            completed: 28,
            target: 35,
            rating: 4.6,
            reviews: 12,
            ratingChange: 0.5,
            revenue: 840,
            revenueTarget: 1050,
            retention: 90,
            repeatClients: 18,
            trendData: [3, 5, 6, 4, 5, 3, 2],
            serviceData: [15, 5, 5, 2, 1]
          },
          month: {
            completed: 87,
            target: 100,
            rating: 4.7,
            reviews: 42,
            ratingChange: 2.5,
            revenue: 2450,
            revenueTarget: 3000,
            retention: 92,
            repeatClients: 65,
            trendData: [65, 59, 80, 81, 87, 55, 40],
            serviceData: [45, 15, 20, 10, 10]
          },
          year: {
            completed: 450,
            target: 500,
            rating: 4.5,
            reviews: 210,
            ratingChange: 5.0,
            revenue: 12500,
            revenueTarget: 15000,
            retention: 88,
            repeatClients: 320,
            trendData: [30, 35, 40, 42, 45, 50, 48, 52, 55, 60, 58, 55],
            serviceData: [230, 80, 90, 30, 20]
          },
          all: {
            completed: 1250,
            target: 1500,
            rating: 4.6,
            reviews: 580,
            ratingChange: 8.0,
            revenue: 35000,
            revenueTarget: 45000,
            retention: 90,
            repeatClients: 850,
            trendData: [200, 220, 240, 260, 280, 300, 320, 340, 360, 380, 400, 420],
            serviceData: [650, 250, 200, 100, 50]
          }
        };
        
        // Time period labels
        const trendLabels = {
          today: ['12AM', '3AM', '6AM', '9AM', '12PM', '3PM', '6PM'],
          week: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
          month: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5'],
          year: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          all: ['2020', '2021', '2022', '2023']
        };
        
        // Initialize charts
        let appointmentsChart, servicesChart;
        
        function initCharts(period = 'month') {
          const data = performanceData[period];
          const labels = trendLabels[period];
          
          // Appointments Trend Chart
          const appointmentsCtx = document.getElementById('appointmentsChart').getContext('2d');
          if (appointmentsChart) {
            appointmentsChart.destroy();
          }
          appointmentsChart = new Chart(appointmentsCtx, {
            type: 'line',
            data: {
              labels: labels,
              datasets: [{
                label: 'Appointments Completed',
                data: data.trendData,
                backgroundColor: 'rgba(75, 73, 172, 0.2)',
                borderColor: 'rgba(75, 73, 172, 1)',
                borderWidth: 2,
                tension: 0.4,
                fill: true
              }]
            },
            options: {
              responsive: true,
              plugins: {
                legend: {
                  position: 'top',
                }
              },
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
          
          // Services Distribution Chart
          const servicesCtx = document.getElementById('servicesChart').getContext('2d');
          if (servicesChart) {
            servicesChart.destroy();
          }
          servicesChart = new Chart(servicesCtx, {
            type: 'doughnut',
            data: {
              labels: ['Haircut', 'Shave', 'Beard Trim', 'Hair Color', 'Premium Package'],
              datasets: [{
                data: data.serviceData,
                backgroundColor: [
                  '#4B49AC',
                  '#FFC100',
                  '#7DA0FA',
                  '#FD7E14',
                  '#1B2A4E'
                ],
                borderWidth: 0
              }]
            },
            options: {
              responsive: true,
              plugins: {
                legend: {
                  position: 'right',
                }
              },
              cutout: '70%'
            }
          });
        }
        
        // Update performance metrics
        function updateMetrics(period) {
          const data = performanceData[period];
          
          // Calculate percentages
          const appointmentPercent = Math.round((data.completed / data.target) * 100);
          const revenuePercent = ((data.revenue / data.revenueTarget) * 100).toFixed(1);
          
          // Update DOM elements
          $('#completed-appointments').text(data.completed);
          $('#appointment-target').text(data.target);
          $('#appointment-percent').text(appointmentPercent);
          $('.progress-bar[aria-valuenow="87"]').attr('aria-valuenow', appointmentPercent).css('width', appointmentPercent + '%');
          
          $('#avg-rating').text(data.rating);
          $('#review-count').text(data.reviews);
          $('#rating-change').text(data.ratingChange);
          
          $('#revenue').text(data.revenue.toLocaleString());
          $('#revenue-target').text(data.revenueTarget.toLocaleString());
          $('#revenue-percent').text(revenuePercent);
          $('.progress-bar[aria-valuenow="81.6"]').attr('aria-valuenow', revenuePercent).css('width', revenuePercent + '%');
          
          $('#retention-rate').text(data.retention);
          $('#repeat-clients').text(data.repeatClients);
          $('.progress-bar[aria-valuenow="92"]').attr('aria-valuenow', data.retention).css('width', data.retention + '%');
        }
        
        // Time period filter handler
        $('.time-filter').on('click', function(e) {
          e.preventDefault();
          const period = $(this).data('period');
          
          // Update active state
          $('.time-filter').removeClass('active');
          $(this).addClass('active');
          
          // Update dropdown button text
          $('#timePeriodDropdown').text($(this).text());
          
          // Update metrics and charts
          updateMetrics(period);
          initCharts(period);
        });
        
        // Initialize data tables
        if ($('#recent-ratings').length) {
          $('#recent-ratings').DataTable({
            "aLengthMenu": [
              [5, 10, 15, -1],
              [5, 10, 15, "All"]
            ],
            "iDisplayLength": 5,
            "language": {
              search: ""
            }
          });
        }
        
        if ($('#recent-appointments').length) {
          $('#recent-appointments').DataTable({
            "aLengthMenu": [
              [5, 10, 15, -1],
              [5, 10, 15, "All"]
            ],
            "iDisplayLength": 5,
            "language": {
              search: ""
            }
          });
        }
        
        // Initial load
        updateMetrics('month');
        initCharts('month');
      });
    </script>
  </body>
</html>