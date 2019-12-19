<?php /*
	
@package sunsettheme
*/
if( post_password_required() ){
	return;
}
?>

<div id="comments" class="comments-area">
	
	<?php 
		if( have_comments() ):
		//We have comments
	?>
	
		<h2 class="comment-title">
			<?php
				
				printf(
					esc_html( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'sunsettheme' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
					
			?>
		</h2>
		
		<?php sunset_get_post_navigation(); ?>
		
		<ol class="comment-list">
			
			<?php 
				
				$args = array(
					'walker'			=> null,
					'max_depth' 		=> '',
					'style'				=> 'ol',
					'callback'			=> null,
					'end-callback'		=> null,
					'type'				=> 'all',
					'reply_text'		=> 'Reply',
					'page'				=> '',
					'per_page'			=> '',
					'avatar_size'		=> 64,
					'reverse_top_level' => null,
					'reverse_children'	=> '',
					'format'			=> 'html5',
					'short_ping'		=> false,
					'echo'				=> true
				);
				
				wp_list_comments( $args );
			?>
			
		</ol>
		
		<?php sunset_get_post_navigation(); ?>
		
		<?php 
			if( !comments_open() && get_comments_number() ):
		?>
			 
			 <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'sunsettheme' ); ?></p>
			 
		<?php
			endif;
		?>
		
	<?php	
		endif;
	?>
	
	<?php 
		
		$fields = array(
			
			'author' =>
				'<div class="form-group"><label for="author">' . __( 'Name', 'domainreference' ) . '</label> <span class="required">*</span> <input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" /></div>',
				
			'email' =>
				'<div class="form-group"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> <span class="required">*</span><input id="email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required="required" /></div>',
				
			'url' =>
				'<div class="form-group last-field"><label for="url">' . __( 'Website', 'domainreference' ) . '</label><input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div>'
				
		);
		
		$args = array(
			
			'class_submit' => 'btn btn-block btn-lg btn-warning',
			'label_submit' => __( 'Submit Comment' ),
			'comment_field' =>
				'<div class="form-group"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label> <span class="required">*</span><textarea id="comment" class="form-control" name="comment" rows="4" required="required"></textarea></p>',
			'fields' => apply_filters( 'comment_form_default_fields', $fields )
			
		);
		
		comment_form( $args ); 
		
	?>
	
</div><!-- .comments-area -->




// style csss
.comments-area{border-top:4px solid #F1F1F1;margin-top:40px}
.last-field{margin-bottom:50px}
.comment-list{padding:0;list-style:none}
.comment-body{padding-bottom:0}
.children{background-color:#F5F5F5;padding-right:20px;padding-left:20px;list-style:none;margin-left:60px}
.children .comment-author:before{background-color:#fff}
.comment-author{position:relative;display:block;font-size:18px;font-weight:300}
.comment-author:before{position:absolute;content:'';display:block;top:10px;bottom:13px;left:40px;right:0;background-color:#f5f5f5;z-index:1;border-radius:4px}
.comment-author *{z-index:1;position:relative}
.comment-author b{font-weight:400}
.comment-author .avatar{border-radius:50%;margin-right:10px;border:3px solid #fff}
.comment-metadata{text-align:right;text-transform:uppercase;margin-top:-5px;font-size:12px}
.comment-metadata a{color:#999}
.comment-content{padding:20px 0;font-size:16px;font-weight:300;border-bottom:1px solid #E6E6E6;margin-left:60px}
.reply{text-align:right;padding:5px 0}a.comment-reply-link{text-transform:uppercase;color:#ff9d1d}a.comment-reply-link:hover,a.comment-reply-link:focus{color:#F56B08}
.comment-respond{margin-top:60px}
