<?php if ( class_exists( 'Customizable_Sharing_Buttons' ) && is_single() ): ?>
    <div class="contain-to-grid fixed show-for-large-up share-bar slideUp" style="z-index: 100; top: -50px;">
        <nav class="top-bar" data-topbar="">
            <ul class="title-area">
                <li class="name">
                    <h1><a href="<?= home_url();?>">أخبار المالية العامة</a></h1>
                </li>
                <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
            </ul>
            <?php //use the share class to get twitter account Share::getaccount('twitter-account')
                echo Customizable_Sharing_Buttons::html( null , '');
            ?>
        </nav>
    </div>
<?php endif; ?>
