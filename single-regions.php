<?php 
defined( 'ABSPATH' ) || exit;

get_header();

?>

<section class="breadcrumbs-section">
    <div class="container">
        <a href="<?= site_url(); ?>">Home</a>
        <?= get_template_part('inc/svg/chevron-right'); ?>
        <span><b><?= get_the_title(); ?></b></span>
    </div>
</section>

<section class="region-header pos-relative" style="background-image: url(<?php echo get_field('image'); ?>);" id="region-header-<?= get_row_index(); ?>">
    <div class="container pos-relative">
        <h1 class="heading"><?php echo get_field('heading'); ?></h1>
    </div>
</section>

<section class="single-region-description">
    <div class="container">
        <div class="row">
            <div class="col-xxl-3 col-xl-3">
                <img src="<?php echo get_field('first_image'); ?> ">             
            </div>
            <div class="col-xxl-5 col-xl-5">
                <h3><?php echo get_field('first_heading'); ?></h3>
                <?php echo get_field('first_content'); ?>
            </div>
            <div class="col-xxl-4 col-xl-4 text-center">
                <div class="map">
                    MAP HERE
                </div>
            </div>
        </div>
    </div>
</section>


<section class="single-region-about">
    <div class="container">
        <div class="row">
            <div class="col-xxl-3 col-xl-3">
                <img class="second_image" src="<?php echo get_field('second_image'); ?> "> 
                <img src="<?php echo get_field('third_image'); ?> "> 
                <img src="<?php echo get_field('fourth_image'); ?> "> 
            </div>
            <div class="col-xxl-9 col-xl-9">
                <h3><?php echo get_field('second_heading'); ?></h3>
                <?php echo get_field('second_content'); ?>
            </div>
        </div>
    </div>
</section>

<section class="single-region-summary">
    <div class="container">
        <div class="row">
        <div class="col-xxl-3 col-xl-3">
                <img src="<?php echo get_field('fifth_image'); ?> "> 
                <img src="<?php echo get_field('sixth_image'); ?> "> 
            </div>
            <div class="col-xxl-9 col-xl-9">
                <h3>Summary</h3>
                <?php foreach( get_field('summary') as $item ) : ?>
                    <p><?php echo $item['summary_labels'];?></p>
                <?php endforeach; ?>
            </div>
            <!-- <div class="col">hi</div> -->
        </div>
    </div>
</section>

<?php get_footer(); ?>