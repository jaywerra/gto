<?php
    /*
        Template Name: Blog
    */
?>

<?php 
    get_header(); 

    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            
            page_render_blocks();

            ?>
            
            <?php
        endwhile;
    endif;
?>
<div class="container container--blog flex">
    <div class="blog-main">
        <?php 
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $args = array('post_type' => 'post', 'posts_per_page' => 10, 'paged' => $paged);
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
        ?>
            <article class="article">
                <div class="article__desc">
                    <a href="<?php the_permalink(); ?>" class="article__group">
                        <div class="article__thumb">
                            <?php if (the_post_thumbnail()): ?>
                                <?php the_post_thumbnail(); ?>
                            <?php endif; ?>
                        </div>
                        <h2 class="article__title article__title--archive">
                            <?php the_excerpt_truncate(41); ?>
                        </h2>
                        <div class="article__excerpt">
                            <?php the_excerpt_truncate(120); ?>
                        </div>
                    </a>
                </div>
            </article>
        <?php endwhile; ?>
        <?php wp_pagenavi( array( 'query' => $loop ) ); ?>
    </div>
    <div class="blog-aside">
        <?php get_search_form(); ?>
        <div class="blog-callout">
            <h2>Spotlight  your expertise as a beacon blogger</h2>
            <p>
                Join the community as a beacon blogger
            </p>
            <a href="/beacon-blogger/" class="button button--white">
                Find Out More
            </a>
        </div>
    </div>
</div>

<?php get_footer(); ?>