<?php
/**
 * @package Case-Themes
 */

if ( post_password_required() ) {
    return;
    } ?>

    <div id="comments" class="comments-area">
        <?php
        $comment_count = (get_comments_number() < 10 && get_comments_number() != 0) ? '0'.get_comments_number() : get_comments_number();
        if ( have_comments() ) : 
        ?>
            <div class="comment-wrapper">
                <h5 class="comment-title">
                    <span class="title-text">
                        <?php echo esc_html('('.$comment_count.')Comment', 'agron'); ?>
                    </span>
                </h5>

                <?php the_comments_navigation(); ?>

                <ul class="comment-list">
                    <?php
                        wp_list_comments( array(
                            'style'      => 'ul',
                            'short_ping' => true,
                            'callback'   => 'agron_comment_list',
                            'max_depth'  => 3
                        ) );
                    ?>
                </ul>

                <?php the_comments_navigation(); ?>
            </div>
            <?php if ( ! comments_open() ) : ?>
                <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'agron' ); ?></p>
            <?php
            endif;

        endif;

    $args = array(
            'id_form'           => 'commentform',
            'id_submit'         => 'submit',
            'class_submit'         => 'button pxl-button-default',
            'title_reply'       => esc_attr__( 'Write your comment', 'agron'),
            'title_reply_to'    => esc_attr__( 'Write your comment', 'agron') . '%s',
            'cancel_reply_link' => esc_attr__( 'Cancel Comment', 'agron'),
            'submit_button'     => '<button name="%1$s" type="submit" id="%2$s" class="%3$s" />
            <span class="pxl-button-text">
                <span class="pxl-button-icon icon-duplicated">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                    </svg>
                </span>
                '.esc_html__('Post A Comment', 'agron').'
                <span class="pxl-button-icon icon-main">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <path d="M10.0035 3.4083L1.41176 12L0 10.5882L8.59171 1.99654H1.01905V0H12V10.981H10.0035V3.4083Z" fill="currentcolor"/>
                    </svg>
                </span>
            </span>
            </button>',
            'comment_notes_before' => esc_html__('Your email address will not be published. Required field are marked*', 'agron'),
            'fields' => apply_filters( 'comment_form_default_fields', array(
                    'author' =>
                    '<div class="form-control-group">
                    <div class="comment-form-author form-control">'.
                    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                    '" size="30" placeholder="'.esc_attr__('Enter Your Name*', 'agron').'"/></div>',

                    'email' =>
                    '<div class="comment-form-email form-control">'.
                    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                    '" size="30" placeholder="'.esc_attr__('Enter Your Mail*', 'agron').'"/></div></div>',
            )
            ),
            'comment_field' =>  '<div class="comment-form-comment form-control"><textarea id="comment" name="comment" placeholder="'.esc_attr__('Enter Your Message*', 'agron').'" aria-required="true">' .
            '</textarea></div>',
    );
    comment_form($args); ?>
</div>