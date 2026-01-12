<?php get_header(); ?>

<section class="section">
    <div class="container news-grid">
        <div>
            <div class="section__title">
                <h2><?php esc_html_e('آخر الأخبار', 'sudaninet-pro'); ?></h2>
            </div>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
                        <a class="button" href="<?php the_permalink(); ?>"><?php esc_html_e('اقرأ المزيد', 'sudaninet-pro'); ?></a>
                    </div>
                </article>
            <?php endwhile; endif; ?>

            <div class="pagination">
                <?php the_posts_pagination(); ?>
            </div>
        </div>

        <?php get_sidebar(); ?>
    </div>
</section>

<?php get_footer(); ?>
