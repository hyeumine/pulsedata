<?php

require_once('../../../private/initialize.php');

require_login();

$errors = [];
$fname = '';
$mname = '';
$lname = '';
$mobile_number = '';
$address = '';
$details = '';

if(is_post_request()) {

  // get the lat id of the table
  $person = [];
  $person['qcode'] = Person::count_rows_qperson();
  $person['lgu_code'] = $lgu['lgu_code'];    
  $person['fname'] = $_POST['fname'] ?? '';
  $person['mname'] = $_POST['mname'] ?? '';
  $person['lname'] = $_POST['lname'] ?? '';
  $person['mobile_number'] = $_POST['mobile_number'] ?? '';
  $person["address"] =  $_POST['address'] ?? '';
  $person['details'] = $_POST['details'] ?? '';
  $person['start_date'] = current_date();

  $result = Person::insert_person($person);

  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $session->message('
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>  The Patients was created successfully.</p>
      </div>
    ');
    redirect_to(url_for('/staff/patients/show.php?id=' . $new_id));
  } else {
    $errors = $result;
  }

} else {
  // display the blank form
  $person = [];
  $person['qcode'] = '';
  $person['lgu_code'] = ''; 
  $person["fname"] = '';
  $person["mname"] = '';
  $person["lname"] = '';
  $person["mobile_number"] = '';
  $person["address"] = '';
  $person['details'] = '';
  $person['start_date'] = '';
}

include(SHARED_PATH.'/staff_header.php');?>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
   <?php include(SHARED_PATH.'/staff_sidebar_navigation.php'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include(SHARED_PATH.'/staff_top_navigation.php'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
              <a href="<?php echo url_for('staff/patients/index.php'); ?>" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fa fa-arrow-alt-circle-left"></i>
                </span>
                <span class="text">Back To All Patients</span>
                </a> Add New Patient</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Form -->
          <form action="<?php echo url_for('/staff/patients/new.php'); ?>" method="post">
            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  <div class="col-lg-5 d-none d-lg-block">
                    
                    <img class="img-thumbnail" src="<?php echo url_for('/assets/img/patients.jpg'); ?>" />

                  </div>
                  <div class="col-lg-7">
                    <div class="p-5">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Please Fill Up New Information</h1>
                      </div>

                        <?php echo display_errors($errors); ?>

                      <?php include('form_fields.php'); ?>

                      <button type="submit" class="btn btn-primary btn-user btn-block">
                        Submit New Record
                      </button>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

<?php include(SHARED_PATH.'/staff_logout_modal.php');  ?>

<?php include(SHARED_PATH."/staff_javascript_top_footer.php"); ?>
<?php include(SHARED_PATH.'/staff_footer.php'); ?>