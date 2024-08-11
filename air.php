<?php require('localhost.php');
require('home/partials/header.php');
$title = 'AIR FREIGHT';
require('home/partials/banner.php'); ?>
<div class="service-area pd-top-120 pd-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="service-details-wrap">
                    <div class="thumb">
                        <img src="home/assets/img/service/air.png" alt="img">
                        <div class="icon">
                            <img src="home/assets/img/service/service-icon-2.png" alt="img">
                        </div>
                    </div>
                    <h2>AIR TRANSPORTATION</h2>
                    <p>Experience the pinnacle of speed and efficiency with our air transportation services. Swift deliveries, global connectivity, and meticulous handling ensure your cargo reaches its destination with unparalleled speed and reliability. Trust us for a seamless and expedited journey through the skies.</p>
                    <p>Embark on a journey of unparalleled speed and connectivity with our air transportation services. From rapid deliveries to global reach, our commitment to excellence ensures your cargo soars to its destination with utmost efficiency.</p>
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="thumb mb-lg-0 mb-4">
                                <img src="home/assets/img/service/8.png" alt="img">
                            </div>
                        </div>
                        <div class="col-lg-6 align-self-center">
                            <h4 class="subtitle">Advantages</h4>
                            <ul class="list-inner-wrap">
                                <li> Speed</li>
                                <li> Global Connectivity</li>
                                <li> Reliability</li>
                                <li> Security</li>
                                <li> Reduced Packaging Requirements</li>
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