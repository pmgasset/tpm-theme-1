<?php
/**
 * Generic template part fallback
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
<h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20, '…' ) ); ?></p>
</div>
</article>
