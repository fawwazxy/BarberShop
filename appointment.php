<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Book Appointment - Barber HTML-5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/animated-headline.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- Custom booking styles -->
    <style>
        /* Progress Bar Styles */
        .progress-wrapper {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.08);
            margin-bottom: 50px;
        }

        .progress-bar-custom {
            height: 4px;
            background: #e5e5e5;
            border-radius: 2px;
            overflow: hidden;
            margin-bottom: 40px;
        }

        .progress-fill {
            height: 100%;
            background: #c9a761;
            width: 20%;
            transition: width 0.5s ease;
        }

        .progress-steps {
            display: flex;
            justify-content: space-between;
        }

        .progress-step {
            text-align: center;
            position: relative;
        }

        .progress-step span {
            display: inline-block;
            width: 50px;
            height: 50px;
            background: #f1f1f1;
            color: #999;
            border-radius: 50%;
            line-height: 50px;
            font-weight: 600;
            transition: all 0.3s;
            font-size: 18px;
        }

        .progress-step.active span,
        .progress-step.completed span {
            background: #c9a761;
            color: #fff;
        }

        .progress-step .step-label {
            margin-top: 10px;
            font-size: 14px;
            color: #666;
            font-weight: 500;
        }

        /* Form Steps */
        .appointment-form {
            background: #fff;
            padding: 60px;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(0,0,0,0.08);
        }

        .form-step {
            display: none;
            animation: fadeIn 0.5s ease;
        }

        .form-step.active {
            display: block;
        }

        .form-step h3 {
            font-size: 36px;
            margin-bottom: 40px;
            color: #1a1a1a;
            font-family: 'Playfair Display', serif;
        }

        /* Service Cards - following the template's services-caption style */
        .service-select-card {
            background: #fff;
            border: 2px solid #f1f1f1;
            padding: 30px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.4s;
            position: relative;
            overflow: hidden;
            height: 100%;
            border-radius: 10px;
        }

        .service-select-card:hover {
            border-color: #c9a761;
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .service-select-card.selected {
            border-color: #c9a761;
            background: #faf8f5;
        }

        .service-select-card .service-icon {
            font-size: 50px;
            color: #c9a761;
            margin-bottom: 20px;
            transition: transform 0.3s;
        }

        .service-select-card:hover .service-icon {
            transform: scale(1.1);
        }

        .service-select-card h4 {
            font-size: 22px;
            margin-bottom: 15px;
            color: #1a1a1a;
        }

        .service-select-card p {
            color: #666;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .service-price {
            font-size: 30px;
            color: #c9a761;
            font-weight: 700;
            display: block;
        }

        .service-duration {
            color: #999;
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }

        /* Barber Cards - following the template's single-team style */
        .barber-select-card {
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            height: 100%;
            border: 2px solid transparent;
        }

        .barber-select-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .barber-select-card.selected {
            box-shadow: 0 10px 30px rgba(201, 167, 97, 0.3);
            border-color: #c9a761;
        }

        .barber-img-wrapper {
            height: 280px;
            background: #f5f5f5;
            position: relative;
            overflow: hidden;
        }

        .barber-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .barber-select-card:hover .barber-img-wrapper img {
            transform: scale(1.1);
        }

        .barber-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #c9a761;
            color: #fff;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .barber-info {
            padding: 30px;
        }

        .barber-info h4 {
            font-size: 24px;
            margin-bottom: 5px;
            color: #1a1a1a;
        }

        .barber-specialty {
            color: #c9a761;
            font-size: 14px;
            font-style: italic;
            margin-bottom: 15px;
        }

        .barber-rating {
            color: #f39c12;
            margin-bottom: 15px;
        }

        .barber-rating i {
            font-size: 14px;
        }

        .barber-bio {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
        }

        /* Date & Time Selection */
        .date-picker-container {
            position: relative;
            margin-bottom: 30px;
        }

        .date-picker-container input {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e5e5e5;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
            background: #fff;
        }

        .date-picker-container input:focus {
            outline: none;
            border-color: #c9a761;
        }

