<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://0www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */

$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );
	$chrome = '';

    if (!$show_header) {
        $chrome .= 'noheader ';
    }
    if (!$show_footer) {
       $chrome .= 'nofooter ';
    }
    if (!$show_border) {
       $chrome .= 'noborders ';
    }

    if (!$show_background) {
        $chrome .= 'transparent';
    }

    $js = '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
?>
<div class="widget latest-twitter block <?php echo esc_attr($el_class);?>">
	<?php if(!empty($title) ): ?>
		<div class="widget-title">
			<?php echo esc_html($title);?>
		</div>
	<?php endif; ?>
	<div class="block_content">
		<div id="wpo-twitter<?php echo esc_attr( $username ); ?>" class="wpo-twitter">
			<a class="twitter-timeline" data-dnt="true" data-chrome="<?php echo esc_attr( $chrome ); ?>" data-tweet-limit="<?php echo esc_attr($status_limit); ?>" data-show-replies="<?php echo esc_attr( $show_replies ); ?>" href="https://twitter.com/<?php echo esc_attr( $username ); ?>"  data-widget-id="<?php echo esc_attr( $widget_id ); ?>"><?php echo __('Tweets by @', TEXTDOMAIN); ?><?php echo esc_html( $username ); ?></a>
			<?php print trim($js); ?>
		</div>	
	</div>
</div>