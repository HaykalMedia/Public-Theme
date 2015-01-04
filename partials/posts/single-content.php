<div class="medium-12 columns card article">
    <?php get_template_part('partials/posts/single', 'header');?>

    <p><?php the_content(); ?></p>

    <?php get_template_part('partials/misc/read', 'more');?>

    <?php get_template_part('partials/posts/single', 'categories');?>
</div>
