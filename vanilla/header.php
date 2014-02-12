<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(' | ', true, 'right'); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="body-wrapper">
    <header class="header">
        <div class="container">
            <h1 class="site-title">
                <a href="<?php echo esc_url(home_url('/')); ?>"
                   title="<?php esc_attr_e(get_bloginfo('name'), 'vanilla'); ?>">
                    <?php echo esc_html(get_bloginfo('name')); ?>
                </a>
            </h1>

            <p class="site-description"><?php bloginfo('description'); ?></p>

            <div class="site-search"><?php get_search_form(); ?></div>
            <nav id="menu" role="navigation">
                <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
            </nav>
        </div>
    </header>
    <div class="container">
