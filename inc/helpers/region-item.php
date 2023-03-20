<?php
$theTerms = get_the_terms( get_the_ID(), 'region_location' );

$termNames = '';

foreach( $theTerms as $category ){
    $termNames .= '('. get_field('abbreviation', 'term_'. $category->term_id) .')';
}


$theCategories = get_the_terms( get_the_ID(), 'region_cat' );
?>
<div class="col-12 col-lg-4">
    <div class="region-item-wrapper">
        <img src="<?= get_the_post_thumbnail_url(); ?>" />

        <div class="region-item-details">
            <h3 class="region-item-name"><?= get_the_title(); ?> <?= $termNames; ?></h3>
            <p><?= get_the_content(); ?></p>
            <div class="region-item-categories d-flex">
                <?php foreach( $theCategories as $category ) : ?>
                <span><?= $category->name; ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>