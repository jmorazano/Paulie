<?php
/**
 * Product loop title
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<h3>
		<?php
		$taxonomy = get_taxonomy( 'product_brand' ); 
		$labels   = $taxonomy->labels;
		echo get_brands( $post->ID, ', ', ' <span class="brands">' .' ', '</span>' );
		?>
		</h3>
		<h4><?php the_title(); ?></h4>
		