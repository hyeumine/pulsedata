<?php

require_once('../private/initialize.php');

// $url = url_for('/staff/login.php');	
// header("Location: $url ");

?>

<?php include(SHARED_PATH.'/staff_header.php'); ?>
	<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- 404 Error Text -->
  <div class="text-center">
    <div class="error mx-auto" data-text="404">404</div>
    <p class="lead text-gray-800 mb-5">Page Not Found</p>
    <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
    <a href="index.html">&larr; Back to Dashboard</a>
  </div>
</div>
<!-- /.container-fluid -->
<?php include(SHARED_PATH."/staff_javascript_top_footer.php"); ?>
<?php include(SHARED_PATH.'/staff_footer.php'); ?>


