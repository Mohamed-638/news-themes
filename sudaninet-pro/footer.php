<?php
?>
</main>

<footer class="footer">
    <div class="container">
        <div class="footer__top">
            <?php if (is_active_sidebar('footer-1')) : ?>
                <?php dynamic_sidebar('footer-1'); ?>
            <?php else : ?>
                <section class="widget">
                    <h3><?php esc_html_e('عن الموقع', 'sudaninet-pro'); ?></h3>
                    <p><?php esc_html_e('منصة إخبارية احترافية تقدم أحدث الأخبار والتحليلات والتقارير الخاصة.', 'sudaninet-pro'); ?></p>
                </section>
                <section class="widget">
                    <h3><?php esc_html_e('روابط سريعة', 'sudaninet-pro'); ?></h3>
                    <ul>
                        <li><a href="#"><?php esc_html_e('سياسة الخصوصية', 'sudaninet-pro'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('اتصل بنا', 'sudaninet-pro'); ?></a></li>
                        <li><a href="#"><?php esc_html_e('من نحن', 'sudaninet-pro'); ?></a></li>
                    </ul>
                </section>
                <section class="widget">
                    <h3><?php esc_html_e('تابعنا', 'sudaninet-pro'); ?></h3>
                    <div class="topbar__social">
                        <a href="#" aria-label="Facebook">F</a>
                        <a href="#" aria-label="Twitter">X</a>
                        <a href="#" aria-label="Instagram">I</a>
                        <a href="#" aria-label="YouTube">Y</a>
                    </div>
                </section>
            <?php endif; ?>
        </div>
        <div class="footer__bottom">
            <span><?php echo esc_html(get_bloginfo('name')); ?> © <?php echo esc_html(date_i18n('Y')); ?></span>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'container' => false,
                'fallback_cb' => false,
                'menu_class' => '',
                'items_wrap' => '<ul>%3$s</ul>',
            ]);
            ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
