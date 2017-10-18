<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<section role="all">
  <div class="container waypoint">
      	<header>
	        <?php if (have_posts()) : ?>
				<h1><?php printf(__('<i class="fa fa-search" aria-hidden="true"></i> Search Results for: %s', 'twentyseventeen'), '<span>' . get_search_query() . '</span>' ); ?></h1>
			<?php else : ?>
				<h1><?php _e('<i class="fa fa-search" aria-hidden="true"></i> Nothing Found', 'twentyseventeen'); ?></h1>
				<?php get_search_form(); ?>
			<?php endif; ?>
      	</header>

      	<?php if (have_posts()): ?>

      		<div class="grid">
				<?php all_posts(); ?>
			</div>

		<?php else : ?>

			<p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>
		<?php endif; ?>
   </div>
</section>

<?php get_footer();
