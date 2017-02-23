<?php
/*
  Plugin Name: ASUPlus
  Version: 1.0
  Description: A simple plugin that adds an default element to each post and page.
  Plugin URI: https://vietvang.net/
  Author: Viet Vang JSC
  Author URI: https://vietvang.net/
 */

// function asupura_meta_box()
//   {
//    add_meta_box( 'pr_mark', 'PR Asupura', 'asupura_pr_mark', 'post' );
//   }
//   add_action( 'add_meta_boxes', 'asupura_meta_box' );
//   function asupura_pr_mark()
//   {
//     global $post;
//     $pr_mark = get_post_meta( $post->ID, '_pr_mark', true );
//     if($pr_mark == '') {
//       echo ( '<label for="pr_mark">PR: </label>' );
//       echo ('<input type="checkbox" id="pr_mark" name="pr_mark" value="'.esc_attr( $pr_mark ).'" />');
//     }
//     elseif ($pr_mark == 'pr') {
//       echo ( '<label for="pr_mark">PR: </label>' );
//       echo ('<input type="checkbox" checked id="pr_mark" name="pr_mark" value="'.esc_attr( $pr_mark ).'" />');
//     }
     
//   }
//   function asupura_pr_mark_save( $post_id )
//   {
//     if(isset($_POST['pr_mark'])) {
//       $pr = 'pr';
//     }
//     elseif (!isset($_POST['pr_mark'])) {
//       $pr = '';
//     }
//    $pr_mark = sanitize_text_field( $pr );
//    update_post_meta( $post_id, '_pr_mark', $pr_mark );
//   }
//   add_action( 'save_post', 'asupura_pr_mark_save' );
