<?php

if ( ! defined( 'TAILWINDWP_VERSION' ) ) {
	define( 'TAILWINDWP_VERSION', '1.0.0' );
}

if ( ! function_exists( 'tailwind_wp_setup' ) ) :
	function tailwind_wp_setup() {
		load_theme_textdomain( 'web-g', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		// add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'header' => esc_html__( 'Header', 'web-g' ),
        'header_bottom' => esc_html__( 'Header Bottom', 'web-g' ),
        'mobile' => esc_html__( 'Mobile', 'web-g' ),
        'footer_info' => esc_html__( 'Footer info', 'web-g' ),
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
				'ginfo_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

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
endif;
add_action( 'after_setup_theme', 'tailwind_wp_setup' );

function tarakan_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tarakan_content_width', 640 );
}
add_action( 'after_setup_theme', 'tarakan_content_width', 0 );

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once __DIR__ . '/vendor/autoload.php';
    \Carbon_Fields\Carbon_Fields::boot();
    require_once get_template_directory() . '/inc/custom-fields/settings-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/post-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/page-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/term-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/user-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/gutenberg-blocks.php';
}

require_once get_template_directory() . '/inc/share-buttons.php';
require_once get_template_directory() . '/inc/template-functions/post-vote.php';
require_once get_template_directory() . '/inc/template-functions/footer-links.php';

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

function itsme_disable_feed() {
 wp_die( __( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!' ) );
}

add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );

add_filter( 'xmlrpc_enabled', '__return_false' );

add_action( 'wp_enqueue_scripts', 'remove_global_styles' );
function remove_global_styles(){
  wp_dequeue_style( 'global-styles' );
}


include('inc/enqueues.php');

/**
 * Enqueue scripts and styles.
 */
function tailwindwp_scripts() {
	wp_enqueue_style( 'tailwind', get_stylesheet_directory_uri() . '/build/tailwind.css', false, time() );
	wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/build/style.css', false, time() );
	// wp_enqueue_script( 'jquery' );
 //  wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'all-scripts', get_template_directory_uri() . '/build/scripts.js', '','',true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tailwindwp_scripts' );


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

require get_template_directory() . '/inc/comments-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


// Создаем новый тип записи - объявления
function create_post_type() {
  register_post_type( 'questions',
    array(
      'labels' => array(
          'name' => __( 'Вопросы' ),
          'singular_name' => __( 'Вопрос' )
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'show_in_rest' => false,
      'menu_icon' => 'dashicons-megaphone',
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'revisions' ),
    )
  );
}
add_action( 'init', 'create_post_type' );

// Создаем счетчик для записей
function tutCount($post_id) {
  
  if ( metadata_exists( 'post', $post_id, 'post_count' ) ) {
    $count_value = get_post_meta( $post_id, 'post_count', true );
    $count_value = $count_value + 1;
    update_post_meta( $post_id, 'post_count', $count_value );
  } else {
    $rand_post_count = mt_rand(50, 144);
    add_post_meta( $post_id, 'post_count', $rand_post_count, true);
  }
  $post_count = get_post_meta( $post_id, 'post_count', true );
  return $post_count;
  
}

function get_page_url($template_name) {
  $pages = get_posts([
    'post_type' => 'page',
    'post_status' => 'publish',
    'meta_query' => [
      [
        'key' => '_wp_page_template',
        'value' => $template_name.'.php',
        'compare' => '='
      ]
    ]
  ]);
  if(!empty($pages))
  {
    foreach($pages as $pages__value)
    {
      return get_permalink($pages__value->ID);
    }
  }
  return get_bloginfo('url');
}

//Add Ajax
add_action('wp_head', 'myplugin_ajaxurl');
function myplugin_ajaxurl() {
  echo '<script type="text/javascript">
    var ajaxurl = "' . admin_url('admin-ajax.php') . '";
  </script>';
}

add_filter('get_the_archive_title', function ($title) {
  if (is_category()) {
    $title = single_cat_title('', false);
  } elseif (is_tag()) {
    $title = single_tag_title('', false);
  } elseif (is_author()) {
    $title = '<span class="vcard">' . get_the_author() . '</span>';
  } elseif (is_tax()) { //for custom post types
    $title = sprintf(__('%1$s'), single_term_title('', false));
  } elseif (is_post_type_archive()) {
    $title = post_type_archive_title('', false);
  }
  return $title;
});

//Carbonfields + Polylang
function crb_get_i18n_suffix() {
  $suffix = '';
  if ( ! defined( 'ICL_LANGUAGE_CODE' ) ) {
    return $suffix;
  }
  $suffix = '_' . ICL_LANGUAGE_CODE;
  return $suffix;
}

function crb_get_i18n_theme_option( $option_name ) {
  $suffix = crb_get_i18n_suffix();
  return carbon_get_theme_option( $option_name . $suffix );
}

// Задаємо дефолтное значення всім записам
// add_action( 'init', 'add_meta_query_mainhide');
// function add_meta_query_mainhide() {
//   $posts_args = array('numberposts' => -1);
//   $all_posts = get_posts($posts_args);
//   foreach ($all_posts as $post) {
//     $post_id = $post->ID;
//     update_post_meta($post_id, '_crb_post_mainhide', 'no');
//   }
// }