<?php

function display_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .='<div class="alert alert-warning" role="alert">';
    $output .='Please fix the following errors:';
    $output .='</div>';
    $output .='<div class="alert alert-danger alert-dismissible fade show" role="alert">';
    foreach($errors as $error) {
      $output .= "<li>" . h($error) . "</li>";
    }
    $output .='<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
    $output .='<span aria-hidden="true">&times;</span>';
    $output .='</button>';
    $output .='</div>';
  }
  return $output;
}
