<?php get_header(); ?>

<div id="content" class="row">

	<div id="main" class="<?php simple_boostrap_main_classes(); ?>" role="main">
		
		<div class="block">
      <header>
        <div class="article-header">
          <h1><?php echo _x("Search for:", "label", "default"); ?> <?php echo esc_attr(get_search_query()); ?></h1>
        </div>
      </header>
		</div>

		<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
		
		<?php simple_boostrap_display_post(['multiple_on_page' => true]); ?>
		
		<?php endwhile; ?>	
		
		<?php simple_boostrap_page_navi(); ?>		
		
		<?php else : ?>
		
		<!-- this area shows up if there are no results -->
		
		<article id="post-not-found" class="block">
		    <p><?php _e("No items found.", "default"); ?></p>
		</article>
		
		<?php endif; ?>

	</div>
	
	<?php get_sidebar("left"); ?>
	<?php get_sidebar("right"); ?>

</div>

<?php get_footer(); ?>