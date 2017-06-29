


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

   <link href="../css/icons/styles.css" rel="stylesheet" type="text/css">
	
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <!-- <link href="../css/animate.css" rel="stylesheet"> -->
  </head>
  <body class="bg-login">

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

			<div class="clearfix login-block-parent">
			<div class="Login_Block">

				<div class="thumbnail login-thumbnail">
					<form method="POST" class="padding-top-5px" autocomplete="off">
						<div class="panel panel-body login-form margin-bottom-0">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
								<h5 class="content-group">Login to your account <br><small class="display-block">Enter your credentials below</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control custom-input" placeholder="Username" name="Username">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left margin-bottom-20">
								<input type="password" class="form-control custom-input" placeholder="Password" name="Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
								<p id="InvalidError"></p>
							</div>

							<div class="form-group">
								<button type="submit" class="btn login-submit-btn btn-block" name="Login">Sign in <i class="icon-circle-right2 position-right"></i></button>
								<p id="InvalidError"></p>
							</div>
							<div class="text-center">
								<a href="" class="nodecoration">Forgot password?</a>
							</div>
						</div>
					</form>							
				</div>

			</div>
		</div>

  	 </div>


    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
    
    <?php

    if(isset($_POST['Login'])) {
        $conn = new Mongo('localhost');

        $db = $conn->ICMAM;
        
        session_start();
        
        $collection = $db->users;


        $Name = $_POST['Username'];
        $Password = $_POST['Password'];

		$user = $collection->findOne(array('Username'=>$Name, 'Password'=>$Password));

		$res[0] = $user;
		// print_r($res);
		//exit;




		$conn->close();

		if($user)
		{
			// exit;
			if(isset($_GET['redirect'])){


				if($_GET['redirect']==1)
				{
					$Title = $_GET['Title'];
					$_SESSION['user_id'] = $res[0]['_id'];
					header('Location: '.'UserUpdate.php?Title='.$Title);
				}

				if($_GET['redirect']==2)
				{
					$Title = $_GET['Title'];
					$_SESSION['user_id'] = $res[0]['_id'];
					header('Location: '.'Register_Course.php?Title='.$Title);
				}
			}
			else if($Name=="Admin" && $Password == "Admin1234")
			{
				header('Location: '.'Admin/Courses.php');
			}
			else{
				
				$_SESSION['user_id'] = $res[0]['_id'];

				//echo $_SESSION['user_id'];

				header('Location: '.'../index.php');	
			}
			
		}
		else{
			echo "<script>
					document.getElementById('InvalidError').innerHTML='Invalid Credentials';
				  </script>";
		}
		
    } 
?>

  </body>
</html>
