<?php



    /*
    *   Ttrigger this file on Plugin uninstall
    *   @package articulos
    */  



    !defined('WP_UNINSTALL_PLUGIN') or die ('GAME-OVER');
    
    
    //Limpiar la BBDD
    
    // Recogemos en un resultset todos los customs posts type -nuestro plugin crea custom post type-
    
    //Forma facil
    
    
    //Cuidado con get_posts() anula el funcionamiento de todas las funciones is_...
    // $erase_posts = get_posts( array('post_type' => 'articulos', 'numberposts' => -1)); //si quiero obtener todos los posts tengo que poner un valor -1
    
    // foreach($erase_posts as $post_to_erase){
        
    //     wp_delete_post($post_to_erase->ID,true);
        
        
        
    // }
    
    
    //FORMA COOL ->Vamos a usar wp_ como prefijo de tablas, cada uno debe suponer su propio prefijo de su BBDD
    
    
    // global $wpdb;
    // //Primero eliminamos los posts de nuestro tipo
    // $wpdb->query("DELETE FROM wp_posts WHERE `post_type` = 'articulos'");
    // //Despues borramos los posibles metadatos que hayan creado esos posts (Borramos todos los metadatos excepto los de los posts que todavia existan)
    // $wpdb ->query("DELETE FROM wp_postmeta WHERE `post_id` NOT IN (SELECT id FROM wp_posts ) ");
    // //Por ultimo borramos las posible relaciones que existan y que no pertenezcan a ningun posts de los que todavia existen
    // $wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN ( SELECT id FROM wp_posts)");