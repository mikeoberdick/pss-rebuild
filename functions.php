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
    if ( is_page('all-models') ) {
        wp_enqueue_script( 'MIU JS', get_stylesheet_directory_uri() . '/js/mixitup.min.js', array('jquery'), '1.0.0', true );
    }
    if ( is_page_template('templates/general.php')  || is_tax() ) {
        wp_enqueue_style( 'Slick CSS', get_stylesheet_directory_uri() . '/slick/slick.css' );
        wp_enqueue_style( 'Slick Theme CSS', get_stylesheet_directory_uri() . '/slick/slick-theme.css' );
        wp_enqueue_script( 'Slick JS', get_stylesheet_directory_uri() . '/slick/slick.min.js', array('jquery'), '1.0.0', true );
    }
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
    'orderby' => 'term_order'
  );
  register_taxonomy( 'model', array( 'car' ), $args );
}

//REMOVE DESCRIPTION TEXT EDITOR FROM TAXONOMIES
function wpse_hide_cat_descr() { ?>

    <style type="text/css">
       .term-description-wrap {
           display: none;
       }
    </style>

<?php } 

add_action( 'admin_head-term.php', 'wpse_hide_cat_descr' );
add_action( 'admin_head-edit-tags.php', 'wpse_hide_cat_descr' );

//Only show posts in search results
if (!is_admin()) {
    function psc_search_filter($query) {
        if ($query->is_search) {
            $query->set('post_type', 'post');
        }
    return $query;
}
add_filter('pre_get_posts','psc_search_filter');
}

function ajax_assets() {
    wp_enqueue_script('psc ajax', get_stylesheet_directory_uri() . '/js/ajax.js', ['jquery'], null, true);
    wp_localize_script( 'psc ajax', 'psc', array(
        'nonce'    => wp_create_nonce( 'psc' ),
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ));
}
add_action('wp_enqueue_scripts', 'ajax_assets', 100);

//AJAX filter posts and display the content
function psc_posts() {
if( !isset( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'psc' ) )
    die('Permission denied');

    $value = ($_POST['params']['value']);
    $term = sanitize_text_field($_POST['params']['term']);
    $page = intval($_POST['params']['page']);
    $qty  = intval($_POST['params']['qty']);
    
    if ( $term == 'all-terms' ) : 
        $tax_qry[] = [
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => $term,
            'operator' => 'NOT IN'
        ];
    else :
        $tax_qry[] = [
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => $term,
        ];
endif;

//Setup the query args for wp query
$args = [
    'paged'          => $page,
    'post_status'    => 'publish',
    'posts_per_page' => $qty,
    'tax_query'      => $tax_qry
];
$qry = new WP_Query($args);
ob_start();
    if ($qry->have_posts()) : ?>
        <?php while ($qry->have_posts()) : $qry->the_post(); ?>
            <article class="col-sm-12 mb-5">
                                <h3 class="mb-3"><?php the_title(); ?></h3>
                                <div class="row">
                                    <div class="col md-5">
                                        <div class = "mb-3"><?php the_post_thumbnail('blog-large'); ?></div>
                                    </div><!-- .col md-5 -->
                                    <div class="col-md-7">
                                        <div><?php the_excerpt(); ?></div>
                                        <a href = '<?php the_permalink(); ?>'><button role = 'button' class = 'btn black-button w-100 mb-3 mb-lg-0'>READ NOW</button></a>
                                    </div><!-- .col-md-7 -->
                                    </div><!-- .row -->
                                </article>
        <?php endwhile; ?>

        <nav class = "container mt-3 text-center">
            <div class="row">
                <div class="col-sm-12">
                    <?php psc_ajax_pager($qry,$page); ?>
                </div><!-- .col-sm-12 -->
            </div><!-- .row -->
        </nav>

<?php $response = [
    'status'=> 200,
    'found' => $qry->found_posts
    ];
else :
    $response = [
        'status'  => 201,
        'message' => 'No posts found'
    ];
endif;
$response['content'] = ob_get_clean();
die(json_encode($response));
}
add_action('wp_ajax_filter_posts', 'psc_posts');
add_action('wp_ajax_nopriv_filter_posts', 'psc_posts');

//Pagination function
function psc_ajax_pager( $query = null, $paged = 1 ) {
    if (!$query)
        return;
    $paginate = paginate_links([
        'base'      => '%_%',
        'type'      => 'array',
        'total'     => $query->max_num_pages,
        'format'    => '#page=%#%',
        'current'   => max( 1, $paged ),
        'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ]);
    if ($query->max_num_pages > 1) : ?>
        <div id = "postsPagination">
        <ul class="pagination mb-5 justify-content-center">
            <?php foreach ( $paginate as $page ) :?>
                <li><?php echo $page; ?></li>
            <?php endforeach; ?>
        </ul>    
        </div>
    <?php endif;
}

// Add featured image sizes
add_image_size( 'blog-large', 500, 9999 );
add_image_size( 'blog-small', 350, 9999 );
add_image_size( 'gallery-large', 1150, 9999 );
add_image_size( 'gallery-thumb', 525, 9999 );
add_image_size( 'staff-large', 600, 9999 );
add_image_size( 'staff-small', 250, 250, array( 'center', 'top' ));

//Modify the excerpt template tag
if ( ! function_exists( 'understrap_all_excerpts_get_more_link' ) ) {
    function understrap_all_excerpts_get_more_link( $post_excerpt ) {
        if ( ! is_admin() ) {
            $post_excerpt = $post_excerpt . '...</p>';
        }
        return $post_excerpt;
    }
}
add_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );

/**
 * Append Fields To Term Edit Page
 * @param Term Object $term
 * @param string $taxonomy
 */
function term_order_field( $term, $taxonomy ) {
  ?>
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="meta-order"><?php _e( 'Category Order' ); ?></label>
        </th>
        <td>
            <input type="text" name="_term_order" size="3" style="width:5%;" value="<?php echo ( ! empty( $term->term_group ) ) ? $term->term_group : '0'; ?>" />
            <span class="description"><?php _e( 'Categories are ordered Smallest to Largest' ); ?></span>
        </td> 
    </tr>
  <?php
}
add_action( 'model_edit_form_fields', 'term_order_field', 10, 2 );

/**
 * Save Term Order
 * @param int $term_id
 */
function save_term_order( $term_id ) {
    global $wpdb;

    if( isset( $_POST['_term_order'] ) ) {
        $wpdb->update( 
            $wpdb->terms,
            array(
                'term_group' => $_POST['_term_order']
            ),
            array( 
                'term_id'    => $term_id
            )
        );
    }
} // END Function
add_action( 'edited_model', 'save_term_order' );