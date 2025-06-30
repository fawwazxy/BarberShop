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
    <title>Barbershop Income Statistics</title>
    <!-- base:css -->
    <link rel="stylesheet" href="../vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <!-- endinject --> 
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../vendors/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="../vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../vendors/select2/select2.min.css">
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
      .filter-group {
        margin-right: 15px;
        min-width: 180px;
      }
      .income-badge {
        font-weight: bold;
        font-size: 1.1em;
      }
      .income-tooltip {
        position: absolute;
        background: rgba(0,0,0,0.8);
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
        z-index: 1000;
        font-size: 12px;
      }
      .stat-card {
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
      }
      .stat-card h5 {
        font-size: 0.9rem;
        color: #6c757d;
        margin-bottom: 5px;
      }
      .stat-card h3 {
        font-weight: 600;
        margin-bottom: 0;
      }
      .trend-up {
        color: #28a745;
      }
      .trend-down {
        color: #dc3545;
      }
      .chart-container {
        height: 250px;
        margin-bottom: 20px;
      }
      .filter-section {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
      }
      .filter-header {
        cursor: pointer;
        margin-bottom: 10px;
      }
      .filter-body {
        display: none;
      }
      .filter-body.show {
        display: block;
      }
      .reset-filters {
        margin-top: 10px;
      }
      .select2-container {
        width: 100% !important;
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
                <i class="typcn typcn-chart-line mr-1"></i> Income Stats
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
                <p class="mb-0 font-weight-normal float-left dropdown-header">Income Alerts</p>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="typcn typcn-money"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">High Revenue Day</h6>
                    <p class="font-weight-light small-text mb-0">
                      Yesterday: RM 1,850
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="typcn typcn-tags"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">Top Service</h6>
                    <p class="font-weight-light small-text mb-0">
                      Haircut: RM 2,300 this week
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
                  <h3 class="font-weight-bold mb-0">Income Statistics</h3>
                  <div>
                    <button id="exportReportBtn" class="btn btn-primary">
                      <i class="typcn typcn-download mr-1"></i> Export Report
                    </button>
                  </div>
                </div>
                
                <!-- Filter Section -->
                <div class="filter-section">
                  <div class="d-flex justify-content-between align-items-center filter-header" id="filterToggle">
                    <h5 class="mb-0"><i class="typcn typcn-filter mr-2"></i>Filters</h5>
                    <span class="typcn typcn-chevron-down"></span>
                  </div>
                  <div class="filter-body" id="filterBody">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Date Range</label>
                          <div class="input-daterange input-group">
                            <input type="text" class="form-control form-control-sm" name="startDate" id="startDate" placeholder="Start Date">
                            <div class="input-group-prepend input-group-append">
                              <span class="input-group-text">to</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" name="endDate" id="endDate" placeholder="End Date">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Barber</label>
                          <select class="form-control form-control-sm select2" id="barberFilter" multiple>
                            <option value="tony">Tony Styles</option>
                            <option value="mike">Mike Clipper</option>
                            <option value="eddie">Eddie Razor</option>
                            <option value="carl">Carl Fade</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Service</label>
                          <select class="form-control form-control-sm select2" id="serviceFilter" multiple>
                            <option value="haircut">Haircut</option>
                            <option value="shave">Shave</option>
                            <option value="beard">Beard Trim</option>
                            <option value="color">Hair Color</option>
                            <option value="package">Premium Package</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Status</label>
                          <select class="form-control form-control-sm select2" id="statusFilter" multiple>
                            <option value="confirmed">Confirmed</option>
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Minimum Amount (RM)</label>
                          <input type="number" class="form-control form-control-sm" id="minAmount" placeholder="0">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Maximum Amount (RM)</label>
                          <input type="number" class="form-control form-control-sm" id="maxAmount" placeholder="Any">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Time Period</label>
                          <select class="form-control form-control-sm" id="timePeriodFilter">
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Quick Select</label>
                          <select class="form-control form-control-sm" id="quickSelect">
                            <option value="">Custom Range</option>
                            <option value="today">Today</option>
                            <option value="yesterday">Yesterday</option>
                            <option value="this_week">This Week</option>
                            <option value="last_week">Last Week</option>
                            <option value="this_month">This Month</option>
                            <option value="last_month">Last Month</option>
                            <option value="this_year">This Year</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 text-right">
                        <button id="applyFiltersBtn" class="btn btn-primary btn-sm">
                          <i class="typcn typcn-tick mr-1"></i> Apply Filters
                        </button>
                        <button id="resetFiltersBtn" class="btn btn-outline-secondary btn-sm reset-filters">
                          <i class="typcn typcn-times mr-1"></i> Reset
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Summary Cards -->
                <div class="row mb-4">
                  <div class="col-md-3">
                    <div class="stat-card bg-light">
                      <h5>TODAY'S INCOME</h5>
                      <h3>RM 1,240</h3>
                      <small class="trend-up"><i class="typcn typcn-arrow-up-thick"></i> 12% from yesterday</small>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="stat-card bg-light">
                      <h5>THIS WEEK</h5>
                      <h3>RM 8,750</h3>
                      <small class="trend-up"><i class="typcn typcn-arrow-up-thick"></i> 5% from last week</small>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="stat-card bg-light">
                      <h5>THIS MONTH</h5>
                      <h3>RM 32,450</h3>
                      <small class="trend-down"><i class="typcn typcn-arrow-down-thick"></i> 3% from last month</small>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="stat-card bg-light">
                      <h5>AVG. DAILY</h5>
                      <h3>RM 1,250</h3>
                      <small class="trend-up"><i class="typcn typcn-arrow-up-thick"></i> 8% from last quarter</small>
                    </div>
                  </div>
                </div>
                
                <!-- Mini Charts -->
                <div class="row mb-4">
                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Weekly Income Trend</h5>
                        <div class="chart-container">
                          <canvas id="weeklyTrendChart"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Service Revenue Distribution</h5>
                        <div class="chart-container">
                          <canvas id="serviceDistributionChart"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="card">
                  <div class="card-body">
                    <div id="calendar"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Income Details Modal -->
          <div class="modal fade" id="incomeModal" tabindex="-1" role="dialog" aria-labelledby="incomeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="incomeModalLabel">Income Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row mb-4">
                    <div class="col-md-6">
                      <div class="stat-card bg-light">
                        <h5>TOTAL INCOME</h5>
                        <h3 id="modalTotalIncome">RM 2,450</h3>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="stat-card bg-light">
                        <h5>AVERAGE PER SERVICE</h5>
                        <h3 id="modalAvgIncome">RM 45.20</h3>
                      </div>
                    </div>
                  </div>
                  
                  <h5>Service Breakdown</h5>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Service</th>
                          <th>Quantity</th>
                          <th>Revenue</th>
                          <th>% of Total</th>
                        </tr>
                      </thead>
                      <tbody id="serviceBreakdownBody">
                        <!-- Will be populated by JS -->
                      </tbody>
                    </table>
                  </div>
                  
                  <h5 class="mt-4">Top Performing Barbers</h5>
                  <div class="chart-container">
                    <canvas id="barberPerformanceChart"></canvas>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Detailed Report</button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Compare Periods Modal -->
          <div class="modal fade" id="compareModal" tabindex="-1" role="dialog" aria-labelledby="compareModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="compareModalLabel">Compare Periods</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>First Period</label>
                        <select class="form-control" id="firstPeriodSelect">
                          <option value="last_week">Last Week</option>
                          <option value="this_week">This Week</option>
                          <option value="last_month">Last Month</option>
                          <option value="this_month">This Month</option>
                          <option value="last_quarter">Last Quarter</option>
                          <option value="this_quarter">This Quarter</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Second Period</label>
                        <select class="form-control" id="secondPeriodSelect">
                          <option value="this_week">This Week</option>
                          <option value="last_week">Last Week</option>
                          <option value="this_month">This Month</option>
                          <option value="last_month">Last Month</option>
                          <option value="this_quarter">This Quarter</option>
                          <option value="last_quarter">Last Quarter</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                  <div class="chart-container mt-4">
                    <canvas id="comparisonChart"></canvas>
                  </div>
                  
                  <div class="row mt-4">
                    <div class="col-md-6">
                      <div class="stat-card bg-light">
                        <h5 id="firstPeriodLabel">LAST WEEK</h5>
                        <h3 id="firstPeriodValue">RM 8,240</h3>
                        <small id="firstPeriodChange">15 services</small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="stat-card bg-light">
                        <h5 id="secondPeriodLabel">THIS WEEK</h5>
                        <h3 id="secondPeriodValue">RM 8,750</h3>
                        <small id="secondPeriodChange">18 services</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Export Comparison</button>
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
    <script src="../vendors/select2/select2.min.js"></script>
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
  $('.input-daterange').datepicker({
    format: 'yyyy-mm-dd',
    todayHighlight: true,
    autoclose: true
  });
  
  // Initialize select2
  $('.select2').select2({
    placeholder: "Select options",
    allowClear: true
  });
  
  // Toggle filter section
  $('#filterToggle').click(function() {
    $('#filterBody').toggleClass('show');
    $(this).find('.typcn').toggleClass('typcn-chevron-down typcn-chevron-up');
  });
  
  // Sample income data with enhanced properties for filtering
  var allIncomeData = [
    {
      id: 1,
      title: 'RM 1,240',
      start: moment(),
      end: moment(),
      total: 1240,
      services: [
        {name: 'Haircut', count: 15, revenue: 750, type: 'haircut'},
        {name: 'Shave', count: 8, revenue: 320, type: 'shave'},
        {name: 'Beard Trim', count: 5, revenue: 150, type: 'beard'},
        {name: 'Hair Color', count: 2, revenue: 100, type: 'color'}
      ],
      barbers: [
        {name: 'Tony Styles', revenue: 650, id: 'tony'},
        {name: 'Mike Clipper', revenue: 320, id: 'mike'},
        {name: 'Eddie Razor', revenue: 270, id: 'eddie'}
      ],
      status: 'completed',
      color: '#4B49AC'
    },
    {
      id: 2,
      title: 'RM 980',
      start: moment().subtract(1, 'days'),
      end: moment().subtract(1, 'days'),
      total: 980,
      services: [
        {name: 'Haircut', count: 12, revenue: 600, type: 'haircut'},
        {name: 'Shave', count: 5, revenue: 200, type: 'shave'},
        {name: 'Beard Trim', count: 3, revenue: 90, type: 'beard'},
        {name: 'Premium Package', count: 1, revenue: 90, type: 'package'}
      ],
      barbers: [
        {name: 'Tony Styles', revenue: 450, id: 'tony'},
        {name: 'Carl Fade', revenue: 350, id: 'carl'},
        {name: 'Eddie Razor', revenue: 180, id: 'eddie'}
      ],
      status: 'completed',
      color: '#FFC100'
    },
    {
      id: 3,
      title: 'RM 1,850',
      start: moment().subtract(2, 'days'),
      end: moment().subtract(2, 'days'),
      total: 1850,
      services: [
        {name: 'Haircut', count: 20, revenue: 1000, type: 'haircut'},
        {name: 'Shave', count: 10, revenue: 400, type: 'shave'},
        {name: 'Beard Trim', count: 8, revenue: 240, type: 'beard'},
        {name: 'Hair Color', count: 3, revenue: 210, type: 'color'}
      ],
      barbers: [
        {name: 'Tony Styles', revenue: 800, id: 'tony'},
        {name: 'Mike Clipper', revenue: 550, id: 'mike'},
        {name: 'Carl Fade', revenue: 500, id: 'carl'}
      ],
      status: 'completed',
      color: '#7DA0FA'
    },
    {
      id: 4,
      title: 'RM 1,520',
      start: moment().subtract(3, 'days'),
      end: moment().subtract(3, 'days'),
      total: 1520,
      services: [
        {name: 'Haircut', count: 18, revenue: 900, type: 'haircut'},
        {name: 'Shave', count: 7, revenue: 280, type: 'shave'},
        {name: 'Beard Trim', count: 6, revenue: 180, type: 'beard'},
        {name: 'Premium Package', count: 2, revenue: 160, type: 'package'}
      ],
      barbers: [
        {name: 'Tony Styles', revenue: 700, id: 'tony'},
        {name: 'Mike Clipper', revenue: 450, id: 'mike'},
        {name: 'Eddie Razor', revenue: 370, id: 'eddie'}
      ],
      status: 'completed',
      color: '#FD7E14'
    },
    {
      id: 5,
      title: 'RM 8,160 (Week)',
      start: moment().startOf('week'),
      end: moment().endOf('week'),
      total: 8160,
      services: [
        {name: 'Haircut', count: 85, revenue: 4250, type: 'haircut'},
        {name: 'Shave', count: 40, revenue: 1600, type: 'shave'},
        {name: 'Beard Trim', count: 30, revenue: 900, type: 'beard'},
        {name: 'Hair Color', count: 10, revenue: 700, type: 'color'},
        {name: 'Premium Package', count: 8, revenue: 710, type: 'package'}
      ],
      barbers: [
        {name: 'Tony Styles', revenue: 3500, id: 'tony'},
        {name: 'Mike Clipper', revenue: 2500, id: 'mike'},
        {name: 'Eddie Razor', revenue: 1500, id: 'eddie'},
        {name: 'Carl Fade', revenue: 660, id: 'carl'}
      ],
      status: 'completed',
      color: '#1B2A4E',
      rendering: 'background',
      allDay: true
    },
    {
      id: 6,
      title: 'RM 750',
      start: moment().subtract(5, 'days'),
      end: moment().subtract(5, 'days'),
      total: 750,
      services: [
        {name: 'Haircut', count: 10, revenue: 500, type: 'haircut'},
        {name: 'Shave', count: 5, revenue: 200, type: 'shave'},
        {name: 'Beard Trim', count: 2, revenue: 50, type: 'beard'}
      ],
      barbers: [
        {name: 'Mike Clipper', revenue: 400, id: 'mike'},
        {name: 'Carl Fade', revenue: 350, id: 'carl'}
      ],
      status: 'completed',
      color: '#4B49AC'
    },
    {
      id: 7,
      title: 'RM 1,100 (Pending)',
      start: moment().add(1, 'days'),
      end: moment().add(1, 'days'),
      total: 1100,
      services: [
        {name: 'Haircut', count: 15, revenue: 750, type: 'haircut'},
        {name: 'Shave', count: 5, revenue: 200, type: 'shave'},
        {name: 'Hair Color', count: 3, revenue: 150, type: 'color'}
      ],
      barbers: [
        {name: 'Tony Styles', revenue: 600, id: 'tony'},
        {name: 'Eddie Razor', revenue: 500, id: 'eddie'}
      ],
      status: 'pending',
      color: '#6c757d'
    },
    {
      id: 8,
      title: 'RM 420',
      start: moment().subtract(7, 'days'),
      end: moment().subtract(7, 'days'),
      total: 420,
      services: [
        {name: 'Haircut', count: 6, revenue: 300, type: 'haircut'},
        {name: 'Beard Trim', count: 4, revenue: 120, type: 'beard'}
      ],
      barbers: [
        {name: 'Carl Fade', revenue: 420, id: 'carl'}
      ],
      status: 'cancelled',
      color: '#dc3545'
    }
  ];
  
  var filteredData = [...allIncomeData];
  var calendar;
  
  // Filter function
  function applyFilters() {
    var startDate = $('#startDate').val();
    var endDate = $('#endDate').val();
    var selectedBarbers = $('#barberFilter').val() || [];
    var selectedServices = $('#serviceFilter').val() || [];
    var selectedStatuses = $('#statusFilter').val() || [];
    var minAmount = parseFloat($('#minAmount').val()) || 0;
    var maxAmount = parseFloat($('#maxAmount').val()) || Infinity;
    
    filteredData = allIncomeData.filter(function(event) {
      // Date range filter
      if (startDate && moment(event.start).isBefore(moment(startDate), 'day')) return false;
      if (endDate && moment(event.start).isAfter(moment(endDate), 'day')) return false;
      
      // Amount filter
      if (event.total < minAmount || event.total > maxAmount) return false;
      
      // Status filter
      if (selectedStatuses.length > 0 && !selectedStatuses.includes(event.status)) return false;
      
      // Barber filter
      if (selectedBarbers.length > 0) {
        var hasBarber = event.barbers.some(function(barber) {
          return selectedBarbers.includes(barber.id);
        });
        if (!hasBarber) return false;
      }
      
      // Service filter
      if (selectedServices.length > 0) {
        var hasService = event.services.some(function(service) {
          return selectedServices.includes(service.type);
        });
        if (!hasService) return false;
      }
      
      return true;
    });
    
    // Update calendar with filtered data
    $('#calendar').fullCalendar('removeEvents');
    $('#calendar').fullCalendar('addEventSource', filteredData);
    $('#calendar').fullCalendar('rerenderEvents');
    
    // Update summary statistics
    updateSummaryStats();
    
    // Update charts
    updateCharts();
  }
  
  // Update summary statistics based on filtered data
  function updateSummaryStats() {
    var today = moment();
    var thisWeekStart = moment().startOf('week');
    var thisMonthStart = moment().startOf('month');
    
    // Calculate totals
    var todayIncome = filteredData
      .filter(e => moment(e.start).isSame(today, 'day') && !e.rendering)
      .reduce((sum, e) => sum + e.total, 0);
    
    var weekIncome = filteredData
      .filter(e => moment(e.start).isSameOrAfter(thisWeekStart) && !e.rendering)
      .reduce((sum, e) => sum + e.total, 0);
    
    var monthIncome = filteredData
      .filter(e => moment(e.start).isSameOrAfter(thisMonthStart) && !e.rendering)
      .reduce((sum, e) => sum + e.total, 0);
    
    var avgDaily = monthIncome / moment().date();
    
    // Update UI
    $('.stat-card h3').eq(0).text('RM ' + todayIncome.toLocaleString());
    $('.stat-card h3').eq(1).text('RM ' + weekIncome.toLocaleString());
    $('.stat-card h3').eq(2).text('RM ' + monthIncome.toLocaleString());
    $('.stat-card h3').eq(3).text('RM ' + avgDaily.toFixed(0));
  }
  
  // Update charts with filtered data
  function updateCharts() {
    updateWeeklyTrendChart();
    updateServiceDistributionChart();
  }
  
  function updateWeeklyTrendChart() {
    var weekDays = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
    var thisWeekData = [];
    var lastWeekData = [];
    
    weekDays.forEach(function(day, index) {
      var thisWeekDay = moment().startOf('week').add(index, 'days');
      var lastWeekDay = moment().startOf('week').subtract(1, 'week').add(index, 'days');
      
      var thisWeekIncome = filteredData
        .filter(e => moment(e.start).isSame(thisWeekDay, 'day') && !e.rendering)
        .reduce((sum, e) => sum + e.total, 0);
      
      var lastWeekIncome = filteredData
        .filter(e => moment(e.start).isSame(lastWeekDay, 'day') && !e.rendering)
        .reduce((sum, e) => sum + e.total, 0);
      
      thisWeekData.push(thisWeekIncome);
      lastWeekData.push(lastWeekIncome);
    });
    
    // FIXED: Check if chart exists and has destroy method before calling it
    if (window.weeklyTrendChart && typeof window.weeklyTrendChart.destroy === 'function') {
      window.weeklyTrendChart.destroy();
    }
    
    var weeklyTrendCtx = document.getElementById('weeklyTrendChart');
    if (weeklyTrendCtx) {
      weeklyTrendCtx = weeklyTrendCtx.getContext('2d');
      window.weeklyTrendChart = new Chart(weeklyTrendCtx, {
        type: 'line',
        data: {
          labels: weekDays,
          datasets: [{
            label: 'This Week',
            data: thisWeekData,
            borderColor: 'rgba(75, 73, 172, 1)',
            backgroundColor: 'rgba(75, 73, 172, 0.1)',
            borderWidth: 2,
            fill: true
          }, {
            label: 'Last Week',
            data: lastWeekData,
            borderColor: 'rgba(255, 193, 0, 1)',
            backgroundColor: 'rgba(255, 193, 0, 0.1)',
            borderWidth: 2,
            fill: true,
            borderDash: [5, 5]
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            yAxes: [{
              ticks: {
                callback: function(value) {
                  return 'RM ' + value;
                }
              }
            }]
          },
          tooltips: {
            callbacks: {
              label: function(tooltipItem) {
                return tooltipItem.datasetIndex === 0 ? 
                  'This Week: RM ' + tooltipItem.yLabel :
                  'Last Week: RM ' + tooltipItem.yLabel;
              }
            }
          }
        }
      });
    }
  }
  
  function updateServiceDistributionChart() {
    var serviceData = {};
    
    filteredData.forEach(function(event) {
      if (!event.rendering) {
        event.services.forEach(function(service) {
          if (!serviceData[service.name]) {
            serviceData[service.name] = 0;
          }
          serviceData[service.name] += service.revenue;
        });
      }
    });
    
    var labels = Object.keys(serviceData);
    var data = Object.values(serviceData);
    var colors = [
      'rgba(75, 73, 172, 0.7)',
      'rgba(255, 193, 0, 0.7)',
      'rgba(125, 160, 250, 0.7)',
      'rgba(253, 126, 20, 0.7)',
      'rgba(27, 42, 78, 0.7)'
    ];
    
    // FIXED: Check if chart exists and has destroy method before calling it
    if (window.serviceDistributionChart && typeof window.serviceDistributionChart.destroy === 'function') {
      window.serviceDistributionChart.destroy();
    }
    
    var serviceDistCtx = document.getElementById('serviceDistributionChart');
    if (serviceDistCtx) {
      serviceDistCtx = serviceDistCtx.getContext('2d');
      window.serviceDistributionChart = new Chart(serviceDistCtx, {
        type: 'doughnut',
        data: {
          labels: labels,
          datasets: [{
            data: data,
            backgroundColor: colors.slice(0, labels.length),
            borderColor: colors.slice(0, labels.length).map(color => color.replace('0.7', '1')),
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          legend: {
            position: 'right',
          },
          tooltips: {
            callbacks: {
              label: function(tooltipItem, chartData) {
                var label = chartData.labels[tooltipItem.index] || '';
                var value = chartData.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                var total = chartData.datasets[tooltipItem.datasetIndex].data.reduce((a, b) => a + b, 0);
                var percentage = Math.round((value / total) * 100);
                return label + ': RM ' + value + ' (' + percentage + '%)';
              }
            }
          }
        }
      });
    }
  }
  
  // Quick select functionality
  $('#quickSelect').change(function() {
    var selection = $(this).val();
    var startDate = '';
    var endDate = '';
    
    switch(selection) {
      case 'today':
        startDate = endDate = moment().format('YYYY-MM-DD');
        break;
      case 'yesterday':
        startDate = endDate = moment().subtract(1, 'day').format('YYYY-MM-DD');
        break;
      case 'this_week':
        startDate = moment().startOf('week').format('YYYY-MM-DD');
        endDate = moment().endOf('week').format('YYYY-MM-DD');
        break;
      case 'last_week':
        startDate = moment().subtract(1, 'week').startOf('week').format('YYYY-MM-DD');
        endDate = moment().subtract(1, 'week').endOf('week').format('YYYY-MM-DD');
        break;
      case 'this_month':
        startDate = moment().startOf('month').format('YYYY-MM-DD');
        endDate = moment().endOf('month').format('YYYY-MM-DD');
        break;
      case 'last_month':
        startDate = moment().subtract(1, 'month').startOf('month').format('YYYY-MM-DD');
        endDate = moment().subtract(1, 'month').endOf('month').format('YYYY-MM-DD');
        break;
      case 'this_year':
        startDate = moment().startOf('year').format('YYYY-MM-DD');
        endDate = moment().endOf('year').format('YYYY-MM-DD');
        break;
    }
    
    if (startDate && endDate) {
      $('#startDate').val(startDate);
      $('#endDate').val(endDate);
    }
  });
  
  // Apply filters button
  $('#applyFiltersBtn').click(function() {
    applyFilters();
    
    // Show success message
    var successMessage = $('<div class="alert alert-success alert-dismissible fade show" role="alert">' +
      '<strong>Filters Applied!</strong> Calendar and statistics updated.' +
      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
      '<span aria-hidden="true">&times;</span></button></div>');
    
    $('.content-wrapper').prepend(successMessage);
    
    setTimeout(function() {
      successMessage.alert('close');
    }, 3000);
  });
  
  // Reset filters button
  $('#resetFiltersBtn').click(function() {
    // Clear all form fields
    $('#startDate, #endDate, #minAmount, #maxAmount').val('');
    $('#barberFilter, #serviceFilter, #statusFilter').val(null).trigger('change');
    $('#timePeriodFilter').val('daily');
    $('#quickSelect').val('');
    
    // Reset to all data
    filteredData = [...allIncomeData];
    $('#calendar').fullCalendar('removeEvents');
    $('#calendar').fullCalendar('addEventSource', filteredData);
    $('#calendar').fullCalendar('rerenderEvents');
    
    // Update summary and charts
    updateSummaryStats();
    updateCharts();
    
    // Show reset message
    var resetMessage = $('<div class="alert alert-info alert-dismissible fade show" role="alert">' +
      '<strong>Filters Reset!</strong> All data is now showing.' +
      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
      '<span aria-hidden="true">&times;</span></button></div>');
    
    $('.content-wrapper').prepend(resetMessage);
    
    setTimeout(function() {
      resetMessage.alert('close');
    }, 3000);
  });
  
  // Initialize calendar with income data
  calendar = $('#calendar').fullCalendar({
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
    events: filteredData,
    eventRender: function(event, element) {
      if(event.rendering === 'background') {
        element.find('.fc-content').html(
          '<div class="text-center"><strong>' + event.title + '</strong></div>'
        );
      } else {
        element.find('.fc-title').html(
          '<span class="income-badge">' + event.title + '</span>'
        );
        
        // Add tooltip on hover
        element.hover(function() {
          var tooltip = '<div class="income-tooltip">' +
                        '<strong>' + moment(event.start).format('MMMM Do YYYY') + '</strong><br>' +
                        'Services: ' + event.services.reduce((a, b) => a + b.count, 0) + '<br>' +
                        'Status: ' + event.status.charAt(0).toUpperCase() + event.status.slice(1) + '<br>' +
                        'Avg. per service: RM ' + (event.total / event.services.reduce((a, b) => a + b.count, 0)).toFixed(2) +
                        '</div>';
          $('body').append(tooltip);
          $(this).attr('title', ''); // Remove default title
        }, function() {
          $('.income-tooltip').remove();
        }).mousemove(function(e) {
          $('.income-tooltip').css({
            top: e.pageY + 10,
            left: e.pageX + 10
          });
        });
      }
    },
    eventClick: function(calEvent, jsEvent, view) {
      if(calEvent.rendering === 'background') return;
      
      // Populate modal with income data
      $('#modalTotalIncome').text('RM ' + calEvent.total.toLocaleString());
      $('#modalAvgIncome').text('RM ' + (calEvent.total / calEvent.services.reduce((a, b) => a + b.count, 0)).toFixed(2));
      
      // Populate service breakdown table
      var serviceHtml = '';
      calEvent.services.forEach(service => {
        var percentage = (service.revenue / calEvent.total * 100).toFixed(1);
        serviceHtml += '<tr>' +
                      '<td>' + service.name + '</td>' +
                      '<td>' + service.count + '</td>' +
                      '<td>RM ' + service.revenue + '</td>' +
                      '<td>' + percentage + '%</td>' +
                      '</tr>';
      });
      $('#serviceBreakdownBody').html(serviceHtml);
      
      // Create barber performance chart
      var barberCtx = document.getElementById('barberPerformanceChart');
      if (barberCtx) {
        barberCtx = barberCtx.getContext('2d');
        var barberLabels = calEvent.barbers.map(b => b.name);
        var barberData = calEvent.barbers.map(b => b.revenue);
        
        // FIXED: Check if chart exists and has destroy method before calling it
        if(window.barberPerformanceChart && typeof window.barberPerformanceChart.destroy === 'function') {
          window.barberPerformanceChart.destroy();
        }
        
        window.barberPerformanceChart = new Chart(barberCtx, {
          type: 'bar',
          data: {
            labels: barberLabels,
            datasets: [{
              label: 'Revenue (RM)',
              data: barberData,
              backgroundColor: [
                'rgba(75, 73, 172, 0.7)',
                'rgba(255, 193, 0, 0.7)',
                'rgba(125, 160, 250, 0.7)',
                'rgba(253, 126, 20, 0.7)'
              ],
              borderColor: [
                'rgba(75, 73, 172, 1)',
                'rgba(255, 193, 0, 1)',
                'rgba(125, 160, 250, 1)',
                'rgba(253, 126, 20, 1)'
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            }
          }
        });
      }
      
      // Show modal
      $('#incomeModal').modal('show');
    },
    dayRender: function(date, cell) {
      // Add daily totals to each day
      var dayIncome = filteredData.filter(e => 
        e.start.isSame(date, 'day') && !e.rendering
      ).reduce((sum, e) => sum + e.total, 0);
      
      if(dayIncome > 0) {
        cell.append('<div class="text-center mt-1"><small class="text-muted">RM ' + dayIncome + '</small></div>');
      }
    }
  });
  
  // Initialize charts after DOM is ready
  setTimeout(function() {
    updateWeeklyTrendChart();
    updateServiceDistributionChart();
  }, 100);
  
  // Export report button
  $('#exportReportBtn').click(function() {
    var filteredTotal = filteredData
      .filter(e => !e.rendering)
      .reduce((sum, e) => sum + e.total, 0);
    
    var reportData = {
      dateRange: {
        start: $('#startDate').val() || 'All dates',
        end: $('#endDate').val() || 'All dates'
      },
      filters: {
        barbers: $('#barberFilter').val(),
        services: $('#serviceFilter').val(),
        statuses: $('#statusFilter').val(),
        amountRange: {
          min: $('#minAmount').val() || 0,
          max: $('#maxAmount').val() || 'No limit'
        }
      },
      summary: {
        totalIncome: filteredTotal,
        totalEvents: filteredData.filter(e => !e.rendering).length
      }
    };
    
    console.log('Export Report Data:', reportData);
    alert('Export functionality would generate a report with the current filters.\nTotal Income: RM ' + 
          filteredTotal.toLocaleString() + '\nTotal Events: ' + reportData.summary.totalEvents);
  });
  
  // Auto-apply filters when quick select changes
  $('#quickSelect').change(function() {
    if ($(this).val()) {
      setTimeout(function() {
        applyFilters();
      }, 100);
    }
  });
});
    </script>
  </body>
</html>