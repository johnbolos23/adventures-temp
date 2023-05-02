<?php

defined( 'ABSPATH' ) || exit;

get_header();

if( isset( $_GET['s'] ) ){
	$args = array(
	's' => $_GET['s']
	);
}

$query = new WP_Query( $args );

?>

<div class="search-bar d-flex align-items-center justify-content-center">
    <div class="form-wrapper">
        <form action="<?php echo site_url(); ?>" id="header-search">
            <div class="search-input">
                <input type="text" name="s" placeholder="Search" />
                <button type="submit"><?= get_template_part('inc/svg/search'); ?></button>
            </div>
        </form>
        <p><?php echo $query->found_posts; ?> Search Results for "<?php echo $_GET['s']; ?></p>
    </div>
</div>

<div class="container search-results">
	<div class="container-wrapper">
		<?php
		if( $query->have_posts() ){
			while(  $query->have_posts() ) {
				$query->the_post();
				get_template_part('inc/helpers/search-results');
			}
			wp_reset_postdata();
			} else {
				get_template_part('inc/helpers/search-results-empty');
			}
		?>
	</div>
</div>

<?php get_footer();
