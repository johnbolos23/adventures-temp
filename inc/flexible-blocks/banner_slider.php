<section class="page-section banner-slider" id="banner-slider-<?= get_row_index(); ?>">
    <div class="banner-slider-wrapper">
        <div class="banner-main-slider">
            <?php foreach( get_sub_field('slides') as $item ) : ?>
            <div class="banner-slider-item">
                <div class="banner-slider-item-wrapper" style="background-image: url(<?= $item['image']; ?>);">
                    <h2 class="heading banner-slider-heading"><?= $item['title']; ?></h2>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>