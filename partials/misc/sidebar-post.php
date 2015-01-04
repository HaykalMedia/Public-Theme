<?php
$attachments = get_post_thumbnail_id(get_the_ID());
$image_attributes = wp_get_attachment_image_src( $attachments, 'small' );
$image_url = $image_attributes[0];
?>
<div class="row post">
    <div class="medium-4 columns">
        <a href="<?= get_permalink();?>">
            <img src="<?= $image_url;?>" width="<?= $image_attributes[1];?>" height="<?= $image_attributes[2];?>"/>
        </a>
    </div>
    <div class="medium-8 columns post-title">
        <a href="<?= get_permalink();?>"><p><?php the_title();?></p></a>
    </div>
</div>
