<?php
    /*
     *
     * Template Name: Archivo
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

    <section class="album_single archives-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="subpage-wrap">
              <h2 class="subpage-tilte">ARCHIVO</h2>
              <span class="subpage-subtitle">
                Aquí podrás acceder a todo nuestro contenido clasificado por distintos criterios
              </span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="container archives">
      <div class="row">
        <div class="col-md-12 clearfix masonry">
          <div class="header-slide">
              <div class="hero-wrap">
                  <div class="no-overflow">
                      <div class="hero-block">
                          <h1 class="hero-title">Etiquetas</h1>
                          <?php
                            get_tag_list(10);
                          ?>  
                      </div>
                  </div>
              </div>
          </div>

          <div class="header-slide">
              <div class="hero-wrap">
                  <div class="no-overflow">
                      <div class="hero-block">
                          <h1 class="hero-title hero-title-fit">Post más</h1>
                          <h1 class="hero-text"> populares </h1>
                            <?php 
                                $args = array(
                                          'posts_per_page' => '10', //limita el resultaod a 10 tuplas
                                          'orderby' => 'meta_value_num', //Le decimos que ordene por el valor del meta field
                                          'meta_key' => 'numviews', //Le decimos el nombre del campo por el que vamos a ordenar
                                        );
                              $popular = new WP_Query($args);
                              
                              if( $popular->have_posts() ):
                                  while( $popular->have_posts() ):
                                      
                                      $popular->the_post();
                                      echo 
                                      '<li>
                                          &mdash; 
                                          <a href="'.get_permalink( $post->ID).'">'
                                              . limitar_cadena($post->post_title, 50 ,' [...]').
                                          '</a>
                                      </li>';
                                  endwhile;
                              endif;
                              
                              wp_reset_query();
                            ?>
                      </div>
                  </div>
              </div>
            </div>
            
            <div class="header-slide">
                  <div class="hero-wrap">
                      <div class="no-overflow">
                          <div class="hero-block">
                              <h1 class="hero-title hero-title-fit">Post más</h1>
                              <h1 class="hero-text"> comentados </h1>
                              <?php
                                //most_comented_posts();
                                
                                $args = array(
                                            'posts_per_page' => 10,
                                            'orderby' => 'comment_count', // Ordena según el numero de comentarios, por defecto de mas a menos
                                            //'meta_key' => 'numviews', //Le decimos el nombre del campo por el que vamos a ordenar
                                        );
                                $commented = new WP_Query($args);
                                
                                if( $commented->have_posts() ):
                                    while( $commented->have_posts() ):
                                        $commented->the_post();
                                        $num_coments = get_comments_number($post->ID);
                                        if($num_coments > 0){
                                        echo 
                                            '<li>
                                              &mdash; 
                                              <a href="'.get_permalink( $post->ID).'">'
                                                . limitar_cadena($post->post_title, 45 ,' [...]').
                                              ' </a> 
                                              <i class="fa-solid fa-comments"></i>
                                              <span> '. $num_coments .'</span>
                                            </li>';
                                        }
                                    endwhile;
                                endif;
                                wp_reset_query();
                              ?>
                          </div>
                      </div>
                  </div>
              </div>
            
              <div class="header-slide">
                  <div class="hero-wrap">
                      <div class="no-overflow">
                          <div class="hero-block">
                              <h1 class="hero-title hero-title-fit1">Autores</h1>
                              <?php
                                get_authors_list();
                              ?>
              
                          </div>
                      </div>
                  </div>
              </div>
  
              <div class="header-slide">
                  <div class="hero-wrap">
                      <div class="no-overflow">
                          <div class="hero-block">
                              <h1 class="hero-title hero-title-fit">Eventos</h1>
                              <?php
                               $args = array(
                                  'type' => 'postbypost', //Le decimos que ordene por el valor del meta field
                                  'limit' => 15,
                                  'post_type' => 'eventos', //Le decimos el nombre del campo por el que vamos a ordenar
                                  'echo' => false,
                              );
                              
                                get_li_list(wp_get_archives($args), ''); 
                              
                              ?>
                          </div>
                      </div>
                  </div>
              </div>
              
              
              <div class="header-slide">
                  <div class="hero-wrap">
                      <div class="no-overflow">
                          <div class="hero-block">
                              <h1 class="hero-title hero-title-fit">Categorias</h1>
                              
                              <?php
                                $args = array(
                                    'title_li'  => '',
                                    'echo'      => 0,
                                  );
                              
                                get_li_list(wp_list_categories($args),'');
                              ?>
                          </div>
                      </div>
                  </div>
              </div>
  
              <div class="header-slide">
                  <div class="hero-wrap">
                      <div class="no-overflow">
                          <div class="hero-block">
                              <h1 class="hero-title hero-title-fit">Post por dia</h1>
                               <ul>
                                  <?php
                                    $args = array(
                                        'type' => 'daily',
                                        'show_post_count' => 1,
                                        'echo' => false,
                                        
                                    );
                                        
                                    get_li_list(wp_get_archives($args),'');                                                
                                  ?>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
  
  
              <div class="header-slide">
                  <div class="hero-wrap">
                      <div class="no-overflow">
                          <div class="hero-block">
                              <h1 class="hero-title hero-title-fit">Post por mes</h1>
                              <?php
                                $args = array(
                                    'type' => 'monthly',
                                    'show_post_count' => 1,
                                    'echo' => false,
                                    
                                );
                                    
                                get_li_list(wp_get_archives($args),'');
                              ?>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="header-slide">
                  <div class="hero-wrap">
                      <div class="no-overflow">
                          <div class="hero-block">
                              <h1 class="hero-title hero-title-fit">Post por año</h1>
                              <?php
                                $args = array(
                                    'type' => 'yearly',
                                    'show_post_count' => 1,
                                    'echo' => false,
                                    
                                );
                                    
                                get_li_list(wp_get_archives($args),'');
                              ?>                                  
                          </div>
                      </div>
                  </div>
              </div>
  
          </div>
      </div>
  </div>








    <!--<section class="section-padding clearfix has-parallax" id="team">-->
    <!--  <div class="container">-->
    <!--    <div class="row">-->
    <!--      <div class="col-md-12">-->
    <!--        <div class="team-wrap">-->
    <!--          <p class="album-subtitle pt-0">-->
    <!--            We are singers and musicians from the different part of theworld united to make wonderful music-->
    <!--            experiences for everyone in the world.-->
    <!--          </p>-->
    <!--          <div class="row mb-5">-->
    <!--            <div class="col-md-6">-->
    <!--              <p>Competently redefine value-added sources through standards compliant synergy. Holisticly fabricate-->
    <!--                ubiquitous opportunities rather than optimal applications. Objectively pursue high standards in-->
    <!--                testing procedures</p>-->
    <!--            </div>-->

    <!--            <div class="col-md-6">-->
    <!--              <p>Appropriately provide access to real-time ROI rather than distributed synergy. Globally syndicate-->
    <!--                leading-edge action items through empowered meta-services. Seamlessly synergize pandemic paradigms-->
    <!--                for turnkey quality vectors. </p>-->
    <!--            </div>-->

    <!--          </div>-->

    <!--          <div class="row team-slider">-->
    <!--            <div class="col-md-4 mb-5">-->
    <!--              <a href="#team-modal-1" data-effect="mfp-zoom-out"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-1.jpg" class="img-responsive"-->
    <!--                  alt="team-1">-->
    <!--                <div class="slide-img-title">-->
    <!--                  <span>Roy Gutierrez</span>-->
    <!--                  <span class="slide-img-subtitle">The Guitarist</span>-->
    <!--                </div>-->
    <!--              </a>-->
    <!--            </div>-->
    <!--            <div class="col-md-4 mb-5">-->
    <!--              <a href="#team-modal-2" data-effect="mfp-zoom-out"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-2.jpg" class="img-responsive"-->
    <!--                  alt="team-2">-->
    <!--                <div class="slide-img-title">-->
    <!--                  <span>Hannah Valdez</span>-->
    <!--                  <span class="slide-img-subtitle">Female Singer</span>-->
    <!--                </div>-->
    <!--              </a>-->
    <!--            </div>-->
    <!--            <div class="col-md-4 mb-5">-->
    <!--              <a href="#team-modal-3" data-effect="mfp-zoom-out"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-3.jpg" class="img-responsive"-->
    <!--                  alt="team-3">-->
    <!--                <div class="slide-img-title">-->
    <!--                  <span>Phillip Lucas</span>-->
    <!--                  <span class="slide-img-subtitle">Rock Singer</span>-->
    <!--                </div>-->
    <!--              </a>-->
    <!--            </div>-->
    <!--            <div class="col-md-4 mb-5">-->
    <!--              <a href="#team-modal-4" data-effect="mfp-zoom-out"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-3.jpg" class="img-responsive"-->
    <!--                  alt="team-3">-->
    <!--                <div class="slide-img-title">-->
    <!--                  <span>Phillip Lucas</span>-->
    <!--                  <span class="slide-img-subtitle">Rock Singer</span>-->
    <!--                </div>-->
    <!--              </a>-->
    <!--            </div>-->
    <!--            <div class="col-md-4 mb-5">-->
    <!--              <a href="#team-modal-1" data-effect="mfp-zoom-out"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-1.jpg" class="img-responsive"-->
    <!--                  alt="team-1">-->
    <!--                <div class="slide-img-title">-->
    <!--                  <span>Roy Gutierrez</span>-->
    <!--                  <span class="slide-img-subtitle">The Guitarist</span>-->
    <!--                </div>-->
    <!--              </a>-->
    <!--            </div>-->
    <!--            <div class="col-md-4 mb-5">-->
    <!--              <a href="#team-modal-2" data-effect="mfp-zoom-out"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-2.jpg" class="img-responsive"-->
    <!--                  alt="team-2">-->
    <!--                <div class="slide-img-title">-->
    <!--                  <span>Hannah Valdez</span>-->
    <!--                  <span class="slide-img-subtitle">Female Singer</span>-->
    <!--                </div>-->
    <!--              </a>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</section>-->




    <!--<div id="team-modal-1" class="white-popup mfp-with-anim mfp-hide">-->
    <!--  <div class="row">-->
    <!--    <div class="col-sm-5">-->
    <!--      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-1.jpg" class="img-responsive team-modal-img" alt="team-pic">-->
    <!--    </div>-->
    <!--    <div class="col-sm-7">-->
    <!--      <div class="team-popup-desc">-->
    <!--        <h3 class="team-popup-title">Roy Gutierrez</h3>-->
    <!--        <h4 class="muted">The Guitarist</h4>-->
    <!--        <p class="lead">Appropriately implement cross-unit services after next-generation human capital. </p>-->

    <!--        <p class="team-popup-text">Distinctively coordinate team building architectures rather than flexible growth-->
    <!--          strategies. Appropriately implement cross-unit services after next-generation human capital. </p>-->
    <!--        <div class="social-icons team-social">-->
    <!--          <ul>-->
    <!--            <li><a href="#"><span class="flaticon-social-1 flaticon-sm-shape shape1"></span></a></li>-->
    <!--            <li><a href="#"><span class="flaticon-social-media-1 flaticon-sm-shape shape2"></span></a></li>-->
    <!--            <li><a href="#"><span class="flaticon-social-network-1 flaticon-sm-shape shape3"></span></a></li>-->
    <!--          </ul>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->

    <!--<div id="team-modal-2" class="white-popup mfp-with-anim mfp-hide">-->
    <!--  <div class="row">-->
    <!--    <div class="col-sm-4">-->
    <!--      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-2.jpg" class="img-responsive team-modal-img" alt="team-pic">-->
    <!--    </div>-->
    <!--    <div class="col-sm-8">-->
    <!--      <div class="team-popup-desc">-->
    <!--        <h3 class="team-popup-title">Hannah Valdez</h3>-->
    <!--        <h4 class="muted">Female Singer</h4>-->
    <!--        <p class="team-popup-text">Distinctively coordinate team building architectures rather than flexible growth-->
    <!--          strategies. Appropriately implement cross-unit services after next-generation human capital. </p>-->
    <!--        <ul class="sidebarlist">-->
    <!--            <?php-->
    <!--                get_tag_list(10);-->
    <!--            ?>-->
                
    <!--        </ul>-->
            
    <!--        <div class="social-icons team-social">-->
    <!--          <ul>-->
    <!--            <li><a href="#"><span class="flaticon-social-1 flaticon-sm-shape shape1"></span></a></li>-->
    <!--            <li><a href="#"><span class="flaticon-social-media-1 flaticon-sm-shape shape2"></span></a></li>-->
    <!--            <li><a href="#"><span class="flaticon-social-network-1 flaticon-sm-shape shape3"></span></a></li>-->
    <!--          </ul>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->

    <!--<div id="team-modal-3" class="white-popup mfp-with-anim mfp-hide">-->
    <!--  <div class="row">-->
    <!--    <div class="col-sm-5">-->
          <!--<img src="<?php // echo get_template_directory_uri(); ?>/assets/images/team-3.jpg" class="img-responsive team-modal-img" alt="team-pic">-->
    <!--    </div>-->
    <!--    <div class="col-sm-7">-->
    <!--      <div class="team-popup-desc">-->
    <!--        <h3 class="team-popup-title">Phillip Lucas</h3>-->
    <!--        <h4 class="muted">Post by <?php // echo $autor->display?></h4> -->
    <!--        <p class="lead">Appropriately implement cross-unit services after next-generation human capital. </p>-->

    <!--        <p class="team-popup-text">-->
              <?php
                // $args = array(
                //   'orderby'     => 'post_date',
                //   'order'       => 'DESC',
                //   'numberposts' => 10,      // Como máximo 10 posts
                //   'author'      => $author->ID,
                  
                // );
                // $posts = get_posts( $args );
                // foreach ($posts as $my_post){
                //   echo '<li class="sidebarlist">
                //           <a href="'.get_permalink( $my_post->ID ).'">'.
                //             $my_post->post_title
                //           .'</a>
                //         </li>';
                // };
              
             ?>
              
    <!--        </p>-->
    <!--        <div class="social-icons team-social">-->
    <!--          <ul>-->
    <!--            <li><a href="#"><span class="flaticon-social-1 flaticon-sm-shape shape1"></span></a></li>-->
    <!--            <li><a href="#"><span class="flaticon-social-media-1 flaticon-sm-shape shape2"></span></a></li>-->
    <!--            <li><a href="#"><span class="flaticon-social-network-1 flaticon-sm-shape shape3"></span></a></li>-->
    <!--          </ul>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->
    
    <!--<div id="team-modal-4" class="white-popup mfp-with-anim mfp-hide">-->
    <!--  <div class="row">-->
    <!--    <div class="col-sm-5">-->
    <!--      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-3.jpg" class="img-responsive team-modal-img" alt="team-pic">-->
    <!--    </div>-->
    <!--    <div class="col-sm-7">-->
    <!--      <div class="team-popup-desc">-->
    <!--        <h3 class="team-popup-title">Phillip Lucas</h3>-->
    <!--        <h4 class="muted">Rock Singer</h4>-->
    <!--        <p class="lead">Appropriately implement cross-unit services after next-generation human capital. </p>-->

    <!--        <p class="team-popup-text">Distinctively coordinate team building architectures rather than flexible growth-->
    <!--          strategies. Appropriately implement cross-unit services after next-generation human capital. </p>-->
    <!--        <div class="social-icons team-social">-->
    <!--          <ul>-->
    <!--            <li><a href="#"><span class="flaticon-social-1 flaticon-sm-shape shape1"></span></a></li>-->
    <!--            <li><a href="#"><span class="flaticon-social-media-1 flaticon-sm-shape shape2"></span></a></li>-->
    <!--            <li><a href="#"><span class="flaticon-social-network-1 flaticon-sm-shape shape3"></span></a></li>-->
    <!--          </ul>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->
    
  </div>

   
<?php 
    get_footer();
?>