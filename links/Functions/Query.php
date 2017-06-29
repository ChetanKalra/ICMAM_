<?php
	
	$con = new MongoClient();

	if($con)
	{
		if(isset($_POST['submit']))
		{
			$name = $_POST['name'];
			$email = $_POST['email'];
			$message = $_POST['message'];

			$db = $con->ICMAM;
			$collection = $db->query;


			$query = array('Name'=>$name,'Email'=>$email,'Query'=>$message);


			$collection->insert($query);

			header('location: '.'../About.html');

		}
	}

?>