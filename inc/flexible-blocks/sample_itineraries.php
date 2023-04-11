<section class="page-section sample-itineraries" id="sample-itineraries-<?= get_row_index(); ?>">
    <div class="container">
        <div class="container-wrapper">
            <div class="row">
                <?php if( get_sub_field('content') ) : ?>
                    <?php foreach( get_sub_field('content') as $item ) : ?>
                        <div class="col-xxl-12 col-xl-12">
                            <div class="sample-itineraries-content">
                                <img src="<?php echo $item['image']; ?>" />
                                <div class="text-content">
                                    <h4 class="sample-itineraries-title"><?php echo $item['title']; ?></h4>
                                    <div class="wysiwyg-destination">
                                        <?php echo $item['destination']; ?>
                                    </div>
                                    <p class="sample-itineraries-description"><?php echo $item['description']; ?></p>
                                </div>
                                <img src="<?php echo $item['map_image_location']; ?>" />
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="btn more-itineraries">More Itineraries</div>
            </div>
        </div>
    </div>
</section>