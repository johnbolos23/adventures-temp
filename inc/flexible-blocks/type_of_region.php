<section class="page-section types-of-region" id="types-of-region-<?= get_row_index(); ?>">
    <div class="container">
        <div class="container-wrapper">
            <div class="row">
                <?php if( get_sub_field('type_of_region') ) : ?>
                    <?php foreach( get_sub_field('type_of_region') as $item ) : ?>
                    <div class="col-xxl-4 col-xl-4 text-center">
                        <div class="icon">
                            <?php echo $item['icon']; ?>
                        </div>
                        <h6><?php echo $item['heading']; ?></h6>
                        <p><?php echo $item['subheading']; ?></p>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>