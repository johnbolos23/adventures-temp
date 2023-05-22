<section class="page-section image-with-text <?php echo get_sub_field('custom_css'); ?> <?php echo get_sub_field('position'); ?>-layout" id="image-with-text-<?= get_row_index(); ?>">
<?php 
    if( get_sub_field('css_code') ){
        $customCSS = str_replace('{{section_id}}', '#adventure-distinction #image-with-text-'. get_row_index(), get_sub_field('css_code'));

        echo '<style>'. $customCSS . '</style>';
    }
?>
    <div class="container">
        <div class="container-wrapper <?php echo get_sub_field('position') == 'right' ? 'flex-row-reverse' : ''; ?>">
            <img src="<?= get_sub_field('image'); ?>" class="for-desktop"/>
            <img src="<?= get_sub_field('tablet_image'); ?>" class="for-tablet"/>
            <div class="text-wrapper">
            <div class="text-wrapper">
                <div class="heading"><?php echo get_sub_field('heading'); ?></div>
                <div class="description"><?php echo get_sub_field('description'); ?>
            </div>
        </div>
    </div>
</section>
