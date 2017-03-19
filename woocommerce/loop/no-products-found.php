<?php
/**
 * Displayed when no products are found matching the current query.
 *
 * Override this template by copying it to yourtheme/woocommerce/loop/no-products-found.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>


<?php if( is_tax( 'product_cat' , 'faliero-sarti')      ): ?>

<h3>Shop the collection in store</h3>
<img src="/wp-content/uploads/2016/03/Faliero-Sarti.jpg" class="img-responsive" alt="Faliero Sarti" style="margin-bottom:80px;" />

<?php elseif( is_tax( 'product_cat' , 'ottotredici')      ): ?>

<h3>Shop the collection in store</h3>
<img src="/wp-content/uploads/2016/03/Ottotredici-designer-page.jpg" class="img-responsive" alt="Ottotredici" style="margin-bottom:80px;" />

<?php elseif( is_tax( 'product_cat' , 'pink-memories')      ): ?>

<h3>Shop the collection in store</h3>
<img src="/wp-content/uploads/2016/04/PM-page-image.jpg" class="img-responsive" alt="Pink Memories" style="margin-bottom:80px;" />

<?php else: ?>

<p><?php _e( 'New collection coming soon', 'woocommerce' ); ?></p>

<?php endif; ?>

