<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2015 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */

$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );
 

$_id = wpo_makeid();
if($category=='') return;

$ocategory = get_term_by( 'slug', $term_id, 'product_cat' );
 

?>
<?php if ( !empty($ocategory) && !is_wp_error($ocategory) ){ ?>
<div class="widget-<?php echo esc_attr($block_style); ?> widget-products">
	<?php if($ocategory->name!=''){ ?>
	 <div class="widget-heading clearfix">
	 	<div class="clearfix widget-heading">
			<h3 class="widget-title pull-left">
		       <span><?php echo trim($ocategory->name); ?></span>
			</h3>	
			  <?php 

					  $args = array(
					       'hierarchical' => 1,
					       'show_option_none' => '',
					       'hide_empty' => 0,
					       'parent' => $ocategory->term_id,
					       'taxonomy' => 'product_cat'
					    );
						$subcats = get_categories($args);


						if( $subcats ){ ?> 
						
						<div class="pull-right"><ul class="list-inline bullets">
						<?php 
						foreach ( $subcats as $term ){
						    $category_id = $term->term_id;
						    $category_name = $term->name;
						    $category_slug = $term->slug;

						    echo '<li><a href="'. esc_url( get_term_link($term->slug, 'product_cat') ) .'" title="'.esc_attr( $category_name).'">'.trim( $category_name ).'</a></li>';
						 } ?>
						 </ul>
							</div> <?php } ?>
					
			
		</div>	
	</div>	
	<?php }
	?>

	<div class="widget-content<?php echo esc_attr($style); ?>">
		 	<div class="row">
		 		<?php if( !empty($image_cat) ) { ?>
		 		<?php $img = wp_get_attachment_image_src($image_cat,'full'); ?>
		 		<div class="col-sm-3 <?php echo esc_attr( $image_float );?>">
		 			<img src="<?php echo esc_url_raw($img[0]); ?>" title="<?php echo esc_attr($ocategory->name); ?>">
		 		</div>
		 		<?php } ?>
		 		<div class="col-sm-<?php echo empty($image_cat)?12:9;?>">
				    <div class="panel-wrapper clearfix">
					    <div class="panel-products panel-left w-70 pull-left">
							<div class="widget widget-primary">

								<div class="widget-title">
									<span><?php echo __( 'Best Seller', TEXTDOMAIN); ?></span>
								</div>
								<div class="widget-content"><div class="grid-wrapper">
									 <?php 
									 $loop = wpo_woocommerce_query( 'best_selling', $per_page , $category );
									 if ( $loop->have_posts() ) : ?>
											 
											<div id="carousel-<?php echo esc_attr($_id); ?>" class="text-center owl-carousel-play" data-ride="owlcarousel">
												<div class="owl-carousel rows-products" data-slide="<?php echo esc_attr($columns_count); ?>" data-pagination="false" data-navigation="true">
													 <?php $_count=0; while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
													 		<div class="product-wrapper"><?php wc_get_template_part( 'content', 'product-inner' ); ?></div>
													 <?php  $_count++ ; endwhile; ?>
												</div>
												<?php if( $per_page  < $_count) { ?>
												<a class="left carousel-control carousel-xs radius-x" href="#post-slide-<?php the_ID(); ?>" data-slide="prev">
														<span class="fa fa-angle-left"></span>
												</a>
												<a class="right carousel-control carousel-xs radius-x" href="#post-slide-<?php the_ID(); ?>" data-slide="next">
														<span class="fa fa-angle-right"></span>
												</a>
											 <?php } ?>
											</div>			
										 
									<?php endif; ?>
									<?php wp_reset_postdata(); ?>
								</div></div>
							</div>					    	
					    
					    </div>	

					    <div class="panel-products panel-right w-30 pull-right">
					    	<div class="widget widget-danger">
						    	<div class="widget-title panel-heading" >
						    		<span><?php echo __( 'New Arrivals', TEXTDOMAIN); ?></span>
						    	</div>
						    	<div class="widget-content">
						    		<?php 
							    		$loop = wpo_woocommerce_query( 'newarrivals', $per_page , $category );
							    		wc_get_template( 'widget-products/list.php' , array( 'loop'=>$loop,'columns_count'=>1 ,'posts_per_page'=>$per_page ) ); 
							    	?>
						    	</div>
						    </div>	
					    </div>	
					</div>    
		 		</div>
		 	</div>		
	</div>
</div>
<?php } ?>