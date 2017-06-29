<?php
	session_start();

	$flag =1;
	
	if(isset($_SESSION['user_id'])){
		$flag = 0;
	}


?>


<?php
	
	$con = new MongoClient();

	$db = $con->ICMAM;

	$collection = $db->courses;

	$query = $collection->find();

	$results = iterator_to_array($query);

	$array_of_results[0] = current($results);

	for($i=1;$i<sizeof($results);$i++)
	{
		$array_of_results[$i] = next($results);
	}


	$query1 = $collection->find()->sort(array('UsersRegistered'=>-1))->limit(6);
	//$query1->sort(array('UsersRegistered'=>-1))->limit(6);
	$results1 = iterator_to_array($query1);
	$size = sizeof($results1);
	$array_of_results1[0] = current($results1);
	
	for($i=1;$i<$size;$i++)
	{
		$array_of_results1[$i] = next($results1);
	}

	//print_r($array_of_results1);
	//exit;
	$query2 = $collection->find()->sort(array('insert_date'=>-1))->limit(4);

	$res = iterator_to_array($query2);

	$array_of_results2[0] = current($res);
	for($i=1;$i<sizeof($res);$i++)
	{
		$array_of_results2[$i] = next($res);
	}

	//print_r($array_of_results2);


	//exit;

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ICMAM-PD</title>

    
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- <script type="text/javascript" src="js/jquery.quick.pagination.min.js"></script> -->


  </head>
  <body>

    <div class="container-fluid">
			
			<?php require 'navigation.php'; ?>
		
	<div class="row slider-div adjustment">
		<div class="col-md-12 height100p">
			<div class="headings">
				<h3 class="text-center title">
					MINISTRY OF EARTH SCIENCES
				</h3>

				<h4 class="text-align-center subtitle margin-top-20px">Integrated Coastal And Marine Area Management</h4>
			</div>
		</div>
	</div>
	
	<div class="row margin-top-20px">
		<div class="col-md-3">
			<div class="row">
				<div class="col-md-12 text-align-center">
					<h3 class="text-align-center" class="textcolor">
						News
					</h3>
