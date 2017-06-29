

<?php
      session_start();
      $con = new MongoClient();
      $db = $con->ICMAM;

      //courses

      $collection = $db->courses;

      $query= $collection->find();

      $query->sort(array('Title'));
      
      $results = iterator_to_array($query);

      $temp=sizeof($results);

      // print_r($temp);

      // exit;

      $array_of_results[$temp-1]=current($results);
     
      for($i=$temp-2; $i>=0;$i--)
      {
          $array_of_results[$i]=next($results);

           $final[$i] = $array_of_results[$i]['Title'];
          
      }


      $collection1 = $db->users;

      $query1 = $collection1->find(array('_id'=>$_SESSION['user_id']));

      //$query1->sort(array('Registered'));

      $res = iterator_to_array($query1);

      $array_of_results1[0]=current($res);
     
      $a = sizeof($array_of_results1[0]['Registered']);


        for($i=0;$i<$a;$i++)
        {
          $title_name[$i] = $array_of_results1[0]['Registered'][$i];
          // echo "ketaki";
          // print_r($title_name);
          //echo $array_of_results1[0]['Registered'][$i];
          $query2 = $collection->find(array("Title"=>$title_name[$i]));
          $arra = iterator_to_array($query2);
          //print_r($arra);
          $array_of_results4[$i] = current($arra);
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
      <?php require 'navigation-links.php' ?>


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
                    
                    <a href="User/Results.php" class="nodecoration"><li><i class="icon-indent-decrease2 icon-dashboard"></i>Exams</li></a>
                 </ul>
                
                </div>
              </div>

              <div class="right-sidebar zeropadding">

                  <div class="heading-rightsection">
                    <h2 class="nav-title">Enrolled Courses</h2>
                  </div>
                  <div class="">
                    <!-- <h2 class="add-btn"><a class="btn btn-default " data-toggle="modal" data-target="#modal-container-addcourse" onclick="Temporary('<?php //print_r($array_of_results[0]['Title']) ?>');">Add a new course</a></h2> -->
                  </div> 

                  <div class="row admin-courses" style="padding-top: 130px">

                    <?php

                      for($i=0;$i<$a;$i++)
                      {
                      

                        $Title = $array_of_results4[$i]['Title'];
                        $Description = $array_of_results4[$i]['Description'];
                        $Img_Path = $array_of_results4[$i]['Img_Path'];
                        $Prof_Assigned = $array_of_results4[$i]['Prof_Assigned'];
                        $Duration = $array_of_results4[$i]['Duration'];
                        $Start_Date = $array_of_results4[$i]['Start_Date'];
                        $ID = $array_of_results4[$i]['_id'];

                        $t1 = rawurlencode($Title);
                        $t2 = rawurlencode($Description);
                        $t3 = rawurlencode($Img_Path);
                        $t4 = rawurlencode($Prof_Assigned);
                        $t5 = rawurlencode($Duration);
                        $t6 = rawurlencode($Start_Date);


                        $onclick = "Set('".$t1."','".$t2."','".$t4."','".$t5."','".$t6."')";

                        //echo $t1;

                        echo "<div class='article-loop'><div class='col-sm-6 col-md-4'>
                                <div class='thumbnail'>
                                <div class='overflow-hidden relative-pos'><img src='../";
                                print_r($array_of_results4[$i]['Img_Path']);

                                echo "' class='img-dim-admin'><span class=''></span></div>
                        
                              <div class='caption'>
                              <h4 class='textcolor ellipsis_oneline'>"; print_r($array_of_results4[$i]['Title']);
                              echo "</h4>
                          
                              <p class='textcolor ellipsis_oneline'>"; print_r($array_of_results4[$i]['Prof_Assigned']); echo "<span class='alttextcolor'> | ";
                              print_r($array_of_results4[$i]['Start_Date']);
                              echo "</span></p>
                          
                        </div>

                        <div class=''>
                          <div class='text-align-right'>
                          <a data-target='#modal-container-deletecourse".$i."' role='button' class='btn btn-default removebutton' data-toggle='modal' >Withdraw</a>
                          

                          
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
                          
                          <form  action='withdraw.php?CourseTitle="; print_r($array_of_results4[$i]['Title']); 
                          echo "' method='post'>
                            <div class='row'>
                                <p>You are about to Delete the Course Information.</p>
                                <p>Do you want to proceed?</p>
                            </div>
                            <div class='modal-footer'>
                             <input type='submit' value='Yes' class='btn btn-default' name='yes_withdraw' id='yes_withdraw'
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
    <!-- <div class="modal fade" id="add-modal" role="dialog">
      <div class="modal-dialog">
      
    -->

      <script type="text/javascript" src="../js/jquery.min.js"></script>
      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/scripts.js"></script>

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

      <script type="text/javascript" src="../js/index_page.js"></script>

     
  </body>

</html>