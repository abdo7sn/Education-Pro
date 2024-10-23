<?php
/**
 * Theme Customizer.
 *
 * @package education
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function education_customize_register( $wp_customize ) {

	// Load custom controls.
	include get_template_directory() . '/inc/customizer/control.php';

	// Register custom control types.
	$wp_customize->register_control_type( 'Education_Dropdown_Taxonomies_Control' );
	$wp_customize->register_control_type( 'Education_Section_Manager_Control' );

	// Load customize helpers.
	include get_template_directory() . '/inc/helper/options.php';

	// Load customize sanitize.
	include get_template_directory() . '/inc/customizer/sanitize.php';

	// Load customize callback.
	include get_template_directory() . '/inc/customizer/callback.php';

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	// Load customize option.
	include get_template_directory() . '/inc/customizer/option.php';

	// Modify default customizer options.
	$wp_customize->get_control( 'background_color' )->description = __( 'Note: Background Color is applicable only if no image is set as Background Image.', 'education' );


}
add_action( 'customize_register', 'education_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Customizer partials.
 *
 * @since 1.0.0
 */
function education_customizer_partials( WP_Customize_Manager $wp_customize ) {

	// Abort if selective refresh is not available.
	if ( ! isset( $wp_customize->selective_refresh ) ) {

		$wp_customize->get_setting( 'blogname' )->transport        = 'refresh';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'refresh';
		$wp_customize->get_setting( 'theme_options[copyright_text]' )->transport = 'refresh';
		return;

	}

	// Load customizer partials callback.
	include get_template_directory() . '/inc/customizer/partials.php';

	// Partial blogname.
	$wp_customize->selective_refresh->add_partial(
		'blogname', array(
		'selector'            => '.site-title a',
		'container_inclusive' => false,
		'render_callback'     => 'education_customize_partial_blogname',
		 )
	);

	// Partial blogdescription.
	$wp_customize->selective_refresh->add_partial(
		'blogdescription', array(
		'selector'            => '.site-description',
		'container_inclusive' => false,
		'render_callback'     => 'education_customize_partial_blogdescription',
		 )
	);

	// Partial copyright_text.
	$wp_customize->selective_refresh->add_partial(
		'copyright_text', array(
		'selector'            => '#colophon .copyright',
		'container_inclusive' => false,
		'settings'            => array( 'theme_options[education_copyright_text]' ),
		'render_callback'     => 'education_render_partial_copyright_text',
		 )
	);
}

add_action( 'customize_register', 'education_customizer_partials', 99 );

function education_logo_customize_register( WP_Customize_Manager $wp_customize ) {
	// Logo Resizer additions
	$wp_customize->add_setting( 'logo_size', array(
		'default'              => 50,
		'type'                 => 'theme_mod',
		'theme_supports'       => 'custom-logo',
		'transport'            => 'refresh',
		'sanitize_js_callback' => 'absint',
	) );

	$wp_customize->add_control( 'logo_size', array(
		'label'       => esc_html__( 'Logo Size','education' ),
		'section'     => 'title_tagline',
		'priority'    => 9,
		'type'        => 'number',
		'settings'    => 'logo_size',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 100,
			'aria-valuemin'    => 0,
			'aria-valuemax'    => 100,
			'aria-valuenow'    => 50,
			'aria-orientation' => 'horizontal',
		),
	) );

}
add_action( 'customize_register', 'education_logo_customize_register' );
