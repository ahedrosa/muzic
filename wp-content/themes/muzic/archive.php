<?php 
    get_header();
    // if (have_posts() ){
    //     $total_results = $wp_the_query->found_posts;
        
    //     if ($total_results > 1){
    //         $results = $total_results.'<span class=""> Posts encotados </span>';
    //     }else if ($total_results == 1){
    //         $results = $total_results.'<span class=""> Post encotado </span>';
    //     }else{
    //         $results = '<span class=""> Ningun post encotado </span>';
    //     }
    // }
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
                        <h2 class="subpage-tilte"><?php //echo $results ?> Post(s) encontrados</h2>
                        <p>Music Journeys</p>   
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <div class="blog-featured section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        
                        
                    </div>

                    <!---- PAGINATION -->
                    <div class="row">
                        <div class="col-md-12 col-md-push-3">
                            <div class="blog-pagination">
                                <nav>
                                    <ul class="pagination">
                                        <li>
                                            <a href="#" class="pagination-arrow" aria-label="Previous">
                                                <span aria-hidden="true">←</span>
                                            </a>
                                        </li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li>
                                            <a href="#" class="pagination-arrow" aria-label="Next">
                                                <span aria-hidden="true">→</span>
                                            </a>
                                        </li>
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
