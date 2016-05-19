<?php

$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );

	$color = $color?'style="color:'. $text_color .';"' : "";
	wp_enqueue_script( 'counter_js', WPO_THEME_URI.'/js/jquery.counterup.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'waypoints_js', WPO_THEME_URI.'/js/waypoints.min.js', array( 'jquery' ) );

?>
<?php $img = wp_get_attachment_image_src($image,'full'); ?>
 <div class="counters <?php  echo esc_attr($el_class); ?>">
   <div class="counter-wrap <?php echo esc_attr($color); ?>">
		<?php if( isset($img[0]) ) { ?>
			<img src="<?php echo esc_url_raw($img[0]);?>" title="<?php echo esc_attr($title); ?>" class="image-icon">
		<?php }else if( $icon ) { ?>
		 	<i class="fa <?php echo esc_attr($icon); ?>"></i>
		<?php } ?>
		<span class="clearfix"></span>
	   <span class="counter counterUp"><?php echo (int)$number ?></span>
   </div> 
    <h5><?php echo trim($title); ?></h5>
</div>
