<footer>
    <?php
    // Display countries
    $countries = wp_get_object_terms( get_the_ID(), 'country' );
    foreach ($countries as $country) {
        echo '<span class="success label"><a href="' . get_category_link($category_id) . '">'. $category->cat_name .'</a></span>';
    }

    // Display categories
    $categories = wp_get_object_terms(get_the_ID(), ['category', 'post_tag']);
    foreach ($categories as $term) {
        echo '<span class="label"><a href="' . get_term_link($term) . '">'. $term->name .'</a></span>';
    }
    ?>
</footer>
