<?php 
defined( 'ABSPATH' ) || exit;

get_header();


if( get_field('use_this_page_content', 'term_'. get_queried_object()->term_id) ){
    while( have_rows('flexible_blocks', get_field('use_this_page_content', 'term_'. get_queried_object()->term_id) ) ) : the_row();

        get_template_part( 'inc/flexible-blocks/' . get_row_layout() );

    endwhile;
}else{

?>


<section class="breadcrumbs-section">
    <div class="container">
        <div class="container-wrapper">
            <a href="<?= site_url(); ?>">Home</a>
            <?= get_template_part('inc/svg/chevron-right'); ?>
            <span><b><?= get_queried_object()->name; ?></b></span>
        </div>
    </div>
</section>


<section class="region-header pos-relative" style="background-image: url(<?= get_field('image','term_'. get_queried_object()->term_id ); ?>);">
    <div class="text-wrapper">
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


<?php 
}

get_footer();?>
