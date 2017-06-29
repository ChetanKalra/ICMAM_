<?php 
	session_start();
	//$Exam_Details=$_SESSION['Exam_Title'];
	//exit;
	$con = new Mongo();

  	$db = $con->ICMAM;
  	
  	$collection=$db->Papers;
  	
  	$i = $_SESSION['Count'];
  	
  	$collection1= $db->Exam_Details;

  	$query = $collection->findOne(array("Exam Title"=>"SO01"),array("Question".$i));
  	
  	$query1 = $collection1->findOne(array("Exam Title"=>"SO01"));
  	
  	//$array_of_results = iterator_to_array($query1);
  	$res1[0]=$query1;
  	
  	// print_r($res1[0]);
  	// exit();



  	//print_r($query);
  	//$array_of_results = iterator_to_array($query);
  	//print_r($array_of_results);

  	$res[0] = $query;
  	
  	
  	$_SESSION['Remaining']=$res1[0]['NoOfQuestions'];


  	// print_r($res[0]['Question1']['Question']);
  	// exit;

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php ?></title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<!-- <link href="../../../css/icons/styles.css" rel="stylesheet" type="text/css"> -->
	<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="../../css/style.css" rel="stylesheet">
	<script type="text/javascript" src="../../js/jquery.min.js"></script>

	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../js/jquery.validate.js"></script>
	
</head>

<body class="bg-login">

	<!-- Main navbar -->

	<div class="container-fluid">

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Registration form -->
						<form method="POST" autocomplete="off" name="Answer" action="Update_Score.php">
						<div class="row">
							<div class="custom-reg-box">
								<div class="panel registration-form">
									<div class="panel-body registration-box">
										<div class="text-center">
											<h5 class="content-group-lg createAcc text-align-left" style="padding-left: 15px;"><?php print_r($res[0]['Question'.$i]['Question'])?></h5>
										</div>

										<div class="col-md-12">
											<div class="form-group has-feedback">
												
												<h5></h5>
												
												
											</div>
										</div>
										<div class="row margin-top-20px">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													 <input type="radio" class="custom-input" name="value" value="1"> <?php print_r($res[0]['Question'.$i]['Option 1'])?>
													
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="radio" class="custom-input" name="value" value="2"> <?php print_r($res[0]['Question'.$i]['Option 2'])?>
													
													
												</div>
											</div>
										</div>

										<div class="row margin-top-10px">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="radio" class="custom-input" name="value" value="3"> <?php print_r($res[0]['Question'.$i]['Option 3'])?>
													
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<input type="radio" class="custom-input" name="value" value="4"> <?php print_r($res[0]['Question'.$i]['Option 4'])?>
													
												</div>
											</div>
										</div>

										<div class="col-md-12">

										<div class="text-right padding-right-15 reg-btn-resp">
											
											<button type="submit" class="btn custom-btn-reg" name="Submit" >
											Next
											<i class="icon-plus3 padding-left-5"></i></button>

											
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>

					
					
				
				</div>
	
			</div>
	
		</div>
	
	</div>
	
</div>

</body>

<script type="text/javascript" >


// var rates = document.getElementsByName('value');
// var rate_value;
// for(var i = 0; i < rates.length; i++){
//     if(rates[i].checked){
//         rate_value = rates[i].value;
//     }
// }

//alert(rate_value);



</script>

</html>


