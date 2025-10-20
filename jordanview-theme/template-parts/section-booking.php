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
$partners_title = get_theme_mod( 'jordanview_booking_partners_title', __( 'Book with our trusted partners', 'jordanview' ) );
$partners       = [];

for ( $i = 1; $i <= 3; $i++ ) {
    $partner_label = get_theme_mod( "jordanview_booking_partner_{$i}_label", '' );
    $partner_url   = get_theme_mod( "jordanview_booking_partner_{$i}_url", '' );

    if ( $partner_label && $partner_url ) {
        $partners[] = [
            'label' => $partner_label,
            'url'   => $partner_url,
        ];
    }
}
?>
<section class="section section-light">
<div class="section-inner">
<div class="booking-card">
<h2><?php echo esc_html( $booking_title ); ?></h2>
<p><?php echo esc_html( $booking_text ); ?></p>
<a class="button" href="<?php echo esc_url( $booking_url ); ?>"><?php echo esc_html( $booking_label ); ?></a>
</div>
<?php if ( ! empty( $partners ) ) : ?>
<div class="booking-partners">
<h3 class="booking-partners-title"><?php echo esc_html( $partners_title ); ?></h3>
<ul class="booking-partners-list">
<?php foreach ( $partners as $partner ) : ?>
<li><a href="<?php echo esc_url( $partner['url'] ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $partner['label'] ); ?></a></li>
<?php endforeach; ?>
</ul>
</div>
<?php endif; ?>
</div>
</section>
