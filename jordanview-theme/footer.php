<?php
/**
 * Footer template
 *
 * @package JordanView
 */
?>
</main><!-- #primary -->

<footer class="site-footer" role="contentinfo">
<div class="footer-inner">
<div class="footer-widgets">
<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
<?php dynamic_sidebar( 'footer-1' ); ?>
<?php endif; ?>

<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
<?php dynamic_sidebar( 'footer-2' ); ?>
<?php endif; ?>

<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
<?php dynamic_sidebar( 'footer-3' ); ?>
<?php endif; ?>
</div>

<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'jordanview' ); ?>">
<?php
wp_nav_menu( [
'theme_location' => 'footer',
'menu_class'     => 'footer-menu',
'container'      => false,
] );
?>
</nav>

<div class="footer-bottom">
<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'jordanview' ); ?></p>
<p><a href="mailto:<?php echo antispambot( get_option( 'admin_email' ) ); ?>"><?php esc_html_e( 'Book your stay', 'jordanview' ); ?></a></p>
</div>
</div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
