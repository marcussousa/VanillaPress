<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <section class="content">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php get_template_part('entry'); ?>
                    <?php comments_template(); ?>
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
