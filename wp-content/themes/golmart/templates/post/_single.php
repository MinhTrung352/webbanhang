<?php $thumbsize = isset($grid_thumb_size)? $grid_thumb_size : 'thumbnail';?>
<article class="post">
    <?php
    if ( has_post_thumbnail() ) {
        ?>
            <figure class="entry-thumb">
                <a href="<?php the_permalink(); ?>"  class="entry-image zoom-2">
                <?php if( WPO_VISUAL_COMPOSER_ACTIVED ){
                        $post_thumbnail = wpb_getImageBySize( array( 'post_id' => get_the_ID(), 'thumb_size' => $grid_thumb_size ) );
                        echo ($post_thumbnail['thumbnail']);
                    }else{
                        the_post_thumbnail( $grid_thumb_size );
                }?>
                </a>
                <!-- vote    -->
                <?php do_action('wpo_rating') ?>
            </figure>
        <?php
    }
    ?>
    <div class="entry-content">
        <?php
        if (get_the_title()) {
        ?>
            <h4 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>
        <?php
        }
        ?>
        <div class="infor-export">
            <span class="entry-date"><?php the_time( 'M d, Y' ); ?></span> |
            <span class="comment-count">
                <?php comments_popup_link(__(' 0 comment', TEXTDOMAIN), __(' 1 comment', TEXTDOMAIN), __(' % comments', TEXTDOMAIN)); ?>
            </span>
            <?php the_category(); ?>
        </div>
        <?php
            if (! has_excerpt()) {
                echo "";
            } else {
                ?>
                    <?php if(isset($layout) && ($layout == 'list-2')){ ?>
                        <p class="entry-description"><?php echo wpo_excerpt(50,'...'); ?></p>
                    <?php } else {?>
                        <p class="entry-description"><?php echo wpo_excerpt(20,'...'); ?></p>
                    <?php } ?>
                <?php
            }
        ?>
        <div class="entry-content-inner clearfix">
            <div class="entry-meta">
                 <div class="entry-create clearfix">
                    <span class="readmore"><a href="<?php the_permalink(); ?>"><?php echo __('READ MORE', TEXTDOMAIN) ?></a></span> 
                </div>
            </div>
        </div>
    </div>
</article>