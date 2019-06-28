<?php if (comments_open()) { ?>
<div id="comments" class="comments-area">
    <ul class="commentlist">
      <?php
        function verstaka_comment($comment, $args, $depth){
          $GLOBALS['comment'] = $comment; ?>
          <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
            <div id="comment-<?php comment_ID(); ?>">
              <?php if ($comment->comment_approved == '0') : ?>
                <em><?php _e('Комментарий ожидает модерации') ?></em>
                <br>
              <?php endif; ?>
              <?php comment_text() ?>
              <div class="comment-author vcard">
                <div class="comment-meta commentmetadata" style="float: right;">
                  <span><?php printf(__(' %1$s в %2$s'), get_comment_date(),  get_comment_time()) ?></span>
                </div>
                <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?> 
              </div>
            </div>
      <?php }
        $args = array(
          'reply_text' => 'Ответить',
          'callback' => 'verstaka_comment'
        );
        wp_list_comments($args);
      ?>
    </ul>

 
  <?php
    $fields = array(
      'author' => '<p class="comment-form-author"><label for="author">' . __( 'Name' ) . ($req ? '<span class="required">*</span>' : '') . '</label><input type="text" id="author" name="author" class="author" value="' . esc_attr($commenter['comment_author']) . '" placeholder="" pattern="[A-Za-zА-Яа-я]{3,}" maxlength="30" autocomplete="on" tabindex="1" required' . $aria_req . '></p>',
      'email' => '<p class="comment-form-email"><label for="email">' . __( 'Email') . ($req ? '<span class="required">*</span>' : '') . '</label><input type="email" id="email" name="email" class="email" value="' . esc_attr($commenter['comment_author_email']) . '" placeholder="example@example.com" maxlength="30" autocomplete="on" tabindex="2" required' . $aria_req . '></p>'
    );
 
    $args = array(
      'comment_notes_after' => '',
      'comment_field' => '<p class="comment-form-comment"><label for="comment">Комментарий</label><textarea id="comment" name="comment" class="comment-form" cols="45" rows="8" aria-required="true" placeholder="Текст сообщения..."></textarea></p>',
        'title_reply'=>'Поделитесь своим мнением',
      'label_submit' => 'Отправить',
      'fields' => apply_filters('comment_form_default_fields', $fields)
    );
    comment_form($args);
  ?>
  <?php } 
?>
</div>