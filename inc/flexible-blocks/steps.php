<section class="page-section steps" id="steps-<?= get_row_index(); ?>">
    <div class="container">
        <div class="container-wrapper">
            <div class="row text-center">
                <h3><?php echo get_sub_field('section_heading'); ?></h3>
                <?php if( get_sub_field('next_steps') ) : ?>
                    <?php foreach( get_sub_field('next_steps') as $item ) : ?>
                        <div class="col text-center">
                            <?php echo $item['icon']; ?>
                            <h6><?php echo $item['heading']; ?></h6>
                                <div class="number-wrapper">
                                    <h5>
                                        <?php echo $item['number_of_step']; ?>
                                    </h5>
                                </div>
                                <div class="arrow"><?php echo $item['next_arrow']; ?></div>
                            <p><?php echo $item['subheading']; ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
