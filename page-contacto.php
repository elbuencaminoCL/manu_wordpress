<?php
/*
Template Name: Contacto
*/
?>

<?php get_header(); ?>
	<section id="main" class="clearfix page-content">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class='col-lg-12 col-md-12 col-sm-12 main-slider'>
                        <div class="bg-shadow"></div>
                    </div>
                </div>
                <div class="row row-content">
                    <div class='col-lg-12 col-md-12 col-sm-12'>
                        <div class='col-lg-4 col-md-4 col-sm-4 clearfix'>
                            <h2 class="left-align main-title"><?php the_title();?></h2>
                            <img src="<?php bloginfo('template_url'); ?>/images/banner/side02.png" alt="Contacto" class="img-responsive" />
                        </div>
                        <div class='col-lg-8 col-md-8 col-sm-8 clearfix'>
                            <?php the_content();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>