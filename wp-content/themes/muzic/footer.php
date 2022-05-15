    <footer class="section-padding has-parallax">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="subscribe-title"><span>SUBSCRIBE</span></h2>
                </div>
                <div class="col-md-12 clearfix">
                    <div class="contact-form subscribe-email">
                        
                        <form class="form-signin" id="subscribeform"
                            action="https://demo.web3canvas.com/themeforest/duotone/php/subscribe.php">
                            <div class="subscribe-block">
                                <label class="sr-only">Email address</label>
                                <input type="text" id="fname" name="fname"
                                    class="form-control form-subscribe form-primary" placeholder="Your Name"
                                    required="">
                                <input type="email" name="email" class="form-control form-subscribe"
                                    placeholder="Your Email" required="">
                            </div>
                            <div class="btn-wrap clearifx">
                                <button type="submit" class="btn btn-default btn-subscribe" id="js-subscribe-btn">
                                    SUBSCRIBE </button>
                            </div>
                            <div id="js-subscribe-result" data-success-msg="Great! Please confirm your email to finish."
                                data-error-msg="Oops! Something went wrong."></div>
                        </form>
                        
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="shape-line">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape-line.png" class="img-responsive"
                            alt="svg-style-line">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="social-icons">
                        <ul>
                            <li><a href="#"><span class="flaticon-social-1 flaticon-sm-shape shape1"></span></a></li>
                            <li><a href="#"><span class="flaticon-social-media-1 flaticon-sm-shape shape2"></span></a>
                            </li>
                            <li><a href="#"><span class="flaticon-social-network-1 flaticon-sm-shape shape3"></span></a>
                            </li>
                            <li><a href="#"><span class="flaticon-social-media flaticon-sm-shape shape4"></span></a>
                            </li>
                            <li><a href="#"><span class="flaticon-social flaticon-sm-shape shape5"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="shape-line">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape-line.png" class="img-responsive"
                            alt="svg-style-line">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="address">
                        <h4>Duotone Band</h4>
                        <span>VIC 30007, Australia</span>
                        <h4>+1 243 456 789</h4>
                        <span><a href="https://demo.web3canvas.com/cdn-cgi/l/email-protection" class="__cf_email__"
                                data-cfemail="83ebe6efefecc3e7f6ecf7ecede6f7ebe6e1e2ede7ade0ecee">[email&#160;protected]</a></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="shape-line">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape-line.png" class="img-responsive"
                            alt="svg-style-line">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="address">
                        <h5>Copyright © Duotone. All rights reserved.</h5>
                        <p>Designed by Surjith S M</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <a class="back_to_top" href="#top"> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/back-to-top.png"
            alt="Back to top" /> </a>



    <?php
        wp_footer();
    ?>

</body>