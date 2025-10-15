<?php
/**
 * Template part for displaying posts in a grid card
 *
 * @package JordanView
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'card' ); ?>>
<?php if ( has_post_thumbnail() ) : ?>
<a href="<?php the_permalink(); ?>" class="card-media">
<?php the_post_thumbnail( 'jordanview-card' ); ?>
</a>
<?php endif; ?>
<div class="card-content">
<div class="card-meta">
<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
<span aria-hidden="true">&bull;</span>
<?php the_category( ', ' ); ?>
</div>
<h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20, '…' ) ); ?></p>
<a class="hero-cta-secondary" href="<?php the_permalink(); ?>">
<span class="dashicons dashicons-arrow-right-alt"></span>
<?php esc_html_e( 'Read more', 'jordanview' ); ?>
</a>
</div>
</article>
