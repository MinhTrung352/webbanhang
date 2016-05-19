<?php  
global $wpopconfig;
?>

<?php if($wpopconfig['right-sidebar']['show']){ ?>
	<div class="<?php echo esc_attr($wpopconfig['right-sidebar']['class']); ?>">
	<?php if( isset($wpopconfig['right-sidebar']) && is_active_sidebar( $wpopconfig['right-sidebar']['widget']) ): ?>
		<div class="wpo-sidebar wpo-sidebar-right">
			<div class="sidebar-inner">
				<?php dynamic_sidebar( $wpopconfig['right-sidebar']['widget'] ); ?>
			</div>
		</div>
	<?php endif; ?>
	</div>
<?php } ?>
