<?php
/**
 * Highlights section
 *
 * @package JordanView
 */

$section_title    = get_theme_mod( 'jordanview_highlights_title', __( 'Designed for unforgettable stays', 'jordanview' ) );
$section_subtitle = get_theme_mod( 'jordanview_highlights_subtitle', __( 'Spacious layouts, thoughtful amenities, and concierge-ready service make hosting effortless and relaxing.', 'jordanview' ) );

$default_highlights = jordanview_get_default_highlights();
$highlights         = [];

foreach ( $default_highlights as $index => $default_highlight ) {
    $item_number      = $index + 1;
    $highlights[] = [
        'icon'  => get_theme_mod( "jordanview_highlight_{$item_number}_icon", $default_highlight['icon'] ),
        'title' => get_theme_mod( "jordanview_highlight_{$item_number}_title", $default_highlight['title'] ),
        'text'  => get_theme_mod( "jordanview_highlight_{$item_number}_text", $default_highlight['text'] ),
    ];
}

$highlights = array_filter(
    $highlights,
    function ( $highlight ) {
        return ! empty( $highlight['title'] ) || ! empty( $highlight['text'] );
    }
);

if ( empty( $highlights ) ) {
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
        <div class="amenities-grid">
            <?php foreach ( $highlights as $highlight ) : ?>
                <div class="amenity">
                    <?php if ( ! empty( $highlight['icon'] ) ) : ?>
                        <span class="amenity-icon dashicons <?php echo esc_attr( $highlight['icon'] ); ?>" aria-hidden="true"></span>
                    <?php endif; ?>
                    <div>
                        <?php if ( ! empty( $highlight['title'] ) ) : ?>
                            <h3><?php echo esc_html( $highlight['title'] ); ?></h3>
                        <?php endif; ?>
                        <?php if ( ! empty( $highlight['text'] ) ) : ?>
                            <p><?php echo esc_html( $highlight['text'] ); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
