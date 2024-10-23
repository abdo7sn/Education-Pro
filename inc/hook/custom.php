<?php
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package school_education
 */

if ( ! function_exists( 'education_skip_to_content' ) ) :
	/**
	 * Add Skip to content.
	 *
	 * @since 1.0.0
	 */
	function education_skip_to_content() {
	?><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'school-education' ); ?></a><?php
	}
endif;

add_action( 'education_action_before', 'education_skip_to_content', 15 );

// Middle Header

if ( ! function_exists( 'education_site_branding' ) ) :

	/**
	 * Site branding.
	 *
	 * @since 1.0.0
	 */
	function education_site_branding() {
		$education_header_top_text = education_get_option( 'education_header_top_text' );
		$education_header_top_button_text = education_get_option( 'education_header_top_button_text' );
		$education_header_top_button_link = education_get_option( 'education_header_top_button_link' );

		$education_header_top_myacount_btn_link = education_get_option( 'education_header_top_myacount_btn_link' );
	
		$education_data_sticky = education_get_option( 'education_show_data_sticky_setting' );

		?>
        <header class="tm-header" id="tm-header" data-sticky= "<?php echo esc_attr($education_data_sticky); ?>">
            <div class="tm-header-wrapper">
				<?php the_custom_logo(); ?>
				<?php $education_show_title = education_get_option( 'education_show_title' ); ?>
					<?php $education_show_tagline = education_get_option( 'education_show_tagline' ); ?>
					<?php if ( true === $education_show_title || true === $education_show_tagline ) :  ?>
					<div class="tm-site-header">
						<?php if ( true === $education_show_title ) :  ?>
							<?php if ( is_front_page() ) : ?>
							<h1 class="text-center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="color: white;"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
							<h1 class="text-center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="color: white;"><?php bloginfo( 'name' ); ?></a></h1>
							<?php endif; ?>
						<?php endif; ?>
					</div>
					<nav class="tm-nav" id="tm-nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'education' ); ?>">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'primary-menu',
							'container'      => false,
							'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'fallback_cb'    => false,
							'link_before'    => '<i class="fas fa-angle-right"></i> ', // Add icon before each link
							'add_li_class'   => 'tm-nav-item', // Class for li elements
							'add_a_class'    => 'tm-nav-link', // Class for a elements
						) );
						?>
					</nav>
					<?php if ( true === $education_show_tagline ) :  ?>
						<p class="tm-mb-80 pr-5 text-white"><?php bloginfo( 'description' ); ?></p>
					<?php endif; ?>
            </div>
			<?php endif; ?>
        </header>
	    <?php
	}

endif;

add_action( 'education_action_header', 'education_site_branding' );


/////////////////////////////////// copyright start /////////////////////////////

if ( ! function_exists( 'education_footer_copyright' ) ) :

	/**
	 * Footer copyright
	 *
	 * @since 1.0.0
	 */
	function education_footer_copyright() {

		// Check if footer is disabled.
		$education_footer_status = apply_filters( 'education_filter_footer_status', true );
		if ( true !== $education_footer_status ) {
			return;
		}

		// Copyright content.
		$education_copyright_text = education_get_option( 'education_copyright_text' );
		$education_copyright_text = apply_filters( 'education_filter_copyright_text', $education_copyright_text );
		if ( ! empty( $education_copyright_text ) ) {
			$education_copyright_text = wp_kses_data( $education_copyright_text );
		}

		// Powered by content.
		$education_powered_by_text = sprintf( __( 'Education by %s', 'school-education' ), '<span>' . __( 'Abdou7sn Themes', 'school-education' ) . '</span>' );
		?>

		<hr class="col-12">
		<?php if ( ! empty( $education_powered_by_text ) ) : ?>
			<div class="col-md-6 col-12 tm-color-gray">
            	<a rel="nofollow" target="_parent" href="https://abdou.7sn.co/" class="tm-external-link"><?php echo $education_powered_by_text; ?></a>
        	</div>
		<?php endif; ?>

		<?php if ( ! empty( $education_copyright_text ) ) : ?>
			<div class="col-md-6 col-12 tm-color-gray tm-copyright">
				<?php echo $education_copyright_text; ?>
        	</div>
		<?php endif; ?>
        
	    <?php
	}

endif;

add_action( 'education_action_footer', 'education_footer_copyright', 10 );

// /////////////////////////////////sidebar//////////////////


if ( ! function_exists( 'education_add_sidebar' ) ) :

	/**
	 * Add sidebar.
	 *
	 * @since 1.0.0
	 */
	function education_add_sidebar() {

		global $post;

		$education_global_layout = education_get_option( 'education_global_layout' );
		$education_global_layout = apply_filters( 'education_filter_theme_global_layout', $education_global_layout );

		// Check if single.
		if ( $post && is_singular() ) {
			$education_post_options = get_post_meta( $post->ID, 'education_theme_settings', true );
			if ( isset( $education_post_options['post_layout'] ) && ! empty( $education_post_options['education_post_layout'] ) ) {
				$education_global_layout = $education_post_options['education_post_layout'];
			}
		}

		// Include primary sidebar.
		if ( 'no-sidebar' !== $education_global_layout ) {
			get_sidebar();
		}
	}

endif;

add_action( 'education_action_sidebar', 'education_add_sidebar' );

//////////////////////////////////////// single page ////////////////////////////////////////////////////////


if ( ! function_exists( 'education_add_image_in_single_display' ) ) :

	/**
	 * Add image in single post.
	 *
	 * @since 1.0.0
	 */
	function education_add_image_in_single_display() {

		global $post;

		if ( has_post_thumbnail() ) {

			$values = get_post_meta( $post->ID, 'education_theme_settings', true );
			$education_theme_settings_single_image = isset( $values['education_single_image'] ) ? esc_attr( $values['education_single_image'] ) : '';

			if ( ! $education_theme_settings_single_image ) {
				$education_theme_settings_single_image = education_get_option( 'education_single_image' );
			}

			if ( 'disable' !== $education_theme_settings_single_image ) {
				$args = array(
					'class' => 'aligncenter',
				);
				the_post_thumbnail( esc_attr( $education_theme_settings_single_image ), $args );
			}
		}

	}

endif;

add_action( 'education_single_image', 'education_add_image_in_single_display' );

if ( ! function_exists( 'education_footer_goto_top' ) ) :

	/**
	 * Go to top.
	 *
	 * @since 1.0.0
	 */
	function education_footer_goto_top() {
        
        $education_show_scroll_to_top = education_get_option( 'education_show_scroll_to_top' );
        if ( true === $education_show_scroll_to_top ) :
		echo '<a href="#page" class="scrollup" id="btn-scrollup"><i class="fa fa-angle-up"><span class="screen-reader-text">' . esc_html__( 'Scroll Up', 'school-education' ) . '</span></i></a>';
		endif;

	}

endif;

add_action( 'education_action_after', 'education_footer_goto_top', 20 );