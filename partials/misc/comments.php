<?php

$user = wp_get_current_user();
$user_identity = $user->exists() ? $user->display_name : '';
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$fields =  array(

  'author' =>
    '<div class="row">
      <div class="large-12 columns">
          <input name="author" placeholder="الاسم ' . ( $req ? ' *' : '' ) .'" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'" '. $aria_req . ' />
        </label>
      </div>
    </div>',

  'email' =>
    '<div class="row">
      <div class="large-12 columns">
          <input name="email" placeholder="البريد الإلكتروني ' . ( $req ? ' *' : '' ) .'" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) .'" '. $aria_req . ' />
      </div>
    </div>',

  'url' =>
    '<div class="row">
      <div class="large-12 columns">
          <input name="website" placeholder="الموقع" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .'" />
      </div>
    </div>',
);

$args = array(
    'title_reply' => 'شارك برأيك',
    'comment_field' =>  '<div class="row">
                        <div class="large-12 columns">
                            <textarea id="comment" name="comment" cols="45" rows="8" placeholder="التعليق'. ( $req ? ' *' : '' ) .'" aria-required="true"></textarea>
                        </div>
                      </div>',
    'title_reply_to'       => 'اترك تعليق من أجل : %s',
    'cancel_reply_link'    => 'إزالة التعليق',
    'label_submit'         => 'إرسال التعليق',
    'must_log_in'          => '<p class="must-log-in">' .
                              sprintf(
                                  'يجب عليك أن <a href="%s">تسجيل الدخول</a>قبل ترك تعليق',
                                  wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
                              ) . '</p>',
    'logged_in_as'         => '<p class="logged-in-as">' .
                              sprintf(
                                  'تسجيل الدخول<a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">تسجيل الخروج ؟</a>',
                                  admin_url( 'profile.php' ),
                                  $user_identity,
                                  wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) )
                              ) . '</p>',
    'comment_notes_before' => '',
    'comment_notes_after' => '',
    'fields' => apply_filters( 'comment_form_default_fields', $fields ),
);
?>
<div class="row">
    <div class="medium-12 columns">
      <?php wp_list_comments('type=comment&callback=display_comment'); ?>
    </div>
    <div class="medium-12 columns">
        <?php comment_form($args); ?>
    </div>
</div>
