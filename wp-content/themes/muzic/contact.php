<?php
    /*
     *
     * Template Name: Contacto
     *
    **/
    
?>
<?php 
    get_header();
?>

<body id="top" class="preload">

  <div id="page-loader" class="loading-wrap">
    <span class="loading-text">Loading Duotone Website</span>
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
              <h2 class="subpage-tilte">CONTACTO</h2>
              <span class="subpage-subtitle">
                ¿Necesitas información extra sobre alguno de nuestros post? ¿O simplemente quiere pasarte a decir "Hola"?
                Dinos lo que quieras a través de nuestro formulario de contacto.
              </span>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="section-padding contact" id="contact">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4 col-md-offset-3">
            <div class="text">
              <p><strong>Address</strong></p>
              <p>Oficinas Muzic
                <br> CP 30007, Australia
                <br> +1 243 456 789
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="text">
              <p><strong>Office Hours</strong></p>
              <p>Lun - Vie : 10 am - 5 pm
                <br> Sábados : 10 am - 2pm
                <br> Domingos Festivos: Cerrado
              </p>
            </div>
          </div>

        </div>
        <div class="row">

          <div class="col-md-12">
            <h2 class="contact-title"><span>SALÚDANOS</span></h2>
            <p class="contact-subtitle">Comparte con nosotros todo el feedback que quieras sobre la web y nuestros redactores<p>
          </div>
          <div class="col-md-12">
            <div class="contact-form">
              <form class="form-signin" id="contact_form"
                action="https://demo.web3canvas.com/themeforest/duotone/php/contact.php">
                <label class="sr-only">Email</label>
                <input type="text" id="name" name="name" class="form-control form-width form-primary"
                  placeholder="Nombre" required="">
                <input type="email" id="email" name="email" class="form-control form-width" placeholder="Email"
                  required="">
                <textarea class="form-control form-comments" id="message" name="message" placeholder="Tu Mensaje"
                  required=""></textarea>
                <div class="btn-wrap">
                  <button type="submit" class="btn btn-default" id="js-contact-btn"> ENVIAR </button>
                </div>
                <div id="js-contact-result" data-success-msg="Success! We've received your email."
                  data-error-msg="Oops! Something went wrong, Email: mail@mywebsite.com"></div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </section>


    <div id="map" class="google_map"></div>
  </div>

<?php 
    get_footer();
?>