<?php namespace Theme\Widgets;


class PopularPosts extends \WP_Widget
{
    protected $defaults = [
        'most_viewed_text'   => 'الأكثر قراءة',
    ];

    public function __construct()
    {
        $widget_ops = [
                        'classname'   => 'most-popular-widget',
                        'description' => 'Display 5 most popular posts within last week.'
                    ];
        $this->WP_Widget( 'most-popular-widget', 'Most Popular', $widget_ops );
    }

    public function widget($args, $instance)
    {
        extract( $args, EXTR_SKIP );
        $widget_title   = $instance['most_viewed_text'];
        $most_viewed_transient  = 'most_viewed';

        echo $before_widget;

        echo $before_title;
        echo $widget_title;
        echo $after_title;
        ?>
        <?php
        if ( false === ( $query = get_transient( $most_viewed_transient ) ) ) {

            $args = [
                'date_query' => [
                    'after' => '7 day ago',
                ],
                'orderby' => 'popular_posts',
                'posts_per_page' => 5,
            ];

            $query = new \WP_Query($args);
            wp_reset_query();

            set_transient($most_viewed_transient, $query, 30 * 60);
        }
        while ($query->have_posts()) {
            $query->the_post();

            get_template_part('partials/misc/sidebar', 'post');
        }
        echo $after_widget;
    }

    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        // Strip tags from title and name to remove HTML
        $instance['most_viewed_text'] = strip_tags( $new_instance['most_viewed_text'] );

        return $instance;
    }

    public function form($instance)
    {
        $instance = wp_parse_args( (array) $instance, $this->defaults );
        $most_viewed_text   = $instance['most_viewed_text'];
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'most_viewed_text' ); ?>">Most viewed title:</label>
            <input type="text" name="<?php echo $this->get_field_name( 'most_viewed_text' ); ?>" value="<?php echo $most_viewed_text; ?>" style="width: 100%;"/>
        </p>
    <?php
    }
}
