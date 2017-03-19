<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Start WooThemes Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

// Define the theme-specific key to be sent to PressTrends.
define( 'WOO_PRESSTRENDS_THEMEKEY', 'zdmv5lp26tfbp7jcwiw51ix9sj389e712' );

// WooFramework init
require_once ( get_template_directory() . '/functions/admin-init.php' );

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/

$includes = array(
				'includes/theme-options.php', 			// Options panel settings and custom settings
				'includes/theme-functions.php', 		// Custom theme functions
				'includes/theme-actions.php', 			// Theme actions & user defined hooks
				'includes/theme-comments.php', 			// Custom comments/pingback loop
				'includes/theme-js.php', 				// Load JavaScript via wp_enqueue_script
				'includes/sidebar-init.php', 			// Initialize widgetized areas
				'includes/theme-widgets.php',			// Theme widgets
				'includes/theme-install.php',			// Theme installation
				'includes/theme-woocommerce.php',		// WooCommerce options
				'includes/theme-plugin-integrations.php'	// Plugin integrations
				);

// Allow child themes/plugins to add widgets to be loaded.
$includes = apply_filters( 'woo_includes', $includes );

foreach ( $includes as $i ) {
	locate_template( $i, true );
}

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below */
/*-----------------------------------------------------------------------------------*/


// Move Yoast to bottom
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');


################################################################################
// CHANGE CHECKOUT ORDER
################################################################################

//remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
//add_action( 'woocommerce_after_order_total', 'woocommerce_checkout_payment', 20 );


################################################################################
// CHECKOUT FIELDS
################################################################################

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

function custom_override_checkout_fields( $fields ) {
     unset($fields['billing']['billing_company']);
     unset($fields['shipping']['shipping_company']);

     return $fields;
}


add_filter( 'woocommerce_billing_fields', 'wc_npr_filter_phone', 10, 1 );

function wc_npr_filter_phone( $address_fields ) {
	$address_fields['billing_phone']['required'] = false;
	return $address_fields;
}


add_filter("woocommerce_checkout_fields", "order_fields");

function order_fields($fields) {

    $order = array(
        "billing_first_name", 
        "billing_last_name", 
        "billing_address_1", 
        "billing_address_2", 
        "billing_city", 
        "billing_state", 
        "billing_country", 
        "billing_postcode", 
        "billing_email", 
        "billing_phone"

    );
    foreach($order as $field)
    {
        $ordered_fields[$field] = $fields["billing"][$field];
    }

    $fields["billing"] = $ordered_fields;
    return $fields;

}



//AUTO PLAY VIMEO
add_filter( 'oembed_fetch_url','add_param_oembed_fetch_url', 10, 3);
add_filter( 'oembed_result', 'add_player_id_to_iframe', 10, 3);

/** add extra parameters to vimeo request api (oEmbed) */
function add_param_oembed_fetch_url( $provider, $url, $args) {
    // unset args that WP is already taking care
    $newargs = $args;
    unset( $newargs['discover'] );
    unset( $newargs['width'] );
    unset( $newargs['height'] );

    // build the query url
    $parameters = urlencode( http_build_query( $newargs ) );

    //return $provider . '&autoplay=1&'. $parameters;
    return $provider . '&autoplay=0&'. $parameters;
}

/** add player id to iframe id on vimeo */
function add_player_id_to_iframe( $html, $url, $args ) {
    if( isset( $args['player_id'] ) ) {
        $html = str_replace( '<iframe', '<iframe id="'. $args['player_id'] .'"', $html );
    }
    return $html;
}

// Display 80 products per page. Goes in functions.php
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 80;' ), 20 );


################################################################################
// HIDE ADMIN MENUS/UPDATES
################################################################################

function remove_menus(){
	// remove_menu_page( 'index.php' );                 							//Dashboard
	// remove_menu_page( 'edit.php' );                   						//Posts
	// remove_menu_page( 'upload.php' );                 						//Media
	// remove_menu_page( 'edit.php?post_type=page' );    						//Pages
	// remove_menu_page( 'edit-comments.php' );          							//Comments
	// remove_menu_page( 'themes.php' );                 						//Appearance
	// remove_menu_page( 'plugins.php' );                							//Plugins
	// remove_menu_page( 'users.php' );                  						//Users
	// remove_menu_page( 'tools.php' );                  							//Tools
	// remove_menu_page( 'options-general.php' );        						//Settings
	// remove_submenu_page ( 'index.php', 'update-core.php' ); 					//Dashboard->Updates
	// remove_submenu_page ( 'index.php', 'relevanssi-premium/relevanssi.php' ); 	//Dashboard->Relavanisi
	// remove_submenu_page ( 'woocommerce', 'do_wgdr' ); 		//Dashboard->Relavanisi
	// remove_menu_page( 'edit.php?post_type=acf-field-group' );					//ACF PRO
	// remove_menu_page( 'edit.php?post_type=acf' );								//ACF
	// remove_menu_page( 'itsec' );												//iThemes Security
	// remove_menu_page( 'cptui_main_menu' );										//CPT UI
	// remove_menu_page( 'festi-cart' );											//WOO CART PRO
	// remove_menu_page( 'woothemes' );											//WOOTHEMES

}

function remove_core_updates(){
	global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}

if (get_userdata(get_current_user_id())->user_login !== 'kimlittle') {
	add_filter('pre_site_transient_update_core','remove_core_updates');			//Core Updates
	add_filter('pre_site_transient_update_plugins','remove_core_updates');		//Plugin Updates
	add_filter('pre_site_transient_update_themes','remove_core_updates');		//Theme Updates
	add_action( 'admin_menu', 'remove_menus', 999 );							//Menus
}

