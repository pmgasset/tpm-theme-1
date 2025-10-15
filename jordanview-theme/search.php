<?php
/**
 * The template for displaying search results
 *
 * @package JordanView
 */

global $wp_query;

get_header();
?>
<header class="section section-light">
<div class="section-inner">
<h1 class="section-title"><?php printf( esc_html__( 'Search results for "%s"', 'jordanview' ), get_search_query() ); ?></h1>
</div>
</header>
<?php
if ( have_posts() ) :
?>
<section class="section section-muted">
<div class="section-inner">
<div class="card-grid">
<?php
while ( have_posts() ) :
the_post();
get_template_part( 'template-parts/content', get_post_type() );
endwhile;
?>
</div>
<?php the_posts_pagination(); ?>
</div>
</section>
<?php
else :
get_template_part( 'template-parts/content', 'none' );
endif;

get_footer();
