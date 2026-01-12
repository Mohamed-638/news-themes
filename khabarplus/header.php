<?php
?><!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="topbar">
    <div class="container">
        <div class="topbar__meta">
            <span><?php echo esc_html(date_i18n('l، j F Y')); ?></span>
            <span><?php esc_html_e('أخبار السودان والعالم لحظة بلحظة', 'khabarplus'); ?></span>
        </div>
        <div class="topbar__social">
            <a href="#" aria-label="Facebook">F</a>
            <a href="#" aria-label="Twitter">X</a>
            <a href="#" aria-label="Instagram">I</a>
            <a href="#" aria-label="YouTube">Y</a>
        </div>
    </div>
</div>

<header class="header">
    <div class="container">
        <div class="header__brand">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <div class="site-title">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                </div>
            <?php endif; ?>
            <div class="site-description"><?php bloginfo('description'); ?></div>
        </div>
    </div>
    <div class="navbar">
        <div class="container main-nav">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container' => false,
                'fallback_cb' => '__return_false',
                'menu_class' => '',
                'items_wrap' => '<ul>%3$s</ul>',
            ]);
            ?>
            <a class="button" href="#"><?php esc_html_e('اشترك الآن', 'khabarplus'); ?></a>
        </div>
    </div>
</header>

<div class="breaking">
    <div class="container breaking__inner">
        <span class="breaking__title"><?php esc_html_e('عاجل', 'khabarplus'); ?></span>
        <div class="breaking__items">
            <?php
            $breaking_posts = get_posts([
                'posts_per_page' => 4,
                'orderby' => 'date',
                'order' => 'DESC',
            ]);
            foreach ($breaking_posts as $post) :
                setup_postdata($post);
                ?>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <?php endforeach; wp_reset_postdata(); ?>
        </div>
    </div>
</div>

<main class="site-main">
