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

        <header class="slider-bg has-parallax" id="slider"> 
            <div class="container">
                <div class="row">
                    <div class="col-md-12 clearfix">
                        <div class="slider-wrap">
                            <div class="header-slider">
                                <div class="header-slide">
                                    <div class="hero-wrap">
                                        <div class="no-overflow">
                                            <div class="hero-block">
                                                <h1 class="hero-title">When music hits you </h1>
                                                <h1 class="hero-text">you feel no pain</h1>
                                                <span class="attr"> &mdash; Bob Marley</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="header-slide">
                                    <div class="hero-wrap">
                                        <div class="no-overflow">
                                            <div class="hero-block">
                                                <h1 class="hero-title hero-title-fit1">Without music, life would</h1>
                                                <h1 class="hero-text"> be a mistake.</h1>
                                                <span class="attr"> &mdash; Friedrich Nietzsche</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="header-slide">
                                    <div class="hero-wrap">
                                        <div class="no-overflow">
                                            <div class="hero-block">
                                                <h1 class="hero-title hero-title-fit">I can't go a day without</h1>
                                                <h1 class="hero-text"> listening to music</h1>
                                                <span class="attr"> &mdash; Will Grayson</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </header>


        <section class="section-padding about clearfix" id="about">

            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/particles/triangle_1.svg" alt="triangle" class="particle pos_a" data-rellax-speed="2"
                data-rellax-percentage="0.5" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/particles/triangle_1.svg" alt="triangle" class="particle pos_c" data-rellax-speed="2"
                data-rellax-percentage="0.5" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/particles/triangle_4.svg" alt="triangle" class="particle pos_d" data-rellax-speed="1"
                data-rellax-percentage="0.5" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/particles/triangle_5.svg" alt="triangle" class="particle pos_e" data-rellax-speed="3"
                data-rellax-percentage="0.5" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/particles/circle_1.svg" alt="circle" class="particle pos_f" data-rellax-speed="4"
                data-rellax-percentage="0.5" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/particles/circle_2.svg" alt="circle" class="particle pos_g" data-rellax-speed="2"
                data-rellax-percentage="0.5" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/particles/circle_5.svg" alt="circle" class="particle pos_i" data-rellax-speed="1"
                data-rellax-percentage="0.5" />

            <div class="container">
                <div class="row">
                    <div class="band-wrap">
                        <div class="col-md-8 col-md-pull">
                            <h2 class="section-title">THE BAND</h2>
                            <p class="section-subtitle">It was during a winter season that the idea of Duotone was
                                conceived. Lewis had called in John to sing a jingle for him.</p>
                            <p class="section-subtitle-thin">The restless Lewis began crooning something while strumming
                                on his guitar, John felt inspired to jam with an alaap, and the result: the seamless
                                fusion of Eastern and Western sounds that has become the quintessential characteristic
                                of the Raaga.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php
            $args = array(
                'posts_per_page' => '3',
            );
            $cont = 1;
            $green = false;
            $query = new WP_query($args);
            if($query->have_posts()):
            while($query->have_posts()):
                $query->the_post();
               
        ?>
        
        <section class="admire clearfix" id="featured-album">
            <?php 

                if(has_post_thumbnail()) {
                    $postImg = get_the_post_thumbnail_url();
                }else{
                    $postImg = get_template_directory_uri() .'/assets/images/admire-bg.jpg';
                };
            
                if($cont%2 == 0) {
                    $green = true;
                }else{
                    $green = false; 
                    
                };
                
                if(!$green):
                    print
                    '
                    <div class="object-fit-container">
                        <a href="'; echo the_permalink().'" class="">
                            <img src="'. $postImg .'" class="img-responsive compact-img" alt="admire-bg">
                        </a>
                    </div>
                    ';
                
                endif;
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-<?php if(!$green): print 'push-5'; else: print 'pull-3';endif; ?>">
                        <div class="admire-block">
                            <a href="<?php echo the_permalink(); ?>" class="userEnlace">
                                <h3 class="admire-title<?php if($green): echo'-clr'; endif; ?>">
                                    <?php the_title();?>
                                </h3>
                            </a>
                            <h4 class="admire-subtitle<?php if($green): echo'-clr'; endif; ?>">
                                <span class="userEnlace">
                                    <?php the_author_link(); ?>
                                </span>
                                <span class="h4 ml-3">
                                    <strong>&nbsp&nbsp- <?php the_time('j') ?></strong> 
                                    <em><?php the_time('F') ?></em>
                                </span>
                            </h4>
                            
                            <?php echo '<p class="admire-subtitle02">'.
                                get_the_excerpt()
                                .'</p>';
                            ?>
                            
                            <a href="<?php echo get_page_link( get_page_by_title('BLOG')->ID )?>" class="btn btn-<?php if(!$green):echo'danger';else:echo 'success';endif;?> py-3">MÁS NOTICIAS</a>
                            <a href="<?php echo the_permalink(); ?>" class="btn btn-<?php if(!$green):echo'warning';else:echo 'primary';endif;?>">LEER MÁS</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                if($green):
                print '
                        <div class="img-wrap-right">
                            <a href="'; echo the_permalink().'" class="" data-playlist-id="10">
                                <img src="'. $postImg .'" class="img-responsive compact-img" alt="admire-02">
                            </a>
                        </div>
                    
                    ';
                endif;
                $cont++;
            ?>
        </section>
                

    <?php 
    
    endwhile;
    else:
        echo "No hay post publicados, todavia";

    endif;
    
    
    wp_reset_postdata();
    

    ?>
    

        <section class="call-to-action" id="call-to-action">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="cta-title">Conoce los conciertos más novedosos a nivel nacional</h4>
                        <a href="<?php echo get_page_link( get_page_by_title('EVENTS')->ID )?>" class="btn btn-success">VISITAR</a>
                    </div>
                </div>
            </div>
        </section>


        <!---------------------PAGINATION---------------------------------->
        <!--<div class="row">-->
        <!--    <div class="col-md-12 ">-->
        <!--        <div class="blog-pagination">-->
        <!--            <nav>-->
        <!--                <ul class="pagination">-->
        <!--                  <li>-->
                          <?php
                            // $big=99999999; //se necesita un numero de pagina salido de madre para que recalcule todo
                            //   $args =array(
                            //         'prev_text' => '<span aria-hidden="true">←</span>',
                            //         'next_text' => '<span aria-hidden="true">→</span>',
                            //         'base'      => str_replace($big, '%#%', get_pagenum_link($big)),
                            //         'format'    => '?paged=%#%',
                            //         'current'   => max(1, get_query_var('paged')),
                            //         'total'     => $query->max_num_pages,
                            //     );
                            //   get_li_list(paginate_links($args),'</li><li>');
                            ?>
        <!--                </ul>-->
        <!--            </nav>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->



    </div>

    <?php 
    get_footer();
?>