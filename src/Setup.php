<?php namespace Theme;

/**
 * Class Setup
 * @author Ammar Alakkad
 */
class Setup
{
    public function __construct()
    {
        // Theme activation
        add_action('after_switch_theme', [$this, 'activation']);
        // Add theme supports
        add_action('after_setup_theme', [$this, 'addThemeSupports']);
        // Add theme sidebar
        add_action( 'widgets_init', [&$this, 'registerSidebars'] );
        // Add theme menus
        add_action('init', [$this, 'registerMenus']);
        // Add countries taxonomy
        add_action('init', [$this, 'addCountriesTaxonomy']);
    }

    public function addThemeSupports()
    {
        add_theme_support('post-thumbnails');
        add_theme_support('automatic-feed-links');
        add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption']);
    }

    /**
     * Activation starting point, calls other functions on activation
     */
    public function activation()
    {
        $this->changeDefaultImageSizes();
    }

    /**
     * Change the default WordPress image sizes as appropriate for theme
     * This must run on theme activation only to prevent unnecessary SQL queries
     */
    public function changeDefaultImageSizes()
    {
        update_option( 'thumbnail_size_w', 100 );
        update_option( 'thumbnail_size_h', 100 );

        update_option( 'medium_size_w', 317 );
        update_option( 'medium_size_h', 200 );

        update_option( 'large_size_w', 684 );
        update_option( 'large_size_h', 436 );
    }

    public function registerMenus()
    {
        register_nav_menu('header-menu', 'Header menu, could contain categories or tags.' );
    }

    public function addCountriesTaxonomy()
    {
        $labels = array(
            'name'              => __( 'Country' ),
            'singular_name'     => __( 'Country' ),
            'search_items'      => __( 'Search Countries' ),
            'all_items'         => __( 'All Countries' ),
            'parent_item'       => __( 'Parent Country' ),
            'parent_item_colon' => __( 'Parent Country:' ),
            'edit_item'         => __( 'Edit Country' ),
            'update_item'       => __( 'Update Country' ),
            'add_new_item'      => __( 'Add New Country' ),
            'new_item_name'     => __( 'New Country Name' ),
            'menu_name'         => __( 'Countries' ),
        );

        $args = array(
            'hierarchical'      => false,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'country' ),
        );

        register_taxonomy('country', ['post'], $args);
    }

    public function registerSidebars()
    {
        register_sidebar([
                'name'         => 'Main Sidebar',
                'id'           => 'main-sidebar',
                'description'  => 'Main sidebar',
                'before_title' => '<header><h1>',
                'after_title'  => '</h1></header>',
                'before_widget' => '<div class="card">',
                'after_widget' => '</div>',
            ]);
    }
}

