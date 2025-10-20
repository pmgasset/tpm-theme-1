<?php
/**
 * Theme customizer additions
 *
 * @package JordanView
 */

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

function jordanview_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'jordanview_content_display_section', [
        'title'       => __( 'Content Display', 'jordanview' ),
        'priority'    => 25,
        'description' => __( 'Toggle the visibility of titles on pages and single posts.', 'jordanview' ),
    ] );

    $wp_customize->add_setting( 'jordanview_display_page_titles', [
        'default'           => true,
        'sanitize_callback' => 'jordanview_sanitize_checkbox',
    ] );

    $wp_customize->add_control( 'jordanview_display_page_titles', [
        'label'   => __( 'Show page titles', 'jordanview' ),
        'section' => 'jordanview_content_display_section',
        'type'    => 'checkbox',
    ] );

    $wp_customize->add_setting( 'jordanview_display_post_titles', [
        'default'           => true,
        'sanitize_callback' => 'jordanview_sanitize_checkbox',
    ] );

    $wp_customize->add_control( 'jordanview_display_post_titles', [
        'label'   => __( 'Show single post titles', 'jordanview' ),
        'section' => 'jordanview_content_display_section',
        'type'    => 'checkbox',
    ] );

    $wp_customize->add_section( 'jordanview_hero_section', [
        'title'       => __( 'Hero Section', 'jordanview' ),
        'priority'    => 30,
'description' => __( 'Customize the hero content that appears on the front page.', 'jordanview' ),
] );

$wp_customize->add_setting( 'jordanview_hero_title', [
'default'           => __( 'A mountainside escape in Park City', 'jordanview' ),
'sanitize_callback' => 'sanitize_text_field',
'transport'         => 'postMessage',
] );

$wp_customize->add_control( 'jordanview_hero_title', [
'label'   => __( 'Hero Title', 'jordanview' ),
'section' => 'jordanview_hero_section',
'type'    => 'text',
] );

$wp_customize->add_setting( 'jordanview_hero_subtitle', [
'default'           => __( 'Gather with friends and family in a modern home featuring sweeping views, luxury finishes, and thoughtful amenities.', 'jordanview' ),
'sanitize_callback' => 'wp_kses_post',
'transport'         => 'postMessage',
] );

$wp_customize->add_control( 'jordanview_hero_subtitle', [
'label'   => __( 'Hero Subtitle', 'jordanview' ),
'section' => 'jordanview_hero_section',
'type'    => 'textarea',
] );

$wp_customize->add_setting( 'jordanview_hero_cta_label', [
'default'           => __( 'Check Availability', 'jordanview' ),
'sanitize_callback' => 'sanitize_text_field',
] );

$wp_customize->add_control( 'jordanview_hero_cta_label', [
'label'   => __( 'Primary Button Label', 'jordanview' ),
'section' => 'jordanview_hero_section',
'type'    => 'text',
] );

$wp_customize->add_setting( 'jordanview_hero_cta_url', [
'default'           => '#',
'sanitize_callback' => 'esc_url_raw',
] );

$wp_customize->add_control( 'jordanview_hero_cta_url', [
'label'   => __( 'Primary Button URL', 'jordanview' ),
'section' => 'jordanview_hero_section',
'type'    => 'url',
] );

$wp_customize->add_setting( 'jordanview_hero_cta_alt', [
'default'           => __( 'Explore the Home Guide', 'jordanview' ),
'sanitize_callback' => 'sanitize_text_field',
] );

$wp_customize->add_control( 'jordanview_hero_cta_alt', [
'label'   => __( 'Secondary Button Label', 'jordanview' ),
'section' => 'jordanview_hero_section',
'type'    => 'text',
] );

$wp_customize->add_setting( 'jordanview_hero_cta_alturl', [
'default'           => '#',
'sanitize_callback' => 'esc_url_raw',
] );

