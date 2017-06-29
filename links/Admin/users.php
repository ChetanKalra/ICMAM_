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

    <title>ICMAM-PD</title>

    <link href="../../css/icons/styles.css" rel="stylesheet" type="text/css">
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/animate.css" rel="stylesheet">
    <link href="../../css/Alt-style.css" rel="stylesheet">
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
                    <!-- <a href="Dashboard.php" class="nodecoration"><li><i class="icon-home4 icon-dashboard"></i>Dashboard</li></a> -->
                    <a href="Courses.php" class="nodecoration"><li ><i class="icon-tree5 icon-dashboard"></i>Training Programmes</li></a>
                    <a href="users.php" class="nodecoration"><li class="active-ul"><i class="icon-reading icon-dashboard"></i>Registered Users</li></a>
                    <!-- <a href="Lessons.php" class="nodecoration"><li><i class="icon-indent-decrease2 icon-dashboard"></i>Lessons</li></a>
                     --><a href="Assignments/Assignment_details.php" class="nodecoration"><li><i class="icon-copy icon-dashboard"></i>Assignments</li></a>
                    <a href="Exam/Exam_Details.php" class="nodecoration"><li><i class="icon-task icon-dashboard"></i>Examination</li></a>
                  
                  </ul>
                
                </div>
              </div>

              <div class="right-sidebar zeropadding" id="right-sidebar">

                  <div class="heading_lesson text-align-center">
                    <h2 class="nav-title padding-top-40px">Registered Users</h2>
                  </div>

                  <div class="col-md-12 margin-top-20px margin-bottom-20px">

                  <select class="form-control custom-dropdown" onchange="window.location.href='?Title='+options[this.selectedIndex].value">
                    
                    <?php

                      echo "<option>All</option>";
                      for($i=0; $i<$size; $i++)
                      {
                        echo "<option value='".$res[$i]['Title']."' "; if($_GET['Title']==$res[$i]['Title']) echo "selected";
                        echo ">".$res[$i]['Title']."</option>";
                      }

                     ?>
                  </select>
                   
                  </div>


  <style>

  /*if($Gender == "Male") echo "selected";*/
  
  /* 
  Max width before this PARTICULAR table gets nasty
  This query will take effect for any screen smaller than 760px
  and also iPads specifically.
  */
  @media 
  only screen and (max-width: 768px){
  
    /* Force table to not be like tables anymore */
    table, thead, tbody, th, td, tr { 
      display: block; 
    }
    
    /* Hide table headers (but not display: none;, for accessibility) */
    thead tr { 
      position: absolute;
      top: -9999px;
      left: -9999px;
    }

    #right-sidebar{
      width: calc(100vw) !important; 
    }
    
    tr { border: 1px solid #ccc; }
    
    td { 
      /* Behave  like a "row" */
      border: none;
      border-bottom: 1px solid #eee; 
      position: relative;
      padding-left: 42%; 
    }
    
    td:before { 
      /* Now like a table header */
      position: absolute;
      /* Top/left values mimic padding */
      top: 6px;
      left: 6px;
      width: 45%; 
      padding-right: 10px; 
      white-space: nowrap;
    }
    
    /*
    Label the data
    */
    td:nth-of-type(1):before { content: "Username"; }
    td:nth-of-type(2):before { content: "First Name"; }
    td:nth-of-type(3):before { content: "Last Name"; }
    td:nth-of-type(4):before { content: "Email Id"; }
    td:nth-of-type(5):before { content: "Contact"; }
    /*td:nth-of-type(6):before { content: "Porn Name"; }
    td:nth-of-type(7):before { content: "Date of Birth"; }
    td:nth-of-type(8):before { content: "Dream Vacation City"; }
    td:nth-of-type(9):before { content: "GPA"; }
    td:nth-of-type(10):before { content: "Arbitrary Data"; }*/
  }
  
  /* Smartphones (portrait and landscape) ----------- */
  @media only screen
  and (min-device-width : 320px)
  and (max-device-width : 480px) {
    body { 
      padding: 0; 
      margin: 0; 
      width: 320px; }
    }
  
  /* iPads (portrait and landscape) ----------- */
  @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
    body { 
      width: 495px; 
    }
  }
  
  </style>
  <!--<![endif]-->


<?php
  $con = new MongoClient();
      $db = $con->ICMAM;

      $collection = $db->users;


      if(isset($_GET['Title']))
      {
        $Filter = $_GET['Title'];
        //echo $Filter;
        $query= $collection->find(array("Registered"=>$Filter));

        if($Filter=='All')
        {
          $query= $collection->find();
        }
      }
      else{
          $query= $collection->find();
      }
      

      //$query->sort(array('UsersRegistered'=>-1));
      $results = iterator_to_array($query);
      //print_r($results);
      $temp=sizeof($results);
      $array_of_results[0]=current($results);
      //print_r($array_of_results[0]['UsersRegistered']);
      for($i=1; $i<sizeof($results);$i++)
      {
      
          $array_of_results[$i]=next($results);
      }
      //print_r($array_of_results);
      //exit();
?>

  <div id="page-wrap">

  <!-- <h1>Registered Users</h1> -->
  
    <?php
    echo '<table>';
    echo '<thead>
    <tr>
      <th>Username</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email Id</th>
      <th>Contact</th>

    </tr>
    </thead>';
    
    for($i=0;$i<sizeof($results);$i++)
    {
      echo '<tbody>
      <tr>
      <td>'.$array_of_results[$i]['Username'].'</td>
      <td>'.$array_of_results[$i]['FirstName'].'</td>
      <td>'.$array_of_results[$i]['LastName'].'</td>
      <td>'.$array_of_results[$i]['Email'].'</td>
      <td>'.$array_of_results[$i]['Contact'].'</td>
      
    </tr>
    </tbody>';
    }
    
    

    
  echo '</table>';
  ?>
  
  </div>
    
                  </div>
               
              
              </div>
            </div>
          </div>
      </div>

      <script src="../../js/jquery.min.js"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="../../js/scripts.js"></script>

      <script type="text/javascript">
        
        if ($(window).width() < 992) {
          $('#right-sidebar').removeClass('right-sidebar');
        }

      </script>

  </body>

</html>