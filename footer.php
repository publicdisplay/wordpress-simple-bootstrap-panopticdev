		
    	   </div>
        </div>
            
        <footer>
            <div id="inner-footer" class="vertical-nav">
                <div class="container">
                    <div class="row">
                        <?php dynamic_sidebar('footer1'); ?>

                        <div class="col-xs-12 text-center">
                            <p><?php _e('Copyright 2015 <a href="https://github.com/nicolas-van">@nicolas-van</a>', 'simple-bootstrap-panopticdev') ?></p>
                            <p><?php _e("Powered by WordPress", "default"); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>

	<?php wp_footer(); // js scripts are inserted using this function ?>

</body>

</html>