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

    <section class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="subpage-wrap">
                        <h2 class="subpage-tilte">BLOG</h2>
                        <span class="subpage-subtitle">
                            Aqui podrás acceder a todos nuestros Post
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
      $args = array(
      'posts_per_page' => '1',
      'post_type'     => 'post',
      );
      $cont = 1;
      $green = false;
      $query = new WP_query($args);
        if($query->have_posts()):
        while($query->have_posts()):
        $query->the_post();
        $IDdestacado = $post->ID;
        if(has_post_thumbnail()) {
            $postImg = get_the_post_thumbnail_url();
        }else{
            $postImg = get_template_directory_uri() .'/assets/images/admire-bg.jpg';
        };
    ?>

    <section class="testimonial clearfix has-parallax" style="background-image: url(<?php echo $postImg?>); " id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-7">
                          <h2 class="section-title testimonial-titulo">Ultima Novedad</h2>
                        </div>
                      </div>
                    <div class="testimonial-space pt125">
                        <div class="container">
                            <div class="row">
                                <div class="band-wrap">
                                    <div class="col-md-9 col-md-pull-1 post-destacado">
                                      <a href="<?php echo the_permalink(); ?>" class="post-destacado-titulo"><?php echo the_title() ;?></a>
                                        <p class="post-destacado-date">
                                            <span class="post-destacado-autor" ><?php echo the_author_link()?></span>
                                            <span class="ml10" ><?php the_time('j') ?> <?php the_time('M') ?> <?php the_time('Y') ?></span>
                                        </p>
                                        <p class="section-subtitle-thin">
                                        <?php echo get_the_excerpt(); ?>
                                      </p>
                                      <div class="row">
                                          <div class="col-md-8 col-md-push-8">
                                              <a href="<?php echo the_permalink(); ?>" class="btn btn-info">READ MORE &nbsp>></a>
                                          </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php 

      endwhile;
    else:
      echo "No hay post publicados, todavia";
    
    endif;
    
    
    wp_reset_postdata();
    
    
    ?>


    <div class="blog-featured section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php
                      $paged=get_query_var('paged') > 1 ? get_query_var('paged'): 1;              
                      $args = array(
                        'posts_per_page'=> '3',
                        'post_type'     => 'post',
                        'post__not_in'  => array($IDdestacado),
                        'paged'         => $paged,
                      );
                      $cont = 1;
                      $right = false;
                      $query = new WP_query($args);
                      if($query->have_posts()):
                        while($query->have_posts()):
                          $query->the_post();



                        if(has_post_thumbnail()) {
                            $postImg = get_the_post_thumbnail_url();
                        }else{
                            $postImg = get_template_directory_uri() .'/assets/images/admire-bg.jpg';
                        };
                    
                        if($cont%2 == 0) {
                            $right = true;
                        }else{
                            $right = false; 
                        };
                        
                    ?>

                    <div class="row">
                        <div class="col-md-12 <?php if($right): echo 'col-md-push-4'; endif?>">
                            <a href="<?php echo the_permalink() ?>" class="">
                                <img src="<?php echo $postImg ?>" class="img-responsive" alt="blog-01">
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 <?php if(!$right): echo 'col-md-push-4'; endif?>">
                            <div class="blog-title-wrap">
                                <a href="<?php echo the_permalink(); ?>" class="blog-content 
                                    <?php
                                    switch (true) {
                                        case $cont%2 == 0:
                                            echo "blog-green";
                                        break;
                                        case $cont%3 == 0:
                                            echo "blog-blue";
                                        break;
                                        default: 
                                        break;
                                    };
                                    ?>"><?php echo the_title() ;?></a>
                                <p class="blog-date"><?php the_time('j') ?> <?php the_time('M') ?> <?php the_time('Y') ?></p>
                                <p class="post-destacado-autor"><?php echo the_author_link()?></p>
                            </div>
                        </div>
                    </div>
       
                    <?php 
                        $cont++;
                        endwhile;
                      else:
                        echo "No hay post publicados, todavia";

                      endif;

                      wp_reset_postdata();
                      
                    ?>
                    
                    <!---- PAGINATION -->
                    
                    <div class="row">
                        <div class="col-md-12 col-md-push-3">
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
                                                'total'     => $query->max_num_pages,
                                            );
                                          get_li_list(paginate_links($args),'</li><li>');
                                        ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                      </div>
          

                    
                </div> <!-- col-md-8 -->
                <div class="sidebar col-md-4 col-md-push-3">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>


</body>

<!-- Mirrored from demo.web3canvas.com/themeforest/duotone/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Apr 2022 12:35:16 GMT -->

</html>

<?php 
    get_footer();
?>
