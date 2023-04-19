<?php
/**
 * Smooth Step functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Smooth_Step
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sstep_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Smooth Step, use a find and replace
		* to change 'sstep' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'sstep', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'sstep' ),
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
			'sstep_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'sstep_setup' );

if ( ! function_exists( 'sstep_add_image_size' ) ) :
	function sstep_add_image_size() {
		add_image_size( 'step-book', 360, 250, true );
		// add_image_size( 'alterra-thumb', 405, 211, true );
	}
endif;
add_action( 'after_setup_theme', 'sstep_add_image_size' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sstep_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sstep_content_width', 640 );
}
add_action( 'after_setup_theme', 'sstep_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sstep_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sstep' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'sstep' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sstep_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sstep_scripts() {
	//$_SERVER['SERVER_NAME'] == 'localhost'
	wp_enqueue_style( 'sstep-aos', get_template_directory_uri() . '/assets/vendor/aos/aos.css', array(), _S_VERSION);
	wp_enqueue_style( 'sstep-tailwind', get_template_directory_uri() . '/assets/style.css', array(), _S_VERSION);
	
	 wp_enqueue_style( 'sstep-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_script( 'sstep-jquery', get_template_directory_uri() . '/assets/vendor/jquery.min.js', array(), _S_VERSION, false );
	wp_enqueue_script( 'sstep-aos', get_template_directory_uri() . '/assets/vendor/aos/aos.js', array(), _S_VERSION, false );
	wp_enqueue_script( 'sstep-flickity', get_template_directory_uri() . '/assets/vendor/flickity/flickity.pkgd.min.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'sstep_scripts' );

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
 * Instagram
 */
require get_template_directory() . '/inc/igfeed/class-igfeed-api.php';


/**
 * ACF  
 */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

function booknow($title) {
	$no = get_field("no_whatsapp", "option");
	$msg = "I want to book ".$title;
	echo 'https://api.whatsapp.com/send?phone='.$no.'&text='.$msg;
}


// Trim
function sstep_blurb($trim = 20, $contents = null) {
	global $post;

	if ($contents) {
		$content = strip_tags($contents);
	} else {
		$content = strip_tags($post->post_content);
	}

	if ($content) {
		$old_arr = array_map('trim', explode(' ', $content));
		$new_arr = array_slice($old_arr, 0, $trim);

		$content = implode(' ',$new_arr).' ...';
		return $content;
	}
	return '';
}  
