<section class="page-section image-box <?php echo get_sub_field('custom_css'); ?>" id="image-box-<?= get_row_index(); ?>">
<?php 
    if( get_sub_field('css_code') ){
        $customCSS = str_replace('{{section_id}}', '#adventure-distinction #image-box-'. get_row_index(), get_sub_field('css_code'));

        echo '<style>'. $customCSS . '</style>';
    }
?>

    <div class="container">
        <div class="container-wrapper">
            <div class="row m-0 align-items-center<?php echo get_sub_field('image_position') == 'right' ? ' flex-row-reverse' : ''; ?>">
                <div class="col-12 col-lg-6 p-0">
                    <div class="col-wrapper">
                        <img src="<?= get_sub_field('image'); ?>" />
                    </div>
                </div>
                <div class="col-12 col-lg-6 p-0">
                    <div class="col-wrapper text-<?= get_sub_field('content_alignment'); ?> image-box-content-wrapper">
                        <?php if( get_sub_field('heading_type') == 'image' ) : ?>
                        <img src="<?= get_sub_field('heading_image'); ?>" class="image-box-heading" />
                        <?php else : ?>
                        <h3 class="image-box-heading"><?= get_sub_field('heading'); ?></h3>
                        <?php endif; ?>

                        <?php if( get_sub_field('description') ) : ?>
                        <div class="wysiwyg-content"><?= get_sub_field('description'); ?></div>
                        <?php endif; ?>

                        <?php if( get_sub_field('form') ) : ?>
                        <div class="image-box-form-wrapper">
                            <?= gravity_form( get_sub_field('form') ); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>