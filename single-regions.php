<?php 
defined( 'ABSPATH' ) || exit;

get_header();

?>
<?php  $theRegionType = get_the_terms( get_the_ID(), 'regions_tax' ); ?>

<section class="breadcrumbs-section">
    <div class="container">
        <div class="container-wrapper">
            <a href="<?= site_url(); ?>">Home</a>
            
            <?php if( $theRegionType ) : ?>
                <?= get_template_part('inc/svg/chevron-right'); ?>
                <a href="<?= get_term_link( $theRegionType[0]->term_id ); ?>"><?= $theRegionType[0]->name; ?></a>
            <?php endif; ?>

            <?= get_template_part('inc/svg/chevron-right'); ?>
            <span><b><?= get_the_title(); ?></b></span>
        </div>
    </div>
</section>

<section class="single-region-header pos-relative" id="single-region-header-<?= get_row_index(); ?>">
    <img src="<?php echo get_field('desktop_image') ? get_field('desktop_image') : get_the_post_thumbnail_url(); ?>" class="for-desktop" />
    <?php if( get_field('laptop_image') ) : ?>
    <img src="<?php echo get_field('laptop_image'); ?>" class="for-laptop" />
    <?php endif; ?>
    <?php if( get_field('tablet_image') ) : ?>
    <img src="<?php echo get_field('tablet_image'); ?>" class="for-tablet" />
    <?php endif; ?>
    <?php if( get_field('mobile_image') ) : ?>
    <img src="<?php echo get_field('mobile_image'); ?>" class="for-mobile" />
    <?php endif; ?>
    <div class="text-wrapper">
        <h1 class="heading"><?php echo get_field('heading') ? get_field('heading') : get_the_title(); ?></h1>
    </div>
</section>

<section class="single-region-description">
    <div class="container">
        <div class="top-wrapper d-flex">
            <h3 class="heading"><?php echo get_field('description_heading'); ?></h3>
        </div>
        <div class="container-wrapper d-flex">
            <img src="<?php echo get_field('description_image'); ?> ">   
            <div class="wysiwyg-content">
                <?php echo get_field('description'); ?> 
            </div>
            <div id="custom-map-render">
                <div class="custom-map" data-zoom="19">
                    <?php 

                    foreach( get_field('tour_destinations') as $key => $destination ) {
                        $latitude = $destination['latitude'];
                        $longtitude = $destination['longitude'];
                        $mapMarkerIndex = $key + 1;

                        // switch( $mapMarkerIndex ){
                        //     case 1: $mapMarkerImage = get_stylesheet_directory_uri() . '/inc/images/one.png'; break;

                        //     case 2: $mapMarkerImage = get_stylesheet_directory_uri() . '/inc/images/two.png'; break;
                        // }

                        ?>

                    <div class="marker marker-destination d-none" data-destination-count="<?= $key + 1; ?>" data-lat="<?= esc_attr($latitude); ?>" data-lng="<?= esc_attr($longtitude); ?>" data-pin-image="<?= $mapMarkerIndex; ?>">

                    </div>
                    <?php
                    }
                        

                    ?>
                </div>
            </div>
            <!-- <div class="map-placeholder">
                <img src="<?php echo get_field('map'); ?> "> 
            </div> -->
        </div>
    </div>
</section>

<section class="single-region-about">
    <div class="container">
        <div class="container-wrapper">
            <h3 class="heading"><?php echo get_field('about_heading'); ?></h3>
            <?php foreach( get_field('tour_destinations') as $key => $destination ) : ?>
                <div class="about-content d-flex">
                    <div class="image-wrapper">
                        <img src="<?php echo $destination['image'];?> "> 
                    </div>
                    <div class="about-content-wrapper">
                        <div class="wysiwyg-content">
                            <?php echo $destination['details']; ?>
                        </div>
                    </div>
                    
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="single-region-summary">
    <div class="container">
        <h3 class="heading"><?php echo get_field('summary_heading'); ?></h3>
        <div class="container-wrapper d-flex">
            <div class="summary-image">
                <?php foreach( get_field('summary_image') as $content ) : ?>
                    <img src="<?php echo $content['image'];?> "> 
                <?php endforeach; ?>
            </div>
            <div class="summary-content-wrapper">
                <div class="summary-content">
                    <?php foreach( get_field('summary_content') as $content ) : ?>
                        <p class="summary-labels"><?php echo $content['summary_labels'];?></p>
                        <p class="summary-labels-description"><?php echo $content['summary_labels_description'];?></p>
                    <?php endforeach; ?>
                </div>      
                <h3 class="heading">Contact Us</h3>
                <div class="wysiwyg-content">
                    <?php echo get_field('contact_content'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-section featured_post <?php echo get_sub_field('custom_css'); ?>" id="featured_post-<?= get_row_index(); ?>">
<?php 
    if( get_sub_field('css_code') ){
        $customCSS = str_replace('{{section_id}}', '#adventure-distinction #featured_post-'. get_row_index(), get_sub_field('css_code'));

        echo '<style>'. $customCSS . '</style>';
    }

    if( get_sub_field('featured_type') != 'custom' ){
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => get_sub_field('number_of_items'),
            'post_status' => 'publish',
            'orderby' => 'post__in'
        );
    
        if( get_sub_field('featured_type') == 'manual' && get_sub_field('select_posts') ){
            $args['post__in'] = get_sub_field('select_posts');
        }
    
        $theQuery = new WP_Query( $args );
    }
    
?>
    <div class="container">
        <div class="container-wrapper">
            <h2 class="heading text-center">Explore More</h2>
            <?php if( get_sub_field('featured_type') != 'custom' ) : ?>
            <?php if( $theQuery->have_posts() ) : ?>
            <div class="featured-post-items">
                <div class="row">
                    <?php 
                    while( $theQuery->have_posts() ) {
                        $theQuery->the_post();

                        get_template_part('inc/helpers/post-item');
                    }  
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
            <?php endif; ?>
            <?php else : ?>
            <div class="featured-post-items">
                <div class="row">
                <?php 
                while( have_rows('custom_items') ) {
                    the_row();

                    get_template_part('inc/helpers/post-item');
                }  ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>