<?php


    
    //Visualizamos la lista de comentarios
    
    
    
    //wp_list_comments();

            wp_list_comments(array(
                 'callback' => 'better_comments',
                  'type'=>'comment',
                  'style'=>'ul',
                    
               ));

    //Visualizamos el formulario de comentarios
    
    
    //Mostrar formulario de comentarios
    comment_form(array(
    	'title_reply' => __('¿Y tú qué opinas?', 'apk'), //Cambiar título
    	'label_submit' => __('Publicar comentario', 'apk'), //Cambiar texto de botón
    	'comment_field' => '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="form-comments form-single form-single-text" placeholder="' . __('Deja tu comentario aqui', 'apk') . '" required></textarea>', //Borrar párrafo y label del textarea
    	'comment_notes_before' => '', //Borrar las notas antes del formulario
    	'comment_notes_after' => '<p class="comment-notes">' . __( 'Su email no será mostrado', 'apk' ) . '</p>' //Editar las notas después del formulario
    ));
    
    

?>