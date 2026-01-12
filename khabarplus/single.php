<?php get_header(); ?>

<section class="section">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <h1><?php the_title(); ?></h1>
                <div class="post-card__meta">
                    <span><?php echo esc_html(get_the_date()); ?></span>
                    <span><?php the_category(', '); ?></span>
                    <span><?php the_author(); ?></span>
                </div>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="single-hero">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="single-content">
                    <div>
                        <?php the_content(); ?>
                        <div class="pagination">
                            <?php wp_link_pages(); ?>
                        </div>
                    </div>

                    <?php get_sidebar(); ?>
                </div>
            </article>
        <?php endwhile; endif; ?>
    </div>
</section>

<?php get_footer(); ?>
