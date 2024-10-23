<?php
/**
 * Custom template tags for this theme.
 *
 * @package education
 */

if ( ! function_exists( 'education_entry_footer' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function education_entry_footer() {

		edit_post_link( esc_html__( 'Edit', 'school-education' ), '<span class="edit-link">', '</span>' );

		?>

		<div class="d-flex justify-content-between tm-pt-45">
			<?php
				if ( 'post' === get_post_type() ) {
					$education_show_meta_tags = true;
					$education_show_meta_tags = education_get_option( 'education_show_post_tags_setting' );
					if ( true === $education_show_meta_tags) {
						if ( true === $education_show_meta_tags ) {
							/* Translators: used between list items, there is a space after the comma. */
							$education_tags_list = get_the_tag_list( '', esc_html__( ', ', 'education' ) );
							if ( $education_tags_list ) {
								// Wrap the tags list in a span with a class for styling.
								printf( '<span>%s</span>', str_replace( '<a ', '<a class="tm-color-primary" ', $education_tags_list ) ); // WPCS: XSS OK.
							}
						}
					}
				}
				// Show publication date
				$education_show_post_date = education_get_option( 'education_show_post_date_setting' );
				if ( true === $education_show_post_date ) { 
					$post_date = get_the_date();
					echo '<span class="tm-color-primary">' . esc_html( $post_date ) . '</span>';
				}
				?> 
				
		</div>
		<hr>
		<div class="d-flex justify-content-between">
			<?php 
				// Show number of comments
				$education_show_post_comments = education_get_option( 'education_show_post_comments_setting' );
				if ( true === $education_show_post_comments) { 
					$education_show_meta_comment = true;
					$comments_number = get_comments_number();
					if ( true === $education_show_meta_comment ) {
						echo '<span>' . esc_html( $comments_number ) . ' ' . __( 'Comments', 'your-text-domain' ) . '</span>';
					}
				}

				// Show author name
				$education_show_meta_author = true;
				$byline = '';
				$education_show_post_admin = education_get_option( 'education_show_post_admin_setting' );
				if ( true === $education_show_meta_author ) {
					if ( true === $education_show_post_admin ) { 
						$byline = sprintf(
							'%s',
							'<span>by ' . get_the_author() . '</span>'
						);
					}
				}
				if ( ! empty( $byline ) ) {
					echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
				}
				?>
		</div>
<?php
	}
                  
endif;

?>