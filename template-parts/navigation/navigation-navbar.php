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

		  	<!-- <div class="col-md-12">
			    <ul>
			      <li><a href="/level-one" class="navbar-content-item"><i class="fa fa-archive" aria-hidden="true"></i> Link 1 <i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>

			        <ul class="submenus submenu">
			          <li><a href="/level-two" class="navbar-content-sub-item"><i class="fa fa-bar-chart" aria-hidden="true"></i> Level 1 <i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>

			            <ul class="submenus submenu">
			              <li><a href="/level-three" class="navbar-content-sub-item"><i class="fa fa-bolt" aria-hidden="true"></i> Level 2 <i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>

			              <ul class="submenus submenu">
			                <li><a href="#"><i class="fa fa-camera" aria-hidden="true"></i> Level 3</a></li>
			                <li><a href="#"><i class="fa fa-camera" aria-hidden="true"></i> Level 3</a></li>
			                <li><a href="#"><i class="fa fa-camera" aria-hidden="true"></i> Level 3</a></li>
			                <li><a href="/level-two" class="go-back">Back</a></li>
			              </ul>

			              <li><a href="#"><i class="fa fa-bolt" aria-hidden="true"></i> Level 2</a></li>
			              <li><a href="#"><i class="fa fa-bolt" aria-hidden="true"></i> Level 2</a></li>
			              <li><a href="/level-one" class="go-back">Back</a></li>
			            </ul>

			          <li><a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i> Level 1</a></li>
			          <li><a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i> Level 1</a></li>
			          <li><a href="/menu" class="go-back">Back</a></li>
			        </ul>

			      <li><a href="#" class="navbar-content-item"><i class="fa fa-archive" aria-hidden="true"></i> Link 2</a></li>
			      <li><a href="#" class="navbar-content-item"><i class="fa fa-archive" aria-hidden="true"></i> Link 3</a></li>
			      <li><a href="#" class="navbar-content-item"><i class="fa fa-archive" aria-hidden="true"></i> Link 4</a></li>
			    </ul>
		  	</div> -->
		</div>

		<ul class="breadcrumbs"></ul>
	</div>
</div>




