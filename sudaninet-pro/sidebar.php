<?php
?><aside class="sidebar">
    <?php if (is_active_sidebar('sidebar-1')) : ?>
        <?php dynamic_sidebar('sidebar-1'); ?>
    <?php else : ?>
        <section class="widget">
            <h3><?php esc_html_e('أقسام', 'sudaninet-pro'); ?></h3>
            <ul>
                <?php wp_list_categories(['title_li' => '']); ?>
            </ul>
        </section>
        <section class="widget">
            <h3><?php esc_html_e('الأكثر قراءة', 'sudaninet-pro'); ?></h3>
            <ul>
                <?php
                $popular = new WP_Query([
                    'posts_per_page' => 5,
                    'orderby' => 'comment_count',
                ]);
                if ($popular->have_posts()) :
                    while ($popular->have_posts()) : $popular->the_post();
                        ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; wp_reset_postdata(); endif; ?>
            </ul>
        </section>
        <section class="widget">
            <h3><?php esc_html_e('نشرة بريدية', 'sudaninet-pro'); ?></h3>
            <p><?php esc_html_e('اشترك ليصلك كل جديد مباشرة.', 'sudaninet-pro'); ?></p>
            <form>
                <input type="email" placeholder="example@email.com" style="width:100%; padding:10px; margin-bottom:8px;">
                <button class="button" type="submit"><?php esc_html_e('اشتراك', 'sudaninet-pro'); ?></button>
            </form>
        </section>
    <?php endif; ?>
</aside>
