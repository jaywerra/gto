</main><!-- Main -->

    <div class="container">
        <?php if( have_rows('partner_logo', 'option') ): ?>
            <div class="logos js-logos-slider">
                <div class="glide__track" data-glide-el="track">
                    <div class="glide__slides">
                        <?php while( have_rows('partner_logo', 'option') ): the_row(); ?>
                            <div class="logos__slide">
                                <?php 
                                    $image = get_sub_field('partner_logo_image');
                                    if( !empty( $image ) ): ?>
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="footer__wrapper">
				<?php 
					$footer_logo = get_field('footer_logo', 'option');
				?>

				<a href="<?php echo esc_url(get_home_url()); ?>" class="footer__logo logo">
				  <?php if ($footer_logo): ?>

					<?php if (is_array($footer_logo)): ?>
					  <img 
						src="<?php echo esc_url($footer_logo['url']); ?>" 
						alt="<?php echo esc_attr($footer_logo['alt'] ?: get_bloginfo('name')); ?>"
					  >
					<?php else: ?>
					  <?php echo wp_get_attachment_image($footer_logo, 'full', false, [
						'alt' => get_bloginfo('name')
					  ]); ?>
					<?php endif; ?>

				  <?php else: ?>
					<img 
					  src="<?php echo esc_url(content_url('/uploads/2026/06/Group_Travel_Odyssey_FF_White.png')); ?>" 
					  alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
					>
				  <?php endif; ?>
				</a>
                <div class="footer__navigation">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'header-primary',
								'menu_class' => 'header__menu',
								'menu_id' => 'headerPrimary',
								'walker' => new submenu_wrap()
							)
						);
					?>
				</div>
            </div>
        </div>
		<div class="footer__legal">
			<div class="container">
                <ul>
                    <li>
                        © <?php echo date("Y"); ?> Group Travel Odyssey
                    </li>
                    <li><a href="/privacy-policy/">Privacy Policy</a></li>
					<li><a href="/cancellation-policy/">Cancellation Policy</a></li>
                </ul>
            </div>
		</div>
    </footer>

    <?php wp_footer(); ?>
    </body>
</html>