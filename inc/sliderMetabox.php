<?php $slides = get_post_meta($post->ID, 'post_slides', true);?>
<div class="wrap" id="metabox">
    <div id="lightbox-data">

        <p class="image-container">
            <img src="<?php echo NO_ICON_URL ?>" width="200" height="200" class="notSelected">
        </p>

        <p>
            <input type="hidden" id="current-slide" value="0"/>
            <input type="button" value="اضافه کردن" class="action-insert button button-primary">
            <input type="button" value="کنسل کردن" class="action-cancel button button-primary">
            <input type="hidden" value="حذف کردن" class="action-delete button button-primary" id="delete">

        </p>

    </div>

    <ul id="sortable1" class="connectedSortable">
        <?php if(is_array($slides)):?>
        <?php $i = 1; foreach( $slides as  $slide):?>
                <li class="slide slideStyle" data-slide="<?php echo $i;?>" data-content="ادیت">
                    <img src="<?php echo esc_url($slide['image']);?>"/>
                    <input type="hidden" name="slide_images[]" value="<?php echo esc_url($slide['image']);?>"/>
                </li>
         <?php $i++;endforeach;?>
        <?php endif;?>

        <li style="font-size: 100px ; border:none ; " class="add-slide"><image src="<?php echo imageAddImage ?>"  /></li>
    </ul>

</div>