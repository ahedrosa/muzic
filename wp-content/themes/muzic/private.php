<?php
    /*
     *
     * Template Name: Private
     *
    **/
    
?>


<?php 
    get_header();
?>

<body id="top" class="preload">

  <div id="page-loader" class="loading-wrap">
    <span class="loading-text">Loading Muzic Website</span>
    <div class="loading-bars">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
  </div>


    
    <?php get_template_part('nav'); ?>

  <div id="page-section">

    <section class="album_single">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="subpage-wrap">
              <h2 class="subpage-tilte">Acceso a tu cuenta</h2>
              <span class="subpage-subtitle">
                Zona para acceder a tu cuenta
              </span>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="section-padding contact" id="contact">
      <div class="container private">
        <div class="row mb-5">
          <div class="col-md-12 clearfix">
                    <div class="contact-form subscribe-email">

                <form class="form-signin" id="subscribeform" action="">
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
                    <div id="js-subscribe-result" data-success-msg="Great! Please confirm your email to finish." data-error-msg="Oops! Something went wrong."></div>
                </form>

            </div>
          </div>
        </div>
      </div>
    </section>


<?php 
    get_footer();
?>