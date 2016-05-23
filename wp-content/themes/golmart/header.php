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
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link  rel="stylesheet" href="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/css/animate.css">
    <link  rel="stylesheet" href="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/css/bootstrap-rtl.css">
    <link  rel="stylesheet" href="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/css/bootstrap.css">
    <link  rel="stylesheet" href="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/css/customize.css">
    <link  rel="stylesheet" href="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/css/font-awesome.css">
    <link  rel="stylesheet" href="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/css/nsbox.css">
    <link  rel="stylesheet" href="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/css/nsbox.min.css">
    <link  rel="stylesheet" href="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/css/prettyPhoto.css">
    <link  rel="stylesheet" href="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/css/template.css">
    <link  rel="stylesheet" href="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/css/woocommerce.css">
   
    <link  rel="stylesheet" type="text/css" href="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/css/bootstrap-rtl.css">
    <link  rel="stylesheet" type="text/css" href="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/css/customize.css">
      <link  rel="stylesheet" type="text/css" href="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/css/font-awesome.css">
       <link  rel="stylesheet" type="text/css" href="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/css/bootstrap.min.css">
       <link  rel="stylesheet"  href="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>css/main.css">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- OFF-CANVAS MENU SIDEBAR -->
    <section id="wpo-off-canvas" class="wpo-off-canvas">
        <div class="wpo-off-canvas-body">
            <div class="wpo-off-canvas-header">
                <button type="button" class="close btn btn-close" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-times"></i>
                </button>
                <div class="mobile-menu-header">
                    <?php _e('Menu',TEXTDOMAIN); ?>
                </div>
            </div>
            <nav class="navbar navbar-offcanvas navbar-static" role="navigation">
                <?php
                $args = array(
                    'theme_location'  => 'mainmenu',
                    'container_class' => 'navbar-collapse',
                    'menu_class'      => 'wpo-menu-top nav navbar-nav',
                    'fallback_cb'     => '',
                    'menu_id'         => 'main-menu-offcanvas',
                    'walker'          => new Wpo_Megamenu_Offcanvas()
                );
                wp_nav_menu($args);
                ?>
            </nav>
        </div>
    </section>
    <!-- //OFF-CANVAS MENU SIDEBAR -->

    <?php
        $meta_template = get_post_meta(get_the_ID(),'wpo_template',true);
    ?>

    <!-- START Wrapper -->
    <section class="wpo-wrapper <?php echo isset($meta_template['el_class']) ? esc_attr( $meta_template['el_class'] ) : '' ; ?>">
        <!-- Top bar -->
        <section id="wpo-topbar" class="wpo-topbar skin-fashion">
            <div class="topbar-inner">
                <div class="container">
                   
                    <div class="topbar-mobile hidden-lg hidden-md">
                        <div class="pull-right">
                            <div class="active-mobile pull-left hidden-sm">
                                <div class="navbar-header-topbar">
                                    <?php wpo_renderButtonToggle(); ?>
                                </div>
                            </div>

                            <div class="active-mobile pull-left search-popup">
                                <a id="dLabel1" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                    <span class="fa fa-search"></span>
                                </a>    
                                <div class="active-content dropdown-menu" role="menu" aria-labelledby="dLabel1">
                                    <?php get_search_form(); ?>
                                </div>
                            </div>
                            <div class="active-mobile pull-left setting-popup">
                                <a id="dLabel2" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                    <span class="fa fa-user"></span>
                                </a>  
                                <div class="active-content dropdown-menu" role="menu" aria-labelledby="dLabel2">
                                    <h3 class="white title"><?php _e('Settings',TEXTDOMAIN); ?></h3>
                                    <?php if(has_nav_menu( 'topmenu' )){ ?>
                                        <div class="pull-left">
                                            <?php
                                                $args = array(
                                                    'theme_location'  => 'topmenu',
                                                    'container_class' => '',
                                                    'menu_class'      => 'menu-topbar'
                                                );
                                                wp_nav_menu($args);
                                            ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php if( WPO_WOOCOMMERCE_ACTIVED ) { ?>
                            <div class="active-mobile pull-left cart-popup">
                                <!-- Setting -->
                                <?php if( wpo_theme_options('woo-show-minicart', true) ) : ?>
                                    <?php wpo_cartdropdown_mobile(); ?>
                                <?php endif; ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                   <div class="user-login pull-left topbar-left hidden-sm hidden-xs">
                        <div>
                            <?php if( !is_user_logged_in() ){ ?>
                                <span class="hidden-xs"><?php echo __('Welcome visitor you can',TEXTDOMAIN); ?></span>
                                <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('login or create an account','woothemes'); ?>"><?php _e(' login or create an account ','woothemes'); ?></a>
                            <?php }else{ ?>
                                <?php $current_user = wp_get_current_user(); ?>
                                <span class="hidden-xs"><?php echo __('Welcome ',TEXTDOMAIN); ?><?php echo esc_attr($current_user->display_name); ?> !</span>
                            <?php } ?>
                        </div>
                        
                        <?php 
                            // WPML - Custom Languages Menu
                            if( function_exists( 'icl_get_languages' ) ){
                                $languages = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
                                if( is_array( $languages ) ){
                                    
                                    foreach( $languages as $lang_k=>$lang ){
                                        if( $lang['active'] ){
                                            $active_lang = $lang;
                                            unset( $languages[$lang_k] );
                                        }
                                    }
        
                                    // disabled
                                    if( count( $languages ) ){
                                        $lang_status = 'enabled';
                                    } else {
                                        $lang_status = 'disabled';
                                    }
                                    
                                    echo '<div class="language wpml-languages quick-button '. esc_attr( $lang_status ).'">';
                                    
                                        echo '<div class="heading active" href="'. esc_url( $active_lang['url'] ) .'" ontouchstart="this.classList.toggle(\'hover\');">';
                                            echo '<img src="'. esc_url( $active_lang['country_flag_url'] ) .'" alt="'. esc_attr( $active_lang['translated_name'] ) .'"/>';
                                            echo esc_attr( $active_lang['translated_name'] );
                                            if( count( $languages ) ) echo '<i class="icon-down-open-mini"></i>';
                                        echo '</div>';
                                        
                                        if( count( $languages ) ){
                                            echo '<ul class="wpml-lang-dropdown list">';
                                                foreach( $languages as $lang ){
                                                    echo '<li><a href="'. esc_url( $lang['url'] ) .'"><img src="'. esc_url( $lang['country_flag_url'] ).'" alt="'. esc_attr( $lang['translated_name'] ).'"/>'. esc_attr( $lang['translated_name'] ).'</a></li>';
                                                }
                                            echo '</ul>';
                                        }
                                        
                                    echo '</div>';
                                }
                            }
                           ?>
                    </div>
                    <div class="top-menu pull-right hidden-sm hidden-xs">
                        <?php if(has_nav_menu( 'topmenu' )){ ?>
                                <?php
                                    $args = array(
                                        'theme_location'  => 'topmenu',
                                        'container_class' => '',
                                        'menu_class'      => 'menu-topbar'
                                    );
                                    wp_nav_menu($args);
                                ?>
                        <?php } ?>
                    </div> 
                </div>
            </div>    
        </section>
        <!-- // Topbar -->
        <!-- HEADER -->
        <header id="wpo-header" class="wpo-header skin-fashion">
       
            <div class="container-inner header-wrap">
            <div class="header-wrapper-inner">
                <!-- LOGO -->
                <div class="header-wrapper-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 no-padding">
                                <div class="header-top-left clearfix">
                                    <div class="col-md-4">
                                        <div class="logo-in-theme">
                                            <?php if( wpo_theme_options('logo') ) { ?>
                                            <div class="logo">
                                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                                    <img src="<?php echo esc_url( wpo_theme_options('logo') ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                                </a>
                                            </div>
                                            <?php } else { ?>
                                                <div class="logo logo-theme">
                                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                                         <img src="<?php echo get_template_directory_uri() . '/images/logo.png'; ?>" alt="<?php bloginfo( 'name' ); ?>" />
                                                    </a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    
                                    <?php if(is_active_sidebar('header-defaul-center')){ ?>
                                        <div class="col-md-8">
                                            <?php dynamic_sidebar('header-defaul-center'); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <?php if( WPO_WOOCOMMERCE_ACTIVED ) { ?>
                                <!-- Setting -->
                                <?php if( wpo_theme_options('woo-show-minicart', true) ) : ?>
                                    <div class="top-cart hidden-sm hidden-xs clearfix">
                                        <?php wpo_cartdropdown(); ?>
                                    </div>
                                <?php endif; ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- MENU -->
                <div class="wpo-mainmenu-wrap">
                    <div class="container">
                        <div class="p-relative">
                            <div class="row">
                                <div class="col-md-9 p-static">
                                    <nav id="wpo-mainnav" data-duration="<?php echo wpo_theme_options('megamenu-duration',400); ?>" class="wpo-megamenu <?php echo wpo_theme_options('magemenu-animation','slide'); ?> animate navbar navbar-mega" role="navigation">
                                        <div class="navbar-header">
                                            <?php wpo_renderButtonToggle(); ?>
                                        </div><!-- //END #navbar-header -->
                                        <?php
                                            $args = array(  'theme_location' => 'mainmenu',
                                                            'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
                                                            'menu_class' => 'nav navbar-nav megamenu',
                                                            'fallback_cb' => '',
                                                            'menu_id' => 'main-menu',
                                                            'walker' => new Wpo_Megamenu());
                                            wp_nav_menu($args);
                                        ?>
                                    </nav>
                                </div>
                                <div class="col-md-3">
                                    <div class="search hidden-xs hidden-sm">
                                         <?php get_search_form(); ?>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
                <!-- //MENU -->
                <!-- //LOGO -->
                <!-- // Setting -->
            </div></div>

        </header>
        <!-- //HEADER -->