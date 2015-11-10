<?php
/*
Template Name: No Sidebars, S-a-P Widget at Bottom
*/
?>

<?php get_header(); ?>

<div class="container">

  <div id="content" class="block">

    <div class="row">

      <div id="main" role="main" class="col-sm-12">

        <?php if (have_posts()) : ?>

          <?php while (have_posts()) : the_post(); ?>

            <?php simple_boostrap_display_post(['show_meta' => false]); ?>

            <?php comments_template(); ?>

          <?php endwhile; ?>

        <?php else : ?>

          <?php get_template_part( 'content', 'not-found' ); ?>

        <?php endif; ?>

      </div><!-- END #main -->

    </div><!-- END .row -->

  </div><!-- END #content.block -->

  <?php get_template_part( 'content', 'start-a-project' ); ?>

</div><!-- END .container -->

<?php get_footer(); ?>
