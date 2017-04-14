	<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Footer Template
 *
 * Here we setup all logic and XHTML that is required for the footer section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
	global $woo_options;

	$total = 4;
	if ( isset( $woo_options['woo_footer_sidebars'] ) && ( $woo_options['woo_footer_sidebars'] != '' ) ) {
		$total = $woo_options['woo_footer_sidebars'];
	}

	if ( ( woo_active_sidebar( 'footer-1' ) ||
		   woo_active_sidebar( 'footer-2' ) ||
		   woo_active_sidebar( 'footer-3' ) ||
		   woo_active_sidebar( 'footer-4' ) ) && $total > 0 ) {

?>
	<?php woo_footer_before(); ?>
	
<footer id="footer" class="col-full">
	 <section id="footer-widgets" class="footer_widget_wrapper">

			<?php $i = 0; while ( $i < $total ) { $i++; ?>
				<?php if ( woo_active_sidebar( 'footer-' . $i ) ) { ?>

			<div class="footer-item footer-widget-<?php echo $i; ?>">
	        	<?php woo_sidebar( 'footer-' . $i ); ?>
			</div>

		        <?php } ?>
			<?php } // End WHILE Loop ?>

		</section><!-- /#footer-widgets  -->
	</footer><!-- /#footer  -->
	<?php } // End IF Statement ?>

</div><!-- /#wrapper -->

<script type="text/javascript" id="inspectletjs">
window.__insp = window.__insp || [];
__insp.push(['wid', 1808513637]);
(function() {
function __ldinsp(){var insp = document.createElement('script'); insp.type = 'text/javascript'; insp.async = true; insp.id = "inspsync"; insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js'; var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(insp, x); };
document.readyState != "complete" ? (window.attachEvent ? window.attachEvent('onload', __ldinsp) : window.addEventListener('load', __ldinsp, false)) : __ldinsp();

})();
</script>
<!-- <script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: 'a79a96f5-7527-4381-a065-f4cda09e85bc', f: true }); done = true; } }; })();</script> -->


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<?php wp_footer(); ?>
<?php woo_foot(); ?>
</body>
</html>