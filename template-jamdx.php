<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?><?php
/**
 * Template Name: jamdx lab
 *
 * This template is a full-width version of the page.php template file. It removes the sidebar area.
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header('jamdx');
	global $woo_options;
	
?>

<!-- Desktop View -->
<div id="paulie_clothing" class="home_2017">
	<div class="home_column home_column_1">
		<a href="<?php the_field('column_1_link')?>"></a>
		<div class="column_home_inner" style="display:none;">
			<div class="column_home_inner">
				<h1 class="light"><?php the_field('column_1_prev_title')?></h1>
				<h1 clas="bold" ><?php the_field('column_1_main_title')?></h1>			 	
			</div>
		 </div>
		<div class="column_home_inner_white_overlay" style="display:none;"></div>
 	</div>

 	<div class="home_column home_column_2">
		<a href="<?php the_field('column_2_link')?>"></a>
		<div class="column_home_inner" style="display:none;">
			<div class="column_home_inner">
				<h1 class="light"><?php the_field('column_2_prev_title')?></h1>
				<h1 clas="bold" ><?php the_field('column_2_main_title')?></h1>			 	
			</div>
	 	</div>
	 	<div class="column_home_inner_white_overlay" style="display:none;"> </div>
 	</div>

 	<div class="home_column home_column_3">
		<a href="<?php the_field('column_3_link')?>"></a>
		<div class="column_home_inner" style="display:none;">
			<div class="column_home_inner">
				<h1 class="light"><?php the_field('column_3_prev_title')?></h1>
				<h1 clas="bold" ><?php the_field('column_3_main_title')?></h1>			 	
			</div>
		</div>
		<div class="column_home_inner_white_overlay" style="display:none;"> </div>
 	</div>

	<div class="home_column home_column_4">
		<a href="<?php the_field('column_4_link')?>"></a>
		<div class="column_home_inner" style="display:none;">
			 <div class="column_home_inner">
			 	<h1 class="light"><?php the_field('column_4_prev_title')?></h1>
			 	<h1 clas="bold" ><?php the_field('column_4_main_title')?></h1>			 	
			 </div>
		</div>		
		<div class="column_home_inner_white_overlay" style="display:none;"></div>
	</div>

	<?php woo_loop_before(); ?>
	<?php woo_loop_after(); ?>
</div><!-- /#content -->
		
<style type="text/css">

	/* css temporary */
	li.menu-item.menu-item-type-taxonomy.menu-item-object-product_cat.menu-item-851,
	li.menu-item.menu-item-type-custom.menu-item-object-custom.menu-item-4460 {
	    display: none;
	}

	.home_column_1 {
		background-image: url('<?php the_field('column_1_mobile_image')?>'); 
	}

	.home_column_2 {
		background-image: url('<?php the_field('column_2_mobile_image')?>'); 
	}

	.home_column_3 {
		background-image: url('<?php the_field('column_3_mobile_image')?>'); 
	}

	.home_column_4 {
		background-image: url('<?php the_field('column_4_mobile_image')?>'); 
	}

	.column_home_inner {
		display: block !important;
	}

	.home_column {
		background-size:cover;
		background-position: center center;
		background-repeat:no-repeat;
	}


	/*media queries for desktop
	*/
	@media only screen and (min-width: 780px) {

		/* Desktop Columns */
		.home_column_1:after,  	.home_column_2:after, .home_column_3:after  {
		    position: absolute;
		    top: 0;
		    height: 100vh;
		    left: 98%;
		    width: 10px;
		    background: #fff;
		    content: "";
		    display: block;
		}

		h1.light {
		    font-weight: lighter !important;
		}

		h1.bold {
		    font-weight: bolder !important;
		}

		h1 {font-family: 'Roboto', sans-serif !important;}

		.home_column {
		    width: 25%;
		    height: 80vh;
		    display: inline-block;
		    float: left;
		    position:relative;
		}

		div#paulie_clothing {
		    display: inline-block;
		    width: 100%;
		    position: relative;
		    vertical-align: top;
		    margin-bottom: 30px;
		    overflow:hidden;
		}

		.column_home_inner {
		    position: relative;
		    top: 50%;
		    margin-top: -50px;
		    text-align: center;
		    width: 100%;
		    z-index:2;
		}

		.column_home_inner_white_overlay {
		    position: absolute;
		    height: 100%;
		    width: 100%;
		    background: rgba(247, 247, 247, 0.60);
		    z-index: 1;
		    top: 0;
		}

		.home_column a:hover + .column_home_inner {
		    display: block !important;
		}

		.home_column a:hover ~ .column_home_inner_white_overlay {
		    display: block !important;
		}

		.home_column a {
		    position: absolute;
		    width: 100%;
		    height: 100%;
		    z-index:10;
		}

		.is_hover {
			opacity:0.6;
		}

		.home_column_1 {
			background-image: url('<?php the_field('column_1_desktop_image')?>'); 
		}

		.home_column_2 {
			background-image: url('<?php the_field('column_2_desktop_image')?>'); 
		}


		.home_column_3 {
			background-image: url('<?php the_field('column_3_desktop_image')?>'); 
		}

		.home_column_4 {
			background-image: url('<?php the_field('column_4_desktop_image')?>'); 
		}

		.home_column {
			background-size:cover;
			background-position: center center;
			background-repeat:no-repeat;
		}
	}

</style>
<?php get_footer('jamdx'); ?>
<script type="text/javascript">
	window.onload = function() {
		
		var burgerMenuBtn = document.querySelector('[data-js=burgerMenuBtn]');
		var mobileSearchBtn = document.querySelector('[data-js=mobileSearchBtn]');
		var mobileMenuWrapper = document.getElementById('menu-jamdx');
		var acc = document.querySelectorAll("#menu-jamdx .menu-item-has-children");
		var i;		        

		// Add mobile menu arrows and accordion functionality
		for (i = 0; i < acc.length; i++) {
		    arrowButton = document.createElement('i');
		    arrowButton.classList = 'mobile-submenu fa';

		    acc[i].appendChild(arrowButton);

		    acc[i].lastChild.onclick = function(){
		        /* Toggle between adding and removing the "active" class,
		        to highlight the button that controls the panel */
		        this.classList.toggle("mobile-submenu--closed");
		        this.parentElement.classList.toggle("submenu-list-open");
		        
		        /* Toggle between hiding and showing the active panel */
		        var panel = this.previousElementSibling;
		        if (panel.style.maxHeight){
		          panel.style.maxHeight = null;
		        } else {
		          panel.style.maxHeight = panel.scrollHeight + "px";
		        } 
		    }
		}

		// Mobile menu display
		burgerMenuBtn.onclick = function(){
			this.classList.toggle('close-menu-btn');
		    document.body.classList.toggle("mobile-menu-open");

		}

		//  Mobile search display
		mobileSearchBtn.onclick = function(){
		    document.body.classList.toggle("mobile-search-open");
		}
	};
</script>
