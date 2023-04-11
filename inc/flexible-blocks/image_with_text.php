<section class="page-section image-with-text <?php echo get_sub_field('position'); ?>-layout" id="image-with-text-<?= get_row_index(); ?>">
    <div class="container">
        <div class="container-wrapper">
            <div class="row <?php echo get_sub_field('position') == 'right' ? 'flex-row-reverse' : ''; ?>">
                <div class="col-xxl-5 col-xl-5">
                    <img src="<?= get_sub_field('image'); ?>" />
                </div>
                <div class="col-xxl-7 col-xl-7">
                    <h3><?php echo get_sub_field('heading'); ?></h3>
                    <?php echo get_sub_field('description'); ?>
                </div>
            </div>
        </div>        
    </div>
</section>


