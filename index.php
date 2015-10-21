<?php
/*
Template Name: Standard Sidebars, No S-a-P Widget (Default)
*/
?>

<?php get_template_part( 'content', 'standard-top' ); ?>

<?php if (have_posts()) : ?>

  <?php while (have_posts()) : the_post(); ?>

    <?php simple_boostrap_display_post(['multiple_on_page' => true]); ?>

  <?php endwhile; ?>	

  <?php simple_boostrap_page_navi(); ?>	

<?php else : ?>

  <?php get_template_part( 'content', 'not-found' ); ?>

<?php endif; ?>

<?php get_template_part( 'content', 'standard-bottom' ); ?>
