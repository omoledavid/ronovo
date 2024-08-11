<?php require('localhost.php');
require('home/partials/header.php');
$title = 'Contact Us';
require('home/partials/banner.php'); ?>
<!-- contact area start -->
<div class="container">
    <div class="contact-area mg-top-120 mb-120">
        <div class="row g-0 justify-content-center">
            <div class="col-lg-7">
                <form class="contact-form text-center">
                    <h3>Reach Out</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="single-input-inner">
                                <label><i class="fa fa-user"></i></label>
                                <input type="text" placeholder="Your name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-input-inner">
                                <label><i class="fa fa-envelope"></i></label>
                                <input type="text" placeholder="Your email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-input-inner">
                                <label><i class="fas fa-calculator"></i></label>
                                <input type="text" placeholder=" Phone number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-select-inner">
                                <label><i class="far fa-file-alt"></i></label>
                                <select class="single-select">
                                    <option>Subject</option>
                                    <option value="1">Some option</option>
                                    <option value="2">Another option</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-input-inner">
                                <label><i class="fas fa-pencil-alt"></i></label>
                                <textarea placeholder="Write massage"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <a class="btn btn-base" href="#"> SEND MESSAGE
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-5">
                <div class="contact-information-wrap">
                    <h3>CONTACT INFORMATION</h3>
                    <div class="single-contact-info-wrap">
                        <h6>Contact Number:</h6>
                        <div class="media">
                            <div class="icon">
                                <i class="fa fa-phone-alt"></i>
                            </div>
                            <div class="media-body">
                                <p><?= $phone_no ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="single-contact-info-wrap">
                        <h6>Mail Address:</h6>
                        <div class="media">
                            <div class="icon" style="background: #080C24;">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="media-body">
                                <p><?= $email ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="single-contact-info-wrap mb-0">
                        <h6>Office Location:</h6>
                        <div class="media">
                            <div class="icon" style="background: #565969;">
                                <i class="fa fa-map-marker-alt"></i>
                            </div>
                            <div class="media-body">
                                <p><?= $address ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact area end -->
<?php require('home/partials/footer.php');
