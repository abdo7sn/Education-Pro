<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package school_education
 */

?>
<?php
	/**
	 * Hook - education_action_doctype.
	 *
	 * @hooked education_doctype -  10
	 */
	do_action( 'education_action_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - education_action_head.
	 *
	 * @hooked education_head -  10
	 */
	do_action( 'education_action_head' );
	?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php do_action( 'wp_body_open' ); ?>
	
	
	<?php
	/**
	 * Hook - education_action_before.
	 *
	 * @hooked education_page_start - 10
	 * @hooked education_skip_to_content - 15
	 */
	do_action( 'education_action_before' );
	?>

    <?php
	  /**
	   * Hook - education_action_before_header.
	   *
	   * @hooked education_header_start - 10
	   */
	  do_action( 'education_action_before_header' );
	?>
		<?php
		/**
		 * Hook - education_action_header.
		 *
		 * @hooked education_site_branding - 10
		 */
		do_action( 'education_action_header' );
		?>
    <?php
	  /**
	   * Hook - education_action_after_header.
	   *
	   * @hooked education_header_end - 10
	   */
	  do_action( 'education_action_after_header' );
	?>

	<?php
	/**
	 * Hook - education_action_before_content.
	 *
	 * @hooked education_content_start - 10
	 */
	do_action( 'education_action_before_content' );
	?>

	<!-- <?php
	  /**
	   * Hook - education_action_content.
	   */
	  do_action( 'education_action_content' );
	?> -->