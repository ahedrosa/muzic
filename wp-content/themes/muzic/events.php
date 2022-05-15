<?php
    /*
     *
     * Template Name: Events
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


<div id="page-section" class="events">

    <section class="event_header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="subpage-wrap">
              <h2 class="subpage-tilte">EVENTOS</h2>
              <span class="subpage-subtitle">
                Aquí encotraras recomendaciones de los mejores shows en el entorno nacional.
              </span>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <div class="section-padding">
      <div class="container">
        <div class="row masonry">
        
        <?php 
            
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $ppp = do_shortcode('[get_option_ppp]');
            $args = array(
                    'posts_per_page' => $ppp,
                    'paged' => $paged,
                    'post_type' => array('eventos'),
                );
              
            $custom_post = new WP_Query($args);
            
            if($custom_post->have_posts()):
                
                while($custom_post->have_posts()):
                    
                    $custom_post->the_post();
                  
                    if(has_post_thumbnail()){
                          $postImg = get_the_post_thumbnail_url(); //devuelve la imagen del post
                        }else{
                          $postImg = get_template_directory_uri().'/images/default.png';
                        };
        ?>
        
           <?php 
                  echo
                      '<div class="col-md-4 cpt-box">'; ?>
                        <a href="<?php echo the_permalink();?>" class="">
                          <div class="atvImg">
                            <img src="<?php $postImg ?>" class="img-responsive" alt="album">
                            <div class=" atvImg-layer" data-img="<?php echo $postImg ?>"></div>
                          </div>
                        </a>
                        <p class="space-between">
                          <span><i class="fa-regular fa-calendar"></i> <?php the_time('j F') ?></span>
                          <span><?php echo get_num_views($post->ID)?></span>
                        </p>
                        <?php echo do_shortcode('[show_custom_fields id="'.$post->ID.'"]');
                      echo '</div>';  
                endwhile;
              
            endif;      
              
              
            wp_reset_query();
           
        ?>
        
      </div>
      </div>
      <div class="row">
        <div class="col-md-12 ">
            <div class="blog-pagination">
                <nav>
                    <ul class="pagination">
                      <li>
                      <?php
                      $big=99999999; //se necesita un numero de pagina salido de madre para que recalcule todo
                          $args =array(
                                'prev_text' => '<span aria-hidden="true">←</span>',
                                'next_text' => '<span aria-hidden="true">→</span>',
                                'base'      => str_replace($big, '%#%', get_pagenum_link($big)),
                                'format'    => '?paged=%#%',
                                'current'   => max(1, get_query_var('paged')),
                                'total'     => $custom_post->max_num_pages,
                            );
                          get_li_list(paginate_links($args),'</li><li>');
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
      </div>
  
  
    </div>



  </div>
  
<?php 
    get_footer();
?>
