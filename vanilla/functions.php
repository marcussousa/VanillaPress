<?php

// Vanilla Security
add_filter('login_errors', create_function('$a', "return null;")); // Remove informações do usuário ao errar o login
define('FORCE_SSL_ADMIN', true); // Força o SSL
remove_action('wp_head', 'wp_generator'); // Remove detalhes da instalação do Wordpress no header do document

add_action('wp_enqueue_scripts', 'vanilla_load_styles');
function vanilla_load_styles()
{
    if (!is_admin())
        wp_enqueue_style('main-compiled', get_template_directory_uri() . '/assets/css/styles.css', false, '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'vanilla_load_scripts');
function vanilla_load_scripts()
{
    wp_enqueue_script('bootstrap-scripts', get_template_directory_uri() . '/assets/js/components.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('main-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1.0', true);

    // Exemplo para chamar scripts de forma correta no WP
    //    wp_enqueue_script(
    //        'Identificador (lowercase)',
    //        'path .js',
    //        'dependência',
    //        'Versão do Script',
    //        'Valor Boolean para escolher carregar Scripts no Header ou Footer'
    //    );
}

//
add_action('widgets_init', 'vanilla_widgets_init');
function vanilla_widgets_init()
{
    register_sidebar(array(
        'name' => __('Sidebar Widgets', 'vanilla'),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => "</li>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);
function special_nav_class($classes, $item)
{
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active ';
    }
    return $classes;
}

// Suporte ao Featured Image no Post
add_theme_support('post-thumbnails');

// Remove Meta Robots default do Wordpress
// Remova a linha abaixo se algum plugin de SEO estiver sendo usado.
// Caso contrário poderá haver conflitos de META ROBOTS
remove_action('wp_head', 'noindex', 1);
