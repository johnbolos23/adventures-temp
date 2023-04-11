<section class="page-section frequently-asked-questions" id="frequently-asked-questions-<?= get_row_index(); ?>">
    <div class="container">
        <div class="container-wrapper">
            <div class="row">
                <div class="col-xxl-12 col-xl-12">
                    <?php if( get_sub_field('questions') ) : ?>
                        <?php foreach( get_sub_field('questions') as $item ) : ?>
                            <button class="accordion"><?php echo $item['heading']; ?></button>
                            <div class="accordion-content">
                                <div class="information-wrapper">
                                    <?php echo $item['information']; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div> 
            </div>
        </div>
    </div>
</section>