$wp_customize->add_control( 'jordanview_hero_cta_alturl', [
'label'   => __( 'Secondary Button URL', 'jordanview' ),
'section' => 'jordanview_hero_section',
'type'    => 'url',
] );

$wp_customize->add_setting( 'jordanview_hero_image', [
'default'           => 0,
'sanitize_callback' => 'absint',
] );

$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'jordanview_hero_image', [
'label'     => __( 'Hero Image', 'jordanview' ),
'section'   => 'jordanview_hero_section',
'mime_type' => 'image',
] ) );

$wp_customize->add_section( 'jordanview_highlights_section', [
'title'       => __( 'Highlights Section', 'jordanview' ),
'priority'    => 35,
'description' => __( 'Update the highlight features showcased beneath the hero.', 'jordanview' ),
] );

$wp_customize->add_setting( 'jordanview_highlights_title', [
'default'           => __( 'Designed for unforgettable stays', 'jordanview' ),
'sanitize_callback' => 'sanitize_text_field',
] );

$wp_customize->add_control( 'jordanview_highlights_title', [
'label'   => __( 'Section Title', 'jordanview' ),
'section' => 'jordanview_highlights_section',
'type'    => 'text',
] );

$wp_customize->add_setting( 'jordanview_highlights_subtitle', [
'default'           => __( 'Spacious layouts, thoughtful amenities, and concierge-ready service make hosting effortless and relaxing.', 'jordanview' ),
'sanitize_callback' => 'sanitize_textarea_field',
] );

$wp_customize->add_control( 'jordanview_highlights_subtitle', [
'label'   => __( 'Section Subtitle', 'jordanview' ),
'section' => 'jordanview_highlights_section',
'type'    => 'textarea',
] );

$default_highlights = jordanview_get_default_highlights();

foreach ( $default_highlights as $index => $default_highlight ) {
$item_number = $index + 1;
$wp_customize->add_setting( "jordanview_highlight_{$item_number}_icon", [
'default'           => $default_highlight['icon'],
'sanitize_callback' => 'jordanview_sanitize_dashicon',
] );

$wp_customize->add_control( "jordanview_highlight_{$item_number}_icon", [
'label'       => sprintf( __( 'Highlight %d Icon', 'jordanview' ), $item_number ),
'description' => __( 'Enter a Dashicons class name (for example: dashicons-location).', 'jordanview' ),
'section'     => 'jordanview_highlights_section',
'type'        => 'text',
] );

    $wp_customize->add_setting( "jordanview_highlight_{$item_number}_title", [
        'default'           => $default_highlight['title'],
        'sanitize_callback' => 'sanitize_text_field',
    ] );

$wp_customize->add_control( "jordanview_highlight_{$item_number}_title", [
'label'   => sprintf( __( 'Highlight %d Title', 'jordanview' ), $item_number ),
'section' => 'jordanview_highlights_section',
'type'    => 'text',
] );

    $wp_customize->add_setting( "jordanview_highlight_{$item_number}_text", [
        'default'           => $default_highlight['text'],
        'sanitize_callback' => 'sanitize_textarea_field',
    ] );

$wp_customize->add_control( "jordanview_highlight_{$item_number}_text", [
'label'   => sprintf( __( 'Highlight %d Description', 'jordanview' ), $item_number ),
'section' => 'jordanview_highlights_section',
'type'    => 'textarea',
] );
}

$wp_customize->add_section( 'jordanview_amenities_section', [
'title'       => __( 'Amenities Section', 'jordanview' ),
'priority'    => 37,
'description' => __( 'Control the amenities cards displayed on the front page.', 'jordanview' ),
] );

$wp_customize->add_setting( 'jordanview_amenities_title', [
'default'           => __( 'Amenities that feel like home (but better)', 'jordanview' ),
'sanitize_callback' => 'sanitize_text_field',
] );

$wp_customize->add_control( 'jordanview_amenities_title', [
'label'   => __( 'Section Title', 'jordanview' ),
'section' => 'jordanview_amenities_section',
'type'    => 'text',
] );

