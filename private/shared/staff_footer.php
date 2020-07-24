<script>

	$(document).ready(function(){

	  setTimeout(function() {
	    $('#formErrMessage').fadeOut('slow');
	  }, 2000); // <-- time in milliseconds

	});

</script>

</body>

</html>

<?php
  db_disconnect($db);
?>
