<!doctype html>
<html class="no-js" lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <?php wp_head();?>
</head>
<body>
    <header class="container">
        <div class="top contain-to-grid fixed">
            <nav class="top-bar" data-topbar role="navigation" data-options="custom_back_text: true; back_text: عودة">
                <ul class="title-area">
                    <li class="name">
                        <h1><a href="<?= home_url();?>"><?php bloginfo('name');?></a></h1>
                    </li>
                    <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
                </ul>

                <section class="top-bar-section">
                    <ul class="main-menu">
                        <li class="has-dropdown">
                            <a href="#">البلد</a>
                            <ul class="dropdown">
                                <?php get_template_part('partials/misc/countries', 'list');?>
                            </ul>
                        </li>

                        <?php wp_nav_menu([
                                        'theme_location' => 'header-menu',
                                        'container' => '',
                                        'menu_class' => '',
                                        'items_wrap' => '%3$s',
                                        'depth' => -1,
                                        'fallback_cb' => false,
                                        ]); ?>
                    </ul>

                    <ul class="left social-buttons">
                        <li>
                            <div class="show-for-small-only">
                                <?php get_template_part( 'partials/misc/header', 'search' ); ?>
                            </div>
                            <a href="#" data-dropdown="search-form" class="show-for-medium-up"><i class="fa fa-2x fa-fw fa-search"></i></a>
                            <div class="show-for-medium-up">
                                <div id="search-form" data-dropdown-content class="f-dropdown medium content search-box">
                                    <?php get_template_part( 'partials/misc/header', 'search' ); ?>
                                </div>
                            </div>
                        </li>
                        <li><a href="#"><i class="fa fa-2x fa-fw fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-2x fa-fw fa-twitter"></i></a></li>
                    </ul>
                </section>
            </nav>
        </div>
        <?php get_template_part( 'partials/header', 'sharebar' ); ?>
    </header>
    <div class="main-content">
        <div class="row">
