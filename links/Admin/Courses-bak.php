<?php
      session_start();
      $con = new MongoClient();
      $db = $con->ICMAM;

      $collection = $db->courses;

      $query= $collection->find();
      
      //$query->sort(array('UsersRegistered'=>-1));
      
      $results = iterator_to_array($query);
      $temp=sizeof($results);

      $array_of_results[$temp-1]=current($results);
     
      for($i=$temp-2; $i>=0;$i--)
      {
          $array_of_results[$i]=next($results);
          //echo "Keyyyyyyyyyyyyy ".$i; 
      }

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
                    <a href="Dashboard.php" class="nodecoration"><li><i class="icon-home4 icon-dashboard"></i>Dashboard</li></a>
                    <a href="Courses.php" class="nodecoration"><li class="active-ul"><i class="icon-tree5 icon-dashboard"></i>Training Programmes</li></a>
                    <a href="" class="nodecoration"><li><i class="icon-reading icon-dashboard"></i>Registered Users</li></a>
                    <a href="Lessons.php" class="nodecoration"><li><i class="icon-indent-decrease2 icon-dashboard"></i>Lessons</li></a>
                    <a href="" class="nodecoration"><li><i class="icon-copy icon-dashboard"></i>Assignments</li></a>
                    <a href="" class="nodecoration"><li><i class="icon-task icon-dashboard"></i>Examination</li></a>
                  
                  </ul>
                
                </div>
              </div>

              <div class="right-sidebar zeropadding">

                  <div class="heading-rightsection">
                    <h2 class="nav-title">Training Programmes</h2>
                  </div>
                  <div class="">
                    <h2 class="add-btn"><a class="btn btn-default add-btn-custom" data-toggle="modal" data-target="#modal-container-addcourse">Add a new course</a></h2>
                  </div>

                  <div class="row admin-courses" style="padding-top: 10px">

                    <?php

                      for($i = $temp-1; $i>=0 ; $i--)
                      {




                        echo "<div class='col-sm-6 col-md-4'>
                                <div class='thumbnail'>
                                <div class='overflow-hidden relative-pos'><img src='../../assets/Images/Oil_Spill.jpg' class='img-dim'><span class='Preview'>Preview</span></div>
                        
                              <div class='caption'>
                              <h4 class='textcolor ellipsis_oneline'>"; print_r($array_of_results[$i]['Title']);
                              echo "</h4>
                          
                              <p class='textcolor ellipsis_oneline'>"; print_r($array_of_results[$i]['Prof_Assigned']); echo "<span class='alttextcolor'> | ";
                              print_r($array_of_results[$i]['Start_Date']);
                              echo "</span></p>
                          
                        </div>

                        <div>
                          <a data-target='#modal-container-deletecourse".$i."' role='button' class='btn btn-primary removebutton' data-toggle='modal' >Remove</a>
                          <a href='#modal-container-addcourse' role='button' class='btn btn-primary editbutton' data-toggle='modal'>Edit</a>



                          <!-- ===================== Modal-Edit ================ -->
                          <div class='modal fade margin-top-30px' id='modal-container-deletecourse".$i."' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                            <div class='modal-dialog'>
                              <div class='modal-content'>
                                <div class='modal-header'>
                           
                          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>
                            ×
                          </button>
                          <h4 class='modal-title' id='myModalLabel'>
                            Delete
                          </h4>
                        </div>
                        <div class='modal-body'>
                          
                          <form  action='Functions/remove.php?CourseTitle="; print_r($array_of_results[$i]['Title']);  
                          echo "' method='post'>
                            <div class='row'>
                                <p>You are about to Delete the Course Information.</p>
                                <p>Do you want to proceed?</p>
                            </div>
                            <div class='modal-footer'>
                             <input type='submit' value='Yes' class='btn danger' name='yes_remove' id='yes_remove'
                             >
                            
                            <button type='button' class='btn btn-default' data-dismiss='modal'>
                              No
                            </button> 
                          
                            </div>
                          </form>
                        </div>
                        
                      </div>
                    </div>
                  </div>                 

                        </div>
                      </div>
                    </div>";
                      }

                    ?>
              
              </div>
            </div>
          </div>
      </div>

      <!-- Modal -->
    <div class="modal fade" id="add-modal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">..</h4>
          </div>
          <div class="modal-body">
            <p>...</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Register</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>

  <!-- /Modal -->


  <!-- ======================= Add_Course_Modal ===================== -->

    <div class="modal fade" id="modal-container-addcourse" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                   
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                  </button>
                  <h4 class="modal-title" id="myModalLabel">
                    Enter Information
                  </h4>
                </div>
                <div class="modal-body">
                  <form action="Upload.php" method="post">
                    
                    <div class="row">
                      <div class="column_image">
                        <h3>Select Course Image to Upload</h3>
                      </div><br>
                      <div class="column_image">
                        <input type="file" name="fileToUpload" id="fileToUpload"/>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <h3>Course Title</h3><br>
                        <input type="text" name="CourseTitle" id="CourseTitle" placeholder="Title"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <h3>Course Description</h3><br>
                        <input type="text" name="CourseDes" id="CourseDes" placeholder="Enter Here"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <h3>Professor Assigned</h3><br>
                        <input type="text" name="ProfessorAss" id="ProffesorAss" placeholder="Enter Here"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <h3>Duration</h3><br>
                        <input type="text" name="Duration" id="Duration" placeholder="Enter Here"/>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <h3>Start_Date</h3><br>
                        <input type="text" name="Start_Date" id="Start_Date" placeholder="Month/year"/>
                      </div>
                    </div>

                    <div class="modal-footer">
                   
                      <button type="button" class="btn btn-default" data-dismiss="modal" name="Close" id="Close">
                      Close
                      </button> 


                      <input type="submit" class="btn btn-primary" name="AddCourse" id="AddCourse" value="Save changes" />
                    
                    </div>
                  </form>
                </div>
                
              </div>
              
            </div>
            
          </div>


  <!-- ========================== /Modal_End_Add_Course ==================== -->

      <script src="../../js/jquery.min.js"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="../../js/scripts.js"></script>
  </body>

</html>