<?php
$carousel = getNodeFromId(7);
$text_images = getValue($carousel->field_testo_per_immagini);
$images = getUrlImages($carousel->field_immagini, "200x800");
?>
<!-- Banner Slider Section starts here-->
<section class="slider">
    <div class="owl-carousel owl-theme">
        <?php for($i=1; $i<sizeof($text_images); $i++){ ?>
            <div class="item">
                <img src="<?php print $images[$i]; ?>" alt="slider"/>

                <div class="caption-banner">
                    <div class="container">
                        <h4><?php print $text_images[$i]; ?></h4>
                        <!--<p class="color-white"><?php /*print $text_images[$i]; */?></p>-->
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<!-- Banner Slider Section ends here-->

<!-- Team Section starts here-->
<div class="team padding-section text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!--<h6 class="heading-underline centered link-color no-margin-top">MEET OUR TEAM</h6>-->
                <span
                    class="heading-underline centered link-color no-margin-top span-small-border-bottom">MEET OUR TEAM</span>

                <h2>Dentologist Dental Team Members</h2>

                <p>Our Team Consists of Most Experienced and Qualified Doctors which provide the best treatment based on
                    modern research.</p>

                <div class="swiper-container service-detail width-400">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="zoomout-container img-circle"><a href="meet-the-dentist.html"><img
                                        src="http://wpmupro.com/dentologist-demo/demo-images/dr-smith.jpg"
                                        class="img-responsive img-circle width-100 no-padding zoomout"
                                        alt="Team member"></a></div>
                            <div class="details">
                                <h4><a href="meet-the-dentist.html">Dr. Alen Smith</a></h4>

                                <p>FCPS, FACE, CDT</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="zoomout-container img-circle"><a href="meet-the-dentist.html"><img
                                        src="http://wpmupro.com/dentologist-demo/demo-images/dr-robert.jpg"
                                        class="img-responsive img-circle width-100 no-padding zoomout"
                                        alt="Team member"></a></div>
                            <div class="details">
                                <h4><a href="meet-the-dentist.html">Dr. Jacob Anderson</a></h4>

                                <p>CDT</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="zoomout-container img-circle"><a href="meet-the-dentist.html"><img
                                        src="http://wpmupro.com/dentologist-demo/demo-images/dr-allan.jpg"
                                        class="img-responsive img-circle width-100 no-padding zoomout"
                                        alt="Team member"></a></div>
                            <div class="details">
                                <h4><a href="meet-the-dentist.html">Dr. Allen Lawry</a></h4>

                                <p>FCPS</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="zoomout-container img-circle"><a href="meet-the-dentist.html"><img
                                        src="http://wpmupro.com/dentologist-demo/demo-images/alina.jpg"
                                        class="img-responsive img-circle width-100 no-padding zoomout"
                                        alt="Team member"></a></div>
                            <div class="details">
                                <h4><a href="meet-the-dentist.html">Dr. Alina Haddin</a></h4>

                                <p>FACE, FACDS</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="zoomout-container img-circle"><a href="meet-the-dentist.html"><img
                                        src="http://wpmupro.com/dentologist-demo/demo-images/dr-prabhakar.jpg"
                                        class="img-responsive img-circle width-100 no-padding zoomout"
                                        alt="Team member"></a></div>
                            <div class="details">
                                <h4><a href="meet-the-dentist.html">Dr. Prabhakar Sharma</a></h4>

                                <p>CDT</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="zoomout-container img-circle"><a href="meet-the-dentist.html"><img
                                        src="http://wpmupro.com/dentologist-demo/demo-images/dr-zack.jpg"
                                        class="img-responsive img-circle width-100 no-padding zoomout"
                                        alt="Team member"></a></div>
                            <div class="details">
                                <h4><a href="meet-the-dentist.html">Dr. Zack Fairley</a></h4>
                            </div>
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="carousel-pagination text-center no-margin-top"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team Section ends here-->

<!-- Contact Us starts here-->
<section class="contact-us grey-bg padding-section text-center" id="contact-us">
    <div class="container">
        <!--<h6 class="heading-underline centered link-color no-margin-top">CONTACT US</h6>-->
        <span class="heading-underline centered link-color no-margin-top span-small-border-bottom">CONTACT US</span>

        <h2>Request an Appointment</h2>

        <p>Fill out the form below and we will contact you during our working hours.</p>

        <div class="row">
            <div class="col-md-offset-1 col-md-10 col-md-offset-1">
                <form action="mail.php" class="contact-form" id="contactForm" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group user"><input type="text" name="firstname" class="form-control"
                                                                placeholder="First Name"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group user"><input type="text" name="lastname" class="form-control"
                                                                placeholder="Last Name"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group phone"><input type="text" name="phone" class="form-control"
                                                                 placeholder="Phone Number"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group email"><input type="email" name="email" class="form-control"
                                                                 placeholder="E-mail"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="message" placeholder="Question/Comment" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn btn-default blue-btn" name="btnSubmit">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Contact Us ends here-->
