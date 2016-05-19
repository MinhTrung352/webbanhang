<?php
$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );

$img = wp_get_attachment_image_src($photo,'full');
$style = $style ? 'feature-box-'.esc_attr( $style ):""; 
?>
<div class="feature-box <?php echo esc_attr($style); ?> <?php echo esc_attr($background); ?> <?php echo esc_attr($el_class) ?> space-20">
	<?php if(isset($img[0]) && $img[0]){?>
	<div class="fbox-image">
		<img src="<?php echo esc_url_raw($img[0]);?>" alt="<?php echo esc_attr($title); ?>" />
	</div>
	<?php } ?>
	<?php else if($icon){ ?>
    <div class="fbox-icon">
        <i class="icons fa <?php echo esc_attr($icon); ?>"></i>
    </div>
    <?php } ?>
      <div class="fbox-content">  
         <div class="fbox-body <?php echo esc_attr($title_align); ?>">                            
            <h4><?php echo trim($title); ?></h4> 
            <?php if( $subtitle ) { ?>
            <small><?php echo esc_html($subtitle); ?></small>  
            <?php } ?>                       
         </div>
         <?php if( !empty( $description) ){ ?>
           <p class="description"><?php echo trim( $description );?></p>  
         <?php } ?>
      </div>      
</div>

