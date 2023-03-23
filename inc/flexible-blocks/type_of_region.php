<section class="page-section types-of-region" id="types-of-region-<?= get_row_index(); ?>">
    <div class="container">
        <div class="container-wrapper">
            <?php foreach( get_sub_field('type_of_region') as $item ) : ?>
                <div class="row">
                <?php if( get_sub_field('contact_details') ) : ?>
                    <div class="col-xxl-4 col-xl-4">
                        <?php echo $item['icon']; ?>
                        <?php echo $item['heading']; ?>
                        <?php echo $item['subheading']; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>