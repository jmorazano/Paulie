<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
global $woo_options, $woocommerce;
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php if ( $woo_options['woo_boxed_layout'] == 'true' ) echo 'boxed'; ?> <?php if (!class_exists('woocommerce')) echo 'woocommerce-deactivated'; ?>">
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php wp_title( '-', true, 'right' ); ?></title>
<?php woo_meta(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen" />
<link href="https://fonts.googleapis.com/css?family=Roboto:300,500" rel="stylesheet">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<meta name="p:domain_verify" content="40e44844b9c16f4f1a2e97783d92334d"/>
<?php
	wp_head();
	woo_head();
?>

<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 -->
</head>

<body <?php body_class(); ?>>

<?php woo_top(); ?>

<div id="wrapper">

	<?php
		wp_nav_menu( array(
		'depth' => 2, 
		'sort_column' => 'menu_order', 
		'container' => 'nav', 
		'container_id' => 'menu-jamdx', 
		'menu_id' => '', 
		'menu_class' => '', 
		'theme_location' => 'primary-menu'
		) );
	?>
			
    <?php woo_header_before(); ?>
	
<!-- 	<div id="benefits">
		<a href="/shipping-information/">FREE UK DELIVERY</a><span> and </span><a href="/returns-and-exchanges/">FREE UK RETURNS</a>
	</div> -->
	
	<header id="header" class="col-full">
		<div id="top" class="desktop-top-menu">
			<nav class="col-full" role="navigation">
				<!-- login my account menu -->
				<?php if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'top-menu' ) ) { ?>
				<?php wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'top-nav', 'menu_class' => 'nav fl', 'theme_location' => 'top-menu' ) ); ?>
				<?php } ?>
				<!-- woocommerce cart menu -->
				<?php
					if ( class_exists( 'woocommerce' ) ) {
						echo '<ul class="nav wc-nav">';
						woocommerce_cart_link();
						echo '<li class="checkout"><a href="'.esc_url($woocommerce->cart->get_checkout_url()).'">'.__('Checkout','woothemes').'</a></li>';
						echo get_search_form();
						echo '</ul>';
					}
				?>
				<?php //echo do_shortcode("[nwadcart_widget]"); ?>
			</nav>
		</div>

		<div class="mobile-menu-buttons">
			<i data-js="burgerMenuBtn" class="fa fa-bars" aria-hidden="true"></i>
			<i data-js="mobileSearchBtn" class="fa fa-search" aria-hidden="true"></i>
		</div>

		<?php
			$logo = esc_url( get_template_directory_uri() . '/images/logo.png' );
			if ( isset( $woo_options['woo_logo'] ) && $woo_options['woo_logo'] != '' ) { $logo = $woo_options['woo_logo']; }
			if ( isset( $woo_options['woo_logo'] ) && $woo_options['woo_logo'] != '' && is_ssl() ) { $logo = preg_replace("/^http:/", "https:", $woo_options['woo_logo']); }
		?>
		
		<?php if ( ! isset( $woo_options['woo_texttitle'] ) || $woo_options['woo_texttitle'] != 'true' ) { ?>
			<a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr( get_bloginfo( 'description' ) ); ?>" style="background-image: url('<?php echo $logo; ?>')">
				<!-- <img src="<?php echo $logo; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" /> -->
			</a>
		<?php } ?>

		<div class="mobile-social">
			<a href="https://www.facebook.com/paulieclothing" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
			<a href="https://www.instagram.com/paulieclothing/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
			<a href="https://twitter.com/paulieclothing/" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
		</div>

        <?php woo_nav_before(); ?>

		<nav id="navigation" class="col-full" role="navigation">

			<?php
			if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' ) ) {
				wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'main-nav', 'menu_class' => 'nav fr', 'theme_location' => 'primary-menu' ) );
			} else {
			?>
	        <ul id="main-nav" class="nav fl">
				<?php if ( is_page() ) $highlight = 'page_item'; else $highlight = 'page_item current_page_item'; ?>
				<li class="<?php echo $highlight; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home', 'woothemes' ); ?></a></li>
				<?php wp_list_pages( 'sort_column=menu_order&depth=6&title_li=&exclude=' ); ?>
			</ul><!-- /#nav -->
	        <?php } ?>

		</nav><!-- /#navigation -->

		<?php woo_nav_after(); ?>

		<!-- Mobile search form -->
		<?php
			if ( class_exists( 'woocommerce' ) ) {
				echo '<ul class="mobile-search">';
				echo get_search_form();
				echo '</ul>';
			}
		?>

	</header><!-- /#header -->
	<?php woo_content_before(); ?>
