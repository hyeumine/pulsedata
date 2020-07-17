<?php

require_once('../../../private/initialize.php');

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$person = Person::find_by_id($id);

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
              <a href="<?php echo url_for('staff/patients/'); ?>" class="btn btn-primary btn-circle"><i class="fa fa-arrow-alt-circle-left"></i></a> 
              Patient Info </h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Form -->
          <form action="" method="post">
            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                  <div class="col-lg-7">
                    <div class="p-5">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4"> 
                           Please Fill Up New Information</h1>
                      </div>
                      <form class="user">
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            First Name: <?php html( h( $person->fname ) ) ?>
                          </div>
                          <div class="col-sm-6">
                            M Name: <?php html( h( $person->mname ) ) ?>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            Last Name : <?php html( h( $person->lname ) ) ?>
                          </div>
                          <div class="col-sm-6">
                            Mobile: <?php html( h( $person->mobile_number ) ) ?>
                          </div>
                        </div>
                        <div class="form-group">
                          Address : <?php html( h( $person->address ) ) ?>
                        </div>
                        <div class="form-group">                                            
                          Details : <?php html( h( $person->details ) ) ?>
                        </div>
                         <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                          
                            <div class="dataTables_length" id="dataTable_length">
                               <label>
                                  Status : <?php echo h($person->condition()); ?>                          
                               </label>
                            </div>

                          </div>
                        </div>

                      <hr>                     
                      </form>

                     <p class="text-center"> 
                        <a class="action text-warning text-left" href="<?php echo url_for('/staff/patients/edit.php?id=' . h(u($person->id))); ?>"> <i class="fa fa-edit"></i> Update Info </a>
                     </p>   

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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

<?php include(SHARED_PATH.'/staff_footer.php'); ?>