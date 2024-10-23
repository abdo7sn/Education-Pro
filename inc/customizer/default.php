<?php
/**
 * Default theme options.
 *
 * @package school_education
 */

if ( ! function_exists( 'education_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function education_get_default_theme_options() {

		$defaults = array();

		// General Option
        $defaults['education_show_scroll_to_top']          = true;
        $defaults['education_show_preloader_setting']      = false;
        $defaults['education_show_data_sticky_setting']    = false;

		// Typography
		$defaults['education_body_font_family']         = '';
		$defaults['education_h1_font_family']          	= '';
		$defaults['education_h1_font_size']         	= '';
		$defaults['education_h2_font_family']          	= '';
		$defaults['education_h2_font_size']         	= '';
		$defaults['education_h3_font_family']          	= '';
		$defaults['education_h3_font_size']         	= '';
		$defaults['education_h4_font_family']          	= '';
		$defaults['education_h4_font_size']         	= '';
		$defaults['education_h5_font_family']          	= '';
		$defaults['education_h5_font_size']         	= '';
		$defaults['education_h6_font_family']          	= '';
		$defaults['education_h6_font_size']         	= '';

		// Global Color
		$defaults['education_first_color']          = '#0CC';

        // Post Option
        $defaults['education_show_post_date_setting']         			 = true;
        $defaults['education_show_post_heading_setting']      			 = true;
        $defaults['education_show_post_content_setting']       			 = true;
        $defaults['education_show_post_admin_setting']         		 = true;
        $defaults['education_show_post_categories_setting']    		 = true;
        $defaults['education_show_post_comments_setting']    	 	 = true;
        $defaults['education_show_post_featured_image_setting']   	 = true;
        $defaults['education_show_post_tags_setting']    			 = true;

		// Header.
		$defaults['education_show_title']            = true;
		$defaults['education_show_tagline']          = false;
		$defaults['education_show_social_in_header'] = false;
		$defaults['education_search_in_header']      = true;

		// Layout.
		$defaults['education_global_layout']           = 'right-sidebar';
		$defaults['education_archive_layout']          = 'excerpt';
		$defaults['education_archive_image']           = 'large';
		$defaults['education_archive_image_alignment'] = 'center';
		$defaults['education_single_image']            = 'large';

		// Home Page.
		$defaults['education_home_content_status'] = true;
		
		// 404 page
		$defaults['education_404_page_title']  = esc_html__( 'Oops! That page can&rsquo;t be found.', 'education' );
		$defaults['education_404_page_text']  = esc_html__( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'education' );

		// Footer.
		$defaults['education_copyright_text']        = esc_html__( 'Copyright &copy; All rights reserved.', 'education' );
		$defaults['education_copyright_text_font_size'] = '18';
		$defaults['education_copyright_text_align'] = 'center';

		// Pass through filter.
		$defaults = apply_filters( 'education_filter_default_theme_options', $defaults );
		return $defaults;
	}

endif;

?>