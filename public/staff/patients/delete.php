<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/patients/index.php'));
}

$id = $_GET['id'];

if(is_post_request()) {

  // Delete bicycle

  $result = Person::delete_person($id);
  $_SESSION['message'] = 'The patients was deleted successfully.';
  redirect_to(url_for('/staff/patients/'));

} else {
  $person = Person::find_person_id($id);
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
            <h1 class="h3 mb-0 text-gray-800"> <a href="<?php echo url_for('staff/patients/'); ?>" class="btn btn-primary btn-circle"><i class="fa fa-arrow-alt-circle-left"></i></a> Delete Patient</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

		<!-- Form -->
        <form action="<?php echo url_for('/staff/patients/delete.php?id=' . h(u($person['id']))); ?>" method="post">

         <div class="col-xl-10 col-lg-12 col-md-9">

	        <div class="card o-hidden border-0 shadow-lg my-5">
	          <div class="card-body p-0">
	            <!-- Nested Row within Card Body -->
	            <div class="row">
	              <div class="col-lg-6 d-none d-lg-block">
                  
                   <img class="img-thumbnail" src="<?php echo url_for('/assets/img/patients.jpg'); ?>" />

                </div>
	              <div class="col-lg-6">
	                <div class="p-5">
	                  <div class="text-center">
	                    <h1 class="h4 text-gray-900 mb-2">Are you sure you want to delete this person?</h1>
			    			    <p class="item"><?php echo h($person['fname']); ?></p>
	                  </div>  
	                  <hr>
	                  <div class="text-center">
	                    <button type="submit" class="btn btn-danger btn-user btn-block">
	                          Delete Record
	                      </button>
	                  </div>
	          
	                </div>
	              </div>
	            </div>
	          </div>
        	</div>

      	</div>


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

  <!-- Logout Modal-->
 <?php include(SHARED_PATH.'/staff_logout_modal.php');  ?>

<?php include(SHARED_PATH.'/staff_footer.php'); ?>