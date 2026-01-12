<?php get_header(); ?>

<section class="hero">
    <div class="container hero-grid">
        <?php
        $featured = new WP_Query([
            'posts_per_page' => 1,
            'meta_key' => '_thumbnail_id',
        ]);
        if ($featured->have_posts()) :
            while ($featured->have_posts()) : $featured->the_post();
                $image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                ?>
                <article class="feature-card" style="background-image: url('<?php echo esc_url($image); ?>'); background-size: cover; background-position: center;">
                    <div class="feature-card__content">
                        <span class="feature-card__tag"><?php esc_html_e('الخبر الأبرز', 'khabarplus'); ?></span>
                        <h2><?php the_title(); ?></h2>
                        <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?></p>
                        <a class="button" href="<?php the_permalink(); ?>"><?php esc_html_e('اقرأ المزيد', 'khabarplus'); ?></a>
                    </div>
                </article>
            <?php endwhile; wp_reset_postdata(); endif; ?>

        <div class="feature-list">
            <?php
            $side_featured = new WP_Query([
                'posts_per_page' => 3,
                'offset' => 1,
            ]);
            if ($side_featured->have_posts()) :
                while ($side_featured->have_posts()) : $side_featured->the_post();
                    ?>
                    <article class="feature-list__item">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('thumbnail'); ?>
                            <?php else : ?>
                                <img src="https://via.placeholder.com/120x120" alt="">
                            <?php endif; ?>
                        </a>
                        <div>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="post-card__meta">
                                <span><?php echo esc_html(get_the_date()); ?></span>
                            </div>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container news-grid">
        <div>
            <div class="section__title">
                <h2><?php esc_html_e('الأخبار المميزة', 'khabarplus'); ?></h2>
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>"><?php esc_html_e('عرض الكل', 'khabarplus'); ?></a>
            </div>

            <?php
            $main_posts = new WP_Query([
                'posts_per_page' => 6,
            ]);
            if ($main_posts->have_posts()) :
                while ($main_posts->have_posts()) : $main_posts->the_post();
                    ?>
                    <article class="post-card">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php else : ?>
                                <img src="https://via.placeholder.com/400x260" alt="">
                            <?php endif; ?>
                        </a>
                        <div>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="post-card__meta">
                                <span><?php echo esc_html(get_the_date()); ?></span>
                                <span><?php the_category(', '); ?></span>
                            </div>
                            <p class="post-card__excerpt"><?php the_excerpt(); ?></p>
                            <a class="button" href="<?php the_permalink(); ?>"><?php esc_html_e('اقرأ المزيد', 'khabarplus'); ?></a>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>

        <?php get_sidebar(); ?>
    </div>
</section>

<?php get_footer(); ?>
