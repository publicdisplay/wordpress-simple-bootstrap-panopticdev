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
        <div class="front-page-bottom-clients">
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
        
        <div class="front-page-bottom-testimonials">
            <div class="container">
                <header class="sr-only">
                    <h2>Testimonials</h2>
                </header>
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <blockquote>
                                <q>I'm a non-technical person, and Panoptic Development was great at taking my ideas and putting them into action. They listened to what I wanted, understood my vision and put it all onto a well-thought-out web application. Throughout our project they were respectful of deadlines, very professional and provided much-needed technical assistance. I'm very happy with what they've produced and so is my team. As a matter of fact, my team has even said that Panoptic's application has revolutionized our field marketing practices. Before, we were spending five to six hours per week on reporting our field marketing data, and now we spend two hours per week. This means we can focus more on spreading Honest Tea's brand awareness.</q>
                                <cite><strong>Kelly Schwaberow</strong> Field Marketing Coordinator, Honest Tea</cite>
                            </blockquote>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="row-height">
                                <div class="col-md-4 col-md-height col-md-top">
                                    <div class="testimonial block inside-full-height">
                                        <blockquote>
                                            <q>Panoptic has been, hands down, one of the very best web development firms I have ever worked with. They are prompt, thorough, expert, accommodating and just downright good people, who both understand the particular tasks at hand and the big picture that they fit within. They are a rare find in a crowded field. You will not be disappointed.</q>
                                            <cite><strong>Ari Matusiak</strong> Co-Founder and Chairman, Young Invincibles</cite>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="col-md-4 col-md-height col-md-top">
                                    <div class="testimonial block inside-full-height">
                                        <blockquote>
                                            <q>We are very happy with the work Panoptic Development did for us. Having their help has been a real life-saver. Panoptic Development has allowed our small design team to meet our project goals. Without them we would not have been able to deliver on time.</q>
                                            <cite><strong>Miriam Goldberg</strong> Senior Software Engineer, Gigapan Systems</cite>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="col-md-4 col-md-height col-md-top">
                                    <div class="testimonial block inside-full-height">
                                        <blockquote>
                                            <q>The folks at Panoptic Development are very nice to work with. We appreciate their thoroughness, help in emergency situations and their organizational skills. Communication is top-notch as well. </q>
                                            <cite><strong>Chippy Warren</strong> Fox Creek Leather</cite>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="front-page-bottom-start-a-project">
            <div class="container">
                <?php include dirname(__FILE__) . '/start-a-project-bar.php' ?>
            </div>
        </div>
    </article>

</article>

<?php get_footer(); ?>