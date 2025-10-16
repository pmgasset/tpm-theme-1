<?php
/**
 * Template part for displaying a "No posts found" message.
 *
 * @package JordanView
 */
?>
<section class="section section-light">
<div class="section-inner">
<h2 class="section-title"><?php esc_html_e( 'Nothing to display just yet', 'jordanview' ); ?></h2>
<p class="section-subtitle"><?php esc_html_e( 'Check back soon for new stories, or use the search to find what you need.', 'jordanview' ); ?></p>
<?php get_search_form(); ?>
</div>
</section>
