<!-- Bootstrap core JavaScript-->
<script src="<?php html(url_for("/assets/vendor/jquery/jquery.min.js")); ?>"></script>

<script src="<?php html(url_for("/assets/vendor/bootstrap/js/bootstrap.bundle.min.js")); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php html(url_for("/assets/vendor/jquery-easing/jquery.easing.min.js")); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php html(url_for("/assets/js/sb-admin-2.min.js")); ?>"></script>

<?php  

 if( is_page( current_page(), SITE_NAME."/public/staff/patients/dashboard.php") ){
 ?>	

   <!-- Page level plugins -->
   <script src="<?php html(url_for("/assets/vendor/chart.js/Chart.min.js")); ?>"></script>

   <!-- show only data tables -->
	<script src="<?php html(url_for("/assets/js/moment/min/moment.min.js")); ?>"></script>

	<script src="<?php html(url_for("/assets/js/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")); ?>"></script>

   <!-- Page level custom scripts -->
   <script src="<?php html(url_for("/assets/js/demo/chart-area-demo.js")); ?>"></script>

   <script src="<?php html(url_for("/assets/js/demo/chart-pie-demo.js")); ?>"></script>

   <script>

   	// A $( document ).ready() block.
	$( document ).ready(function() {
	   	
	   	$('#datetimepicker1').datetimepicker({
	   		format: 'L'
	   	});

	   	$('#datetimepicker2').datetimepicker({
	   		format: 'L'
	   	});

	   	
	});

   </script>

<?php
 }
?>