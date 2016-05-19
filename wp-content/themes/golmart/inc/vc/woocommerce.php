<?php
	
		$order_by_values = array(
			'',
			__( 'Date', 'js_composer' ) => 'date',
			__( 'ID', 'js_composer' ) => 'ID',
			__( 'Author', 'js_composer' ) => 'author',
			__( 'Title', 'js_composer' ) => 'title',
			__( 'Modified', 'js_composer' ) => 'modified',
			__( 'Random', 'js_composer' ) => 'rand',
			__( 'Comment count', 'js_composer' ) => 'comment_count',
			__( 'Menu order', 'js_composer' ) => 'menu_order',
		);

		$order_way_values = array(
			'',
			__( 'Descending', 'js_composer' ) => 'DESC',
			__( 'Ascending', 'js_composer' ) => 'ASC',
		);
		
	
	
	


	$product_categories_dropdown = array();
	$block_styles = array();

	if( is_admin() ){
		function wpo_getcategorychilds( $parent_id, $pos, $array, $level, &$dropdown ) {

			for ( $i = $pos; $i < count( $array ); $i ++ ) {
				if ( $array[ $i ]->category_parent == $parent_id ) {
					$data = array(
						str_repeat( "- ", $level ) . $array[ $i ]->name => $array[ $i ]->slug,
					);
					$dropdown = array_merge( $dropdown, $data );
					wpo_getcategorychilds( $array[ $i ]->term_id, $i, $array, $level + 1, $dropdown );
				}
			}
		}
		$args = array(
			'type' => 'post',
			'child_of' => 0,
			'parent' => '',
			'orderby' => 'name',
			'order' => 'ASC',
			'hide_empty' => false,
			'hierarchical' => 1,
			'exclude' => '',
			'include' => '',
			'number' => '',
			'taxonomy' => 'product_cat',
			'pad_counts' => false,

		);
		$categories = get_categories( $args );
		wpo_getcategorychilds( 0, 0, $categories, 0, $product_categories_dropdown );
		$block_styles = wpo_get_widget_block_styles();

	}
			
	$product_columns_deal = array(1, 2, 3, 4);
    vc_map( array(
        "name" => __("WPO Product Deals",TEXTDOMAIN),
        "base" => "wpo_product_deals",
        "class" => "",
     "category" => __('Opal Woocommerce',TEXTDOMAIN),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __('Title',TEXTDOMAIN),
                "param_name" => "title"
            ),
            array(
                "type" => "textfield",
                "heading" => __("Extra class name", TEXTDOMAIN),
                "param_name" => "el_class",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", TEXTDOMAIN)
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Columns count",TEXTDOMAIN),
                "param_name" => "columns_count",
                "value" => $product_columns_deal,
                "std" => 1,
                "description" => __("Select columns count.",TEXTDOMAIN)
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Layout",TEXTDOMAIN),
                "param_name" => "layout",
                "value" => array(__('Carousel', TEXTDOMAIN) => 'carousel', __('Grid', TEXTDOMAIN) =>'grid' ),
                "std" => 'carousel',
                "description" => __("Select columns count.",TEXTDOMAIN)
            )
        )
    ));
    add_shortcode( 'wpo_product_deals', ('wpo_vc_shortcode_render') );

	/**
	 * wpo_productcategory
	 */
 

	$product_layout = array('Grid'=>'grid','List'=>'list','Carousel'=>'carousel', 'Special'=>'special');
	$product_type = array('Best Selling'=>'best_selling','Featured Products'=>'featured_product','Top Rate'=>'top_rate','Recent Products'=>'recent_product','On Sale'=>'on_sale','Recent Review' => 'recent_review' );
	$product_columns = array(6,4, 3, 2, 1);
	$show_tab = array(
	                array('recent', __('Latest Products', TEXTDOMAIN)),
	                array( 'featured_product', __('Featured Products', TEXTDOMAIN )),
	                array('best_selling', __('BestSeller Products', TEXTDOMAIN )),
	                array('top_rate', __('TopRated Products', TEXTDOMAIN )),
	                array('on_sale', __('Special Products', TEXTDOMAIN ))
	            );

	vc_map( array(
	    "name" => __("WPO Product Category",TEXTDOMAIN),
	    "base" => "wpo_productcategory",
	    "class" => "",
	 "category" => __('Opal Woocommerce',TEXTDOMAIN),
	     'description'=> __( 'Show Products In Carousel, Grid, List, Special',TEXTDOMAIN ), 
	    "params" => array(
	    	array(
				"type" => "textfield",
				"class" => "",
				"heading" => __('Title', TEXTDOMAIN),
				"param_name" => "title",
				"value" =>''
			),
	    	array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __('Category', TEXTDOMAIN),
				"param_name" => "category",
				"value" => $product_categories_dropdown,
			),
			array(
				"type" => "dropdown",
				"heading" => __("Style",TEXTDOMAIN),
				"param_name" => "style",
				"value" => $product_layout,
				'std' => 'grid'
			),
			array(
				"type"        => "attach_image",
				"description" => __("Upload an image for categories", TEXTDOMAIN),
				"param_name"  => "image_cat",
				"value"       => '',
				'heading'     => __('Image', TEXTDOMAIN )
			),
			array(
				"type" => "textfield",
				"heading" => __("Number of products to show",TEXTDOMAIN),
				"param_name" => "number",
				"value" => '4'
			),
			array(
				"type" => "dropdown",
				"heading" => __("Columns count",TEXTDOMAIN),
				"param_name" => "columns_count",
				"value" => array(6, 5, 4, 3, 2, 1),
				"std" => 4,
				"description" => __("Select columns count.",TEXTDOMAIN)
			),
			array(
				"type" => "textfield",
				"heading" => __("Icon",TEXTDOMAIN),
				"param_name" => "icon"
			),
			array(
				"type" => "dropdown",
				"heading" => __("Block Styles",TEXTDOMAIN),
				"param_name" => "block_style",
				"value" => $block_styles,
				"std" => 'default',
				"description" => __("Select style.",TEXTDOMAIN)
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name",TEXTDOMAIN),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",TEXTDOMAIN)
			)
	   	)
	));
	add_shortcode( 'wpo_productcategory', ('wpo_vc_shortcode_render') );

	vc_map( array(
	    "name" => __("WPO Products Category Index",TEXTDOMAIN),
	    "base" => "wpo_productcategory_index",
	    "class" => "",
		 "category" => __('Opal Woocommerce',TEXTDOMAIN),
	     'description'=> __( 'Show Products In Carousel, Grid, List, Special',TEXTDOMAIN ), 
	    "params" => array(
	    	array(
				"type" => "textfield",
				"class" => "",
				"heading" => __('Title', TEXTDOMAIN),
				"param_name" => "title",
				"value" =>''
			),
			array(
			    'type' => 'colorpicker',
			    'heading' => __( 'Category Color', TEXTDOMAIN ),
			    'param_name' => 'category_color',
			    'description' => __( 'Select Title color', TEXTDOMAIN )
			),
	    	array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __('Category', TEXTDOMAIN),
				"param_name" => "category",
				"value" => $product_categories_dropdown,
				"admin_label" => true
			),
			array(
				"type" => "dropdown",
				"heading" => __("Style",TEXTDOMAIN),
				"param_name" => "style",
				"value" => $product_layout
			),
			array(
				"type"        => "attach_image",
				"description" => __("Upload an image for categories", TEXTDOMAIN),
				"param_name"  => "image_cat",
				"value"       => '',
				'heading'     => __('Image', TEXTDOMAIN )
			),
			array(
				"type" => "textfield",
				"heading" => __("Number of products to show",TEXTDOMAIN),
				"param_name" => "number",
				"value" => '4'
			),
			array(
				"type" => "dropdown",
				"heading" => __("Columns count",TEXTDOMAIN),
				"param_name" => "columns_count",
				"value" => array(6, 5, 4, 3, 2, 1),
				"admin_label" => true,
				"description" => __("Select columns count.",TEXTDOMAIN)
			),
			array(
				"type" => "dropdown",
				"heading" => __("Block Styles",TEXTDOMAIN),
				"param_name" => "block_style",
				"value" => $block_styles,
				"admin_label" => true,
				"description" => __("Select columns count.",TEXTDOMAIN)
			),
			array(
				"type" => "textfield",
				"heading" => __("Icon",TEXTDOMAIN),
				"param_name" => "icon",
				'value'	=> 'fa-gear'
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name",TEXTDOMAIN),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",TEXTDOMAIN)
			)
	   	)
	));
	add_shortcode( 'wpo_productcategory_index', ('wpo_vc_shortcode_render') );


	/**
	* wpo_category_filter
	*/
 
	vc_map( array(
			"name"     => __("WPO Product Categories Filter",TEXTDOMAIN),
			"base"     => "wpo_category_filter",
			'description' => __( 'Show images and links of sub categories in block',TEXTDOMAIN ),
			"class"    => "",
			"category" => __('Opal Woocommerce',TEXTDOMAIN),
			"params"   => array(

			array(
				"type" => "dropdown",
				"heading" => __('Category', TEXTDOMAIN),
				"param_name" => "term_id",
				"value" =>$product_categories_dropdown,
			),

			array(
				"type"        => "attach_image",
				"description" => __("Upload an image for categories (190px x 190px)", TEXTDOMAIN),
				"param_name"  => "image_cat",
				"value"       => '',
				'heading'     => __('Image', TEXTDOMAIN )
			),

			array(
				"type"       => "textfield",
				"heading"    => __("Number of categories to show",TEXTDOMAIN),
				"param_name" => "number",
				"value"      => '5'
			),

			array(
				"type"        => "textfield",
				"heading"     => __("Extra class name",TEXTDOMAIN),
				"param_name"  => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",TEXTDOMAIN)
			)
	   	)
	));
	//add_shortcode( 'wpo_category_filter', ('wpo_vc_shortcode_render')  );



	/**
	 * wpo_products
	 */
	vc_map( array(
	    "name" => __("WPO Products",TEXTDOMAIN),
	    "base" => "wpo_products",
	    'description'=> __( 'Show products as bestseller, featured in block', TEXTDOMAIN),
	    "class" => "",
	   "category" => __('Opal Woocommerce',TEXTDOMAIN),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title",TEXTDOMAIN),
				"param_name" => "title",
				"admin_label" => true,
				"value" => ''
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', TEXTDOMAIN ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', TEXTDOMAIN ) => 'font-size-lg',
					__( 'Medium', TEXTDOMAIN ) => 'font-size-md',
					__( 'Small', TEXTDOMAIN ) => 'font-size-sm',
					__( 'Extra small', TEXTDOMAIN ) => 'font-size-xs'
				)
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Title Alignment', TEXTDOMAIN ),
				'param_name' => 'title_align',
				'value' => array(
					__( 'Align left', TEXTDOMAIN ) => 'separator_align_left',
					__( 'Align center', TEXTDOMAIN ) => 'separator_align_center',
					__( 'Align right', TEXTDOMAIN ) => 'separator_align_right'
				)
			),
	    	array(
				"type" => "dropdown",
				"heading" => __("Type",TEXTDOMAIN),
				"param_name" => "type",
				"value" => $product_type,
				"admin_label" => true,
				"description" => __("Select columns count.",TEXTDOMAIN),
				'std' => 'best_selling'
			),
			array(
				"type" => "dropdown",
				"heading" => __("Style",TEXTDOMAIN),
				"param_name" => "style",
				"value" => $product_layout
			),
			array(
				"type" => "dropdown",
				"heading" => __("Columns count",TEXTDOMAIN),
				"param_name" => "columns_count",
				"value" => $product_columns,
				"admin_label" => true,
				"description" => __("Select columns count.",TEXTDOMAIN)
			),
			array(
				"type" => "textfield",
				"heading" => __("Number of products to show",TEXTDOMAIN),
				"param_name" => "number",
				"value" => '4'
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name",TEXTDOMAIN),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",TEXTDOMAIN)
			)
	   	)
	));
	add_shortcode( 'wpo_products', ('wpo_vc_shortcode_render')  );

	/**
	 * wpo_all_products
	 */
	vc_map( array(
	    "name" => __("WPO Products Tabs",TEXTDOMAIN),
	    "base" => "wpo_all_products",
	    'description'	=> __( 'Display BestSeller, TopRated ... Products In tabs', TEXTDOMAIN),
	    "class" => "",
	   "category" => __('Opal Woocommerce',TEXTDOMAIN),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title",TEXTDOMAIN),
				"param_name" => "title",
				"value" => ''
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', TEXTDOMAIN ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', TEXTDOMAIN ) => 'font-size-lg',
					__( 'Medium', TEXTDOMAIN ) => 'font-size-md',
					__( 'Small', TEXTDOMAIN ) => 'font-size-sm',
					__( 'Extra small', TEXTDOMAIN ) => 'font-size-xs'
				),
				'std' => 'font-size-md'
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Title Alignment', TEXTDOMAIN ),
				'param_name' => 'title_align',
				'value' => array(
					__( 'Align left', TEXTDOMAIN ) => 'separator_align_left',
					__( 'Align center', TEXTDOMAIN ) => 'separator_align_center',
					__( 'Align right', TEXTDOMAIN ) => 'separator_align_right'
				),
				'std' => 'separator_align_left'
			),
			array(
	            "type" => "sorted_list",
	            "heading" => __("Show Tab", "js_composer"),
	            "param_name" => "show_tab",
	            "description" => __("Control teasers look. Enable blocks and place them in desired order.", TEXTDOMAIN),
	            "value" => "recent,featured_product,best_selling",
	            "options" => $show_tab
	        ),
	        array(
				'type' => 'dropdown',
				'heading' => __( 'Style Tab', TEXTDOMAIN ),
				'param_name' => 'style_tab',
				'value' => array(
					__( 'Default', TEXTDOMAIN ) => '',
					__( 'Style 1', TEXTDOMAIN ) => 'tabs-list-1'
				),
				'std' => ''
			),
	        array(
				"type" => "dropdown",
				"heading" => __("Style",TEXTDOMAIN),
				"param_name" => "style",
				"value" => $product_layout,
				'std' => 'grid'
			),
			array(
				"type" => "textfield",
				"heading" => __("Number of products to show",TEXTDOMAIN),
				"param_name" => "number",
				"value" => 4
			),
			array(
				"type" => "dropdown",
				"heading" => __("Columns count",TEXTDOMAIN),
				"param_name" => "columns_count",
				"value" => $product_columns,
				'std' => 4,
				"description" => __("Select columns count.",TEXTDOMAIN)
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name",TEXTDOMAIN),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",TEXTDOMAIN)
			)
	   	)
	));

	/**
	 * wpo_brands
	 */
	vc_map( array(
	    "name" => __("WPO Brands", TEXTDOMAIN ),
	    "base" => "wpo_brands",
	    "class" => "",
	   "category" => __('Opal Woocommerce',TEXTDOMAIN),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title",TEXTDOMAIN),
				"param_name" => "title",
				"value" => '',
				"admin_label" => true
			),
			array(
				"type" => "textfield",
				"heading" => __("Number of brands to show",TEXTDOMAIN),
				"param_name" => "number",
				"value" => '6'
			),
			array(
				"type" => "textfield",
				"heading" => __("Icon",TEXTDOMAIN),
				"param_name" => "icon"
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name",TEXTDOMAIN),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",TEXTDOMAIN)
			)
	   	)
	));
	add_shortcode( 'wpo_brands', ('wpo_vc_shortcode_render')  );

	vc_map( array(
		"name"     => __("WPO Product Categories List",TEXTDOMAIN),
		"base"     => "wpo_category_list",
		"class"    => "",
		"category" => __('Opal Woocommerce',TEXTDOMAIN),
		'description' => __( 'Show Categories as menu Links', TEXTDOMAIN),
		"params"   => array(
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __('Title', TEXTDOMAIN),
			"param_name" => "title",
			"value"      => '',
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Show post counts', TEXTDOMAIN ),
			'param_name' => 'show_count',
			'description' => __( 'Enables show count total product of category.', TEXTDOMAIN ),
			'value' => array( __( 'Yes, please', TEXTDOMAIN ) => 'yes' )
		),
		array(
			"type"       => "checkbox",
			"heading"    => __("show children of the current category",TEXTDOMAIN),
			"param_name" => "show_children",
			'description' => __( 'Enables show children of the current category.', TEXTDOMAIN ),
			'value' => array( __( 'Yes, please', TEXTDOMAIN ) => 'yes' ),
			'std' => 1
		),
		array(
			"type"       => "checkbox",
			"heading"    => __("Show dropdown children of the current category ",TEXTDOMAIN),
			"param_name" => "show_dropdown",
			'description' => __( 'Enables show dropdown children of the current category.', TEXTDOMAIN ),
			'value' => array( __( 'Yes, please', TEXTDOMAIN ) => 'yes' )
		),

		array(
			"type"        => "textfield",
			"heading"     => __("Extra class name",TEXTDOMAIN),
			"param_name"  => "el_class",
			"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",TEXTDOMAIN)
		)
   	)
));
add_shortcode( 'wpo_category_list', ('wpo_vc_shortcode_render')  );



