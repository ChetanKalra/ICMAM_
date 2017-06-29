<?php

	 $con = new MongoClient();

  	$db = $con->ICMAM;

  	session_start();

  	$i = $_SESSION['Count'];
  	$_SESSION['Count']+=1;

  	if($i == $_SESSION['Remaining'])
  	{
  		header('location: '.'End_Exam.php');
  		exit;
  	}


  	$collection = $db->Responses;
  	if(isset($_POST["Submit"]))
  	{
  		$Question= "Question".$_SESSION['Count'];
  		
  		$Answer=$_POST['value'];

  		// echo $Answer;

		  if($con)
		{
				$collection1 = $db->Papers;

				$res = $collection1->find(array("Exam Title"=>$_SESSION['Exam_Title']),array("Question".$i=>1));

				$k = iterator_to_array($res);
				

				$res_final[0] = current($k);
				//print_r($res_final);


				$ans = $res_final[0]['Question1']['Answer'];
				//print_r($ans);



				if($ans==$Answer)
				{
					$flag = true;
				}
				else
				{
					$flag = false;
				}


		  		$query=array("ID"=>$_SESSION['user_id'],"Question"=>$Question,"Answer"=>$Answer,"Flag"=>$flag);
		  		$collection->insert($query);
	  	}


	  	// exit;
	  	header('location: '.'Second.php');

	 }

	

?>