<?php
/**
 * The template for displaying all single posts
 *
 * @package JordanView
 */

global $wp_query;

get_header();

while ( have_posts() ) :
the_post();
if ( 'post' === get_post_type() ) {
get_template_part( 'template-parts/content', 'single' );
} else {
get_template_part( 'template-parts/content', get_post_type() );
}

the_post_navigation( [
'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous', 'jordanview' ) . '</span> <span class="nav-title">%title</span>',
'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next', 'jordanview' ) . '</span> <span class="nav-title">%title</span>',
] );

if ( comments_open() || get_comments_number() ) {
comments_template();
}
endwhile;

get_footer();
