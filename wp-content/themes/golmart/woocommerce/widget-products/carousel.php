<?php

$_total = $loop->post_count;
$_count = 1;
$_id = wpo_makeid();
?>
<div id="carousel-<?php echo esc_attr($_id); ?>" class="text-center owl-carousel-play" data-ride="owlcarousel">         
    
        <?php if($posts_per_page>$columns_count && $_total>$columns_count){ ?>
            <div class="carousel-controls carousel-controls-v1">
                <a class="left carousel-control carousel-xs radius-x" href="#post-slide-<?php the_ID(); ?>" data-slide="prev">
                        <i class="fa fa-arrow-left"></i>
                </a>
                <a class="right carousel-control carousel-xs radius-x" href="#post-slide-<?php the_ID(); ?>" data-slide="next">
                        <i class="fa fa-arrow-right"></i>
                </a>
            </div>    
        <?php } ?>
         <div class="owl-carousel rows-products" data-slide="<?php echo esc_attr($columns_count); ?>" data-pagination="false" data-navigation="true">
            <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                    <div class="product-wrapper">
                        <?php wc_get_template_part( 'content', 'product-inner' ); ?>
                    </div>
            <?php endwhile; ?>
        </div>
 
</div>    
<?php wp_reset_postdata(); ?>