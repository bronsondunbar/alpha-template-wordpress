<?php
/**
 * Displays menu navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<div class="navbar-content">
	<div>
		<a href="#" class="navbar-content-close-btn">&times;</a>

		<h1 class="navbar-title">Menu</h1>

		<div class="row">
			<div class="col-md-12">
				<?php wp_nav_menu( array(
					'theme_location' => 'navbar',
					'menu_id'        => 'navbar',
				)); ?>
			</div>
		</div>

		<ul class="breadcrumbs"></ul>
	</div>
</div>




