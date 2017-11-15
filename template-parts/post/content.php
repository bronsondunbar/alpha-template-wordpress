<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<section role="post">

	<div class="container">

		<header>
			<?php display_single_post_header() ?>
		</header>

		<?php if (is_active_sidebar("post-2")): ?>
          	<?php dynamic_sidebar("post-2"); ?>
      	<?php endif; ?>

		<?php the_content(); ?>

		<?php if (is_active_sidebar("post-3")): ?>
          	<?php dynamic_sidebar("post-3"); ?>
      	<?php endif; ?>
	</div>

</section>
