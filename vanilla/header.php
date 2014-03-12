<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="body-wrapper">

    <header class="header navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"
                   title="<?php esc_attr_e(get_bloginfo('name'), 'vanilla'); ?>">
                    <?php echo esc_html(get_bloginfo('name')); ?>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php
                // Para pegar o estilo default do Bootstrap, é preciso criar um menu chamado primary-menu e associar as páginas
                wp_nav_menu(array('container' => false, 'menu_class' => 'nav navbar-nav'));
                ?>
            </div>
        </div>
    </header>
