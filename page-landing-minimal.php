<?php
/*
Template Name: Minimal Landing Page
*/
?>

<!doctype html>

<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php wp_head(); ?>
</head>

<body <?php body_class("landing"); ?>>

  <div id="content-wrapper">

    <header>
      <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <span class="navbar-brand" title="<?php bloginfo('description'); ?>">
              <img class="hidden-xs hidden-sm" width="108" height="141" src="<?php echo get_template_directory_uri().'/images/branding/logo.png' ?>" alt="<?php bloginfo('name'); ?>">
              <span class="hidden-md hidden-lg">
                <?php bloginfo('name'); ?>
              </span>
            </span>
          </div>
        </div>
      </nav>
    </header>

    <div id="page-content">

      <div class="container">

        <div id="content" class="row">

        	<div id="main" class="col-lg-12" role="main">


        		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        		<div class="block">
              <header>
                <div class="article-header">
                  <h1><?php the_title(); ?></h1>
                </div>
              </header>
            </div>

            <article id="post-<?php the_ID(); ?>" <?php post_class("block"); ?> role="article">
            		<?php the_content(); ?>
        		</article>
		
            <?php endwhile; ?>	

        		<?php else : ?>

        		<article id="post-not-found" class="block">
                <p><?php _e("No pages found.", "default"); ?></p>
        		</article>

            <?php endif; ?>
            
        	</div>

        </div>
  
      </div>

		
    </div><!-- END #page-content -->
        
    <footer>
        <div id="inner-footer" class="vertical-nav">
            <div class="container">
                <div class="row" id="copyright">
                    <div class="col-md-12 text-center">
                        <p><?php _e('&copy; 2010 &mdash; ' . date("Y") . ' Panoptic Development, Inc. All Rights Reserved.', 'simple-bootstrap-panopticdev') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

  </div><!-- END #content-wrapper -->

  <?php wp_footer(); // js scripts are inserted using this function ?>

</body>

</html>