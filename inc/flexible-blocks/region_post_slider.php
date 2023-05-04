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
                <?php foreach( get_sub_field('custom_items') as $item ) : ?>
                    <div class="post-item-slider-wrapper">
                        <img src="<?php echo $item['image']; ?>" />
                        <h6 class="title"><?php echo $item['title']; ?></h6>
                        <p><?php echo $item['description']; ?></p>
                        <div class="number-of-days text-center">
                            <h4><?php echo $item['number_of_days']; ?> <span>days</span></h4>
                        </div>  
                    </div>
                <?php endforeach; ?>
            </div> 
            <?php endif; ?>
        </div>
    </div>
</section>