a, button {
    color: black;
    outline: medium none;
}

        .date-picker-container i {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #c9a761;
            pointer-events: none;
        }

        .time-slots {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        .time-slot {
            padding: 15px;
            border: 2px solid #e5e5e5;
            background: #fff;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 500;
            border-radius: 5px;
            font-size: 16px;
        }

        .time-slot:hover:not(.booked) {
            border-color: #c9a761;
            color: #c9a761;
        }

        .time-slot.selected {
            background: #c9a761;
            color: #fff;
            border-color: #c9a761;
        }

        .time-slot.booked {
            background: #f5f5f5;
            color: #999;
            cursor: not-allowed;
            text-decoration: line-through;
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            color: #333;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-control {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e5e5e5;
            border-radius: 5px;
            font-size: 16px;
            transition: all 0.3s;
            background: #fff;
        }

        .form-control:focus {
            outline: none;
            border-color: #c9a761;
            background: #fafafa;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        /* Summary Card */
        .summary-card {
            background: #faf8f5;
            border: 2px solid #c9a761;
            border-radius: 10px;
            padding: 40px;
        }

        .summary-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #e5e5e5;
        }

        .summary-header h4 {
            font-size: 28px;
            margin: 0;
        }

        .badge {
            background: #28a745;
            color: #fff;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge.pending {
            background: #ffc107;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #e5e5e5;
        }

        .summary-item:last-child {
            border-bottom: none;
            padding-top: 20px;
        }

        .summary-item .label {
            font-weight: 600;
            color: #333;
        }

        .summary-item .value {
            color: #666;
        }

        .summary-item.total {
            font-size: 20px;
        }

        .summary-item.total .value {
            color: #c9a761;
            font-weight: 700;
        }

        /* Confirmation */
        .checkmark {
            width: 100px;
            height: 100px;
            margin: 0 auto 30px;
            background: #28a745;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: scaleIn 0.5s ease;
        }

        .checkmark i {
            font-size: 50px;
            color: #fff;
            animation: fadeIn 0.5s ease 0.3s both;
        }

        /* Navigation Buttons */
        .btn-navigation {
            margin-top: 30px;
        }

        .prev-step {
            background: #6c757d;
            border-color: #6c757d;
            margin-right: 15px;
        }

        .prev-step:hover {
            background: transparent;
            color: #6c757d;
        }

        /* Payment Options */
        .payment-options {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .payment-option {
            width: 200px;
            padding: 30px;
            border: 2px solid #e5e5e5;
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            background: #fff;
        }

        .payment-option:hover {
            border-color: #c9a761;
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .payment-option.selected {
            border-color: #c9a761;
            background: #faf8f5;
        }

        .payment-option i {
            font-size: 40px;
            color: #c9a761;
            margin-bottom: 20px;
            display: block;
        }

        .payment-option h4 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #1a1a1a;
        }

        .payment-option p {
            color: #666;
            font-size: 14px;
        }

        .qr-code-container {
            text-align: center;
            margin-top: 30px;
            display: none;
        }

        .qr-code-container img {
            max-width: 200px;
            margin-bottom: 20px;
            border: 1px solid #e5e5e5;
            padding: 10px;
            background: #fff;
        }

        .payment-instructions {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
            display: none;
        }

        .cash-instructions {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
            display: none;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes scaleIn {
            from { transform: scale(0); }
            to { transform: scale(1); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .appointment-form {
                padding: 30px 20px;
            }

            .time-slots {
                grid-template-columns: repeat(2, 1fr);
            }

            .payment-options {
                flex-direction: column;
                align-items: center;
            }
        }

         /* Fix for barber section visibility */
    #step2 .row {
        display: flex !important;
        flex-wrap: wrap;
    }
    
    #step2 .col-xl-4,
    #step2 .col-lg-4,
    #step2 .col-md-6,
    #step2 .col-sm-6 {
        display: block !important;
        opacity: 1 !important;
        visibility: visible !important;
    }
    
    /* Remove any owl carousel styles that might hide content */
    .team-active.owl-carousel .owl-stage-outer,
    .team-active.owl-carousel .owl-stage,
    .team-active.owl-carousel .owl-item {
        display: block !important;
        width: auto !important;
        height: auto !important;
    }
    </style>
</head>
<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
        <header>
        <?php
        include "./nav.php"
        ?>
    </header>
    <main>
        <!--? Hero Start -->
        <div class="slider-area2">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 text-center">
                                <h2>Book Your Appointment</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        
        <!--? Appointment Area Start -->
        <section class="service-area section-padding30">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-11 col-sm-11">
                        <div class="section-tittle text-center mb-90">
                            <span>reserve your spot</span>
                            <h2>Book Your Appointment Today</h2>
                        </div>
                    </div>
                </div>
                
                <!-- Progress Bar -->
                <div class="progress-wrapper">
                    <div class="progress-bar-custom">
                        <div class="progress-fill" id="progressBar"></div>
                    </div>
                    <div class="progress-steps">
                        <div class="progress-step active" id="progressStep1">
                            <span>1</span>
                            <div class="step-label">Service</div>
                        </div>
                        <div class="progress-step" id="progressStep2">
                            <span>2</span>
                            <div class="step-label">Barber</div>
                        </div>
                        <div class="progress-step" id="progressStep3">
                            <span>3</span>
                            <div class="step-label">Date/Time</div>
                        </div>
                        <div class="progress-step" id="progressStep4">
                            <span>4</span>
                            <div class="step-label">Details</div>
                        </div>
                        <div class="progress-step" id="progressStep5">
                            <span>5</span>
                            <div class="step-label">Payment</div>
                        </div>
                        <div class="progress-step" id="progressStep6">
                            <span>6</span>
                            <div class="step-label">Confirm</div>
                        </div>
                    </div>
                </div>
                
                <!-- Appointment Form -->
                <div class="appointment-form">
                    <form id="appointmentForm">
                        <!-- Step 1: Select Service -->
                        <div class="form-step active" id="step1">
                            <h3>1. Select Your Service</h3>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                                    <div class="service-select-card" data-service="haircut" data-price="25" data-duration="30">
                                        <div class="service-icon">
                                            <i class="flaticon-healthcare-and-medical"></i>
                                        </div>
                                        <h4>Stylish Hair Cut</h4>
                                        <p>Professional hair cutting service with styling</p>
                                        <span class="service-price">RM25</span>
                                        <span class="service-duration">30 min</span>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                                    <div class="service-select-card" data-service="styling" data-price="25" data-duration="30">
                                        <div class="service-icon">
                                            <i class="flaticon-fitness"></i>
                                        </div>
                                        <h4>Styling</h4>
                                        <p>Expert hair styling and finishing</p>
                                        <span class="service-price">RM25</span>
                                        <span class="service-duration">30 min</span>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                                    <div class="service-select-card" data-service="shave" data-price="20" data-duration="25">
                                        <div class="service-icon">
                                            <i class="flaticon-clock"></i>
                                        </div>
                                        <h4>Shave</h4>
                                        <p>Classic straight razor shave with hot towel</p>
                                        <span class="service-price">RM20</span>
                                        <span class="service-duration">25 min</span>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                                    <div class="service-select-card" data-service="beard-trim" data-price="15" data-duration="20">
                                        <div class="service-icon">
                                            <i class="flaticon-healthcare-and-medical"></i>
                                        </div>
                                        <h4>Beard Style</h4>
                                        <p>Professional beard grooming & shaping</p>
                                        <span class="service-price">RM15</span>
                                        <span class="service-duration">20 min</span>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                                    <div class="service-select-card" data-service="cut-styling" data-price="63" data-duration="60">
                                        <div class="service-icon">
                                            <i class="flaticon-fitness"></i>
                                        </div>
                                        <h4>Cut + Styling</h4>
                                        <p>Complete hair makeover package</p>
                                        <span class="service-price">RM63</span>
                                        <span class="service-duration">60 min</span>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                                    <div class="service-select-card" data-service="color" data-price="65" data-duration="90">
                                        <div class="service-icon">
                                            <i class="flaticon-clock"></i>
                                        </div>
                                        <h4>Hair Color</h4>
                                        <p>Professional hair coloring service</p>
                                        <span class="service-price">RM65</span>
                                        <span class="service-duration">90 min</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center btn-navigation">
                                <button type="button" class="btn header-btn next-step" onclick="nextStep()">Next Step</button>
                            </div>
                        </div>

                    <!-- Step 2: Choose Barber -->
<div class="form-step" id="step2">
    <h3>2. Choose Your Barber</h3>
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
            <div class="barber-select-card" data-barber="Ahmad bin Ismail">
                <div class="barber-img-wrapper">
                    <img src="https://as1.ftcdn.net/v2/jpg/06/49/72/40/1000_F_649724078_jTrowyEQcL64ALY7TC0j6uBFRL1fxsUU.jpg" alt="Ahmad bin Ismail">
                    <div class="barber-badge">Master Barber</div>
                </div>
                <div class="barber-info">
                    <h4>Ahmad bin Ismail</h4>
                    <span class="barber-specialty">Master Barber</span>
                    <div class="barber-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span>4.8 (127)</span>
                    </div>
                    <p class="barber-bio">15 years of specialized experience in classic cuts and modern styles.</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
            <div class="barber-select-card" data-barber="Mohd Faizal Abdullah">
                <div class="barber-img-wrapper">
                    <img src="https://www.aipassportphotos.com/blog/wp-content/uploads/image-739.png" alt="Mohd Faizal Abdullah">
                    <div class="barber-badge">Color Expert</div>
                </div>
                <div class="barber-info">
                    <h4>Mohd Faizal Abdullah</h4>
                    <span class="barber-specialty">Color Expert</span>
                    <div class="barber-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span>5.0 (89)</span>
                    </div>
                    <p class="barber-bio">Specializes in color correction and creative coloring techniques.</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
            <div class="barber-select-card" data-barber="Syed Amirul bin Syed Hassan">
                <div class="barber-img-wrapper">
                    <img src="https://tse1.mm.bing.net/th/id/OIP.zuWM25NsyaoZdxRq56uemgHaHa?rs=1&pid=ImgDetMain" alt="Syed Amirul bin Syed Hassan">
                </div>
                <div class="barber-info">
                    <h4>Syed Amirul bin Syed Hassan</h4>
                    <span class="barber-specialty">Master Barber</span>
                    <div class="barber-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <span>4.2 (43)</span>
                    </div>
                    <p class="barber-bio">Expert in traditional barbering with a modern twist.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center btn-navigation">
        <button type="button" class="btn header-btn prev-step" onclick="prevStep()">Previous</button>
        <button type="button" class="btn header-btn next-step" onclick="nextStep()">Next Step</button>
    </div>
</div>
                        <!-- Step 3: Select Date & Time -->
                        <div class="form-step" id="step3">
                            <h3>3. Select Date & Time</h3>
                            <div class="row">
                                <div class="col-md-6 mb-30">
                                    <div class="form-group">
                                        <label>Select Date</label>
                                        <div class="date-picker-container">
                                            <input type="date" id="datepicker" class="form-control" min="" required>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-30">
                                    <div class="form-group">
                                        <label>Select Time</label>
                                        <div class="time-slots">
                                            <button type="button" class="time-slot" data-time="09:00">9:00 AM</button>
                                            <button type="button" class="time-slot" data-time="09:30">9:30 AM</button>
                                            <button type="button" class="time-slot" data-time="10:00">10:00 AM</button>
                                            <button type="button" class="time-slot booked" data-time="10:30">10:30 AM</button>
                                            <button type="button" class="time-slot" data-time="11:00">11:00 AM</button>
                                            <button type="button" class="time-slot booked" data-time="11:30">11:30 AM</button>
                                            <button type="button" class="time-slot" data-time="14:00">2:00 PM</button>
                                            <button type="button" class="time-slot" data-time="14:30">2:30 PM</button>
                                            <button type="button" class="time-slot booked" data-time="15:00">3:00 PM</button>
                                            <button type="button" class="time-slot" data-time="15:30">3:30 PM</button>
                                            <button type="button" class="time-slot" data-time="16:00">4:00 PM</button>
                                            <button type="button" class="time-slot" data-time="16:30">4:30 PM</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center btn-navigation">
                                <button type="button" class="btn header-btn prev-step" onclick="prevStep()">Previous</button>
                                <button type="button" class="btn header-btn next-step" onclick="nextStep()">Next Step</button>
                            </div>
                        </div>

                        <!-- Step 4: Personal Information -->
                        <div class="form-step" id="step4">
                            <h3>4. Your Information</h3>
                            <div class="row">
                                <div class="col-md-6 mb-30">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" id="firstName" placeholder="John" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-30">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" id="lastName" placeholder="Doe" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-30">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" class="form-control" id="email" placeholder="john@example.com" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-30">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" placeholder="(123) 456-7890" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-30">
                                    <div class="form-group">
                                        <label>Special Requests (Optional)</label>
                                        <textarea class="form-control" id="requests" rows="3" placeholder="Any special instructions for your barber..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center btn-navigation">
                                <button type="button" class="btn header-btn prev-step" onclick="prevStep()">Previous</button>
                                <button type="button" class="btn header-btn next-step" onclick="nextStep()">Continue to Payment</button>
                            </div>
                        </div>

                        <!-- Step 5: Payment Method -->
                        <div class="form-step" id="step5">
                            <h3>5. Choose Payment Method</h3>
                            <div class="payment-options">
                                <div class="payment-option" data-payment="cash">
                                    <i class="fas fa-money-bill-wave"></i>
                                    <h4>Cash Payment</h4>
                                    <p>Pay in cash when you arrive</p>
                                </div>
                                <div class="payment-option" data-payment="qr">
                                    <i class="fas fa-qrcode"></i>
                                    <h4>QR Payment</h4>
                                    <p>Scan QR code to pay online</p>
                                </div>
                            </div>

                            <!-- QR Payment Details -->
                            <div class="qr-code-container" id="qrPayment">
                                <img src="..\img\QR.jpg" alt="QR Code for Payment">
                                <h4>Scan this QR code to complete your payment</h4>
                                <div class="payment-instructions">
                                    <p>1. Open your mobile banking or e-wallet app</p>
                                    <p>2. Select "Scan QR Code"</p>
                                    <p>3. Point your camera at the QR code</p>
                                    <p>4. Enter the amount of <strong id="qrAmount">RM25</strong></p>
                                    <p>5. Complete the payment</p>
                                </div>
                            </div>

                            <!-- Cash Payment Instructions -->
                            <div class="cash-instructions" id="cashPayment">
                                <h4>Cash Payment Instructions</h4>
                                <p>Please bring exact cash amount of <strong id="cashAmount">RM25</strong> when you arrive for your appointment.</p>
                                <p>Your appointment will be confirmed once payment is received.</p>
                            </div>

                            <div class="summary-card mt-30">
                                <div class="summary-header">
                                    <h4>Appointment Summary</h4>
                                    <span class="badge pending">Pending Payment</span>
                                </div>
                                <div class="summary-body">
                                    <div class="summary-item">
                                        <span class="label">Service:</span>
                                        <span class="value" id="summary-service">-</span>
                                    </div>
                                    <div class="summary-item">
                                        <span class="label">Barber:</span>
                                        <span class="value" id="summary-barber">-</span>
                                    </div>
                                    <div class="summary-item">
                                        <span class="label">Date:</span>
                                        <span class="value" id="summary-date">-</span>
                                    </div>
                                    <div class="summary-item">
                                        <span class="label">Time:</span>
                                        <span class="value" id="summary-time">-</span>
                                    </div>
                                    <div class="summary-item">
                                        <span class="label">Duration:</span>
                                        <span class="value" id="summary-duration">-</span>
                                    </div>
                                    <div class="summary-item total">
                                        <span class="label">Total Price:</span>
                                        <span class="value" id="summary-price">RM0</span>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center btn-navigation">
                                <button type="button" class="btn header-btn prev-step" onclick="prevStep()">Previous</button>
                                <button type="button" class="btn header-btn confirm-btn" id="confirmPaymentBtn">Confirm Payment</button>
                            </div>
                        </div>

                        <!-- Step 6: Confirmation -->
                        <div class="form-step text-center" id="step6">
                            <div class="checkmark">
                                <i class="fas fa-check"></i>
                            </div>
                            <h3>Appointment Confirmed!</h3>
                            <p style="color: #666; margin-bottom: 30px;">Your appointment has been successfully booked
                                                            <div style="background: #f8f9fa; padding: 30px; border-radius: 10px; max-width: 500px; margin: 0 auto 30px;">
                                <div style="margin-bottom: 15px;">
                                    <i class="far fa-calendar-check" style="color: #c9a761; margin-right: 10px;"></i>
                                    <span id="confirmation-date" style="font-weight: 600;">-</span>
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <i class="far fa-clock" style="color: #c9a761; margin-right: 10px;"></i>
                                    <span id="confirmation-time" style="font-weight: 600;">-</span>
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <i class="fas fa-user-tie" style="color: #c9a761; margin-right: 10px;"></i>
                                    <span id="confirmation-barber" style="font-weight: 600;">-</span>
                                </div>
                                <div>
                                    <i class="fas fa-money-bill-wave" style="color: #c9a761; margin-right: 10px;"></i>
                                    <span id="confirmation-payment" style="font-weight: 600;">-</span>
                                </div>
                            </div>
                            <p style="color: #666; margin-bottom: 30px;">You'll receive a confirmation email shortly. Please arrive 5 minutes before your appointment.</p>
                            <a href="#" class="btn header-btn" onclick="location.reload()">Book Another Appointment</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Appointment Area End -->
    </main>
  <?php
include "./footer.php"
?>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    
    <!-- counter , waypoint,Hover Direction -->
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>
    <script src="./assets/js/jquery.countdown.min.js"></script>
    <script src="./assets/js/hover-direction-snake.min.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

    <!-- Booking Script -->
    <script>
        // Booking state
        let currentStep = 1;
        let maxStepReached = 1;
        let bookingData = {
            service: null,
            price: 0,
            duration: 0,
            barber: null,
            date: null,
            time: null,
            firstName: '',
            lastName: '',
            email: '',
            phone: '',
            requests: '',
            paymentMethod: null
        };

        // Initialize date picker and setup
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('datepicker');
            const today = new Date().toISOString().split('T')[0];
            dateInput.min = today;

            // Make progress steps clickable
            document.querySelectorAll('.progress-step').forEach((step, index) => {
                step.addEventListener('click', function() {
                    const stepNumber = index + 1;
                    if (stepNumber <= maxStepReached) {
                        currentStep = stepNumber;
                        showStep(currentStep);
                        restoreStepData(currentStep);
                        updateProgress();
                    }
                });
            });

            // Initialize form field listeners
            document.getElementById('firstName').addEventListener('input', (e) => {
                bookingData.firstName = e.target.value;
            });
            document.getElementById('lastName').addEventListener('input', (e) => {
                bookingData.lastName = e.target.value;
            });
            document.getElementById('email').addEventListener('input', (e) => {
                bookingData.email = e.target.value;
            });
            document.getElementById('phone').addEventListener('input', (e) => {
                bookingData.phone = e.target.value;
            });
            document.getElementById('requests').addEventListener('input', (e) => {
                bookingData.requests = e.target.value;
            });

            // Payment option selection
            document.querySelectorAll('.payment-option').forEach(option => {
                option.addEventListener('click', function() {
                    document.querySelectorAll('.payment-option').forEach(o => o.classList.remove('selected'));
                    this.classList.add('selected');
                    bookingData.paymentMethod = this.dataset.payment;
                    
                    // Show appropriate payment instructions
                    if (bookingData.paymentMethod === 'qr') {
                        document.getElementById('qrPayment').style.display = 'block';
                        document.getElementById('cashPayment').style.display = 'none';
                        document.getElementById('qrAmount').textContent = `RM${bookingData.price}`;
                    } else {
                        document.getElementById('qrPayment').style.display = 'none';
                        document.getElementById('cashPayment').style.display = 'block';
                        document.getElementById('cashAmount').textContent = `RM${bookingData.price}`;
                    }
                });
            });

            // Confirm payment button
            document.getElementById('confirmPaymentBtn').addEventListener('click', function() {
                if (!bookingData.paymentMethod) {
                    alert('Please select a payment method');
                    return;
                }
                nextStep();
            });
        });

        // Service selection
        document.querySelectorAll('.service-select-card').forEach(card => {
            card.addEventListener('click', function() {
                document.querySelectorAll('.service-select-card').forEach(c => c.classList.remove('selected'));
                this.classList.add('selected');
                bookingData.service = this.querySelector('h4').textContent;
                bookingData.price = parseFloat(this.dataset.price);
                bookingData.duration = parseInt(this.dataset.duration);
            });
        });

        // Barber selection
        document.querySelectorAll('.barber-select-card').forEach(card => {
            card.addEventListener('click', function() {
                document.querySelectorAll('.barber-select-card').forEach(c => c.classList.remove('selected'));
                this.classList.add('selected');
                bookingData.barber = this.dataset.barber;
            });
        });

        // Time slot selection
        document.querySelectorAll('.time-slot:not(.booked)').forEach(slot => {
            slot.addEventListener('click', function() {
                document.querySelectorAll('.time-slot').forEach(s => s.classList.remove('selected'));
                this.classList.add('selected');
                bookingData.time = this.dataset.time;
            });
        });

        // Date selection
        document.getElementById('datepicker').addEventListener('change', function() {
            bookingData.date = this.value;
        });

        // Navigation functions
        function nextStep() {
            if (!validateStep()) return;
            
            if (currentStep < 6) {
                currentStep++;
                if (currentStep > maxStepReached) {
                    maxStepReached = currentStep;
                }
                showStep(currentStep);
                updateProgress();
                
                // Update summary when moving to payment step
                if (currentStep === 5) {
                    updateSummary();
                }
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
                restoreStepData(currentStep);
                updateProgress();
            }
        }

        function showStep(step) {
            document.querySelectorAll('.form-step').forEach(s => s.classList.remove('active'));
            document.getElementById(`step${step}`).classList.add('active');
            updateProgress();
            
            if (step === 5) {
                updateSummary();
            } else if (step === 6) {
                updateConfirmation();
            }
        }

        function restoreStepData(step) {
            switch(step) {
                case 1:
                    if (bookingData.service) {
                        document.querySelectorAll('.service-select-card').forEach(card => {
                            if (card.querySelector('h4').textContent === bookingData.service) {
                                card.classList.add('selected');
                            }
                        });
                    }
                    break;
                case 2:
                    if (bookingData.barber) {
                        document.querySelectorAll('.barber-select-card').forEach(card => {
                            if (card.dataset.barber === bookingData.barber) {
                                card.classList.add('selected');
                            }
                        });
                    }
                    break;
                case 3:
                    if (bookingData.date) {
                        document.getElementById('datepicker').value = bookingData.date;
                    }
                    if (bookingData.time) {
                        document.querySelectorAll('.time-slot').forEach(slot => {
                            if (slot.dataset.time === bookingData.time) {
                                slot.classList.add('selected');
                            }
                        });
                    }
                    break;
                case 4:
                    document.getElementById('firstName').value = bookingData.firstName;
                    document.getElementById('lastName').value = bookingData.lastName;
                    document.getElementById('email').value = bookingData.email;
                    document.getElementById('phone').value = bookingData.phone;
                    document.getElementById('requests').value = bookingData.requests;
                    break;
                case 5:
                    if (bookingData.paymentMethod) {
                        document.querySelector(`.payment-option[data-payment="${bookingData.paymentMethod}"]`).classList.add('selected');
                        if (bookingData.paymentMethod === 'qr') {
                            document.getElementById('qrPayment').style.display = 'block';
                            document.getElementById('qrAmount').textContent = `RM${bookingData.price}`;
                        } else {
                            document.getElementById('cashPayment').style.display = 'block';
                            document.getElementById('cashAmount').textContent = `RM${bookingData.price}`;
                        }
                    }
                    break;
            }
        }

        function updateProgress() {
            const progressBar = document.getElementById('progressBar');
            progressBar.style.width = `${(maxStepReached / 6) * 100}%`;
            
            for (let i = 1; i <= 6; i++) {
                const stepElement = document.getElementById(`progressStep${i}`);
                stepElement.classList.remove('active', 'completed');
                
                if (i < currentStep) {
                    stepElement.classList.add('completed');
                } else if (i === currentStep) {
                    stepElement.classList.add('active');
                } else if (i < maxStepReached) {
                    stepElement.classList.add('completed');
                }
            }
        }

        function validateStep() {
            switch (currentStep) {
                case 1:
                    if (!bookingData.service) {
                        alert('Please select a service');
                        return false;
                    }
                    break;
                case 2:
                    if (!bookingData.barber) {
                        alert('Please select a barber');
                        return false;
                    }
                    break;
                case 3:
                    if (!bookingData.date || !bookingData.time) {
                        alert('Please select both date and time');
                        return false;
                    }
                    break;
                case 4:
                    const firstName = document.getElementById('firstName').value;
                    const lastName = document.getElementById('lastName').value;
                    const email = document.getElementById('email').value;
                    const phone = document.getElementById('phone').value;
                    
                    if (!firstName || !lastName || !email || !phone) {
                        alert('Please fill in all required fields');
                        return false;
                    }
                    bookingData.firstName = firstName;
                    bookingData.lastName = lastName;
                    bookingData.email = email;
                    bookingData.phone = phone;
                    bookingData.requests = document.getElementById('requests').value;
                    break;
                case 5:
                    if (!bookingData.paymentMethod) {
                        alert('Please select a payment method');
                        return false;
                    }
                    break;
            }
            return true;
        }

        function updateSummary() {
            const date = bookingData.date ? new Date(bookingData.date).toLocaleDateString('en-US', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            }) : '-';
            
            document.getElementById('summary-service').textContent = bookingData.service || '-';
            document.getElementById('summary-barber').textContent = bookingData.barber || '-';
            document.getElementById('summary-date').textContent = date;
            document.getElementById('summary-time').textContent = bookingData.time || '-';
            document.getElementById('summary-duration').textContent = bookingData.duration ? `${bookingData.duration} minutes` : '-';
            document.getElementById('summary-price').textContent = bookingData.price ? `RM${bookingData.price}` : '-';
        }

        function updateConfirmation() {
            document.getElementById('confirmation-date').textContent = new Date(bookingData.date).toLocaleDateString('en-US', {
                weekday: 'long',
                month: 'long',
                day: 'numeric'
            });
            document.getElementById('confirmation-time').textContent = bookingData.time;
            document.getElementById('confirmation-barber').textContent = `with ${bookingData.barber}`;
            document.getElementById('confirmation-payment').textContent = bookingData.paymentMethod === 'qr' ? 'QR Payment' : 'Cash Payment';
            
            // In a real app, you would send data to server here
            console.log('Booking confirmed:', bookingData);
        }

        // Ensure barber cards are visible on page load
        $(document).ready(function() {
            $('.team-active').removeClass('owl-carousel owl-theme owl-loaded owl-drag');
            $('.barber-select-card').parent().css({
                'display': 'block',
                'opacity': '1',
                'visibility': 'visible'
            });
            $('.barber-img-wrapper img').on('error', function() {
                $(this).attr('src', 'assets/img/team/team_1.png');
            });
        });
    </script>
</body>
</html>