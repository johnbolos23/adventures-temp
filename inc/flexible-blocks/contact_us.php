<section class="page-section contact-us" id="contact-us-<?= get_row_index(); ?>">
    <div class="container">
        <div class="container-wrapper">
            <div class="row">
                <div class="col">
                    <h3 class="form_heading"><?= get_sub_field('form_heading'); ?></h3>
                    <?php if( get_sub_field('form') ) : ?>
                        <div class="contact-details-form-wrapper">
                            <?= gravity_form( get_sub_field('form') ); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col">
                    <h3 class="contact_details_heading"><?= get_sub_field('contact_details_heading'); ?></h3>
                        <?php if( get_sub_field('contact_details') ) : ?>
                            <?php foreach( get_sub_field('contact_details') as $item ) : ?>
                                <div class="contact-details-wrapper">
                                    <p class="contact-details-label"><?php echo $item['contact_details_label']; ?></p>
                                    <p class="contact-details-information"><?php echo $item['contact_details_information']; ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <div class="social-icons">
                        <?= get_sub_field('instagram'); ?>        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>