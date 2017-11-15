<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<section role="default">
  <div class="container">

    <div class="grid">
      <div class="item">
        <div class="wrapper waypoint">
          <?php if (is_active_sidebar("hero-1")): ?>
            <div>
              <?php dynamic_sidebar("hero-1"); ?>
            </div>
          <?php endif; ?>
          
          <?php if (!is_active_sidebar("hero-1")): ?>
            <div>
              <h1><?php echo get_bloginfo($show, "name"); ?></h1>

              <p><?php echo get_bloginfo("description"); ?></p>

              <a href="#" class="btn btn-lg btn-default">Call to action</a>

              <p><a href="#" id="register">Extra link</a></p>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <div class="item">
        <?php if (is_active_sidebar("hero-2")): ?>
          <div>
            <?php dynamic_sidebar("hero-2"); ?>
          </div>
        <?php endif; ?>
        
        <?php if (!is_active_sidebar("hero-2")): ?>
          <div class="hero-image">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/hero.png" class="img-responsive" />
          </div>
        <?php endif; ?>
      </div>
    </div>

  </div>
</section>

<section role="highlight">
  <div class="container">

    <div id="carousel-desktop" class="carousel slide hidden-sm hidden-xs" data-interval="false" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
        
        <?php post_highlights(desktop) ?>

      </div>

      <?php if (wp_count_posts()->publish > 3): ?>
        <a class="left carousel-control hidden-sm" href="#carousel-desktop" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
      <?php endif; ?>

      <?php if (wp_count_posts()->publish > 3): ?>
        <a class="right carousel-control hidden-sm" href="#carousel-desktop" role="button" data-slide="next">
          <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      <?php endif; ?>
    </div>

    <div id="carousel-mobile" class="carousel slide hidden-lg hidden-md" data-interval="false" data-ride="carousel">
      <div class="carousel-inner" role="listbox">

        <?php post_highlights(mobile) ?>
        
      </div>
    </div>

  </div>
</section>

<section role="explore">
  <div class="container">

    <div class="grid">

      <div class="item">
        <div>
          <?php if (is_active_sidebar("explore-1")): ?>
            
              <?php dynamic_sidebar("explore-1"); ?>

          <?php endif; ?>
          
          <?php if (!is_active_sidebar("explore-1")) : ?>
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/explore-1.png" class="img-responsive" />
          <?php endif; ?>
        </div>
      </div>

      <div class="item">

        <div>
          <?php if (is_active_sidebar("explore-2")): ?>
              <?php dynamic_sidebar("explore-2"); ?>
          <?php endif; ?>
          
          <?php if (!is_active_sidebar("explore-2")) : ?>
            <h1>Aenean sollicitudin eget neque eget faucibus</h1>

            <p>Sed malesuada sapien sed ex rhoncus molestie. Quisque porta mauris eget nulla pulvinar cursus. Cras vulputate metus ut mauris laoreet molestie eu in velit. Nulla ipsum purus, sodales ut sapien quis, vestibulum suscipit sapien. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>

            <a href="explore.html" class="btn btn-lg btn-primary">Call to action</a>
            <?php endif; ?>
          </div>

      </div>

    </div>

  </div>
</section>

<?php get_footer();
