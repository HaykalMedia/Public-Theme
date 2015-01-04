<?php namespace Theme;

/**
 * Class Scripts
 * @author Ammar Alakkad
 */
class Scripts
{
    public function __construct()
    {
        add_action('init', [&$this, 'register']);
        add_action('wp_enqueue_scripts', [&$this, 'enqueue']);
        add_action('wp_enqueue_scripts', [&$this, 'enqueueWithConditions']);
    }

    /**
     * Register theme scripts
     *
     * @return void
     */
    public function register()
    {
        wp_register_style( 'font-awesome', asset('css/font-awesome.min.css'), [], null );
        wp_register_style( 'theme', asset('css/main.css'), ['font-awesome'], null );
        wp_register_script( 'modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', [], null, false );
        wp_register_script( 'theme-vendor', asset('js/vendor.js'), ['modernizr'], null, true );
        wp_register_script( 'theme', asset('js/main.js'), ['modernizr'], null, true );

    }

    /**
     * Enqueue theme scripts
     *
     * @return void
     */
    public function enqueue()
    {
        wp_enqueue_style( 'theme' );
        wp_enqueue_script( 'theme-vendor' );
        wp_enqueue_script( 'theme' );
    }

    /**
     * Enqueue theme scripts with specific conditions
     *
     * @return void
     */
    public function enqueueWithConditions()
    {
        return null;
    }

}

