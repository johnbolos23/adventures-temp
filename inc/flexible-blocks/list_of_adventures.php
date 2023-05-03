<section class="page-section list-of-adventures" id="list-of-adventures-<?= get_row_index(); ?>">
    <div class="container">
        <div class="container-wrapper">
            <h3 class="heading"><?php echo get_sub_field('heading'); ?></h3>
            <p><?php echo get_sub_field('description'); ?></p>
            <div class="row">
                <?php if( get_sub_field('custom_items') ) : ?>
                    <?php foreach( get_sub_field('custom_items') as $item ) : ?>
                        <div class="col-xxl-4">
                            <div class="item-wrapper d-flex">
                                <div class="icon">
                                    <?php echo $item['icon']; ?>
                                </div>  
                                <h6 class="label"><?php echo $item['label']; ?></h6>
                            </div>
                        </div> 
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <hr class="horizontal-line">
        </div>
    </div>
</section>