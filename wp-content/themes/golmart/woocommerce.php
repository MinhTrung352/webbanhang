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
 * @website  http:/wpopal.com
 * @support  http://wpopal.com
 */
global $wpopconfig;

if( is_shop() ){

	$page_id = get_option( 'woocommerce_shop_page_id' );
	$wpopconfig = $wpoEngine->getWoocommercePageConfig( $page_id );
	get_header( $wpoEngine->getHeaderLayout( $page_id) );
	wc_get_template( 'archive-product.php' , array( 'config' => $wpopconfig ) );
}elseif(is_single()){
	get_header();
	$wpopconfig = $wpoEngine->configLayout(wpo_theme_options('woocommerce-single-layout','0-1-0'));
	$wpopconfig['left-sidebar']['widget'] = wpo_theme_options('woocommerce-single-left-sidebar', 'sidebar-default');
	$wpopconfig['right-sidebar']['widget'] = wpo_theme_options('woocommerce-single-right-sidebar', 'sidebar-default');
	wc_get_template( 'single-product.php' , array( 'config'=>$wpopconfig ) );
}else{
	get_header( wpo_theme_options('headerlayout', '') );
	$wpopconfig = $wpoEngine->configLayout(wpo_theme_options('woocommerce-archive-layout','0-1-0'));
	$wpopconfig['left-sidebar']['widget'] = wpo_theme_options('woocommerce-archive-left-sidebar', 'sidebar-default');
	$wpopconfig['right-sidebar']['widget'] = wpo_theme_options('woocommerce-archive-right-sidebar', 'sidebar-default');
	wc_get_template( 'archive-product.php' , array( 'config' => $wpopconfig ) );
}

get_footer( );