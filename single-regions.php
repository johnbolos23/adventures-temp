<?php 
defined( 'ABSPATH' ) || exit;

get_header();

?>

<section class="breadcrumbs-section">
    <div class="container">
        <a href="<?= site_url(); ?>">Home</a>
        <?= get_template_part('inc/svg/chevron-right'); ?>
        <span><b><?= get_the_title(); ?></b></span>
    </div>
</section>

<section class="region-header pos-relative" style="background-image: url(<?php echo get_field('image'); ?>);" id="region-header-<?= get_row_index(); ?>">
    <div class="container pos-relative">
        <h1 class="heading"><?php echo get_field('heading'); ?></h1>
    </div>
</section>

<section class="single-region-description">
    <div class="container">
        <div class="row">
            <div class="col-xxl-3 col-xl-3">
                <img src="<?php echo get_field('first_image'); ?> ">             
            </div>
            <div class="col-xxl-5 col-xl-5">
                <h3><?php echo get_field('first_heading'); ?></h3>
                <?php echo get_field('first_content'); ?>
            </div>
            <div class="col-xxl-4 col-xl-4 text-center">
                <div class="map">
                    MAP HERE
                </div>
            </div>
        </div>
    </div>
</section>


<section class="single-region-about">
    <div class="container">
        <div class="row">
            <div class="col-xxl-3 col-xl-3">
                <img class="second_image" src="<?php echo get_field('second_image'); ?> "> 
                <img src="<?php echo get_field('third_image'); ?> "> 
                <img src="<?php echo get_field('fourth_image'); ?> "> 
            </div>
            <div class="col-xxl-9 col-xl-9">
                <h3><?php echo get_field('second_heading'); ?></h3>
                <?php echo get_field('second_content'); ?>
            </div>
        </div>
    </div>
</section>

<section class="single-region-summary">
    <div class="container">
        <div class="row">
            <div class="col-xxl-3 col-xl-3">
                    <img src="<?php echo get_field('fifth_image'); ?> "> 
                    <img src="<?php echo get_field('sixth_image'); ?> "> 
                </div>
                <div class="col-xxl-9 col-xl-9">
                    <h3>Summary</h3>
                    <?php foreach( get_field('summary') as $item ) : ?>
                        <div class="test">
                            <p class="summary_labels"><?php echo $item['summary_labels'];?></p>
                            <p class="summary_labels_description"><?php echo $item['summary_labels_description'];?></p>
                        </div>
                    <?php endforeach; ?>
                    <div class="contact_us">
                        <h3>Contact Us</h3>
                        <?php echo get_field('contact_us_content'); ?>
                    </div>
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