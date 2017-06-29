
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ICMAM-PD</title>

    <link href="../../../css/icons/styles.css" rel="stylesheet" type="text/css">
    <link href="../../../css/bootstrap.css" rel="stylesheet">
    <link href="../../../css/style.css" rel="stylesheet">
    <link href="../../../css/animate.css" rel="stylesheet">
    



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
                <a href="../../../Index.php">Home</a>
              </li>
             
              
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="../../Registration.php">Profile</a>
              </li>
              <li>
                <a href="../../Login-Page.php" id="login-link">Logout</a>
              </li>
            </ul>
          </div>

        </nav>


        <div class="row adjustment" style="margin-top: 50px;">
            <div class="col-md-12 zeropadding">

              <div class="left-sidebar zeropadding">
                <div class="Admin">
                  <img src="../../../assets/Images/Team/user.png" class="admin-img">
                </div>

                <div class="subsection">
                  <ul class="subsection-ul">
                    <a href="Dashboard.php" class="nodecoration"><li><i class="icon-home4 icon-dashboard"></i>Dashboard</li></a>
                    <a href="Courses.php" class="nodecoration"><li ><i class="icon-tree5 icon-dashboard"></i>Training Programmes</li></a>
                    <a href="Users.php?Title=All" class="nodecoration"><li><i class="icon-reading icon-dashboard"></i>Registered Users</li></a>
                  
                    <a href="Assignments_admin.php" class="nodecoration"><li class="active-ul"><i class="icon-copy icon-dashboard"></i>Assignments</li></a>
                    <a href="" class="nodecoration"><li><i class="icon-task icon-dashboard"></i>Examination</li></a>
                  
                  </ul>
                
                </div>
              </div>

              <div class="right-sidebar zeropadding">

                  <div class="heading-rightsection">
                    <h2 class="nav-title">Assignments</h2>
                  </div>

              <div class="row" style="margin-top: 130px;">
    <div class="col-md-12">
      <div class="tabbable" id="tabs-244202">
        <ul class="nav nav-tabs">
          <li>
            <a href="#panel-759903" data-toggle="tab">MCQ's</a>
          </li>
          <li class="active">
            <a href="#panel-778432" data-toggle="tab">Theory</a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane" id="panel-759903">
            <p>
              <!-- Registration form -->
          <form method="POST" autocomplete="off" name="Question" action="Functions/QuestionUpload.php?Question=<?php echo $_GET['Question'] ?>&Exam=<?php echo $_GET['Exam'] ?>">
            <div class="row">
              <div class="custom-reg-box">
                <div class="panel registration-form">
                  <div class="panel-body registration-box">
                    <div class="text-center">
                      <h5 class="content-group-lg createAcc">Question <?php echo $_GET['Question']; ?></h5>
                      <h5 class="note-reg"><small class="display-block">All fields are required</small></h5>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group has-feedback">
                        <!-- <div class="form-control-feedback">
                          <i class="icon-user-plus text-muted"></i>
                        </div>
                         --><input type="text" class="form-control custom-input" placeholder="Question" name="Question" id="Question">
                        
                        
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <!-- <div class="form-control-feedback">
                            <i class="icon-user-check text-muted"></i>
                          </div>
                           -->
                           <input type="text" class="form-control custom-input" placeholder="Option 1" name="Option_1" id="Option_1">
                          
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <!-- <div class="form-control-feedback">
                            <i class="icon-user-check text-muted"></i>
                          </div>
                           --><input type="text" class="form-control custom-input" placeholder="Option 2" name="Option_2" id="Option_2">
                          
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <!-- <div class="form-control-feedback">
                            <i class="icon-user-lock text-muted"></i>
                          </div>
                           --><input type="text" id="Option_3" class="form-control custom-input" placeholder="Option 3" name="Option_3">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group has-feedback">
                          <!-- <div class="form-control-feedback">
                            <i class="icon-user-lock text-muted"></i>
                          </div>
                           --><input type="text" class="form-control custom-input" placeholder="Option 4" name="Option_4" id="Option_4">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group has-feedback">
                        <input type="text" class="form-control custom-input" placeholder="Answer" name="Answer" id="Answer">
                        
                      </div>

                    <div class="form-group">
                      
                    </div>

                    
                    <div class="text-right padding-right-15 reg-btn-resp col-md-6" style="padding-left:15px">
                      
                      <button type="submit" class="btn custom-btn-reg" name="T_Submit" >
                      Finish
                      <i class="icon-plus3 padding-left-5"></i></button>

                       </div>
                       <div class="text-right padding-right-15 reg-btn-resp col-md-6">
                      
                      <button type="submit" class="btn custom-btn-reg" name="Submit" >
                      Next
                      <i class="icon-plus3 padding-left-5"></i></button>

                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </form>
            </p>
          </div>
          <div class="tab-pane active" id="panel-778432">
            <p>
              <!-- Registration form -->
          <form method="POST" autocomplete="off" name="Question" action="Functions/QuestionUpload1.php?Question=<?php echo $_GET['Question'] ?>&Exam=<?php echo $_GET['Exam'] ?>">
            <div class="row">
              <div class="custom-reg-box"> 
                <div class="panel registration-form">
                  <div class="panel-body registration-box">
                    <div class="text-center">
                      <h5 class="content-group-lg createAcc">Question <?php echo $_GET['Question']; ?></h5>
                      <h5 class="note-reg"><small class="display-block">All fields are required</small></h5>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group has-feedback">
                        <input type="text" class="form-control custom-input" placeholder="Question" name="Question" id="Question">
                        
                        
                      </div>
                    </div>
                    

                    <div class="col-md-12">
                      <div class="form-group has-feedback">
                        <input type="text" class="form-control custom-input" placeholder="Answer" name="Answer" id="Answer">
                        
                      </div>

                    <div class="form-group">
                      
                    </div>

                    <div class="text-right padding-right-15 reg-btn-resp col-md-6" style="padding-right:15px">
                      
                      <button type="submit" class="btn custom-btn-reg" name="T_Submit" >
                      Next
                      <i class="icon-plus3 padding-left-5"></i></button>

                     <div class="text-right padding-right-15 reg-btn-resp col-md-6" style="padding-right:15px">
                      
                      <button type="submit" class="btn custom-btn-reg" name="Final_T_Submit" >
                      Finish
                      <i class="icon-plus3 padding-left-5"></i></button>

                       </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            </div>
          </form>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
          
          </div>
      </div>

      <script src="../../../js/jquery.min.js"></script>
      <script src="../../../js/bootstrap.min.js"></script>
      <script src="../../../js/scripts.js"></script>
      
  </body>

</html>