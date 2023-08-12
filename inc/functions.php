<?php

// get WP user by display name
function mpp_get_user_id_by_display_name( $display_name ) {
  global $wpdb;

  if ( ! $user = $wpdb->get_row( $wpdb->prepare(
      "SELECT `ID` FROM $wpdb->users WHERE `display_name` = %s", $display_name
  ) ) )
      return false;
  return $user->ID;
}

function mpp_generate_post_from_media_pdfs($attachment_ID) {
  $filetype = get_post_mime_type($attachment_ID);
  $filename = basename( get_attached_file( $attachment_ID ) );
  if ($filetype == 'application/pdf') {
    $title = ucwords( str_replace( '_', ' ', str_replace( '.pdf', '', $filename ) ) );
    $user_id = mpp_get_user_id_by_display_name('InContext SEO'); 
    $current_year = date('Y');
    $current_month = date('m');
    $media_library_base_url = get_site_url() . '/wp-content/uploads/';
    $file_url = $media_library_base_url . $current_year . '/' . $current_month . '/' . $filename;
    $content = '<a class="mpp-button" href="'. $file_url . '" target="_blank">Download Article ' . $title . ' PDF</a>';

    $new_pdf_post = array(
      'post_title' => $title,
      'post_content' => $content,
      'post_status' => 'draft',
      'post_author' => $user_id,
    );
    wp_insert_post($new_pdf_post);
  }
}
add_action('add_attachment', 'mpp_generate_post_from_media_pdfs');