<footer class="professional-footer">
    <div class="footer-container">
        <div class="footer-grid">
            <!-- Brand Column -->
            <div class="footer-brand">
                <img src="../img/logohead.png" alt="Apitz Barber" style="height: 100px;" class="footer-logo">
                <p class="footer-description">
                    APITZ BARBER - Where precision meets tradition. Our master barbers provide exceptional grooming 
                    services using both modern techniques and classic barbering artistry. Established in 2010, we take 
                    pride in every cut, shave, and style.
                </p>
               
                <div class="footer-credentials">
                    <div class="credential-item">
                        <i class="fas fa-cut"></i>
                        <span>Traditional Straight Razor Shaves</span>
                    </div>
                    <div class="credential-item">
                        <i class="fas fa-award"></i>
                        <span>Voted Best Barber in Kedah 2023</span>
                    </div>
                </div>
            </div>

            <!-- Contact Column -->
            <div class="footer-contact">
                <h3 class="footer-heading">Contact Us</h3>
                <div class="contact-methods">
                    <a href="tel:+0174584618" class="contact-link phone-link">
                        <i class="fas fa-phone-alt"></i>
                        <div>
                            <span class="contact-label">Appointment Line</span>
                            <span class="contact-value">+017 4584618</span>
                        </div>
                    </a>
                    <a href="mailto:ApitzBarber@gmail.com" class="contact-link email-link">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <span class="contact-label">Email Us</span>
                            <span class="contact-value">ApitzBarber@gmail.com</span>
                        </div>
                    </a>
                    <div class="business-hours">
                        <i class="far fa-clock"></i>
                        <div>
                            <span class="contact-label">Walk-ins Welcome</span>
                            <span class="contact-value">Mon-Sat: 9AM-7PM</span>
                        </div>
                    </div>
                    <div class="contact-social">
                        <a href="https://wa.me/60174584618" class="social-icon whatsapp" target="_blank" title="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="https://www.instagram.com/apitzbarbershop/" class="social-icon instagram" target="_blank" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.facebook.com/apitzbarbershopacademy/" class="social-icon facebook" target="_blank" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Location Column -->
            <div class="footer-location">
                <h3 class="footer-heading">Visit Us</h3>
                <div class="location-map">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.123456789012!2d100.501111!3d5.678889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304d123456789abc%3A0x9876543210fedcba!2sJalan%20Utama%20Alor%20Setar%20-%20Sg%20Lalang%2C%2008000%20Sg%20Petani%2C%20Kedah!5e0!3m2!1sen!2smy!4v1234567890123!5m2!1sen!2smy" 
                        width="100%" 
                        height="180" 
                        style="border:0; border-radius:4px;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                    <address>
                        <i class="fas fa-map-marker-alt"></i> Jalan Utama Alor Setar - Sg Lalang<br>
                        08000 Sg Petani, Kedah<br>
                        Malaysia<br>
                        <strong>Landmark:</strong> Near Gulai Station Bossku
                    </address>
                    <div class="parking-info">
                        <i class="fas fa-parking"></i> Free parking available behind shop
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-copyright">
                <p>&copy; <span id="current-year"></span> APITZ BARBER. All rights reserved.</p>
                <div class="legal-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">Careers</a>
                    <a href="#">Gift Cards</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('current-year').textContent = new Date().getFullYear();
    </script>
</footer>

<style>/* Professional Footer Styles */
/* Professional Footer Styles */
.professional-footer {
    background: #1a1a1a;
    color: #e0e0e0;
    padding: 60px 0 0;
    font-family: 'Poppins', sans-serif;
    border-top: 4px solid #d4af37;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.footer-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 40px;
    margin-bottom: 50px;
}

.footer-heading {
    color: #fff;
    font-size: 18px;
    margin-bottom: 25px;
    position: relative;
    padding-bottom: 10px;
}

.footer-heading:after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 50px;
    height: 2px;
    background: #d4af37;
}

/* Brand Column */
.footer-brand {
    display: flex;
    flex-direction: column;
}

.footer-logo {
    width: 160px;
    margin-bottom: 20px;
}

.footer-description {
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 25px;
    color: #aaa;
}

.footer-credentials {
    margin-top: auto;
}

.credential-item {
    display: flex;
    align-items: center;
    margin-bottom: 12px;
    font-size: 13px;
}

.credential-item i {
    color: #d4af37;
    margin-right: 10px;
    font-size: 14px;
}

/* Contact Column */
.contact-methods {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.contact-link {
    display: flex;
    align-items: center;
    color: #e0e0e0;
    text-decoration: none;
    transition: all 0.3s ease;
    padding: 8px 0;
}

.contact-link:hover {
    color: #d4af37;
    transform: translateX(5px);
}

.contact-link i {
    font-size: 18px;
    margin-right: 15px;
    width: 20px;
    text-align: center;
}

.contact-label {
    display: block;
    font-size: 12px;
    color: #aaa;
    margin-bottom: 2px;
}

.contact-value {
    font-size: 14px;
    font-weight: 500;
}

.business-hours {
    display: flex;
    align-items: center;
    padding: 8px 0;
}

.contact-social {
    display: flex;
    gap: 15px;
    margin-top: 20px;
}

.social-icon {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 16px;
    transition: all 0.3s ease;
}

.social-icon:hover {
    transform: translateY(-3px);
}

.whatsapp { background: #25D366; }
.instagram { background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); }
.facebook { background: #3b5998; }

/* Location Column */
.location-map {
    margin-bottom: 15px;
}

address {
    font-style: normal;
    font-size: 13px;
    line-height: 1.6;
    color: #aaa;
}

address i {
    color: #d4af37;
    margin-right: 10px;
}

address strong {
    color: #e0e0e0;
    display: block;
    margin-top: 8px;
}

.parking-info {
    display: flex;
    align-items: center;
    font-size: 13px;
    color: #aaa;
    margin-top: 10px;
}

.parking-info i {
    color: #d4af37;
    margin-right: 10px;
}
/* Footer Bottom */
.footer-bottom {
    border-top: 1px solid #333;
    padding: 20px 0;
}

.footer-copyright {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 12px;
}

.footer-copyright p {
    color: #ffffff !important; /* Force white color */
}

.legal-links {
    display: flex;
}

.legal-links a {
    color: #ffffff;
    text-decoration: none;
    margin-left: 15px;
    transition: color 0.3s ease;
}

.legal-links a:hover {
    color: #d4af37;
}
/* Responsive adjustments */
@media (max-width: 768px) {
    .footer-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .footer-copyright {
        flex-direction: column;
        text-align: center;
        gap: 10px;
    }
    
    .legal-links {
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 10px;
    }
    
    .legal-links a {
        margin: 0 10px;
    }
}

   </style>