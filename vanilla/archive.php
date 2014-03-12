<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <section id="content" role="main">
                <header class="header">
                    <h1 class="entry-title"><?php
                        if (is_day()) {
                            printf(__('Daily Archives: %s', 'vanilla'), get_the_time(get_option('date_format')));
                        } elseif (is_month()) {
                            printf(__('Monthly Archives: %s', 'vanilla'), get_the_time('F Y'));
                        } elseif (is_year()) {
                            printf(__('Yearly Archives: %s', 'vanilla'), get_the_time('Y'));
                        } else {
                            _e('Archives', 'vanilla');
                        }
                        ?></h1>
                </header>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php get_template_part('entry'); ?>
                <?php endwhile; endif; ?>
                <?php get_template_part('nav', 'below'); ?>
            </section>
        </div>
        <div class="col-xs-6 col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
