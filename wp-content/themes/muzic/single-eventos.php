<?php 
    get_header();
    the_post();
    $mypostId = $post->ID;
    $arraycat = wp_get_post_categories($post->ID);
    
    add_num_views($post->ID);
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

    <?php get_template_part('nav'); 
    
    if(has_post_thumbnail()) {
            $postImg = get_the_post_thumbnail_url();
        }else{
            $postImg = get_template_directory_uri() .'/assets/images/admire-bg.jpg';
        };

    ?>
    
    
  
  <section class="blog blog-single" style="background-image:url('<?php echo $postImg?>') !important">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="subpage-wrap blog-single-block">
            <h2 class="subpage-tilte"><?php the_title(); ?></h2>
            <span class="single-subtitle"><?php the_time('j') ?> <?php the_time('M') ?> <?php the_time('Y') ?></span><br>
            <span class="single-subtitle"><?php echo the_author_link(); ?></span><br>
            
          </div>
        </div>
      </div>
    </div>
  </section>


  <div class="blog-single-wrap">
    <div class="container single-event">
      <div class="row">
        <div class="col-md-10 col-md-push-1">
          <div class="blog-description">
            <div class="post-data">
              <p class="single-subtitle">&nbsp<?php echo get_num_views($post->ID)?>&nbsp</p>
              <p class="single-subtitle">&nbsp
                <?php comments_number('<i class="fa-regular fa-comments"></i> 0','<i class="fa-regular fa-comments"></i> 1','<i class="fa-regular fa-comments"></i> %');?>
                &nbsp
              </p>
            </div>
            <div class="cpt-atts-container">
                <?php echo do_shortcode('[show_custom_fields_single id="'.$post->ID.'"]'); ?>
                <?php echo do_shortcode('[show_custom_fields_single_dinamic id="'.$post->ID.'"]'); ?>
            </div>
            
            
            
            <p class="blog-single-topic">
                
                <?php the_content(); ?>  
            </p>
            <ul class="single-share-btn">
              <li>
                <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//demo.web3canvas.com/themeforest/duotone"
                  target="_blank" class="share-btn"> &nbsp&nbsp&nbsp<i class="fa-brands fa-facebook-f"></i> Share on Facebook</a>
              </li>
              <li>
                <a href="https://twitter.com/home?status=Just%20Saw%20an%20Awesome%20Music%20and%20Band%20Website%20Template.%20Check%20out%20http%3A//demo.web3canvas.com/themeforest/duotone"
                  target="_blank" class="share-btn share-twitter">  &nbsp&nbsp&nbsp<i class="fa-brands fa-twitter"></i> Tweet this
                  Post</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12 categories-tags">
          <div class="col-md-10 col-md-push-1">
            
            <span>Tags</span>
                  <?php 
                    $mytags = wp_get_post_tags($post->ID);
                    foreach($mytags as $tag){
                      echo 
                        '<a href="'.get_tag_link($tag->term_id) .'">'
                          .$tag->name.
                        '</a>';
                    };
                  
                  ?>
            <span>Categorias</span> <?php  the_category(); ?>  
            
          </div>
        </div>
      </div>
      
    </div>
  </div>
      
      

<!---------------------------------------------- POST RELACIONADOS ---------------------------------------------------->
      
      <section class="section-padding our-clients has-parallax" id="clients">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="fan-page-title"><span> POST RELACIONADOS </span></h2>
                    </div>
                </div>
                  <div class="row related-post">
                    <div class="col-md-12">
                        <div class="clearfix"></div>
                        <div class="twitter-feed-wrap">
                            <ul class="twitter-feed">
                            
                              <?php
                                $args = array(
                                  'posts_per_page' => 4,
                                  //Tenemos que evitar el post que estamos viendo
                                  'post__not_in' => array($mypostId),
                                  //Solo queremos posts que compartan categoria con el que estoy viendo
                                  'category__in' => $arraycat, //Array con las categorias que queremos mostrar
                                  'post_type' => array('eventos'),
                                );
                                $related = new WP_Query($args);
                                $cont = 1;
                                if ($related->have_posts()) :
                                  $cols = $related->post_count;
                                  while ($related->have_posts()) :
                                    $related->the_post();
                                    $contenido = $cont++;
                                    if (has_post_thumbnail()) :
                                      $PostImg = get_the_post_thumbnail_url();
                                    else :
                                      $PostImg = get_template_directory_uri() .'/assets/images/admire-bg.jpg';
                                      
                                  endif;
                                ?>
                                <li class="twitter-listing">
                                    <div class="embed-tweet-item wow fadeInLeft related-frame">
                                      <a href="<?php echo the_permalink() ?>" style="background-image: url(<?php echo $PostImg?>)" class="imagen"></a>
                                      <a href="<?php echo the_permalink(); ?>" class="post-destacado-titulo"><?php echo the_title() ;?></a>
                                      <span class="post-destacado-autor" ><?php echo the_author_link()?></span>
                                      <span class="ml10" ><?php the_time('j') ?> <?php the_time('M') ?> <?php the_time('Y') ?></span>
                                    </div>
                                </li>
                                  
                                
                              <?php
                                  endwhile;
                                  else :
                                    echo '<h3 class="post-destacado-autor notfound"> No hay ningún post relacionado </h3>';
                                endif;
              
                                wp_reset_postdata();
                              ?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      
      
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <span class="comment-title">Comentarios</span>
        </div>
        <div class="col-md-10 col-md-push-1">
          <ul class="comments">
            <?php
              comments_template(); //carga comments.php  si existe tenemos que insertar en ella wp_list_comments(), si no existe carga la plantilla por defecto de comentarios de WP
            ?>
          </ul>
        </div>
      </div>
    </div>
  
  
<?php 
    get_footer();
?>