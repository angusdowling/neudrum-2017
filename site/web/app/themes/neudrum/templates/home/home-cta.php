<?php
	/**
	 * @var string
	 **/
	$heading = get_field('cta_heading');
	
	/**
	 * @var string
	 **/
	$image = get_field('image');
	
	/**
	 * @var string
	 **/
	$sub_heading = get_field('cta_sub-heading');
	
	/**
	 * @var string
	 **/
	$link_text = get_field('link_text');
?>

<section class="home-cta page-section">
	<?php if(!empty($heading)): ?>
	<div class="home-cta__image" style="background-image: url('<?php echo get_img($image); ?>')"></div>
	<?php endif; ?>

	<div class="home-cta__content">
		<?php if(!empty($heading)): ?>
		<header class="home-cta__header">
			<h1><?php echo $heading; ?></h1>
		</header>
		<?php endif; ?>

		<?php if(!empty($link_text)): ?>
		<div class="home-cta__actions">
			<a href="#" class="button"><?php echo $link_text; ?></a>
		</div>
		<?php endif; ?>
	</div>
</section>