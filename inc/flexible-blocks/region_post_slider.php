<?php 
    if( get_sub_field('heading') ){
        $args = array(
            'post_type' => 'regions',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'regions_tax',
                    'field' => 'term_id',
                    'terms' => array( get_sub_field('heading') ),
                ),
            )
        );


        $theRegions = new WP_Query( $args );
    }
?>

<section class="page-section region-post-slider <?php echo get_sub_field('custom_css'); ?>" id="region-post-slider-<?= get_row_index(); ?>">
<?php 
    if( get_sub_field('css_code') ){
        $customCSS = str_replace('{{section_id}}', '#adventure-distinction #region-post-slider-'. get_row_index(), get_sub_field('css_code'));

        echo '<style>'. $customCSS . '</style>';
    }
?>
    <div class="container">
        <div class="container-wrapper">
            <div class="heading-wrapper d-flex">
                <h3 class="heading"><?= get_term( get_sub_field('heading')  )->name;?></h3>
                <div class="btn view-all">View All</div>
            </div>
            <?php if( get_sub_field('custom_items') ) : ?>
            <div class="post-item-slider d-flex">
                <?php if( $theRegions->have_posts() ) : ?>
                    <?php while( $theRegions->have_posts() ) : $theRegions->the_post(); ?>
                    <div class="post-item-slider-wrapper">
                        <a href="<?= get_the_permalink( get_the_ID() ); ?>">
                            <img src="<?= get_the_post_thumbnail_url(); ?>" />
                            <h6 class="title"><?= get_the_title(); ?></h6>
                            <p><?= get_the_content(); ?></p>
                            <div class="number-of-days text-center">
                                <h4><?php echo get_field('number_of_days') ? get_field('number_of_days') : '7'; ?> <span>days</span></h4>
                            </div>  
                        </a>
                    </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                <?php else : ?>
                <?php foreach( get_sub_field('custom_items') as $item ) : ?>
                    <div class="post-item-slider-wrapper">
                        <?php if( $item['link'] ) : ?>
                        <a href="" style="text-decoration: none;">
                        <?php endif; ?>
                            <img src="<?php echo $item['image']; ?>" />
                            <h6 class="title"><?php echo $item['title']; ?></h6>
                            <p><?php echo $item['description']; ?></p>
                            <div class="number-of-days text-center">
                                <h4><?php echo $item['number_of_days']; ?> <span>days</span></h4>
                            </div>  
                        <?php if( $item['link'] ) : ?>
                        </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div> 
            <?php endif; ?>
        </div>
    </div>
</section>
