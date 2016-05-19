<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     Opal  Team <opalwordpressl@gmail.com >
 * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */

$sliders = new WP_Query(array(
				'post_type'=>'sliders',
				'posts_per_page'=>4,
				'tax_query'=>array(
						'taxonomy'=>'nivo-slider'
					)
				));
if( $sliders->have_posts() ):
?>
<div id="wpo-carousel" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
	<?php
		// Loop
		$count=0;
		while($sliders->have_posts()): $sliders->the_post();
	?>
		<div class="item <?php echo ($count==0)?"active":""; ?>">
			<?php the_post_thumbnail( ); ?>
			<div class="carousel-caption">
				<h3><?php the_title(); ?></h3>
				<?php the_content(); ?>
			</div>
		</div>
		<?php $count++; ?>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>

	<ol class="carousel-indicators">
		<?php for($i=0;$i<$count;$i++){ ?>
		<li data-target="#wpo-carousel" data-slide-to="<?php echo trim( $i ); ?>" class="<?php echo ($i==0)?"active":""; ?>"></li>
		<?php } ?>
	</ol>

	<div class="carousel-controls carousel-controls-v1">
		<a class="left carousel-control carousel-xs" href="#post-slide-<?php the_ID(); ?>" data-slide="prev">
			<i class="fa fa-arrow-left"></i>
		</a>
		<a class="right carousel-control carousel-xs" href="#post-slide-<?php the_ID(); ?>" data-slide="next">
			<i class="fa fa-arrow-right"></i>
		</a>
	</div>	
</div>
<?php endif; ?>