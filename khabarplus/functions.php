<?php

if (!function_exists('khabarplus_setup')) {
    function khabarplus_setup() {
        load_theme_textdomain('khabarplus', get_template_directory() . '/languages');

        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('custom-logo', [
            'height' => 60,
            'width' => 200,
            'flex-height' => true,
            'flex-width' => true,
        ]);
        add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);

        register_nav_menus([
            'primary' => __('Primary Menu', 'khabarplus'),
            'footer' => __('Footer Menu', 'khabarplus'),
        ]);
    }
}
add_action('after_setup_theme', 'khabarplus_setup');

function khabarplus_enqueue_assets() {
    wp_enqueue_style('khabarplus-fonts', 'https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap', [], null);
    wp_enqueue_style('khabarplus-style', get_stylesheet_uri(), ['khabarplus-fonts'], '1.0.0');
    wp_enqueue_script('khabarplus-script', get_template_directory_uri() . '/assets/js/theme.js', [], '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'khabarplus_enqueue_assets');

function khabarplus_widgets_init() {
    register_sidebar([
        'name' => __('Main Sidebar', 'khabarplus'),
        'id' => 'sidebar-1',
        'description' => __('Widgets in the main sidebar.', 'khabarplus'),
        'before_widget' => '<section class="widget">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ]);

    register_sidebar([
        'name' => __('Footer Widgets', 'khabarplus'),
        'id' => 'footer-1',
        'description' => __('Widgets in the footer.', 'khabarplus'),
        'before_widget' => '<section class="widget">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ]);
}
add_action('widgets_init', 'khabarplus_widgets_init');

function khabarplus_excerpt_length($length) {
    return 28;
}
add_filter('excerpt_length', 'khabarplus_excerpt_length');

function khabarplus_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'khabarplus_excerpt_more');
