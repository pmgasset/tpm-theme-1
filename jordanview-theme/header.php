<?php
/**
 * Header template
 *
 * @package JordanView
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
<header class="site-header" role="banner">
<div class="header-inner">
<div class="site-branding">
<?php if ( has_custom_logo() ) : ?>
<?php the_custom_logo(); ?>
<?php endif; ?>
<div>
<?php if ( is_front_page() && is_home() ) : ?>
<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
<?php else : ?>
<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
<?php endif; ?>
<p class="site-description"><?php bloginfo( 'description' ); ?></p>
</div>
</div>

<button class="nav-toggle" aria-expanded="false" aria-controls="primary-menu">
<span class="dashicons dashicons-menu-alt3"></span>
<span class="screen-reader-text"><?php esc_html_e( 'Toggle navigation', 'jordanview' ); ?></span>
</button>

<nav id="site-navigation" class="primary-navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'jordanview' ); ?>">
<?php
wp_nav_menu( [
'theme_location' => 'primary',
'menu_id'        => 'primary-menu',
'container'      => false,
'fallback_cb'    => 'jordanview_fallback_menu',
] );
?>
</nav>
</div>
</header>

<main id="primary" class="site-main" role="main">
