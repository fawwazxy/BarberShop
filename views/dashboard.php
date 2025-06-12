<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Barbershop Admin</title>
    <!-- base:css -->
    <link rel="stylesheet" href="../vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <!-- endinject --> 
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../images/favicon.png" />
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
            <!-- <li class="nav-item d-none d-lg-flex  mr-2">
              <a class="nav-link" href="#">
                Help
              </a>
            </li> -->
            <li class="nav-item dropdown d-flex">
              <!-- <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                <i class="typcn typcn-message-typing"></i>
                <span class="count bg-success">5</span>
              </a> -->
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-normal">John Smith
                    </h6>
                    <p class="font-weight-light small-text mb-0">
                      Rescheduling appointment
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-normal">Mike Johnson
                    </h6>
                    <p class="font-weight-light small-text mb-0">
                      New appointment request
                    </p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown  d-flex">
              <!-- <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="typcn typcn-bell mr-0"></i>
                <span class="count bg-danger">3</span>
              </a> -->
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="typcn typcn-calendar mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">New Appointment</h6>
                    <p class="font-weight-light small-text mb-0">
                      10 minutes ago
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="typcn typcn-user mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal">New Customer</h6>
                    <p class="font-weight-light small-text mb-0">
                      1 hour ago
                    </p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle  pl-0 pr-0" href="#" data-toggle="dropdown" id="profileDropdown">
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
        <?php
        include "../components/sidebar.php"
        ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0 font-weight-bold">Barbershop Dashboard</h3>
                <p>Last updated: 1 hour ago</p>
              </div>
              <div class="col-sm-6">
                <div class="d-flex align-items-center justify-content-md-end">
                  <div class="mb-3 mb-xl-0 pr-1">
                      <div class="dropdown">
                        <button class="btn bg-white btn-sm dropdown-toggle btn-icon-text border mr-2" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="typcn typcn-calendar-outline mr-2"></i>Today
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3" data-x-placement="top-start">
                          <h6 class="dropdown-header">Last 7 days</h6>
                          <a class="dropdown-item" href="#">This Month</a>
                          <a class="dropdown-item" href="#">Last Month</a>
                        </div>
                      </div>
                  </div>
                  <div class="pr-1 mb-3 mr-2 mb-xl-0">
                    <button type="button" class="btn btn-sm bg-white btn-icon-text border"><i class="typcn typcn-arrow-forward-outline mr-2"></i>Export</button>
                  </div>
                  <div class="pr-1 mb-3 mb-xl-0">
                    <button type="button" class="btn btn-sm bg-white btn-icon-text border"><i class="typcn typcn-info-large-outline mr-2"></i>Reports</button>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Updated Row 1 - Appointment Overview -->
            <div class="row  mt-3">
              <div class="col-xl-5 d-flex grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-between">
                      <h4 class="card-title mb-3">Appointments by Service</h4>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <canvas id="serviceDistributionChart"></canvas>
                          </div>
                          <div class="col-lg-6">
                            <ul class="session-by-channel-legend">
                              <li>
                                <div>Haircut</div>
                                <div>42 (35%)</div>
                              </li>
                              <li>
                                <div>Shave</div>
                                <div>28 (23%)</div>
                              </li>
                              <li>
                                <div>Beard Trim</div>
                                <div>22 (18%)</div>
                              </li>
                              <li>
                                <div>Hair Color</div>
                                <div>15 (13%)</div>
                              </li>
                              <li>
                                <div>Other</div>
                                <div>12 (10%)</div>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 d-flex grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-between">
                      <h4 class="card-title mb-3">Daily Appointments</h4>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="row">
                          <div class="col-sm-12">
                            <canvas id="dailyAppointmentsChart"></canvas>
                            <div class="d-flex justify-content-between mt-3">
                              <div class="text-success">Completed: 8</div>
                              <div class="text-warning">Pending: 3</div>
                              <div class="text-danger">Cancelled: 1</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 d-flex grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-between">
                      <h4 class="card-title mb-3">Barber Stats</h4>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="d-flex justify-content-between mb-4">
                              <div>Total Appointments</div>
                              <div class="text-muted">127</div>
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                              <div>Most Popular Service</div>
                              <div class="text-muted">Classic Cut</div>
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                              <div>Average Service Time</div>
                              <div class="text-muted">35 mins</div>
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                              <div>Customer Satisfaction</div>
                              <div class="text-muted">4.8/5</div>
                            </div>
                            <div class="progress progress-md mt-4">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small class="text-muted">Monthly capacity utilization</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Updated Row 2 - Barbers Performance -->
            <div class="row">
              <div class="col-xl-3 d-flex grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-between">
                      <h4 class="card-title mb-3">Top Barbers</h4>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="d-flex justify-content-between mb-4">
                              <div class="font-weight-medium">Barber Name</div>
                              <div class="font-weight-medium">Appointments</div>
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                              <div class="text-secondary font-weight-medium">Tony Styles</div>
                              <div class="small">48</div>
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                              <div class="text-secondary font-weight-medium">Mike Clipper</div>
                              <div class="small">42</div>
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                              <div class="text-secondary font-weight-medium">Eddie Razor</div>
                              <div class="small">38</div>
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                              <div class="text-secondary font-weight-medium">Carl Fade</div>
                              <div class="small">35</div>
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                              <div class="text-secondary font-weight-medium">Sam Shears</div>
                              <div class="small">32</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 d-flex grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-between">
                      <h4 class="card-title mb-3">Weekly Appointments</h4>
                      <button type="button" class="btn btn-sm btn-light">This Week</button>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="d-md-flex mb-4">
                          <div class="mr-md-5 mb-4">
                            <h5 class="mb-1"><i class="typcn typcn-user mr-1"></i>New Clients</h5>
                            <h2 class="text-primary mb-1 font-weight-bold">23</h2>
                          </div>
                          <div class="mr-md-5 mb-4">
                            <h5 class="mb-1"><i class="typcn typcn-group mr-1"></i>Returning</h5>
                            <h2 class="text-secondary mb-1 font-weight-bold">42</h2>
                          </div>
                          <div class="mr-md-5 mb-4">
                            <h5 class="mb-1"><i class="typcn typcn-star mr-1"></i>VIP</h5>
                            <h2 class="text-warning mb-1 font-weight-bold">8</h2>
                          </div>
                        </div>
                        <canvas id="weeklyAppointmentsChart"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 d-flex grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-between">
                      <h4 class="card-title mb-3">Revenue Summary</h4>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="mb-5">
                          <div class="mr-1">
                            <div class="text-info mb-1">
                              Total Revenue
                            </div>
                            <h2 class="mb-2 mt-2 font-weight-bold">$8,493</h2>
                            <div class="font-weight-bold text-success">
                              12.4% Since Last Week
                            </div>
                          </div>
                          <hr>
                          <div class="mr-1">
                            <div class="text-info mb-1">
                              Average per Appointment
                            </div>
                            <h2 class="mb-2 mt-2 font-weight-bold">$42</h2>
                            <div class="font-weight-bold text-success">
                              5.3% Since Last Month
                            </div>
                          </div>
                        </div>
                        <canvas id="revenueChart"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Updated Row 3 - Customer Analytics -->
            <div class="row">
              <div class="col-lg-12 d-flex grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-between">
                      <h4 class="card-title mb-3">Customer Analytics</h4>
                    </div>
                    <div class="row">
                      <div class="col-lg-9">
                        <div class="d-sm-flex justify-content-between">
                          <div class="dropdown">
                            <button class="btn bg-white btn-sm dropdown-toggle btn-icon-text pl-0" type="button" id="dropdownMenuSizeButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Last 7 Days
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton4" data-x-placement="top-start">
                              <h6 class="dropdown-header">Last 14 Days</h6>
                              <a class="dropdown-item" href="#">Last 30 Days</a>
                              <a class="dropdown-item" href="#">This Month</a>
                            </div>
                          </div>
                          <div>
                            <button type="button" class="btn btn-sm btn-light mr-2">Day</button>
                            <button type="button" class="btn btn-sm btn-light mr-2">Week</button>
                            <button type="button" class="btn btn-sm btn-light">Month</button>
                          </div>
                        </div>
                        <div class="chart-container mt-4">
                          <canvas id="customerAnalyticsChart"></canvas>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div>
                          <div class="d-flex justify-content-between mb-3">
                            <div class="text-success font-weight-bold">New Customers</div>
                          </div>
                          <div class="d-flex justify-content-between mb-3">
                            <div class="font-weight-medium">Today</div>
                            <div class="text-muted">5</div>
                          </div>
                          <div class="d-flex justify-content-between mb-3">
                            <div class="font-weight-medium">This Week</div>
                            <div class="text-muted">23</div>
                          </div>
                          <div class="d-flex justify-content-between mb-3">
                            <div class="font-weight-medium">This Month</div>
                            <div class="text-muted">87</div>
                          </div>
                          <div class="d-flex justify-content-between mb-3">
                            <div class="font-weight-medium">Avg. Rating</div>
                            <div class="text-muted">4.7/5</div>
                          </div>
                        </div>
                        <hr>
                        <div class="mt-4">
                          <div class="d-flex justify-content-between mb-3">
                            <div class="text-success font-weight-bold">Returning Customers</div>
                          </div>
                          <div class="d-flex justify-content-between mb-3">
                            <div class="font-weight-medium">Today</div>
                            <div class="text-muted">12</div>
                          </div>
                          <div class="d-flex justify-content-between mb-3">
                            <div class="font-weight-medium">This Week</div>
                            <div class="text-muted">58</div>
                          </div>
                          <div class="d-flex justify-content-between mb-3">
                            <div class="font-weight-medium">This Month</div>
                            <div class="text-muted">214</div>
                          </div>
                          <div class="d-flex justify-content-between">
                            <div class="font-weight-medium">Avg. Visits</div>
                            <div class="text-muted">3.2</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Updated Row 4 - Service Analysis -->
            <div class="row">
              <div class="col-lg-4 d-flex grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-between">
                      <h4 class="card-title mb-3">Service Popularity</h4>
                    </div>
                    <div class="mt-2">
                      <div class="d-flex justify-content-between">
                        <small>Haircut</small>
                        <small>42.5%</small>
                      </div>
                      <div class="progress progress-md mt-2">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 42.5%" aria-valuenow="42.5" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="mt-4">
                      <div class="d-flex justify-content-between">
                        <small>Beard Trim</small>
                        <small>23.2%</small>
                      </div>
                      <div class="progress progress-md mt-2">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 23.2%" aria-valuenow="23.2" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="mt-4 mb-5">
                      <div class="d-flex justify-content-between">
                        <small>Shave</small>
                        <small>18.3%</small>
                      </div>
                      <div class="progress progress-md mt-2">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 18.3%" aria-valuenow="18.3" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <canvas id="serviceTrendChart"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg-8 d-flex grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-between">
                      <h4 class="card-title mb-3">Today's Appointments</h4>
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Customer</th>
                            <th>Service</th>
                            <th>Time</th>
                            <th>Barber</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="d-flex">
                                <img class="img-sm rounded-circle mb-md-0 mr-2" src="images/faces/face1.jpg" alt="profile image">
                                <div>
                                  <div>John Smith</div>
                                  <div class="font-weight-bold mt-1">VIP</div>
                                </div>
                              </div>
                            </td>
                            <td>
                              Classic Cut
                            </td>
                            <td>
                              10:00 AM
                            </td>
                            <td>
                              Tony
                            </td>
                            <td>
                              <div class="badge badge-success">Completed</div>
                            </td>
                            <td>
                              <button type="button" class="btn btn-sm btn-secondary">Details</button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex">
                                <img class="img-sm rounded-circle mb-md-0 mr-2" src="images/faces/face2.jpg" alt="profile image">
                                <div>
                                  <div>Mike Johnson</div>
                                  <div class="font-weight-bold mt-1">New</div>
                                </div>
                              </div>
                            </td>
                            <td>
                              Beard Trim
                            </td>
                            <td>
                              11:30 AM
                            </td>
                            <td>
                              Carl
                            </td>
                            <td>
                              <div class="badge badge-warning">In Progress</div>
                            </td>
                            <td>
                              <button type="button" class="btn btn-sm btn-secondary">Details</button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex">
                                <img class="img-sm rounded-circle mb-md-0 mr-2" src="images/faces/face3.jpg" alt="profile image">
                                <div>
                                  <div>David Wilson</div>
                                  <div class="font-weight-bold mt-1">Regular</div>
                                </div>
                              </div>
                            </td>
                            <td>
                              Haircut & Shave
                            </td>
                            <td>
                              1:00 PM
                            </td>
                            <td>
                              Eddie
                            </td>
                            <td>
                              <div class="badge badge-primary">Upcoming</div>
                            </td>
                            <td>
                              <button type="button" class="btn btn-sm btn-secondary">Details</button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex">
                                <img class="img-sm rounded-circle mb-md-0 mr-2" src="images/faces/face4.jpg" alt="profile image">
                                <div>
                                  <div>Robert Brown</div>
                                  <div class="font-weight-bold mt-1">VIP</div>
                                </div>
                              </div>
                            </td>
                            <td>
                              Premium Package
                            </td>
                            <td>
                              2:30 PM
                            </td>
                            <td>
                              Tony
                            </td>
                            <td>
                              <div class="badge badge-primary">Upcoming</div>
                            </td>
                            <td>
                              <button type="button" class="btn btn-sm btn-secondary">Details</button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex">
                                <img class="img-sm rounded-circle mb-md-0 mr-2" src="images/faces/face5.jpg" alt="profile image">
                                <div>
                                  <div>James Davis</div>
                                  <div class="font-weight-bold mt-1">Regular</div>
                                </div>
                              </div>
                            </td>
                            <td>
                              Quick Cut
                            </td>
                            <td>
                              4:00 PM
                            </td>
                            <td>
                              Mike
                            </td>
                            <td>
                              <div class="badge badge-primary">Upcoming</div>
                            </td>
                            <td>
                              <button type="button" class="btn btn-sm btn-secondary">Details</button>
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
          <!-- content-wrapper ends -->
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
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="../js/off-canvas.js"></script>
    <script src="../js/hoverable-collapse.js"></script>
    <script src="../js/template.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/todolist.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="../vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="../js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Barbershop-specific chart configurations
        document.addEventListener('DOMContentLoaded', function() {
            // Service Distribution Chart (Doughnut)
            var serviceCtx = document.getElementById('serviceDistributionChart').getContext('2d');
            var serviceChart = new Chart(serviceCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Haircut', 'Shave', 'Beard Trim', 'Hair Color', 'Other'],
                    datasets: [{
                        data: [42, 28, 22, 15, 12],
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
                    cutout: '70%', // Fixed: was cutoutPercentage
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // Daily Appointments Chart (Bar)
            var dailyCtx = document.getElementById('dailyAppointmentsChart').getContext('2d');
            var dailyChart = new Chart(dailyCtx, {
                type: 'bar',
                data: {
                    labels: ['9AM', '10AM', '11AM', '12PM', '1PM', '2PM', '3PM', '4PM', '5PM'],
                    datasets: [{
                        label: 'Appointments',
                        data: [2, 3, 1, 2, 1, 3, 2, 1, 0],
                        backgroundColor: '#4B49AC'
                    }]
                },
                options: {
                    scales: {
                        y: { // Fixed: was yAxes
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // Weekly Appointments Chart (Line)
            var weeklyCtx = document.getElementById('weeklyAppointmentsChart').getContext('2d');
            var weeklyChart = new Chart(weeklyCtx, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Appointments',
                        data: [12, 15, 10, 14, 18, 22, 8],
                        borderColor: '#4B49AC',
                        backgroundColor: 'rgba(75, 73, 172, 0.1)',
                        borderWidth: 2,
                        fill: true
                    }]
                },
                options: {
                    scales: {
                        y: { // Fixed: was yAxes
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // Revenue Chart (Bar)
            var revenueCtx = document.getElementById('revenueChart').getContext('2d');
            var revenueChart = new Chart(revenueCtx, {
                type: 'bar',
                data: {
                    labels: ['Haircut', 'Shave', 'Beard', 'Color', 'Other'],
                    datasets: [{
                        label: 'Revenue',
                        data: [3200, 1400, 1800, 900, 600],
                        backgroundColor: [
                            '#4B49AC',
                            '#FFC100',
                            '#7DA0FA',
                            '#FD7E14',
                            '#1B2A4E'
                        ]
                    }]
                },
                options: {
                    scales: {
                        y: { // Fixed: was yAxes
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '$' + value;
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // Customer Analytics Chart (Line)
            var customerCtx = document.getElementById('customerAnalyticsChart').getContext('2d');
            var customerChart = new Chart(customerCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    datasets: [{
                        label: 'New Customers',
                        data: [45, 52, 60, 55, 70, 65, 75],
                        borderColor: '#4B49AC',
                        backgroundColor: 'transparent',
                        borderWidth: 2
                    },
                    {
                        label: 'Returning Customers',
                        data: [120, 115, 130, 125, 140, 135, 150],
                        borderColor: '#FFC100',
                        backgroundColor: 'transparent',
                        borderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        y: { // Fixed: was yAxes
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
      
    