$wp_customize->add_setting( 'jordanview_amenities_subtitle', [
'default'           => __( 'Every level is thoughtfully outfitted to make multi-generational stays seamless and memorable.', 'jordanview' ),
'sanitize_callback' => 'sanitize_textarea_field',
] );

$wp_customize->add_control( 'jordanview_amenities_subtitle', [
'label'   => __( 'Section Subtitle', 'jordanview' ),
'section' => 'jordanview_amenities_section',
'type'    => 'textarea',
] );

$default_amenities = jordanview_get_default_amenities();

foreach ( $default_amenities as $index => $default_amenity ) {
$item_number = $index + 1;
$wp_customize->add_setting( "jordanview_amenity_{$item_number}_image", [
'default'           => 0,
'sanitize_callback' => 'absint',
] );

$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, "jordanview_amenity_{$item_number}_image", [
'label'       => sprintf( __( 'Amenity %d Image', 'jordanview' ), $item_number ),
'description' => __( 'Upload an optional image to accompany this amenity.', 'jordanview' ),
'section'     => 'jordanview_amenities_section',
'mime_type'   => 'image',
] ) );

    $wp_customize->add_setting( "jordanview_amenity_{$item_number}_title", [
        'default'           => $default_amenity['title'],
        'sanitize_callback' => 'sanitize_text_field',
    ] );

$wp_customize->add_control( "jordanview_amenity_{$item_number}_title", [
'label'   => sprintf( __( 'Amenity %d Title', 'jordanview' ), $item_number ),
'section' => 'jordanview_amenities_section',
'type'    => 'text',
] );

    $wp_customize->add_setting( "jordanview_amenity_{$item_number}_text", [
        'default'           => $default_amenity['text'],
        'sanitize_callback' => 'sanitize_textarea_field',
    ] );

$wp_customize->add_control( "jordanview_amenity_{$item_number}_text", [
'label'   => sprintf( __( 'Amenity %d Description', 'jordanview' ), $item_number ),
'section' => 'jordanview_amenities_section',
'type'    => 'textarea',
] );
}

$wp_customize->add_section( 'jordanview_testimonials_section', [
'title'       => __( 'Testimonials Section', 'jordanview' ),
'priority'    => 38,
'description' => __( 'Manage the guest stories that appear on the front page.', 'jordanview' ),
] );

$wp_customize->add_setting( 'jordanview_testimonials_title', [
'default'           => __( 'Guest stories', 'jordanview' ),
'sanitize_callback' => 'sanitize_text_field',
] );

$wp_customize->add_control( 'jordanview_testimonials_title', [
'label'   => __( 'Section Title', 'jordanview' ),
'section' => 'jordanview_testimonials_section',
'type'    => 'text',
] );

$wp_customize->add_setting( 'jordanview_testimonials_subtitle', [
'default'           => __( 'Trusted by families and corporate retreats who crave design-forward comfort in the mountains.', 'jordanview' ),
'sanitize_callback' => 'sanitize_textarea_field',
] );

$wp_customize->add_control( 'jordanview_testimonials_subtitle', [
'label'   => __( 'Section Subtitle', 'jordanview' ),
'section' => 'jordanview_testimonials_section',
'type'    => 'textarea',
] );

$default_testimonials = jordanview_get_default_testimonials();

