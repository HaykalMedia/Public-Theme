<?php
$countries = get_terms('country', ['hide_empty' => false]);
foreach($countries as $country) {
    echo '<li><a href="'. get_term_link( $country ) .'">' . $country->name . '</a></li>';
}
