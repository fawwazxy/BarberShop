<div class="header-area header-transparent pt-20">
    <div class="main-header header-sticky">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Logo -->
                <div class="col-xl-2 col-lg-2 col-md-1">
                    <div class="logo">
                        <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-10">
                    <div class="menu-main d-flex align-items-center justify-content-end">
                        <!-- Main-menu -->
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <?php
                                    // Get the current page filename
                                    $current_page = basename($_SERVER['PHP_SELF']);
                                    
                                    // Define navigation items
                                    $nav_items = [
                                        'index.php' => 'Home',
                                        'about.php' => 'About',
                                        'services.php' => 'Services',
                                        'portfolio.php' => 'Portfolio',
                                        'contact.php' => 'Contact'
                                    ];
                                    
                                    // Output navigation items
                                    foreach ($nav_items as $page => $title) {
                                        $active_class = ($current_page == $page) ? 'active' : '';
                                        echo '<li class="'.$active_class.'"><a href="'.$page.'">'.$title.'</a></li>';
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                <a href="./appointment.php" target="_blank" class="btn header-btn">MAKE APPOINTMENTS</a>
                        </div>
                    </div>
                </div>   
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
</div>