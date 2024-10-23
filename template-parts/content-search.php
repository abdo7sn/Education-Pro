<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package school_education
 */

//  archive_layout

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<hr class="tm-hr-primary">
	<?php $archive_layout = education_get_option( 'archive_layout' );
		$show_post_image = education_get_option( 'education_show_post_featured_image_setting' );
		if ( true === $show_post_image ) { ?>
			<a href="<?php the_permalink(); ?>" class="effect-lily tm-post-link tm-pt-60">
                    <div class="tm-post-link-inner">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php
                            $education_archive_image = education_get_option( 'education_archive_image' );
                            $education_archive_image_alignment = education_get_option( 'education_archive_image_alignment' );
                            if ( 'disable' !== $education_archive_image ) : ?>
                                <?php the_post_thumbnail( esc_attr( $education_archive_image ), array( 'class' => 'align'. esc_attr( $education_archive_image_alignment ) ) ); ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <h2 class="tm-pt-30 tm-color-primary tm-post-title"><?php the_title(); ?></h2>
                </a>
		<?php }?>
		
		<?php $education_show_post_content = education_get_option( 'education_show_post_content_setting' );
        if ( true === $education_show_post_content ) { ?>
            <p class="tm-pt-30">
                <?php the_excerpt(); ?>
            </p>
        <?php } ?>

        <footer class="entry-footer">
			<?php education_entry_footer(); ?>
		</footer>

</article>