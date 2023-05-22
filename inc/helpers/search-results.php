<div class="col d-flex">
    <div class="text-wrapper">
        <h6><?= get_the_title(); ?></h6>
        <div class="wysiwyg-content">
			<?= wp_trim_words(get_the_content(), 55, '...'); ?>
		</div>
    </div>
    <button class="read-more"><a href="<?= get_the_permalink(); ?>" style="color: inherit; text-decoration: none;">Read More</a></button>
</div>