<!-- 
					<div class="col-md-12 margin-top-20px">
						<strong>March Exam Cities</strong>
						<a class="nodecoration">Click Here</a>
					</div>

					<div class="col-md-12 margin-top-20px">
						<strong>April Exam Cities</strong>
						<a class="nodecoration">Click Here</a>
					</div>

					<div class="col-md-12 margin-top-20px">
						<strong>To register for April 2017 exams</strong>
						<a class="nodecoration">Click Here</a>
					</div> -->

					<div class="row margin-top-30px">
						<div class="col-sm-6 col-md-12 default-padding iPad-resp">
							<div href="#" class="thumbnail custom-thumbnail sidebar-responsive">
								<!-- <div>
								<strong>March Exam Cities</strong>
								<a class="nodecoration">Click&nbsp;Here</a>
								</div>
								<br>
								<div>
								<strong>April Exam Cities</strong>
								<a class="nodecoration">Click&nbsp;Here</a>
								</div> -->
								<br>
								<div>
								<strong>Exams</strong>
								<a href="links/ExamNotice.php" class="nodecoration">Click&nbsp;Here</a>
								</div>
							
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
						Featured Courses
					</h3>
				</div>
			</div>
			
			<div class="row margin-top-20px">
				<div class="col-md-12 default-padding">
					
					<div class="row">
					
					<a class="thumbnail-anchor" data-toggle="modal" data-target="#Course" onclick="Set('<?php print_r($array_of_results1[0]['Title'])?>','<?php print_r($array_of_results1[0]['Description']) ?>')">
					 <div class="col-sm-6 col-md-4">
					    <div class="thumbnail">
					      <div class="overflow-hidden relative-pos"><img src=<?php print_r($array_of_results1[0]['Img_Path']) ?> alt="..." class="img-dim"><span class="Preview">Preview</span></div>
					      <div class="caption">
					        <!-- <h4 class="textcolor ellipsis_oneline">Satellite Oceanography</h4> -->
					        <h4 class="textcolor ellipsis_oneline"><?php print_r($array_of_results1[0]['Title']) ?></h4>
					        <p class="textcolor ellipsis_oneline"><?php print_r($array_of_results1[0]['Prof_Assigned']) ?> <span class="alttextcolor"> | <?php print_r($array_of_results1[0]['Start_Date']) ?> </span></p>
					        
					      </div>
					    </div>
					 </div></a>

					 <a class="thumbnail-anchor" data-toggle="modal" data-target="#Course" onclick="Set('<?php print_r($array_of_results1[1]['Title'])?>','<?php print_r($array_of_results1[1]['Description']) ?>')">
					 <div class="col-sm-6 col-md-4 ">
					    <div class="thumbnail">
					      <div class="overflow-hidden relative-pos"><img src=<?php print_r($array_of_results1[1]['Img_Path']) ?> alt="..." class="img-dim"><span class="Preview">Preview</span></div>
					      <div class="caption">
					        <h4 class="textcolor ellipsis_oneline"><?php print_r($array_of_results1[1]['Title']) ?></h4>
					        <p class="textcolor ellipsis_oneline"><?php print_r($array_of_results1[1]['Prof_Assigned'])?> <span class="alttextcolor"> | <?php print_r($array_of_results1[1]['Start_Date']) ?> </span></p>
					        
					      </div>
					    </div>
					 </div></a>

					 <a class="thumbnail-anchor" data-toggle="modal" data-target="#Course" onclick="Set('<?php print_r($array_of_results1[2]['Title'])?>','<?php print_r($array_of_results1[2]['Description']) ?>')">
					 <div class="col-sm-6 col-md-4 ">
					    <div class="thumbnail">
					      <div class="overflow-hidden relative-pos"><img src=<?php print_r($array_of_results1[2]['Img_Path']) ?> alt="..." class="img-dim"><span class="Preview">Preview</span></div>
					      <div class="caption">
					        <h4 class="textcolor ellipsis_oneline"><?php print_r($array_of_results1[2]['Title']) ?></h4>
					        <p class="textcolor ellipsis_oneline"><?php print_r($array_of_results1[2]['Prof_Assigned']) ?> <span class="alttextcolor"> | <?php print_r($array_of_results1[2]['Start_Date']) ?> </span></p>
					        
					      </div>
					    </div>
					 </div></a>


					 <a class="thumbnail-anchor" data-toggle="modal" data-target="#Course" onclick="Set('<?php print_r($array_of_results1[3]['Title'])?>','<?php print_r($array_of_results1[3]['Description']) ?>')">
					 <div class="col-sm-6 col-md-4 ">
					    <div class="thumbnail">
					      <div class="overflow-hidden relative-pos"><img src=<?php print_r($array_of_results1[3]['Img_Path']) ?> alt="..." class="img-dim"><span class="Preview">Preview</span></div>
					      <div class="caption">
					        <h4 class="textcolor ellipsis_oneline"><?php print_r($array_of_results1[3]['Title']) ?></h4>
					        <p class="textcolor ellipsis_oneline"><?php print_r($array_of_results1[3]['Prof_Assigned']) ?> <span class="alttextcolor"> | <?php print_r($array_of_results1[3]['Start_Date']) ?> </span></p>
					        
					      </div>
					    </div>
					 </div></a>


					 <a class="thumbnail-anchor" data-toggle="modal" data-target="#Course" onclick="Set('<?php print_r($array_of_results1[4]['Title'])?>','<?php print_r($array_of_results1[4]['Description']) ?>')">
					 <div class="col-sm-6 col-md-4 ">
					    <div class="thumbnail">
					      <div class="overflow-hidden relative-pos"><img src=<?php print_r($array_of_results1[4]['Img_Path']) ?> alt="..." class="img-dim"><span class="Preview">Preview</span></div>
					      <div class="caption">
					        <h4 class="textcolor ellipsis_oneline"><?php print_r($array_of_results1[4]['Title']) ?></h4>
					        <p class="textcolor ellipsis_oneline"><?php print_r($array_of_results1[4]['Prof_Assigned']) ?> <span class="alttextcolor"> | <?php print_r($array_of_results1[4]['Start_Date']) ?> </span></p>
					        
					      </div>
					    </div>
					 </div></a>

					 <a class="thumbnail-anchor" data-toggle="modal" data-target="#Course" onclick="Set('<?php print_r($array_of_results1[5]['Title'])?>','<?php print_r($array_of_results1[5]['Description']) ?>')">
					 <div class="col-sm-6 col-md-4 ">
					    <div class="thumbnail">
					      <div class="overflow-hidden relative-pos"><img src=<?php print_r($array_of_results1[5]['Img_Path']) ?> alt="..." class="img-dim"><span class="Preview">Preview</span></div>
					      <div class="caption">
					        <h4 class="textcolor ellipsis_oneline"><?php print_r($array_of_results1[5]['Title']) ?></h4>
					        <p class="textcolor ellipsis_oneline"><?php print_r($array_of_results1[5]['Prof_Assigned']) ?> <span class="alttextcolor"> | <?php print_r($array_of_results1[5]['Start_Date']) ?> </span></p>
					        
					      </div>
					    </div>
					 </div></a>

					  
					  
				</div>
			</div>
		</div>
	</div>



	<div class="row adjustment">
		<div class="col-md-12 default-padding margin-top-20px">
			<h3 class="text-center textcolor">
				Latest Courses
			</h3>


			  <div class="panel-group margin-top-30px" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading padding-left-30">
        <h4 class="panel-title ellipsis_oneline">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><?php print_r($array_of_results2[0]['Title']) ?></a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body padding-left-30">

        	<div class="row">
			 <!-- <div class="col-xs-6 col-md-3"> -->
			    <!-- <a href="#" class="thumbnail">
			      <img src="assets/Images/Coastal.jpg" alt="...">
			    </a> -->
			    <p><?php print_r($array_of_results2[0]['Description']) ?></p>

			    <p class="button-course">
			    <a href="links/Course_Details.php?Title=<?php print_r($array_of_results2[0]['Title']); ?>"><button class="btn btn-default" data-toggle="modal" data-target="#Course">View Course</button></a></p>

			  <!-- </div> -->
			  
			</div>

        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading padding-left-30">
        <h4 class="panel-title ellipsis_oneline">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><?php print_r($array_of_results2[1]['Title']) ?></a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body padding-left-30">

        <p><?php print_r($array_of_results2[1]['Description']);?>
        </p>
        <p class="button-course">
        <a href="links/Course_Details.php?Title=<?php print_r($array_of_results2[0]['Title']); ?>"><button data-toggle="modal" class="btn btn-default" data-target="#Course">View Course</button></a></p>
        </div>
        
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading padding-left-30">
        <h4 class="panel-title ellipsis_oneline">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><?php print_r($array_of_results2[2]['Title']) ?></a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body padding-left-30">

        <p><?php print_r($array_of_results2[2]['Description']) ?></p>
        <p class="button-course"><a href="links/Course_Details.php?Title=<?php print_r($array_of_results2[0]['Title']); ?>"><button data-toggle="modal" class="btn btn-default" data-target="#Course">View Course</button></a></p>

        </div>
      </div>

    </div>

    <div class="panel panel-default">
      <div class="panel-heading padding-left-30">
        <h4 class="panel-title ellipsis_oneline">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><?php print_r($array_of_results2[3]['Title']) ?></a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body padding-left-30">

        <p><?php print_r($array_of_results2[3]['Description']); ?>
        </p>
        <p class="button-course">
        <a href="links/Course_Details.php?Title=<?php print_r($array_of_results2[0]['Title']); ?>"><button data-toggle="modal" class="btn btn-default" data-target="#Course">View Course</button></a></p>
        </div>
        
      </div>
    </div>
  </div> 
