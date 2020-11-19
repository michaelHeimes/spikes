<?php
/**
 * Template name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spikes
 */

get_header();
?>

	<main id="primary" class="site-main">

	<div class="top-wrap">
		<div class="bg"></div>
		
		<section class="banner">
			
			
			<div class="container">
				
				<div class="sr-only"><?php the_title();?></div>
				
				<div class="inner">
				
					<div class="left half">
						
						<?php if($heading = get_field('banner_heading')):?>
						<h1><?php echo $heading;?></h1>
						<?php endif;?>
	
						<?php if($subheading = get_field('banner_sub-heading')):?>
						<h2><?php echo $subheading;?></h2>
						<?php endif;?>
						
						<?php 
						$link = get_field('banner_cta_link');
						if( $link ): 
						    $link_url = $link['url'];
						    $link_title = $link['title'];
						    $link_target = $link['target'] ? $link['target'] : '_self';
						    ?>
						<div class="btn-wrap">
						    <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php if( $file = get_field('resource_guide_file') ): ?>
						    <a class="guide-dl" href="<?php echo $file;?>" download><?php the_field('resource_guide_link_text');?></a>
					<?php endif; ?>
						</div>
						<?php endif; ?>
						
					</div>
	
					<div class="right half">
						
						<div class="video-wrap">
						
							<?php
							// Load value.
							$iframe = get_field('youtube_video');
							
							// Use preg_match to find iframe src.
							preg_match('/src="(.+?)"/', $iframe, $matches);
							$src = $matches[1];
							
							// Add extra parameters to src and replcae HTML.
							$params = array(
							    'controls'  => 0,
							    'hd'        => 1,
							    'autohide'  => 1
							);
							$new_src = add_query_arg($params, $src);
							$iframe = str_replace($src, $new_src, $iframe);
							
							// Add extra attributes to iframe HTML.
							$attributes = 'frameborder="0"';
							$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
							
							// Display customized HTML.
							echo $iframe;
							?>
							
							<div class="mask"></div>
							
							<div class="poster-frame" style="background-image: url(<?php the_field('video_poster_frame');?>)"></div>
						
						</div>
												
					</div>
				
				</div>
				
			</div>
		</section>

		<section class="s1">
						
			<div class="container">
				<div class="inner">
					
					<div class="left half">
						
						<?php if($heading = get_field('s1_heading')):?>
						<h2><?php echo $heading;?></h2>
						<?php endif;?>
	
						<?php if($heading = get_field('s1_copy')):?>
						<div><?php echo $heading;?></div>
						<?php endif;?>
						
					</div>				
					
					<div class="right half">
						<?php if( have_rows('s1_table') ):?>
							<?php while ( have_rows('s1_table') ) : the_row();?>
							
								<div class="single-row logos-wrap">
									<div></div>
									<?php 
									$image = get_sub_field('header_logo_left');
									if( !empty( $image ) ): ?>
									    <div><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></div>
									<?php endif; ?>

									<?php 
									$image = get_sub_field('header_logo_right');
									if( !empty( $image ) ): ?>
									    <div><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></div>
									<?php endif; ?>	
								</div>
							
							
							<?php if( have_rows('table_rows') ):?>
								<?php while ( have_rows('table_rows') ) : the_row();?>	
							
								<?php if( have_rows('single_row') ):?>
									<?php while ( have_rows('single_row') ) : the_row();?>	
								
									<div class="single-row">									
										<div><?php the_sub_field('left');?></div>
										<div><?php the_sub_field('middle');?></div>
										<div><?php the_sub_field('right');?></div>
									</div>
								
									<?php endwhile;?>
								<?php endif;?>
							
								<?php endwhile;?>
							<?php endif;?>
							
						
							<?php endwhile;?>
						<?php endif;?>
					</div>
					
				</div>
			</div>
		</section>
	
	</div>
		
		<section class="s2">
			<div class="container">
				
				<?php if($heading = get_field('s2_heading')):?>
					<div class="heading-wrap"><?php echo $heading;?></div>
				<?php endif;?>
				
				<?php if( have_rows('s2_cards') ):?>
				<div class="cards-wrap">
					<?php while ( have_rows('s2_cards') ) : the_row();?>	
				
						<?php if( have_rows('single_card') ):?>
							<?php while ( have_rows('single_card') ) : the_row();?>	
							
							<div class="single-card">
								
								<?php 
								$image = get_sub_field('icon');
								if( !empty( $image ) ): ?>
								    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								<?php endif; ?>

								<div class="text-wrap">
									<?php if($heading = get_sub_field('heading')):?>
									<h3><?php echo $heading;?></h3>
									<?php endif;?>
	
									<?php if($copy = get_sub_field('copy')):?>
									<p><?php echo $copy;?></p>
									<?php endif;?>		
								</div>						
								
							</div>
											
							<?php endwhile;?>
						<?php endif;?>

					<?php endwhile;?>
				</div>
				<?php endif;?>
				
			</div>
		</section>
		
		<section class="s3">
			<div class="bg"></div>
			<div class="container">
				
				<div class="inner">
				
					<div class="left half">
						
						<?php if($heading = get_field('s3_heading')):?>
						<h2 class="mobile"><?php echo $heading;?></h2>
						<?php endif;?>
						
						<?php 
						$image = get_field('s3_image');
						if( !empty( $image ) ): ?>
						    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						<?php endif; ?>
					</div>
					
					<div class="right half">
						
						<?php if($heading = get_field('s3_heading')):?>
						<h2 class="desktop"><?php echo $heading;?></h2>
						<?php endif;?>
	
						<?php if($copy = get_field('s3_copy')):?>
						<p><?php echo $copy;?></p>
						<?php endif;?>	
						
						<?php if( $file = get_field('resource_guide_file') ): ?>
						<div class="btn-wrap">
						    <a class="button" href="<?php echo $file;?>" download><?php the_field('resource_guide_link_text');?></a>
						</div>
						<?php endif; ?>
						
					</div>
					
				</div>
				
			</div>
		</section>
		
		<section id="contact" class="s4">
			<div class="container">
				
				<?php if($heading = get_field('form_heading')):?>
				<h2><?php echo $heading;?></h2>
				<?php endif;?>
				
				<div class="form-wrap">
					
					<?php if($subheading = get_field('form_sub-heading')):?>
					<h3><?php echo $subheading;?></h3>
					<?php endif;?>	

					<?php echo do_shortcode('[contact-form-7 id="105" title="Contact Form"]');?>
				
				</div>	
		
			</div>
		</section>
		
	</main><!-- #main -->

<?php
get_footer();