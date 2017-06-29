

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Stage 1</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<!-- <link href="../css/icons/styles.css" rel="stylesheet" type="text/css"> -->
	<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="../../css/style.css" rel="stylesheet">
	
	
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
					
						<div class="row">
							<div class="custom-reg-box">
								<div class="panel registration-form">
									<div class="panel-body registration-box">
										
										
									<p style="font-size: 15px;">In accepting these terms and conditions, I declare that the information on my application is correct and I understand that if the answers are untrue, my application may be rejected or my results withheld. I have read the relevant extracts from the assessment regulations, and I will be eligible to sit the assessment for which I have applied, and I agree to comply with the assessment regulations, terms and conditions. I understand that receipt of the application form by the Institute is not a confirmation of eligibility.</p>

									<div class="text-align-center margin-top-30px">
										<a href="Second.php" class="nodecoration text-color-555 proceed-btn"><h4>Proceed</h4></a>
									</div>
										

									</div>
								</div>
							</div>
						</div>
				

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
</div>


</body>

<?php

	session_start();
	$_SESSION['Exam_Title'] = "SO01";
	$_SESSION['Count']=1;

?>

</html>
