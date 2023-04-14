<section class="breadcrumbs-section">
    <div class="container">
        <a href="<?= site_url(); ?>">Home</a>
        <?= get_template_part('inc/svg/chevron-right'); ?>
        <span><b><?= get_the_title(); ?></b></span>
    </div>
</section>

<section class="banner pos-relative" id="banner-<?= get_row_index(); ?>">
    <img src="<?= get_sub_field('desktop_image'); ?>" class="for-desktop" />
    <img src="<?= get_sub_field('laptop_image'); ?>" class="for-laptop" />
    <img src="<?= get_sub_field('tablet_image'); ?>" class="for-tablet" />
    <img src="<?= get_sub_field('mobile_image'); ?>" class="for-mobile" />
    <div class="text-wrapper">
        <h1 class="heading"><?= get_sub_field('heading'); ?></h1>
    </div>
</section>