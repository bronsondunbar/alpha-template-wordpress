<?php
/**
 * The front page template file
 *
 * Template Name: Blog Page Template 
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<section role="all">
  <div class="container waypoint">

    <?php if (is_active_sidebar('all')): ?>
      <header>
        <?php dynamic_sidebar('all'); ?>
      </header>
    <?php endif; ?>
    
    <?php if (!is_active_sidebar('all')) : ?>
      <header>
        <h1><?php echo get_bloginfo('name'); ?></h1>

        <p><?php echo get_bloginfo('description'); ?></p>
      </header>
    <?php endif; ?>

    <div class="grid">
      <?php all_posts() ?>
    </div>

  </div>

</section>

<?php get_footer();
