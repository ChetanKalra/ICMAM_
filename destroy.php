<?php

	session_start();
	//$_SESSION['user_id']= "";
	// session_unset($_SESSION['user_id']);
	
	session_destroy();
	//echo $_SESSION['user_id'];
	// exit();

	$_SESSION = array();
	header('location: '.'index.php');

?>