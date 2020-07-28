<?php

require_once('../../private/initialize.php');

$errors = [];
$lgu_login = '';
$password = '';



if(is_post_request()) {

  $lgu_login = $_POST['lgu_login'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if(is_blank($lgu_login)) {
    $errors[] = "Lgu field cannot be blank.";
  }
  if(is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }

  // if there were no errors, try to login
  if(empty($errors)) {  

    // Using one variable ensures that msg is the same
    $login_failure_msg = "Log in was unsuccessful.";

    $lgu = Lgu::find_by_lgu_code($lgu_login);

    if($lgu) {

      if(password_verify($password, $lgu['passkey'])) {
        // password matches
        Session::login($lgu);
        redirect_to( url_for("/staff/patients/index.php"));
      } else {
        // username found, but password does not match
        $errors[] = $login_failure_msg;
      }

    } else {
      // no username found
      $errors[] = $login_failure_msg;
    }


  }

}

?>
<?php include(SHARED_PATH.'/staff_header.php'); ?>
		
	<body class="bg-gradient-primary">

	<?php include('login-form.php'); ?>

<?php include(SHARED_PATH."/staff_javascript_top_footer.php"); ?>

<?php include(SHARED_PATH.'/staff_footer.php'); ?>