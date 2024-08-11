<?php require('localhost.php');
require('home/partials/header.php');
$title = 'SEA FREIGHT';
require('home/partials/banner.php'); ?>
<div class="service-area pd-top-120 pd-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="service-details-wrap">
                    <div class="thumb">
                        <img src="home/assets/img/service/7.png" alt="img">
                        <div class="icon">
                            <img src="home/assets/img/service/service-icon-1.png" alt="img">
                        </div>
                    </div>
                    <h2>SEA TRANSPORTATION</h2>
                    <p>Experience the reliability of our sea transportation services. With a global network, we ensure timely and secure delivery of your cargo, promising efficiency, and peace of mind. Trust us for seamless sea logistics tailored to meet your international shipping needs.</p>
                    <p>Embark on a journey of efficiency with our sea transportation services. Navigating international waters, we guarantee secure and timely cargo delivery, fostering global connections with a commitment to excellence in maritime logistics.</p>
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="thumb mb-lg-0 mb-4">
                                <img src="home/assets/img/service/8.png" alt="img">
                            </div>
                        </div>
                        <div class="col-lg-6 align-self-center">
                            <h4 class="subtitle">Global Transaction Advisory</h4>
                            <ul class="list-inner-wrap">
                                <li> Cost-Effective</li>
                                <li> Eco-Friendly</li>
                                <li> High Capacity</li>
                                <li> Global Reach</li>
                                <li> Reduced Congestion</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-area">
                    <div class="widget widget_support text-center mb-0" style="background: url(home/assets/img/widget/support-bg.png);">
                        <h4 class="widget-title style-white">24/7 ONLINE SUPPORT <span class="dot"></span></h4>
                        <p>Effortlessly reach our dedicated customer service team for prompt assistance and personalized solutions, ensuring your satisfaction and peace of mind.</p>
                        <p class="contact"><i class="fa fa-envelope"></i><?= $email ?></p>
                        <p class="contact mb-0"><i class="fa fa-phone-alt"></i><?= $phone_no ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('home/partials/footer.php') ?>