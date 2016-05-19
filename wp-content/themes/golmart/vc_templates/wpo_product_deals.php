
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

    $deals = array();
    $p_deals = wpo_woocommerce_query('deals')->posts;
    $_id = wpo_makeid();
    $_count = 1;
    switch ($columns_count) {
        case '4':
            $class_column='col-sm-6 col-md-3';
            break;
        case '3':
            $class_column='col-sm-4';
            break;
        case '2':
            $class_column='col-sm-6';
            break;
        default:
            $class_column='col-sm-12';
            break;
    }

    foreach($p_deals as $product){
        $date_sale = get_post_meta( $product->ID, '_sale_price_dates_to', true );
        if( $date_sale > time() )
            $deals[] = $product;
    }

    $_total = count($deals);

    if( $deals && $_total > 0 ) { ?>

    <?php
    //register countdown js
    wp_register_script( 'countdown_js', WPO_THEME_URI.'/js/countdown.js', array( 'jquery' ) );
    wp_enqueue_script('countdown_js');
    ?>
    <div class="widget_deals_products widget-<?php echo esc_attr($block_style); ?> widget widget_products <?php echo (($el_class!='')?' '.$el_class:''); ?>">
        <?php if($title!=''){ ?>
            <h3 class="widget-title title-primary">
                <span><span><?php echo esc_attr( $title ); ?></span></span>
            </h3>
        <?php } ?>
        <div class="woocommerce woo-deals">

        <?php if($layout == 'carousel'):?>
            <div id="carousel-<?php echo esc_attr($_id); ?>" class="widget-content owl-carousel-play" data-ride="owlcarousel">   
              
                <?php if( $_total > $columns_count ) { ?>
                   <div class="carousel-controls-v1 carousel-controls">
                        <a class="left carousel-control carousel-xs visible" href="#post-slide-<?php the_ID(); ?>" data-slide="prev">
                                <i class="fa fa-arrow-left"></i>
                        </a>
                        <a class="right carousel-control carousel-xs visible" href="#post-slide-<?php the_ID(); ?>" data-slide="next">
                                <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>  
                <?php } ?>
                 <div class="owl-carousel rows-products" data-slide="<?php echo esc_attr($columns_count); ?>" data-pagination="false" data-navigation="true">
                    <?php foreach($deals as $key=>$id ){
                        $product = get_product( $id );
                        $time_sale = get_post_meta( $product->id, '_sale_price_dates_to', true );
                    ?>
                 
                            <div class="item-product <?php echo esc_attr($class_column); if($_count%$columns_count==0) echo ' last'; ?>">
                                <div class="product-block thumbnail">
                                    <div class="image">
                                        <?php echo ( $product->get_image('image-widgets') ); ?>
                                        <div class="time">
                                            <div class="pts-countdown clearfix" data-countdown="countdown"
                                                 data-date="<?php echo date('m',$time_sale).'-'.date('d',$time_sale).'-'.date('Y',$time_sale).'-'. date('H',$time_sale) . '-' . date('i',$time_sale) . '-' .  date('s',$time_sale) ; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="caption">
                                        <div class="deals-information">
                                            <h3 class="name">
                                                <a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>"><?php echo esc_attr( $product->get_title() ); ?></a>
                                            </h3>
                                            <div class="rating clearfix ">
                                                <?php if ( $rating_html = $product->get_rating_html() ) { ?>
                                                    <div><?php echo trim($rating_html); ?></div>
                                                <?php }else{ ?>
                                                    <div class="star-rating"></div>
                                                <?php } ?>
                                            </div>
                                            <div class="price"><?php echo ( $product->get_price_html() ) ?></div>
                                        </div>
                                        <!-- <div class="time">
                                            <div class="sale-off">
                                                <?php
                                                $percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
                                                    echo '-' . $percentage . '%';
                                                 ?>
                                            </div>
                                            <div class="pts-countdown clearfix" data-countdown="countdown"
                                                 data-date="<?php echo date('m',$time_sale).'-'.date('d',$time_sale).'-'.date('Y',$time_sale).'-'. date('H',$time_sale) . '-' . date('i',$time_sale) . '-' .  date('s',$time_sale) ; ?>">
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                         
                <?php 
                        $_count++; 
                    } 
                ?>
                </div>
            </div>
            <?php elseif($layout == 'grid') : ?>
                 <div class="widget-content widget_products" id="<?php echo esc_attr($_id); ?>">
                    <div class="products-inner">
                        <?php foreach($deals as $key=>$id ){
                            $product = get_product( $id );
                            $time_sale = get_post_meta( $product->id, '_sale_price_dates_to', true );
                        ?>
                        <?php if( $_count%$columns_count == 1 || $columns_count == 1 ) echo '<div class="item'.(($_count==1)?" active":"").'"><div class="row">'; ?>
                       
                                <div class="item-product <?php echo esc_attr($class_column); if($_count%$columns_count==0) echo ' last'; ?>">
                                    <div class="product-block thumbnail">
                                        <div class="image">
                                            <?php echo ( $product->get_image('image-widgets') ); ?>
                                            <div class="time">
                                                <div class="pts-countdown clearfix" data-countdown="countdown"
                                                     data-date="<?php echo date('m',$time_sale).'-'.date('d',$time_sale).'-'.date('Y',$time_sale).'-'. date('H',$time_sale) . '-' . date('i',$time_sale) . '-' .  date('s',$time_sale) ; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="caption">
                                            <div class="deals-information">
                                                <h3 class="name">
                                                    <a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>"><?php echo esc_attr( $product->get_title() ); ?></a>
                                                </h3>
                                                <div class="rating clearfix ">
                                                    <?php if ( $rating_html = $product->get_rating_html() ) { ?>
                                                        <div><?php echo trim($rating_html); ?></div>
                                                    <?php }else{ ?>
                                                        <div class="star-rating"></div>
                                                    <?php } ?>
                                                </div>
                                                <div class="price"><?php echo ( $product->get_price_html() ); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php if( ($_count%$columns_count==0 && $_count!=1) || $_count== $_total || $columns_count ==1 ) echo '</div></div>'; ?>
                    <?php 
                            $_count++; 
                        } 
                    ?>
                    </div>
                </div>     

            <?php endif ?>    
        </div>
    </div>
    <?php } ?>

<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('[data-countdown="countdown"]').each(function(index, el) {
            var $this = jQuery(this);
            var $date = $this.data('date').split("-");
            $this.lofCountDown({
                TargetDate:$date[0]+"/"+$date[1]+"/"+$date[2]+" "+$date[3]+":"+$date[4]+":"+$date[5],
                DisplayFormat:"<div class=\"countdown-times\"><div class=\"day\">%%D%% <?php echo __('Days', TEXTDOMAIN); ?></div><div class=\"hours\">%%H%% <?php echo __('Hrs', TEXTDOMAIN); ?> </div><div class=\"minutes\">%%M%% <?php echo __('Mins', TEXTDOMAIN); ?> </div><div class=\"seconds\">%%S%% <?php echo __('Secs', TEXTDOMAIN); ?> </div></div>",
                FinishMessage: "<?php echo __('Expired', TEXTDOMAIN); ?>"
            });
        });
    });
</script>