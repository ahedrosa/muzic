<?php

    /*
    
    *   Plugin Name: Custom Post Eventos
      
    *   Plugin URI: PAGINA DONDE DESCARGAR EL PLUGIN
        
    *   Description: Custom Post Type for music news blog
        
    *   Author: alexh
    
        Version: 1.1.0
        
        Author URI: PAGINA DEL AUTHOR
        
        Licencia: GNU license
    */
    
    
   //Evitar que el plugin se ejecutar tecleeando su url en el campo direccion del navegador
    
   defined('ABSPATH') or die('GAME-OVER'); //si esta definida la variable ABSPATH se ejecuta desde el WP, si no esta corto el codigo ahi 
  
  class Evento {
       
         
         public $plugin_name;
         
         
         function __construct(){
             
            $this->plugin_name = plugin_basename(__FILE__); //Esto devuelve la ruta eventos/eventos.php
            add_shortcode('show_custom_fields', array( $this, 'show_custom_fields_callback'));
            add_shortcode('show_custom_fields_single',array( $this, 'show_custom_fields_single_callback'));
            add_shortcode('show_custom_fields_single_dinamic',array( $this, 'show_custom_fields_single_dinamic_callback'));
            add_shortcode('get_option_ppp', array( $this, 'print_post_per_page_callback'));
            
         }
         
         function execute_actions(){
             
             //Especificar los paneles de los que va a constar nuestro custom_post_type en el admin-area
             
             // y registrar el custom_post_type. Para ello tenemos que usar el hook 'init'
             
             
            add_action('init',array($this,'Evento_post_type'));
            //Añadimos la metabox
            add_action('add_meta_boxes',array($this,'Evento_metabox'));
              
            add_action('add_meta_boxes',array($this,'Evento_metabox_custom_field'));
            //Guardar los custom post field en la BD 
            add_action('save_post',array($this, 'save_post_custom_fields'));
            
            
            //Añadir hoja de estilos del plugin FRONTEND-> creamos una funcion de callback asociada al hook wp_enqueue_scripts
            add_action('wp_enqueue_scripts', array($this, 'put_in_queue') );
            //Añadir hoja de estilos DINAMICAMENTE INJECTADOS del plugin FRONTEND-> creamos una funcion de callback asociada al hook wp_enqueue_scripts
            add_action('wp_enqueue_scripts', array($this, 'events_css_injection') );
            
            //Añadir scripts de js al plugin FRONTEND -> creamos una funcion de callback asociadoa al hook
            
            
            //Añadir hoja de estilos del plugin BACKEND-> creamos una funcion de callback asociada al hook wp_enqueue_scripts
            //Añadir scripts de js al plugin BACKEND -> creamos una funcion de callback asociadoa al hook
            add_action('admin_enqueue_scripts', array($this, 'admin_put_in_queue') );
            
            
            //Añadir una opcion en el dashboard para los settings del plugin -> usaremos el hook 'admin menu'
            
            add_action('admin_menu',array($this,'Evento_admin_page'));
            
            add_action('admin_menu',array($this,'Evento_admin_page_second_level'));    
        
            
            
            
            //agreamos los campos dinamicos al custom post type
            //add_action( 'add_meta_boxes', 'my_custom_codes_init_func' );
            //salvamos los cambios de los campos
            //add_action('save_post', 'save_my_post_meta');
             add_action('admin_footer', array($this,'my_admin_footer_script'));
            //Añadir opción de settings al plugins  al panel del plugin en la pagina de plugins
            
            
            add_filter("plugin_action_links_$this->plugin_name",array($this,'events_settings_link')); //IMPORTANTE PONER COMILLAS DOBLES EXPANDEN LOS NOMBRES DE VARIABLES POR ESO LO USAMOS AQUI
        
            //Registramos los settings
            add_action('admin_init', array($this,'Evento_register_settings'));
            
            /*
            
            *
            *
            * 
            */

            add_action('admin_notices',array($this,'Evento_admin_notice'));            
            
         }
         
         
         function show_custom_fields_callback( $atts ){
             
             $postID = shortcode_atts(array(
                    'id' => 1,
                 ),$atts);
             
             $post_id = $postID['id']; 
             
             ?>
             <!------------------------------------------------------------------------------------------custom post box front.------------------------------------------------------------------------------------------------->
                <div class="col-md-12 clearfix p0">
                  <div class="header-slide">
                    <div class="hero-wrap">
                      <div class="no-overflow">
                          <div class="hero-block">
                              <h4 class="hero-title">
                                  <i class="fa-solid fa-user-check"></i>
                                  <?php
                                      $artists = get_post_meta($post_id, 'artist', true);
                                      echo $artists[0];
                                  ?>
                              </h4>
                              <div class="att-box">
                                  <div class="att att-1" title="Fecha del Evento">
                                      <i class="fa-solid fa-calendar-day"></i>
                                      <span><?php $fecha = get_post_meta($post_id, 'evento_fecha',true); echo date("j M Y", strtotime($fecha));  ?></span>
                                  </div>
                                  <div class="att att-2" title="Precio minimo por entrada">
                                      <i class="fa-solid fa-money-bill-1-wave"></i>
                                      <span><?php echo get_post_meta($post_id, 'evento_precio', true); ?></span>
                                  </div>
                                  <div class="att att-4" title="Localizacion del Evento">
                                      <i class="fa-solid fa-location-dot"></i>
                                      <span><?php echo get_post_meta($post_id, 'evento_lugar', true); ?></span>
                                  </div>
                                  <div class="att att-3" title="Valoracion Muzic®">
                                      <span>Valoración Muzic®</span><br>
                                      <?php echo get_stars(get_post_meta($post_id, 'evento_nota', true)); ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
             
             <?php
             
         }
         
         
         function show_custom_fields_single_callback( $atts ){
             
             $postID = shortcode_atts(array(
                                        'id' => 1,
                                     ),$atts);
             
             $post_id = $postID['id']; 
             $ntickets = get_post_meta($post_id, 'evento_nentradas', true);
             $www = get_post_meta($post_id, 'evento_vonline', true);
             ?>
                <div class="col-md-12 clearfix p0">
                    <div class="header-slide">
                        <div class="hero-wrap p0">
                            <div class="no-overflow">
                                <div class="hero-block">
                                    <h4 class="hero-title" title="">
                                        EVENTO 
                                        <i class="fa-solid fa-circle-info"></i>
                                    </h4>
                                    <div class="cpt-atts-box">
                                        <div class="cpt-att cpt-att-1 l" title="Fecha del Evento">
                                            <i class="fa-solid fa-calendar-day"></i>&nbsp
                                            <span><?php $fecha = get_post_meta($post_id, 'evento_fecha',true); echo date("j M Y", strtotime($fecha)); ?></span>
                                        </div>
                                        <div class="cpt-att cpt-att-2 r" title="Lugar Dónde se Realizará el Evento">
                                            <span><?php echo get_post_meta($post_id, 'evento_lugar', true); ?></span>&nbsp
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <div class="cpt-att cpt-att-3 l" title="Precio Minimo por Entrada">
                                            <i class="fa-solid fa-money-bill-1-wave"></i>&nbsp
                                            <span><?php echo get_post_meta($post_id, 'evento_precio', true); ?></span>
                                        </div>
                                        <div class="cpt-att cpt-att-4 r" title="Número de Entradas Disponibles">
                                            <span><?php echo ($ntickets==100) ? '100+' : (($ntickets==0) ? 'Entradas Agotadas' : $ntickets) ?></span>&nbsp
                                            <i class="fa-solid fa-ticket"></i>
                                        </div>
                                        <div class="cpt-att cpt-att-5 l" title="Plataforma Online de Venta">
                                            <i class="fa-solid fa-credit-card"></i>&nbsp
                                            <span><a href="<?php echo $www;?>"><?php echo capitalize(get_string_between($www,'w.','.'));?></a></span>
                                        </div>
                                        <div class="cpt-att cpt-att-6 r" title="Lugar de Venta Física">
                                            <span><?php echo get_post_meta($post_id, 'evento_vfisica', true); ?></span>&nbsp
                                            <i class="fa-solid fa-shop"></i>
                                        </div>
                                        <div class="cpt-att cpt-att-7" title="Nota Propuesta por Nuestros Expertos de 0 a 5 que Evalúa Cuánto Recomiendan el Evento">
                                            <span>Valoración Muzic®</span><br>
                                            <?php echo get_stars(get_post_meta($post_id, 'evento_nota', true)); ?>
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
         }
         
        function show_custom_fields_single_dinamic_callback( $atts ){
             
            $postID = shortcode_atts(array ('id' => 1, ), $atts );
            $post_id = $postID['id']; 
            
            $artists =   get_post_meta($post_id, 'artist', true);
            $times   =   get_post_meta($post_id, 'time', true);
             
        ?>
            <div class="col-md-12 clearfix p0">
                <div class="header-slide">
                    <div class="hero-wrap p0">
                        <div class="no-overflow">
                            <div class="hero-block">
                                <h4 class="hero-title" title="">
                                    CARTEL
                                    <i class="fa-solid fa-id-card-clip"></i>
                                </h4>
                                <div class="cpt-atts-box box2">
                                    <?php
                                        if( isset($artists) && is_array($artists) && isset($times) && is_array($times) ){
                                                
                                            foreach ($artists as $n => $artist){
                                            ?>
                                                <div class="cpt-att artista" title="Artista">
                                                    <i class="fa-solid fa-user-check"></i>
                                                    <span><?php echo $artist ?></span>
                                                </div>
                                                <div class="cpt-att hora" title="Hora">
                                                    <i class="fa-solid fa-clock"></i>
                                                    <span><?php echo $times[$n] ?></span>
                                                </div>
                                              
                                            <?php    
                                            };
                                            
                                        };
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
         
         <?php
         
         }
         
         
//Settinggggs COLORSS  ------------------------------------------------------------------------------------------------ ⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙⚙       
         function events_css_injection(){
            /* Los estilos inyectados para aplicar los settings no pueden ir en el constructor de la clase 
            porque se mandarían antes que las cabeceras del protocolo y daría error en la biblioteca de 
            medios y en la actualizacion de los posts.*/
             
             
            // Recogemos los valores de los settings que están en el array events_settings
             $option = get_option('events_settings');
             $style_injection = '';
             $style_injection .= '
                
                .events .hero-block{
                    border-color: '.$option['e_color'].' !important ;
                }
                .events .hero-title{
                    color: '.$option['e_color'].' !important ;
                }
                .events .hero-title:before, .events .hero-title:after{
                    background-color: '.$option['e_color'].' !important ;
                }
                .cpt-atts-container i, .cpt-box i{
                    color:'.$option['e_color2'].';
                }
             
             ';
             
            /* Inyectamos los nuevos estilos los estilos con los valores de los settings en la hoja de estilos
             del front end*/
             wp_add_inline_style('eventos_front_css', $style_injection);
         }
         
         
         function print_post_per_page_callback(){
             $options = get_option('events_settings');
             return $options['e_ppp'];
             
         }
         
         
         
         // My custom codes will be here
    
         
         
         
         
         /*
         *
         *Registrar my custom post type 
         *
         */
        function Evento_post_type(){
            
            //Establecer los paneles que vamos a activar para el custom post type en el admin area
            
            $supports = array(
                'title', //titulo del post
                'editor', //Para poder meterle contenido al posts
                'excerpt', //Panel para indicar la sinopsis del post
                'thumbnail', //Panel para especificara una imagen representativa del post
                'comments', //Panel que permite habilitar o no comentarios para el post en su caso manejarlos
                //'custom-fields' //Panel para crear custom-post-fields
                );
            
            //Establecer las etiquetes que se mostraran en el admin area para el manejo del custom post type
            
            $labels = array(
                'name' => _x('My Events','plural'),
                'singular_name' => _x('My Event','singular'),
                'menu_name' => _x('My Events', 'admin menu'),
                'menu_admin_bar' => _x('My Events', 'admin bar'),
                'add_new' => _x('Add New Event', 'add_new'),
                'all_items' => __('All Events'),
                'add_new_item' => __('Add New Event'),
                'view_item' => __('View Event'),
                'search' => __('Search Event'),
                'not_found' => __('Not Events Found...')
                );
            
            
            //Resto de argumentos
            $args = array(
                'supports' => $supports, //habilitamos los respectivos paneles en el admin area
                'labels' => $labels, //Establece las etiquetas para alas secciones y acciones del custom post type 
                'public' => true,  //Hacemos visible nuestro custom post type tanto para el admin area como para el front-end
                'query_var' => true, //Nuestro custom post type sera accesible cuando instanciemos una WP_Query
                'hierarquical' => false,  //Nuestro custom post type no va a tener custom post type hijos
                'show_in_menu' => true, //Es obligatorio especificarlo si queremos colocar nuestro item en la barra del menu (necesario para usar menu_position)
                'menu_position' => 5,  //Especificamos la posicion en la que queremos
                'menu_icon' => 'dashicons-format-audio',
                'taxonomies' => array('tags','post_tag'),
                'has_archive' => true,
                'show_in_rest' => true, //Para elegir el editor vusiual, true =>  es el editor Gutemberg, false => editor clasico
            
                );
            
            //Registro del custom post type
            
            
            register_post_type('eventos', $args);
            
            //Registrar el custom post type en la taxonomia de WP
            
            $args = array(
                'show_admin_column' => true,
                'hierarquical' => false,
                'label' => 'My Event Tags',
                'rewrite' => true, //Que se guarde todo
                'query_var' => true,
                );
            
            register_taxonomy('events', 'eventos', $args);  //Slug es el primer argumento, segundo el nombre del register_post_type
            
            //Refrescamos la taxonomia de wp
            flush_rewrite_rules();
            
            //Activar los paneles de categorias y tags:
            
            register_taxonomy_for_object_type('category', 'eventos');
            register_taxonomy_for_object_type('post_tag', 'eventos');
        }
        
        
        
        public function Evento_metabox($screens){
            //Tenemos que crear la metabox en todas las pantallas donde aparezca el custom post type
            //Para ello nos vamos a ayudar en la clase WP_Screen
            $screens=array('eventos'); //Mete en un array todos los objetos de la clase WP_Screen(te permite saber si estas en una pantalla donde esta tu custom post type) que contenga nuestro custom-post-type
            //Añadir la metabox
            foreach($screens as $screen){
                //          atributo id     Titulo de la metabox    Funcion de callback    objeto WP_Screen    Contexto
                add_meta_box('meta-event','Detalles del Evento', array($this,'Evento_metabox_callback'),$screen,'advanced');
                //La funcion de callback de add_meta_box se una para dibujar los custom_post_field con etiquetas HTML
             
            }
                
            
            
        }
        
        
        public function Evento_metabox_custom_field(){
            //Mete en un array todos los objetos de la clase WP_Screen(te permite saber si estas en una pantalla donde esta tu custom post type) que contenga nuestro custom-post-type
            //Añadir la metabox
      //Mete en un array todos los objetos de la clase WP_Screen(te permite saber si estas en una pantalla donde esta tu custom post type) que contenga nuestro custom-post-type
            
         $screens=array('eventos'); //Mete en un array todos los objetos de la clase WP_Screen(te permite saber si estas en una pantalla donde esta tu custom post type) que contenga nuestro custom-post-type
            //Añadir la metabox
            foreach($screens as $screen){
              add_meta_box('meta-event2', 'Artistas Invitados', array($this,'my_custom_metabox_func'), $screen, 'advanced' );
  
            }
        }
        
        /*
        * Funcion de callback de add_meta_box que dibuja los custom-post-fields del custom-post-type
        * @param $post Object of class post
        */
        
        public function Evento_metabox_callback($post){
            //Crear un campo NONCE que se va a utilizar como medida de seguridad para comprobar que todas las peticiones salen de nuestro sitio web y no de otro malintencionado
            wp_nonce_field(basename(__FILE__), 'events_nonce');
            
            //Harvesting
            
            
            $date = get_post_meta($post->ID, 'evento_fecha',true);
            $place = get_post_meta($post->ID, 'evento_lugar',true);
            $price = get_post_meta($post->ID, 'evento_precio',true);
            $ntickets = get_post_meta($post->ID, 'evento_nentradas',true);
            $grade = get_post_meta($post->ID, 'evento_nota',true);
            $web = get_post_meta($post->ID, 'evento_vonline',true);
            $shop = get_post_meta($post->ID, 'evento_vfisica',true);
            //Dibujamos los campos con etiquetas HTML
            echo '<div class="details">';
            ?>
            
            <h2>Detalles</h2>
            <div class="custom-form">
                <div class="custom-field">
                    <label for="evento_fecha">Fecha: </label>
                    <input type="date" id="evento_fecha" name="evento_fecha" value="<?php echo $date;?>" >
                </div>
                <div class="custom-field">
                    <label for="evento_lugar">Lugar: </label>
                    <input type="text" id="evento_lugar" name="evento_lugar" value="<?php echo $place;?>" size="14">
                </div>
                <div class="custom-field">
                    <label for="evento_precio">Precio Mínimo Entrada: </label>
                    <input type="text" id="evento_precio" name="evento_precio" value="<?php echo $price;?>" size="14">
                </div>
                <div class="custom-field" id="range">
                    <label for="evento_nentradas">Entradas Disponibles: </label>
                    <input type="range" min="0" max="100" step="2" id="evento_nentradas" name="evento_nentradas" value="<?php echo $ntickets;?>">&nbsp
                    <span id="valor" > <?php echo ($ntickets==100) ? '100+' : (($ntickets) ? $ntickets : '50')?></span>
                </div>
                <div class="custom-field">
                    <label for="evento_nota">Valoración Muzic®: </label>
                    <input type="number" step="0.5" min="0.0" max="5" id="evento_nota" name="evento_nota" value="<?php echo $grade;?>" size="14">
                </div>
                <div class="custom-field">
                    <label for="evento_vonline">Plataforma de Venta Online: </label>
                    <input type="text" id="evento_vonline" name="evento_vonline" value="<?php echo $web;?>">
                </div>
                <div class="custom-field">
                    <label for="evento_vfisica">Lugar de Venta Física: </label>
                    <input type="text" id="evento_vfisica" name="evento_vfisica" value="<?php echo $shop;?>" size="50">
                </div>
            </div>
            
            <?php
            echo '</div>';
            
        }
        
         /*
        * Funcion de callback que guardara los custom post field en la base de datos
        * @param $post_id int post ID
        */
        
        public function save_post_custom_fields($post_id){
            //No podemos salvar si etsamos en autosave,revision o el campo nonce falla
            
            //Comprobar si estamos en autosave
            $is_autosave = wp_is_post_autosave($post_id);
            //Comprobar si estamos en revision
            $is_revision = wp_is_post_revision($post_id);
            //Verificar el cmapo nonce, para ello vamos a usaar la funcion wp_verified_nonce que verifica que el campo nonce es correcto y no ha expirado con respecto a una accion especifica
            //parametro de wp_verified_nonce (valor del campo nonce que debe estar en el superglobal $_POST , el archivo desde el que se hace)
            $is_valid_nonce =(isset($_POST['events_nonce']) && wp_verify_nonce($_POST['events_nonce'], basename(__FILE__) )) ? 'true' : 'false' ;
            
            if($is_autosave || $is_revision || !$is_valid_nonce){
                return;
            }
            
            //Comprobar que el usuario tiene los permisos suficientes. Para ello vamos a usar la funcion current_user_can(accion que estoy preguntado , sobre que se ejecuta la accion)
            if(!current_user_can('edit_post',$post_id)){
                return;
            }
            
              $allowed = array(
                    'a' => array( // on allow a tags
                    'href' => array() // and those anchors can only have href attribute
                )
            );
                
            // now we can actually save the data
           
            // If any value present in input field, then update the post meta
            if(isset($_POST['artist']) && isset($_POST['time'])) {
                // $post_id, $meta_key, $meta_value
                
                 update_post_meta( $post_id, 'artist', $_POST['artist'] );
                 update_post_meta( $post_id, 'time', $_POST['time'] );
            }
            
            
            if(isset($_POST['evento_fecha'])){
                //Saneamos los valores de los campo para intentar evitar inyecciones de codigo con la funcion sanetize_text_field()
                $date = sanitize_text_field($_POST['evento_fecha']);
                $place = sanitize_text_field($_POST['evento_lugar']);
                $city = sanitize_text_field($_POST['evento_precio']);
                $ntickets = sanitize_text_field($_POST['evento_nentradas']);
                $grade = sanitize_text_field($_POST['evento_nota']);
                $web = sanitize_text_field($_POST['evento_vonline']);
                $shop = sanitize_text_field($_POST['evento_vfisica']);
                //Guardamos los campo con update_post_meta()
                
                update_post_meta($post_id,'evento_fecha',$date);
                update_post_meta($post_id,'evento_lugar',$place);
                update_post_meta($post_id,'evento_precio',$city);
                update_post_meta($post_id,'evento_nentradas',$ntickets);
                update_post_meta($post_id,'evento_nota',$grade);
                update_post_meta($post_id,'evento_vonline',$web);
                update_post_meta($post_id,'evento_vfisica',$shop);
                
           
               
            }
            
            //echo '<pre>' . var_export($_POST, true) . '</pre>';
             //   die();
            
            
        }
        
        
       /*
        * Funcion de callback que carga las hojas de estilo y los js para el FRONT END
        * @param $post_id int post ID
        */
       
       
       
       
       
         /*-------------------------------------------------CAMPOS DINAMICOS----------------------------------*/
         
         
         
         function my_custom_codes_init_func() {
            //$id, $title, $callback, $page, $context, $priority, $callback_args
          
        }
        
      function my_custom_metabox_func() {
          
                global $post;
                
                $artist =   get_post_meta($post->ID, 'artist', true);
                $time =   get_post_meta($post->ID, 'time', true);
                
                if($artist){ 
                    $array_num = count($artist);
                }
            ?>
            <div class="input_fields_wrap">
                <h1></h1>
                <a class="add_field_button button-secondary">Add Field</a>
                <br>
                <br>
                <?php
                if((isset($artist) && is_array($artist))&& (isset($time) && is_array($time))) {
                    $i = 1;
                    $output = '';
                    
                   for ($x = 0; $x < $array_num; $x++) {
                        //echo $text;
                        
                            $output = '<div><br><input id="material" type="text" name="artist[]" placeholder="Artista:" value="' . $artist[$x] . '"><input type="time" min="1" max="100" name="time[]" value="' . $time[$x] . '">';
                            
                            if( $i !== 1 && $i > 1 ) $output .= '&nbsp<a href="#" class="remove_field button-secondary">Remove</a><br></div>';
                            else $output .= '</div>';
                            
                            echo $output;
                            $i++;
                    
                    }
                    
                }else{
                    echo '<div><input placeholder="Artista:" type="text" name="artist[]"><input placeholder="Hora Actuacion:" type="time" min="1" max="100" name="time[]" size="14"></div>';
                }
            ?>
            </div>
                
                <?php
            }
        
        
        
        
       

        function save_my_post_meta($post_id) {
            // Bail if we're doing an auto save
            if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
        
            // if our current user can't edit this post, bail
            if( !current_user_can( 'edit_post' ) ) return;
        
            // now we can actually save the data
           
            // If any value present in input field, then update the post meta
            if(isset($_POST['artist'])) {
                // $post_id, $meta_key, $meta_value
                
            }
        }
        
       
          /*-------------------------------------------------CAMPOS DINAMICOS----------------------------------*/
       

        function my_admin_footer_script() {
            $screen = get_current_screen();
            // echo '<pre style="margin: 0 300px;">' . var_export(get_current_screen(), true) . '</pre>';
            if( $screen->id == 'eventos'){ //Con esta comparación me aseguro de que me encuentro en la pagina de añadir/editar un CPT
                                            // si global post se ejecuta en otra página distinta, $post se queda vacía y saltan errores.
            
                global $post;
    
                $artist =   get_post_meta($post->ID, 'artist' , true);
                $time =   get_post_meta($post->ID, 'time' , true);        
                $x = 1;
                if(is_array($artist) && is_array($time)) {
                    $x = count($artist);
                    
                    
                    }
                
                if(  'eventos' == $post->post_type ) {
                    echo '
                    <script type="text/javascript">
                    jQuery(document).ready(function($) {
                    
                        var max_fields      = 5; //maximum input boxes allowed
                        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
                        var add_button      = $(".add_field_button"); //Add button Class
                        
                        var x = '.$x.'; //initlal text box count
                        $(add_button).click(function(e){ //on add input button click
                            e.preventDefault();
                            if(x < max_fields){ //max input box allowed
                                x++; //text box increment
                                $(wrapper).append(\'<div><br><input type="text" name="artist[]" placeholder="Artista:"/><input type="time" min="1" max="100" name="time[]"/>&nbsp<a href="#" class="remove_field button-secondary">Remove</a></div>\');
                            }
                        });
                        
                        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                            e.preventDefault(); 
                            $(this).parent(\'div\').remove(); 
                            x--;
                        })
                    });
                    </script>
                                    ';
                        }
                    
                }
            }
        
        public function put_in_queue(){
            
            wp_register_style('eventos_front_css', plugins_url('/css/front.css', __FILE__ )); //Ruta relativa que parte del plugin hasta el archivo y los concatena por partes
            wp_enqueue_style('eventos_front_css'); //css del front-end
            
        }
        
        
        /*
        * Funcion de callback que carga las hojas de estilo y los js para el BACK END
        * @param $post_id int post ID
        */
        
        
         public function admin_put_in_queue(){
            
            wp_register_style('eventos_css', plugins_url('/admin/admin.css', __FILE__ )); //Ruta relativa que parte del plugin hasta el archivo y los concatena por partes
            wp_enqueue_style('eventos_css');
            
            
            
            wp_register_script('eventos_js', plugins_url('/admin/admin.js', __FILE__ )); //Ruta relativa que parte del plugin hasta el archivo y los concatena por partes
            wp_enqueue_script('eventos_js');
            
        }
        
        
        
        
        /*
        * Funcion de callback que carga y crea una opcion en el dashboard para la página de settings del plugin
        * 
        */
        
        function Evento_admin_page(){
            
            
                        //nombre pagina     //nombre de la opcion  //capacidades de los roles   //slug        //callback          //icono del menu  //posicion
          add_menu_page('Custom Post Eventos','Eventos Settings','manage_options','Events_Settings',array($this,'Events_Settings'),'dashicons-edit',100);  
            
            
        }
//Settinggggs    
    
        function Events_Settings(){
            
            require_once(plugin_dir_path(__FILE__).'admin/admin-settings.php');
        }
        
        
         /*
        * Funcion de callback que carga y crea una subopcion en el menú SETTINGS en el dashboard para la página de settings del plugin
        * 
        */
        function Evento_admin_page_second_level(){
            
            add_options_page('Custom Post Eventos2','Eventos Settings2','manage_options','Eventos Settings',array($this,'Events_Settings'),null);
            
            
        }
        
        
          /*
        * Funcion de callback que crea un enlace SETTINGS en el panel del plugin en la pagina de plugins
        *  @param array $links Collection en la caja del plugin
            @return array $links
        */
//Settinggggs        
        function events_settings_link( $links ){
            
           // $url = url_plugin_dir_url(__FILE__).'admin/admin-settings.php';
           
                            //add_query m
            $url = esc_url(add_query_arg('page','Events Settings',get_admin_url() .'admin-settings.php'));
            

            $settings_link = "<a href=' $url '>Settings</a>";

            array_push($links,$settings_link);
            
            
            return $links;
        }
        
        
        public function Evento_activation(){
         
         
           flush_rewrite_rules();
         
           
           
        }
       
        public function Evento_deactivation(){
         
         
           flush_rewrite_rules();
           
           
        }
        
        
            /*
        * Funcion que registra los settings en la tabla wp_option como 'events_settings'
            Esta funcion tambien se encarga de salvar los valores de los campos cuando pulsemos el boton SAVE en la hoja de settings (lo hace WP)
            La funcion register_settings() tiene tres parametros:
                1->El nombre del campo, en este caso el array events_settings
                2->Es el nombre del grupo de los settings, como vamos a tener un solo array, pues ponemos el mismo nombre
                3-> Es la funcion de callback que vamos a usar para validar los datos de los settings
        * 
        */
        public function Evento_register_settings(){
            
            register_setting(
                'events_settings',
                'events_settings',
                array($this,'events_settings_validate'),
                
                );
            
        }
            /*
        * Funcion que valida los datos de los settings (que estan en el formulario de la pagina de settings)
        *  @param $options array Los settings del plugin
            
        */
        
        function events_settings_validate( $args ){
            
            if(!isset($args['e_color'])){
                
                $args['e_color'] = ''; //Si no se ingresa ningun color por defecto tendra el de la plantilla
                
            }
            if(!isset($args['e_color2'])){
                
                $args['e_color2'] = ''; //Si no se ingresa ningun color por defecto tendra el de la plantilla
                
            }
            
            //El numero de tuplas por pagina debe ser mayor o igual de 2 y menor de 20
            if(!isset($args['e_ppp']) || $args['e_ppp'] < 2 || $args['e_ppp'] > 15){
                
                $args['e_ppp'] = 6;
                //Tenemos que lanzar un error (estamos en el admin area,debemos dejar a WP que lo haga por nosotros)
                //Eso lo hacemos con add_settings_error que tiene los sigientes parametros
                    //1->El slug del error
                    //2-> El id del error
                    //3->Mensaje a visualizar
                    //4->Tipo de error: admite 'error' (valor por defecto), 'info','warning','success'
                add_settings_error('events_settings','event_invalid_ppp','Please enter number between 2 and 20!','error');
            }
        
            return $args;
            
            
        }
        
               /*
        * Funcion que valida los datos de los settings (que estan en el formulario de la pagina de settings)
        *  @param $options array Los settings del plugin
            
        */
        function Evento_admin_notice(){
                    
                    settings_errors();
                
        }
        
        
   }
   

    if( class_exists('Evento')){
       
       $my_proyect = new Evento();
       
       $my_proyect->execute_actions();  //Ejecuta el metodo que lanza las acciones para crear el custom_post_type
       
    }
   
   //Registramos los hooks que necesitamos para contemplar las acciones activar-desactivar de nuestro plugin
   
   //                            $file             $callback
   
   //$collback como es un metodo de una clase, debemos especificarlo en un array con el primer elemento del objeto de esa clase y segundo método
   register_activation_hook(__FILE__,array($my_proyect,'Evento_activation')); // __FILE__ da la url del mismo archivo en el que estamos que es el propio archivo del plugin,
   
   
   
   register_deactivation_hook(__FILE__,array($my_proyect,'Evento_deactivation')); //