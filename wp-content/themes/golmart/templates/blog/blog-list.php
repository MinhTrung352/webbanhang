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
$postformat = get_post_format();
$icon = '';
switch ($postformat) {
    case 'link':
        $icon = 'fa-link';
        break;
    case 'gallery':
        $icon = 'fa-th-large';
        break;
    case 'audio':
        $icon = 'fa-music';
        break;
    case 'video':
        $icon = 'fa-film';
        break;
    case 'image':
        $icon = 'fa-picture-o';
        break;
    case 'chat':
        $icon = 'fa-weixin';
        break;
    case 'quote':
        $icon = 'fa-quote-left';
        break;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="post-container clearfix">
            <div class="blog-post-detail">
                <div class="col-md-4 col-sm-4 no-padding">
                    <figure class="entry-thumb">
                        <?php 
                            if(has_post_format($postformat)){
                                get_template_part( 'templates/content/content', $postformat );
                            }
                         ?>
                    </figure>
                </div>
                <div class="col-md-8 col-sm-8">
                    <div class="information-post">
                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <div class="entry-meta">
                            <span class="entry-date"><?php echo get_the_date(); ?></span>
                            <span class="meta-sep"> / </span>
                            <span class="comment-count">
                                <?php comments_popup_link(__(' 0 comment', TEXTDOMAIN), __(' 1 comment', TEXTDOMAIN), __(' % comments', TEXTDOMAIN)); ?>
                            </span>
                            <span class="meta-sep"> / </span>
                            <span class="author-link"><?php the_author_posts_link(); ?></span>
                            <?php if(is_tag()): ?>
                                <span class="meta-sep"> / </span>
                                <span class="tag-link"><?php the_tags( __('Tags: ', TEXTDOMAIN ),', '); ?></span>
                            <?php endif; ?>
                        </div>
                        <p class="entry-content">
	                        <?php echo wpo_excerpt(20); ?>
	                    </p>

                    </div>
                </div>
            </div>
        </div>
    </article>