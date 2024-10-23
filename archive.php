<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package school_education
 */

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header>
				<?php  ?>
				
				<?php get_template_part( 'template-parts/content' ); ?>

				<div class="navigation">
		            <?php
			            the_posts_pagination( array(
			                'prev_text'          => __( 'Previous page', 'school-education' ),
			                'next_text'          => __( 'Next page', 'school-education' ),
			                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'school-education' ) . ' </span>',
			            ) );
			            ?>
			            <div class="clearfix"></div>
			    </div>
			<?php
			/**
			 * Hook - school_education_action_posts_navigation.
			 *
			 * @hooked: school_education_custom_posts_navigation - 10
			 */
			do_action( 'school_education_action_posts_navigation' ); ?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>
		</main>
	</div>
	<?php
		/**
		 * Hook - school_education_action_sidebar.
		 *
		 * @hooked: school_education_add_sidebar - 10
		 */
		//do_action( 'education_action_sidebar' );
	?>
<?php get_footer(); ?>
