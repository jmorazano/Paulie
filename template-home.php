<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?><?php
/**
 * Template Name: Home
 *
 * This template is a full-width version of the page.php template file. It removes the sidebar area.
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options;
	
?>

	<?php if( get_field('banner_image') && get_field('banner_position') == "top"): $image = get_field('banner_image');?>
		<div id="hbanner" class="col-full">
			<?php if( get_field('banner_link') ):?><a href="<?php the_field('banner_link'); ?>"><?php endif;?>
			<img src="<?php echo $image['url']; ?>" width="<?php echo $image['width'] ?>" height="<?php echo $image['height'] ?>"  />
			<?php if( get_field('banner_link') ):?></a><?php endif;?>
		</div>
	<?php endif;?>
	
	<?php if( have_rows('slider') ): ?>
    <div id="slider" class="col-full">
		
			<?php while( have_rows('slider') ): the_row(); 
				$image = get_sub_field('slide_image');
			?>
			<div class="item">
				<?php if(get_sub_field('slide_link')): ?>
				<a href="<?php the_sub_field('slide_link'); ?>"><img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" /></a>
				<?php else: ?>
				<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" />
				<?php endif; ?>
			</div>
			<?php endwhile?>
	
	</div>
	<?php endif; ?>

    <div id="content" class="col-full <?php if ( $woo_options[ 'woo_homepage_banner' ] == "true" ) echo 'with-banner'; ?> <?php if ( $woo_options[ 'woo_homepage_sidebar' ] == "false" ) echo 'no-sidebar'; ?>">
		<?php wp_reset_query(); ?>
		<section id="main" class="fullwidth">
			
			
			<?php if( get_field('banner_image') && get_field('banner_position') == "mid"): $image = get_field('banner_image');?>
			<div id="hbanner">
				<?php if( get_field('banner_link') ):?><a href="<?php the_field('banner_link'); ?>"><?php endif;?>
				<img src="<?php echo $image['url']; ?>" width="<?php echo $image['width'] ?>" height="<?php echo $image['height'] ?>"  />
				<?php if( get_field('banner_link') ):?></a><?php endif;?>
			</div>
			<?php endif;?>
				
			<div class="columns-3">
				
				<?php while ( have_posts() ) : the_post(); ?>
				
				<?php if( have_rows('homefeatures') ): ?>
				<ul class="products homeproducts">
				
					<?php while( have_rows('homefeatures') ): the_row(); 
						$image = get_sub_field('feature_image');
					?>
					<?php if( get_sub_field('feature_image') ):?>
					<li class="product homeproduct">
						<a href="<?php the_sub_field('link'); ?>" ><img src="<?php echo $image['url']; ?>" width="<?php echo $image['width'] ?>" height="<?php echo $image['height'] ?>"  /></a>
					</li>
					<?php endif;?>
					<?php endwhile; ?>
					
				</ul>
				<?php endif; ?>
				
				<?php endwhile; // end of the loop. ?>
			</div>
			
			<section id="fbanner">
				<div class="col2-set">
				
					<div class="col-1">
						<div class="inner">
							<?php if( get_field('banner_image') && get_field('banner_position') == "bottom-l"): $image = get_field('banner_image');?>
								<?php if( get_field('banner_link') ):?><a href="<?php the_field('banner_link'); ?>"><?php endif;?>
								<img src="<?php echo $image['url']; ?>" width="<?php echo $image['width'] ?>" height="<?php echo $image['height'] ?>"  />
								<?php if( get_field('banner_link') ):?></a><?php endif;?>
							<?php endif;?>
						</div>
					</div>
					
					<div class="col-2">
						<div class="inner">
							<?php if( get_field('feature_video') ):?>
						
								<div class="embed-container">
								<?php //the_field('feature_video'); ?>
							
								<?php

								// get iframe HTML
								$iframe = get_field('feature_video');


								// use preg_match to find iframe src
								preg_match('/src="(.+?)"/', $iframe, $matches);
								$src = $matches[1];


								// add extra params to iframe src
								$params = array(
									'showinfo'    => 0,
									'controls'    => 0,
									'rel'    => 0,
									'fs'    => 0,
									'modestbranding'    => 1,
									'hd'        => 1,
									'autohide'    => 1
								);

								$new_src = add_query_arg($params, $src);

								$iframe = str_replace($src, $new_src, $iframe);


								// add extra attributes to iframe html
								$attributes = 'frameborder="0"';

								$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);


								// echo $iframe
								echo $iframe;

								?>
								</div>
							
							<?php elseif(get_field('banner_image') && get_field('banner_position') == "bottom-r") : ?>
									<?php if( get_field('banner_link') ):?><a href="<?php the_field('banner_link'); ?>"><?php endif;?>
									<?php $image = get_field('banner_image') ?>
									<img src="<?php echo $image['url']; ?>" width="<?php echo $image['width'] ?>" height="<?php echo $image['height'] ?>"  />
									<?php if( get_field('banner_link') ):?></a><?php endif;?>
							<?php elseif(get_field('banner_image_two') && get_field('banner_position_two') == "bottom-r") : ?>
								<?php if( get_field('banner_link_two') ):?><a href="<?php the_field('banner_link_two'); ?>"><?php endif;?>
								<?php $image = get_field('banner_image_two') ?>
								<img src="<?php echo $image['url']; ?>" width="<?php echo $image['width'] ?>" height="<?php echo $image['height'] ?>"  />
								<?php if( get_field('banner_link_two') ):?></a><?php endif;?>
							<?php endif;?>
						</div>
					</div>
					
				</div>
			</section>
			
			<?php if( have_rows('instant_outfit') ): ?>
			<section id="outfits">
				<ul class="products">
					<h2><span><?php the_field('outfit_section_title'); ?></span></h2>
					<h6 class="rfeat">NOW UP TO 40% OFF</h6>
					<?php while( have_rows('instant_outfit') ): the_row(); 
						$image = get_sub_field('image');
					?>
					<li class="product">
						<a href="<?php the_sub_field('link'); ?>">
							<img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" />
							<h3><?php the_sub_field('title'); ?></h3>
						</a>
					</li>
					<?php endwhile; ?>
				</ul>
			</section>
			<?php endif; ?>	

			<?php if($content = $post->post_content ) { ?>
			<section id="hcontent">
				<?php the_content(); ?>
			</section>
			<?php } ?>

			<?php woo_loop_before(); ?>
        	<?php woo_loop_after(); ?>
        
		</section><!-- /#main -->
    </div><!-- /#content -->
		
<?php get_footer(); ?>