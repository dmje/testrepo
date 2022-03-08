
<div id="comments">
<?php
    $req = get_option('require_name_email'); // Checks if fields are required.
    if ( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
        die ( 'Please do not load this page directly. Thanks!' );
    if ( ! empty($post->post_password) ) :
        if ( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) :
?>
		<div class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'thirty8_boilerplate') ?></div>
		</div><!-- .comments -->
<?php
        return;
    endif;
endif;
?>
 
<?php /* See IF there are comments and do the comments stuff! */ ?>
<?php if ( have_comments() ) : ?>
 
<?php /* Count the number of comments and trackbacks (or pings) */
$ping_count = $comment_count = 0;
foreach ( $comments as $comment )
    get_comment_type() == "comment" ? ++$comment_count : ++$ping_count;
?>
 
<?php /* IF there are comments, show the comments */ ?>
<?php if ( ! empty($comments_by_type['comment']) ) : ?>
 
	<div id="comments-list" class="comments">
	    <h2>Comments</h2>
 
<?php /* If there are enough comments, build the comment navigation  */ ?>
<?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>
        <div id="comments-nav-above" class="comments-navigation">
                    <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
        </div><!-- #comments-nav-above -->
<?php endif; ?>                  
 
<?php /* An unordered list of our custom comments callback, custom_comments(), in functions.php   */ ?>
        <ul>
			<?php wp_list_comments('type=comment&callback=custom_comments'); ?>
        </ul>
 
<?php /* If there are enough comments, build the comment navigation */ ?>
<?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>
    <div id="comments-nav-below" class="comments-navigation">
        <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
    </div><!-- #comments-nav-below -->
<?php endif; ?>                  
 
</div><!-- #comments-list .comments -->
 
<?php endif; /* if ( $comment_count ) */ ?>

<?php endif /* if ( $comments ) */ ?>
 
<?php /* If comments are open, build the respond form */ ?>
<?php if ( 'open' == $post->comment_status ) : ?>
<div id="respond">
    <h2><?php comment_form_title( __('Leave a Comment', 'thirty8_boilerplate'), __('Post a Reply to %s', 'thirty8_boilerplate') ); ?></h2>

    <div id="cancel-comment-reply"><?php cancel_comment_reply_link() ?></div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
    <p id="login-req"><?php printf(__('You must be <a href="%s" title="Log in">logged in</a> to post a comment.', 'thirty8_boilerplate'),
    get_option('siteurl') . '/wp-login.php?redirect_to=' . get_permalink() ) ?></p>

<?php else : ?>
    <div class="formcontainer">  

        <form id="commentform" class="nice" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">

<?php if ( $user_ID ) : ?>
            <p id="login"><?php printf(__('<span class="loggedin">Logged in as <a href="%1$s" title="Logged in as %2$s">%2$s</a>.</span> <span class="logout"><a href="%3$s" title="Log out of this account">Log out?</a></span>', 'thirty8_boilerplate'),
                get_option('siteurl') . '/wp-admin/profile.php',
                esc_html($user_identity, true),
                wp_logout_url(get_permalink()) ) ?></p>
 
<?php else : ?>
 
            <p id="comment-notes"><?php _e('Your email is <em>never</em> published nor shared.', 'thirty8_boilerplate') ?> <?php if ($req) _e('Required fields are marked <span class="required">*</span>', 'thirty8_boilerplate') ?></p>
 
	<div id="form-section-author" class="form-section">
	                <div class="form-label"><label for="author"><?php _e('Name', 'thirty8_boilerplate') ?><?php if ($req) _e('<span class="required">*</span>', 'thirty8_boilerplate') ?></label></div>
	                <div class="form-field"><input id="author" name="author" type="text" value="<?php echo $comment_author ?>" size="30" maxlength="20" tabindex="3" /></div>
	</div><!-- #form-section-author .form-section -->
	
	<div id="form-section-email" class="form-section">
	                <div class="form-label"><label for="email"><?php _e('Email', 'thirty8_boilerplate') ?><?php if ($req) _e('<span class="required">*</span>', 'thirty8_boilerplate') ?></label> </div>
	                <div class="form-field"><input id="email" name="email" type="text" value="<?php echo $comment_author_email ?>" size="30" maxlength="50" tabindex="4" /></div>
	</div><!-- #form-section-email .form-section -->
	
	<div id="form-section-url" class="form-section">
						<div class="form-label"><label for="url"><?php _e('Website', 'thirty8_boilerplate') ?></label></div>
	                <div class="form-field"><input id="url" name="url" type="text" value="<?php echo $comment_author_url ?>" size="30" maxlength="50" tabindex="5" /></div>
	</div><!-- #form-section-url .form-section -->
 
<?php endif /* if ( $user_ID ) */ ?>
 
	<div id="form-section-comment" class="form-section">
	                <div class="form-label"><label for="comment"><?php _e('Comment', 'thirty8_boilerplate') ?></label></div>
	                <div class="form-textarea form-field"><textarea id="comment" name="comment" cols="80" rows="10" tabindex="6"></textarea></div>
	</div><!-- #form-section-comment .form-section -->
 
<?php do_action('comment_form', $post->ID); ?>
 
    <div class="form-submit">	
	    

<!--GDPR plugin checkbox-->

<p class="wpgdprc-checkbox">
	<label>
		<input name="wpgdprc" id="wpgdprc" value="1" type="checkbox">
		&nbsp; By using this form you agree with the storage and handling of your data by this website. <sup>*</sup>
	</label>
</p>

<!--//GDPR plugin checkbox-->	      
	    
    <input id="submit" class="button comment-button" name="submit" type="submit" value="<?php _e('Post Your Comment', 'thirty8_boilerplate') ?>" tabindex="7" /><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
    </div>
 

 
	<?php comment_id_fields(); ?> 
 
        </form><!-- #commentform -->
    </div><!-- .formcontainer -->
<?php endif /* if ( get_option('comment_registration') && !$user_ID ) */ ?>
</div><!-- #respond -->
<?php endif /* if ( 'open' == $post->comment_status ) */ ?>
</div><!-- #comments -->