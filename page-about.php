<?php /* Template Name: Example Template */ ?>
<?php /* Parent Name: Example Template */ ?>


<!-- ======= About Section ======= -->
<section id="about" class="about-mf sect-pt4 route">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="box-shadow-full">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-6 col-md-5">
                                    <div class="about-img">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/img/testimonial-2.jpg'; ?>" class="img-fluid rounded b-shadow-a" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-7">
                                    <div class="about-info">
                                        <p><span class="title-s">Name: </span> <span>Morgan Freeman</span></p>
                                        <p><span class="title-s">Profile: </span> <span>full stack developer</span></p>
                                        <p><span class="title-s">Email: </span> <span>contact@example.com</span></p>
                                        <p><span class="title-s">Phone: </span> <span>(617) 557-0089</span></p>
                                    </div>

                                </div>
                            </div>
                            <div class="skill-mf">
                                <p class="title-s">Skill</p>
                                <span>HTML</span> <span class="pull-right">85%</span>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>CSS3</span> <span class="pull-right">75%</span>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>PHP</span> <span class="pull-right">50%</span>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>JAVASCRIPT</span> <span class="pull-right">90%</span>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php
    $about_page = get_page_by_path( 'about' );
    $title = apply_filters( 'the_title', $about_page->post_title );
    $content = apply_filters( 'the_content', $about_page->post_content );
?>
                            <div class="about-me pt-4 pt-md-0">
                                <div class="title-box-2">
                                    <h5 class="title-left">
                                        <?php echo $title; ?>
                                    </h5>
                                </div>
                                <p class="lead">
                                    <?php echo $content; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End About Section -->