</div>

		</div>
	</div>

	<div class="row" id="team" style="opacity: 0;">
			<h3 class="text-center textcolor margin-bottom-20px">
				Team
			</h3>

		
			<div class="col-sm-6 col-md-3">
		    	<div class="thumbnail author-thumbnail">
		      		<img src="assets/Images/Team/user.png" class="author-img">
		      	<div class="caption">
		        	<h3 class="text-align-center author-name">Dr. RD Verma</h3>
		        	<p class="text-align-center"></p>
		        </div>
		    	</div>
		  	</div>

		  	<div class="col-sm-6 col-md-3">
		    	<div class="thumbnail author-thumbnail">
		      		<img src="assets/Images/Team/user.png" class="author-img">
		      	<div class="caption">
		        	<h3 class="text-align-center author-name">Dr. R. S. Kankara</h3>
		        	<p class="text-align-center"></p>
		        </div>
		    	</div>
		  	</div>

		  	<div class="col-sm-6 col-md-3">
		    	<div class="thumbnail author-thumbnail">
		      		<img src="assets/Images/Team/Team1.jpg" class="author-img">
		      	<div class="caption">
		        	<h3 class="text-align-center author-name">Dr. D. Mohan</h3>
		        	<p class="text-align-center"></p>
		        </div>
		    	</div>
		  	</div>

		  	<div class="col-sm-6 col-md-3">
		    	<div class="thumbnail author-thumbnail">
		      		<img src="assets/Images/Team/user.png" class="author-img">
		      	<div class="caption">
		        	<h3 class="text-align-center author-name">Dr. J. C. Verma</h3>
		        	<p class="text-align-center"></p>
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
		<div class="modal fade" id="Course" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title" id="Title-modal"></h4>
	        </div>
	        <div class="modal-body">
	          <p id="Description-modal"></p>
	        </div>
	        <div class="modal-footer">
	          <a href="" onclick="onclick_set()" id="view_course_detail"><button type="button" class="btn btn-default">View</button></a> 
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	      
	    </div>
	  </div>
  


	<!-- /Modal -->


	<!-- <div class="footer-div default-padding adjustment">

	</div> -->
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

    <script type="text/javascript">
    	$(document).scroll(function () {
		var y = $(this).scrollTop();
		var x = $("#team").position();
		

		if (y > (x.top - 550)) { 
		    $("#team").addClass(
		        "animated");
			$("#team").addClass(
		        "fadeInUp");
		}
		
});
    </script>


    <script type="text/javascript">
    	
	    function Set(a,b)
	    {
	    	
	    	$('#Title-modal').html(a);
	    	$('#Description-modal').html(b);
	    	$('#Course').attr('data-id',a);
	    }


	    function onclick_set()
	    {
	    	var a = $('#Course').attr("data-id");
	    	var url = 'links/Course_Details.php?Title='+a;
	    	// alert(url);
	    	$('#view_course_detail').attr('href',url);
	    }

    </script>
   

   <!-- <script type="text/javascript">
   	
   	 $('#Course').on('show.bs.modal', function(e) {

        var $modal = $(this);
        var index = $(e.relatedTarget).attr('data-id');
        
        
        $.ajax({
        	success: function(data) {
                $modal.find('.modal-title').html(index);
            }
        });
    })
   </script>  -->


  
  </body>
</html>