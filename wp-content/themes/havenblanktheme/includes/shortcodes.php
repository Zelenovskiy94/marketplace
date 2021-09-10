<?php

function icon_func($attr) {
    $svg = isset($GLOBALS['svgs'][$attr['name']]) ? $GLOBALS['svgs'][$attr['name']] : '';
    return $svg;
}
add_shortcode('icon', 'icon_func');

function year_func($attr) {
    return date('Y');
}
add_shortcode('year', 'year_func');