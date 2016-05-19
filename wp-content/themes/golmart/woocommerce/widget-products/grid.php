<?php $_count = 1;$_delay = 150; $_total = $loop->post_count;?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
	<?php
        $class_fix = ' shopcol';
        $res2n = '';
        // Store loop count we're currently on
        if ( 1 == ( $_count ) % $columns_count || 1 == $columns_count )
            $class_fix .= ' first';
        if ( 0 == $_count % $columns_count )
            $class_fix .= ' last';
        if(($_count -1) % 2 == 0) 
			$res2n=' nresponsive';
    ?>
    <?php if( $_count%$columns_count == 1 ) echo '<div class="clearfix rows-products">'; ?>
	<div class="<?php echo esc_attr($class_column.$class_fix.$res2n); ?> wow fadeInUp product-wrapper" data-wow-duration="0.6s" data-wow-delay="<?php echo esc_attr( $_delay ); ?>ms">
		<?php wc_get_template_part( 'content', 'product-inner' ); ?>
	</div>
	<?php if( ($_count%$columns_count==0 && $_count!=1) || $_count== $posts_per_page || $_count==$_total ) echo '</div>'; ?>
	<?php $_count++;$_delay+=200; ?>
	<?php
		if($_count==$columns_count){
			$_delay=150;
		}
	?>
<?php endwhile; ?>


<?php wp_reset_postdata(); ?>