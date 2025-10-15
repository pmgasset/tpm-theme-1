<?php
/**
 * Template part for displaying single post content
 *
 * @package JordanView
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="section section-light">
<div class="section-inner">
<div class="card-meta">
<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
<span aria-hidden="true">&bull;</span>
<?php the_category( ', ' ); ?>
</div>
<h1 class="section-title"><?php the_title(); ?></h1>
<?php if ( has_post_thumbnail() ) : ?>
<div class="hero-media" style="margin-top:2rem;">
<?php the_post_thumbnail( 'large' ); ?>
</div>
<?php endif; ?>
</div>
</header>

<section class="section section-muted">
<div class="section-inner">
<div class="entry-content">
<?php
the_content();
wp_link_pages( [
'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jordanview' ),
'after'  => '</div>',
] );
?>
</div>

<footer class="entry-footer">
<?php the_tags( '<span class="tags-links">', ', ', '</span>' ); ?>
</footer>
</div>
</section>
</article>
