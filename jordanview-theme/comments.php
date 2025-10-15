<?php
/**
 * Comments template
 *
 * @package JordanView
 */

if ( post_password_required() ) {
return;
}
?>
<section id="comments" class="section section-light">
<div class="section-inner">
<?php if ( have_comments() ) : ?>
<h2 class="section-title">
<?php
printf(
esc_html( _nx( 'One review', '%1$s reviews', get_comments_number(), 'comments title', 'jordanview' ) ),
number_format_i18n( get_comments_number() )
);
?>
</h2>

<ol class="comment-list">
<?php
wp_list_comments( [
'style'       => 'ol',
'avatar_size' => 60,
'short_ping'  => true,
'walker'      => null,
] );
?>
</ol>

<?php the_comments_navigation(); ?>
<?php endif; ?>

<?php
if ( ! comments_open() && get_comments_number() ) :
?>
<p class="section-subtitle no-comments"><?php esc_html_e( 'Comments are closed.', 'jordanview' ); ?></p>
<?php
endif;

comment_form();
?>
</div>
</section>
