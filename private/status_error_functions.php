<?php

function require_login() {
  global $session;
  if(!$session->is_logged_in()) {
    redirect_to(url_for('/staff/login.php'));
  } else {
    // Do nothing, let the rest of the page proceed
  }
}

function display_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .='<div id="formErrMessage" class="alert alert-warning" role="alert">';
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

function validate_qperson($qperson) {
  $errors = [];
  // subject_id
  if(is_blank($qperson['fname'])) {
      $errors[] = "First name cannot be blank.";
  }

  if(is_blank($qperson['mname'])) {
      $errors[] = "Middle name cannot be blank.";
  }

  if(is_blank($qperson['lname'])) {
      $errors[] = "Last name cannot be blank.";
  }

  if(is_blank($qperson['mobile_number'])) {
      $errors[] = "Mobile number cannot be blank.";
  }

  if(is_blank($qperson['address'])) {
      $errors[] = "Address cannot be blank.";
  }

  if(is_blank($qperson['details'])) {
      $errors[] = "Details cannot be blank.";
  }

  return $errors;
}

// function display_errors($errors=array()) {
//   $output = '';
//   if(!empty($errors)) {
//     $output .= "<div class=\"errors\">";
//     $output .= "Please fix the following errors:";
//     $output .= "<ul>";
//     foreach($errors as $error) {
//       $output .= "<li>" . h($error) . "</li>";
//     }
//     $output .= "</ul>";
//     $output .= "</div>";
//   }
//   return $output;
// }

function display_session_message() {
  global $session;
  $msg = $session->message();
  if(isset($msg) && $msg != '') {
    $session->clear_message();
    return '<div class="container-fluid"><div class="form-group row">
              <div class="col-sm-12"><div id="message">' . $msg . '</div></div></div></div>';
  }
}