remove_action( 'admin_notices', 'woothemes_updater_notice' );

/*
http://wordpress.stackexchange.com/questions/92020/adding-a-second-email-address-to-a-completed-order-in-woocommerce
*/

add_filter( 'woocommerce_email_headers', 'mycustom_headers_filter_function', 10, 2);

function mycustom_headers_filter_function( $headers, $object ) {
    if ($object == 'customer_completed_order') {
        $headers .= 'BCC: Paulie Clothing <info@paulieclothing.com>' . "\r\n";
    }

    return $headers;
}


// Display 24 products per page. Goes in functions.php
//add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 24;' ), 20 );

add_filter('relevanssi_index_content', 'contentoff');
function contentoff() {
    return false;
}


// Move Yoast Meta Box to bottom
function seo_meta_deprioritize( $priority ) {
	$priority = 'low';
	return $priority;
}
add_filter( 'wpseo_metabox_prio', 'seo_meta_deprioritize' );


// Remove reviews
function disable_woocommerce_reviews_plugin($tabs) {
	unset($tabs['reviews']);
	return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'disable_woocommerce_reviews_plugin', 99 );
	
function disable_woocommerce_reviews_product_notice() { ?>
	<style scoped>.comment_status_field{opacity:.4;pointer-events:none;}</style>
	<p style="font-style:italic;color:red;margin-left:5px"><?php _e('Product reviews are currently disabled.', 'disable-woocommerce-reviews'); ?></p><?php
}
add_action( 'woocommerce_product_options_reviews' , 'disable_woocommerce_reviews_product_notice', 10, 0 );
	
function disable_woocommerce_remove_metaboxes() {
	remove_meta_box( 'commentsdiv' , 'product' , 'normal' );
}
add_action( 'add_meta_boxes' , 'disable_woocommerce_remove_metaboxes', 99 );

function disable_woocommerce_remove_dashboard_widgets() {
    remove_meta_box( 'woocommerce_dashboard_recent_reviews', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'disable_woocommerce_remove_dashboard_widgets', 40);

// Show empty categories
add_filter('woocommerce_product_categories_widget_args', 'woocommerce_show_empty_categories');
function woocommerce_show_empty_categories($cat_args){
 $cat_args['hide_empty']=0;
 return $cat_args;
}

add_filter( 'woocommerce_product_subcategories_hide_empty', 'show_empty_categories', 10, 1 );
function show_empty_categories ( $show_empty ) {
    $show_empty  =  true;
    // You can add other logic here too
    return $show_empty;
}

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
 
function woo_remove_product_tabs( $tabs ) {
 
    //unset( $tabs['description'] );      	// Remove the description tab
    //unset( $tabs['reviews'] ); 			// Remove the reviews tab
    //unset( $tabs['additional_information'] );  	// Remove the additional information tab
 
    return $tabs;
 
}

// Removes tabs from their original loaction 
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

// Inserts tabs under the main right product content 
add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 20 );


foreach ( array( 'pre_term_description' ) as $filter ) {
    remove_filter( $filter, 'wp_filter_kses' );
}
 
foreach ( array( 'term_description' ) as $filter ) {
    remove_filter( $filter, 'wp_kses_data' );
}


function paulie_scripts() {

	wp_enqueue_style( 'mmenu', get_template_directory_uri() . '/css/jquery.mmenu.all.css', array(), '3.0.2' );

	wp_enqueue_style( 'fonts', get_template_directory_uri() . '/css/fonts.css', array(), '3.0.2' );
	wp_enqueue_style( 'owlcss', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '3.0.2' );
	// wp_enqueue_style( 'custom', get_template_directory_uri() . '/custom.css', array(), '3.0.2' );
     wp_enqueue_style( 'custom', get_template_directory_uri() . '/custom.css' );

	wp_enqueue_script( 'mmenu', get_template_directory_uri() . '/js/jquery.mmenu.min.all.js', array( 'jquery' ), '20131209', true );
	wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '20131209', true );
	wp_enqueue_script( 'elevatezoom', get_template_directory_uri() . '/js/jquery.elevateZoom-3.0.8.min.js', array( 'jquery' ), '20131209', true );
	wp_enqueue_script( 'customjs', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20131209', true );
}
add_action( 'wp_enqueue_scripts', 'paulie_scripts' );


/*
| -------------------------------------------------------------------
| Custom Login Logo
| -------------------------------------------------------------------

 */
function custom_login_logo() {
	echo '<style type="text/css">
	body.login { background: #fff; }
	.login h1 a { background-size: 320px 140px; width:320px; height:140px; background-image: url('.get_bloginfo('template_directory').'/media/logo.png) !important; }
	</style>';
}
add_action('login_head', 'custom_login_logo');


################################################################################
// REMOVE YOAST NAG
################################################################################

add_action('admin_init', 'wpc_disable_yoast_notifications');
function wpc_disable_yoast_notifications() {
  if (is_plugin_active('wordpress-seo/wp-seo.php')) {
    remove_action('admin_notices', array(Yoast_Notification_Center::get(), 'display_notifications'));
    remove_action('all_admin_notices', array(Yoast_Notification_Center::get(), 'display_notifications'));
  }
}


/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or the sky will fall down */
/*-----------------------------------------------------------------------------------*/
?>
<?php

remove_action('wp_head', 'wp_generator');
