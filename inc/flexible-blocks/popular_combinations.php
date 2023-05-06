<section class="page-section popular-combinations" id="popular-combinations-<?= get_row_index(); ?>">
    <div class="container">
        <div class="container-wrapper">
            <div class="row">
                <?php if( get_sub_field('content') ) : ?>
                    <?php foreach( get_sub_field('content') as $item ) : ?>
                        <div class="column">
                            <div class="image-wrapper">
                                <img src="<?php echo $item['first_image']; ?>" />
                                <span><?= get_template_part('inc/svg/image-divider'); ?></span>
                                <img src="<?php echo $item['second_image']; ?>" />
                                <h4><?php echo $item['title']; ?></h4>
                            </div>
                          
                            <div class="location">
                                <span class="map-icon"><?= get_template_part('inc/svg/map-pin'); ?></span>
                                <p class="test"><?php echo $item['location']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

