<?php
	$image   = get_field('contact_image');
	$body    = get_field('contact_body');
	$social  = get_field('contact_social');
	$form    = get_field('contact_form');
?>
<div class="home-contact page-section">

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-7 col-md-5">
				<?php if(!empty($image)): ?>
				<div class="home-contact__image" style="background-image: url(<?php echo get_img($image); ?>)"></div>
				<?php endif; ?>

				<div class="home-contact__social">
					<div class="valign">
						<div class="valign-cell">
						<?php /* ?>
							<?php if(!empty($body)): ?>
							<div class="home-contact__social__body">
								<?php echo $body; ?>
							</div>
							<?php endif; ?>

							<?php if(!empty($social)): ?>
							<div class="home-contact__social__heading">Stay tuned in</div>
							<ul class="list">
								<?php foreach($social as $item): ?>
								<?php
									$icon = $item['icon'];
									$url  = $item['url'];
									$text = $item['text'];
								?>
								<li class="item">
									<a target="_blank" class="link" href="<?php echo $url; ?>"><?php echo $icon;?></a>
								</li>
								<?php endforeach;?>
							</ul>
							<?php endif; ?>
							<?php */ ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5 col-md-7">
				<?php if(!empty($form)): ?>
				<div class="home-contact__content">
					<?php echo do_shortcode('[contact-form-7 id="'.$form->ID.'" title="Contact form"]'); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
</div>