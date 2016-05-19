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


$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );


switch ($columns_count) {
	case '6': 
		$class_column = 'col-lg-2 col-md-4 col-sm-6 col-xs-12';
		break;
	case '4':
		$class_column='col-md-3 col-sm-6';
		break;
	case '3':
		$class_column='col-md-4 col-sm-12';
		break;
	case '2':
		$class_column='col-md-6 col-sm-6';
		break;
	default:
		$class_column='col-md-12 col-sm-12';
		break;
}
$_id = wpo_makeid();
if($category=='') return;
$_count = 1;
$loop = wpo_woocommerce_query('',$number,$category);

$ocategory = get_term_by( 'slug', $category, 'product_cat' );

if ( !empty($ocategory) && !is_wp_error($ocategory) ):
	$title = $ocategory->name;
?>
<div data-item="floating-button" class="hide">
	<div class="float-button bg-<?php echo esc_attr($block_style); ?>">
		<a href="#block<?php echo esc_attr($_id); ?>"><i class="fa <?php echo esc_attr($icon); ?>"></i></a>
	</div>
</div>	
<div id="block<?php echo esc_attr($_id); ?>" class="widget widget-<?php echo esc_attr($block_style); ?> widget-prodcat-index <?php echo (($el_class!='')?' '.$el_class:''); ?>">
	
	<?php if ( $loop->have_posts() ) : ?>
	
		<div class="woocommerce">
			<div class="widget-content <?php echo esc_attr($style); ?>">

				<div class="grid-wrapper">
				
					<div class="clearfix">
						<div <?php if($category_color) echo 'style="border-color:'.$category_color.'"'; ?> class="col-md-2 col-xs-12 panel-left">
						
							<?php if($title){ ?>
								<h3 <?php if($category_color) echo 'style="color:'.$category_color.'"'; ?> class="widget-title visual-title">
							       <span><span><?php echo esc_attr( $title ); ?></span></span>
								</h3>
							<?php } ?>

							   <?php 

							   $args = array(
							       'hierarchical' => 1,
							       'show_option_none' => '',
							       'hide_empty' => 0,
							       'parent' => $ocategory->term_id,
							       'taxonomy' => 'product_cat'
							    );
								$subcats = get_categories($args);
								if( 	$subcats ){ ?> 
								<div class="panel-left-inner">
								<ul class="nobullets list-unstyled">
								<?php 
								foreach ( $subcats as $term ){
								    $category_id = $term->term_id;
								    $category_name = $term->name;
								    $category_slug = $term->slug;

								    echo '<li><a href="'. esc_url( get_term_link($term->slug, 'product_cat') ) .'" title="'.esc_attr( $category_name).'">'.$category_name.'</a></li>';
								 } ?>
								 </ul>
								 </div>
								 <?php } ?>
						
						</div>
						<div class="col-md-10 col-xs-12 panel-right no-padding">	
						<?php wc_get_template( 'widget-products/'.$style.'.php' , array( 'loop'=>$loop,'columns_count'=>$columns_count,'class_column'=>$class_column,'posts_per_page'=>$number ) ); ?>
							<?php if($image_cat){ ?>
								<div class="widget-banner hidden-xs">
							<?php echo wp_get_attachment_image( $image_cat , 'full'); ?>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
</div>
<?php endif; ?>