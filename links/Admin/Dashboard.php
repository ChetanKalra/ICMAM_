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
       //$_SESSION['$results1']=$results;
      // if($results)
      // {
      //  $display = array();
      //  foreach($results as $rec)
      //  {
      //    $display[]=array($rec);

      //  }
      // }
      // print_r($display[1]);
      // $temp=sizeof($display);
      // echo $temp;
      // exit;

      // print_r($query);
      // $temp1 = $temp->sort($temp);
      //  print_r($temp1);
      // $query1=$collection->findOne();
      // print_r($query1);
      // //$results1 = 
      $array_of_results[0]=current($results);
      //print_r($array_of_results[0]['UsersRegistered']);
      for($i=1; $i<sizeof($results);$i++)
      {
      
          $array_of_results[$i]=next($results);
          //echo "<br>";
          //print_r($array_of_results[$i]['UsersRegistered']);

      }
      //exit;
      //print_r($array_of_results['_id']);
      //exit;
      //$_SESSION['$results1']=$array_of_results;
      //$temp1=$_SESSION['CourseTitle'];
      // // $temp2= sort($array_of_results);
      // // print_r($temp2);
      // exit;
      
    // echo '<pre>';
    // while ($query->hasNext()) { 
  //      $friend = $query->getNext();
  //      print_r($friend);
  //        echo PHP_EOL;
  //        exit();
    // }
    // echo '</pre>';
      // for($i=0;i<$temp;$i++)
      // {
      //  print_r($display[i][])
      // }
                      
                      


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
             
              
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="../Registration.php">Profile</a>
              </li>
              <li>
                <a href="../Login-Page.php" id="login-link">Logout</a>
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
                    <a href="Dashboard.php" class="nodecoration"><li class="active-ul"><i class="icon-home4 icon-dashboard"></i>Dashboard</li></a>
                    <a href="Courses.php" class="nodecoration"><li ><i class="icon-tree5 icon-dashboard"></i>Training Programmes</li></a>
                    <a href="Users.php?Title=All" class="nodecoration"><li><i class="icon-reading icon-dashboard"></i>Registered Users</li></a>
                    <!-- <a href="Lessons.php" class="nodecoration"><li><i class="icon-indent-decrease2 icon-dashboard"></i>Lessons</li></a>
                     --><a href="Assignments/Assignment_details.php" class="nodecoration"><li><i class="icon-copy icon-dashboard"></i>Assignments</li></a>
                    <a href="Exam/Exam_Details.php" class="nodecoration"><li><i class="icon-task icon-dashboard"></i>Examination</li></a>
                  
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

      <script src="../../js/jquery.min.js"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="../../js/scripts.js"></script>
      
  </body>

</html>