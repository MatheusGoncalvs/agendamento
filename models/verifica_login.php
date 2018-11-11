<?php
	if(!$_SESSION['nome']) {
		header('Location: ../index-login.php');
		exit();
	}
?>