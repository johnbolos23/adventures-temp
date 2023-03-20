<section class="page-section region-categories-section" id="region-categories-<?= get_row_index(); ?>">
    <div class="container">
        <div class="region-categories-wrapper">
            <div class="row">
                <?php 
                $terms = get_terms( array(
                    'taxonomy' => 'regions_tax',
                    'hide_empty' => false,
                ) );

                foreach( $terms as $term ) : ?>
                <div class="region-category-item">
                    <div class="region-category-item-wrapper position-relative">
                        <img src="<?= get_field('image', 'term_' . $term->term_id ); ?>" />
                        <div class="region-category-item-detail">
                            <h3><?= $term->name; ?></h3>
                            <a href="<?= get_term_link($term->term_id); ?>">Explore →</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>