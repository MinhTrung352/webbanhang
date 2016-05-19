<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $term_id
 * @var $number
 * @var $image_cat
 * @var $el_class
 * Shortcode class
 * @var $this WPBakeryShortCode_Wpo_Category_Filter
 */
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if( $term_id && !empty($term_id) ){
    $term = get_term_by( 'slug', $term_id, 'product_cat' );

    if ( !empty($term) && !is_wp_error($term) ):

    $args = array(
              'taxonomy'     => 'product_cat',
              'child_of'     => 0,
              'parent'       => $term->term_id,
              'number'       => $number,
            );
    $sub_cats = get_categories( $args );
    if( $image_cat && !empty( $image_cat ))
        $image = wp_get_attachment_image_src( $image_cat, 'postthumb-grid');
    else {
        $thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_id', true );
        $image = wp_get_attachment_image_src( $thumbnail_id, 'postthumb-grid');
    }

    $category_link = get_term_link( $term->term_id, 'product_cat' );
 ?>
    <div class="widget wpo-category-filter <?php echo (($el_class!='')?' '.esc_attr( $el_class ):''); ?>">
        <div class="widget-content">
            <div class="category-filter-content">
                <h3 class="category-filter-title">
                    <span><?php echo trim($term->name); ?></span>
                </h3>
                <?php
                if( $sub_cats && !empty($sub_cats)) { ?>
                    <ul class="list-unstyled category-filter-list">
                        <?php
                            foreach( $sub_cats as $cat){
                                $sub_link = get_term_link( $cat->slug, 'product_cat');
                                $cat_name = $cat->name .' ('. $cat->count .')';
                            ?>
                            <li class="category-filter-list-item">
                                <a href="<?php echo esc_attr($sub_link); ?>">
                                    <?php echo trim( $cat_name ); ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <div class="category-filter-link">
                    <a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo __( 'more', TEXTDOMAIN); ?>" class="btn btn-link"><?php echo __( '+ more...', TEXTDOMAIN ); ?></a>
                </div>
            </div>
            
            <?php if( $image ) { ?>
                <div class="category-image">
                    <img src="<?php echo esc_url_raw( $image[0] ); ?>" title="<?php echo esc_attr($term->name); ?>" class="media-object" style="max-width: 100%" alt="">
                </div>
            <?php } ?>

        </div>
    </div>
<?php endif; ?> 
<?php } ?>