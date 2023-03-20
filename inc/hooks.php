<?php
/**
 * Custom hooks
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function understrap_site_info() {
		do_action( 'understrap_site_info' );
	}
}

add_action( 'understrap_site_info', 'understrap_add_site_info' );
if ( ! function_exists( 'understrap_add_site_info' ) ) {
	/**
	 * Add site info content.
	 */
	function understrap_add_site_info() {
		$the_theme = wp_get_theme();

		$site_info = sprintf(
			'<a href="%1$s">%2$s</a><span class="sep"> | </span>%3$s(%4$s)',
			esc_url( __( 'https://wordpress.org/', 'understrap' ) ),
			sprintf(
				/* translators: WordPress */
				esc_html__( 'Proudly powered by %s', 'understrap' ),
				'WordPress'
			),
			sprintf( // WPCS: XSS ok.
				/* translators: 1: Theme name, 2: Theme author */
				esc_html__( 'Theme: %1$s by %2$s.', 'understrap' ),
				$the_theme->get( 'Name' ),
				'<a href="' . esc_url( __( 'https://understrap.com', 'understrap' ) ) . '">understrap.com</a>'
			),
			sprintf( // WPCS: XSS ok.
				/* translators: Theme version */
				esc_html__( 'Version: %1$s', 'understrap' ),
				$the_theme->get( 'Version' )
			)
		);

		// Check if customizer site info has value.
		if ( get_theme_mod( 'understrap_site_info_override' ) ) {
			$site_info = get_theme_mod( 'understrap_site_info_override' );
		}

		echo apply_filters( 'understrap_site_info_content', $site_info ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
}


add_filter( 'gform_pre_render', 'populate_region' );
add_filter( 'gform_pre_validation', 'populate_region' );
add_filter( 'gform_pre_submission_filter', 'populate_region' );
add_filter( 'gform_admin_pre_render', 'populate_region' );
function populate_region( $form ) {
 
    foreach ( $form['fields'] as &$field ) {
 
        if ( $field->type != 'select' || strpos( $field->cssClass, 'populate-region' ) === false ) {
            continue;
        }
 
        // you can add additional parameters here to alter the posts that are retrieved
        // more info: http://codex.wordpress.org/Template_Tags/get_posts
        $args = array(
			'post_type' => 'regions',
			'post_status' => 'publish',
			'posts_per_page' => -1
		);

		$theQuery = new WP_Query( $args );
 
        $choices = array();

		while( $theQuery->have_posts() ){
			$theQuery->the_post();

			$theTerms = get_the_terms( get_the_ID(), 'region_location' );

			$termNames = '';

			foreach( $theTerms as $category ){
				$termNames .= '('. get_field('abbreviation', 'term_'. $category->term_id) .')';
			}

			$choices[] = array( 'text' => get_the_title() . ' ' . $termNames, 'value' => get_the_ID() );
		}

		wp_reset_postdata();
 
        // update 'Select a Post' to whatever you'd like the instructive option to be
        $field->choices = $choices;
 
    }
 
    return $form;
}