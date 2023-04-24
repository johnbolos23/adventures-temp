<?php

/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$bootstrap_version = get_theme_mod('understrap_bootstrap_version', 'bootstrap5');
$navbar_type       = get_theme_mod('understrap_navbar_type', 'collapse');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> id="adventure-distinction">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
	<?php do_action('wp_body_open'); ?>
	<div class="site" id="page">
		<style>
			.header-left-ripple{
				background-image: url(<?= get_field('background_image','option'); ?>);
			}
		</style>
		<!-- ******************* The Navbar Area ******************* -->
		<header class="main-header" id="main-header">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-xxl-2 col-xl-2 col-md-5 left">
						<div class="col-wrapper">
							<a href="<?= site_url(); ?>">
								<img src="<?= get_field('logo','option'); ?>" alt="Site Logo" />
							</a>
						</div>
					</div>
					<div class="col-xxl-6 col-xl-6 col-md-6 middle">
						<div class="col-wrapper header-search">
							<form action="/" id="header-search">
								<div class="search-input">
									<input type="text" name="s" placeholder="Search..." />
									<button type="submit"><?= get_template_part('inc/svg/search'); ?></button>
								</div>
							</form>
						</div>
					</div>
					<div class="col-xxl-4 col-xl-4 col-md-1 right">
						<div class="col-wrapper header-email-hamburger-wrapper">
							<div class="row align-items-center">
								<div class="col">
									<div class="header-email">
										<span><?= get_template_part('inc/svg/email'); ?></span>
										<div class="header-email-details">
											<span>Have a question? Send us a message</span>
											<?php 
												$emailLink = strip_tags( get_field('email_address','option') );
											?>
											<a href="mailto:<?= $emailLink; ?>"><?= get_field('email_address','option'); ?></a>
										</div>
									</div>
								</div>
								<div class="col-auto">
									<button type="button" id="hamburger-button"><?= get_template_part('inc/svg/hamburger'); ?></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div class="header-mega-menu" id="header-mega-menu">
			<div class="header-mega-menu-wrapper">
				<div class="row m-0">
					<div class="col-12 col-lg-4 p-0 header-left-ripple">
						<div class="header-left-wrapper">
							<div class="header-left-top-content pos-relative">
								<?php if( get_field('mega_menu_items','option') ) : ?>
								<div class="header-left-megamenu-container">
									<?php foreach( get_field('mega_menu_items','option') as $key => $megamenu ) : ?>
									<div data-mega-key="<?= $key; ?>" class="header-left-megamenu-item <?= $key == 0 ? 'active': ''; ?>">
										<span><?= $megamenu['title']; ?></span> <span><?php get_template_part('inc/svg/arrow-right'); ?></span>
									</div>
									<?php endforeach; ?>
								</div>
								<?php endif; ?>
							</div>
							<div class="header-left-bottom-content pos-relative">
								<div class="header-left-bottom-menu">
									<?php wp_nav_menu( array( 'menu' => get_field('static_menu','option') ) ); ?>
								</div>
								<div class="header-email">
									<span><?= get_template_part('inc/svg/email'); ?></span>
									<div class="header-email-details">
										<span class="lora">Have a question? Send us a message</span>
										<a href="mailto:<?= $emailLink; ?>"><?= get_field('email_address','option'); ?></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-8 p-0">
						<div class="header-right-wrapper pos-relative">
							<button id="megamenu-close"><?= get_template_part('inc/svg/close'); ?></button>

							<div class="header-right-megamenu-container">
								<?php if( get_field('mega_menu_items','option') ) : ?>
								<div class="header-right-megamenu-wrapper">
									<?php foreach( get_field('mega_menu_items','option') as $key => $megamenu ) : ?>
									<div data-mega-key="<?= $key; ?>" class="header-right-megamenu-item <?= $key == 0 ? 'active': ''; ?>">
										<h2><?= $megamenu['title']; ?> <span><a href="<?php echo get_term_link($megamenu['region_type']); ?>"><?php get_template_part('inc/svg/arrow-right'); ?></a></span></h2> 
										<?php 
											if( $megamenu['submenu_type'] == 'region' ){
												$args = array(
													'post_type' => 'regions',
													'posts_per_page' => -1,
													'post_status' => 'publish',
													'tax_query' => array(
														array(
															'taxonomy' => 'regions_tax',
															'field'    => 'term_id',
															'terms'    => $megamenu['region_type'],
														),
													)
												);

												$theQuery = new WP_Query($args);

												if( $theQuery->have_posts() ){
													echo '<ul>';
														while( $theQuery->have_posts() ){
															$theQuery->the_post();

															$theTerms = get_the_terms( get_the_ID(), 'region_location' );

															$termNames = '';

															foreach( $theTerms as $category ){
																$termNames .= '('. get_field('abbreviation', 'term_'. $category->term_id) .')';
															}

															echo '<li><a href="'. get_the_permalink( get_the_ID() ) .'">'. get_the_title() . ' ' . $termNames .'</a></li>';
														}
														wp_reset_postdata();
													echo '</ul>';
												}
											}else{

											}
										?>
									</div>
									<?php endforeach; ?>
								</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>