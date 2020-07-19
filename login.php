<?php

require_once('private/initialize.php');

$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if(is_blank($username)) {
    $errors[] = "Username cannot be blank.";
  }
  if(is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }

  // if there were no errors, try to login
  if(empty($errors)) {

    // $admin = Admin::find_by_username($username);

  	$login = "shan";
  	$password = "shan123";

  	$admin=[
  		"id" => 1,
  		"username" => $login,
  		"password" => $password
  	];

    // test if admin found and password is correct
    if($login == $username && $password=="shan123"  ) {
      // Mark admin as logged in
      $session->login($admin);
      redirect_to( "/public/staff/patients/");
    } else {
      // username not found or password does not match
      $errors[] = "Log in was unsuccessful.";
    }

  }

}

?>

?>

<?php include(SHARED_PATH.'/public_header.php'); ?>
		
	<body class="bg-gradient-primary">

	<?php include('login-form.php'); ?>

<?php include(SHARED_PATH.'/public_footer.php'); ?>