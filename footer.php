            <?php get_template_part('partials/sidebar');?>
        </div> <?php // closes <div class="row"> ?>
    </div> <?php // closes <div class="main-content"> ?>
    <div class="site-footer">
        <div class="row">
            <div class="medium-12 columns">
                All rights reserved &copy; <a href="http://haykalmedia.com" target="_blank">Haykal Media</a> <?= date('Y');?>
            </div>
        </div>
    </div>

    <?php wp_footer();?>

    <script>
        jQuery(document).ready(function($){
            $(document).foundation();
        });
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/webfont/1.5.6/webfont.js"></script>
    <script>
      WebFont.load({
        google: {
          families: ['Droid Arabic Kufi', 'Droid Arabic Kufi:bold']
        }
      });
    </script>
</body>
</html>

