<?php require('localhost.php');
require('home/partials/header.php');
$title = 'About Us';
require('home/partials/banner.php'); ?>
<div class="about-area pd-top-120 pd-bottom-80">
    <?php include('home/sections/about-us-hero.php') ?>
</div>
<?php include('home/sections/facts.php') ?>
<div class="skill-area pd-top-120 pd-bottom-120" style="background: #f9f9f9;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 order-lg-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="thumb">
                            <img class="w-100" src="home/assets/img/about/5.png" alt="img">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="thumb img-2">
                            <img class="w-100" src="home/assets/img/about/6.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="section-title mt-lg-0 mt-5">
                    <h4 class="subtitle style-2">OUR SKILLS</h4>
                    <h2 class="title">WHY CHOOSE FOR US?</h2>
                    <p>Choose us for unmatched reliability, efficiency, and a commitment to your delivery satisfaction.</p>
                </div>
                <div class="skill-progress-area">
                    <div class="single-progressbar">
                        <div class="title" style="width: 85%;">
                            <h6>Cargo Freight
                            </h6>
                            <div class="progress-count-wrap">
                                <span class="progress-count counting" data-count="85">0</span>
                                <span class="counting-icons">%</span>
                            </div>
                        </div>
                        <div class="progress-item" id="progress-running">
                            <div class="progress-bg">
                                <div id="progress" class="progress-rate" data-value="85">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-progressbar">
                        <div class="title" style="width: 80%;">
                            <h6>Air Freight
                            </h6>
                            <div class="progress-count-wrap">
                                <span class="progress-count counting" data-count="80">0</span>
                                <span class="counting-icons">%</span>
                            </div>
                        </div>
                        <div class="progress-item" id="progress-running-1">
                            <div class="progress-bg">
                                <div id="progress-1" class="progress-rate" data-value="80">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-progressbar">
                        <div class="title" style="width: 90%;">
                            <h6>Road Freight
                            </h6>
                            <div class="progress-count-wrap">
                                <span class="progress-count counting" data-count="90">0</span>
                                <span class="counting-icons">%</span>
                            </div>
                        </div>
                        <div class="progress-item" id="progress-running-2">
                            <div class="progress-bg">
                                <div id="progress-2" class="progress-rate" data-value="90">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-progressbar">
                        <div class="title" style="width: 75%;">
                            <h6>Train Freight
                            </h6>
                            <div class="progress-count-wrap">
                                <span class="progress-count counting" data-count="75">0</span>
                                <span class="counting-icons">%</span>
                            </div>
                        </div>
                        <div class="progress-item mb-0" id="progress-running-3">
                            <div class="progress-bg">
                                <div id="progress-3" class="progress-rate" data-value="75">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('home/sections/chat-2.php') ?>
<!--team-area start-->
<?php include('home/sections/team.php') ?>
<!--team-area end-->
<!-- testimonial area start -->
<?php include('home/sections/testimonies.php') ?>
<!-- testimonial area end -->
<?php require('home/partials/footer.php'); ?>