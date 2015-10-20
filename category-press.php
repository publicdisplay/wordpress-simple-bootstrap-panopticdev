<?php
/*
Use a custom template for the press release category, rather than the archive 
template. Mostly this just gets rid of the "Category: Foo" block at the top
*/
?>

<?php get_header(); ?>

<div class="container">

  <div id="content" class="row">

  	<div id="main" class="<?php simple_boostrap_main_classes(); ?>" role="main">
		
  		<div class="block">
        <header>
          <div class="article-header">
            <h1>Press</h1>
          </div>
        </header>
      </div>

  		<?php if (have_posts()) : ?>

  		<?php while (have_posts()) : the_post(); ?>
		
  		<?php simple_boostrap_display_post(['multiple_on_page' => true]); ?>    
		
  		<?php endwhile; ?>	
		
  		<?php simple_boostrap_page_navi(); ?>	
		
  		<?php else : ?>
		
  		<article id="post-not-found" class="block">
  		    <p><?php _e("No items found.", "default"); ?></p>
  		</article>
		
  		<?php endif; ?>

  	</div>

  	<?php get_sidebar("left"); ?>
  	<?php get_sidebar("right"); ?>

  </div>

</div>

<?php get_footer(); ?>