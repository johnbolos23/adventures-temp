<section class="page-section cta-download" id="steps-<?= get_row_index(); ?>">
   <div class="container">
        <div class="container-wrapper">
            <div class="content">
                <?php echo get_sub_field('download_icon'); ?>
                <div class="text-wrapper">
                    <div class="file-name"><?php echo get_sub_field('file_name'); ?></div>
                    <div class="file-size"><?php echo get_sub_field('file_size'); ?></div>
                </div>
                <div class="btn cta-download-button">Download</div>
            </div>
        </div>
   </div>
</section>


<!-- <div class="container">
    <div class="container-wrapper">
        <div class="row justify-content-center">
            <div class="download-wrapper">
                <?php echo get_sub_field('download_icon'); ?>
                <div class="download-content">
                    <p><?php echo get_sub_field('file_name'); ?></p>
                    <p class="file-size"><?php echo get_sub_field('file_size'); ?></p>
                </div>
                <div class="btn cta-download-button">Download</div>
            </div>
        </div>
    </div>
</div> -->