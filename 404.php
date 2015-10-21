<?php get_template_part( 'content', 'standard-top' ); ?>

<article id="post-not-found" class="section">
  <header>
    <div class="article-header">
      <h1>
        <?php _e("Page not found", "default"); ?>
      </h1>
    </div>
  </header>

  <section class="post_content">
    <p class="lead">
      We couldn't find the content you were looking for. 
    </p>
    <p>
      We've recently moved some of our site content around, and it's possible we forgot to account
      for a few things. Would you like to <a href="/contact">let us know</a>?
    </p>
  </section>
</article>

<?php get_template_part( 'content', 'standard-bottom' ); ?>
