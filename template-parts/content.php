<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package education
 */
?>

<!-- Search form -->
<div class="row tm-row">
    <?php get_search_form(); ?>          
</div>
<div class="row tm-row">
    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 2, // Number of posts per page
        'paged' => $paged, // This section defines the current page.
    );
    $the_query = new WP_Query( $args );
    
    if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <article class="col-12 col-md-6 tm-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <hr class="tm-hr-primary">
                <?php 
                $education_show_post_image = education_get_option( 'education_show_post_featured_image_setting' );
                if ( true === $education_show_post_image ) { ?>
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
                </a>
                <?php } ?>
                <?php 
                $education_show_post_heading = education_get_option( 'education_show_post_heading_setting' );
                if ( true === $education_show_post_heading) { ?>
                    <?php the_title( sprintf( '<h2 class="tm-pt-30 tm-color-primary tm-post-title"><a class="tm-color-primary" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                <?php } ?>
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
        <?php endwhile;
        wp_reset_postdata(); ?>
        
    <?php endif; ?>
</div>
<div class="row tm-row tm-mt-100 tm-mb-75">
    <div class="tm-prev-next-wrapper">
        <?php if ( get_previous_posts_link() ) : ?>
            <a href="<?php echo get_previous_posts_page_link(); ?>" class="mb-2 tm-btn tm-btn-primary tm-prev-next tm-mr-20">
                <?php _e( 'Prev', 'your-text-domain' ); ?>
            </a>
        <?php else : ?>
            <a href="#" class="mb-2 tm-btn tm-btn-primary tm-prev-next tm-mr-20 disabled">
                <?php _e( 'Prev', 'your-text-domain' ); ?>
            </a>
        <?php endif; ?>
        
        <?php if ( get_next_posts_link() ) : ?>
            <a href="<?php echo get_next_posts_page_link(); ?>" class="mb-2 tm-btn tm-btn-primary tm-prev-next">
                <?php _e( 'Next', 'your-text-domain' ); ?>
            </a>
        <?php else : ?>
            <a href="#" class="mb-2 tm-btn tm-btn-primary tm-prev-next disabled">
                <?php _e( 'Next', 'your-text-domain' ); ?>
            </a>
        <?php endif; ?>
    </div>

    <div class="tm-paging-wrapper">
        <span class="d-inline-block mr-3"><?php _e( 'Page', 'your-text-domain' ); ?></span>
        <nav class="tm-paging-nav d-inline-block">
            <?php
            // إعدادات التصفح للصفحات
            $pagination = paginate_links( array(
                'type'      => 'list',
                'mid_size'  => 2,
                'prev_text' => __( '«', 'your-text-domain' ),
                'next_text' => __( '»', 'your-text-domain' ),
            ) );

            if ( $pagination ) {
                // تعديل النمط الافتراضي لقائمة التصفح
                $pagination = str_replace( 'page-numbers', 'mb-2 tm-btn tm-paging-link', $pagination );
                $pagination = str_replace( '<ul class=\'mb-2 tm-btn tm-paging-link\'>', '<ul class="tm-paging-list">', $pagination );
                $pagination = str_replace( 'current', 'active', $pagination );
                echo $pagination;
            }
            ?>
        </nav>
    </div>
</div>
