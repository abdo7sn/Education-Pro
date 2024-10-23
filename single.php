<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package school_education
 */

get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'template-parts/content', 'single' ); ?>
<?php endwhile; // End of the loop. ?>
	

<?php
	//do_action( 'education_action_sidebar' );
?>
<?php get_footer(); ?>