add_shortcode( 'wpo_special_product_categories', ('wpo_vc_shortcode_render')  );
vc_map( array(
		'name' => __( 'Opal Product categories ', 'js_composer' ),
		'base' => 'wpo_special_product_categories',
		'icon' => 'icon-wpb-woocommerce',
		'category' => __( 'Opal Woocommerce', 'js_composer' ),
		'description' => __( 'Display product categories in carousel and sub categories', 'js_composer' ),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Per page', 'js_composer' ),
				'value' => 12,
				'param_name' => 'number',
				'description' => __( 'How much items per page to show', 'js_composer' ),
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Columns', 'js_composer' ),
				'value' => 4,
				'param_name' => 'columns',
				'description' => __( 'How much columns grid', 'js_composer' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Category', 'js_composer' ),
				'value' => $product_categories_dropdown,
				'param_name' => 'category',
				'description' => __( 'Product category list', 'js_composer' ),
			),
		)
	) );
/**
 * Product categories tab
 */
add_shortcode( 'wpo_prodctcats_tabs', ('wpo_vc_shortcode_render')  );
vc_map( array(
		'name' => __( 'Product Categories Tabs ', 'js_composer' ),
		'base' => 'wpo_prodctcats_tabs',
		'icon' => 'icon-wpb-woocommerce',
		'category' => __( 'Opal Woocommerce', 'js_composer' ),
		'description' => __( 'Display product categories in carousel and sub categories', 'js_composer' ),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Per page', 'js_composer' ),
				'value' => 12,
				'param_name' => 'number',
				'description' => __( 'How much items per page to show', 'js_composer' ),
			),
			array(
				"type"        => "attach_image",
				"description" => __("Upload an image for categories (190px x 190px)", TEXTDOMAIN),
				"param_name"  => "image_cat",
				"value"       => '',
				'heading'     => __('Image', TEXTDOMAIN )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Columns', 'js_composer' ),
				'value' => 3,
				'param_name' => 'columns',
				'description' => __( 'How much columns grid', 'js_composer' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Order by', 'js_composer' ),
				'param_name' => 'orderby',
				'value' => $order_by_values,
				'description' => sprintf( __( 'Select how to sort retrieved products. More at %s.', 'js_composer' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Order way', 'js_composer' ),
				'param_name' => 'order',
				'value' => $order_way_values,
				'description' => sprintf( __( 'Designates the ascending or descending order. More at %s.', 'js_composer' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Category', 'js_composer' ),
				'value' => $product_categories_dropdown,
				'param_name' => 'category',
				'description' => __( 'Product category list', 'js_composer' ),
			),
		)
	) );
 
/**
 * wpo_all_products
 */
add_shortcode( 'wpo_prodctcats_normal', ('wpo_vc_shortcode_render')  );
vc_map( array(
		'name' => __( 'Product Categories Style 1 ', 'js_composer' ),
		'base' => 'wpo_prodctcats_normal',
		'icon' => 'icon-wpb-woocommerce',
		'category' => __( 'Opal Woocommerce', 'js_composer' ),
		'description' => __( 'Display product categories in carousel and sub categories', 'js_composer' ),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Per page', 'js_composer' ),
				'value' => 12,
				'param_name' => 'per_page',
				'description' => __( 'How much items per page to show', 'js_composer' ),
			),
			array(
				"type"        => "attach_image",
				"description" => __("Upload an image for categories (190px x 190px)", TEXTDOMAIN),
				"param_name"  => "image_cat",
				"value"       => '',
				'heading'     => __('Image', TEXTDOMAIN )
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Image Float', 'js_composer' ),
				'param_name' => 'image_float',
				'value' => array( __('Left',TEXTDOMAIN) =>'pull-left', __('Right',TEXTDOMAIN) =>'pull-right' ),
				'description' =>  __( 'Display banner image on left or right', TEXTDOMAIN)
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Columns', 'js_composer' ),
				'value' => 3,
				'param_name' => 'columns',
				'description' => __( 'How much columns grid', 'js_composer' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Order by', 'js_composer' ),
				'param_name' => 'orderby',
				'value' => $order_by_values,
				'description' => sprintf( __( 'Select how to sort retrieved products. More at %s.', 'js_composer' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Order way', 'js_composer' ),
				'param_name' => 'order',
				'value' => $order_way_values,
				'description' => sprintf( __( 'Designates the ascending or descending order. More at %s.', 'js_composer' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Category', 'js_composer' ),
				'value' => $product_categories_dropdown,
				'param_name' => 'category',
				'description' => __( 'Product category list', 'js_composer' ),
			),
		)
	) );
 
?>