foreach ( $default_testimonials as $index => $default_testimonial ) {
$item_number = $index + 1;
    $wp_customize->add_setting( "jordanview_testimonial_{$item_number}_quote", [
        'default'           => $default_testimonial['quote'],
        'sanitize_callback' => 'sanitize_textarea_field',
    ] );

$wp_customize->add_control( "jordanview_testimonial_{$item_number}_quote", [
'label'   => sprintf( __( 'Testimonial %d Quote', 'jordanview' ), $item_number ),
'section' => 'jordanview_testimonials_section',
'type'    => 'textarea',
] );

    $wp_customize->add_setting( "jordanview_testimonial_{$item_number}_author", [
        'default'           => $default_testimonial['author'],
        'sanitize_callback' => 'sanitize_text_field',
    ] );

$wp_customize->add_control( "jordanview_testimonial_{$item_number}_author", [
'label'   => sprintf( __( 'Testimonial %d Author', 'jordanview' ), $item_number ),
'section' => 'jordanview_testimonials_section',
'type'    => 'text',
] );
}

    $wp_customize->add_section( 'jordanview_latest_stories_section', [
        'title'       => __( 'Latest Stories Section', 'jordanview' ),
        'priority'    => 39,
        'description' => __( 'Control the post grid displayed on the front page.', 'jordanview' ),
    ] );

    $wp_customize->add_setting( 'jordanview_latest_stories_title', [
        'default'           => __( 'Latest Stories', 'jordanview' ),
        'sanitize_callback' => 'sanitize_text_field',
    ] );

    $wp_customize->add_control( 'jordanview_latest_stories_title', [
        'label'   => __( 'Section Title', 'jordanview' ),
        'section' => 'jordanview_latest_stories_section',
        'type'    => 'text',
    ] );

    $wp_customize->add_setting( 'jordanview_latest_stories_subtitle', [
        'default'           => __( 'Get travel inspiration, insider tips, and updates from Park City and beyond.', 'jordanview' ),
        'sanitize_callback' => 'sanitize_textarea_field',
    ] );

    $wp_customize->add_control( 'jordanview_latest_stories_subtitle', [
        'label'   => __( 'Section Subtitle', 'jordanview' ),
        'section' => 'jordanview_latest_stories_section',
        'type'    => 'textarea',
    ] );

    $wp_customize->add_setting( 'jordanview_latest_stories_filter_type', [
        'default'           => 'none',
        'sanitize_callback' => 'jordanview_sanitize_select',
    ] );

    $wp_customize->add_control( 'jordanview_latest_stories_filter_type', [
        'label'       => __( 'Filter Posts By', 'jordanview' ),
        'section'     => 'jordanview_latest_stories_section',
        'type'        => 'select',
        'choices'     => [
            'none'     => __( 'Show all recent posts', 'jordanview' ),
            'category' => __( 'Specific category', 'jordanview' ),
            'tag'      => __( 'Specific tag', 'jordanview' ),
        ],
        'description' => __( 'Choose how to curate the posts featured on the homepage.', 'jordanview' ),
    ] );

    $categories        = get_categories( [ 'hide_empty' => false ] );
    $category_choices  = [ 0 => __( 'All categories', 'jordanview' ) ];
    foreach ( $categories as $category ) {
        $category_choices[ $category->term_id ] = $category->name;
    }

    $wp_customize->add_setting( 'jordanview_latest_stories_category', [
        'default'           => 0,
        'sanitize_callback' => 'absint',
    ] );

    $wp_customize->add_control( 'jordanview_latest_stories_category', [
        'label'           => __( 'Select Category', 'jordanview' ),
        'section'         => 'jordanview_latest_stories_section',
        'type'            => 'select',
        'choices'         => $category_choices,
        'active_callback' => function( $control ) {
            return 'category' === $control->manager->get_setting( 'jordanview_latest_stories_filter_type' )->value();
        },
    ] );

    $tags        = get_tags( [ 'hide_empty' => false ] );
    $tag_choices = [ 0 => __( 'All tags', 'jordanview' ) ];
    foreach ( $tags as $tag ) {
        $tag_choices[ $tag->term_id ] = $tag->name;
    }

    $wp_customize->add_setting( 'jordanview_latest_stories_tag', [
        'default'           => 0,
        'sanitize_callback' => 'absint',
    ] );

    $wp_customize->add_control( 'jordanview_latest_stories_tag', [
        'label'           => __( 'Select Tag', 'jordanview' ),
        'section'         => 'jordanview_latest_stories_section',
        'type'            => 'select',
        'choices'         => $tag_choices,
        'active_callback' => function( $control ) {
            return 'tag' === $control->manager->get_setting( 'jordanview_latest_stories_filter_type' )->value();
        },
    ] );

    $wp_customize->add_section( 'jordanview_booking_section', [
        'title'       => __( 'Booking Section', 'jordanview' ),
        'priority'    => 40,
        'description' => __( 'Control the call-to-action at the bottom of the front page.', 'jordanview' ),
    ] );

