<?php
/**
 * Highlights section
 *
 * @package JordanView
 */

$highlights = [
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
?>
<section class="section section-muted">
<div class="section-inner">
<header class="section-header">
<h2 class="section-title"><?php esc_html_e( 'Designed for unforgettable stays', 'jordanview' ); ?></h2>
<p class="section-subtitle"><?php esc_html_e( 'Spacious layouts, thoughtful amenities, and concierge-ready service make hosting effortless and relaxing.', 'jordanview' ); ?></p>
</header>
<div class="amenities-grid">
<?php foreach ( $highlights as $highlight ) : ?>
<div class="amenity">
<span class="amenity-icon dashicons <?php echo esc_attr( $highlight['icon'] ); ?>" aria-hidden="true"></span>
<div>
<h3><?php echo esc_html( $highlight['title'] ); ?></h3>
<p><?php echo esc_html( $highlight['text'] ); ?></p>
</div>
</div>
<?php endforeach; ?>
</div>
</div>
</section>
