<?php
  
    
      session_start();
      $con = new MongoClient();
      $db = $con->ICMAM;

      
        $flag =1;
  
  if(isset($_SESSION['user_id'])){
    $flag = 0;
  }

  $con = new MongoClient();

  $db = $con->ICMAM;

  $collection = $db->Exam_Details;

  $query = $collection->find();

  $collection1 = $db->users;

  $query2 = $collection1->find(array("_id"=>$_SESSION['user_id']),array("Enrolled"));


  $q = iterator_to_array($query2);
  $w = current($q);
  //print_r($w['Enrolled'][0]);


  $size_of_Enrolled = sizeof($w['Enrolled']);


  for($i=0;$i<$size_of_Enrolled;$i++)
  {
    $Enrolled_array[$i] = $w['Enrolled'][$i];
  }

  //print_r($Enrolled_array);


  // echo $size_of_Enrolled;

  //exit;    


  $results = iterator_to_array($query);

  $array_of_results[0] = current($results);

  for($i=1;$i<sizeof($results);$i++)
  {
    $array_of_results[$i] = next($results);
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ICMAM-PD</title>

    <link href="../../css/icons/styles.css" rel="stylesheet" type="text/css">
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/animate.css" rel="stylesheet">
    



  </head>
  <body>
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
              <a href="../../Index.php">Home</a>
            </li>
            <li>
              <a href="../Courses-users.php">Courses</a>
            </li>
            <li>
              <a href="../About.php">About Us</a>
            </li>
            
          </ul>
          
          <ul class="nav navbar-nav navbar-right" <?php if($flag==0) echo "style='display:none;'" ?>>
            <li>
              <a href="../Registration.php">Register</a>
            </li>
            <li>
              <a href="../Login-Page.php" id="login-link">Login</a>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right" <?php if($flag==1) echo "style='display:none;'" ?>>
            
            <li>
              <a href="../../destroy.php">Logout</a>
            </li>
          </ul>
        </div>
        
      </nav>


        <div class="row adjustment" style="margin-top: 50px;">
            <div class="col-md-12 zeropadding">

              <div class="left-sidebar zeropadding">
                <div class="Admin">
                  <img src="../../assets/Images/Team/user.png" class="admin-img">
                </div>

                <div class="subsection">
                  <ul class="subsection-ul">
                    
                    <a href="../Enrolled_Courses.php" class="nodecoration"><li ><i class="icon-tree5 icon-dashboard"></i>Profile</li></a>
                    
                    <a href="../Change_Password.php?Title=All" class="nodecoration"><li><i class="icon-reading icon-dashboard"></i>Change Password</li></a>
                    
                    <a href="" class="nodecoration"><li><i class="icon-copy icon-dashboard"></i>Assignments</li></a>
                    
                    <a href="Results.php" class="nodecoration"><li><i class="icon-indent-decrease2 icon-dashboard"></i>Exams</li></a>
                 </ul>

                </div>
              </div>

              <div class="right-sidebar zeropadding">

                  <div class="heading-rightsection">
                    <h2 class="nav-title">Results</h2>
                  </div>

               
                  <div class="row adjustment">
              <div class="col-md-12 default-padding margin-top-20px">
      <!-- <h3 class="text-center textcolor">
        Results
      </h3> -->


        


  <div class="panel-group margin-top-60px" id="accordion">
   
   

   




        <?php 



        for($i=0;$i<$size_of_Enrolled;$i++)
        {

          $key = $Enrolled_array[$i];
          // echo $key;

          $query3 = $collection->find(array('Exam Title'=>$key));

          $z = iterator_to_array($query3);

          $current_query3 = current($z);


          // print_r($current_query3);
          $res2[0] = $current_query3;

          //exit;



         echo " <div class='panel panel-default'>
            <div class='panel-heading padding-left-30'>
        <h4 class='panel-title ellipsis_oneline'><a data-toggle='collapse' data-parent='#accordion' href='#collapse".$i."'>".$res2[0]['Exam Title']."</a>
        </h4>
      </div>
      <div id='collapse".$i."' class='panel-collapse collapse in'>
        <div class='panel-body padding-left-30'>

        <p>Date: ".$res2[0]['Date']."</p>
        <p>Start Time: ".$res2[0]['Start Time']."</p>

        <p>End Time: ".$res2[0]['End Time']."</p>
        <form method='POST'>
        <p class='button-course margin-top-20px'><a ><button class='btn btn-default' name='result'>Result</button>
        <button data-toggle='modal' class='btn btn-default' data-target='#Course'>Start</button></a></p>
        </form>

        </div>
      </div> </div>

  </div> ";


    }


        ?>


          







   



</div>

    </div>















              
              </div>
          
          </div>
      </div>

      <script src="../../js/jquery.min.js"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="../../js/scripts.js"></script>



      <?php

        if(isset($_POST['result']))
        {
          $collection3 = $db->Responses;

          $query5 = $collection3->find(array('Flag'=>true));

          $e = iterator_to_array($query5);

          //echo sizeof($e);



          //echo $a;
         
        }

      ?>
      
  </body>

</html>