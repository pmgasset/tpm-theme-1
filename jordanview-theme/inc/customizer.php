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
'label'   => __( 'Hero Image', 'jordanview' ),
'section' => 'jordanview_hero_section',
'mime_type' => 'image',
] ) );

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
}
add_action( 'customize_register', 'jordanview_customize_register' );

function jordanview_customize_preview_js() {
wp_enqueue_script( 'jordanview-customizer', get_template_directory_uri() . '/assets/js/customizer.js', [ 'customize-preview' ], wp_get_theme()->get( 'Version' ), true );
}
add_action( 'customize_preview_init', 'jordanview_customize_preview_js' );
