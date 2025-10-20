<?php
/**
 * Front page template
 *
 * @package JordanView
 */

global $wp_query;

$hero_title      = get_theme_mod( 'jordanview_hero_title', __( 'A mountainside escape in Park City', 'jordanview' ) );
$hero_subtitle   = get_theme_mod( 'jordanview_hero_subtitle', __( 'Gather with friends and family in a modern home featuring sweeping views, luxury finishes, and thoughtful amenities.', 'jordanview' ) );
$hero_cta_label  = get_theme_mod( 'jordanview_hero_cta_label', __( 'Check Availability', 'jordanview' ) );
$hero_cta_url    = get_theme_mod( 'jordanview_hero_cta_url', '#' );
$hero_cta_alt    = get_theme_mod( 'jordanview_hero_cta_alt', __( 'Explore the Home Guide', 'jordanview' ) );
$hero_cta_alturl = get_theme_mod( 'jordanview_hero_cta_alturl', '#' );
$hero_image_id   = get_theme_mod( 'jordanview_hero_image' );
$stories_title   = get_theme_mod( 'jordanview_latest_stories_title', __( 'Latest Stories', 'jordanview' ) );
$stories_subtitle = get_theme_mod(
    'jordanview_latest_stories_subtitle',
    __( 'Get travel inspiration, insider tips, and updates from Park City and beyond.', 'jordanview' )
);
$stories_filter  = get_theme_mod( 'jordanview_latest_stories_filter_type', 'none' );
$stories_category = absint( get_theme_mod( 'jordanview_latest_stories_category', 0 ) );
$stories_tag      = absint( get_theme_mod( 'jordanview_latest_stories_tag', 0 ) );

get_header();
?>
<section class="hero">
<div class="hero-inner">
<div class="hero-content">
<span class="hero-kicker"><?php esc_html_e( 'Jordan View Retreat', 'jordanview' ); ?></span>
<h1 class="hero-title"><?php echo esc_html( $hero_title ); ?></h1>
<p class="hero-subtitle"><?php echo esc_html( $hero_subtitle ); ?></p>
<div class="hero-cta-group">
<a class="hero-cta-primary" href="<?php echo esc_url( $hero_cta_url ); ?>"><?php echo esc_html( $hero_cta_label ); ?></a>
<a class="hero-cta-secondary" href="<?php echo esc_url( $hero_cta_alturl ); ?>">
<span class="dashicons dashicons-admin-home"></span>
<?php echo esc_html( $hero_cta_alt ); ?>
</a>
</div>
</div>
<div class="hero-media">
<?php
if ( $hero_image_id ) {
echo wp_get_attachment_image( $hero_image_id, 'large' );
} else {
echo '<img src="' . esc_url( get_template_directory_uri() . '/assets/images/placeholder-hero.svg' ) . '" alt="' . esc_attr__( 'Mountain home exterior', 'jordanview' ) . '" />';
}
?>
</div>
</div>
</section>

<?php get_template_part( 'template-parts/section', 'highlights' ); ?>
<?php get_template_part( 'template-parts/section', 'amenities' ); ?>
<?php get_template_part( 'template-parts/section', 'testimonials' ); ?>
<?php get_template_part( 'template-parts/section', 'booking' ); ?>

<section class="section section-light">
<div class="section-inner">
<header class="section-header">
<h2 class="section-title"><?php echo esc_html( $stories_title ); ?></h2>
<p class="section-subtitle"><?php echo esc_html( $stories_subtitle ); ?></p>
</header>

<div class="card-grid">
<?php
$front_query_args = [
    'posts_per_page'      => 3,
    'ignore_sticky_posts' => true,
];

if ( 'category' === $stories_filter && $stories_category ) {
    $front_query_args['cat'] = $stories_category;
} elseif ( 'tag' === $stories_filter && $stories_tag ) {
    $front_query_args['tag_id'] = $stories_tag;
}

$front_query = new WP_Query( $front_query_args );

if ( $front_query->have_posts() ) :
while ( $front_query->have_posts() ) :
$front_query->the_post();
get_template_part( 'template-parts/content', get_post_type() );
endwhile;
wp_reset_postdata();
else :
get_template_part( 'template-parts/content', 'none' );
endif;
?>
</div>
</div>
</section>
<?php
get_footer();
