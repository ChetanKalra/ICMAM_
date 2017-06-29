<?php
	
	session_start();
	
	 $CourseTitle=$_GET["CourseTitle"];

	 
	 if(isset($_POST['yes_withdraw']))
	{

		$con = new MongoClient();

		if($con)
		{
			$db = $con->ICMAM;
			$removecourse = $db->users;
			

			$removecourse->update(array('_id'=>$_SESSION['user_id']),array('$pull'=>array("Registered"=>$CourseTitle)));


			//db.users.update({"Username":"Dhiraj"},{$pull: {"Registered":"OSM"}});
			header('Location: '.'Enrolled_Courses.php');
		
		 }
	

		//exit;


			
	}

?>