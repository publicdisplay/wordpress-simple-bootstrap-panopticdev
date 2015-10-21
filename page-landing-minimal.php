<?php
/*
Template Name: Full Width, Minimal Layout Landing Page, No Title Block
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

        <div id="content" class="block">

          <div class="row">

            <div id="main" role="main" class="col-sm-12">

              <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>

                  <article id="post-<?php the_ID(); ?>" <?php post_class("section"); ?> role="article">
                    <section class="post_content">
                      <?php the_content(); ?>
                    </section>
                  </article>

                <?php endwhile; ?>

              <?php else : ?>

                <?php get_template_part( 'content', 'not-found' ); ?>

              <?php endif; ?>

            </div><!-- END #main -->

          </div><!-- END .row -->

        </div><!-- END #content.block -->

      </div><!-- END .container -->

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