<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <section id="content" role="main">
                <header class="header">
                    <h1 class="entry-title"><?php _e('Tag Archives: ', 'vanilla'); ?><?php single_tag_title(); ?></h1>
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
