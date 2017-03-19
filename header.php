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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

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

<style type="text/css">

	/* css temporary */
	li.menu-item.menu-item-type-taxonomy.menu-item-object-product_cat.menu-item-851,
	li.menu-item.menu-item-type-custom.menu-item-object-custom.menu-item-4460 {
	    display: none;
	}

	body {
		padding: 0;
	}

	.desktop-top-menu {
		display: none;
	}

	#header #logo {
	    padding: 15px 0;
	    width: 80px;
	    height: 70px;
	    background-position: center;
	    background-size: contain;
	    background-repeat: no-repeat;
	}

	#header {
	    border-bottom: 4px solid #333;
	}

	/* Mobile menu css */
	.mobile-menu-buttons {
	    position: absolute;
	    top: 50%;
	    transform: translateY(-50%);
	    left: 10px;
	}

	.mobile-menu-buttons i {
	    font-size: 24px;
	    color: #333;
	    margin-right: 20px;
	    vertical-align: middle;
	}

	.mobile-social i {
	    font-size: 24px;
	    color: #333;
	    margin-left: 10px;
	}

	.mobile-social {
	    position: absolute;
	    top: 50%;
	    transform: translateY(-50%);
	    right: 10px;
	}

	#menu-jamdx .sub-menu {
	    padding: 0px 18px 0 25%;
	    max-height: 0;
	    overflow: hidden;
	    transition: max-height 0.2s ease-out;
	    margin: 0;
	}

	#menu-jamdx .submenu-list-open .sub-menu {
	    padding: 20px 18px 0 25%;
	}

	#menu-jamdx .sub-menu li.menu-item {
	    padding: 5px 0;
	}

	#menu-jamdx .sub-menu li.menu-item a {
	    font-size: 12px;
	    text-align: left;
	    font-family: 'Roboto', sans-serif !important;
	    font-weight: 400;
	    letter-spacing: 0.8px;
	}

	#menu-jamdx li.menu-item {
	    position: relative;
	    padding: 10px 0;
	    list-style: none;
	}

	#menu-jamdx li.menu-item.submenu-list-open {
	    border: 1px solid #333;
	    border-left: 0;
	    border-right: 0;
	}

	.mobile-submenu {
	    padding: 14px;
	    position: absolute;
	    top: 5px;
	    right: 30px;
	    color: #333;
	}

	.mobile-submenu:before {
	    content: "\f0d7";
	}

	.mobile-submenu--closed:before {
	    content: "\f0d8";
	}

	#header #navigation ul#main-nav li a, #menu-jamdx li a {
	    font-family: 'Roboto', sans-serif !important;
	    text-align: left;
	    font-weight: 400;
	    color:#111;
	}

	nav#menu-jamdx {
	    position: absolute;
	    z-index: 10000000;
	    top: 75px;
	    bottom: 0;
	    width: 100%;
	    background-color: #FFFFED;
	    padding-top: 20px;
	    overflow: auto;
		visibility: hidden;
		opacity: 0;
		transition: visibility 0s 300ms, opacity 300ms linear;
	}

	.mobile-menu-open nav#menu-jamdx {
	  visibility: visible;
	  opacity: 1;
	  transition: opacity 300ms linear;
	}

	#menu-jamdx ul li a {
	    color: #333 !important;
	    text-transform: uppercase;
	    display: block;
	    text-align: center;
	    font-size: 22px;
	    letter-spacing: 2.5px;
	}

	body.mobile-menu-open {
		overflow: hidden;
		position: relative;
		height: 100%;
	}

	.close-menu-btn.fa-bars:before {
	    content: "X";
	    font-family: 'Roboto', sans-serif;
	    font-size: 30px;
	    font-weight: bold;
	}

	/* Mobile search css */
	ul.mobile-search {
	    position: absolute;
	    bottom: -90px;
	    background-color: #fff;
	    padding-top: 0px;
	    width: 100%;
	    visibility: hidden;
	    opacity: 0;
	    transition: visibility 0s 300ms, opacity 300ms linear;
		z-index: 10;
	}

	.mobile-search-open ul.mobile-search {
		visibility: visible;
		opacity: 1;
		transition: opacity 300ms linear;
		z-index:9999999;
		box-shadow: 1px 5px 20px -7px #333;
	}

	.desktop-top-menu li.search {
	    padding: 0;
	}

	.mobile-search label.screen-reader-text {
	    display: none;
	}

	.mobile-search #searchform {
	    display: flex;
	    justify-content: center;
	}

	.mobile-search input[type=search] {
	    -webkit-appearance: none;
	    flex-grow: 1;
	    margin-left: 5px;
	}

	/* Footer jamdx styles */
	footer#footer {
	    max-width: none;
	    border-top: 5px solid #111;
	}

	section#footer-widgets {
	    max-width: none;
	    padding: 0;
	}

	#footer-widgets .widget h3, #sidebar .widget h3 {
	    color: black;
	    font-family: 'Roboto', sans-serif;
	    letter-spacing: 0.8px;
	}

	.block.footer-widget-3 {
	    display: none;
	}

	#footer-widgets ul li a {
	    font-family: 'Roboto', sans-serif;
	    text-transform: uppercase;
	    color: #333 !important;
	    font-size: 11px;
	}

	div#jamdx-socials {
	    margin-top: 20px;
	}

	#jamdx-socials a {
	    color: #333 !important;
	    font-size: 10px;
	}

	a#newsletter_subscribe {
	    margin: 0;
	}

	#footer .widget {
	    text-align: center;
	}
	
	section#footer-widgets {
    margin-top: 30px;
    }	


	/* desktop footer - is not mobile first */

	.footer-item {
	    width: 24%;
	    display: inline-block;
	    padding: 0 30px;
	    vertical-align: top;
	}

	@media only screen and (max-width: 780px) {

    	.footer-item, #sidebar .widget {
		    width: 100%;
		    display: inline-block;
		    padding: 0;
		    vertical-align: top;
		    text-align: center;
		}

	   body {
 
             overflow-x: hidden;
	   }
        .page div#content {
		    padding: 0 10px;
		} 
		 .home div#content {
		    padding: 0 !important;
		}
 		}	

	/* media queries for desktop */
	@media only screen and (min-width: 780px) {
	
		/*header and navigation*/
		.desktop-top-menu {
			display: block;
		}

		.mobile-menu-buttons, .mobile-social {
		    display: none;
		}

		#header #logo {
		    width: 180px;
		    background-position: 20px;
		}

		#top ul.nav > li a {
		    padding: 0;
		}

		#top .wc-nav li.cart a {
		    padding-left: 1em;
		}

		#top ul.nav > #menu-item-189 a {
			padding-left: 5px;
		}

		#top .wc-nav li.cart a {
		    padding-left: 0;
		}

		#top ul.nav {
		    float: none;
		}

		input[type="search"] {
		    border: 0;
		}

		input[type="search"]:focus {
		    box-shadow: none;
		}

		li.search {
			position: relative;
		}

		li.search:after {
		    content: "\f002";
		    display: inline-block;
		    font-family: 'FontAwesome';
		    text-rendering: auto;
		    -webkit-font-smoothing: antialiased;
		    position: absolute;
	        top: 4px;
	        right: 40px;
		}

		#header #navigation ul#main-nav {
		    display: flex;
		    justify-content: space-around;
		}


		header#header {
		    width: 100% !important;
		    min-width: 100% !important;
		    margin-bottom: 0 !important;
		    border-bottom: 5px solid #111 !important;
		}

		nav#navigation {
		    width: 100% !important;
		    min-width: 100% !important;
		}

		/* Footer jamdx styles */

		.block.footer-widget-3 {
		    display: inline-block;
		    margin-top: 20px;
		}

		.block.footer-widget-1 {
		    padding-left: 30px;
		}

		#footer .widget {
		    text-align: left;
		}

	}

/*	fixes after introducing new header and footer
*/
body p, h1, h2, h3,h4,h5, .blog #sidebar a, .woocommerce_tabs ul.tabs li.active a, .woocommerce-tabs ul.tabs li a, .woocommerce-tabs ul.tabs li.active a {font-family: GillSansMTPro-Book, Arial, Helvetica, Geneva, sans-serif; }


ul.products li.product h3 {
    margin-top: 0 !important;
}

</style>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>