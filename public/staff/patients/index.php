<?php

require_once('../../../private/initialize.php');

require_login();

$persons = $person->find_all_person();

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
          <h1 class="h3 mb-2 text-gray-800">All Patients</h1>
          <p class="mb-4"> List of patients infected of covid-19 </p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of Patients</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Q Code</th>
                      <th>Lgu Code</th>
                      <th>First Name</th>
                      <th>Middle Name</th>
                      <th>Last Name</th>
                      <th>Mobile</th>
                      <th>Status</th>
                      <th>Oxygne </th>
                      <th>Date & Time</th>
                      <th>Details</th>
                      <th>Admission</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Q Code</th>
                      <th>Lgu Code</th>
                      <th>First Name</th>
                      <th>Middle Name</th>
                      <th>Last Name</th>
                      <th>Mobile</th>
                      <th>Status</th>
                      <th>Oxygne</th>
                      <th>Date & Time</th>
                      <th>Details</th>
                      <th>Admission</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php foreach($persons as $person) {

                        $qps = New QPersonSummary();
                        $status_summary = $qps->find_qperson_summary_id($person['id']);
                        $status['status'] = $qps->condition($status_summary['status']);
                        $oxreading_datetime = mdyyyy_time_format($status_summary['oxreading_datetime']);

                       ?>

                        <tr>
                          <td><?php echo h($person['qcode']); ?></td>
                          <td><?php echo h($person['lgu_code']); ?></td>
                          <td><?php echo h($person['fname']); ?></td>
                          <td><?php echo h($person['mname']); ?></td>
                          <td><?php echo h($person['lname']); ?></td>
                          <td><?php echo h($person['mobile_number']); ?></td>
                          <td class="text-center">
                            <?php echo $status['status']; ?></td>
                          <td><?php echo h($status_summary['ox_reading']); ?></td>
                          <td><?php echo h($oxreading_datetime); ?></td>
                          <td><?php echo h($person['details']); ?></td>
                          <td><?php echo h($person['start_date']); ?></td>
                          <td>
                            <a class="action text-info" href="<?php echo url_for('/staff/patients/show.php?id=' . h(u($person['id']))); ?>">  <i class="fa fa-eye"></i> <!-- View --></a>
                            <a class="action text-warning" href="<?php echo url_for('/staff/patients/edit.php?id=' . h(u($person['id']))); ?>"> <i class="fa fa-edit"></i> <!-- Edit --></a>
                            <a class="action text-danger" href="<?php echo url_for('/staff/patients/delete.php?id=' . h(u($person['id']))); ?>"> <i class="fa fa-trash-alt"></i> <!-- Delete --></a>
                        </td>
                        </tr>
                      <?php } ?>     
                  </tbody>
                </table>
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