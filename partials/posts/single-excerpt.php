<div class="medium-12 columns card article">
    <?php get_template_part('partials/posts/single', 'header');?>

    <p><?= get_the_excerpt(); ?></p>

    <?php get_template_part('partials/misc/read', 'more');?>

    <?php get_template_part('partials/posts/single', 'categories');?>
</div>
<div class="meduim-12 columns article-footer">
    <?php
        if(class_exists('Customizable_Sharing_Buttons')) {
            //use the share class to get twitter account Share::getaccount('twitter-account')
            echo Customizable_Sharing_Buttons::html_small( null , '');
        }
    ?>
</div>

