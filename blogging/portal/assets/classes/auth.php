<?php
if(!isset($_SESSION['staff_id']) || (trim($_SESSION['staff_id']) == '')) {
		?>
		<script> window.location = "https://ttchtech.co.za/blogging"</script>
		<?php
		exit();
	}

	?>