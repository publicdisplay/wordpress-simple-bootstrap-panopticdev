<?php if (has_nav_menu("contact_nav")): ?>
<div class="widget widget_nav_menu">
  <h4 class="widgettitle">Contact Us</h4>
  <div class="menu-contact-aside-links-container">
    <?php
    simple_bootstrap_display_contact_aside_menu();
    ?>
  </div>
</div>
<?php endif ?>
<?php dynamic_sidebar( 'contact-aside' ); ?>
