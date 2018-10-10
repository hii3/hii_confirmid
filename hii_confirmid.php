<?php
/*
Plugin Name: hii ConfirmID
Plugin URI: 
Description: 開発向け。ID表示プラグイン
Version: 1.0
Author: hii3
Author URI: 
License: GPL2
 */

/*

/* ----------------------------------------
  管理画面
---------------------------------------- */
// 一覧のタイトル下 メニューを常に表示。
function hci_id_display() {
?>
<style>div.row-actions{left: 0 !important;}span.hci-confirmid{color: #000;}</style>
<?php
}
add_action( 'admin_head', 'hci_id_display' );

// 投稿ID 表示
function hci_postid_confirm($edit,$post) {
  if ( current_user_can( 'edit_posts' ) ) {
    if( isset( $edit['edit'] ) ) {
      $edit['edit'] = '<span class="hci-confirmid">' . "ID:" . intval( $post->ID ) . '</span>' . " | " . $edit['edit'];
    }
  }
  return $edit;
}
add_filter( 'post_row_actions', 'hci_postid_confirm', '10', '2' );

// 固定ページID 表示
function hci_pageid_confirm($edit,$page) {
  if ( current_user_can( 'edit_pages' ) ) {
    if( isset( $edit['edit'] ) ) {
      $edit['edit'] = '<span class="hci-confirmid">' . "ID:" . intval( $page->ID ) . '</span>' . " | " . $edit['edit'];
    }
  }
  return $edit;
}
add_filter( 'page_row_actions', 'hci_pageid_confirm', '10', '2' );

// カテゴリーID 表示
function hci_catid_confirm($edit,$category) {
  if ( current_user_can( 'manage_categories' ) ) {
    if( isset( $edit['edit'] ) ) {
      $edit['edit'] = '<span class="hci-confirmid">' . "ID:" . intval ( $category->term_id ) . '</span>' . " | " . $edit['edit'];
    }
  }
  return $edit;
}
add_filter( 'cat_row_actions', 'hci_catid_confirm', '10', '2' );

// タグID 表示
function hci_tagid_confirm($edit,$tag) {
  if ( current_user_can( 'edit_posts' ) ) {
    if( isset( $edit['edit'] ) ) {
      $edit['edit'] = '<span class="hci-confirmid">' . "ID:" . intval( $tag->term_id ) . '</span>' . " | " . $edit['edit'];
    }
  }
  return $edit;
}
add_filter( 'tag_row_actions', 'hci_tagid_confirm', '10', '2' );


/* ----------------------------------------
  ページ表示
---------------------------------------- */

// function hci_login_confirm() {
//   if ( is_user_logged_in( 'edit_posts' ) ) {
//     echo '<span class="position:fixed; width:100px; padding:10px; background-color:rgba(0,0,0,.7); color:#fff; font-size: 14px; top:40px; left:0;">' . "ID:" . get_the_id() . '</span>';
//   }
// }
// add_action( 'wp_loaded', 'hci_login_confirm' );
