<?php
/**
 * Plugin Name: WPO Post Types
 * Plugin URI: https://wpopal.com
 * Description: Register posttype in Opal theme
 * Version: 1.0
 * Author: WPOpal 
 * Author URI: https://wpopal.com
 * License: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: wpo-posttype
 * Domain Path: /languages
 *
 * @package   Widget_Importer_Exporter
 * @copyright Copyright (c) 2014, Wpopal Team
 * @link      https://wpopal.com
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;


if( !function_exists("wpo_register_posttype") ){
	function wpo_register_posttype()
	{
		//register brands
		require plugin_dir_path( __FILE__ ) . 'types/brands.php';

		//register footer
		require plugin_dir_path( __FILE__ ) . 'types/footer.php';

		//register portfolio
		require plugin_dir_path( __FILE__ ) . 'types/portfolio.php';

		//register testimonials
		require plugin_dir_path( __FILE__ ) . 'types/testimonials.php';
	}

	add_action('plugins_loaded', 'wpo_register_posttype'); 
}