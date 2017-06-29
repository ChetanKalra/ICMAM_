<?php
      session_start();
      $con = new MongoClient();
      $db = $con->ICMAM;

      $collection = $db->courses;

      $query= $collection->find();
      
      $query->sort(array('UsersRegistered'=>-1));
      
      $results = iterator_to_array($query);
      $temp=sizeof($results);

      $array_of_results[$temp-1]=current($results);
     
      for($i=$temp-2; $i>=0;$i--)
      {
          $array_of_results[$i]=next($results);
          //echo "Keyyyyyyyyyyyyy ".$i; 
      }

      // print_r($array_of_results);

      // exit;

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

    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <!--Style for pagination-->
     <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      .pagination {
      display: block;
      width: 75%;
      margin: 1em auto;
      text-align: center;
    }
    .pagination:after {
      content: '';
      clear: both;
    }

    .pagination-button {
      display: inline-block;
      padding: 5px 10px;
      border: 1px solid #e0e0e0;
      background-color: #eee;
      color: #333;
      cursor: pointer;
      transition: background 0.1s, color 0.1s;
    }
    .pagination-button:hover {
      background-color: #ddd;
      color: #3366cc;
    }
    .pagination-button.active {
      background-color: #bbb;
      border-color: #bbb;
      color: #3366cc;
    }
    .pagination-button:first-of-type {
      border-radius: 18px 0 0 18px;
    }
    .pagination-button:last-of-type {
      border-radius: 0 18px 18px 0;
    }

    /* arbitrary styles */
    .heading {
      text-align: center;
      max-width: 500px;
      margin: 20px auto;
    }

    

    </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>


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
                    <a href="Courses.php" class="nodecoration"><li class="active-ul"><i class="icon-tree5 icon-dashboard"></i>Training Programmes</li></a>
                    <a href="users.php?Title=All" class="nodecoration"><li><i class="icon-reading icon-dashboard"></i>Registered Users</li></a>
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
                  <div class="">
                    <h2 class="add-btn"><a class="btn btn-default " data-toggle="modal" data-target="#modal-container-addcourse" onclick="Temporary('<?php print_r($array_of_results[0]['Title']) ?>');">Add a new course</a></h2>
                  </div>

                  <div class="row admin-courses" style="padding-top: 10px">

                    <?php

                      for($i = $temp-1; $i>=0 ; $i--)
                      {

                        $Title = $array_of_results[$i]['Title'];
                        $Description = $array_of_results[$i]['Description'];
                        $Img_Path = $array_of_results[$i]['Img_Path'];
                        $Prof_Assigned = $array_of_results[$i]['Prof_Assigned'];
                        $Duration = $array_of_results[$i]['Duration'];
                        $Start_Date = $array_of_results[$i]['Start_Date'];
                        $ID = $array_of_results[$i]['_id'];

                        $t1 = rawurlencode($Title);
                        $t2 = rawurlencode($Description);
                        $t3 = rawurlencode($Img_Path);
                        $t4 = rawurlencode($Prof_Assigned);
                        $t5 = rawurlencode($Duration);
                        $t6 = rawurlencode($Start_Date);


                        $onclick = "Set('".$t1."','".$t2."','".$t4."','".$t5."','".$t6."')";

                        //echo $t1;

                        echo "<div class='article-loop'><a href='Lessons.php?Title=".$Title."' class='nodecoration'><div class='col-sm-6 col-md-4'>
                                <div class='thumbnail'>
                                <div class='overflow-hidden relative-pos'><img src='../../";
                                print_r($array_of_results[$i]['Img_Path']);

                                echo "' class='img-dim-admin'><span class=''></span></div>
                        
                              <div class='caption'>
                              <h4 class='textcolor ellipsis_oneline'>"; print_r($array_of_results[$i]['Title']);
                              echo "</h4>
                          
                              <p class='textcolor ellipsis_oneline'>"; print_r($array_of_results[$i]['Prof_Assigned']); echo "<span class='alttextcolor'> | ";
                              print_r($array_of_results[$i]['Start_Date']);
                              echo "</span></p>
                          
                        </div>

                        <div class=''>
                          <div class='text-align-right'>
                          <a data-target='#modal-container-deletecourse".$i."' role='button' class='btn btn-default removebutton' data-toggle='modal' >Remove</a>
                          

                          <a data-target='#modal-container-editcourse' role='button' class='btn btn-default editbutton' data-toggle='modal' onclick=".$onclick.">Edit</a></a>
                          </div></div>


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
                             <input type='submit' value='Yes' class='btn btn-default' name='yes_remove' id='yes_remove'
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
                    Course Details
                  </h4>
                </div>
                <div class="modal-body">
                  <form action="Upload.php" method="post" enctype="multipart/form-data">
                    
                    <div class="row margin-bottom-20px">
                    <div class="col-md-12">
                        <div class="column_image">
                          <h4>Select Course Image</h4>
                        </div>
                        <div class="column_image">
                          <input type="file" class="form-control" name="file"/>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row margin-bottom-20px">
                      <div class="col-md-12">
                        <!-- <h3>Course Title</h3><br> -->
                        <input type="text" name="CourseTitle" id="CourseTitle" placeholder="Title" class="form-control custom-input" />
                      </div>
                    </div>
                    <div class="row margin-bottom-20px">
                      <div class="col-md-12">
                        <!-- <h3>Course Description</h3><br> -->
                        <textarea name="CourseDes" id="CourseDes" placeholder="Description" class="form-control textarea-box" width="100%"/></textarea>
                      </div>
                    </div>
                    <div class="row margin-bottom-20px">
                      <div class="col-md-12">
                        <!-- <h3>Professor Assigned</h3><br> -->
                        <input type="text" name="ProfessorAss" id="ProffesorAss" placeholder="Professor Assigned" class="form-control custom-input" />
                      </div>
                    </div>
                    <div class="row margin-bottom-20px">
                      <div class="col-md-12">
                        <!-- <h3>Duration</h3><br> -->
                        <input type="text" name="Duration" id="Duration" placeholder="Duration" class="form-control custom-input" />
                      </div>
                    </div>

                    <div class="row margin-bottom-20px">
                      <div class="col-md-12">
                        <!-- <h3>Start_Date</h3><br> -->
                        <input type="text" name="Start_Date" id="Start_Date" placeholder="Start Date" class="form-control custom-input" />
                      </div>
                    </div>

                    <div class="row margin-bottom-20px">
                    <div class="col-md-12 text-align-right">
                      <button type="button" class="btn btn-default" data-dismiss="modal" name="Close" id="Close">
                      Close
                      </button> 


                      <input type="submit" class="btn btn-primary" name="AddCourse" id="AddCourse" value="Save changes" />
                    </div>
                    </div>
                  </form>
                </div>
                
              </div>
              
            </div>
            
          </div>


  <!-- ========================== /Modal_End_Add_Course ==================== -->

  <!-- ======================= Edit_Course_Modal ===================== -->

    <div class="modal fade" id="modal-container-editcourse" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                   
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                  </button>
                  <h4 class="modal-title" id="myModalLabel">
                    Edit Details
                  </h4>
                </div>
                <div class="modal-body">
                  <form action="Functions/Edit.php" method="post" enctype="multipart/form">
                    
                    <div class="row margin-bottom-20px">

                    <div class="col-md-12">
                        <div class="column_image">
                          <h4>Edit Course Image</h4>
                        </div>
                        <div class="column_image">
                          <input type="file" class="form-control" name="file" />
                        </div>
                      </div>
                    </div>
                    
                    <div class="row margin-bottom-20px">
                      <div class="col-md-12">
                        <h4>Title</h4>
                        <input type="text" name="CourseTitle" id="EditCourseTitle" class="form-control custom-input" placeholder="Title"/>
                      </div>
                    </div>
                    <div class="row margin-bottom-20px">
                      <div class="col-md-12">
                        <h4>Description</h4>
                        <textarea type="text" name="CourseDes" id="EditCourseDes" class="form-control textarea-box" placeholder="Enter Here" style="height: 120px;"></textarea>
                      </div>
                    </div>
                    <div class="row margin-bottom-20px">
                      <div class="col-md-12">
                        <h4>Professor Assigned</h4>
                        <input type="text" name="Professor" id="Edit_Prof_Assigned" class="form-control custom-input" placeholder="Enter Here"/>
                      </div>
                    </div>
                    <div class="row margin-bottom-20px">
                      <div class="col-md-12">
                        <h4>Duration</h4>
                        <input type="text" name="Duration" class="form-control custom-input" id="Edit_Duration" placeholder="Enter Here"/>
                      </div>
                    </div>

                    <div class="row margin-bottom-20px">
                      <div class="col-md-12">
                        <h4>Start Date</h4>
                        <input type="text" name="Start_Date" id="Edit_Start_Date" class="form-control custom-input" placeholder="Start_Date"/>
                      </div>
                    </div>

                   
                   <div class="margin-bottom-20px row">
                   <div class="col-md-12 text-align-right">
                      <button type="button" class="btn btn-default" data-dismiss="modal" name="Close" id="Close">
                      Close
                      </button> 


                      <input type="submit" class="btn btn-primary" name="Save_Edit" id="AddCourse" value="Save changes"/>
                    </div>
                    </div>
                  </form>
                </div>
                
              </div>
              
            </div>
            
          </div>


  <!-- ========================== /Modal_End_Edit_Course ==================== -->


      <script src="../../js/jquery.min.js"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="../../js/scripts.js"></script>

      <script type="text/javascript">
        
        function Set(a,b,c,d,e)
        {

          var a = decodeURIComponent(a);

          var b = decodeURIComponent(b);

          var c = decodeURIComponent(c);

          var d = decodeURIComponent(d);

          var e = decodeURIComponent(e);

          //var f = decodeURIComponent(f);
          
          $('#EditCourseTitle').val(a);
          $('#EditCourseDes').val(b);
          $('#Edit_Prof_Assigned').val(c);
          $('#Edit_Duration').val(d);
          $('#Edit_Start_Date').val(e);

        }

      </script>

      <script type="text/javascript" src="../../js/index_page.js"></script>

      <script type="text/javascript" src="../../js/jquery.min.js"></script>
  </body>

</html>