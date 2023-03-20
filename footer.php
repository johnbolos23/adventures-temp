<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

$columnOne = get_field('column_one', 'option');
$columnTwo = get_field('column_two', 'option');
$columnThree = get_field('column_three', 'option');
$columnFour = get_field('column_four', 'option');

$columnsArray = array( $columnOne, $columnTwo, $columnThree, $columnFour );

?>



<footer class="main-footer" id="main-footer">
	<div class="container">
		<div class="footer-top-content">
			<div class="d-flex footer-top-content-wrapper">
			<?php foreach( $columnsArray as $column ) : ?>
				<?php if( $column['heading'] && $column['menu'] ) : ?>
				<div class="main-footer-menu-column">
					<div class="main-footer-menu-column-wrapper">
						<h4><?= $column['heading']; ?></h4>
						<div class="main-footer-menu-container">
							<?php wp_nav_menu( array( 'menu' => $column['menu'] ) ); ?>
						</div>
					</div>
				</div>
				<?php endif; ?>
			<?php endforeach; ?>

			<?php if( get_field('facebook','option') || get_field('instagram','option') || get_field('youtube','option') || get_field('linkedin','option') || get_field('twitter','option') || get_field('pinterest','option') ) : ?>
				<div class="main-footer-social-medias">
					<h4>Follow Us</h4>
					<div class="d-flex">
						<?php if( get_field('instagram','option') ) : ?>
						<div class="social-media-column">
							<a href="<?= get_field('instagram','option'); ?>"><?php get_template_part('inc/svg/instagram'); ?></a>
						</div>
						<?php endif; ?>

						<?php if( get_field('facebook','option') ) : ?>
						<div class="social-media-column">
							<a href="<?= get_field('facebook','option'); ?>"><?php get_template_part('inc/svg/facebook'); ?></a>
						</div>
						<?php endif; ?>

						<?php if( get_field('linkedin','option') ) : ?>
						<div class="social-media-column">
							<a href="<?= get_field('linkedin','option'); ?>"><?php get_template_part('inc/svg/linkedin'); ?></a>
						</div>
						<?php endif; ?>

						<?php if( get_field('twitter','option') ) : ?>
						<div class="social-media-column">
							<a href="<?= get_field('twitter','option'); ?>"><?php get_template_part('inc/svg/twitter'); ?></a>
						</div>
						<?php endif; ?>

						<?php if( get_field('pinterest','option') ) : ?>
						<div class="social-media-column">
							<a href="<?= get_field('pinterest','option'); ?>"><?php get_template_part('inc/svg/pinterest'); ?></a>
						</div>
						<?php endif; ?>

						<?php if( get_field('youtube','option') ) : ?>
						<div class="social-media-column">
							<a href="<?= get_field('youtube','option'); ?>"><?php get_template_part('inc/svg/youtube'); ?></a>
						</div>
						<?php endif; ?>
					</div>

					<img src="<?php echo get_field('footer_logo','option') ? get_field('footer_logo','option') : get_field('logo','option'); ?>" alt="Footer Logo" />
				</div>
			<?php endif; ?>
			</div>
		</div>
		<div class="footer-bottom-content">
			<div class="row">
				<div class="col-12 col-lg-6">
					<p>Copyright © <?= date('Y'); ?> <?= get_field('copyright','option'); ?></p>
				</div>
				<div class="col-12 col-lg-6 text-right">
					<p><?= get_field('site_creator','option'); ?></p>
				</div>
			</div>
		</div>
	</div>
</footer>


</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>
</body>

</html>

