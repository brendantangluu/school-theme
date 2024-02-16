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
		<div class = 'staff-section'>
			<!-- Output the posts -->
			<?php
			get_template_part( 'template-parts/content', 'page' );
				$taxonomy = 'school-staff-category';
					$terms = get_terms( 
						array(
							'taxonomy' => $taxonomy,
						) 
					);
					if ( $terms && ! is_wp_error( $terms ) ) {
						foreach ( $terms as $term ) {			
							$args = array(
								'post_type'      => 'school-staff',
								'posts_per_page' => -1,
								'tax_query'		 => array(
									array(
										'taxonomy'	=> 'school-staff-category',
										'field'		=> 'slug',
										'terms'  	=> $term->slug
									)
								)
							);
	
							$query = new WP_Query($args);
							if($query -> have_posts()){
								echo '<section class = "staff-wrapper"><h2 class = "staff-category">' . esc_html__( $term->name, 'fwd') .'</h2>';
									while($query -> have_posts()){
										$query -> the_post();
										
										?>
										<article class = 'staff-content'>
											<?php
												$id = get_the_id();
											?>
												<h3 id=<?php echo $id; ?>><?php the_title(); ?></h3>
												<p><?php the_field('staff_biography')?></p>
												<?php 
													if(get_field('courses') or get_field('instructor_website')){
														?> 
														<p>Courses: <?php the_field('courses') ?></p>
														<a href="<?php the_field('instructor_website') ?>">Instructor Website</a>
														<?php
													}
												
												?>
										</article>
										<?php
									}
								echo '</section>';
								wp_reset_postdata();
							}
						}
						// Add your WP_Query() code here
						// Use $term->slug in your tax_query
						// Use $term->name to organize the posts
					}
			?>
		</div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
