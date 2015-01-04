<?php namespace Theme;

/**
 * Social class, handles saving and retreiving social accounts from WordPress options
 *
 * @author HudaHawasli
 */
class Social
{
    private $twitter, $facebook;

    public function __construct()
    {
        $this->loadAccountsFromOptions();
        add_action('admin_menu', [ $this, 'addMenuPage' ]);
    }

    /**
     * Add the menu page
     */
    public function addMenuPage()
    {
        add_menu_page('SocialAccounts', 'Social Accounts', 'edit_posts', 'social-accounts', [$this, 'menuContent']);
    }

    /**
     * display page on dashboard
     */
    public function menuContent()
    {
        // save accounts on submit
        if (isset($_POST) and count($_POST)) {
            $this->save_accounts();
        }

        // get accounts
        $this->get_accounts();
        ?>
        <h2>Social Accounts</h2>

        <form action='#' method="post">
            <table>
                <tr>
                    <th>Facebook</th>
                    <td><input type="text" name="facebook" value="<?= $this->facebook ?>" /></td>
                </tr>
                <tr>
                    <th>Twitter</th>
                    <td><input type="text" name="twitter" value="@<?= $this->twitter ?>" /></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="submit" /></td>
                </tr>
            </table>
        </form>
        <?php

    }

    /**
     * Load accounts from WordPress Options to class fields
     */
    protected function loadAccountsFromOptions()
    {
        $this->twitter = get_option('twitter_account') ?: null;
        $this->facebook = get_option('facebook_account') ?: null;
    }

    /**
     * save accounts
     */
    public function save_accounts()
    {
        if (isset($_POST['facebook'])) {
            update_option('facebook_account', $_POST['facebook']);
            $this->facebook = $_POST['facebook'];
        }
        if (isset($_POST['twitter'])) {
            // save twitter account without @ character
            $twitter = str_replace("@", "", $_POST['twitter']);
            update_option('twitter_account', $twitter);
            $this->twitter = $_POST['twitter'];
        }
    }

    /**
     * get social account
     *
     * @param  string $key social key, e.g. facebook
     * @return string
     */
    public static function get($key)
    {
        return get_option( $key . '_account', null );
    }
}
