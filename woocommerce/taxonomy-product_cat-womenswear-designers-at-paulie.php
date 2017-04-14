<?php
/**
 * The Template for displaying customized deigners category page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); 

$custom_css_url = get_template_directory_uri() . '/css/jamdx-designers-style.css';

?>


<link rel="stylesheet" type="text/css" href="<?php echo $custom_css_url ?>">

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		// do_action( 'woocommerce_before_main_content' );
	?>

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<?php
		
		add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );
		
		?>
			

		<?php endif; ?>
		
		
		<?php if( get_field('testy') ):?>
		<?php the_field('testy'); ?>
		<?php endif;?>
		
		
		
		<div id="cat-description" class="fix">
			<div class="term-text">
				<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
				<?php do_action( 'woocommerce_archive_description' ); ?>
			</div>
			<?php
			$queried_object = get_queried_object(); 
			$taxonomy = $queried_object->taxonomy;
			$term_id = $queried_object->term_id; 
	
			//$catimage = the_field('new_category_image',$taxonomy . '_' . $term_id);
			
			//echo $catimage;
			//echo "<img src=\"$catimage\" alt=\"\" />";
			?>
			
			<div class="term-image"><img src="<?php the_field('new_category_image',$taxonomy . '_' . $term_id); ?>" /></div>
			<!--div class="term-image"><img src="<?php the_field('testy',$taxonomy . '_' . $term_id); ?>" /></div-->
		
		</div>

		<!-- Custom jamdx designers loop -->

		<div class="designers-wrapper">
			<?php 
				$args = array(
					'taxonomy' => 'product_cat',
					'hide_empty' => true,
					'parent' => 27,
					'orderby' => 'slug',
					'order' => 'ASC'
				);

				$designers = get_terms($args);

				foreach($designers as $designer) {
				    $d_name = $designer->name;

				    if (($d_name[0] !== $prev_letter2) && ($d_name[0] !== $prev_letter) && ( !is_null($prev_letter))) {
				    	echo '</ul></div>';
				    }

				    if ($d_name[0] !== $prev_letter) {
				    	echo '<div class="designer-by-letter"><h2>' . $d_name[0] . "</h2>";
				    	$prev_letter2 = $prev_letter;
				    	$prev_letter = $d_name[0];
				    	echo '<ul class="designers-list">';
				    }

				    echo '<li class="designers-list__item"><a href="' . esc_url( get_term_link( $designer ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $d_name ) ) . '">' . $d_name . '</a></li>';

				    $d_index++;
				}

				echo '</ul></div>';
				// Prints designers array
				// echo '<pre>'; print_r($designers); echo '</pre>';

			?>	
		</div>

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