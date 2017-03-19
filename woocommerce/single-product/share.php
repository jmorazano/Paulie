<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<?php do_action( 'woocommerce_share' ); // Sharing plugins can hook into here ?>

<div style="margin-top:20px;">
<!-- AddThis Button BEGIN -->

	<div class="addthis_toolbox addthis_default_style">
		<div style="float:left;line-height: 24px;margin-right: 10px;">Share:</div>
		<a class="icon addthis_button_facebook glyph"><i class="fa fa-facebook"></i></a>
		<a class="addthis_button_twitter glyph"><i class="fa fa-twitter"></i></a>
		<a class="addthis_button_tumblr glyph"><i class="fa fa-tumblr"></i></a>
		<a class="addthis_button_google_plusone_share glyph"><i class="fa fa-google-plus"></i></a>
		<a class="addthis_button_pinterest_share glyph"><i class="fa fa-pinterest-p"></i></a>
	</div>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=kimlittle"></script>
</div>