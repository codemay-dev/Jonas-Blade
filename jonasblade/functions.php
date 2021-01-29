<?php // Site Functions

//Making jQuery to load from Google Library
function replace_jquery() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, '1.11.3');
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'replace_jquery');



// Update CSS within in Admin
function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/css/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

// Custom Login Screen Functions
function my_custom_login() {
  echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/custom-login-styles.css" />';
}
add_action('login_head', 'my_custom_login');

function login_error_override() {
  return 'Incorrect login details.';
}
add_filter('login_errors', 'login_error_override');

function my_login_head() {
  remove_action('login_head', 'wp_shake_js', 12);
}
add_action('login_head', 'my_login_head');

function login_checked_remember_me() {
  add_filter( 'login_footer', 'rememberme_checked' );
}
add_action( 'init', 'login_checked_remember_me' );
  
function rememberme_checked() {
  echo "<script>document.getElementById('rememberme').checked = true;</script>";
}



// This loads styles and scripts from the theme
function load_scripts_styles() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
  wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css' );
  wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );
  wp_enqueue_style( 'menu', get_stylesheet_directory_uri() . '/css/menu.css' );
  wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/css/main.css' );
  wp_enqueue_style( 'woo-override', get_stylesheet_directory_uri() . '/css/woo-override.css' );

  wp_enqueue_script( 'popper', get_stylesheet_directory_uri() . '/js/popper.min.js', array( 'jquery' ), '', true );
  wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '', true );
  wp_enqueue_script( 'jquery.cycle2.min', get_stylesheet_directory_uri() . '/js/jquery.cycle2.min.js', array( 'jquery' ), '', true );
  wp_enqueue_script( 'jquery.cycle2.carousel.min', get_stylesheet_directory_uri() . '/js/jquery.cycle2.carousel.min.js', array( 'jquery' ), '', true );
  wp_enqueue_script( 'jquery.cycle2.swipe.min', get_stylesheet_directory_uri() . '/js/jquery.cycle2.swipe.min.js', array( 'jquery' ), '', true );
  wp_enqueue_script( 'jquery.cycle2.center.min', get_stylesheet_directory_uri() . '/js/jquery.cycle2.center.min.js', array( 'jquery' ), '', true );
  //wp_enqueue_script( 'jquery.fitvids', get_stylesheet_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '', true );
}
add_action( 'wp_enqueue_scripts', 'load_scripts_styles' );

// Register Custom Navigation Walker
require_once('bs4navwalker.php');




// Code allowing multiple dynamic sidebars
if ( function_exists('register_sidebar') )
 // Right Sidebar
   register_sidebar(array('name'=>'Right Sidebar',
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="widgettitle">',
    'after_title' => '</h2>',
   ));



// Dashboard controlled menus
register_nav_menus( array(
  'top_menu' => __( 'Top Menu', 'bootpress' ),
  //'side-menu' => __( 'Sidebar Menu', 'bootpress' ),
  //'footer-menu' => __( 'Footer Menu', 'bootpress' )
) );



// Post Type Conditional - Creates ability to use is_post_type() for conditional statements
function is_post_type($type) {
  global $wp_query;
  if( $type == get_post_type($wp_query->post->ID) ) return true;
  return false;
}



// Breadcrumb links - paste the following code where you want them to appear: the_breadcrumb();
function the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
		echo get_option('home');
		echo '">';
		bloginfo('name');
		echo "</a> � ";
		if (is_category() || is_single()) {
			the_category('title_li=');
			if (is_single()) {
				echo " � ";
				the_title();
			}
		} elseif (is_page()) {
			echo the_title();
		}
	}
}



// Fancy "Read More &raquo;" link on blogs, can be edited below in the "return" line
function new_excerpt_more($more) {
   global $post;
   return '. . . <a href="'. get_permalink($post->ID) . '">' . 'Read More' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');



//Page Slug Body Class
function add_slug_body_class( $classes ) {
  global $post;
  if ( isset( $post ) ) {
    $classes[] = $post->post_name;
  }
  return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );



// Custom Post Type Taxonomy Stuff
function add_custom_types_to_tax( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    // Get all your post types
    $post_types = get_post_types();
    //$post_types = array( 'post', 'custom_type_here' );
    $query->set( 'post_type', $post_types );
    return $query;
  }
}
add_filter( 'pre_get_posts', 'add_custom_types_to_tax' );



// ACF Image
function get_image_with_alt($imagefield, $postID, $imagesize = 'full') {
  $imageID = get_field($imagefield, $postID);
  $image = wp_get_attachment_image_src( $imageID, $imagesize );
  $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
  return '<img src="' . $image[0] . '" class="' . $alt_text . '" />';
}




