<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class( $class ); ?>>

	<div class="scroll-helper"></div>

	<?php get_template_part('template-parts/navigation/navigation', 'navbar'); ?>

	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">

          	<div>
            	<ul class="nav navbar-nav">
              		<?php get_logo() ?>
            	</ul>
          	</div>

          	<div>
				<ul class="nav navbar-nav navbar-right">
				    <li>
		                <?php get_search_form() ?>
		            </li>
		            <?php if (has_nav_menu( 'navbar')) : ?>
			            <li>
			                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			                  <span class="sr-only">Toggle navigation</span>
			                  <span class="icon-bar"></span>
			                  <span class="icon-bar"></span>
			                  <span class="icon-bar"></span>
			                </button>
			            </li>
		            <?php endif; ?>
				</ul>
          	</div>
        </div>
      </div>
    </nav>
