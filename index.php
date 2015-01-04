<?php get_header();?>

    <h1 class="page-title">
        <?php if (is_search()) { ?>
            نتائج البحث عن "<?= $_GET['s'];?>"
        <?php } elseif (is_category()) { ?>
            <?php single_cat_title(); ?>
        <?php } elseif( is_tag() ) { ?>
            <?php single_tag_title(); ?>
        <?php } elseif( is_archive() ) { ?>
            الأرشيف
        <?php }?>
    </h1>

    <div class="large-8 right columns news">
        <div class="row">
            <?php while(have_posts()): the_post()?>
                <?php get_template_part('partials/posts/single', 'excerpt'); ?>
            <?php endwhile;?>
        </div>

        <?php get_template_part('partials/misc/pagination', 'general');?>
    </div>

<?php get_footer();?>
