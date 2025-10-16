<?php
/**
 * Booking CTA section
 *
 * @package JordanView
 */

$booking_title = get_theme_mod( 'jordanview_booking_title', __( 'Ready to experience Jordan View Retreat?', 'jordanview' ) );
$booking_text  = get_theme_mod( 'jordanview_booking_text', __( 'Tell us about your group, travel dates, and ideal stay—we\'ll handle the rest with a personalized itinerary.', 'jordanview' ) );
$booking_label = get_theme_mod( 'jordanview_booking_label', __( 'Inquire Now', 'jordanview' ) );
$booking_url   = get_theme_mod( 'jordanview_booking_url', 'mailto:' . get_option( 'admin_email' ) );
?>
<section class="section section-light">
<div class="section-inner">
<div class="booking-card">
<h2><?php echo esc_html( $booking_title ); ?></h2>
<p><?php echo esc_html( $booking_text ); ?></p>
<a class="button" href="<?php echo esc_url( $booking_url ); ?>"><?php echo esc_html( $booking_label ); ?></a>
</div>
</div>
</section>
