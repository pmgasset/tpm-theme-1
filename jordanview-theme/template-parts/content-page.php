<?php
/**
 * Template part for displaying page content
 *
 * @package JordanView
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php $show_page_title = get_theme_mod( 'jordanview_display_page_titles', true ); ?>
<?php if ( $show_page_title ) : ?>
<header class="section section-light">
<div class="section-inner">
<h1 class="section-title"><?php the_title(); ?></h1>
</div>
</header>
<?php endif; ?>

<section class="section section-muted">
<div class="section-inner">
<div class="entry-content">
<?php the_content(); ?>
</div>
</div>
</section>
</article>
