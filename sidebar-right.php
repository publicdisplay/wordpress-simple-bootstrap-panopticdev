<?php if ( is_active_sidebar( 'sidebar-right' ) ) { ?>
<div id="sidebar-right" class="<?php simple_boostrap_sidebar_right_classes(); ?>" role="complementary">
  <div class="vertical-nav">
    <?php dynamic_sidebar( 'sidebar-right' ); ?>
  </div>
</div>
<?php } ?>
