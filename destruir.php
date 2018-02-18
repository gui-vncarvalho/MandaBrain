<?php
	session_start();
	session_destroy();
		echo('<script>window.alert("Volte sempre :)");window.location="index.php";</script>');
?>