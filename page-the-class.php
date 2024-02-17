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
		
		$taxonomy = 'school-specialty-category';
		$terms = get_terms(
			array(
				'taxonomy' => $taxonomy,
			)
		);
		if($terms && ! is_wp_error($terms)){
			foreach($terms as $term){
				$args = array(
					'post_type'      => 'school-student',
					'posts_per_page' => -1,
					'orderby'		 => 'title',
					'order'			 => 'ASC',
					'tax_query'		 => array(
						array(
							'taxonomy'	=> 'school-specialty-category',
							'field'		=> 'slug',
							'terms'  	=> $term->slug
						)
					)
				);
				$query = new WP_Query($args);
				if($query -> have_posts()){
					while($query -> have_posts()){
						$query -> the_post();
						
						?>
						<article>
							<?php
								$id = get_the_id();
							?>
								<h2 id=<?php echo $id; ?>>
								<a href="<?php $id; ?> "><?php the_title(); ?></a>
								</h2>
							
						</article>
						<?php
					}
					
					?><p><?php echo $term->name ?></p><?php
				}




			}
		}
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
