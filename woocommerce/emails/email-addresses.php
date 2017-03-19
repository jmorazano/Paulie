<?php
/**
 * Email Addresses
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?><table cellspacing="0" cellpadding="0" style="width: 100%; vertical-align: top;" border="0" style="margin-bottom:0;">

	<tr>

		<td valign="top" width="100%">

			<h4 style="color: #000000;margin-bottom:0;"><?php _e( 'Billing address', 'woocommerce' ); ?></h4>

			<?php //echo $order->get_formatted_billing_address(); ?><?php echo $order->get_billing_address(); ?>

		</td>
	</tr>
	

		<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() && ( $shipping = $order->get_formatted_shipping_address() ) ) : ?>
		<tr>
		<td valign="top" width="100%">

			<h4 style="color: #000000;margin-bottom:0;"><?php _e( 'Shipping address', 'woocommerce' ); ?></h4>

			<?php //echo $shipping; ?><?php echo $order->get_shipping_address(); ?>

		</td>
		</tr>
		<?php endif; ?>

	

</table>
