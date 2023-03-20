<section class="breadcrumbs-section">
    <div class="container">
        <a href="<?= site_url(); ?>">Home</a>
        <?= get_template_part('inc/svg/chevron-right'); ?>
        <span><b><?= get_sub_field('heading'); ?></b></span>
    </div>
</section>
<section class="region-header pos-relative" style="background-image: url(<?= get_sub_field('image'); ?>);" id="region-header-<?= get_row_index(); ?>">
    <div class="container text-center pos-relative">
        <h1 class="heading"><?= get_sub_field('heading'); ?></h1>
    </div>
</section>