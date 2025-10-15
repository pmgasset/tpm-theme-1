<?php
/**
 * Testimonials section
 *
 * @package JordanView
 */

$section_title    = get_theme_mod( 'jordanview_testimonials_title', __( 'Guest stories', 'jordanview' ) );
$section_subtitle = get_theme_mod( 'jordanview_testimonials_subtitle', __( 'Trusted by families and corporate retreats who crave design-forward comfort in the mountains.', 'jordanview' ) );

$default_testimonials = jordanview_get_default_testimonials();
$testimonials         = [];

foreach ( $default_testimonials as $index => $default_testimonial ) {
    $item_number   = $index + 1;
    $testimonials[] = [
        'quote'  => get_theme_mod( "jordanview_testimonial_{$item_number}_quote", $default_testimonial['quote'] ),
        'author' => get_theme_mod( "jordanview_testimonial_{$item_number}_author", $default_testimonial['author'] ),
    ];
}

$testimonials = array_filter(
    $testimonials,
    function ( $testimonial ) {
        return ! empty( $testimonial['quote'] );
    }
);

if ( empty( $testimonials ) ) {
    return;
}
?>
<section class="section section-muted">
    <div class="section-inner">
        <?php if ( ! empty( $section_title ) || ! empty( $section_subtitle ) ) : ?>
            <header class="section-header">
                <?php if ( ! empty( $section_title ) ) : ?>
                    <h2 class="section-title"><?php echo esc_html( $section_title ); ?></h2>
                <?php endif; ?>
                <?php if ( ! empty( $section_subtitle ) ) : ?>
                    <p class="section-subtitle"><?php echo esc_html( $section_subtitle ); ?></p>
                <?php endif; ?>
            </header>
        <?php endif; ?>
        <div class="testimonial-slider">
            <?php foreach ( $testimonials as $testimonial ) : ?>
                <blockquote class="testimonial">
                    <p><?php echo esc_html( $testimonial['quote'] ); ?></p>
                    <?php if ( ! empty( $testimonial['author'] ) ) : ?>
                        <cite><?php echo esc_html( $testimonial['author'] ); ?></cite>
                    <?php endif; ?>
                </blockquote>
            <?php endforeach; ?>
        </div>
    </div>
</section>
