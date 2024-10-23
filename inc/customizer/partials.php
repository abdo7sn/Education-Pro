<?php
/**
 * Customizer partials.
 *
 * @package education
 */

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function education_customize_partial_blogname() {

	bloginfo( 'name' );

}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function education_customize_partial_blogdescription() {

	bloginfo( 'description' );

}

/**
 * Partial for copyright text.
 *
 * @since 1.0.0
 *
 * @return void
 */
function education_render_partial_copyright_text() {

	$education_copyright_text = education_get_option( 'education_copyright_text' );
	$education_copyright_text = apply_filters( 'education_filter_copyright_text', $education_copyright_text );
	if ( ! empty( $education_copyright_text ) ) {
		$education_copyright_text = wp_kses_data( $education_copyright_text );
	}
	echo $education_copyright_text;

}
