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

	$collection = $db->Exam_Details;

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


	
	$url = 'Login-Page.php?redirect=1&Title=';
	$flag1 = 0;
	
	
	if(isset($_SESSION['user_id']))
	{
		$url = "UserUpdate.php?Title=";
		$flag1 = 1;
	}

	// echo $url;

	//exit;

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

  <div class='container-fluid'> 
  			<div class='row adjustment'>
  				<div class='col-md-12 default-padding margin-top-30px'>
					<h2 class='text-center textcolor' style='padding-top: 30px'>
						Exams
					</h2>
				</div>
			</div>
		</div>
  
  <?php require 'navigation-links.php' ?>
  
  <?php
 

  	if($array_of_results[0]==null)
  	{
  		echo "<div><h3 class='Msg'>No Examination</h3></div>";

  	}
  	else
  	{

  	for($i=0;$i<sizeof($array_of_results);$i++)
  	{
	echo "<div class='panel-group margin-bottom-0px'>
    	<div class='panel panel-default'>
      		<div class='panel-heading padding-left-30'>
        		<h4 class='panel-title ellipsis_oneline'>
          		<a data-toggle='collapse' data-parent='#accordion' href='#collapse".$i."'>".$array_of_results[$i]['Exam Title']."</a>
        		</h4>
      		</div>
      		<div id='collapse".$i."' class='panel-collapse collapse in'>
        		<div class='panel-body padding-left-30'>

	        	<div class='row'>
				   <p>Course Title : ".$array_of_results[$i]['Course Title']."<br>
				    	Date : ".$array_of_results[$i]['Date']."<br>
				    	Start Time : ".$array_of_results[$i]['Start Time']."<br>
				    	End Time : ".$array_of_results[$i]['End Time']."</p>


				    <p class='button-course'>
				    <a href='";

				    if($flag1==1) echo $url.$array_of_results[$i]['Exam Title']; else echo $url.$array_of_results[$i]['Exam Title'];

				    echo "'><button class='btn btn-default' data-toggle='modal' data-target='#Course'>Enroll</button></a></p>

				  
				  
				</div>

       			</div>
     	 	</div>
    	</div>
    </div>";

  	}

  	}

   	?>

	<div class="row margin-top-30px footer-row bottom-placement" id="nores">
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

	<?php

		  	if($array_of_results[0]==null)
  	{

  		echo "<script>

  		document.getElementById('nores').style.width='100%';
  		document.getElementById('nores').style.bottom=0;
  		document.getElementById('nores').style.position='absolute';
 
  		</script>";
  	}



	?>



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

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>



  
  </body>
</html>