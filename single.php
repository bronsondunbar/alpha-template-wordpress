<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<section role="post">
 	<div class="container waypoint">

			<?php
				while (have_posts()) : the_post();

					get_template_part('template-parts/post/content', get_post_format());

					if (comments_open() || get_comments_number()) :
						comments_template();
					endif;

				endwhile;
			?>

	</div>
</div>

<?php get_footer();
