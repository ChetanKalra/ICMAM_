<?php 

  $con = new MongoClient();

  $db = $con->ICMAM;

  $collection = $db->courses;

  $query = $collection->find();

  $array_of_results = iterator_to_array($query);


  $res[0] = current($array_of_results);
  $size = sizeof($array_of_results);
  
  for($i=1;$i<$size;$i++)
  {
    $res[$i] = next($array_of_results);
  }

  //print_r($res);
  //exit;
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
          <form method="POST" autocomplete="off" name="Exam_Details" action="Functions/ExamDetailsUpload.php">
            <div class="row">
              <div class="custom-reg-box">
                <div class="panel registration-form">
                  <div class="panel-body registration-box">
                    <div class="text-center">
                      <h5 class="content-group-lg createAcc">Examination</h5>
                      <!-- <h5 class="note-reg"><small class="display-block">All fields are required</small></h5> -->
                    </div>

                    <div class="col-md-12 margin-top-20px margin-bottom-20px">

                      <select class="form-control custom-dropdown" name="Course_Title">
                        
                        <?php

                          // echo "<option>All</option>";
                          for($i=0; $i<$size; $i++)
                          {
                            echo "<option>".$res[$i]['Title']."</option>";
                          }

                         ?>
                      </select>
                   
                   </div>

                   
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group has-feedback">
                          <div class="form-control-feedback">
                            <i class="icon-user-check text-muted"></i>
                          </div>
                          <input type="text" class="form-control custom-input" placeholder="Exam Title" name="Exam_Title" id="Exam_Title">
                          
                        </div>
                      </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <div class="form-control-feedback">
                            <i class="icon-user-check text-muted"></i>
                          </div>
                          <input type="text" class="form-control custom-input" placeholder="Number of Questions" name="NoOfQuestions" id="NoOfQuestions">
                          
                        </div>
                      </div>
                      


                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <div class="form-control-feedback">
                            <i class="icon-user-check text-muted"></i>
                          </div>
                          <input type="Date" class="form-control custom-input" placeholder="Date" name="Date" id="Date">
                          
                        </div>
                      </div>

                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <div class="form-control-feedback">
                            <i class="icon-user-lock text-muted"></i>
                          </div>
                          <input type="text" id="Start_Time" class="form-control custom-input" placeholder="Start Time" name="Start_Time">
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <div class="form-control-feedback">
                            <i class="icon-user-lock text-muted"></i>
                          </div>
                          <input type="text" id="End_Time" class="form-control custom-input" placeholder=" End Time" name="End_Time">
                        </div>
                      </div>

                      <!-- <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <div class="form-control-feedback">
                            <i class="icon-user-lock text-muted"></i>
                          </div>
                          <input type="password" class="form-control custom-input" placeholder="Repeat password" name="ConfirmPassword" id="ConfirmPassword">
                        </div>
                      </div>
                    </div> -->

                    <!-- <div class="row">
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
                    </div> -->

                    <div class="form-group">
                      
                    </div>

                    <div class="text-right padding-right-15 reg-btn-resp">
                      <!-- <a href="Login-Page.php" class="nodecoration custom-link-reg padding-right-10">
                      <i class="icon-arrow-left13 position-left"></i>&nbsp;
                      Back to login form
                      </a> -->
                      
                      <button type="submit" class="btn custom-btn-reg" name="submit" >
                      Create 
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

      </div>
   
    </div>
   
  </div>
  
</div>
</body>

</html>


