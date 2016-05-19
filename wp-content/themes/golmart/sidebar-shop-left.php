<?php 
global $wpopconfig;
?> 
<?php if($wpopconfig['left-sidebar']['show']){ ?>
	<div class="<?php echo esc_attr($wpopconfig['left-sidebar']['class']); ?>">
	<?php if( isset($wpopconfig['left-sidebar']) && is_active_sidebar( $wpopconfig['left-sidebar']['widget']) ): ?>
		<div class="wpo-sidebar wpo-sidebar-left">
			<div class="sidebar-inner">
				<?php dynamic_sidebar( $wpopconfig['left-sidebar']['widget'] ); ?>
			</div>
		</div>
	<?php endif; ?>
	</div>
<?php } ?>
 