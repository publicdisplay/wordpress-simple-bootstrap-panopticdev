<?php
/*
Template Name: Bare Bones Landing Page - No Background, Header, or Title Block
*/
?>

<!doctype html>

<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php wp_head(); ?>
</head>

<body <?php body_class("landing-bare-bones"); ?>>

  <div id="content-wrapper">

    <div id="page-content">

      <div class="container">

        <div id="content">

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

  </div><!-- END #content-wrapper -->

  <?php wp_footer(); // js scripts are inserted using this function ?>

</body>

</html>