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
            <?php if( get_sub_field('heading') ) : ?>
                <h2 class="heading text-center"><?= get_sub_field('heading'); ?></h2>
            <?php endif; ?>
            
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