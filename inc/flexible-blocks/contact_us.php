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
                    <div class="contact-details-wrapper">
                        <h6>Email Address</h6>
                            <span><?= get_sub_field('email_address'); ?></span>
                        <h6>Follow Us</h6>
                            <span>
                                <?php if( get_sub_field('instagram') ) : ?>
                                    <a href="<?= get_sub_field('instagram'); ?>"><?= get_template_part('inc/svg/instagram'); ?></a>
                                <?php endif; ?>
                                <?php if( get_sub_field('facebook') ) : ?>
                                    <a href="<?= get_sub_field('facebook'); ?>"><?= get_template_part('inc/svg/facebook'); ?></a>
                                <?php endif; ?>
                                <?php if( get_sub_field('linkedin') ) : ?>
                                    <a href="<?= get_sub_field('linkedin'); ?>"><?= get_template_part('inc/svg/linkedin'); ?></a>
                                <?php endif; ?>
                                <?php if( get_sub_field('twitter') ) : ?>
                                    <a href="<?= get_sub_field('twitter'); ?>"><?= get_template_part('inc/svg/twitter'); ?></a>
                                <?php endif; ?>
                                <?php if( get_sub_field('pinterest') ) : ?>
                                    <a href="<?= get_sub_field('pinterest'); ?>"><?= get_template_part('inc/svg/pinterest'); ?></a>
                                <?php endif; ?>
                                <?php if( get_sub_field('youtube') ) : ?>
                                    <a href="<?= get_sub_field('youtube'); ?>"><?= get_template_part('inc/svg/youtube'); ?></a>
                                <?php endif; ?>
                            </span>
                        <h6>Write Us</h6>
                            <span><?= get_sub_field('po_box_address'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>