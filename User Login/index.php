<?php
	session_start();
	if (!isset($_SESSION['userKey'])) {
		header('location: login.php');
	}


	else{
		error_reporting(0);
		include ('dashBoard.php');

	}

?>