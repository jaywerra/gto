<?php 
    get_header(); 
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                
                page_render_blocks();

                ?>
                
                <?php
            endwhile;
        endif;
    get_footer(); 
?>