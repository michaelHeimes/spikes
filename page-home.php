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
		
		<section class="banner">
<!-- 			<div class="bg"></div> -->
			
			<img class="bg-l" src="<?php echo get_template_directory_uri(); ?>/img/banner-bg-left.svg" alt="download-icon">
			
			<img class="bg-r" src="<?php echo get_template_directory_uri(); ?>/img/banner-bg-right.svg" alt="download-icon">
			
			<div class="sr-only"><?php the_title();?></div>
			
			<div class="grid-container">
								
				<div class="inner grid-x grid-padding-x">
				
					<div class="left cell small-12 large-6">
						
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
						<div class="btn-wrap grid-x grid-padding-x">
						    <div class="cell small-12 large-shrink"><a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></div>
						<?php if( $file = get_field('resource_guide_file') ): ?>
						    <div class="cell small-12 large-shrink"><a class="guide-dl" href="<?php echo $file;?>" download><?php the_field('resource_guide_link_text');?><img src="<?php echo get_template_directory_uri(); ?>/img/Download_Icon.svg" alt="download-icon"></a></div>
					<?php endif; ?>
						</div>
						<?php endif; ?>
						
					</div>
	
					<div class="right cell small-12 large-6">
						
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
							
							<div class="mask">
								
							</div>
							
							<div class="poster-frame" style="background-image: url(<?php the_field('video_poster_frame');?>)">
								
								<img src="<?php echo get_template_directory_uri(); ?>/img/play-button.svg" alt="play-button">
								
							</div>
						
						</div>
												
					</div>
				
				</div>
				
			</div>
		</section>

		<section class="s1">
						
			<div class="grid-container">
				<div class="inner grid-x grid-padding-x">
					
					<div class="left cell small-12 medium-6 large-5">
						
						<?php if($heading = get_field('s1_heading')):?>
						<h2><?php echo $heading;?></h2>
						<?php endif;?>
	
						<?php if($heading = get_field('s1_copy')):?>
						<div><?php echo $heading;?></div>
						<?php endif;?>
						
					</div>				
					
					<div class="right cell small-12 medium-6 large-auto large-offset-1">
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
				
				<div class="divider"></div>
				
			</div>
		</section>
	
	</div>
		
		<section class="s2">
			<div class="grid-container">
				
				<div class="inner grid-x grid-padding-x">
					
					<div class="left cell small-12 medium-shrink large-4">
				
						<?php if($heading = get_field('s2_heading')):?>
							<h2 class="heading-wrap"><?php echo $heading;?></h2>
						<?php endif;?>
						
						<?php 
						$link = get_field('s2_learn_more_link');
						if( $link ): 
						    $link_url = $link['url'];
						    $link_title = $link['title'];
						    $link_target = $link['target'] ? $link['target'] : '_self';
						    ?>
						    <a class="lm-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><img src="<?php echo get_template_directory_uri(); ?>/img/Arrow.svg" alt="arrow-icon"></a>
						<?php endif; ?>
					
					</div>
					
					<div class="right cell small-12 medium-12 large-8">
						
						<div class="inner">
					
							<?php if( have_rows('s2_cards') ):?>
							<div class="cards-wrap grid-x grid-padding-x small-up-2">
								<?php while ( have_rows('s2_cards') ) : the_row();?>	
							
									<?php if( have_rows('single_card') ):?>
										<?php while ( have_rows('single_card') ) : the_row();?>	
										
										<div class="single-card cell">
											
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
						
					</div>
					
				</div>
				
				<div class="divider"></div>
				
			</div>
		</section>
		
		<section class="s3">
			<img class="triangle" src="<?php echo get_template_directory_uri(); ?>/img/Triangle.svg" alt="triangle">
			<div class="grid-container">
				
				<div class="inner grid-x grid-padding-x align-bottom">
				
					<div class="left cell small-12 medium-6 large-5">
						
						<?php if($heading = get_field('s3_heading')):?>
						<h2 class="hide-for-medium"><?php echo $heading;?></h2>
						<?php endif;?>
						
						<?php if($heading = get_field('s3_heading')):?>
						<h2 class="show-for-medium"><?php echo $heading;?></h2>
						<?php endif;?>
	
						<?php if($copy = get_field('s3_copy')):?>
						<p><?php echo $copy;?></p>
						<?php endif;?>	
						
						<?php if( $file = get_field('resource_guide_file') ): ?>
						<div class="btn-wrap desktop">
						    <a class="button" href="<?php echo $file;?>" download><?php the_field('resource_guide_link_text');?><img src="<?php echo get_template_directory_uri(); ?>/img/Download_Icon-white.svg" alt="download-icon"></a>
						</div>
						<?php endif; ?>
						
					</div>
					
					<div class="right cell small-12 medium-6 large-5 large-offset-1">
						
						<?php 
						$image = get_field('s3_image');
						if( !empty( $image ) ): ?>
						    <img class="guide" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						<?php endif; ?>
						
						<?php if( $file = get_field('resource_guide_file') ): ?>
						<div class="btn-wrap mobile">
						    <a class="button" href="<?php echo $file;?>" download><?php the_field('resource_guide_link_text');?><img src="<?php echo get_template_directory_uri(); ?>/img/Download_Icon-white.svg" alt="download-icon"></a>
						</div>
						<?php endif; ?>
						
					</div>
					
				</div>
				
			</div>
		</section>
		
		<div id="contact"></div>
		
		<section class="s4">
			
			<img class="triangle-left" src="<?php echo get_template_directory_uri(); ?>/img/contact-Triangle-left.svg" alt="triangle">
			
			<img class="triangle-right" src="<?php echo get_template_directory_uri(); ?>/img/contact-Triangle-right.svg" alt="triangle">
			
			
			<div class="grid-container">
				
				<?php if($heading = get_field('form_heading')):?>
				<h2><?php echo $heading;?></h2>
				<?php endif;?>
				
				<?php if($subheading = get_field('form_sub-heading')):?>
				<h3><?php echo $subheading;?></h3>
				<?php endif;?>	
			
				<div class="form-wrap">
					<?php echo do_shortcode('[contact-form-7 id="105" title="Contact Form"]');?>
				</div>	
		
			</div>
		</section>
		
	</main><!-- #main -->

<?php
get_footer();