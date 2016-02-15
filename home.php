<?php
/*
Template Name: Home
*/
?>

    <?php get_header(); ?>
        <!--main-->
        <div id="main" class="main-index">
            <div class="cont-shadow"></div>
            <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
            <a href="#" class="jcarousel-control-next">&rsaquo;</a>
            <div class="container">
                <!--carousel-->
                <div class="galeria col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h3>Fotos y videos recientes</h3>
                    <div class="jcarousel-wrapper">
                        <div class="jcarousel">
                            <ul>
                                <li><img src="<?php bloginfo('template_url'); ?>/imag/demo/foto_concierto.png" alt="Image 1"></li>
                                <li><img src="<?php bloginfo('template_url'); ?>/imag/demo/foto_concierto.png" alt="Image 1"></li>
                                <li><img src="<?php bloginfo('template_url'); ?>/imag/demo/foto_concierto.png" alt="Image 1"></li>
                                <li><img src="<?php bloginfo('template_url'); ?>/imag/demo/foto_concierto.png" alt="Image 1"></li>
                                <li><img src="<?php bloginfo('template_url'); ?>/imag/demo/foto_concierto.png" alt="Image 1"></li>
                                <li><img src="<?php bloginfo('template_url'); ?>/imag/demo/foto_concierto.png" alt="Image 1"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/carousel-->
                <!--news-->
                <div class="news col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                    <div class="row">
                        <h3>Noticias</h3>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="featured-news">
                                <h4><a href="#">Noticia Número Uno</a></h4>
                                <img src="<?php bloginfo('template_url'); ?>/imag/demo/featured.png" alt="" class="img-responsive" />
                                <div class="intro">
                                    <p>Fusce sapien tortor, porta sit amet sem ut, pharetra viverra orci. Donec rutrum ut erat et dapibus. Aliquam efficitur diam leo, at egestas est scelerisque nec. Nulla ex ligula, egestas sagittis ante non, malesuada maximus turpis. Nullam ut enim urna. Mauris iaculis suscipit mauris nec mattis.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="item-news">
                                <h4><a href="#">Noticia Número Dos</a></h4>
                                <div class="intro">
                                    <p>Fusce sapien tortor, porta sit amet sem ut, pharetra viverra orci. Donec rutrum ut erat et dapibus. Aliquam efficitur diam leo, at egestas est scelerisque nec.</p>
                                </div>
                            </div>
                            <div class="item-news">
                                <h4><a href="#">Noticia Número Tres</a></h4>
                                <div class="intro">
                                    <p>Fusce sapien tortor, porta sit amet sem ut, pharetra viverra orci. Donec rutrum ut erat et dapibus. Aliquam efficitur diam leo, at egestas est scelerisque nec.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/news-->
            </div>
        </div>
        <!--/main-->
    <?php get_footer(); ?>