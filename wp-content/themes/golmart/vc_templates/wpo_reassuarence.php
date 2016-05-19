<?php


    $atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
    extract( $atts );


	$color = $color?'style="color:'. $color .';"' : "";

?>
<?php $img = wp_get_attachment_image_src($image,'full'); ?>
 <div class="services services-v2">
	<div class="services-icon">
		<?php if( isset($img[0]) ) { ?>
		 	<img src="<?php echo esc_url( $img[0] );?>" title="<?php echo esc_attr( $title ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="image-icon">
		 <?php }else if( $icon ) { ?>
		 	<i class="fa <?php echo esc_attr($icon); ?> fa-2x" <?php echo esc_html($color); ?>></i>
		 <?php } ?>
	</div>
	<h6 class="services-title"><?php echo esc_attr( $title ); ?></h6>
	<div class="services-description"><?php echo esc_attr($description); ?></div>
</div>
