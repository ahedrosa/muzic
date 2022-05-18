<?php 

    //AÑadimos soporte al tema
    
    add_theme_support('post-thumbnails');


function add_theme_scripts(){
    // Add the cascade style sheets
    
    wp_enqueue_style( 'dashicons');
    
    wp_register_style('bootstrap.min', get_template_directory_uri().'/assets/css/lib/bootstrap.min.css');
    wp_enqueue_style('bootstrap.min');
    
    wp_register_style('plugins-style', get_template_directory_uri().'/assets/css/plugins/plugins-combined.css');
    wp_enqueue_style('plugins-style');
    
    wp_register_style('theme-style', get_template_directory_uri().'/assets/css/style.css');
    wp_enqueue_style('theme-style');
    
    wp_register_style('gFonts', 'https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900%7CMontserrat:400,500,700'); 
    wp_enqueue_style('gFonts');

    wp_enqueue_style( 'style', get_stylesheet_uri() );    
    
    // Add javascripts
    wp_register_script('modernizr', get_template_directory_uri().'/assets/js/lib/modernizr-min.js', null, null, false );
    wp_enqueue_script('modernizr');
    
    wp_register_script('cosarara', get_template_directory_uri().'/assets/js/cdn-cgi/apps/head/OkbNSnEV_PNHTKP2_EYPrFNyZ8Q.js', null, null, false );
    wp_enqueue_script('cosarara');
    
    wp_register_script('flexslider', get_template_directory_uri().'/assets/js/plugins/flexslider-min.js', null, null, true );
    wp_enqueue_script('flexslider');
    
    wp_register_script('slick', get_template_directory_uri().'/assets/js/plugins/slick.min.js', null, null, true );
    wp_enqueue_script('slick');
    
    wp_register_script('fAwesome', 'https://kit.fontawesome.com/00d0ffd565.js', null, null, true );
    wp_enqueue_script('fAwesome');
    
    wp_register_script('magnific-popup', get_template_directory_uri().'/assets/js/plugins/magnific-popup.min.js', null, null, true );
    wp_enqueue_script('magnific-popup');
    
    wp_register_script('parallax', get_template_directory_uri().'/assets/js/plugins/parallax.js', null, null, true );
    wp_enqueue_script('parallax');
    
    wp_register_script('rellax', get_template_directory_uri().'/assets/js/plugins/rellax.min.js', null, null, true );
    wp_enqueue_script('rellax');
    
    wp_register_script('atvimg', get_template_directory_uri().'/assets/js/plugins/atvimg.js', null, null, true );
    wp_enqueue_script('atvimg');
    
    wp_register_script('jplayer', get_template_directory_uri().'/assets/js/plugins/jquery.jplayer.min.js', null, null, true );
    wp_enqueue_script('jplayer');
    
    wp_register_script('playlist', get_template_directory_uri().'/assets/js/plugins/jplayer.playlist.min.js', null, null, true );
    wp_enqueue_script('playlist');
    
    wp_register_script('audio-player', get_template_directory_uri().'/assets/js/audio-player.js', null, null, true );
    wp_enqueue_script('audio-player');
    
    wp_register_script('validate', get_template_directory_uri().'/assets/js/validate.js', null, null, true );
    wp_enqueue_script('validate');
    
    wp_register_script('contact', get_template_directory_uri().'/assets/js/contact.js', null, null, true );
    wp_enqueue_script('contact');
    
    wp_register_script('subscribe', get_template_directory_uri().'/assets/js/subscribe.js', null, null, true );
    wp_enqueue_script('subscribe');
    
    wp_register_script('script', get_template_directory_uri().'/assets/js/script.js', null, null, true );
    wp_enqueue_script('script');
    
    wp_register_script('decodeemail', get_template_directory_uri().'/assets/js/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js', null, null, true );
    wp_enqueue_script('decodeemail');
    
    wp_register_script('bootstrapjs', get_template_directory_uri().'/assets/js/lib/bootstrap.min.js', null, null, true );
    wp_enqueue_script('bootstrapjs');
    
    wp_register_script('jquery', get_template_directory_uri().'/assets/js/lib/jquery-1.12.0.min.js', null, null, true );
    wp_enqueue_script('jquery');
    
    wp_register_script('appsbodyjs', get_template_directory_uri().'/assets/js/cdn-cgi/apps/body/_DPJDACzCh_ZdoTN9-DzOFjxAdM.js', null, null, true );
    wp_enqueue_script('appsbodyjs');
    
    
    //Solucion para que no salte el error de version de jquery de bootstrap en wp
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js', false, null);
    wp_enqueue_script('jquery');

};


