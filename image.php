<?php
/**
 * The WordPress template hierarchy first checks for any
 * MIME-types and then looks for the attachment.php file.
 *
 * @link codex.wordpress.org/Template_Hierarchy#Attachment_display
 */
?>

<?php get_template_part( 'content', 'standard-top' ); ?>

<?php if (have_posts()) : ?>

  <?php while (have_posts()) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class("section"); ?> role="article">
    <header>
      <div class="article-header">
        <h1 itemprop="headline">
          <a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo esc_html(get_the_title($post->post_parent)); ?></a> &raquo; <?php the_title(); ?>
        </h1>
      </div>
    </header>

    <section class="post_content" itemprop="articleBody">
      <!-- To display current image in the photo gallery -->
      <div class="attachment-img">
        <a href="<?php echo wp_get_attachment_url($post->ID); ?>">
          <?php
          $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );

          if ($image) : 
          ?>
            <img src="<?php echo $image[0]; ?>" alt="" />
          <?php endif; ?>
        </a>
      </div>
    </section>

    <footer>
      <?php the_tags('<p class="tags">', ' ', '</p>'); ?>
    </footer>
  </article>

  <nav class="section">
    <ul class="pager pager-unspaced">
      <li class="previous"><?php next_image_link( false, '<span class="glyphicon glyphicon-chevron-left"></span> ' . __( 'Previous Image', "default")); ?></li>
      <li class="next"><?php previous_image_link( false, __( 'Next Image', "default") . ' <span class="glyphicon glyphicon-chevron-right"></span>'); ?></li>
    </ul>
  </nav>

  <?php comments_template(); ?>

  <?php endwhile; ?>

<?php else : ?>

  <?php get_template_part( 'content', 'not-found' ); ?>

<?php endif; ?>

<?php get_template_part( 'content', 'standard-bottom' ); ?>
