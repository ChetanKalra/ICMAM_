<?php
  
  session_start();
$con = new MongoClient();


	$db = $con->ICMAM;

       //session_start();
        $collection1 = $db->notes;
		$collection2 = $db->Lessons;


		//$query1 = $collection->find(array("Title"=>$_session["course_title"]));

	

        //$Password = $_POST['Password'];
		if(isset($_POST['save']))
		{
		//$user = $collection->findOne(array('Username'=>'Priya'));
			// echo "Hello";
			// exit;
	//$lesson_name=$new;
		 $notes = $_POST['valt'];
		 //echo $notes;
		 $notes1 = strip_tags($notes);
		 //exit;
		 		 //$insert_data = array('valt'=>$note);   
		 		     // 'Username'=>$user,
		 		 $query=array("Username"=>$_SESSION['user_id'],"Title"=>array('valt'=>$notes1));
               // $new=>$lesson_name,
				//'valt'=>$note);
			$collection1->insert($query);
}


	// header('location: '.'user_video.php?Title=Application of GIS in the Management of Aquatic Pollution');
		    ?>
