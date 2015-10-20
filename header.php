<!doctype html>

<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <div id="content-wrapper">

    <header>
      <nav class="navbar navbar-default navbar-static-top">
        <div class="container">

          <div class="navbar-header">
            <?php if (has_nav_menu("main_nav")): ?>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-responsive-collapse">
              <span class="sr-only"><?php _e('Navigation', 'default'); ?></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <?php endif ?>
            <a class="navbar-brand" title="<?php bloginfo('description'); ?>" href="<?php echo esc_url(home_url('/')); ?>">
              <img class="hidden-xs hidden-sm" width="108" height="141" src="<?php echo get_template_directory_uri().'/images/branding/logo.png' ?>" alt="<?php bloginfo('name'); ?>">
              <span class="hidden-md hidden-lg">
                <?php bloginfo('name'); ?>
              </span>
            </a>
          </div>

          <?php if (has_nav_menu("main_nav")): ?>
          <div id="navbar-responsive-collapse" class="collapse navbar-collapse">
            <?php
                simple_bootstrap_display_main_menu();
            ?>

            <?php if (has_nav_menu("button_nav")): ?>
            <?php
                simple_bootstrap_display_action_button_menu();
            ?>
            <?php endif ?>


          </div>
          <?php endif ?>
        </div>
      </nav>
    </header>

    <div id="page-content">
