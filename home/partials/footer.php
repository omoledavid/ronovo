<footer class="footer-area">
    <div class="footer-top" style="background-image: url(home/assets/img/footer/bg.png);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single-footer-top">
                        <div class="icon">
                            <img src="home/assets/img/icon/map-marker.png" alt="img">
                        </div>
                        <div class="details">
                            <h6>OFFICE ADDRESS:</h6>
                            <p><?= $address ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-footer-top">
                        <div class="icon">
                            <img src="home/assets/img/icon/phone.png" alt="img">
                        </div>
                        <div class="details">
                            <h6>CONTACT US:</h6>
                            <p><?= $email ?></p>
                            <p><?= $phone_no ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-footer-top after-none">
                        <div class="icon">
                            <img src="home/assets/img/icon/clock.png" alt="img">
                        </div>
                        <div class="details">
                            <h6>WORKING HOURS:</h6>
                            <p>Weekdays - Mon-Fri: 8am-21pm</p>
                            <p>Weekend - Sta & Sun: Closed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="widget widget_about">
                    <div class="thumb">
                        <img src="home/assets/img/logo-white.png" alt="img">
                    </div>
                    <div class="details">
                        <p>Venoxpress: Your Trusted Partner for Swift, Secure, and Seamless Courier Solutions. Delivering Excellence Every Time.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6">
                <div class="widget widget_nav_menu">
                    <h4 class="widget-title">USEFULL LINKS</h4>
                    <ul>
                        <li><a href="about.php"><i class="fa fa-arrow-right"></i> About Us</a></li>
                        <li><a href="services.php"><i class="fa fa-arrow-right"></i> Services</a></li>
                        <li><a href="contact.php"><i class="fa fa-arrow-right"></i> Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-md-6">
                <div class="widget widget_nav_menu">
                    <h4 class="widget-title">OUR SERVICES</h4>
                    <ul>
                        <li><a href="air.php"><i class="fa fa-arrow-right"></i> Air Freight</a></li>
                        <li><a href="sea.php"><i class="fa fa-arrow-right"></i> sea Freight</a></li>
                        <li><a href="warehouse.php"><i class="fa fa-arrow-right"></i> Warehousing</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="widget widget_subscribe">
                    <h4 class="widget-title">SUBSCRIBE NOW</h4>
                    <p>Continually evolve worldwide vortals rather than process centric human capital. Subscribe for our latest news & articles.
                        and send message.</p>
                    <div class="single-subscribe-inner">
                        <input type="text" placeholder="Email Address">
                        <a class="btn btn-base" href="#"><i class="fa fa-paper-plane"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->

<!-- footer-bottom area start -->
<div class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-lg-start text-center">
                <div class="copyright-area">
                    <p>© Copyright 2023 By <a href="#"><?= $domain ?></a>, All right reserved.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer-bottom area end -->

<!-- back to top area start -->
<div class="back-to-top">
    <span class="back-top"><i class="fa fa-angle-up"></i></span>
</div>
<!-- back to top area end -->


<!-- all plugins here -->
<script src="home/assets/js/vendor.js"></script>
<!-- main js  -->
<script src="home/assets/js/main.js"></script>
</body>

</html>