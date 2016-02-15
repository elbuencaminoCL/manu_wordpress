<?php
if ( !defined('ABSPATH')) exit;
/**
 * Theme's Functions and Definitions
 * @file           functions.php
 * @package        manu 
**/

add_post_type_support('page', 'excerpt');
add_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

//=================================================================== IMAGES//   
function wpse_setup_theme() {
    add_theme_support( 'post-thumbnails' );
    if ( function_exists( 'add_theme_support') ) {
        set_post_thumbnail_size( 200, 200, true ); 
    }
    if ( function_exists( 'add_image_size' ) ) { 
        add_image_size( 'main-image', 370, 180, true);
    }
} 
add_action( 'after_setup_theme', 'wpse_setup_theme' );

//=================================================================== CUT OFF// 
function short_title($after = '', $length) {
    $mytitle = explode(' ', get_the_title(), $length);
    if (count($mytitle)>=$length) {
        array_pop($mytitle);
        $mytitle = implode(" ",$mytitle). $after;
    } else {
        $mytitle = implode(" ",$mytitle);
    }
    return $mytitle;
}

function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    } 
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}

function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    } 
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content); 
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}

//=================================================================== CUSTOM ADMIN LOGO// 
function my_custom_login_logo() {
    echo '<style type="text/css">
        body.login {background:#000 !important;}
        .login form {background:#000 !important; border:1px solid #666;}
        h1 a { background-image:url('.get_bloginfo('template_directory').'/imag/logo/logo-manu-admin.png) !important; background-size:320px 67px !important; width:320px !important; height:67px !important;}
        .login #backtoblog a, .login #nav a {color:#ffffff;}
    </style>';
}

add_action('login_head', 'my_custom_login_logo');

//=================================================================== REMOVE LINK// 
function wpb_imagelink_setup() {
    $image_set = get_option( 'image_default_link_type' );
    
    if ($image_set !== 'none') {
        update_option('image_default_link_type', 'none');
    }
}
add_action('admin_init', 'wpb_imagelink_setup', 10);

//=================================================================== REMOVE ADMIN MENUS// 
function remove_menus () {
global $menu;
    $restricted = array(__('Links'),__('Comments'));
    end ($menu);
    while (prev($menu)){
        $value = explode(' ',$menu[key($menu)][0]);
        if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
    }
}
add_action('admin_menu', 'remove_menus');

//=================================================================== CUSTOM FUNCTIONS//
/**
 * Get active section from Request URI
 * @return string post_name of the active section
 */
function section_from_url(){
	global $wpdb;
	$url = $_SERVER['REQUEST_URI'];
	$first_level_pages = $wpdb->get_results("SELECT ID, post_name, post_title FROM $wpdb->posts WHERE post_type = 'page' AND post_parent = 0 AND post_status = 'publish'");
	foreach ( $first_level_pages as $section ) {
		if ( stristr($url, '/'.$section->post_name.'/') ) $out = $section;
	}
	$out->post_title = apply_filters('the_title', $out->post_title);
	return $out;
}

/**
 * Get post/page/attachment ID by post_name (sanitized title)
 * @param string $name The post_name of the object
 * @return integer Object ID in $wpdb->posts
 */
function get_id_by_postname($name){
global $wpdb;
    return $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$name' AND post_status = 'publish'");
}

/**
 * Get permalink by the post_name of the post/page
 * @param string post_name of the object
 * @return string Object permalink
 */
function get_permalink_by_postname($name){
global $wpdb;
	return get_permalink($wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE (post_name = '$name' AND post_status = 'publish') AND (post_type = 'page' OR post_type = 'post')"));
}

function get_attachment_id_from_src ($link) {
    global $wpdb;
        $link = preg_replace('/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $link);
        return $wpdb->get_var("SELECT ID FROM {$wpdb->posts} WHERE guid='$link'");
}

//=================================================================== PARENT PAGES//
function about_pages($args){
global $wpdb;
    // Defaults
    $defaults = array( 'id' => $apage->ID, 'class' => 'apage', 'excerpt' => true, 'content' => false, 'childs' => false, 'exclude' => true );
    $r = wp_parse_args( $args, $defaults );
    extract( $r, EXTR_SKIP );

    if($exclude != 'false') $about_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE (post_type = 'page' AND post_parent = ".$id.") AND (post_status = 'publish' AND menu_order >= 0) ORDER BY menu_order ASC");
    else $about_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE (post_type = 'page' AND post_parent = ".$id.") AND post_status = 'publish' ORDER BY menu_order ASC");
    if(!empty($about_pages)){
        $i = 0; $about_pages_size = count($about_pages) - 1;
        foreach($about_pages as $apages){
            if ( $i === 0 ) $pos = ''; elseif ( $i === $about_pages_size ) $pos = 'bloque'; else $pos = 'bloque';
            if($apages->menu_order >= 0){
                $texto = get_post_meta( $bpages->ID, '_nombre_boton', true);
                echo '<div id="bases">';
                    echo '<div class="container clearfix">';
                        echo '<div class="cont-descarga col-lg-10 col-md-10 col-sm-10 col-xs-12">';
                            echo '<h3>'.$apages->post_excerpt.'</h3>';
                            echo $apages->post_content;
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            $i++; }
        }
    }
}

//=================================================================== POST TYPE AND TAXONOMY // 
add_action( 'init', 'create_post_type_discografia' );
function create_post_type_discografia() {
    register_post_type( 'discografia',
        array(
            'labels' => array(
                'name' => __('Discografía'),
                'singular_name' => __('Disco'),
                'add_new' => __('Agregar nuevo'),
                'add_new_item' => __('Agregar nuevo disco'),
                'edit_item' => __('Editar disco'),
                'new_item' => __('Nuevo disco'),
                'all_items' => __('Todos los discos'),
                'view_item' => __('Ver discos'),
                'search_items' => __('Buscar discos')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'discografia', 'hierarchical' => true),
            'hierarchical' => true,
            'show_ui' => true,
            'query_var' => true,
            'update_count_callback' => '_update_post_term_count',
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields')
        )
    );
    flush_rewrite_rules();
}

//=================================================================== IMAGES FUNCTIONS//
function get_gallery_images(){
    global $wpdb;
    $gallery_pict = $wpdb->get_results("SELECT ID, post_title, post_content, post_excerpt FROM $wpdb->posts WHERE post_type = 'attachment' AND post_mime_type LIKE 'image%' AND post_excerpt LIKE 'galeria%' AND post_parent = '".get_the_ID()."' ORDER BY menu_order");
    if ( $gallery_pict ) {
        foreach ( $gallery_pict as $gal ) {
            echo '<div class="col-xs-3">';
                echo '<a href="'.wp_get_attachment_url($gal->ID).'" class="img-responsive" rel="prettyPhoto[gallery1]" title="'.$gal->post_title.'">';
                    echo wp_get_attachment_image($gal->ID, 'gal-image',array('class' => 'img-responsive'));
                echo '</a>';
            echo '</div>';
        } 
    }
}

//=================================================================== WORDPRESS WIDGETS// 
function manu_widgets_init() {
	register_sidebar(array(
        'name' => __('Sidebar General', 'manu'),
        'description' => __('Sidebar general sitio web', 'manu'),
        'id' => 'sidebar-general',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
        'before_widget' => '',
        'after_widget' => ''
    ));
}
add_action('widgets_init', 'manu_widgets_init');

//=================================================================== GET CUSTOM TAXONOMY TERMS //
function get_custom_terms($taxonomies, $args){
    $args = array('orderby'=>'asc','hide_empty'=>true,'parent' => 0);
    $custom_terms = get_terms(array($taxonomies), $args);
    foreach($custom_terms as $term){
        echo '<div class="filter" data-filter=".'.$term->slug.'">'.$term->name.'</div> <span class="sep">-</span>';
    }
}

//=================================================================== TOP BUTTON//
function my_scripts_method() {
    wp_enqueue_script(
        'custom-script',
        get_stylesheet_directory_uri() . '/js/topbutton.js',
        array( 'jquery' )
    );
}
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );

//
?>