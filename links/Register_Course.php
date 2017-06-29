<?php

		$con = new Mongo();
	  	$db = $con->ICMAM;
	  	$collection2 = $db->users;
	  	$Title2 = $_GET['Title'];
		session_start();

		$query2 = $collection2->update(array('_id'=>$_SESSION['user_id']),array('$push'=>array('Registered'=>$Title2)),array('upsert'=>false));	


		header('location: '.'');

?>