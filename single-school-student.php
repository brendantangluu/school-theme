<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package school-theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );


			$taxonomy = 'school-specialty-category';
			$post_type = 'school-student';
			$current_student_id = get_the_ID();
			$terms = get_the_terms(get_the_ID(), $taxonomy);
				if ( $terms && ! is_wp_error( $terms ) ) {
					foreach ( $terms as $term ) {			
						$args = array(
							'post_type'      => $post_type,
							'posts_per_page' => -1,
							'orderby'		 => 'title',
							'order'			 => 'ASC',
							'tax_query'		 => array(
								array(
									'taxonomy'	=> $taxonomy,
									'field'		=> 'slug',
									'terms'  	=> $term->slug
								)
							)
						);

						$query = new WP_Query($args);
						if($query -> have_posts()){
							echo '<aside>';
							?> 
								<h3>Meet other <?php echo $term->name?>s:</h3>
							
							<?php
							 while ($query->have_posts()) {
								$query->the_post();
								if ($current_student_id != $query->post->ID) { // Check if the related post ID is not equal to the current post ID
									echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a> ';
								}
							}
							echo '</aside>';
							wp_reset_postdata();
						}
					}
				}
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
