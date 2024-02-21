<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package school-theme
 */

?>

	<footer id="colophon" class="site-footer">
		
		<div class="footer-menus">
				<nav class="footer-navigation">
					
					<?php 
					the_custom_logo();
					?>

				</nav>
				<section class="credits">
						<h2>Credits</h2>
						<p>Created by Brendan Tang-Luu and Uellem Espinueva</p>
						<p>Photos Courtersy of <a href="https://burst.shopify.com/">Burst</a></p>
				</section>
				<nav class="footer-links">
					<h2>Links</h2>
					<?php 
					wp_nav_menu( array( 'theme_location' => 'footer-menu')); 
					?>
				</nav>
		</div><!-- #page -->
	</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
