<?php
	session_start();

	$flag =1;

	// if(isset($_GET['logout'])){
	// 	session_destroy();
	// 	session_unset();

	// 	$_SESSION['logout'] = 1;

	// 	$flag = 0;
	// }

	if(isset($_SESSION['user_id'])){
		$flag = 0;
	}
	// echo $_SESSION['user_id'];
	// echo $flag;
	// exit;

?>


<?php
	
	$con = new MongoClient();

	$db = $con->ICMAM;

	$collection = $db->Assignment_Details;

	$query = $collection->find();

	$results = iterator_to_array($query);

	$array_of_results[0] = current($results);

	for($i=1;$i<sizeof($results);$i++)
	{
		$array_of_results[$i] = next($results);
	}
	// print_r($array_of_results[0]["Course Title"]);
	// exit;


	
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
  <?php
  	for($i=0;$i<sizeof($array_of_results);$i++)
  	{
  		echo "<div class='container-fluid'>";
			
		echo "require 'navigation-link.php'";
	

	echo "<div class='row adjustment'>
		<div class='col-md-12 default-padding margin-top-30px'>
			<h3 class='text-center textcolor'>
				Assignments
			</h3>";


	echo "<div class='panel-group margin-top-30px'>
    	<div class='panel panel-default'>
      	<div class='panel-heading padding-left-30'>
        	<h4 class='panel-title ellipsis_oneline'>
          	<a data-toggle='collapse' data-parent='#accordion' href='#collapse'".$i.">".$array_of_results[0]['Assignment Title']."</a>
        	</h4>
      	</div>
      		<div id='collapse'".$i." class='panel-collapse collapse in'>
        	<div class='panel-body padding-left-30'>

        	<div class='row'>
			   <p>Course Title : ".$array_of_results[0]['Lesson Title']."<br>
			    	Date : ".$array_of_results[0]['Total Marks']."<br>
			    	Start Time : ".$array_of_results[0]['Start Date']."<br>
			    	End Time : ".$array_of_results[0]['End Date']."</p>


			    <p class='button-course'>
			    <a href='links/Course_Details.php?Title=".$array_of_results[0]['Assignment Title']."><button class='btn btn-default' data-toggle='modal' data-target='#Course'>Enroll</button></a></p>

			  
			  
			</div>

       		 </div>
     	 </div>
    	</div>
    	</div>
    	</div>

	</div>
	</div>";

  	}
   	?>

    <!-- <div class="panel panel-default">
      <div class="panel-heading padding-left-30">
        <h4 class="panel-title ellipsis_oneline">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><?php print_r($array_of_results2[1]['Title']) ?></a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse in">
        <div class="panel-body padding-left-30">

        <p><?php print_r($array_of_results2[1]['Description']);?>
        </p>
        <p class="button-course">
        <a href="links/Course_Details.php?Title=<?php print_r($array_of_results2[0]['Title']); ?>"><button data-toggle="modal" class="btn btn-default" data-target="#Course">View Course</button></a></p>
        </div>
        
      </div>
    </div>
 -->
    <!-- <div class="panel panel-default">
      <div class="panel-heading padding-left-30">
        <h4 class="panel-title ellipsis_oneline">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><?php //print_r($array_of_results2[2]['Title']) ?></a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse in">
        <div class="panel-body padding-left-30">

        <p><?php //print_r($array_of_results2[2]['Description']) ?></p>
        <p class="button-course"><a href="links/Course_Details.php?Title=<?php //print_r($array_of_results2[0]['Title']); ?>"><button data-toggle="modal" class="btn btn-default" data-target="#Course">View Course</button></a></p>

        </div>
      </div>

    </div>
 -->
    <!-- <div class="panel panel-default">
      <div class="panel-heading padding-left-30">
        <h4 class="panel-title ellipsis_oneline">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><?php //print_r($array_of_results2[3]['Title']) ?></a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse in">
        <div class="panel-body padding-left-30">

        <p><?php //print_r($array_of_results2[3]['Description']); ?>
        </p>
        <p class="button-course">
        <a href="links/Course_Details.php?Title=<?php// print_r($array_of_results2[0]['Title']); ?>"><button data-toggle="modal" class="btn btn-default" data-target="#Course">View Course</button></a></p>
        </div>
        
      </div>
    </div> -->
   


	

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
							<li>Assignments</li>
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



  
  </body>
</html>