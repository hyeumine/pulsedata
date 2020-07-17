<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>

    <?php 

      // switch ( current_page() ) {
      //   case SITE_NAME.'/':
      //     is_page_header( current_page(), SITE_NAME.'/', 'Toledo Pulse Data Login');
      //     break;
      //   case SITE_NAME.'/index.php':
      //     is_page_header( current_page(), SITE_NAME.'/index.php', 'Toledo Pulse Data Login');
      //     break;
      //   case SITE_NAME.'/login.php':
      //     is_page_header( current_page(), SITE_NAME.'/login.php', 'Toledo Pulse Data Login');
      //     break;
      //   case SITE_NAME.'/forgot-password.php':
      //     is_page_header( current_page(), SITE_NAME.'/forgot-password.php', 'Toledo Pulse Data - Forgot Password');
      //     break; 
      //   case SITE_NAME.'/public/staff/patients/index.php':
      //     is_page_header( current_page(), SITE_NAME.'/public/staff/patients/index.php', 'Toledo Pulse Data - Dashboard');
      //     break;
      // }

    ?>

  </title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo url_for('/assets/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo url_for('/assets/css/sb-admin-2.min.css');?>" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo url_for('/assets/js/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css');?>">

  <?php  
   if( is_page( current_page(), SITE_NAME."/public/staff/patients/") ){ ?> 

    <link href="<?php echo url_for('/assets/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">

  <?php } ?>

</head>

<?php  
 if( is_page( current_page(), SITE_NAME."/") ||
     is_page( current_page(), SITE_NAME."/login.php") ||
     is_page( current_page(), SITE_NAME."/index.php") ||
     is_page( current_page(), SITE_NAME."/forgot-password.php") ||
     is_page( current_page(), SITE_NAME."/staff/patients/new.php") ){
     html('<body class="bg-gradient-primary">');
  }elseif( is_page(current_page(), SITE_NAME."/dashboard.php") ){
    html('<body id="page-top">');
  }else{
    html('<body>');
  }

?>

