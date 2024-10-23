<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package school_education
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div>
    <h2 class="tm-color-primary tm-post-title"><?php esc_html_e( 'Comments', 'your-text-domain' ); ?></h2>
    <hr class="tm-hr-primary tm-mb-45">

    <?php
    // جلب التعليقات
    $comments = get_comments( array(
        'post_id' => get_the_ID(), // الحصول على التعليقات للمنشور الحالي
        'status'  => 'approve' // جلب التعليقات المعتمدة فقط
    ) );

    // عرض التعليقات
    if ( $comments ) {
        foreach ( $comments as $comment ) {
            ?>
            <div class="tm-comment tm-mb-45">
                <figure class="tm-comment-figure">
                    <img src="<?php echo get_avatar_url( get_comment_author_email() ); ?>" alt="Image" class="mb-2 rounded-circle img-thumbnail">
                    
                    <figcaption class="tm-color-primary text-center"><?php echo esc_html( $comment->comment_author ); ?></figcaption>
                </figure>
                <div>
                    <p><?php echo esc_html( $comment->comment_content ); ?></p>
                    <div class="d-flex justify-content-between">
                        <?php
                            // إضافة رابط الرد الديناميكي
                            echo '<a href="' . esc_url(get_comment_link($comment->comment_ID)) . '" class="tm-color-primary btn btn-link">REPLY</a>';
                        ?>
                        <span class="tm-color-primary"><?php echo esc_html( get_comment_date( '', $comment ) ); ?></span>
                    </div>
                </div>                                
            </div>
            <?php
        }
    } else {
        echo '<p class="tm-color-primary">No comments yet.</p>'; // رسالة إذا لم تكن هناك تعليقات
    }
    ?>

    <form action="<?php echo site_url('/wp-comments-post.php'); ?>" method="post" class="mb-5 tm-comment-form">
        <h2 class="tm-color-primary tm-post-title mb-4"><?php esc_html_e( 'Your comment', 'your-text-domain' ); ?></h2>
        <div class="mb-4">
            <input class="form-control" name="author" type="text" required placeholder="Your Name">
        </div>
        <div class="mb-4">
            <input class="form-control" name="email" type="email" required placeholder="Your Email">
        </div>
        <div class="mb-4">
            <textarea class="form-control" name="comment" rows="6" required placeholder="Your Message"></textarea>
        </div>
        <input type="hidden" name="comment_post_ID" value="<?php echo get_the_ID(); ?>" />
        <div class="text-right">
            <button class="tm-btn tm-btn-primary tm-btn-small" type="submit"><?php esc_html_e( 'Submit', 'your-text-domain' ); ?></button>
        </div>                                
    </form>
</div>
