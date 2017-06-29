<?php 

	$a = $_GET['Count'];
	$b = $_GET['Question'];

	if(($a - $b)==-1)
	{
		header('location: '.'Final_Exam.php');
	}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="../../../css/icons/styles.css" rel="stylesheet" type="text/css">
	<link href="../../../css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="../../../css/style.css" rel="stylesheet">
	<script type="text/javascript" src="../../../js/jquery.min.js"></script>

	<script type="text/javascript" src="../../../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../../js/jquery.validate.js"></script>
	
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
					<form method="POST" autocomplete="off" name="Question" action="Functions/QuestionUpload.php?Question=<?php echo $_GET['Question'] ?>&Exam=<?php echo $_GET['Exam'] ?>&Count=<?php echo $a ?>">
						<div class="row">
							<div class="custom-reg-box">
								<div class="panel registration-form">
									<div class="panel-body registration-box">
										<div class="text-center">
											<h5 class="content-group-lg createAcc">Question <?php echo $_GET['Question']; ?></h5>
											<h5 class="note-reg"><small class="display-block">All fields are required</small></h5>
										</div>

										<div class="col-md-12">
											<div class="form-group has-feedback">
												
												<input type="text" class="form-control custom-input" placeholder="Question" name="Question" id="Question">
												
												
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<!-- <div class="form-control-feedback">
														<i class="icon-user-check text-muted"></i>
													</div>
													 -->
													 <input type="text" class="form-control custom-input" placeholder="Option 1" name="Option_1" id="Option_1">
													
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<!-- <div class="form-control-feedback">
														<i class="icon-user-check text-muted"></i>
													</div>
													 --><input type="text" class="form-control custom-input" placeholder="Option 2" name="Option_2" id="Option_2">
													
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<!-- <div class="form-control-feedback">
														<i class="icon-user-lock text-muted"></i>
													</div>
													 --><input type="text" id="Option_3" class="form-control custom-input" placeholder="Option 3" name="Option_3">
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<!-- <div class="form-control-feedback">
														<i class="icon-user-lock text-muted"></i>
													</div>
													 --><input type="text" class="form-control custom-input" placeholder="Option 4" name="Option_4" id="Option_4">
												</div>
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group has-feedback">
												<!-- <div class="form-control-feedback">
													<i class="icon-user-plus text-muted"></i>
												</div>
												 --><input type="text" class="form-control custom-input" placeholder="Answer" name="Answer" id="Answer">
												
											</div>

										
										<div class="form-group">
											
										</div>

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

<script type="text/javascript" src="../../../js/validate_admin.js"></script>

</html>


