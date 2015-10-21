<?php
/*
Template Name: Contact Sidebar, S-a-P Widget at Bottom
*/
?>

<?php get_header(); ?>

<div class="container">

  <div id="content" class="block">

    <div class="row">

      <div id="main" role="main" class="col-md-8">

        <?php if (have_posts()) : ?>

          <?php while (have_posts()) : the_post(); ?>

            <?php simple_boostrap_display_post(['show_meta' => false]); ?>

            <?php comments_template(); ?>

          <?php endwhile; ?>

        <?php else : ?>

          <?php get_template_part( 'content', 'not-found' ); ?>

        <?php endif; ?>

      </div><!-- END #main -->

      <div id="sidebar-right" class="col-md-4" role="complementary">

        <div class="vertical-nav">

          <?php if (has_nav_menu("contact_nav")): ?>
          <div class="widget widget_nav_menu">

            <h4 class="widgettitle">Contact Us</h4>

            <div class="menu-contact-aside-links-container">

              <?php simple_bootstrap_display_contact_aside_menu(); ?>

            </div>

          </div>
          <?php endif ?>

          <?php dynamic_sidebar( 'contact-aside' ); ?>

        </div>

      </div>

    </div><!-- END .row -->

  </div><!-- END #content.block -->

  <?php get_template_part( 'content', 'start-a-project' ); ?>

</div><!-- END .container -->

<?php get_footer(); ?>
