<?php
  
    
      session_start();
      $con = new MongoClient();
      $db = $con->ICMAM;

      $collection = $db->courses;

      $query= $collection->find();
      $query->sort(array('UsersRegistered'=>-1));
      $results = iterator_to_array($query);
      //print_r($results);
      $temp=sizeof($results);

      $array_of_results[0]=current($results);
      //print_r($array_of_results[0]['UsersRegistered']);
      for($i=1; $i<sizeof($results);$i++)
      {
      
          $array_of_results[$i]=next($results);
          
      }

    


  $flag =1;
  
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

    <title>ICMAM-PD</title>

    <link href="../css/icons/styles.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    



  </head>
  <body>
    <div class="container-fluid">
      <?php require '../navigation-links.php' ?>


        <div class="row adjustment" style="margin-top: 50px;">
            <div class="col-md-12 zeropadding">

              <div class="left-sidebar zeropadding">
                <div class="Admin">
                  <img src="../assets/Images/Team/user.png" class="admin-img">
                </div>

                <div class="subsection">
                  <ul class="subsection-ul">
                    <a href="Enrolled_Courses.php" class="nodecoration"><li ><i class="icon-tree5 icon-dashboard"></i>Profile</li></a>
                    <a href="Change_Password.php?Title=All" class="nodecoration"><li><i class="icon-reading icon-dashboard"></i>Change Password</li></a>
                    <a href="" class="nodecoration"><li><i class="icon-copy icon-dashboard"></i>Assignments</li></a>
                    <a href="User/First.php" class="nodecoration"><li><i class="icon-indent-decrease2 icon-dashboard"></i>Exams</li></a>
                    
                    <!-- <a href="" class="nodecoration"><li><i class="icon-task icon-dashboard"></i>Examination</li></a> -->
                  
                  </ul>
                
                </div>
              </div>

              <div class="right-sidebar zeropadding">

                  <div class="heading-rightsection">
                    <h2 class="nav-title">Training Programmes</h2>
                  </div>

               
              
              </div>
          
          </div>
      </div>

      <script src="../js/jquery.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/scripts.js"></script>
      
  </body>

</html>