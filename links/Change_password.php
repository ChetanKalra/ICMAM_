<?php

	
   $flag =1;
   session_start();
  
  if(isset($_SESSION['user_id'])){
    $flag = 0;
}

?>


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
  	
  			<?php require 'navigation-links.php' ?>

			<div class="clearfix login-block-parent">
			<div class="Login_Block">

				<div class="thumbnail login-thumbnail">
					<form method="POST" class="padding-top-5px" autocomplete="off">
						<div class="panel panel-body login-form margin-bottom-0">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
								<h5 class="content-group">Reset Password <br><small class="display-block">Enter your credentials below</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control custom-input" placeholder="Current Password" name="Current_Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left margin-bottom-20">
								<input type="password" class="form-control custom-input" placeholder="New Password" name="New_Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
								<p id="InvalidError"></p>
							</div>

							<div class="form-group has-feedback has-feedback-left margin-bottom-20">
								<input type="password" class="form-control custom-input" placeholder="Confirm Password" name="Confirm_Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
								<p id="InvalidError"></p>
							</div>

							<div class="form-group">
								<button type="submit" class="btn login-submit-btn btn-block" name="Reset">Reset Password <i class="icon-circle-right2 position-right"></i></button>
								<p id="InvalidError"></p>
							</div>
							<!-- <div class="text-center">
								<a href="" class="nodecoration">Forgot password?</a>
							</div> -->
						</div>
					</form>							
				</div>

			</div>
		</div>

  	 </div>
<?php

    if(isset($_POST['Reset'])) {
        $conn = new Mongo();

        $db = $conn->ICMAM;
        // session_start();
        $collection = $db->users;


        //$Name = $_POST['Username'];
        $Password = $_POST['Current_Password'];
        $New_Password = $_POST['New_Password'];

		$user = $collection->findOne(array('Password'=>$Password));

		$res[0] = $user;
		//print_r($res);
		//exit;
		$conn->close();

		if($user)
		{
			
			$collection->update(array('_id'=>$_SESSION['user_id']),array('$set'=>array('Password'=>$New_Password)));

			//$res = iterator_to_array($query);

			//print_r($res);
			header('Location: '.'Login-Page.php');

			//exit;

			// db.users.update({'Username':'Dhiraj'},{$set:{"Password":"dhir"}},false,false)
			
		}

		//exit;
		else{
			echo "<script>
					document.getElementById('InvalidError').innerHTML='Invalid Credentials';
				  </script>";
		}
		
    } 
?>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
    
    

  </body>
</html>
