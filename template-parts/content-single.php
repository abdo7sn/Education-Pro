<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package school_education
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row tm-row">
		<div class="col-12">
			<hr class="tm-hr-primary tm-mb-55">
			<?php do_action( 'education_single_image' );?>
		</div>
	</div>
	<div class="row tm-row">
		<div class="col-lg-8 tm-post-col">
			<div class="tm-post-full">                    
				<div class="mb-4">
					<?php the_title( '<h2 class="pt-2 tm-color-primary tm-post-title">', '</h2>' ); ?>
					<p> <?php the_content(); ?> </p>
					<?php
						wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'school-education' ),
						'after'  => '</div>',
						) );
					?>
					<span class="d-block text-lift tm-color-primary"><?php education_entry_footer(); ?></span>
				</div>
				<?php
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
			</div>
		</div>
		<aside class="col-lg-4 tm-aside-col">
			<div class="tm-post-sidebar">
				<?php
					$education_show_meta_categories = true;
					$education_show_post_categories = education_get_option( 'education_show_post_categories_setting' );
					if ( true === $education_show_post_categories) {
						if ( true === $education_show_meta_categories ) { ?>
							<hr class="mb-3 tm-hr-primary">
							<h2 class="mb-4 tm-post-title tm-color-primary"><?php esc_html_e( 'Categories', 'school-education' ); ?></h2>
							<ul class="tm-mb-75 pl-5 tm-category-list">
								<?php
								// Get categories for the current post
								$categories = get_the_category();
								foreach ( $categories as $category ) {
									echo '<li><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="tm-color-primary">' . esc_html( $category->name ) . '</a></li>';
								}
								?>
							</ul>
				<?php			
						}
					}
				?>
				<hr class="mb-3 tm-hr-primary">
				<h2 class="tm-mb-40 tm-post-title tm-color-primary"><?php esc_html_e( 'Related Posts', 'school-education' ); ?></h2>
				<?php
				// Bring related posts
				$related_posts = get_posts( array(
					'category__in'   => wp_get_post_categories( get_the_ID() ),
					'posts_per_page' => 3, // Number of related posts
					'post__not_in'    => array( get_the_ID() ) // Exclude current post
				) );

				if ( $related_posts ) {
					foreach ( $related_posts as $post ) {
						setup_postdata( $post ); ?>
						<a href="<?php the_permalink(); ?>" class="d-block tm-mb-40">
							<figure>
								<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail( 'medium', array( 'class' => 'mb-3 img-fluid' ) );
								} ?>
								<figcaption class="tm-color-primary"><?php the_title(); ?></figcaption>
							</figure>
						</a>
						<?php
					}
					wp_reset_postdata(); // Reset sharing data
				}
				?>
			</div>                    
		</aside>
	</div>
</article>





