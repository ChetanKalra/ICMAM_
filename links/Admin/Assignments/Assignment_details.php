<?php 

  $con = new MongoClient();

  $db = $con->ICMAM;

  $collection = $db->Lessons;

  $query = $collection->find();

  $array_of_results = iterator_to_array($query);


  $res[0] = current($array_of_results);
  $size = sizeof($array_of_results);
  
  for($i=1;$i<$size;$i++)
  {
    $res[$i] = next($array_of_results);
    //print_r($res[$i]['Lesson'][0]);
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
          <form method="POST" autocomplete="off" name="Assignment_Details" action="Functions/AssignmentDetailsUpload.php">
            <div class="row">
              <div class="custom-reg-box">
                <div class="panel registration-form">
                  <div class="panel-body registration-box">
                    <div class="text-center">
                      <h5 class="content-group-lg createAcc">Assignment</h5>
                      <!-- <h5 class="note-reg"><small class="display-block">All fields are required</small></h5> -->
                    </div>

                    <div class="col-md-12 margin-top-20px margin-bottom-20px">

                      <select class="form-control custom-dropdown" name="Lesson_Title">
                        
                        <?php

                          // echo "<option>All</option>";
                          for($i=0; $i<$size; $i++)
                          {
                            echo "<option>".$res[$i]['Lesson'][0]."</option>";
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
                          <input type="text" class="form-control custom-input" placeholder="Assignment Title" name="Assignment_Title" id="Assignment_Title">
                          
                        </div>
                      </div>
                      </div>

                      <!-- <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <div class="form-control-feedback">
                            <i class="icon-user-check text-muted"></i>
                          </div>
                          <input type="text" class="form-control custom-input" placeholder="Number of Questions" name="NoOfQuestions" id="NoOfQuestions">
                          
                        </div>
                      </div>
                       -->


                      <div class="col-md-12">
                        <div class="form-group has-feedback">
                          <div class="form-control-feedback">
                            <i class="icon-user-check text-muted"></i>
                          </div>
                          <input type="text" class="form-control custom-input" placeholder="Total Marks" name="Total_Marks" id="Total_Marks">
                          
                        </div>
                      </div>

                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <div class="form-control-feedback">
                            <i class="icon-user-lock text-muted"></i>
                          </div>
                          <input type="Date" id="Start_Date" class="form-control custom-input" placeholder="Start Date" name="Start_Date">
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <div class="form-control-feedback">
                            <i class="icon-user-lock text-muted"></i>
                          </div>
                          <input type="Date" id="End_Date" class="form-control custom-input" placeholder="End Date" name="End_Date">
                        </div>
                      </div>

                      
                    <div class="form-group">
                      
                    </div>

                    <div class="text-right padding-right-15 reg-btn-resp">
                     
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


