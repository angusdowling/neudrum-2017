<?php
	$products = array(
		'left'  => get_field('product_left'),
		'right' => get_field('product_right')
	);
?>

<div class="home-products page-section">
	<div class="container-fluid">
		<div class="row">
			<?php foreach($products as $index => $product): ?>
				<?php if(!empty($product)): ?>
				<?php
					$price       = get_field('price', $product->ID);
					$description = get_field('description', $product->ID);
					$material    = get_field('material', $product->ID);
					$size        = get_field('size', $product->ID);
					$theme       = get_field('theme', $product->ID);
					$columns     = ($index == 'left') ? 'col-md-5' : 'col-md-7';
					$specs       = get_field('specification_document', $product->ID);
				?>
				<div class="<?php echo $columns; ?>">
					<div class="home-products__product theme-<?php echo $theme; ?>" data-index="<?php echo $index; ?>">
						<div class="home-products__product__image" style="background-image:url(<?php echo get_post_img($product->ID); ?>)"></div>
						<div class="home-products__product__content">
							<h2>
								<?php echo get_the_title($product->ID); ?>
								<?php if(!empty($price) && (int)$price !== 0): ?>
								&mdash;
								<span class="price">$<?php echo number_format($price); ?></span>
								<?php endif; ?>
							</h2>

							<span class="arrow arrow-transition"></span>
						</div>
					</div>
				</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
</div>