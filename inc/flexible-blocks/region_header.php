<section class="breadcrumbs-section">
    <div class="container">
        <div class="container-wrapper">
            <a href="<?= site_url(); ?>">Home</a>
            <?= get_template_part('inc/svg/chevron-right'); ?>
            <span><b><?= get_the_title(); ?></b></span>
        </div>
    </div>
</section>

<section class="region-header pos-relative" id="region-header-<?= get_row_index(); ?>">
    <img src="<?= get_sub_field('desktop_image'); ?>" class="for-desktop" />
    <img src="<?= get_sub_field('laptop_image'); ?>" class="for-laptop" />
    <img src="<?= get_sub_field('tablet_image'); ?>" class="for-tablet" />
    <img src="<?= get_sub_field('mobile_image'); ?>" class="for-mobile" />
    <div class="text-wrapper">
        <h1 class="heading"><?= get_sub_field('heading'); ?></h1>
    </div>
</section>

