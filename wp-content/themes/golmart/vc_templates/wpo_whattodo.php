<?php

    $atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
    extract( $atts );
?>

<?php $img = wp_get_attachment_image_src($imagebg,'full'); ?>

<div class="wpo-whattodo<?php echo esc_attr($el_class).' '.$style; ?>" >

	<?php 	if( isset($img[0]) )  {  ?>
	<div class="whattodo-image">
	 	<img src="<?php echo esc_url( $img[0] ); ?>" title="<?php echo esc_attr( $title ); ?>"\>
	 	<?php if( $colorbg ){ ?>
	 		<div class="overlay"  style="background-color:<?php echo esc_attr($colorbg); ?>"></div>
	 	<?php } ?>
	</div>
	<?php } ?>

	<?php
	if($title!=''){ ?>
		<h3 class="widget-title visual-title whattodo-heading">
	       <span><span><?php echo esc_attr( $title ); ?></span></span>
		</h3>
	<?php }
	?>

	<?php
	if($information!=''){ ?>
		<div class="whattodo-content widget-content">
			<?php echo do_shortcode( $information );?>
		</div>
	<?php }
	?>

</div>