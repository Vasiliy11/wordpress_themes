<?php
/**
 * free-website functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package free-website
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

if (!function_exists('free_website_setup')):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function free_website_setup()
{
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on free-website, use a find and replace
         * to change 'free-website' to the name of your theme in all the template files.
         */
        load_theme_textdomain('free-website', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'Header' => esc_html__('Header menu', 'free-website'),
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'free_website_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height' => 250,
                'width' => 250,
                'flex-width' => true,
                'flex-height' => true,
            )
        );
    }
endif;
add_action('after_setup_theme', 'free_website_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function free_website_content_width()
{
    $GLOBALS['content_width'] = apply_filters('free_website_content_width', 640);
}
add_action('after_setup_theme', 'free_website_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function free_website_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'free-website'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'free-website'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}
add_action('widgets_init', 'free_website_widgets_init');

add_action('init', 'free_website_slides');

function free_website_slides()
{
    register_post_type('slides', array(
        'labels' => array(
            'name' => 'Слайди',
            'singular_name' => 'Слайд',
            'add_new' => __('Додати новий слайд', 'free_website'),
            'edit_item' => __('Редагувати слайд', 'free_website'),
            'view_item' => __('Переглянути', 'free_website'),
            'menu_name' => 'Слайдер',

        ),
        'public' => true,
        'menu_icon' => 'dashicons-universal-access',
    ));
}

/**
 * Enqueue scripts and styles.
 */
function free_website_scripts()
{
    wp_enqueue_style('free-website-style', get_stylesheet_uri());
    wp_enqueue_style('free-website-google-fonts', 'https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&family=Roboto:wght@400;500;700&display=swap');
    wp_enqueue_style('free-website-sfonts', get_template_directory_uri() . '/assets/css/fonts.css');
    wp_enqueue_style('free-website-fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css');
    wp_enqueue_style('free-website-formstyler', get_template_directory_uri() . '/assets/css/jquery.formstyler.css');
    wp_enqueue_style('free-website-normalize', get_template_directory_uri() . '/assets/css/normalize.css');
    wp_enqueue_style('free-website-slick', get_template_directory_uri() . '/assets/css/slick.css');

    wp_enqueue_script('free-website-jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), 1.0, true);
    wp_enqueue_script('free-website-fancybox-js', get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js', array('free-website-jquery'), 1.0, true);
    wp_enqueue_script('free-website-formstyler-js', get_template_directory_uri() . '/assets/js/jquery.formstyler.min.js', array(), 1.0, true);
    wp_enqueue_script('free-website-slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array('free-website-jquery'), 1.0, true);
    wp_enqueue_script('free-website-main-js', get_template_directory_uri() . '/assets/js/main.min.js', array(), 1.0, true);
}
add_action('wp_enqueue_scripts', 'free_website_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}
