<?php
/**
 * Main template file
 *
 * @package JordanView
 */

global $wp_query;

get_header();

if ( have_posts() ) :
if ( is_home() && ! is_front_page() ) :
printf( '<header class="section section-light"><div class="section-inner"><h1 class="section-title">%s</h1></div></header>', esc_html( single_post_title( '', false ) ) );
endif;

echo '<section class="section section-muted"><div class="section-inner"><div class="card-grid">';

while ( have_posts() ) :
the_post();
get_template_part( 'template-parts/content', get_post_type() );
endwhile;

echo '</div>';

the_posts_pagination( [
'before_page_number' => '<span class="screen-reader-text">' . esc_html__( 'Page', 'jordanview' ) . ' </span>',
] );

echo '</div></section>';
else :
get_template_part( 'template-parts/content', 'none' );
endif;

get_footer();
