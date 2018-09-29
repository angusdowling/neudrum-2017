<nav class="menu-secondary" role="navigation">
	<?php
	if (has_nav_menu('primary_navigation')) :
		wp_nav_menu(array('theme_location' => 'secondary_navigation', 'menu_class' => 'list'));
	endif;
	?>
</nav>