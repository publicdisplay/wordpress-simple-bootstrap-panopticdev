<?php get_header(); ?>

<article>

    <div class="front-page-top">
        <div class="container">
            <header class="text-center">
                <h1>Web applications simplified.</h1>
                <p class="lead">Your problem is complex. Your users need simplicity. That's where we come in.</p>
                <img class="img-responsive center-block" src="<?php bloginfo('template_directory') ?>/images/front-page-projects.png" />
            </header>
        </div>
    </div>

    <section class="front-page-bottom">
        <div class="front-page-bottom-top">
            <div class="container">
                <header class="sr-only">
                    <h2>Clients</h2>
                </header>
                <div class="row">
                    <div class="col-xs-6 col-sm-4 col-md-2">
                        <div class="client">
                            <a href="/clients"><img src="<?php bloginfo('template_directory') ?>/images/logos/lifespan.gif" title="Client: Lifespan Corporation" alt="logo" width="98" height="38"></a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-2">
                        <div class="client">
                            <a href="/clients"><img src="<?php bloginfo('template_directory') ?>/images/logos/brown.jpg" title="Client: Brown University Library" alt="logo" width="111" height="57"></a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-2">
                        <div class="client">
                            <a href="/clients"><img src="<?php bloginfo('template_directory') ?>/images/logos/gigapan.gif" title="Client: GigaPan" alt="logo" width="107" height="40"></a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-2">
                        <div class="client">
                            <a href="/clients"><img src="<?php bloginfo('template_directory') ?>/images/logos/honest_tea.gif" title="Client: Honest Tea" alt="logo" width="106" height="38"></a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-2">
                        <div class="client">
                            <a href="/clients"><img src="<?php bloginfo('template_directory') ?>/images/logos/csi.gif" title="Client: CSI" alt="logo" width="60" height="60"></a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-2">
                        <div class="client">
                            <a href="/clients"><img src="<?php bloginfo('template_directory') ?>/images/logos/batchbook.gif" title="Client: Batchbook" alt="logo" width="107" height="29"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="front-page-bottom-bottom">
            <div class="container">
                <?php include dirname(__FILE__) . '/start-a-project-bar.php' ?>
            </div>
        </div>
    </article>

</article>

<?php get_footer(); ?>