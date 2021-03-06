<?php

// Vanilla Security
add_filter('login_errors', create_function('$a', "return null;")); // Remove informações do usuário ao errar o login
define('FORCE_SSL_ADMIN', true); // Força o SSL
remove_action('wp_head', 'wp_generator'); // Remove detalhes da instalação do Wordpress no header do document

add_action('wp_enqueue_scripts', 'vanilla_load_styles');
function vanilla_load_styles()
{
    wp_enqueue_style('Bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', false, '1.0', 'all');
    wp_enqueue_style('Main', get_template_directory_uri() . '/assets/css/styles.css', false, '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'vanilla_load_scripts');
function vanilla_load_scripts()
{
    
    wp_enqueue_script('Bootstrap', get_template_directory_uri() . '/assets/js/components.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('Main Scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1.0', true);

    // Exemplo para chamar scripts de forma correta no WP
    //    wp_enqueue_script(
    //        'Identificador (lowercase)',
    //        'path_of_file.js',
    //        array('dependências'),
    //        'Versão do Script',
    //        Boolean - Escolhe carregar Scripts no Header ou Footer
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

add_action('template_redirect', 'rw_relative_urls');
function rw_relative_urls()
{
    if(is_feed())
        return;

    $filters = array(
        'post_link',       // Normal post link
        'post_type_link',  // Custom post type link
        'page_link',       // Page link
        'attachment_link', // Attachment link
        'get_shortlink',   // Shortlink
        'post_type_archive_link',    // Post type archive link
        'get_pagenum_link',          // Paginated link
        'get_comments_pagenum_link', // Paginated comment link
        'term_link',   // Term link, including category, tag
        'search_link', // Search link
        'day_link',   // Date archive link
        'month_link',
        'year_link',
    );
    foreach ( $filters as $filter ) {
        add_filter( $filter, 'wp_make_link_relative' );
    }
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


function register_my_menu() {
    register_nav_menu('primary-menu',__( 'Primary Menu' ));
    register_nav_menu('secondary-menu',__( 'Secondary Menu' ));
}
add_action( 'init', 'register_my_menu' );


// Função que aprimora o uso do Title (Retirado do tema default do WP)
function vanilla_wp_title($title, $sep){
    global $page, $paged;

    if (is_feed()) {
        return $title;
    }

    $title .= get_bloginfo('name');

    $site_description = get_bloginfo('description', 'display');
    if ($site_description && (is_home() || is_front_page())) {
        $title = "$title $sep $site_description";
    }

    if ($paged >= 2 || $page >= 2) {
        $title = "$title $sep " . sprintf(__('Page %s', 'twentyfourteen'), max($paged, $page));
    }
    return $title;
}
add_filter('wp_title', 'vanilla_wp_title', 10, 2);
