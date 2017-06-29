<?php
  session_start();

  $flag =1;

  if(isset($_SESSION['user_id'])){
    $flag = 0;
  }

?>


<?php
  
  $Title = $_GET['Title'];
  $Course_Title = rawurldecode($Title);

  $con = new MongoClient();

  $db = $con->ICMAM;

  $collection = $db->courses;

  $query= $collection->find(array('Title'=>$Title));


  $array_of_results = iterator_to_array($query);


  $res[0] = current($array_of_results);


  //print_r($res[0]['Title']);

  $collection1 = $db->Lessons;

  $query1 = $collection1->find(array("Title"=>$Title));

  // print_r($query1);

  $array_of_results1 = iterator_to_array($query1);

  $res1[0] = current($array_of_results1);

  for($i=1;$i<sizeof($array_of_results1);$i++)
  {
    $res1[$i] = next($array_of_results1);

  }

  //$i=0;
  //print_r($res1[$i]['Lesson1'][0]);






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
                    <a href="Courses.php" class="nodecoration"><li ><i class="icon-tree5 icon-dashboard"></i>Training Programmes</li></a>
                    <a href="users.php?Title=All" class="nodecoration"><li><i class="icon-reading icon-dashboard"></i>Registered Users</li></a>
                    <!-- <a href="" class="nodecoration"><li class="active-ul"><i class="icon-indent-decrease2 icon-dashboard"></i>Lessons</li></a>
                     --><a href="" class="nodecoration"><li><i class="icon-copy icon-dashboard"></i>Assignments</li></a>
                    <a href="Exam/Exam_Details.php" class="nodecoration"><li><i class="icon-task icon-dashboard"></i>Examination</li></a>
                  
                  </ul>
                
                </div>
              </div>

              <div class="right-sidebar zeropadding" >

                  <div class="heading_lesson">
                    <h2 class="nav-title padding-top-40px"><?php echo $Course_Title; ?></h2>
                  </div>
                 

                  <div class="row admin-courses" style="padding-top: 20px">

                    <div class="col-md-12">

                      <div class="col-md-4 zeropadding">
                        <img src="../../<?php print_r($res[0]['Img_Path']); ?>" class="course-img">
                      </div>

                      <div class="col-md-8">
                        <h3 class="margin-top-0px text-color-555">Description</h3>
                        <p><?php print_r($res[0]['Description']) ?></p>
                      </div>

                    </div>


                   

                      


                    </div>



                    <div class="row" style="margin-top: 20px; margin-bottom: 30px;">

                      <?php





                        if($res1[0]==null)
                        {
                            


                        }
                        else{
                      for($i=0;$i<sizeof($res1);$i++)
                      {

                        $k = $i+1;


                        echo "<div class='panel-group margin-bottom-0px mtop' id='accordio'>
                        <div class='panel panel-default'>
                          <div class='panel-heading'>
                            <h4 class='panel-title ellipsis_oneline'>
                              <a data-toggle='collapse' data-parent='#accordion' href='#collapse".$k." '>Lesson $k: ".$res1[$i]['Lesson'][0]."</a>
                            </h4>
                          </div>
                          <div id='collapse".$k."' class='panel-collapse collapse'>
                            <div class='panel-body'>

                              <div class='row'>
                          
                                <div class='col-md-12 zeropadding'>
                                  <div class='col-md-4 zeropadding'>
                                    <video src='../../".$res1[$i]['Lesson'][2]."' controls class='img-responsive video-lesson'></video>
                                  </div>
                                  <div class='col-md-8'>
                                    <p class='lesson-description'>".$res1[$i]['Lesson'][1]."</p>
                                  </div>
                                </div>
        
                              </div>

                             </div>
                          </div>
                        </div>
                      </div>";

                      }
                    }

                      ?>

                       <div class="col-md-12 lesson-accordion zeropadding">
                      <div class="panel-group margin-bottom-0px " >
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title ">
                              <a data-toggle="modal" data-target="#add-lesson-modal" class="nodecoration">Add a lesson</a>
                            </h4>
                          </div>
                          
                        </div>
                      </div>

                      </div>


                  </div>
              
              </div>
            </div>
          </div>
      </div>

    

   <!-- Modal -->
    <div class="modal fade" id="add-lesson-modal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add a lesson</h4>
          </div>
          <div class="modal-body">
            <form action="upload_lesson.php?Title=<?php echo $Title ?>" method="post" enctype="multipart/form-data">
              <input type="text" placeholder="Title" class="form-control custom-input margin-top-10px" name="LessonTitle">

              <textarea class="form-control textarea-box margin-top-30px" placeholder="Description" style="height: 150px" name="LessonDes"></textarea>

              <div class="row">
                <input type="file" name="file" class="margin-top-30px">
                
              </div>
              <!-- <button type="button" class="btn btn-default" name="upload-lesson">Upload</button> -->

              <div class="row clearfix margin-top-20px">
                <!-- <button onclick="" class="btn btn-default fr">Capture</button> -->

                

                <input type="submit" name="upload-lesson" style="width: auto; margin-left: 10px; margin-right:10px;" class="form-control fr" value="Upload">

                <button type="button" class="btn btn-default fr" data-dismiss="modal">Close</button>
               </div>

            </form>
          </div>
           
          
        </div>
        
      </div>
    </div>

    

  <!-- /Modal -->

      <script src="../../js/jquery.min.js"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="../../js/scripts.js"></script>

   
  </body>

</html>