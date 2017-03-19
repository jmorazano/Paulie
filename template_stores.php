<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Template Name: Stores Page
 *
 * The contact form page template displays the a
 * simple contact form in your website's content area.
 *
 * @package WooFramework
 * @subpackage Template
 */
 
	get_header();
	global $woo_options;
?>
       
    <div id="content" class="page col-full">
    
    	<?php woo_main_before(); ?>
    	
		<section id="main" class="col-left"> 			

        <?php
        	if ( have_posts() ) { $count = 0;
        		while ( have_posts() ) { the_post(); $count++;
        ?>                                                           
            <article <?php post_class(); ?>>
				
				<header>
			    	<h1><?php the_title(); ?></h1>
				</header>
				
                <section class="entry">
                
                	<div class="alignright" style="margin-top: 15px;">
                		<img class="size-full wp-image-2907" src="http://www.paulieclothing.com/wp-content/uploads/2015/03/stjohns.jpg" alt="store_front" width="500" height="265" />
						<p style="padding-top:15px;">
                		<a class="tourlink" style="display:none" href="https://goo.gl/maps/c5suG" target="_blank">Take virtual tour &gt;</a>
						<a class="maplink" href="https://goo.gl/maps/RmlMs" target="_blank">View google maps &gt;</a>
						</p>
                	</div>
                	
					<address style="min-height: 330px;padding-top:20px;">
						<?php if(get_field('stjohnswood')): ?>
						<?php the_field('stjohnswood'); ?>
						<?php endif; ?>
					</address>
					
					<hr />
					
					<div class="alignright" style="margin-top: 15px;">
						<img class="size-full wp-image-2907" src="http://www.paulieclothing.com/wp-content/uploads/2014/02/store_front.jpg" alt="store_front" width="500" height="265" />
						<p style="padding-top:15px;">
						<a class="tourlink" style="display:none" href="http://goo.gl/Mqchz4" target="_blank">Take virtual tour &gt;</a>
                		<a class="maplink" href="https://goo.gl/maps/2IHrQ" target="_blank">View google maps &gt;</a>
						</p>
					</div>
					
					<address style="min-height: 330px;padding-top:20px;">
						<?php if(get_field('temple')): ?>
						<?php the_field('temple'); ?>
						<?php endif; ?>
					</address>
					

					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
               	</section><!-- /.entry -->

                
            </article><!-- /.post -->
            
            <?php
            	// Determine wether or not to display comments here, based on "Theme Options".
            	if ( isset( $woo_options['woo_comments'] ) && in_array( $woo_options['woo_comments'], array( 'page', 'both' ) ) ) {
            		comments_template();
            	}

				} // End WHILE Loop
			} else {
		?>
			<article <?php post_class(); ?>>
            	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
            </article><!-- /.post -->
        <?php } // End IF Statement ?>  
        
		</section><!-- /#main -->
		
		<?php woo_main_after(); ?>

        <?php get_sidebar(); ?>

    </div><!-- /#content -->
		
<?php get_footer(); ?>