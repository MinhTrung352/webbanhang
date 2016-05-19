<?php

$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );

?>

<div class="widget-text-heading <?php echo esc_attr( $el_class ); ?>">
	<?php if($title!=''): ?>
        <h3 class="widget-title visual-title <?php echo esc_attr($title_align).' '.$size; ?>" style="<?php echo 'color:'.$font_color;?>">
           <span><span><?php echo esc_attr( $title ); ?></span></span>
            <?php if(trim($descript)!=''){ ?>
                <span class="visual-description">
                    <?php echo esc_attr($descript); ?>
                </span>
            <?php } ?>
        </h3>
    <?php endif; ?>
</div>