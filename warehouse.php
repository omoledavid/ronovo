<?php require('localhost.php');
require('home/partials/header.php');
$title = 'WAREHOUSE';
require('home/partials/banner.php'); ?>
<div class="service-area pd-top-120 pd-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="service-details-wrap">
                    <div class="thumb">
                        <img src="home/assets/img/service/7.png" alt="img">
                        <div class="icon">
                            <img src="home/assets/img/service/service-icon-3.png" alt="img">
                        </div>
                    </div>
                    <h2>warehouse</h2>
                    <p>Step into the heart of our advanced warehouse facilities, where precision meets scalability. Our cutting-edge warehousing solutions provide a comprehensive ecosystem for secure storage, efficient order fulfillment, and streamlined distribution. With state-of-the-art technology and expert management, we ensure your inventory is safeguarded, organized, and delivered with unparalleled precision, meeting the dynamic demands of modern supply chains.</p>
                    <p>Discover the cornerstone of our logistical excellence in our expansive warehouses. From secure storage to meticulous inventory management, our state-of-the-art facilities ensure the seamless flow of goods, providing a reliable foundation for efficient distribution and client satisfaction.</p>
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