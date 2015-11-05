<?php get_template_part( 'content', 'standard-top' ); ?>

<?php if (have_posts()) : ?>

  <?php while (have_posts()) : the_post(); ?>

    <?php simple_boostrap_display_post(['show_meta' => true]); ?>

    <?php comments_template('',true); ?>

    <?php if (get_next_post() || get_previous_post()) { ?>
    <nav class="section">
      <ul class="pager pager-unspaced">
        <li class="previous"><?php previous_post_link('%link', '<span class="glyphicon glyphicon-chevron-left"></span> ' . __( 'Previous Post', "default")); ?></li>
        <li class="next"><?php next_post_link('%link', __( 'Next Post', "default") . ' <span class="glyphicon glyphicon-chevron-right"></span>'); ?></li>
      </ul>
    </nav>
    <?php } ?>

  <?php endwhile; ?>

<?php else : ?>

  <?php get_template_part( 'content', 'not-found' ); ?>

<?php endif; ?>

<?php get_template_part( 'content', 'standard-bottom' ); ?>
