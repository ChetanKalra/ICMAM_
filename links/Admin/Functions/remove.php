<?php
	
	session_start();
	//print_r($_SESSION);
	//$Title=$_POST['$CourseTitle'];
	//print_r($Title);
	 $CourseTitle=$_GET["CourseTitle"];
	 echo $CourseTitle;
	

	//exit;
	if(isset($_POST['yes_remove']))
	{

		$con = new MongoClient();
		if($con)
		{
			$db = $con->ICMAM;
			$addcourse = $db->courses;
			$query = array('Title'=>$CourseTitle);
			$addcourse->remove($query);
			header('location: '.'../Courses.php');
		
		 }
	

		//exit;


			
	}

?>