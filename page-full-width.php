<?php
/*
Template Name: Full Width Page
*/
?>

<?php get_header(); ?>

<div id="content" class="row">

	<div id="main" class="col-lg-12" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<?php simple_boostrap_display_post(['show_meta' => false]); ?>

		<?php comments_template(); ?>
		
		<?php endwhile; ?>	
		
		<?php else : ?>
		
		<article id="post-not-found" class="block">
		    <p><?php _e("No pages found.", "default"); ?></p>
		</article>
		
		<?php endif; ?>

    <?php include dirname(__FILE__) . '/start-a-project-bar.php' ?>

	</div>

</div>

<?php get_footer(); ?>