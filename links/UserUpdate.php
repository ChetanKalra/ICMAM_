<?php 

	$Title = $_GET['Title'];

	session_start();

	if(isset($_SESSION['user_id']))
	{
		$con = new MongoClient();

		$db = $con->ICMAM;

		$collection1 = $db->users;

		$query = $collection1->find(array("Enrolled"=>$Title));

		$a = iterator_to_array($query);
		
		if($a!=null)
		{
			$found = 1;
			// exit();
		}

		else
		{
			$user_id = $_SESSION['user_id'];

		  	$collection = $db->users;

		  	$found = 0;

		  	$query = $collection->update(array('_id'=>$user_id),array('$push'=>array('Enrolled'=>$Title)),array('upsert'=>true));
		}

	}

	// exit;


?>






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Success</title>

   <!-- <link href="../css/icons/styles.css" rel="stylesheet" type="text/css"> -->
	
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <!-- <link href="../css/animate.css" rel="stylesheet"> -->
  </head>
  <body class="bg-login">

  	 <div class="container-fluid">
  	 	

			<div class="clearfix login-block-parent">
			<div class="Login_Block">

				<div class="thumbnail login-thumbnail">
					<form method="POST" class="padding-top-5px" autocomplete="off">
						<div class="panel panel-body login-form margin-bottom-0">
							<h4><?php if($found==1) echo "You have already registered for ".$Title;
							else echo "You have successfully registered for ".$Title ?>
							</h4>

							<a href="../Index.php" class="nodecoration text-color-555"><h4>Home</h4></a>

							
						</div>
					</form>							
				</div>

			</div>
		</div>

  	 </div>




  </body>
</html>
