<?php
/**
 * Template part for displaying page content
 *
 * @package JordanView
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="section section-light">
<div class="section-inner">
<h1 class="section-title"><?php the_title(); ?></h1>
</div>
</header>

<section class="section section-muted">
<div class="section-inner">
<div class="entry-content">
<?php the_content(); ?>
</div>
</div>
</section>
</article>
