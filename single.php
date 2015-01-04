<?php get_header();?>

    <div class="large-8 right columns single">
        <div class="row">
            <?php while(have_posts()): the_post(); ?>
                <?php get_template_part('partials/posts/single', 'content'); ?>
            <?php endwhile;?>
        </div>

        <?php comments_template('/partials/misc/comments.php');  ?>

    </div>

<?php get_footer();?>
