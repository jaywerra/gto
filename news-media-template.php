<?php
    /*
    Template Name: News
    */
        get_header();
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                page_render_blocks(); ?>
                <?php
            endwhile;
        endif;
    ?>
    <div class="container">
        <!-- Query Media posts -->
        <?php 
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array( 
                'orderby' => 'date',
                'post_type' => 'media-posts',
                'posts_per_page' => 10,
                'post__not_in' => array( $post->ID ),
                'paged' => $paged,
            );
            $the_query = new WP_Query( $args );
        ?>
        <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
            <article class="article">
                <div class="article__desc">
                    <h3 class="article__title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    <div class="article__excerpt">
                        <?php the_excerpt();  ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="readmore button button--primary button--hasarrow">
                        Read More <img class="button__arrow" src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/static/img/icon-chevron-right.svg" alt="" />
                    </a>
                </div>
            </article>
        <?php endwhile; ?> 
        <?php wp_reset_postdata(); ?>
    </div>


<?php get_footer(); ?>