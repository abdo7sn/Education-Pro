<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package education
 */

get_header(); ?>

<?php if ( true === apply_filters( 'education_filter_home_page_content', true ) ) : ?>
		<?php if ( have_posts() ) : ?>
			<?php if ( is_home() && ! is_front_page() ) : ?>
				<h2 class="pt-2 tm-color-primary tm-post-title"><?php single_post_title(); ?></h2>
			<?php endif; ?>
			<?php ?>
			
			<?php get_template_part( 'template-parts/content' ); ?>

		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
		</main>
	</div>
	
	<?php
	//do_action( 'education_action_sidebar' );
	?>
<?php endif; ?>

<?php get_footer(); ?>
