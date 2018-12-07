<?php
/**
 * sylvan functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sylvan
 */

if ( ! function_exists( 'sylvan_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sylvan_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on sylvan, use a find and replace
		 * to change 'sylvan' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sylvan', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 640, 640 ); // 50 pixels wide by 50 pixels tall, resize mode

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'sylvan' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'sylvan_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
		
		// Customize header image.
		add_theme_support( 'custom-header' );
		function themename_custom_header_setup() {
			$defaults = array(
			  // Default Header Image to display
			  'default-image'         => get_template_directory_uri() . '/images/headers/default.jpg',
			  // Display the header text along with the image
			  'header-text'           => false,
			  // Header text color default
			  'default-text-color'        => '000',
			  // Header image width (in pixels)
			  'width'             => 1000,
			  // Header image height (in pixels)
			  'height'            => 198,
			  // Header image random rotation default
			  'random-default'        => false,
			  // Enable upload of image file in admin 
			  'uploads'       => false,
			  // function to be called in theme head section
			  'wp-head-callback'      => 'wphead_cb',
			  //  function to be called in preview page head section
			  'admin-head-callback'       => 'adminhead_cb',
			  // function to produce preview markup in the admin screen
			  'admin-preview-callback'    => 'adminpreview_cb',
			  );
		}
		add_action( 'after_setup_theme', 'themename_custom_header_setup' );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'sylvan_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sylvan_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'sylvan_content_width', 640 );
}
add_action( 'after_setup_theme', 'sylvan_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sylvan_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sylvan' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'sylvan' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sylvan_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function load_fonts() {
	wp_register_style( 'et-googleFonts', 'https://fonts.googleapis.com/css?family=IM+Fell+English+SC' );
	wp_enqueue_style( 'et-googleFonts' );
}
add_action( 'wp_print_styles', 'load_fonts' );

function sylvan_scripts() {
	wp_enqueue_style( 'sylvan-style', get_stylesheet_uri() );

	wp_enqueue_script( 'sylvan-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'sylvan-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sylvan_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}



