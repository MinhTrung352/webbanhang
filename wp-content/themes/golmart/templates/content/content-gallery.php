<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */
?>

<?php
 
	$_imgs = wpo_gallieries();
	$galleries = array();
	foreach( $_imgs as $val){
		if( $val ) $galleries[] = $val;
	}
?>
	<?php if(count($galleries) > 1) { ?>
			<div id="post-slide-<?php the_ID(); ?>" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<?php foreach ($galleries as $key => $_img) {
						echo '<div class="item '.(($key==0)?'active':'').'">';
							echo '<img src="'.$_img.'" alt="">';
						echo '</div>';
					} ?>
				</div>
				<div class="carousel-controls carousel-controls-v1">
					<a class="left carousel-control carousel-xs" href="#post-slide-<?php the_ID(); ?>" data-slide="prev">
						<i class="fa fa-arrow-left"></i>
					</a>
					<a class="right carousel-control carousel-xs" href="#post-slide-<?php the_ID(); ?>" data-slide="next">
						<i class="fa fa-arrow-right"></i>
					</a>
				</div>	
			</div>
		<?php } elseif (count($galleries) == 1){ ?>
					<?php foreach ($galleries as $key => $_img) {
						echo '<div class="item '.(($key==0)?'active':'').'">';
							echo '<img src="'.$_img.'" alt="">';
						echo '</div>';
					} ?>
		<?php }