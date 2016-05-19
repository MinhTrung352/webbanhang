<?php
/**
 * $loop
 * $class_column
 *
 */

$_count =0;

$colums = $grid_columns;
$bscol = floor( 12/$colums );

?>
<?php
	$i = 0;
	while($loop->have_posts()){
	$loop->the_post();
 ?>
 		<?php if(  $i++%$colums==0 ) {  ?>
 		<div class="posts-grid"><div class="clearfix">
 		<?php } ?>
	 	<div class="col-sm-<?php echo esc_attr( $bscol ); ?>">
		    <?php wpo_get_template( 'post/_single.php', array('grid_thumb_size'=>$grid_thumb_size) ) ?>
		</div>
		<?php if(  ($i%$colums==0) || $i == $loop->post_count) {  ?>
		</div></div>
		<?php } ?>
<?php  } ?>