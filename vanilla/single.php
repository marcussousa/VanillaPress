<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <section id="content" role="main">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php get_template_part('entry'); ?>
                    <?php if (!post_password_required()) comments_template('', true); ?>
                <?php endwhile; endif; ?>
                <footer class="footer">
                    <?php get_template_part('nav', 'below-single'); ?>
                </footer>
            </section>
        </div>
        <div class="col-xs-6 col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
