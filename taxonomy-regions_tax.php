<?php 
defined( 'ABSPATH' ) || exit;

get_header();

?>

<section class="breadcrumbs-section">
    <div class="container">
        <a href="<?= site_url(); ?>">Home</a>
        <?= get_template_part('inc/svg/chevron-right'); ?>
        <span><b><?= get_queried_object()->name; ?></b></span>
    </div>
</section>


<section class="region-header pos-relative" style="background-image: url(<?= get_field('image','term_'. get_queried_object()->term_id ); ?>);">
    <div class="container text-center pos-relative">
        <h1 class="heading"><?= get_queried_object()->name; ?></h1>
    </div>
</section>

<section class="region-description">
    <div class="container">
        <div class="container-wrapper text-center">
            <div class="wysiwyg-content"><?= term_description(); ?></div>
        </div>
    </div>
</section>


<section class="region-list-items">
    <div class="container">
        <div class="region-list-items-wrapper">
            <div class="row">
            <?php 
                $args = array(
                    'post_type' => 'regions',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'regions_tax',
                            'field'    => 'term_id',
                            'terms'    => get_queried_object()->term_id,
                        ),
                    )
                );

                $theQuery = new WP_Query($args);

                if( $theQuery->have_posts() ){
                    while( $theQuery->have_posts() ){
                        $theQuery->the_post();

                        get_template_part('inc/helpers/region-item');
                    }

                    wp_reset_postdata();
                }
            ?>
            </div>
        </div>
    </div>
</section>

<?php if() : ?>
<section class="page-section featured_post " id="featured_post-6">
    <div class="container">
        <div class="container-wrapper">
            <h2 class="heading text-center">Explore More</h2>

            <div class="featured-post-items">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3 post-item">
                        <div class="post-item-container">
                            <div class="post-item-wrapper pos-relative">
                                <img src="http://localhost/adventures/wp-content/uploads/2023/02/Rectangle-10-1-1.jpg">

                                <h3 class="heading">Extraordinary Regions Airport Gateways</h3>
                            </div>
                            <div class="post-read-more has-color" style="background: #0ea9d1;">
                                <a href="#" target="">learn more →</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 post-item">
                        <div class="post-item-container">
                            <div class="post-item-wrapper pos-relative">
                                <img src="http://localhost/adventures/wp-content/uploads/2023/02/Rectangle-27-1.jpg">

                                <h3 class="heading">Sample Itineraries</h3>
                            </div>
                            <div class="post-read-more has-color" style="background: #81c65b;">
                                <a href="#" target="">see sample →</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 post-item">
                        <div class="post-item-container">
                            <div class="post-item-wrapper pos-relative">
                                <img src="http://localhost/adventures/wp-content/uploads/2023/02/Rectangle-10-3.jpg">

                                <h3 class="heading">Popular Combinations</h3>
                            </div>
                            <div class="post-read-more has-color" style="background: #ee9f24;">
                                <a href="#" target="">explore →</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 post-item">
                        <div class="post-item-container">
                            <div class="post-item-wrapper pos-relative">
                                <img src="http://localhost/adventures/wp-content/uploads/2023/02/Rectangle-10-4.jpg">

                                <h3 class="heading">Frequently Asked Questions</h3>
                            </div>
                            <div class="post-read-more has-color" style="background: #7856a4;">
                                <a href="#" target="">view faqs →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php get_footer(); ?>