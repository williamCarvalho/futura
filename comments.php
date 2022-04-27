<?php
    // Do not delete these lines
    if (!empty($_SERVER['SCRIPT_FILENAME'])
        && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die();
 
    if (post_password_required()) { ?>

        <div class="row">
            <div class="col s12 center-align">
                <i class="material-icons teal-text text-lighten-2" data-aos="fade-up" data-aos-delay="400">lock</i>
                <p class="nocomments" data-aos="fade-up" data-aos-delay="600">
                    <?php _e( 'This article is restricted. Enter the password to view comments.', 'futura'); ?>
                </p>
            </div>
        </div>

        <?php return;
    }
?>

    <div class="row comments">
        <div class="col s12">
            <blockquote data-aos="fade-up" data-aos-delay="200">
                <?php comments_number(__('No comments', 'futura' ), __('1 comment', 'futura' ), __('% comments', 'futura' ));?>
            </blockquote>

            <?php if (have_comments()) : ?>
                <ul class="comment-list" data-aos="fade-up" data-aos-delay="400">
				    <?php wp_list_comments( array(
						'style'       => 'ul',
						'short_ping'  => true,
						'avatar_size' => '64'
					)); ?>
			    </ul>

                <?php futura_comments_pagination();
            endif; ?>

            <?php if ( comments_open() ) : ?>

                <div class="row">
                    <div id="respond" class="col s12 center-align">
                        <h4 class="h5" data-aos="fade-up" data-aos-delay="200">
                            <?php _e( 'Leave a comment!', 'futura' ); ?>
                        </h4>

                        <?php $comments_args = array(
                            'title_reply_before' => '<p id="reply-title" class="comment-reply-title">',
                            'title_reply_after' => '</p>',
                            'title_reply'=>'',
                            'comment_notes_after' => '',
                            'submit_button' => "<button class='waves-effect waves-light btn-small teal lighten-1' type='submit'>
                                                    <i class='material-icons right'>send</i>
                                                    " . __('Submit', 'futura') . "
                                                </button>",
                            'fields' => apply_filters('comment_form_default_fields',
                                array('author' =>
                                    "<p class='input-field comment-form-author'>
                                        <input
                                            id='author'
                                            class='blog-form-input'
                                            name='author'
                                            type='text'
                                            value='" . esc_attr($commenter['comment_author']) . "'
                                            size='30' " . ($req ? 'required' : '') . " />
                                        <label class='sr-only' for='author'>" . __('Your Name', 'futura') . "*</label>
                                    </p>",
                                    'email' =>
                                    "<p class='input-field comment-form-email'>
                                        <input
                                            id='email'
                                            class='blog-form-input'
                                            name='email'
                                            type='text'
                                            value='" . esc_attr($commenter['comment_author_email']) . "'
                                            size='30' " . ($req ? 'required' : '') . " />
                                        <label class='sr-only' for='email'>" . __('Your Email', 'futura') . "*</label>
                                    </p>",
                                    'url' =>
                                    "<p class='input-field comment-form-url'>
                                        <input
                                            id='url'
                                            class='blog-form-input'
                                            name='url'
                                            type='text'
                                            value='" . esc_attr($commenter['comment_author_url']) . "'
                                            size='30' />
                                        <label class='sr-only' for='url'>" . __('Your Website URL', 'futura') . "</label>
                                    </p>")),
                            // redefine your own textarea (the comment body)
                            'comment_field' => "<div class='input-field'>
                                                    <textarea
                                                        name='comment'
                                                        id='comment'
                                                        value='" . esc_attr($commenter['comment_author']) . "'
                                                        class='materialize-textarea' required></textarea>
                                                    <label class='sr-only' for='comment'>" . __( 'Comment', 'futura' ) ."*</label>
                                                </div>",
                        ); ?>

                        <div class="form-wrapper" data-aos="fade-up" data-aos-delay="400">
                            <?php comment_form($comments_args); ?>
                        </div>

                        <p class="cancel">
                            <?php cancel_comment_reply_link(__('Cancel comment', 'futura')); ?>
                        </p>
                    </div>
                </div>

            <?php else : ?>

                <div class="row">
                    <div class="col s12 center-align">
                        <br />
                        <i class="material-icons teal-text text-lighten-2" data-aos="fade-up" data-aos-delay="400">comments_disabled</i>
                        <p data-aos="fade-up" data-aos-delay="600">
                            <?php _e('Comments are closed.', 'futura'); ?>
                        </p>
                    </div>
                </div>

            <?php endif; ?>
        </div>
    </div>