<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package school_education
 */

	/**
	 * Hook - education_action_after_content.
	 *
	 * @hooked education_content_end - 10
	 */
	do_action( 'education_action_after_content' );
?>

	<?php
	/**
	 * Hook - education_action_before_footer.
	 *
	 * @hooked education_add_footer_bottom_widget_area - 5
	 * @hooked education_footer_start - 10
	 */
	do_action( 'education_action_before_footer' );
	?>
    <?php
	  /**
	   * Hook - education_action_footer.
	   *
	   * @hooked education_footer_copyright - 10
	   */
	  do_action( 'education_action_footer' );
	?>
	<?php
	/**
	 * Hook - education_action_after_footer.
	 *
	 * @hooked education_footer_end - 10
	 */
	do_action( 'education_action_after_footer' );
	?>

<?php
	/**
	 * Hook - education_action_after.
	 *
	 * @hooked education_page_end - 10
	 * @hooked education_footer_goto_top - 20
	 */
	do_action( 'education_action_after' );
?>

<?php wp_footer(); ?>
</body>
</html>



