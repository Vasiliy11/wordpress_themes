<?php

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'flexbox_website_setup' ) ) :
	
	function flexbox_website_setup() {
		
		load_theme_textdomain( 'flexbox-website', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'header_menu' => esc_html__( 'Header', 'flexbox-website' ),
				'footer_menu' => esc_html__( 'Footer', 'flexbox-website' ),
			)
		);

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

		add_theme_support(
			'custom-background',
			apply_filters(
				'flexbox_website_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 200,
				'width'       => 80,
				'flex-width'  => false,
				'flex-height' => true,
			)
		);
		
	}
endif;
add_action( 'after_setup_theme', 'flexbox_website_setup' );

add_action('init', 'flexbox_website_reviews');
function flexbox_website_reviews() {
	register_post_type('reviews', array(
		'labels'      		 => array(
			'name'    		 => 'Відгуки',
			'singular_name'  => 'Відгук',
			'add_new'  		 => __('Додати новий відгук', 'flexbox_website'),
			'edit_item'  		 => __('Редагувати відгук', 'flexbox_website'),
			'view_item'  		 => __('Переглянути', 'flexbox_website'),
			'menu_name'  		 =>'Відгуки відвідувачів',

		),
		'public'			=> true,
		'menu_icon'			=> 'dashicons-universal-access'
	));

	
}

add_action('init', 'flexbox_website_rooms');
	function flexbox_website_rooms() {
	register_post_type('rooms', array(
		'labels'      		 => array(
			'name'    		 => 'Номери',
			'singular_name'  => 'Номер',
			'add_new'  		 => __('Додати новий номер', 'flexbox_website'),
			'edit_item'  		 => __('Редагувати номер', 'flexbox_website'),
			'view_item'  		 => __('Переглянути', 'flexbox_website'),
			'menu_name'  		 =>'Карти номерів',

		),
		'public'			=> true,
		'menu_icon'			=> 'dashicons-edit-page'
	));
}

function flexbox_website_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'flexbox_website_content_width', 640 );
}
add_action( 'after_setup_theme', 'flexbox_website_content_width', 0 );

function flexbox_website_widgets_init() {
	// register_sidebar(
	// 	array(
	// 		'name'          => esc_html__( 'Sidebar', 'flexbox-website' ),
	// 		'id'            => 'sidebar-1',
	// 		'description'   => esc_html__( 'Add widgets here.', 'flexbox-website' ),
	// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
	// 		'after_widget'  => '</section>',
	// 		'before_title'  => '<h2 class="widget-title">',
	// 		'after_title'   => '</h2>',
	// 	)
	// );
}
add_action( 'widgets_init', 'flexbox_website_widgets_init' );

function flexbox_website_scripts() {
	wp_enqueue_style( 'flexbox-website-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'flexbox-website-fonts', 'https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
	wp_style_add_data( 'flexbox-website-style', 'rtl', 'replace' );

	wp_enqueue_script( 'flexbox-website-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'flexbox-website-icons', 'https://kit.fontawesome.com/c1f01b10ef.js');
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'flexbox_website_scripts' );

require get_template_directory() . '/inc/custom-header.php';

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/customizer.php';

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 3);

function filter_nav_menu_link_attributes($atts, $item, $args) {
	if ($args->menu === 'Main') {
		$atts['class'] = 'navigation-link';
	};
	if ($args->menu === 'Footer_main') {
		$atts['class'] = 'footer-list__link';
	};
	return $atts;
}

add_filter( 'nav_menu_css_class', 'change_menu_item_css_classes', 10, 4 );

function change_menu_item_css_classes( $classes, $item, $args, $depth ) {
	if ($args->menu === 'Main'){
		$classes[] = 'navigation-item';
	};
	if ($args->menu === 'Footer_main'){
		$classes[] = 'footer-list__item';
	};

	return $classes;
}
