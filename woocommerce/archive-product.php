<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$custom_css_url = get_template_directory_uri() . '/css/jamdx-archive-product.css';

get_header( 'shop' ); ?>

<link rel="stylesheet" type="text/css" href="<?php echo $custom_css_url ?>">

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<?php
		
		add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );
		function woocommerce_category_image() {
			if ( is_product_category() ){
				global $wp_query;
				$cat = $wp_query->get_queried_object();
				$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
				$image = wp_get_attachment_url( $thumbnail_id );
				if ( $image ) {
					//echo '<img src="' . $image . '" alt="" />';
				}
			}
		}
		
		?>
			

		<?php endif; ?>
		
		
		<?php if( get_field('testy') ):?>
		<?php the_field('testy'); ?>
		<?php endif;?>
		
		
		
		<div id="cat-description" class="fix mobile-fit">
			<div class="term-text">
				<h1 class="page-title"><?php woocommerce_page_title(); ?>
				</h1>
			</div>
			<div class="filters-wrapper">
				<h2 class="filter-title">FILTERS<span class="filter-expand" data-js="filterExpandBtn"></span></h2>
				<div class="filters-widget filters-widget--hidden">
				<?php echo do_shortcode('[widget id="wcapf-active-filters-2"]'); ?>
				<?php echo do_shortcode('[widget id="wcapf-attribute-filter-2"]'); ?>
				<?php echo do_shortcode('[widget id="wcapf-attribute-filter-3"]'); ?>
				</div>
			</div>
			<?php
			$queried_object = get_queried_object(); 
			$taxonomy = $queried_object->taxonomy;
			$term_id = $queried_object->term_id; 
	
			//$catimage = the_field('new_category_image',$taxonomy . '_' . $term_id);
			
			//echo $catimage;
			//echo "<img src=\"$catimage\" alt=\"\" />";
			?>
		
		</div>

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>
			
		<?php else: ?>
		
			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' ); ?>

<script type="text/javascript">
(function() {

	jQuery(document).ready(function () {
	    jQuery(document).on('click', '.filter-expand', function () {
	        jQuery('#cat-description').toggleClass('mobile-fit');
	        jQuery(this).toggleClass('filter-expand--rotated');
	        jQuery('.filters-widget').toggleClass('filters-widget--hidden');

	    });
	}); 
})()
</script>
