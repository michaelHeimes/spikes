<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Spikes
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container">
			
			<div class="inner">
	
				<div class="half left">
					
				<?php 
				$link = get_field('footer_logo_link');
				if( $link ): 
				    $link_url = $link['url'];
				    $link_title = $link['title'];
				    $link_target = $link['target'] ? $link['target'] : '_self';
				    ?>
				    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
					    
					<?php 
					$image = get_field('footer_logo');
					if( !empty( $image ) ): ?>
					    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php endif; ?>
					    
				    </a>
				<?php endif; ?>
					
					<p><?php the_field('footer_copyright_text');?></p>
					
				</div>
	
				<div class="half right">
					
					<div class="top">
						Powered by 
						<?php 
						$image = get_field('footer_powered_by_logo');
						if( !empty( $image ) ): ?>
						    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						<?php endif; ?>
					</div>
	
					<div class="bottom">
						<?php the_field('footer_powered_by_copy');?>
					</div>
					
				</div>
				
			</div>
	
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
