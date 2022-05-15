<h1>ARTICULOS SETTINGS PAGE EXTERNAL</h1>



<form action="options.php" method="post">

<?php

    settings_fields('events_settings');
    
    do_settings_sections('events_settings'); // el slug del archivo
    
    
    //obtener los valores anteriores
    $options = get_option('events_settings');

    ?>
    
    
    <p>
        <h2>Usage:</h2>    
        <h4>Use this code for custom fields resume in custom</h4>

                 
    <pre> this code for custom fields resume in custom post type blog template </pre>
    <pre>&lt;?php do_shortcode('[show_custom_fields id="'.$post->ID.'"]')?&gt;</pre>
    
    
   <pre> this code for custom fields resume in custom post type blog template </pre>
    <pre>&lt;?php do_shortcode('[show_custom_fields_single id="'.$post->ID.'"]')?&gt;</pre>
        
    </p>
    
    <div>
        <form class="settings-form">
            <label for="e_color">Color</label>
            <input name="events_settings[e_color]" type="color" id="e_color" value="<?php echo (isset($options['e_color']) && $options['e_color'] != '') ? $options['e_color'] : ''; ?>" /><br><br>
            <label for="e_color">Color Iconos</label>
            <input name="events_settings[e_color2]" type="color" id="e_color2" value="<?php echo (isset($options['e_color2']) && $options['e_color2'] != '') ? $options['e_color2'] : ''; ?>" /><br><br>
            
            <label for="e_ppp">Number posts per page</label>
            <input name="events_settings[e_ppp]" type="number" id="e_ppp" value="<?php echo (isset($options['e_ppp']) && $options['e_ppp'] != '')? $options['e_ppp'] : '';  ?>" /><br><br>
            <input type="submit" name="submit" class="button class-primary" value="<?php esc_attr_e('Save') ?>"/>
            <div class="button class-primary reset-button" id="reset-button">
                <input type="reset" value="Colores Defecto" class="reset" id="reset">
            </div>
        </form>
         
         
    </div>
    
    
    
</form>