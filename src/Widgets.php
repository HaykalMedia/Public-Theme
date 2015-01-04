<?php namespace Theme;

/**
 * Class Widgets
 * @author Ammar Alakkad
 */
class Widgets
{
    public function __construct()
    {
        add_action('widgets_init', [&$this, 'registerWidgets']);
    }

    public function registerWidgets()
    {
        if(class_exists('\Theme\Widgets\PopularPosts')) {
            register_widget('\Theme\Widgets\PopularPosts');
        }
    }
}

