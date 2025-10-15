<?php
/**
 * Jordan View Retreat functions and definitions
 *
 * @package JordanView
 */

if ( ! defined( 'ABSPATH' ) ) {
exit; // Exit if accessed directly.
}

if ( ! function_exists( 'jordanview_setup' ) ) {
function jordanview_setup() {
load_theme_textdomain( 'jordanview', get_template_directory() . '/languages' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'editor-styles' );
add_theme_support( 'responsive-embeds' );
add_theme_support( 'wp-block-styles' );
add_theme_support( 'align-wide' );
add_theme_support( 'custom-logo', [
'height'      => 160,
'width'       => 160,
'flex-height' => true,
'flex-width'  => true,
] );

register_nav_menus( [
'primary' => __( 'Primary Menu', 'jordanview' ),
'footer'  => __( 'Footer Menu', 'jordanview' ),
] );

add_image_size( 'jordanview-card', 640, 480, true );
}
}
add_action( 'after_setup_theme', 'jordanview_setup' );

function jordanview_scripts() {
$theme_version = wp_get_theme()->get( 'Version' );

wp_enqueue_style( 'jordanview-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap', [], null );
wp_enqueue_style( 'dashicons' );
wp_enqueue_style( 'jordanview-style', get_stylesheet_uri(), [], $theme_version );

wp_enqueue_script( 'jordanview-navigation', get_template_directory_uri() . '/assets/js/navigation.js', [], $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'jordanview_scripts' );

function jordanview_widgets_init() {
register_sidebar( [
'name'          => __( 'Footer Column 1', 'jordanview' ),
'id'            => 'footer-1',
'description'   => __( 'Appears in the first column of the footer.', 'jordanview' ),
'before_widget' => '<section id="%1$s" class="widget %2$s">',
'after_widget'  => '</section>',
'before_title'  => '<h2 class="widget-title">',
'after_title'   => '</h2>',
] );

register_sidebar( [
'name'          => __( 'Footer Column 2', 'jordanview' ),
'id'            => 'footer-2',
'description'   => __( 'Appears in the second column of the footer.', 'jordanview' ),
'before_widget' => '<section id="%1$s" class="widget %2$s">',
'after_widget'  => '</section>',
'before_title'  => '<h2 class="widget-title">',
'after_title'   => '</h2>',
] );

register_sidebar( [
'name'          => __( 'Footer Column 3', 'jordanview' ),
'id'            => 'footer-3',
'description'   => __( 'Appears in the third column of the footer.', 'jordanview' ),
'before_widget' => '<section id="%1$s" class="widget %2$s">',
'after_widget'  => '</section>',
'before_title'  => '<h2 class="widget-title">',
'after_title'   => '</h2>',
] );
}
add_action( 'widgets_init', 'jordanview_widgets_init' );

require get_template_directory() . '/inc/customizer.php';

function jordanview_fallback_menu() {
echo '<ul class="menu">';
echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Assign a menu', 'jordanview' ) . '</a></li>';
echo '</ul>';
}
