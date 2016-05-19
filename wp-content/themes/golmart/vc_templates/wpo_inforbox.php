<?php
$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );

 $style = array();
 if ( strlen( $content ) > 0 ) {
	$atts['text'] = $content;
}

?>

<?php $img = wp_get_attachment_image_src($imagebg,'full'); ?>
<?php

	if( $colorbg ){
		$style[] = "background-color:".$colorbg;
	}
?>

<div class="widget widget-vc nopadding">
	<div class="wpo-inforbox-v1 wpo-inforbox <?php echo esc_attr($el_class);?> clearfix"  style="<?php echo  implode(';', $style); ?>">
		<div class="inforbox-image">
			<?php if(isset($img[0]) && $img[0]) { ?>
				<img src="<?php echo esc_url_raw($img[0]); ?>" alt=""/>
			<?php } ?>	
		</div>
		<div class="inforbox-left inforbox-inner ">
			<?php if($title!=''): ?>
		    	<h3 class="widget-title inforbox-heading <?php echo esc_attr($title_align).' '.$size; ?>">
					<?php echo trim($title); ?>
				</h3>
		    <?php endif; ?>
		    <?php if( $content ){ ?>
		    <div class="information">
		    	<?php echo trim($content); ?>
		    </div>
		    <?php } ?>
		</div>		
	</div>	
</div>