<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Leave a Review - Barber HTML-5 Template</title>
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
    
    <!-- Custom review styles -->
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
            width: 33.33%;
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
        .review-form {
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

        /* Barber Cards */
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

        /* Selected Barber Display in Step 2 */
        .selected-barber {
            margin-bottom: 30px;
            background: #faf8f5;
            padding: 20px;
            border-radius: 10px;
            border: 2px solid #c9a761;
            text-align: center;
        }

        .selected-barber-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 15px;
        }

        .selected-barber-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .selected-barber-info h4 {
            font-size: 24px;
            color: #1a1a1a;
            margin: 0 0 10px;
        }

        .selected-barber-info .barber-specialty {
            color: #c9a761;
            font-size: 14px;
            font-style: italic;
        }

        /* Star Rating */
        .star-rating {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 30px;
        }

        .star-rating i {
            font-size: 30px;
            color: #e5e5e5;
            cursor: pointer;
            transition: color 0.3s;
        }

        .star-rating i.filled,
        .star-rating i:hover,
        .star-rating i:hover ~ i {
            color: #f39c12;
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
            .review-form {
                padding: 30px 20px;
            }
        }

        /* Fix for barber section visibility */
        #step1 .row {
            display: flex !important;
            flex-wrap: wrap;
        }
        
        #step1 .col-xl-4,
        #step1 .col-lg-4,
        #step1 .col-md-6,
        #step1 .col-sm-6 {
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
    <!-- Preloader Start -->
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
    <!-- Preloader End -->
    <header>
        <?php
        include "./nav.php"
        ?>
    </header>
    <main>
        <!-- Hero Start -->
        <div class="slider-area2">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 text-center">
                                <h2>Leave Your Review</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        
        <!-- Review Area Start -->
        <section class="service-area section-padding30">
            <div class="container">
                <!-- Section Title -->
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-11 col-sm-11">
                        <div class="section-tittle text-center mb-90">
                            <span>share your experience</span>
                            <h2>Leave Your Review</h2>
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
                            <div class="step-label">Select Barber</div>
                        </div>
                        <div class="progress-step" id="progressStep2">
                            <span>2</span>
                            <div class="step-label">Rate & Review</div>
                        </div>
                        <div class="progress-step" id="progressStep3">
                            <span>3</span>
                            <div class="step-label">Confirm</div>
                        </div>
                    </div>
                </div>
                
                <!-- Review Form -->
                <div class="review-form">
                    <form id="reviewForm">
                        <!-- Step 1: Select Barber -->
                        <div class="form-step active" id="step1">
                            <h3>1. Choose Your Barber</h3>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
                                    <div class="barber-select-card" data-barber="Ahmad bin Ismail" data-image="https://as1.ftcdn.net/v2/jpg/06/49/72/40/1000_F_649724078_jTrowyEQcL64ALY7TC0j6uBFRL1fxsUU.jpg" data-specialty="Master Barber">
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
                                    <div class="barber-select-card" data-barber="Mohd Faizal Abdullah" data-image="https://www.aipassportphotos.com/blog/wp-content/uploads/image-739.png" data-specialty="Color Expert">
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
                                    <div class="barber-select-card" data-barber="Syed Amirul bin Syed Hassan" data-image="https://tse1.mm.bing.net/th/id/OIP.zuWM25NsyaoZdxRq56uemgHaHa?rs=1&pid=ImgDetMain" data-specialty="Master Barber">
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
                                <button type="button" class="btn header-btn next-step" onclick="nextStep()">Next Step</button>
                            </div>
                        </div>

                        <!-- Step 2: Rate & Review -->
                        <div class="form-step" id="step2">
                            <h3>2. Rate & Share Your Feedback</h3>
                            <div class="row">
                                <div class="col-md-12 mb-30">
                                    <div class="selected-barber" id="selectedBarber">
                                        <div class="selected-barber-img">
                                            <img id="selectedBarberImage" src="" alt="Selected Barber">
                                        </div>
                                        <div class="selected-barber-info">
                                            <h4 id="selectedBarberName">-</h4>
                                            <span class="barber-specialty" id="selectedBarberSpecialty">-</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-30">
                                    <div class="form-group">
                                        <label>Your Rating</label>
                                        <div class="star-rating">
                                            <i class="fas fa-star" data-rating="1"></i>
                                            <i class="fas fa-star" data-rating="2"></i>
                                            <i class="fas fa-star" data-rating="3"></i>
                                            <i class="fas fa-star" data-rating="4"></i>
                                            <i class="fas fa-star" data-rating="5"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-30">
                                    <div class="form-group">
                                        <label>Your Name</label>
                                        <input type="text" class="form-control" id="reviewerName" placeholder="Your Name" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-30">
                                    <div class="form-group">
                                        <label>Your Feedback</label>
                                        <textarea class="form-control" id="reviewText" rows="5" placeholder="Share your experience and suggestions..." required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center btn-navigation">
                                <button type="button" class="btn header-btn prev-step" onclick="prevStep()">Previous</button>
                                <button type="button" class="btn header-btn next-step" onclick="nextStep()">Submit Review</button>
                            </div>
                        </div>

                        <!-- Step 3: Confirmation -->
                        <div class="form-step text-center" id="step3">
                            <div class="checkmark">
                                <i class="fas fa-check"></i>
                            </div>
                            <h3>Review Submitted!</h3>
                            <p style="color: #666; margin-bottom: 30px;">Thank you for your feedback!</p>
                            <div style="background: #f8f9fa; padding: 30px; border-radius: 10px; max-width: 500px; margin: 0 auto 30px;">
                                <div style="margin-bottom: 15px;">
                                    <i class="fas fa-user-tie" style="color: #c9a761; margin-right: 10px;"></i>
                                    <span id="confirmation-barber" style="font-weight: 600;">-</span>
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <i class="fas fa-star" style="color: #c9a761; margin-right: 10px;"></i>
                                    <span id="confirmation-rating" style="font-weight: 600;">-</span>
                                </div>
                                <div>
                                    <i class="fas fa-comment" style="color: #c9a761; margin-right: 10px;"></i>
                                    <span id="confirmation-review" style="font-weight: 600;">-</span>
                                </div>
                            </div>
                            <p style="color: #666; margin-bottom: 30px;">Your review helps us improve our services.</p>
                            <a href="#" class="btn header-btn" onclick="location.reload()">Leave Another Review</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Review Area End -->
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
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery.slicknav.min.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>
    <script src="./assets/js/gijgo.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>
    <script src="./assets/js/jquery.countdown.min.js"></script>
    <script src="./assets/js/hover-direction-snake.min.js"></script>
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

    <!-- Review Script -->
    <script>
        // Review state
        let currentStep = 1;
        let maxStepReached = 1;
        let reviewData = {
            barber: null,
            barberImage: null,
            barberSpecialty: null,
            rating: 0,
            reviewerName: '',
            reviewText: ''
        };

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
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
            document.getElementById('reviewerName').addEventListener('input', (e) => {
                reviewData.reviewerName = e.target.value;
            });
            document.getElementById('reviewText').addEventListener('input', (e) => {
                reviewData.reviewText = e.target.value;
            });

            // Star rating selection
            document.querySelectorAll('.star-rating i').forEach(star => {
                star.addEventListener('click', function() {
                    const rating = parseInt(this.dataset.rating);
                    reviewData.rating = rating;
                    document.querySelectorAll('.star-rating i').forEach(s => {
                        s.classList.remove('filled');
                        if (parseInt(s.dataset.rating) <= rating) {
                            s.classList.add('filled');
                        }
                    });
                });
            });
        });

        // Barber selection
        document.querySelectorAll('.barber-select-card').forEach(card => {
            card.addEventListener('click', function() {
                document.querySelectorAll('.barber-select-card').forEach(c => c.classList.remove('selected'));
                this.classList.add('selected');
                reviewData.barber = this.dataset.barber;
                reviewData.barberImage = this.dataset.image;
                reviewData.barberSpecialty = this.dataset.specialty;
            });
        });

        // Navigation functions
        function nextStep() {
            if (!validateStep()) return;
            
            if (currentStep < 3) {
                currentStep++;
                if (currentStep > maxStepReached) {
                    maxStepReached = currentStep;
                }
                showStep(currentStep);
                updateProgress();
                
                if (currentStep === 3) {
                    updateConfirmation();
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
            
            if (step === 2) {
                updateSelectedBarber();
            } else if (step === 3) {
                updateConfirmation();
            }
        }

        function updateSelectedBarber() {
            if (reviewData.barber) {
                document.getElementById('selectedBarberName').textContent = reviewData.barber;
                document.getElementById('selectedBarberImage').src = reviewData.barberImage;
                document.getElementById('selectedBarberSpecialty').textContent = reviewData.barberSpecialty;
            }
        }

        function restoreStepData(step) {
            switch(step) {
                case 1:
                    if (reviewData.barber) {
                        document.querySelectorAll('.barber-select-card').forEach(card => {
                            if (card.dataset.barber === reviewData.barber) {
                                card.classList.add('selected');
                            }
                        });
                    }
                    break;
                case 2:
                    document.getElementById('reviewerName').value = reviewData.reviewerName;
                    document.getElementById('reviewText').value = reviewData.reviewText;
                    if (reviewData.rating) {
                        document.querySelectorAll('.star-rating i').forEach(s => {
                            s.classList.remove('filled');
                            if (parseInt(s.dataset.rating) <= reviewData.rating) {
                                s.classList.add('filled');
                            }
                        });
                    }
                    updateSelectedBarber();
                    break;
            }
        }

        function updateProgress() {
            const progressBar = document.getElementById('progressBar');
            progressBar.style.width = `${(maxStepReached / 3) * 100}%`;
            
            for (let i = 1; i <= 3; i++) {
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
                    if (!reviewData.barber) {
                        alert('Please select a barber');
                        return false;
                    }
                    break;
                case 2:
                    if (!reviewData.rating) {
                        alert('Please select a rating');
                        return false;
                    }
                    if (!document.getElementById('reviewerName').value) {
                        alert('Please enter your name');
                        return false;
                    }
                    if (!document.getElementById('reviewText').value) {
                        alert('Please enter your feedback');
                        return false;
                    }
                    reviewData.reviewerName = document.getElementById('reviewerName').value;
                    reviewData.reviewText = document.getElementById('reviewText').value;
                    break;
            }
            return true;
        }

        function updateConfirmation() {
            document.getElementById('confirmation-barber').textContent = `for ${reviewData.barber}`;
            document.getElementById('confirmation-rating').textContent = `${reviewData.rating} Stars`;
            document.getElementById('confirmation-review').textContent = reviewData.reviewText;
            
            // In a real app, you would send data to server here
            console.log('Review submitted:', reviewData);
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
            $('.selected-barber-img img').on('error', function() {
                $(this).attr('src', 'assets/img/team/team_1.png');
            });
        });
    </script>
</body>
</html>