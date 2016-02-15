<!DOCTYPE html>
<html class="not-ie" lang="en">
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' | '; } ?><?php bloginfo('name'); if(is_home()||is_page('inicio')) { echo ' | '; bloginfo('description'); } ?></title>
    <?php if (is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php endwhile; endif; elseif(is_home()) : ?>
    <meta name="description" content="" />
    <?php else: ?>
    <meta name="description" content=""> 
    <?php endif; ?>
    <meta name="keywords" content="" /> 
    <?php if(is_home() || is_single() || is_page()) { echo '<meta name="robots" content="index,follow" />'; } else { echo '<meta name="robots" content="noindex,follow" />'; } ?>
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
    <!-- fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
    <!--styles/css-->
    <link href="<?php bloginfo('template_url'); ?>/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="<?php bloginfo('template_url'); ?>/css/jcarousel.responsive.css" rel="stylesheet" media="screen">
    <link href="<?php bloginfo('template_url'); ?>/style.css" rel="stylesheet" media="screen">
    <script src="<?php bloginfo('template_url'); ?>/js/jquery-1.10.2.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery-ui.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.jcarousel.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jcarousel.responsive.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.lettering.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.cont-header').affix({
                offset: {top:130}
            });
            $('.main-header').affix({
                offset: {top:100}
            });
            $('.main-header').hide(); 
            $('.main-header.affix-top, .main-header.affix').show(1000);
            $('.cont-main-info h2').lettering('words');
            $('#contact').hide();
            $( '.formcontact a' ).click(function() {
                $( '#contact' ).slideToggle( "slow", function() {});
            });
        })
    </script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="wrapper">
        <!--header-->
        <header id="header" class="header clearfix">
            <div class="main-header"></div>
            <div id="contact" class="clearfix">
                <div class="cont-contact col-centered col-lg-8 col-md-8 col-sm-10 col-xs-11 clearfix">
                    <h3>Contáctanos</h3>
                    <form id="" class="col-centered col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                        <div class="separa separa-group clearfix">
                            <div clas="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Nombre:</label>
                                <input type="text" class="" />
                            </div>
                            <div clas="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Email o Teléfono:</label>
                                <input type="text" class="" />
                            </div>
                        </div>
                        <div class="separa">
                            <label>Asunto (¿para qué?):</label>
                            <input type="text" class="" />
                        </div>
                        <div class="separa">
                            <label>Mensaje:</label>
                            <textarea></textarea>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-centered">
                    <div class="cont-header col-centered col-lg-10 col-md-10 col-sm-10 col-xs-11">
                        <h1><a href="/">ManuDaBanda</a></h1>
                        <div class="menu" id="main-menu">
                            <ul>
                                <li><a href="biografia.html">Biografía</a></li>
                                <li><a href="discografia.html">Discografía</a></li>
                                <li><a href="galeria.html">Galería</a></li>
                                <li class="formcontact"><a href="#">Contáctanos</a></li>
                            </ul>
                        </div>
                        <div class="social" id="menu-social">
                            <ul>
                                <li class="instagram"><a href="#">instagram</a></li>
                                <li class="facebook"><a href="#">facebook</a></li>
                                <li class="twitter"><a href="#">twitter</a></li>
                                <li class="youtube"><a href="#">YouTube</a></li>
                                <li class="soundcloud"><a href="#">soundcloud</a></li>
                                <li class="bc"><a href="#">bc</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cont-main-info">
                <div class="col-centered col-lg-8 col-md-8 col-sm-9 col-xs-11 clearfix">
                    <img src="<?php bloginfo('template_url'); ?>/imag/demo/rep.png" class="img-responsive col-lg-4 col-md-4 col-sm-4 col-xs-12" />
                    <h2 class="col-lg-8 col-md-8 col-sm-8 col-xs-12">Presenta el lanzamiento de su nuevo disco</h2>
                </div>
            </div>
        </header>
        <!--/header-->