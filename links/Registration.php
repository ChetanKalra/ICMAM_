

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="../css/icons/styles.css" rel="stylesheet" type="text/css">
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="../css/style.css" rel="stylesheet">
	<script type="text/javascript" src="../js/jquery.min.js"></script>

	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery.validate.js"></script>
	
</head>

<body class="bg-login">

	<!-- Main navbar -->

	<div class="container-fluid">


	<nav class="navbar navbar-default navbar-fixed-top custom-nav" role="navigation">
				<div class="navbar-header">
					 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					<!-- </button> <a class="navbar-brand" href="#">ICMAM</a> -->
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="">
							<a href="../Index.php">Home</a>
						</li>
						<li>
							<a href="Courses-users.php">Courses</a>
						</li>
						<li>
							<a href="About.html">About Us</a>
						</li>
						
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="Registration.php">Register</a>
						</li>
						<li>
							<a href="Login-Page.php" id="login-link">Login</a>
						</li>
					</ul>
				</div>
				
			</nav>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Registration form -->
					<form method="POST" autocomplete="off" name="registration">
						<div class="row">
							<div class="custom-reg-box">
								<div class="panel registration-form">
									<div class="panel-body registration-box">
										<div class="text-center">
											<h5 class="content-group-lg createAcc">Create account</h5>
											<h5 class="note-reg"><small class="display-block">All fields are required</small></h5>
										</div>

										<div class="col-md-12">
											<div class="form-group has-feedback">
												<div class="form-control-feedback">
													<i class="icon-user-plus text-muted"></i>
												</div>
												<input type="text" class="form-control custom-input" placeholder="Choose username" name="Username" id="Username">
												<div id="UsernameExist">
												</div>
												
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-user-check text-muted"></i>
													</div>
													<input type="text" class="form-control custom-input" placeholder="First name" name="FirstName" id="FirstName">
													
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-user-check text-muted"></i>
													</div>
													<input type="text" class="form-control custom-input" placeholder="Last name" name="SecondName" id="SecondName">
													
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-user-lock text-muted"></i>
													</div>
													<input type="password" id="Password" class="form-control custom-input" placeholder="Create password" name="Password">
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-user-lock text-muted"></i>
													</div>
													<input type="password" class="form-control custom-input" placeholder="Repeat password" name="ConfirmPassword" id="ConfirmPassword">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-mention text-muted"></i>
													</div>
													<input type="email" id="Email" class="form-control custom-input" placeholder="Your email" name="Email">
													
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group has-feedback">
													<div class="form-control-feedback">
														<i class="icon-user-lock text-muted"></i>
													</div>
													<input type="text" class="form-control custom-input" placeholder="Contact" name="Contact" id="Contact">
													
												</div>
											</div>
										</div>

										<div class="form-group">
											
										</div>

										<div class="text-right padding-right-15 reg-btn-resp">
											<a href="Login-Page.php" class="nodecoration custom-link-reg padding-right-10">
											<i class="icon-arrow-left13 position-left"></i>&nbsp;
											Back to login form
											</a>
											
											<button type="submit" class="btn custom-btn-reg" name="Submit" >
											Create account 
											<i class="icon-plus3 padding-left-5"></i></button>

											
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
					<!-- /registration form -->


					<!-- Footer -->
					<!-- <div class="footer text-muted text-center">
						&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div> -->
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
</div>


	<script type="text/javascript" src="../js/validate_form.js"></script>


	<?php

		$con = new Mongo("localhost");
		
		$db = $con->ICMAM;
		
		$collection = $db->users;
		
		if(isset($_POST['Submit'])){
			
			$Username = $_POST['Username'];
			$FirstName = $_POST['FirstName'];
			$LastName = $_POST['SecondName'];
			$Email = $_POST['Email'];
			$Password = $_POST['Password'];
			$Contact = $_POST['Contact'];

			$insert_data = array(
				'Username'=>$Username,
				'FirstName'=>$FirstName,
				'LastName'=>$LastName,
				'Password'=>$Password,
				'Email'=>$Email,
				'Contact'=>$Contact,
				'Registered'=>array()
			);

			$check = $collection->findOne(array("Username"=>$Username));

			if($check){
				echo "<script>$('#UsernameExist').html('Username already in use.');</script>";

				//Set Values
				echo "<script>$('#FirstName').val('".$FirstName."');
				$('#SecondName').val('".$LastName."');
				$('#Email').val('".$Email."');
				$('#Contact').val(".$Contact.");
				$('#Password').val('".$Password."');
				$('#ConfirmPassword').val('".$Password."');</script>";

			}
			else{
				$collection->insert($insert_data);
			}

		}

	?>


</body>
</html>
