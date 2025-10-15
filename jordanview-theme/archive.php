<?php
/**
 * The template for displaying archive pages
 *
 * @package JordanView
 */

global $wp_query;

get_header();

if ( have_posts() ) :
?>
<header class="section section-light">
<div class="section-inner">
<h1 class="section-title"><?php the_archive_title(); ?></h1>
<div class="section-subtitle"><?php the_archive_description(); ?></div>
</div>
</header>
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
