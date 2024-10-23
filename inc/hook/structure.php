<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package school_education
 */

if ( ! function_exists( 'education_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
	function education_doctype() {
	?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
	}
endif;

add_action( 'education_action_doctype', 'education_doctype', 10 );


if ( ! function_exists( 'education_head' ) ) :
	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
	function education_head() {
	?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
	}
endif;
add_action( 'education_action_head', 'education_head', 10 );

if ( ! function_exists( 'education_page_start' ) ) :
	/**
	 * Page Start.
	 *
	 * @since 1.0.0
	 */
	function education_page_start() {
	?>
    <div class="container-fluid">
    <?php
	}
endif;
add_action( 'education_action_before', 'education_page_start' );

if ( ! function_exists( 'education_page_end' ) ) :
	/**
	 * Page End.
	 *
	 * @since 1.0.0
	 */
	function education_page_end() {
	?></div><!-- #page --><?php
	}
endif;

add_action( 'education_action_after', 'education_page_end' );

if ( ! function_exists( 'education_content_start' ) ) :
	/**
	 * Content Start.
	 *
	 * @since 1.0.0
	 */
	function education_content_start() {
	?><?php ?><main class="tm-main"><?php
	}
endif;
add_action( 'education_action_before_content', 'education_content_start' );


if ( ! function_exists( 'education_content_end' ) ) :
	/**
	 * Content End.
	 *
	 * @since 1.0.0
	 */
	function education_content_end() {
	?></main><?php
	}
endif;
add_action( 'education_action_after_content', 'education_content_end' );


if ( ! function_exists( 'education_header_start' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function education_header_start() {
		?><header class="tm-header" id="tm-header" role="banner"><?php
	}
endif;
add_action( 'education_action_before_header', 'education_header_start' );

if ( ! function_exists( 'education_header_end' ) ) :
	/**
	 * Header End.
	 *
	 * @since 1.0.0
	 */
	function education_header_end() {
	?></div><!-- .container --></header><!-- #masthead --><?php
	}
endif;
add_action( 'education_action_after_header', 'education_header_end' );



if ( ! function_exists( 'education_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function education_footer_start() {
		$education_footer_status = apply_filters( 'education_filter_footer_status', true );
		if ( true !== $education_footer_status ) {
			return;
		}
	?><main class="tm-main" style="">
		<footer id="colophon" class="row tm-row" role="contentinfo"><?php
	}
endif;
add_action( 'education_action_before_footer', 'education_footer_start' );


if ( ! function_exists( 'education_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function education_footer_end() {
		$education_footer_status = apply_filters( 'education_filter_footer_status', true );
		if ( true !== $education_footer_status ) {
			return;
		}
	?></footer>
   </main><?php
	}
endif;
add_action( 'education_action_after_footer', 'education_footer_end' );
