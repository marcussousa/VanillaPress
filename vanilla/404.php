<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <section id="content" role="main">
                <article id="post-0" class="post not-found">
                    <header class="header">
                        <h1 class="entry-title"><?php _e('Not Found', 'vanilla'); ?></h1>
                    </header>
                    <section class="entry-content">
                        <p><?php _e('Nothing found for the requested page. Try a search instead?', 'vanilla'); ?></p>
                        <?php get_search_form(); ?>
                    </section>
                </article>
            </section>
        </div>
        <div class="col-xs-6 col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
