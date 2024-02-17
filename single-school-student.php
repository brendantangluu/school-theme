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


			$taxonomy = 'fwd-service-category';
				$terms = get_terms( 
					array(
						'taxonomy' => $taxonomy,
					) 
				);
				if ( $terms && ! is_wp_error( $terms ) ) {
					foreach ( $terms as $term ) {			
						$args = array(
							'post_type'      => 'fwd-service',
							'posts_per_page' => -1,
							'orderby'		 => 'title',
							'order'			 => 'ASC',
							'tax_query'		 => array(
								array(
									'taxonomy'	=> 'fwd-service-category',
									'field'		=> 'slug',
									'terms'  	=> $term->slug
								)
							)
						);

						$query = new WP_Query($args);
						if($query -> have_posts()){
							?><h3><?php echo $term->name ?></h3><?php
							while($query -> have_posts()){
								$query -> the_post();
								
								?>
								<article>
									<?php
										$id = get_the_id();
									?>
										<h3 id=<?php echo $id; ?>><?php the_title(); ?></h3>
										<p><?php the_field('service')?></p>
								</article>
								<?php
							}
							
							wp_reset_postdata();
						}
					}
				}
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'school-theme' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'school-theme' ) . '</span> <span class="nav-title">%title</span>',
				)
			);
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
