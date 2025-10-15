<?php
/**
 * Testimonials section
 *
 * @package JordanView
 */

$testimonials = [
[
'quote'  => __( 'Every detail felt curated for gathering—sunrise coffee on the deck, movie nights in the lounge, and a concierge team that thought of everything.', 'jordanview' ),
'author' => __( 'Elena, Denver', 'jordanview' ),
],
[
'quote'  => __( 'The home is as breathtaking as the views. Our multi-generational trip was seamless with private suites and an elevator for easy access.', 'jordanview' ),
'author' => __( 'Marcus, Seattle', 'jordanview' ),
],
];
?>
<section class="section section-muted">
<div class="section-inner">
<header class="section-header">
<h2 class="section-title"><?php esc_html_e( 'Guest stories', 'jordanview' ); ?></h2>
<p class="section-subtitle"><?php esc_html_e( 'Trusted by families and corporate retreats who crave design-forward comfort in the mountains.', 'jordanview' ); ?></p>
</header>
<div class="testimonial-slider">
<?php foreach ( $testimonials as $testimonial ) : ?>
<blockquote class="testimonial">
<p><?php echo esc_html( $testimonial['quote'] ); ?></p>
<cite><?php echo esc_html( $testimonial['author'] ); ?></cite>
</blockquote>
<?php endforeach; ?>
</div>
</div>
</section>
