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
  // print_r($array_of_results[0]['Img_Path']);

  // print_r($res);
  // exit;

  $query1 = $collection->find()->sort(array('UsersRegistered'=>-1))->limit(4);
	//$query1->sort(array('UsersRegistered'=>-1))->limit(6);
	$results1 = iterator_to_array($query1);
	$size = sizeof($results1);
	$array_of_results1[0] = current($results1);
	
	for($i=1;$i<$size;$i++)
	{
		$array_of_results1[$i] = next($results1);
	}

?>

<?php 
	
	$con = new MongoClient();

  $db = $con->ICMAM;

  $collection1 = $db->Lessons;

  $query1 = $collection1->find(array('Title'=>$Title));

  $array_of_results2 = iterator_to_array($query1);

  //print_r($array_of_results2);

  $res1[0] = current($array_of_results2);

  for($i=1;$i<sizeof($array_of_results2);$i++)
  {
  	$res1[$i] = next($array_of_results2);
  } 

  // print_r($res1);exit;

?>


  <?php


  	if(isset($_POST['Enroll']))
  	{

	  	$Title2 = $res[0]['Title'];

		if(isset($_SESSION['user_id']))
		{
			header('location: '.'user_video.php?Title='.$Title2);
		}
		else{
			header('location: '.'Login-Page.php?redirect=2&Title='.$Title2);
		}

		
  	}



  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ICMAM-PD</title>

    
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <!-- <script type="text/javascript" src="js/jquery.quick.pagination.min.js"></script> -->


  </head>
  <body>

    <div class="container-fluid">
			
			<?php require 'navigation-links.php' ?>
		

			<div class="row margin-top-60px courses-heading-users">
				 <div class="col-md-12 ">
				 	<h3 style="padding-bottom: 10px;"><?php print_r($res[0]['Title']) ?>:</h3>
				 </div>
			</div>

	
	<div class="row margin-top-40px">
		<div class="col-md-3">
			<div class="row">
				<div class="col-md-12 text-align-center">
					<h3 class="text-align-center" class="textcolor">
						Lessons
					</h3>

					<div class="row margin-top-30px">
						<div class="col-sm-6 col-md-12 default-padding iPad-resp">
							<div href="#" class="thumbnail custom-thumbnail sidebar-responsive zeropadding Course_Detail_lesson">
							
								<ul class="lessons-list">

									<!-- <li class="Title" >Welcome</li> -->
									
									<?php

									for($i=0;$i<sizeof($res1);$i++)
									{

										echo "<li class='Title' data-toggle='modal' data-target='#Lesson'>".$res1[$i]['Lesson'][0]."</li>";
									}


									?>

								</ul>
								
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/"> -->
				</div>
			</div>
		</div>
		<div class="col-md-9 default-padding">
			<div class="row">
				<div class="col-md-12">
					<h3 id="Featured-courses-title" class="textcolor">
						Course Detail
					</h3>
				</div>
			</div>
			
			<div class="row margin-top-20px ">
				<div class="col-md-12 default-padding">
					
					<div class="row">
					
						<div class="col-md-12" style="border: 1px solid #ddd; height: 700px; padding-top: 15px;">
							<div class="col-md-4 zeropadding">
								<img src=../<?php print_r($res[0]['Img_Path'])?> class="course-img">
							</div>
							<div class="col-md-8" >
								 <h3 class="margin-top-0px">Description:</h3>
                       			 <p><?php print_r($res[0]['Description']) ?></p>
                       			 <div class="margin-top-20px">
									<form method="POST">
									<button class="form-control custom-reg-btn" name="Enroll">Enroll</button>
									</form>
									
								</div>
							</div>

						</div>
					  
					</div>
				</div>
			</div>
		</div>

		<div class="row" style="margin-left: 15px;">
					
			<div class="col-md-12" style="border: 1px solid #ddd;  padding-top: 15px; padding-bottom: 15px;">
					<h3 class="text-align-center">Related Courses</h3>
					<div class="row margin-top-30px" id="related-course">
						
						<a class="thumbnail-anchor" data-toggle="modal" data-target="#Course" onclick="Set('<?php print_r($array_of_results1[0]['Title'])?>','<?php print_r($array_of_results1[0]['Description']) ?>')">
					 <div class="col-sm-6 col-md-3">
					    <div class="thumbnail">
					      <div class="overflow-hidden relative-pos"><img src=../<?php print_r($array_of_results1[0]['Img_Path']) ?> alt="..." class="img-dim"><span class="Preview">Preview</span></div>
					      <div class="caption">
					        <!-- <h4 class="textcolor ellipsis_oneline">Satellite Oceanography</h4> -->
					        <h4 class="textcolor ellipsis_oneline"><?php print_r($array_of_results1[0]['Title']) ?></h4>
					        <p class="textcolor ellipsis_oneline"><?php print_r($array_of_results1[0]['Prof_Assigned']) ?> <span class="alttextcolor"> | <?php print_r($array_of_results1[0]['Start_Date']) ?> </span></p>
					        
					      </div>
					    </div>
					 </div></a>



						<a class="thumbnail-anchor" data-toggle="modal" data-target="#Course" onclick="Set('<?php print_r($array_of_results1[1]['Title'])?>','<?php print_r($array_of_results1[1]['Description']) ?>')">
						 <div class="col-sm-6 col-md-3">
						    <div class="thumbnail">
						      <div class="overflow-hidden relative-pos"><img src=../<?php print_r($array_of_results1[1]['Img_Path']) ?> alt="..." class="img-dim"><span class="Preview">Preview</span></div>
						      <div class="caption">
						        <h4 class="textcolor ellipsis_oneline"><?php print_r($array_of_results1[1]['Title']) ?></h4>
						        <p class="textcolor ellipsis_oneline"><?php print_r($array_of_results1[1]['Prof_Assigned'])?> <span class="alttextcolor"> | <?php print_r($array_of_results1[1]['Start_Date']) ?> </span></p>
						        
						      </div>
						    </div>
						 </div></a>


						  <a class="thumbnail-anchor" data-toggle="modal" data-target="#Course" onclick="Set('<?php print_r($array_of_results1[2]['Title'])?>','<?php print_r($array_of_results1[2]['Description']) ?>')">
					 <div class="col-sm-6 col-md-3 ">
					    <div class="thumbnail">
					      <div class="overflow-hidden relative-pos"><img src=../<?php print_r($array_of_results1[2]['Img_Path']) ?> alt="..." class="img-dim"><span class="Preview">Preview</span></div>
					      <div class="caption">
					        <h4 class="textcolor ellipsis_oneline"><?php print_r($array_of_results1[2]['Title']) ?></h4>
					        <p class="textcolor ellipsis_oneline"><?php print_r($array_of_results1[2]['Prof_Assigned']) ?> <span class="alttextcolor"> | <?php print_r($array_of_results1[2]['Start_Date']) ?> </span></p>
					        
					      </div>
					    </div>
					 </div></a>


					 <a class="thumbnail-anchor" data-toggle="modal" data-target="#Course" onclick="Set('<?php print_r($array_of_results1[3]['Title'])?>','<?php print_r($array_of_results1[3]['Description']) ?>')">
					 <div class="col-sm-6 col-md-3">
					    <div class="thumbnail">
					      <div class="overflow-hidden relative-pos"><img src=../<?php print_r($array_of_results1[3]['Img_Path']) ?> alt="..." class="img-dim"><span class="Preview">Preview</span></div>
					      <div class="caption">
					        <h4 class="textcolor ellipsis_oneline"><?php print_r($array_of_results1[3]['Title']) ?></h4>
					        <p class="textcolor ellipsis_oneline"><?php print_r($array_of_results1[3]['Prof_Assigned']) ?> <span class="alttextcolor"> | <?php print_r($array_of_results1[3]['Start_Date']) ?> </span></p>
					        
					      </div>
					    </div>
					 </div></a>
					</div>
			</div>
					  
		</div>


	</div>


	<div class="row margin-top-30px footer-row adjustment">
		<div class="col-md-12 padding-25px">
			<div class="row">
				<div class="clearfix col-sm-6 col-md-4 default-padding">
					<div class="clearfix FooterFirstCol">
						<div class="col-xs-6 col-md-6"> 
						<p>
							 <strong>Related Links<br></strong>
						</p>
						

						<ul class="list-unstyled">
						<li>IIITMI</li>
						<li>ICMLREI</li>
						<li>IINCOISI</li>
						<li>IIMDI</li>
						<li>INCAORI</li>
						</ul>
						</div>

						<div class="col-xs-6 col-md-6">
						<p><br></p>
						<ul class="list-unstyled">
						<li>INCMRWFI</li>
						<li>INIOTI</li>
						<li>IMoESI</li>
						</ul>
						</div>
					</div>
				</div>
				
				<div class="col-sm-6 col-md-4 FooterSecondCol flex-display">

					<div class="FooterSecondCol-child margin-auto">
						<ul class="list-unstyled">
							<p><strong>About Us<br></strong></p>
							<li>About</li>
							<li>Exams</li>
							<li>Recruitment Notice</li>
							<li>Tender Notice</li>
							<li>Right to Info. Act</li>

						</ul>
					</div>
				</div>
				<div class=" col-sm-6 col-md-4 FooterThirdCol flex-display" >
					 
					<address class="margin-auto">
						 <p><strong>ICMAM Project Directorate</strong><br></p>
						 2nd Floor, NIOT Campus,<br> Velacherry-Tambaram Main Road,<br>Pallikkaranai,Chennai - 600100, India,
						 <br>Tel: +91 44 66783599 Fax: +91 44 66783487
						 <br>Email: icmam@icmam.gov.in
					</address>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<!-- <div class="modal fade" id="Lesson" role="dialog">
	    <div class="modal-dialog">
	
	      <div class="modal-content">
	        <div class="modal-body">
	          <p id="Description-modal">The ICMAM Training Centre and the first two weeks training programme on "Application of GIS in the management of Coastal Critical Habitats " was inaugurated on 13th August, 2001 by Dr.Harsh K Gupta, Secretary, Department of Ocean Development, Govt. of India.</p>
	        </div>
	        <div class="modal-footer">
	          <a href="" onclick="onclick_set()" id="view_course_detail"><button type="button" class="btn btn-default">View</button></a>
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	      
	    </div>
	  </div> -->
  


	<!-- /Modal -->


	


	<!-- <div class="footer-div default-padding adjustment">

	</div> -->
</div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>

    
  
  </body>
</html>