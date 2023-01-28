
<?php

$queryArgs = array(
    'post_type'     => 'image-slider',
    'post_per_page' => 1,
    'p'             => $sliderId,
);

$the_query = new WP_Query($queryArgs);


if( $the_query->have_posts() ):?>
    <?php while( $the_query->have_posts() ):?>
        <?php
        $the_query->the_post();
        $slides = get_post_meta(get_the_ID(), 'post_slides', true);
        ?>
        <div class="billboard-slider" id="<?php echo $uid;?>" style="width: 80% ; height: 400px">
            <ul>
                <?php if(is_array($slides)):?>
                    <?php foreach( $slides as $slide ):?>
                        <li title="<?php echo ""?>"><img src="<?php echo esc_url($slide['image'])?>" style="width: max-content ; margin: 0 auto" ></li>
                    <?php endforeach;?>
                <?php else:?>
                <?php endif;?>
            </ul>
        </div>
    <?php endwhile;?>
<?php else:?>
    <?php ;return;?>
<?php endif;
wp_reset_postdata();
