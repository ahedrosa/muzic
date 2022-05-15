

<h1>SIDEBAR</h1>


<!--SEARCH-->
<div class="section">
    <div class="row">
        <div class="col-md-12">
            <form class="form-signin" id="searchform"
                action="<?php echo home_url();?>">
                <div class="subscribe-block">
                    <label class="sr-only">Search</label>
                    <input type="text" id="fsearch" name="s"
                        class="form-control form-subscribe" placeholder="Búsqueda"
                        required="">
                </div>
                <div class="btn-wrap clearifx">
                    <button type="submit" class="btn btn-default btn-subscribe" id="search-btn">
                        Búsqueda </button>
                </div>
                <div id="js-subscribe-result" data-success-msg="Great! Please confirm your email to finish."
                    data-error-msg="Oops! Something went wrong."></div>
            </form>
        </div>
    </div>
</div>
<!--WIDGETS-->

    <h4> Nube de Etiqutas</h4>
        <div class="widget-container">
            <div class="">
                
            </div>
        </div>

<!--LISTADO DE CATEGORIAS-->


<!--ULTIMAS ENTRADAS-->


<div class="section">
    <div class="row">
        <h4>Últimas Entradas</h4>
        <?php
            $args = array(
                'post_type'=>array('post'),
                'type'=>'post',
                
                );
        ?>
    </div>
    
</div>

<!--LISTADO DE AUTORES-->

<div class="section">
    <div class="row">
        <h4>Autores</h4>
        <ul class="sidebarlist">
            
            <?php
                $args = array(
                    'hide_empty' => false, //Muestra los autores que no tienes ningun post
                    'optioncount'=> true, //Muestra la cantidad de post de cada autor
                    'orderby'    => 'post_count', // ordenar por la cantidad de post publicados
                    'order'      => 'descent',
                    );
                wp_list_authors($args);
            ?>
        </ul>
    </div>
    
</div>


<div class="section">
    <div class="row">
        <h4>Autores</h4>
        <ul class="sidebarlist">
        <?php
            wp_list_pages(
            'title_li='
            );
        ?>
        </ul>
     </div>
</div>
