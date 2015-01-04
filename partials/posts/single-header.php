<header>
    <h1><a href="<?= get_permalink();?>"><?php the_title();?></a></h1>

</header>
<?php get_template_part('partials/misc/date');?>

<?php
    if (is_single()) :
        if(class_exists('Customizable_Sharing_Buttons')) {
            //use the share class to get twitter account Share::getaccount('twitter-account')
            echo Customizable_Sharing_Buttons::html_small( null , '');
        }
    endif;
?>

<?php the_post_thumbnail('large', ['class' => 'thumbnail']);?>
