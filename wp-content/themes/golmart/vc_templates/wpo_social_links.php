<?php

extract(shortcode_atts(array(
    'title' => '',
    'show_facebook' => true,
    'link_facebook' => 'https://www.facebook.com/opalwordpress',
    'show_twitter' => true,
    'link_twitter' => 'https://twitter.com/opalwordpress',
    'show_youtube' => true,
    'link_youtube' => 'https://www.youtube.com/user/WPOpalTheme',
    'show_pinterest' => false,
    'link_pinterest' => 'https://www.pinterest.com/opalwordpress/',
    'show_google_plus' => true,
    'link_google_plus' => 'https://plus.google.com/+WPOpal',
    'show_linkedIn' => false,
    'link_linkedIn' => 'https://www.linkedin.com/pub/opal-wordpress/67/a25/565',
    'style' => 'style-v1',
    'el_class' => ''
), $atts));

?>
<?php if($show_facebook || $show_google_plus || $show_youtube || $show_pinterest || $show_linkedIn || $show_twitter ): ?>
<div class="<?php echo esc_attr($el_class); ?>">
	
	<!-- Style v1-->
	<?php if( $style =='style-v1') : ?>
		<?php if( !empty( $title)): ?>
			<h3 class="title-social widget-title style-v1 ">
				<?php echo esc_attr($title);?>
			</h3>
		<?php endif; ?>
		<ul class="social list-unstyled style-v1 ">
		<?php if($show_facebook): ?>
			<li>
				<a class="facebook-social" href="<?php echo esc_url($link_facebook);?>"  target="_blank" >
					<i class="fa fa-facebook"></i>
				</a>
			</li>
		<?php endif; ?>	
		<?php if($show_twitter): ?>
			<li>
				<a class="twitter-social" href="<?php echo esc_url($link_twitter);?>"  target="_blank">
					<i class="fa fa-twitter"></i>
				</a>
			</li>
		<?php endif; ?>		
		<?php if($show_google_plus): ?>
			<li>
				<a href="<?php echo esc_url($link_google_plus);?>"  target="_blank">
					<i class="fa fa-google-plus"></i>
				</a>
			</li>
		<?php endif; ?>	
		<?php if($show_youtube): ?>
			<li>
				<a href="<?php echo esc_url($link_youtube);?>"  target="_blank">
					<i class="fa fa-youtube"></i>
				</a>
			</li>
		<?php endif; ?>	
		<?php if($show_pinterest): ?>
			<li>
				<a href="<?php echo esc_url($link_pinterest);?>"  target="_blank" >
					<i class="fa fa-pinterest"></i>
				</a>
			</li>
		<?php endif; ?>	
			<?php if($show_linkedIn): ?>
				<li><a href="<?php echo esc_url($link_linkedIn);?>"  target="_blank">
						<i class="fa fa-linkedin"></i>
					</a>
				</li>
			<?php endif; ?>	
		</ul>
	
	<!-- Style v2-->
	<?php else: ?>
		<div class="pull-right">
			
		<?php if( !empty( $title)): ?>
			<h3 class="title-social widget-title style-v2 pull-left">
				<?php echo esc_attr($title);?>
			</h3>
		<?php endif; ?>

		<ul class="social list-unstyled style-v2 pull-left">
		<?php if($show_facebook): ?>
			<li>
				<a class="facebook-social" href="<?php echo esc_url($link_facebook);?>"  target="_blank" >
					<i class="fa fa-facebook"></i>
				</a>
			</li>
		<?php endif; ?>	
		<?php if($show_twitter): ?>
			<li>
				<a class="twitter-social" href="<?php echo esc_url($link_twitter);?>"  target="_blank">
					<i class="fa fa-twitter"></i>
				</a>
			</li>
		<?php endif; ?>		
		<?php if($show_google_plus): ?>
			<li>
				<a href="<?php echo esc_url($link_google_plus);?>"  target="_blank">
					<i class="fa fa-google-plus"></i>
				</a>
			</li>
		<?php endif; ?>	
		<?php if($show_youtube): ?>
			<li>
				<a href="<?php echo esc_url($link_youtube);?>"  target="_blank">
					<i class="fa fa-youtube"></i>
				</a>
			</li>
		<?php endif; ?>	
		<?php if($show_pinterest): ?>
			<li>
				<a href="<?php echo esc_url($link_pinterest);?>"  target="_blank" >
					<i class="fa fa-pinterest"></i>
				</a>
			</li>
		<?php endif; ?>	
		<?php if($show_linkedIn): ?>
			<li>
				<a href="<?php echo esc_url($link_linkedIn);?>"  target="_blank">
					<i class="fa fa-linkedin"></i>
				</a>
			</li>
		<?php endif; ?>	
		</ul>
		</div>
	<?php endif;?>
</div>
<?php endif; ?>