if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'menu_title'	=> 'Theme Settings',
    'menu_slug' 	=> 'theme-general-settings',
    'position' => 3,
		'redirect'		=> 'Header'
  ));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
  ));

  acf_add_options_sub_page(array(
		'page_title' 	=> 'Zack Info',
		'menu_title'	=> 'Zack Info',
		'parent_slug'	=> 'theme-general-settings',
  ));

  acf_add_options_sub_page(array(
		'page_title' 	=> 'CTA Info',
		'menu_title'	=> 'CTA Info',
		'parent_slug'	=> 'theme-general-settings',
  ));

  acf_add_options_sub_page(array(
		'page_title' 	=> 'Product Pages',
		'menu_title'	=> 'Product Pages',
		'parent_slug'	=> 'theme-general-settings',
  ));

  acf_add_options_sub_page(array(
		'page_title' 	=> 'Social Media',
		'menu_title'	=> 'Social Media',
		'parent_slug'	=> 'theme-general-settings',
  ));
	
}




/*** Woocommerce
--------------------------------------------------------------------------------------------------------------*/

// Change button text
add_filter( 'woocommerce_loop_add_to_cart_link', 'replacing_add_to_cart_button', 10, 2 );

function replacing_add_to_cart_button( $button, $product  ) {
  $button_text = __("View Details", "woocommerce");
  $button = '<a class="button" href="' . $product->get_permalink() . '">' . $button_text . '</a>';

  return $button;
}


// Remove Tabs
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

  //unset( $tabs['description'] );                // Remove the description tab
  unset( $tabs['reviews'] );                      // Remove the reviews tab
  unset( $tabs['additional_information'] );       // Remove the additional information tab

  return $tabs;

}


// Remove normal related products location
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products',20);


// Change related products title
add_filter(  'gettext',  'wps_translate_words_array'  );
add_filter(  'ngettext',  'wps_translate_words_array'  );
function wps_translate_words_array( $translated ) {
     $words = array(
                // 'word to translate' = > 'translation'
               'Related Products' => 'View more in this collection',  
     );
     $translated = str_ireplace(  array_keys($words),  $words,  $translated );
     return $translated;
}


// Out of stock products - Show or not show
add_action( 'woocommerce_product_options_stock_status', 'hide_if_out_of_stock' );
function hide_if_out_of_stock(){
    woocommerce_wp_checkbox( array( 'id' => '_hide_if_out_of_stock', 'wrapper_class' => 'show_if_simple show_if_variable', 'label' => __( 'Hide this product from archives when out of stock?', 'your-plugin-domain' ) ) );
}

add_action( 'woocommerce_process_product_meta', 'save_product_meta' );
function save_product_meta( $post_id ){
    if( isset( $_POST['_hide_if_out_of_stock'] ) ) {
        update_post_meta( $post_id, '_hide_if_out_of_stock', 'yes' );
    } else {
        delete_post_meta( $post_id, '_hide_if_out_of_stock' );
    }
}

add_action( 'woocommerce_product_query', 'product_query' );
function product_query( $q ){

    $meta_query = $q->get( 'meta_query' );

    if ( get_option( 'woocommerce_hide_out_of_stock_items' ) == 'no' ) {
        $meta_query[] = array(
                    'key'       => '_hide_if_out_of_stock',
                    'compare'   => 'NOT EXISTS'
                );
    }

    $q->set( 'meta_query', $meta_query );
}



// Product image to order email
function sww_add_images_woocommerce_emails( $output, $order ) {
	
	// set a flag so we don't recursively call this filter
	static $run = 0;
  
	// if we've already run this filter, bail out
	if ( $run ) {
		return $output;
	}
  
	$args = array(
		'show_image'   	=> true,
		'image_size'    => array( 500, 500 ),
	);
  
	// increment our flag so we don't run again
	$run++;
  
	// if first run, give WooComm our updated table
	return $order->email_order_items_table( $args );
}
add_filter( 'woocommerce_email_order_items_table', 'sww_add_images_woocommerce_emails', 10, 2 );


// Product link in order email
add_filter( 'woocommerce_order_item_name', 'display_product_title_as_link', 10, 2 );
function display_product_title_as_link( $item_name, $item ) {

    $_product = wc_get_product( $item['variation_id'] ? $item['variation_id'] : $item['product_id'] );

    $link = get_permalink( $_product->get_id() );

    return '<a href="'. $link .'"  rel="nofollow">'. $item_name .'</a>';
}