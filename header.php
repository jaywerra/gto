<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">	<?php wp_head(); ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-YDVF7GRD9B"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-YDVF7GRD9B');
	</script>
	
	<style>
		.header .footer-only {
			display: none;
		}
	</style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary">
			<?php esc_html_e( 'Skip to content', '_s' ); ?>
		</a>
		<header class="header">
			<div class="container flex align-center space-between">
				<?php 
					$header_logo = get_field('header_logo', 'option');
				?>

				<a href="<?php echo esc_url(get_home_url()); ?>" class="header__logo logo">
				  <?php if ($header_logo): ?>

					<?php if (is_array($header_logo)): ?>
					  <img 
						src="<?php echo esc_url($header_logo['url']); ?>" 
						alt="<?php echo esc_attr($header_logo['alt'] ?: get_bloginfo('name')); ?>"
					  >
					<?php else: ?>
					  <?php echo wp_get_attachment_image($header_logo, 'full', false, [
						'alt' => get_bloginfo('name')
					  ]); ?>
					<?php endif; ?>

				  <?php else: ?>
					<img 
					  src="<?php echo esc_url(content_url('/uploads/2026/06/Group_Travel_Odyssey_FF.png')); ?>" 
					  alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
					>
				  <?php endif; ?>
				</a>
				<button class="header__menutoggle">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<div class="header__navigation">
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
					<div class="header__utility">
						<a href="<?php echo get_field('member_login_link', 'option') ?>" target="_blank" rel="noopener noreferrer" class="button button--blue">
							Member login
						</a>
						<a class="button button--blue" href="<?php echo get_field('supplier_portal_link', 'option') ?>" target="_blank" rel="noreferrer noopener">
							Supplier Login
						</a>
						</div>
				</div>
			</div>
		</header>
		
		<main class="main">
			<div class="breadcrumbs">
				<div class="container">
					<?php
						if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
						}
					?>
				</div>
			</div>

			