<?php

require_once('../../../private/initialize.php');

require_login();

// $id = $_GET['id'] ?? '1'; // PHP > 7.0
$id = isset( $_GET['id'] ) ? $_GET['id'] : "1";

if(is_post_request()) {

   if(is_blank($admin['message'])) {
      $errors[] = "message cannot be blank.";
    } elseif (!has_length($admin['first_name'], array('min' => 2, 'max' => 160))) {
      $errors[] = "message must be between 5 and 160 characters.";
    }


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
            <h1 class="h3 mb-0 text-gray-800"> 
               <a href="<?php echo url_for('staff/patients/index.php'); ?>" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                              <i class="fa fa-arrow-alt-circle-left"></i>
                            </span>
                            <span class="text">Back To All Patients</span>
                          </a> 
              Patient Info </h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-5 d-none d-lg-block ">
                  
                   <img class="img-thumbnail" src="<?php echo url_for('/assets/img/patients.jpg'); ?>" />

                </div>
                <div class="col-lg-7">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4"> 
                         Patient Information</h1>
                    </div>

                    <div class="col-md-8">
                      <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          <div class="row">
                              <div class="col-md-5">
                                  <label><strong>First Name</strong></label>
                              </div>
                              <div class="col-md-1">
                                  <label>:</label>
                              </div>
                              <div class="col-md-6">
                                  <p class="text-info"><strong><?php html( h( $person['fname'] ) ) ?></strong></p>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-5">
                                  <label><strong>Middle Name</strong></label>
                              </div>
                              <div class="col-md-1">
                                  <label>:</label>
                              </div>
                              <div class="col-md-5">
                                 <p class="text-info"><strong><?php html( h( $person['mname'] ) ) ?></strong></p>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-5">
                                  <label><strong>Last Name</strong></label>
                              </div>
                              <div class="col-md-1">
                                  <label>:</label>
                              </div>
                              <div class="col-md-5">
                                 <p class="text-info"><strong><?php html( h( $person['lname'] ) ) ?></strong></p>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-5">
                                  <label><strong>Mobile</strong></label>
                              </div>
                              <div class="col-md-1">
                                  <label>:</label>
                              </div>
                              <div class="col-md-5">
                                 <p class="text-info"><strong><?php html( h( $person['mobile_number'] ) ) ?></strong></p>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-5">
                                  <label><strong>Details</strong></label>
                              </div>
                              <div class="col-md-1">
                                  <label>:</label>
                              </div>
                              <div class="col-md-5">
                                 <p class="text-info"><strong><?php html( h( $person['details'] ) ) ?></strong></p>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-5">
                                  <label><strong>Status</strong></label>
                              </div>
                              <div class="col-md-1">
                                  <label>:</label>
                              </div>
                              <div class="col-md-5">
                                   <p class="text-info"><strong> <?php echo h( Person::condition(1) ); ?> </strong></p>                       
                              </div>
                          </div>                                 
                        </div>                          
                      </div>
                    </div>  

                    <p class="text-center"> 
                      <a class="action text-warning text-left" href="<?php echo url_for('/staff/patients/edit.php?id=' . h(u($person['id']))); ?>"> <i class="fa fa-edit"></i> Update Info </a>
                   </p>  

                    <!-- Form -->
                    <form id="messageSMS" action="../../../../smsrestcalls/sendsms.php" method="post">
                      <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                          <!-- Nested Row within Card Body -->
                          <div class="row">
                            <div class="col-lg-12">

                              <div class="p-5"> 

                                 <div id="messaStat"></div>
                                  <div id="messagErrF"></div> 

                                  <div class="form-group">   
                                    Message                                          
                                    <textarea id="message" name="message" class="form-control form-control-user" maxlength="160" value="" rows="5" ></textarea>
                                    <input type="hidden" name="qpatient" value="<?php echo $id; ?>" /> 
                                  </div>
                                 <button id="messageButtonSubmit" type="button" class="btn btn-primary btn-user btn-block">
                                    send message
                                 </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>    

                   <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"> Quarantine Patients Summary </h6>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table-sm table table-bordered table-hover patients-table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th class="small" >Date</th>
                                <th class="small" >Time</th>
                                <th class="small" >Oxi Reading</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th class="small" >Date</th>
                                <th class="small" >Time</th>
                                <th class="small" >Oxi Reading</th>
                              </tr>
                            </tfoot>
                            <tbody>              
                              <tr>
                                <th class="small">06/18/2020</th>
                                <td class="small">18:04</td>
                                <td class="small"> 90% </td>
                              </tr>
                              <tr>
                                <th class="small">06/17/2020</th>
                                <td class="small">17:04</td>
                                <td class="small">80%</td>
                              </tr>
                              <tr>
                                <th class="small">06/16/2020</th>
                                <td class="small">16:04</td>
                                <td class="small">80%</td>
                              </tr>
                               <tr>
                               <th class="small">06/14/2020</th>
                                <td class="small">15:04</td>
                                <td class="small">80%</td>
                              </tr>
                               <tr>
                                <th class="small">06/14/2020</th>
                                <td class="small">14:04</td>
                                <td class="small">80%</td>
                              </tr>
                               <tr>
                                <th class="small">06/13/2020</th>
                                <td class="small">12:04</td>
                                <td class="small">75%</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                    <a href="<?php echo url_for('staff/patients/index.php'); ?>" class="btn btn-primary btn-icon-split">
                      <span class="icon text-white-50">
                        <i class="fa fa-arrow-alt-circle-left"></i>
                      </span>
                      <span class="text">Back To All Patients</span>
                    </a>

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

<?php include(SHARED_PATH.'/staff_logout_modal.php');  ?>

<?php include(SHARED_PATH."/staff_javascript_top_footer.php"); ?>

<script>

  $(document).on('click', '#messageButtonSubmit', function(event){

      event.preventDefault();

      if( $("#message").val() == '' ){

          var html = "";
          html +='<div class="alert alert-danger alert-dismissible fade show" role="alert">';
              html+='<strong> Please fill up field </strong>';
             html +='<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
               html +='<span aria-hidden="true">&times;</span>';
             html +='</button>';
           html +='</div>';
           $('#messaStat').html(html);

      } else if( $("#message").val().length == 160 ){

         var html = "";
          html +='<div class="alert alert-danger alert-dismissible fade show" role="alert">';
              html+='<strong> Text exceeded </strong>';
             html +='<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
               html +='<span aria-hidden="true">&times;</span>';
             html +='</button>';
           html +='</div>';
           $('#messagErrF').html(html);

      }else{
         console.log("send here");
         $("form#messageSMS").submit();
      }

  });

</script>
<?php include(SHARED_PATH.'/staff_footer.php'); ?>