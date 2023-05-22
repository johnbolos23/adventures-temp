<div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-12 post-item">
    <div class="post-item-container">
        <div class="post-item-wrapper pos-relative">
            <img src="<?php echo get_sub_field('image') ? get_sub_field('image') : get_the_post_thumbnail_url(); ?>" />

            <h3 class="heading"><?php echo get_sub_field('title') ? get_sub_field('title') : get_the_title(); ?></h3>
        </div>
        <div class="post-read-more <?php echo get_sub_field('color') ? 'has-color' : ''; ?>"<?php if( get_sub_field('color')  ) : ?>style="background: <?= get_sub_field('color'); ?>;"<?php endif; ?>>
            <?php if( get_sub_field('link') ) : ?>
            <a href="<?= get_sub_field('link')['url']; ?>" target="<?= get_sub_field('link')['target']; ?>"><?= get_sub_field('link')['title']; ?> →</a>
            <?php else : ?>
            <a href="<?= get_the_permalink( get_the_ID() ); ?>">learn more →</a>
            <?php endif; ?>
        </div>
    </div>
</div>