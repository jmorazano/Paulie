<?php
/**
 * Single Product title
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $post, $product;
?>
<h2>
	<?php
	$taxonomy = get_taxonomy( 'product_brand' ); 
	$labels   = $taxonomy->labels;
	//echo get_brands( $post->ID, ', ', ' <span class="brands">' .' <span class="brand_name">'. $labels->name . ': '.'</span>', '</span>' );
	echo get_brands( $post->ID, ', ', ' <span class="brands">' .' ', '</span>' );
	?>
</h2>
<h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h1>
