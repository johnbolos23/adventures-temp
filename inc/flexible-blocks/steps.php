<section class="page-section steps" id="steps-<?= get_row_index(); ?>">
    <div class="container">
        <div class="container-wrapper">
            <h3 class="heading text-center"><?php echo get_sub_field('heading'); ?></h3>
            <div class="content-wrapper">
                <?php if( get_sub_field('next_steps') ) : ?>
                    <?php foreach( get_sub_field('next_steps') as $item ) : ?>
                        <div class="steps">
                            <?php echo $item['icon']; ?>
                            <h6 class="title"><?php echo $item['title']; ?></h6>
                            <div class="number-of-step">
                                <span><?php echo $item['number_of_step']; ?></span>
                                <?php echo $item['next_arrow']; ?>
                            </div>
                            <p class="description"><?php echo $item['description']; ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
          
        </div>
    </div>
</section> 