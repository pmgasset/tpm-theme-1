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

if ( ! function_exists( 'jordanview_get_default_highlights' ) ) {
    /**
     * Default highlight items for the front page.
     *
     * @return array[]
     */
    function jordanview_get_default_highlights() {
        return [
            [
                'icon'  => 'dashicons-location',
                'title' => __( 'Minutes to Park City Mountain', 'jordanview' ),
                'text'  => __( 'Ski-in, explore Main Street, and experience year-round adventure from an unbeatable basecamp.', 'jordanview' ),
            ],
            [
                'icon'  => 'dashicons-admin-multisite',
                'title' => __( 'Panoramic great room', 'jordanview' ),
                'text'  => __( 'Floor-to-ceiling glass and an expansive deck bring Wasatch Range views to every gathering.', 'jordanview' ),
            ],
            [
                'icon'  => 'dashicons-heart',
                'title' => __( 'Curated comforts', 'jordanview' ),
                'text'  => __( 'Private hot tub, spa-inspired suites, chef-ready kitchen, and smart home technology.', 'jordanview' ),
            ],
        ];
    }
}

if ( ! function_exists( 'jordanview_get_default_amenities' ) ) {
    /**
     * Default amenity card content.
     *
     * @return array[]
     */
    function jordanview_get_default_amenities() {
        return [
            [
                'title' => __( 'Gourmet kitchen', 'jordanview' ),
                'text'  => __( 'Double ovens, high-end appliances, and an oversized island welcome dinner parties and après ski spreads.', 'jordanview' ),
            ],
            [
                'title' => __( 'Spa-worthy suites', 'jordanview' ),
                'text'  => __( 'Private balconies, soaking tubs, and premium linens create restful sanctuaries for every guest.', 'jordanview' ),
            ],
            [
                'title' => __( 'Entertainment lounge', 'jordanview' ),
                'text'  => __( 'Bunk suite, game room, theater setup, and walk-out patio keep every generation entertained.', 'jordanview' ),
            ],
        ];
    }
}

if ( ! function_exists( 'jordanview_get_default_testimonials' ) ) {
    /**
     * Default testimonials content.
     *
     * @return array[]
     */
    function jordanview_get_default_testimonials() {
        return [
            [
                'quote'  => __( 'Every detail felt curated for gathering—sunrise coffee on the deck, movie nights in the lounge, and a concierge team that thought of everything.', 'jordanview' ),
                'author' => __( 'Elena, Denver', 'jordanview' ),
            ],
            [
                'quote'  => __( 'The home is as breathtaking as the views. Our multi-generational trip was seamless with private suites and an elevator for easy access.', 'jordanview' ),
                'author' => __( 'Marcus, Seattle', 'jordanview' ),
            ],
        ];
    }
}

if ( ! function_exists( 'jordanview_sanitize_dashicon' ) ) {
    /**
     * Ensure dashicon class names remain safe.
     *
     * @param string $value Raw value from the customizer.
     * @return string
     */
    function jordanview_sanitize_dashicon( $value ) {
        $value = sanitize_text_field( $value );
        if ( '' === $value ) {
            return '';
        }
        if ( 0 !== strpos( $value, 'dashicons-' ) ) {
            $value = 'dashicons-' . $value;
        }
        return preg_match( '/^dashicons-[a-z0-9\-]+$/', $value ) ? $value : '';
}
}

if ( ! function_exists( 'jordanview_sanitize_checkbox' ) ) {
    /**
     * Sanitize checkbox values from the Customizer.
     *
     * @param mixed $checked The value to sanitize.
     * @return bool
     */
    function jordanview_sanitize_checkbox( $checked ) {
        return ( isset( $checked ) && ( true === $checked || '1' === $checked || 1 === $checked ) );
    }
}

if ( ! function_exists( 'jordanview_sanitize_select' ) ) {
    /**
     * Sanitize select controls by ensuring the value is one of the allowed choices.
     *
     * @param string                $value   Selected value.
     * @param WP_Customize_Setting $setting Setting instance.
     * @return string
     */
    function jordanview_sanitize_select( $value, $setting ) {
        $value   = sanitize_text_field( $value );
        $control = $setting->manager->get_control( $setting->id );

        if ( ! $control || empty( $control->choices ) ) {
            return $setting->default;
        }

        return array_key_exists( $value, $control->choices ) ? $value : $setting->default;
    }
}

require get_template_directory() . '/inc/customizer.php';

function jordanview_fallback_menu() {
echo '<ul class="menu">';
echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Assign a menu', 'jordanview' ) . '</a></li>';
echo '</ul>';
}
