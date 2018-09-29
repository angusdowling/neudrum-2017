<?php
	$image = get_field('about_featured_image');
	$title = get_field('about_title');
	$tabs  = get_field('about_tabs');
?>

<div class="home-about page-section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-7">
				<?php if(!empty($tabs)): ?>
				<div class="home-about__content">
					<?php if(!empty($title)): ?>
					<div class="home-about__header">
						<h2><?php echo $title; ?></h2>
					</div>
					<?php endif; ?>
			
					<div class="home-about__tabs">
						<ul id="myTab" class="nav nav-tabs">
							<?php foreach($tabs as $index => $tab): ?>
							<?php $active = ($index == 0) ? 'active' : ''; ?>
							<li class="<?php echo $active; ?>"><a href="#tab-<?php echo $index; ?>" data-toggle="tab"><?php echo $tab['header']; ?></a></li>
							<?php endforeach; ?>
						</ul>
						
						<div id="myTabContent" class="tab-content clearfix">
							<?php foreach($tabs as $index => $tab): ?>
							<?php $active = ($index == 0) ? 'active' : ''; ?>
							<div class="tab-panel <?php echo $active; ?>" id="tab-<?php echo $index; ?>">
								<?php echo apply_filters('the_content', $tab['body']); ?>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>

			<div class="col-md-5 hidden-xs hidden-pb hidden-mb hidden-sm">
				<?php if(!empty($image)): ?>
				<div class="home-about__image" style="background-image: url(<?php echo get_img($image); ?>)"></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>


