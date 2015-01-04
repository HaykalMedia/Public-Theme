<div class="row">
    <div class="medium-12">
        <form action="<?= get_home_url(); ?>" method="get" class="form-inline">
            <div class="row collapse">
                <div class="small-10 columns">
                    <input type="text" name="s" value="<?php echo isset($_GET['s']) ? urldecode( $_GET['s'] ) : ''; ?>" placeholder="اكتب ما تريد البحث عنه">
                    <?php if ( isset( $_GET['post_type'] ) ): ?>
                        <input type="hidden" name="post_type" value="<?= $_GET['post_type']; ?>">
                    <?php endif; ?>
                </div>
                <div class="small-2 columns search-button-container">
                    <button type="submit" href="#" class="button search-button"><i class="fa fa-lg fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
