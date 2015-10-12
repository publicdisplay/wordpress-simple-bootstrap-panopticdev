		
    	   </div>
        </div>
            
        <footer>
            <div id="inner-footer" class="vertical-nav">
                <div class="container">
                    <div class="row">
                        <?php dynamic_sidebar('footer1'); ?>
                        
                        <?php if (has_nav_menu("social_nav")): ?>
                        <div class="col-xs-12 col-sm-6 col-sm-4">
                          <h4>Contact Us</h4>
                          <div>
                            <?php
                              simple_bootstrap_display_social_menu();
                            ?>
                          </div>
                        </div>
                        <?php endif ?>                          
                    </div>
                    <div class="row" id="copyright">
                        <div class="col-sm-12 col-md-6">
                            <p><?php _e('&copy; 2010 &mdash; ' . date("Y") . ' <a href="/">Panoptic Development</a>, Inc. All Rights Reserved.', 'simple-bootstrap-panopticdev') ?></p>
                        </div>
                        <div class="col-sm-12 col-md-6 hidden-xs hidden-sm">
                          <?php if (has_nav_menu("footer_nav")): ?>
                          <?php
                              simple_bootstrap_display_footer_menu();
                          ?>
                          <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>

	<?php wp_footer(); // js scripts are inserted using this function ?>

</body>

</html>