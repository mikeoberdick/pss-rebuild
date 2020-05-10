<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

//////////////////////////////////
///// ADDITIONAL THEME FILES /////
//////////////////////////////////

function d4tw_enqueue_files () {
    wp_enqueue_style( 'Google Fonts', 'https://fonts.googleapis.com/css?family=Roboto|Unica+One&display=swap' );
    wp_enqueue_script( 'D4TW Theme JS', get_stylesheet_directory_uri() . '/js/d4tw.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'MIU JS', get_stylesheet_directory_uri() . '/js/mixitup.min.js', array('jquery'), '1.0.0', true );
}

add_action('wp_enqueue_scripts', 'd4tw_enqueue_files');

/////////////////////////////////
///// SHORTCODES IN WIDGETS /////
/////////////////////////////////

add_filter('widget_text', 'do_shortcode');

/////////////////////////////////
///// ACF SITE CONTENT PAGE /////
/////////////////////////////////

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Company Profile',
        'menu_title'    => 'Company Profile',
        'menu_slug'     => 'company-profile'
    ));

    acf_add_options_page(array(
        'page_title'    => 'General Content',
        'menu_title'    => 'General Content',
        'menu_slug'     => 'general-content'
    )); 
}

////////////////////////////////////////////
///// CUSTOM DASHBOARD AND LOGIN FILES /////
////////////////////////////////////////////

function d4tw_filter_admin_footer () {
    echo '<span id="dashFooter">Website developed by <a style = "color: #cc0000; text-decoration: none;" href="https://www.designs4theweb.com" target="_blank">Designs 4 The Web</a></span>';
}
add_filter('admin_footer_text', 'd4tw_filter_admin_footer');

function d4tw_custom_logo_css () {
    wp_enqueue_style('login-styles', get_stylesheet_directory_uri() . '/login/login_styles.css');
}
add_action('login_enqueue_scripts', 'd4tw_custom_logo_css');

function d4tw_login_url(){
    return get_bloginfo( 'wpurl' );
}
add_filter('login_headerurl', 'd4tw_login_url');

function d4tw_admin_css() {
    wp_enqueue_style('dashboard-styles', get_stylesheet_directory_uri() . '/dashboard/dashboard.css');
}
add_action('admin_head', 'd4tw_admin_css');

///////////////////////////////////////////
///// DEREGISTER SIDEBARS & TEMPLATES /////
///////////////////////////////////////////

function d4tw_remove_sidebars () {
    unregister_sidebar( 'hero' );
    unregister_sidebar( 'herocanvas' );
    unregister_sidebar( 'statichero' );
    unregister_sidebar( 'footerfull' );
    unregister_sidebar( 'left-sidebar' );
    unregister_sidebar( 'right-sidebar' );
}
add_action( 'widgets_init', 'd4tw_remove_sidebars', 11 );

function d4tw_remove_page_templates( $templates ) {
    unset( $templates['page-templates/blank.php'] );
    unset( $templates['page-templates/empty.php'] );
    unset( $templates['page-templates/fullwidthpage.php'] );
    unset( $templates['page-templates/left-sidebarpage.php'] );
    unset( $templates['page-templates/right-sidebarpage.php'] );
    unset( $templates['page-templates/both-sidebarspage.php'] );
    return $templates;
}
add_filter( 'theme_page_templates', 'd4tw_remove_page_templates' );

///////////////////////////////////////////
/////// REGISTER LEFT & RIGHT MENUS ///////
///////////////////////////////////////////

register_nav_menus( array(
    'menu-left' => 'Desktop Menu Left',
    'menu-right' => 'Desktop Menu Right',
    'footer-menu' => 'Footer Menu'
) );

///////////////////////////////////////////
////////// CAR CUSTOM POST TYPE ///////////
///////////////////////////////////////////

add_action( 'init', 'car_post_type', 0 );

function car_post_type() {
// Set UI labels
  $labels = array(
    'name'                => 'Cars',
    'singular_name'       => 'Car',
    'menu_name'           => 'Cars',
    'parent_item_colon'   => 'Parent Car',
    'all_items'           => 'All Cars',
    'view_item'           => 'View Car',
    'add_new_item'        => 'Add New Car',
    'add_new'             => 'Add Car',
    'edit_item'           => 'Edit Car',
    'update_item'         => 'Update Car',
    'search_items'        => 'Search Cars',
    'not_found'           => 'No Cars Found',
    'not_found_in_trash'  => 'No Cars Found in Trash',
  );
  
// Set other options
  $args = array(
    'label'               => 'cars',
    'description'         => 'cars',
    'labels'              => $labels,
    // Features this CPT supports in Post Editor
    'supports'            => array( 'title', 'editor', 'author' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
  
//Register the CPT
  register_post_type( 'car', $args );
}

//Create the Model Category Taxonomy
add_action( 'init', 'create_model_taxonomy' );
function create_model_taxonomy() {
  $labels = array(
    'add_new_item' => 'Add New Model',
    'view_item' => 'View Model',
    'edit_item' => 'Edit Model',
    'update_item' => 'Update Model',
    'parent_item' => 'Parent Model',
    'back_to_items' => '← Back to Models',

  );
  $args = array(
    'label' => 'Models',
    'rewrite' => array( 'slug' => 'model' ),
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'model', array( 'car' ), $args );
}