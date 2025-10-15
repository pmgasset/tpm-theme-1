<?php
/**
 * Amenities section
 *
 * @package JordanView
 */

$section_title    = get_theme_mod( 'jordanview_amenities_title', __( 'Amenities that feel like home (but better)', 'jordanview' ) );
$section_subtitle = get_theme_mod( 'jordanview_amenities_subtitle', __( 'Every level is thoughtfully outfitted to make multi-generational stays seamless and memorable.', 'jordanview' ) );

$default_amenities = jordanview_get_default_amenities();
$amenities         = [];

foreach ( $default_amenities as $index => $default_amenity ) {
    $item_number = $index + 1;
    $amenities[] = [
        'image_id' => get_theme_mod( "jordanview_amenity_{$item_number}_image", 0 ),
        'title'    => get_theme_mod( "jordanview_amenity_{$item_number}_title", $default_amenity['title'] ),
        'text'     => get_theme_mod( "jordanview_amenity_{$item_number}_text", $default_amenity['text'] ),
    ];
}

$amenities = array_filter(
    $amenities,
    function ( $amenity ) {
        return ! empty( $amenity['title'] ) || ! empty( $amenity['text'] ) || ! empty( $amenity['image_id'] );
    }
);

if ( empty( $amenities ) ) {
    return;
}

$placeholder = get_template_directory_uri() . '/assets/images/placeholder-hero.svg';
?>
<section class="section section-light">
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
        <div class="card-grid">
            <?php foreach ( $amenities as $amenity ) :
                $image_html = '';

                if ( ! empty( $amenity['image_id'] ) ) {
                    $image_html = wp_get_attachment_image( $amenity['image_id'], 'jordanview-card', false, [
                        'alt' => ! empty( $amenity['title'] ) ? $amenity['title'] : '',
                    ] );
                }

                if ( empty( $image_html ) ) {
                    $image_html = sprintf(
                        '<img src="%1$s" alt="%2$s">',
                        esc_url( $placeholder ),
                        esc_attr( ! empty( $amenity['title'] ) ? $amenity['title'] : __( 'Vacation rental amenity', 'jordanview' ) )
                    );
                }
                ?>
                <div class="card">
                    <?php echo $image_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    <div class="card-content">
                        <?php if ( ! empty( $amenity['title'] ) ) : ?>
                            <h3 class="card-title"><?php echo esc_html( $amenity['title'] ); ?></h3>
                        <?php endif; ?>
                        <?php if ( ! empty( $amenity['text'] ) ) : ?>
                            <p><?php echo esc_html( $amenity['text'] ); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
