<?php get_header(); ?>
    <div class="block block-banner blogpost__banner">
        <div class="blogpost__featuredimage">
            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                    <img src="<?php echo $image[0]; ?>" alt="" />
                <?php else: ?>    
                    <img src="/wp-content/uploads/2021/03/employee-placeholder.jpg" alt="<?php the_title(); ?>" class="attorneys__placeholder" />
            <?php endif; ?>
        </div>
        <div class="container">
            <h1 class="block-banner__title">
                <?php the_title(); ?>
            </h1>
        </div>
    </div>
    <div class="container">
        <div class="blogpost">
            <div class="blogpost__body">
                <?php the_content(); ?>
            </div>
            <div class="blogpost__aside">
                <h2 class="blogpost__aside-heading">Recent Posts</h2>
                <?php 
                    $args = array( 
                        'orderby' => 'date',
                        'post_type' => 'post',
                        'posts_per_page' => 5,
                        'post__not_in' => array( $post->ID ),
                    );
                    $the_query = new WP_Query( $args );
                ?>
                <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                    <article class="article">
                        <a href="<?php the_permalink(); ?>" class="article__desc">
                            <h3 class="article__title">
                                <?php the_title(); ?>
                            </h3>
                            <p class="date"><?php the_date(); ?></p>
                            <span class="read-more">
                                Read More <img src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/static/img/icon-rightarrow-green.svg" alt="" aria-hidden="true" />
                            </span>
                        </a>
                    </article>
                <?php endwhile; ?> 
                <?php wp_reset_postdata(); ?>
        </div>
    </div>

<?php get_footer(); ?>