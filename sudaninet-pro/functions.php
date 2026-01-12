<?php

if (!function_exists('sudaninet_pro_setup')) {
    function sudaninet_pro_setup() {
        load_theme_textdomain('sudaninet-pro', get_template_directory() . '/languages');

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
            'primary' => __('Primary Menu', 'sudaninet-pro'),
            'footer' => __('Footer Menu', 'sudaninet-pro'),
        ]);
    }
}
add_action('after_setup_theme', 'sudaninet_pro_setup');

function sudaninet_pro_enqueue_assets() {
    wp_enqueue_style('sudaninet-pro-fonts', 'https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap', [], null);
    wp_enqueue_style('sudaninet-pro-style', get_stylesheet_uri(), ['sudaninet-pro-fonts'], '1.0.0');
    wp_enqueue_script('sudaninet-pro-script', get_template_directory_uri() . '/assets/js/theme.js', [], '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'sudaninet_pro_enqueue_assets');

function sudaninet_pro_widgets_init() {
    register_sidebar([
        'name' => __('Main Sidebar', 'sudaninet-pro'),
        'id' => 'sidebar-1',
        'description' => __('Widgets in the main sidebar.', 'sudaninet-pro'),
        'before_widget' => '<section class="widget">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ]);

    register_sidebar([
        'name' => __('Footer Widgets', 'sudaninet-pro'),
        'id' => 'footer-1',
        'description' => __('Widgets in the footer.', 'sudaninet-pro'),
        'before_widget' => '<section class="widget">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ]);
}
add_action('widgets_init', 'sudaninet_pro_widgets_init');

function sudaninet_pro_excerpt_length($length) {
    return 28;
}
add_filter('excerpt_length', 'sudaninet_pro_excerpt_length');

function sudaninet_pro_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'sudaninet_pro_excerpt_more');
