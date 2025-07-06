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
    <title>Barbershop Feedback</title>
    <!-- base:css -->
    <link rel="stylesheet" href="../vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <!-- endinject --> 
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../images/favicon.png" />
    <style>
      .feedback-card {
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
      }
      .feedback-card.hidden {
        display: none;
      }
      .feedback-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
        border-bottom: 1px solid #eee;
      }
      .feedback-body {
        padding: 20px;
      }
      .customer-info {
        display: flex;
        align-items: center;
      }
      .customer-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 15px;
        object-fit: cover;
      }
      .customer-name {
        font-weight: 600;
        margin-bottom: 3px;
      }
      .appointment-info {
        font-size: 0.85em;
        color: #666;
      }
      .rating {
        color: #FFC100;
        font-size: 1.2em;
      }
      .feedback-text {
        margin-top: 15px;
        line-height: 1.6;
      }
      .empty-feedback {
        text-align: center;
        padding: 50px 20px;
        color: #666;
      }
      .empty-feedback i {
        font-size: 3em;
        margin-bottom: 15px;
        color: #ddd;
      }
      .filter-controls {
        margin-bottom: 25px;
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
              <a class="nav-link" href="index.html">
                <i class="typcn typcn-chart-bar-outline mr-1"></i> Dashboard
              </a>
            </li>
            <li class="nav-item  d-none d-lg-flex">
              <a class="nav-link active" href="#">
                <i class="typcn typcn-messages mr-1"></i> Feedback
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
                    <h6 class="preview-subject font-weight-normal">New Feedback</h6>
                    <p class="font-weight-light small-text mb-0">
                      John Smith left a 5-star review
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
                    <h6 class="preview-subject font-weight-normal">New Message</h6>
                    <p class="font-weight-light small-text mb-0">
                      Customer inquiry about services
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
                  <h3 class="font-weight-bold mb-0">Customer Feedback</h3>
                  <div>
                    
                  </div>
                </div>
                
                <div class="filter-controls card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Filter by Rating</label>
                          <select class="form-control" id="ratingFilter">
                            <option value="all">All Ratings</option>
                            <option value="5">5 Stars</option>
                            <option value="4">4 Stars</option>
                            <option value="3">3 Stars</option>
                            <option value="2">2 Stars</option>
                            <option value="1">1 Star</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Filter by Barber</label>
                          <select class="form-control" id="barberFilter">
                            <option value="all">All Barbers</option>
                            <option value="tony">Tony Styles</option>
                            <option value="mike">Mike Clipper</option>
                            <option value="eddie">Eddie Razor</option>
                            <option value="carl">Carl Fade</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Filter by Date</label>
                          <input type="text" class="form-control datepicker" id="dateFilter" placeholder="Select date">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Search Customer</label>
                          <input type="text" class="form-control" id="customerSearch" placeholder="Customer name">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="card">
                  <div class="card-body" id="feedbackContainer">
                    <!-- Feedback items will be dynamically filtered here -->
                    <div class="feedback-card" data-rating="5" data-barber="tony" data-date="2023-05-15" data-customer="John Smith">
                      <div class="feedback-header">
                        <div class="customer-info">
                          <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Customer" class="customer-avatar">
                          <div>
                            <div class="customer-name">John Smith</div>
                            <div class="appointment-info">
                              Haircut with Tony Styles • May 15, 2023
                            </div>
                          </div>
                        </div>
                        <div class="rating">
                          <i class="typcn typcn-star-full-outline"></i>
                          <i class="typcn typcn-star-full-outline"></i>
                          <i class="typcn typcn-star-full-outline"></i>
                          <i class="typcn typcn-star-full-outline"></i>
                          <i class="typcn typcn-star-full-outline"></i>
                        </div>
                      </div>
                      <div class="feedback-body">
                        <div class="feedback-text">
                          Tony did an amazing job with my haircut! I've been coming here for years and the service is always top-notch. The shop is clean, the staff is friendly, and I always leave looking and feeling great. Highly recommend!
                        </div>
                      </div>
                    </div>
                    
                    <div class="feedback-card" data-rating="4" data-barber="carl" data-date="2023-05-14" data-customer="Michael Johnson">
                      <div class="feedback-header">
                        <div class="customer-info">
                          <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Customer" class="customer-avatar">
                          <div>
                            <div class="customer-name">Michael Johnson</div>
                            <div class="appointment-info">
                              Beard Trim with Carl Fade • May 14, 2023
                            </div>
                          </div>
                        </div>
                        <div class="rating">
                          <i class="typcn typcn-star-full-outline"></i>
                          <i class="typcn typcn-star-full-outline"></i>
                          <i class="typcn typcn-star-full-outline"></i>
                          <i class="typcn typcn-star-full-outline"></i>
                          <i class="typcn typcn-star-outline"></i>
                        </div>
                      </div>
                      <div class="feedback-body">
                        <div class="feedback-text">
                          Good experience overall. Carl was professional and knew what he was doing. The only reason I'm not giving 5 stars is because I had to wait about 10 minutes past my appointment time. But the actual service was excellent.
                        </div>
                      </div>
                    </div>
                    
                    <div class="feedback-card" data-rating="3" data-barber="eddie" data-date="2023-05-12" data-customer="Sarah Williams">
                      <div class="feedback-header">
                        <div class="customer-info">
                          <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Customer" class="customer-avatar">
                          <div>
                            <div class="customer-name">Sarah Williams</div>
                            <div class="appointment-info">
                              Hair Color with Eddie Razor • May 12, 2023
                            </div>
                          </div>
                        </div>
                        <div class="rating">
                          <i class="typcn typcn-star-full-outline"></i>
                          <i class="typcn typcn-star-full-outline"></i>
                          <i class="typcn typcn-star-full-outline"></i>
                          <i class="typcn typcn-star-outline"></i>
                          <i class="typcn typcn-star-outline"></i>
                        </div>
                      </div>
                      <div class="feedback-body">
                        <div class="feedback-text">
                          The color came out a bit different than I expected - it's slightly darker than what I asked for. Eddie was very nice though and said he can adjust it next time I come in. The salon area is very clean and comfortable.
                        </div>
                      </div>
                    </div>
                    
                    <div class="feedback-card" data-rating="5" data-barber="tony" data-date="2023-05-10" data-customer="Robert Brown">
                      <div class="feedback-header">
                        <div class="customer-info">
                          <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Customer" class="customer-avatar">
                          <div>
                            <div class="customer-name">Robert Brown</div>
                            <div class="appointment-info">
                              Premium Package with Tony Styles • May 10, 2023
                            </div>
                          </div>
                        </div>
                        <div class="rating">
                          <i class="typcn typcn-star-full-outline"></i>
                          <i class="typcn typcn-star-full-outline"></i>
                          <i class="typcn typcn-star-full-outline"></i>
                          <i class="typcn typcn-star-full-outline"></i>
                          <i class="typcn typcn-star-full-outline"></i>
                        </div>
                      </div>
                      <div class="feedback-body">
                        <div class="feedback-text">
                          Absolutely worth every penny! The premium package includes haircut, hot towel shave, and facial treatment. Tony is a true artist - my haircut is perfect and the shave was the closest I've ever had. The complimentary whiskey while you wait is a nice touch too. 10/10 would recommend!
                        </div>
                      </div>
                    </div>
                    
                    <div class="feedback-card" data-rating="2" data-barber="mike" data-date="2023-05-08" data-customer="David Wilson">
                      <div class="feedback-header">
                        <div class="customer-info">
                          <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Customer" class="customer-avatar">
                          <div>
                            <div class="customer-name">David Wilson</div>
                            <div class="appointment-info">
                              Shave with Mike Clipper • May 8, 2023
                            </div>
                          </div>
                        </div>
                        <div class="rating">
                          <i class="typcn typcn-star-full-outline"></i>
                          <i class="typcn typcn-star-full-outline"></i>
                          <i class="typcn typcn-star-outline"></i>
                          <i class="typcn typcn-star-outline"></i>
                          <i class="typcn typcn-star-outline"></i>
                        </div>
                      </div>
                      <div class="feedback-body">
                        <div class="feedback-text">
                          Unfortunately not a great experience. The shave was rushed and I got several nicks. Mike seemed distracted and not very attentive. I've had better shaves at other barbershops. Probably won't return.
                        </div>
                      </div>
                    </div>
                    
                    <div class="feedback-card" data-rating="1" data-barber="eddie" data-date="2023-05-05" data-customer="James Taylor">
                      <div class="feedback-header">
                        <div class="customer-info">
                          <img src="https://randomuser.me/api/portraits/men/89.jpg" alt="Customer" class="customer-avatar">
                          <div>
                            <div class="customer-name">James Taylor</div>
                            <div class="appointment-info">
                              Haircut with Eddie Razor • May 5, 2023
                            </div>
                          </div>
                        </div>
                        <div class="rating">
                          <i class="typcn typcn-star-full-outline"></i>
                          <i class="typcn typcn-star-outline"></i>
                          <i class="typcn typcn-star-outline"></i>
                          <i class="typcn typcn-star-outline"></i>
                          <i class="typcn typcn-star-outline"></i>
                        </div>
                      </div>
                      <div class="feedback-body">
                        <div class="feedback-text">
                          Terrible experience. Eddie completely misunderstood what I asked for and gave me a completely different haircut than I wanted. When I tried to explain, he got defensive. I had to go to another barber to fix it the next day. Very disappointing.
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
        
        // Filter functionality
        function applyFilters() {
          const ratingFilter = $('#ratingFilter').val();
          const barberFilter = $('#barberFilter').val();
          const dateFilter = $('#dateFilter').val();
          const customerSearch = $('#customerSearch').val().toLowerCase();
          
          $('.feedback-card').each(function() {
            const card = $(this);
            const cardRating = card.data('rating');
            const cardBarber = card.data('barber');
            const cardDate = card.data('date');
            const cardCustomer = card.data('customer').toLowerCase();
            
            // Check if card matches all filters
            const ratingMatch = ratingFilter === 'all' || cardRating == ratingFilter;
            const barberMatch = barberFilter === 'all' || cardBarber === barberFilter;
            const dateMatch = !dateFilter || cardDate === dateFilter;
            const customerMatch = !customerSearch || cardCustomer.includes(customerSearch);
            
            if (ratingMatch && barberMatch && dateMatch && customerMatch) {
              card.removeClass('hidden');
            } else {
              card.addClass('hidden');
            }
          });
          
          // Show empty state if no feedback matches filters
          const visibleCards = $('.feedback-card:not(.hidden)').length;
          if (visibleCards === 0) {
            $('#feedbackContainer').append(`
              <div class="empty-feedback">
                <i class="typcn typcn-messages"></i>
                <h4>No Feedback Found</h4>
                <p>No feedback matches your current filters.</p>
              </div>
            `);
          } else {
            $('.empty-feedback').remove();
          }
        }
        
        // Apply filters when any filter changes
        $('#ratingFilter, #barberFilter, #dateFilter, #customerSearch').on('change keyup', function() {
          applyFilters();
        });
        
        // Initialize filters on page load
        applyFilters();
      });
    </script>
  </body>
</html>