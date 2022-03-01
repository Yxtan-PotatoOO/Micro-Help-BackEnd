<!doctype html> 
<html> 
	<head> 
	<meta charset="UTF-8"> 
	</head> 
	<body> 
		<?php
		session_start ();
		session_destroy (); 
		?> 
		<script type="text/javascript"> 
			window.location.href="../pages/Index/Login.php"; 
		</script> 
	</body> 
</html> 