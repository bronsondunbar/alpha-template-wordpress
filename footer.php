<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<footer class="footer">
  <div class="container">
  	<?php if ( has_nav_menu( 'footer' ) ) : ?>
		<ul>
		    <?php get_template_part( 'template-parts/navigation/navigation', 'footer' ); ?>
		</ul>
	<?php endif; ?>

    <p>&copy; <?php echo get_bloginfo('name'); ?></p>
  </div>
</footer>

<?php wp_footer(); ?>

<script src="<?php echo get_template_directory_uri() ?>/assets/js/app.js"></script>
</body>
</html>
