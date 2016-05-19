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

if ( !empty($ocategory) && !is_wp_error($ocategory) ){ ?>
 <div class="widget-heading clearfix">
	<h3 class="widget-title visual-title pull-left">
       <span><?php echo trim($ocategory->name); ?></span>
	</h3>	
	<div class="pull-right">
		
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
			<ul class="list-inline bullets">
			<?php 
			foreach ( $subcats as $term ){
			    $category_id = $term->term_id;
			    $category_name = $term->name;
			    $category_slug = $term->slug;

			    echo '<li><a href="'. esc_url( get_term_link($term->slug, 'product_cat') ) .'" title="'.esc_attr( $category_name).'">'.trim( $category_name ).'</a></li>';
			 } ?>
			 </ul>
			 <?php } ?>
		
	</div>
</div>	
<?php }
?>

<div class="widget-content <?php echo esc_attr($style); ?> widget-<?php echo esc_attr($block_style); ?> woo-ajax-load-prods">
	 		
		<?php if( !empty($image_cat) ) { ?>
 		<?php $img = wp_get_attachment_image_src($image_cat,'full'); ?>
 		<div class="clearfix">
 			<img src="<?php echo esc_url_raw($img[0]); ?>" title="<?php echo esc_attr($ocategory->name); ?>">
 		</div>
 		<?php } ?>
		<div class="tab-v8">
		  <div class="nav-inner">
		    <ul role="tablist" class="nav nav-tabs">
		      <li class="active" data-action="wooloadproducts" data-slug="<?php echo esc_attr( $category );?>" data-type="best_selling" data-show="<?php echo esc_attr($columns_count); ?>" data-limit="<?php echo esc_attr($number); ?>" data-href="#tab-<?php echo esc_attr($_id);?>1">
		        <a  aria-expanded="false" data-toggle="tab" role="tab" href="#tab-<?php echo esc_attr($_id);?>1" ><i class="fa fa-star"></i><?php echo __( 'Best Seller', TEXTDOMAIN); ?></a>
		      </li>
		      <li  data-action="wooloadproducts" data-slug="<?php echo esc_attr( $category );?>" data-type="newarrivals" data-show="<?php echo esc_attr($columns_count); ?>" data-limit="<?php echo esc_attr($number); ?>" data-href="#tab-<?php echo esc_attr($_id);?>2">
		        <a aria-expanded="true" data-toggle="tab" role="tab" href="#tab-<?php echo esc_attr($_id);?>2" ><i class="fa fa-star"></i> <?php echo __( 'New Arrivals', TEXTDOMAIN); ?></a>
		      </li>
		
		    </ul>
		  </div>
		  <div class="tab-content">
		    <div id="tab-<?php echo esc_attr($_id);?>1" class="tab-pane active">
		    </div>
		    <div id="tab-<?php echo esc_attr($_id);?>2" class="tab-pane">
		    </div>
		  </div>
		</div>
</div>