add_action('wp_enqueue_scripts', 'add_theme_scripts');


    function bps_masonry () {
        
        wp_enqueue_script('masonry-js', '//unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', array('jquery'));
        wp_enqueue_script('masonry-init', get_template_directory_uri(). '/assets/js/lib/masonry-init.js', array('masonry'), 1, true); 
    
            
    };

add_action( 'wp_enqueue_scripts', 'bps_masonry' );
    
    function general_widgets_init(){
        if(function_exists('register_sidebar')):
        register_sidebar( array(
            'name' => 'Sidebar Widgets',
            'id' => 'sidebarW',
            'description' => 'Sidebar Widget Area',
            'before_widget' => '<div class>',
            'after_widget' => '</div>',
            )
            );
         register_sidebar( array(
  	        'name' =>'Author Widgets',
  	        'id'=>'deus', //id unico del widget
  	        'description'=>'Author Widget Area',
  	        'before_widget' => '<div class="tags font-serif">',
  	        'after_widget' => '</div>',
  	    ));
            
       endif;     
            
    };
    add_action('widgets_init', 'general_widgets_init');
    
    

    function capitalize($str){
        
        $str = str_replace(
            array('Á', 'É', 'Í', 'Ó','Ú'),
            array('á', 'é', 'í', 'ó','ú'),
            $str
        );
        
        $str = strtolower($str);
        $str = ucwords($str);
        
        return $str;
    };


    function get_tag_list($limit){
      $args = array(
          'number'  => $limit,
          'orderby'=> 'count',
          'order'=> 'DESC',
          );
      //recogemos en un array la coleccion de tags
      $my_tags = get_tags($args);
      
      foreach ($my_tags as $tag){
        echo
        '<li>
             <a href="'. get_tag_link($tag->term_id) .'">
                <i class="fa-solid fa-tag"></i>
                <span class="attr">'
                    . ucwords( $tag->name ) .
                '</span> </a>
        
         </li>';
      };
      
    };

    function get_authors_list(){
        $args = array(
            'echo' => false,
            'hide_empty' => false,
            'optioncount' => true,
            'orderby' => 'post_count',
            'order' => 'DESC',
        );
        
        get_li_list(wp_list_authors($args), '<i class="fa-solid fa-user"></i>');
        
    };


    /**
     * Filter hook que inserta una custom-class a las clases de la etiqueta img en WP
     */
    function add_img_responsive( $content ){
        if ($content=='') return;  // si no tengo contenido en el post me largo sin hacer nada
            
        // convertimos el contenido a una codificación HTML en UTF8
        $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
        $document = new DOMDocument(); // Representa al documento html
        // Deshabilitamos los errors libxml y habilita el manejo por parte del usuario -true-
        libxml_use_internal_errors(true);
        // Cargamos el contenido del post en el objeto DOMDocument
        $document->loadHTML(utf8_decode($content));
        // Recogemos en el array $imgs todos los tags img que tenga el documento
        $imgs = $document->getElementsByTagName('img');
        // Los recorremos y a cada uno le asignamos el atributo class con el valor img-responsive
        
            foreach ($imgs as $img) {          
              $img->setAttribute('class','img-responsive');
              $img->setAttribute('width', '100%');
              $img->setAttribute('height', 'auto');
              /* Si tuviese una clase que quisiésemos conservar...
              $existing_class = $img->getAttribute('class');
              $img->setAttribute('class', "img-responsive $existing_class");
              */
            }
        
        // Salvamos los cambios
        $html = $document->saveHTML();
        return $html;
         
    }
    add_filter('the_content','add_img_responsive');


    function get_li_list($list, $hyphen){
        if($hyphen == ''){
            $list =  preg_replace('/<a/',' &mdash; <a',$list);
            echo $list;
        }else{
            $list =  preg_replace('/<a/', $hyphen. ' <a',$list);
            echo $list;
        };
    };
    
    function limitar_cadena($cadena, $limite, $sufijo){
	// Si la longitud es mayor que el límite...
	if(strlen($cadena) > $limite){
		// Entonces corta la cadena y ponle el sufijo
		return substr($cadena, 0, $limite) . $sufijo;
	}
	
	// Si no, entonces devuelve la cadena normal
	return $cadena;
    }
    
   
    
        
    /*
    *   Actualizar el contador de visitas de un post -> solo se invoca en single.php
    *  @param post_id int post ID
    */
     
    function add_num_views( $post_id ){
        
        $numviews = 1;
        //Checkear que existe ya el contador de visitas y si no existe crearlo
        
        if( !add_post_meta($post_id,'numviews', $numviews,true)  ){ //la funcion que crea un campo al post es add_post_meta si da false te crea el campo
                            //(ID  |Nombre campo |numero  | si es simple o estructurado)
                //El contador ya existe, le tenemos que sumar una visita mas
                $numviews = get_post_meta($post_id,'numviews',true) + 1;
                
                //Actualizamos el campo contador de visitas con el nuevo numero de visitas
                
                update_post_meta($post_id, 'numviews',$numviews);
                
            
        }
        
        return $numviews;
        
    } 
    
    
    /*
    *   Obtener num de visitas de un post -> solo se invoca en single.php
    *  @param post_id int post ID
    */
    
    function get_num_views($post_id){
        
        $numviews = get_post_meta($post_id, 'numviews', true);
        
        if(empty($numviews)) $numviews = 0;
        
        
        if( $numviews == 1){
            
            $prefix = '<i class="fa-regular fa-eye"></i> ';
            
            
            
        }else{
            $prefix = '<i class="fa-regular fa-eye"></i> ';
        }
        
        
        return $prefix .''. $numviews;
        
    };
    
    
    function get_stars($nota){
        
        $stars = str_repeat('<i class="fa-solid fa-star"></i>', floor($nota));
        $stars .= ($nota - floor($nota)) ? '<i class="fa-regular fa-star-half-stroke"></i>' : '' ; 
        $stars .= str_repeat('<i class="fa-regular fa-star"></i>',(5 - ceil($nota)));
        return $stars;            
        
    }
    
    
    function get_string_between($string, $start, $end){
    	$string = " ".$string;
    	$ini = strpos($string,$start);
    	if ($ini == 0) return "";
    	$ini += strlen($start);   
    	$len = strpos($string,$end,$ini) - $ini;
    	return substr($string,$ini,$len);
    }
    
    
    // ------------------------------------------------------------ COMENTARIOS ------------------------------------------------
    
    
    
    /*
    
    *   Borrar el campo url del formulario de comentarios
    *   
    *   @param $fields array List con los campos del tipo de comentarios -> nos lo provee el hook comment_form_default_fields
    
    */
    
    
    function remove_comment_fields( $fields ){
        
        unset( $fields['url'] ); //Esto lo que hace es el eliminar la ulr 
        
        return $fields;
        
    }
    
    
    add_filter('comment_form_default_fields','remove_comment_fields');
    
    
    //Modificar los campos Autor, Email y Sitio web del formulario de comentarios
    function apk_modify_comment_fields( $fields ) {
    
            	//Variables necesarias para que esto funcione
        $commenter = wp_get_current_commenter();
    	$req = get_option( 'require_name_email' );
    	$aria_req = ( $req ? " aria-required='true'" : '' );
    
    	$fields =  array(
    
    	  'author' =>
    	    '<input id="author" class="form-control form-single form-width form-primary" name="author" type="text" value="'
    	    . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' placeholder="' . __('Tu nombre', 'apk') . '" required/>', //Editamos el campo autor
    	
    	  'email' =>
    	    '<input id="email" class="form-control form-single form-width" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    	    '" size="30"' . $aria_req . ' placeholder="' . __('Tu email', 'apk') . '" required />', //Editamos el campo email
    	                                                                                                                                                          /* ↓↓↓  . $consent  .*/
    	   'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" />' .
             '<label for="wp-comment-cookies-consent"> ' . __( 'Save my name, email, and website in this browser for the next time I comment.' ) . '</label></p>',
    	); 
    	
    	return $fields;
    	
    }
    
    add_filter('comment_form_default_fields', 'apk_modify_comment_fields');
    
     
    
    function as_adapt_comment_form( $arg ) {
        
    
        // return the modified array
        return $arg;
    }
    
    // run the comment form defaults through the newly defined filter
    add_filter( 'comment_form_defaults', 'as_adapt_comment_form' );
    
    
    
    
    
    /*
    
    * Add checkbox de politicas de privacidad
    *   
    *   @param $fields array List con los campos del tipo de comentarios -> nos lo provee el hook comment_form_default_fields
    
    */
    
    
    
    
    function add_RGPD_consent( $fields ){
        
        $fields['consent'] = '<p class="consent-block">'. '<input type = "checkbox" name="consent" id="consent" />'.
        '<label for="consent" > Debe checkear el boton para poder aceptar el consentimiento y poder comentar'.'(Acceptas la <a href="'.get_page_link(get_page_by_title("Politica De Privacidad")->ID).'"> Politica De Privacidad</a>'.')</label>'.'</p>';
        
    
        return $fields;
        
    }
    
    
    
    add_filter('comment_form_default_fields','add_RGPD_consent');
    
    
    /*
    
    * Reordenar el formulario de comentarios
    *   
    *   @param $fields array List con los campos del tipo de comentarios -> nos lo provee el hook comment_form_fields
    
    */
    
    function reorder_comments_fields( $fields ){
        
        //Si el usuario no esta logueado 
        if( !is_user_logged_in() ){
            
            $aux_fields = array();
            
            array_push( $aux_fields, $fields['author']); //se le pasa el nombre del comentarista que es el author
            array_push( $aux_fields, $fields['email']); //cuenta de correo
            array_push( $aux_fields, $fields['comment']); //textarea
            array_push($aux_fields, $fields['cookies']); //checkbox de las cookies
            array_push($aux_fields, $fields['consent']);  //checkbox para el consentimiento
            return $aux_fields;
            
        }else{
            return $fields;
        }
    }
    
    add_filter('comment_form_fields', 'reorder_comments_fields');
    
    
    /*
    
    * Vamos a crear una nueva columna para el consentimiento en el backend de WP de comments
    *   
    *   @param $columns array List que tiene las columnas del area de comentarios -> nos la provee el hook manage_edit-commments_columns !!!!IMPORTANTE ENTRE EDIT Y COMMENTS ES - MEDIO
    
    */
    
    function create_consent_column( $columns ) {
          $columns = array (
              'cb' => '<input type="checkbox">',
              'author' => 'Autor',
              'comment' => 'Comentario',
              'consent' => 'Consentimiento',
              'response' => 'En respuesta a',
              'date' => 'Enviado el',
              );
              
              return $columns;
             
      }
      
      //Este modifica la salida por pantalla de los campos que ofrece Wp
      add_filter('manage_edit-comments_columns', 'create_consent_column');
    
    
    /*
    
    * guardamos la politica de privacidad en la BD de WP
    *   
    *   @param $comment_id int Comment ID -> lo suministra el hook comment_post
    */
    
    
    function save_comment_consent($comment_id){
        
        if( isset ($_POST['consent'] ) ){
                
            $response = "El checkbox fue checkeado. Ha aceptado la politica de privacidad";
                
                
        }else{
        
            if( is_user_logged_in() ){
                        
                    $response = "Usuario Logeado, Politica de Privacidad aceptada al registrada";
                        
                }else{
                        
                    $response = "El checkbox NO fue checkeado. No ha aceptado la politica de privacidad";
                        
                }
        }
            
        
        
        // if($consent_value){
            
        //     $valor = "El checkbox fue checkeado. A aceptado la politica de privacidad";
            
        // } else{
            
        //     $valor = "El checkbox no fue checkeado. No ha aceptado la politica de privacidad";
        // }
        
        add_comment_meta($comment_id,'consent', $response ,true);
    }
    
    add_action('comment_post','save_comment_consent');
    
    
    /*
    
    * Display the privacy policy consent comments admin-area
    *   
    *   @param $comment_id int Comment ID 
    
        @param $column string Comment Admin Area column name -> lo suministra el hook manage_comments_custom_column
    */
    
    
    function show_comment_consent( $column,$comment_id){
        
        if($column == 'consent'){
            echo get_comment_meta($comment_id,'consent',true);
        }
        
    
    }
    
    add_action('manage_comments_custom_column','show_comment_consent',1,2); //aqui vamos a meter de tercer parametro que es la prioridad de los argumentos
    // ya que le vamos a enviar 2 parametros a la funcion  de callback le ponemos 1 por que es el primero que vamos a ejecutar
    
    
    
    
     function better_comments($comment, $args, $depth) {
          $GLOBALS['comment'] = $comment;
            extract($args, EXTR_SKIP);
            $comment_id = get_comment_ID();
           
            ?>
        
           <!--Comentarios-->
           <li class="comment-wrap">
                
                <?php 
                
                    $user_email = get_comment_author_email( $comment_id );
                    
                      
                        echo get_avatar( $user_email ,165, 'mysteryman' ,'comment',null );  
                        
                            //echo  get_avatar_url(get_the_author(),120,'mysteryman','User Gravatar',Null);
                
                
                
                ?>
                <div class="comment-comment">
                    <p><?php comment_text() ?></p>
                  <span><?php echo get_comment_author() ?> • <?php echo get_comment_date() ?></span>
                  <span class="comment-reply"><a href="#reply-title">REPLY</a></span>
                </div>
                <div class="clearfix"></div>
          </li>
          
          
    <?php
    
    };
    

    // ------------------------------------ FIN COMENTARIOS ------------------------------------------------------------------------------------------------




