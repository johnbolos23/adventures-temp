<?php 

$featuredRegionObject = get_sub_field('region_to_showcase');

$layoutType = get_sub_field('layout_type');

$args = array(
    'post_type' => $layoutType == 'gateway' ? 'gateways' : 'regions',
    'post_status' => 'publish',
    'posts_per_page' => -1
);

if( $featuredRegionObject ){
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'regions_tax',
            'field' => 'term_id',
            'terms' => array( $featuredRegionObject->term_id )
        )
    );
}

$theQuery = new WP_Query( $args );

?>
<section class="page-section featured-region layout-<?= $layoutType; ?>" id="featured-region-<?= get_row_index(); ?>">
    <div class="container">
        <div class="row m-0">
            <div class="featured-region-content col-12 col-lg-4">
                <h2 class="heading"><?php echo get_sub_field('heading') ? get_sub_field('heading') : $featuredRegionObject->name; ?></h2>
                
                <div class="featured-region-items-wrapper">
                    <div class="featured-region-items">
                    <?php if( $layoutType == 'gateway' ) : 
                        $regionLocations = get_terms([
                            'taxonomy' => 'region_location',
                            'hide_empty' => false,
                        ]);
                        
                    foreach( $regionLocations as $regionLocation ) : ?>
                    <div class="featured-region-item featured-region-item-gateway">
                        <span class="region-bullet" style="background-color: <?php echo get_field('region_color', 'term_'.$regionLocation->term_id ); ?>"></span>
                        <span class="region-name"><?= $regionLocation->name; ?></span>
                    </div>

                    <?php endforeach; else : ?>
                    <?php while( $theQuery->have_posts() ) : $theQuery->the_post() ?>
                    <?php 
                        $theTerms = get_the_terms( get_the_ID(), 'region_location' );

                        $termNames = '';

                        foreach( $theTerms as $category ){
                            $termNames .= '('. get_field('abbreviation', 'term_'. $category->term_id) .')';
                        }
                    ?>
                        <div class="featured-region-item" data-info-target="<?= get_the_title(); ?>">
                            <span class="region-bullet" style="background-color: <?php echo get_field('region_color'); ?>"></span>
                            <span class="region-name"><?= get_the_title() . ' ' . $termNames; ?></span>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8 p-0">
                <div id="custom-map-render">
                    <div class="custom-map" data-zoom="16">
                    <?php while( $theQuery->have_posts() ) : $theQuery->the_post();

                    $theTerms = get_the_terms( get_the_ID(), 'region_location' );

                    if( $layoutType == 'gateway' ){
                        $latitude = get_field('latitude');
                        $longtitude = get_field('longtitude');
                        $address = '';
                        $color = get_field('region_color', 'term_'. $theTerms[0]->term_id);
                    }else{
                        $latitude = get_field('address')['lat'];
                        $longtitude = get_field('address')['lng'];
                        $address = get_field('address')['address'];
                        $color = get_field('region_color');
                    }
                    

                    

                    $termNames = '';
                    $regionLocation = '';

                    foreach( $theTerms as $category ){
                        $termNames .= '('. get_field('abbreviation', 'term_'. $category->term_id) .')';
                        $regionLocation .= $category->name;
                    }

                    ?>

                    <div class="marker d-none" data-title="<?= get_the_title(); ?>" data-color="<?= $color; ?>" data-lat="<?= esc_attr($latitude); ?>" data-lng="<?= esc_attr($longtitude); ?>" data-layout-type="<?= $layoutType; ?>">
                        <div class="row region-infowindow-container infowindowtype-<?= $layoutType; ?>">
                            <?php if( $layoutType == 'gateway' ) : ?>
                                <div class="col-12">
                                    <p class="region-name"><?= get_the_title(); ?></p>
                                </div>
                            <?php else : ?>
                            <div class="col-6">
                                <img src="<?= get_the_post_thumbnail_url(); ?>" />
                            </div>
                            <div class="col-6">
                                <p class="region-name"><?= get_the_title() . ' ' . $termNames; ?></p>
                                <p class="region-location"><?= $regionLocation; ?></p>
                                <div class="wysiwyg-content"><?= get_the_content(); ?></div>
                                <a href="<?= get_the_permalink( get_the_ID() ); ?>">EXPLORE</a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php

                    endwhile;
                    wp_reset_postdata();
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>