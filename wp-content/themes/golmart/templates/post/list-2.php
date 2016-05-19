<?php
/**
 * $loop
 * $class_column
 *
 */

$_count =1;
$colums = '3';
$bscol = 12;
$layout = ($layout) ? $layout : 'no_style';
?>

<div class="posts-list list-no-image">
<?php
    $i = 0;
    while($loop->have_posts()){
    $loop->the_post();
?>
    <?php wpo_get_template('post/_single'.'.php',array( 'layout' => $layout, 'grid_thumb_size'=>$grid_thumb_size)) ; ?>
<?php  } ?>
</div>