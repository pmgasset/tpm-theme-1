<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package JordanView
 */

global $wp_query;

get_header();
?>
<section class="section section-light">
<div class="section-inner">
<h1 class="section-title"><?php esc_html_e( 'Lost your way?', 'jordanview' ); ?></h1>
<p class="section-subtitle"><?php esc_html_e( 'The view you were looking for isn\'t here, but let\'s get you back on track.', 'jordanview' ); ?></p>
<?php get_search_form(); ?>
<p><a class="hero-cta-secondary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Return home', 'jordanview' ); ?></a></p>
</div>
</section>
<?php
get_footer();
