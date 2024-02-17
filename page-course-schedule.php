<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package school-theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		get_template_part( 'template-parts/content', 'page' );
		while ( have_posts() ) :
			the_post();

			if( have_rows('schedule') ):
				?>
				<ul>
					<table>
						<tbody>
						<tr>
							<td><strong>Date</strong></td>
							<td><strong>Course</strong></td>
							<td><strong>Instructor</strong></td>
						</tr>
						
						<?php while(has_sub_field('schedule')): ?>
						
						<tr>
							<td><?php the_sub_field('date'); ?></td>
							<td><?php the_sub_field('course'); ?></td>
							<td><?php the_sub_field('instructor'); ?></td>
						</tr>

						<?php endwhile; ?>
						</tbody>
					</table>
				
				</ul>
				<?php
			else :
				// Do something...
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
