<?php
	$products = array(
		'left'  => get_field('product_left'),
		'right' => get_field('product_right')
	);
?>

<div class="product-overlay__wrapper">
	<?php foreach($products as $index => $product): ?>
		<?php if(!empty($product)): ?>
		<?php
			$price       = get_field('price', $product->ID);
			$description = get_field('description', $product->ID);
			$theme       = get_field('theme', $product->ID);
			$columns     = ($index == 'left') ? 'col-md-5' : 'col-md-7';
			$specs       = get_field('specification_document', $product->ID);
			$listedspecs = get_field('listed_specifications', $product->ID);
		?>

		<div class="product-overlay <?php echo $index; ?>">
			<div class="page-section">
				<div class="product-overlay__container">
					<div class="row no-gutter">
						<div class="col-lg-7 col-md-5">
							<div class="product-overlay__image" style="background-image:url(<?php echo get_post_img($product->ID); ?>)"></div>
						</div>
						<div class="col-lg-5 col-md-7">
							<div class="valign">
								<div class="valign-cell">
									<div class="product-overlay__header">
										<h2><?php echo get_the_title($product->ID); ?></h2>
									</div>

									<div class="product-overlay__content">
										<?php echo apply_filters('the_content', $description); ?>
										
										<?php if(!empty($listedspecs)): ?>
										<div class="product-overlay__meta">
											<ul class="list">
												<?php foreach($listedspecs as $spec): ?>
												<?php
													$spec_title = $spec['title'];
													$spec_value = $spec['value'];
												?>
												<?php if(!empty($spec_title) && !empty($spec_value)): ?>
												<li class="item">
													<span class="title"><?php echo $spec_title; ?></span>
													<span class="content"><?php echo $spec_value; ?></span>
												</li>
												<?php endif; ?>
												<?php endforeach; ?>
											</ul>
										</div>
										<?php endif; ?>
									</div>

									<?php if(!empty($specs)): ?>
									<div class="product-overlay__actions">
										<a target="_blank" class="button" href="<?php echo $specs; ?>">Download Spec Sheet</a>
									</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="product-overlay__close"></div>
		</div>

		<?php endif; ?>
	<?php endforeach; ?>
</div>