<?php
/**
 * The Search template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dosth
 */
get_header();
?>
<div class="content-container">
	<div class="container container--blog">
		<div class="search-query">
			Search results for: <?php echo get_search_query(); ?>
		</div>  
		<div class="flex">
			<div class="blog-main">
				<?php if ( have_posts() ): ?>
					<?php while( have_posts() ): ?>
						<?php the_post(); ?>
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
					<?php the_posts_pagination(); ?>
				<?php else: ?>
					<p><?php _e( 'No Search Results found', 'nd_dosth' ); ?></p>
				<?php endif; ?>
				</div>
				<div class="blog-aside">
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
		</div>
    </div>
</div>
<?php get_footer(); ?>