$wp_customize->add_setting( 'jordanview_booking_title', [
'default'           => __( 'Ready to experience Jordan View Retreat?', 'jordanview' ),
'sanitize_callback' => 'sanitize_text_field',
] );

$wp_customize->add_control( 'jordanview_booking_title', [
'label'   => __( 'Booking Title', 'jordanview' ),
'section' => 'jordanview_booking_section',
'type'    => 'text',
] );

$wp_customize->add_setting( 'jordanview_booking_text', [
'default'           => __( 'Tell us about your group, travel dates, and ideal stay—we\'ll handle the rest with a personalized itinerary.', 'jordanview' ),
'sanitize_callback' => 'wp_kses_post',
] );

$wp_customize->add_control( 'jordanview_booking_text', [
'label'   => __( 'Booking Description', 'jordanview' ),
'section' => 'jordanview_booking_section',
'type'    => 'textarea',
] );

$wp_customize->add_setting( 'jordanview_booking_label', [
'default'           => __( 'Inquire Now', 'jordanview' ),
'sanitize_callback' => 'sanitize_text_field',
] );

$wp_customize->add_control( 'jordanview_booking_label', [
'label'   => __( 'Booking Button Label', 'jordanview' ),
'section' => 'jordanview_booking_section',
'type'    => 'text',
] );

    $wp_customize->add_setting( 'jordanview_booking_url', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ] );

    $wp_customize->add_control( 'jordanview_booking_url', [
        'label'       => __( 'Booking Button URL', 'jordanview' ),
        'description' => __( 'Leave blank to use the site admin email address.', 'jordanview' ),
        'section'     => 'jordanview_booking_section',
        'type'        => 'url',
    ] );

    $wp_customize->add_setting( 'jordanview_booking_partners_title', [
        'default'           => __( 'Book with our trusted partners', 'jordanview' ),
        'sanitize_callback' => 'sanitize_text_field',
    ] );

    $wp_customize->add_control( 'jordanview_booking_partners_title', [
        'label'       => __( 'Partners Heading', 'jordanview' ),
        'description' => __( 'Displayed above the booking partner links.', 'jordanview' ),
        'section'     => 'jordanview_booking_section',
        'type'        => 'text',
    ] );

    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "jordanview_booking_partner_{$i}_label", [
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ] );

        $wp_customize->add_control( "jordanview_booking_partner_{$i}_label", [
            'label'       => sprintf( __( 'Partner %d Label', 'jordanview' ), $i ),
            'section'     => 'jordanview_booking_section',
            'type'        => 'text',
            'description' => __( 'Enter the partner name as it should appear on the homepage.', 'jordanview' ),
        ] );

        $wp_customize->add_setting( "jordanview_booking_partner_{$i}_url", [
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ] );

        $wp_customize->add_control( "jordanview_booking_partner_{$i}_url", [
            'label'   => sprintf( __( 'Partner %d URL', 'jordanview' ), $i ),
            'section' => 'jordanview_booking_section',
            'type'    => 'url',
        ] );
    }
}
add_action( 'customize_register', 'jordanview_customize_register' );

function jordanview_customize_preview_js() {
wp_enqueue_script( 'jordanview-customizer', get_template_directory_uri() . '/assets/js/customizer.js', [ 'customize-preview' ], wp_get_theme()->get( 'Version' ), true );
}
add_action( 'customize_preview_init', 'jordanview_customize_preview_js' );
