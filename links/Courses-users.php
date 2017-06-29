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

	// $query = $collection->find();

	// $results = iterator_to_array($query);

	// $array_of_results[0] = current($results);

	// for($i=1;$i<sizeof($results);$i++)
	// {
	// 	$array_of_results[$i] = next($results);
	// }


	$query1 = $collection->find();
	//$query1->sort(array('UsersRegistered'=>-1))->limit(6);
	$results1 = iterator_to_array($query1);
	$size = sizeof($results1);
	$array_of_results[0] = current($results1);
	
	for($i=1;$i<$size;$i++)
	{
		$array_of_results[$i] = next($results1);
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

    
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <script type="text/javascript" src="js/jquery.quick.pagination.min.js"></script> -->

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
		  /*border-radius: 18px 0 0 18px;*/
		}
		.pagination-button:last-of-type {
		  /*border-radius: 0 18px 18px 0;*/
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
			
			<?php require 'navigation-links.php'; ?>

			<div class="row margin-top-60px courses-heading-users">
				 <div class="col-md-12 ">
				 	<h3 style="padding-bottom: 10px;">Training Programmes:</h3>
				 </div>
			</div>

	
	<div class="row margin-top-40px">
		<!--<div class="col-md-3">
			<div class="row">
				<div class="col-md-12 text-align-center">
					<h3 class="text-align-center" class="textcolor">
						Filter
					</h3>

					<div class="row margin-top-30px">
						<div class="col-sm-6 col-md-12 default-padding iPad-resp">
							<div href="#" class="thumbnail custom-thumbnail sidebar-responsive">
							
								<h4>Order By:</h4>

								<select class="form-control custom-dropdown">
									
									<option>Date (Ascending)</option>
									<option>Date (Descending)</option>

								</select>

								<h4 class="margin-top-30px">Course</h4>
								<form class="" role="search">
									<div class="form-group">
										<input type="text" class="form-control custom-input" placeholder="Name" />
									</div> 
									<button type="submit" class="btn btn-default">
										Search
									</button>
								</form>

								<h4 class="margin-top-30px">Tags</h4>

								<div class="text-align-left">
									<div class="margin-top-20px checkbox-div">
										<input type="checkbox" name="checkbox">&nbsp;GIS<br>
										<input type="checkbox" name="checkbox">&nbsp;Image Processing<br>
										<input type="checkbox" name="checkbox">&nbsp;Satellite<br>
										<input type="checkbox" name="checkbox">&nbsp;Sediment<br>
										<input type="checkbox" name="checkbox">&nbsp;Shoreline<br>
										<input type="checkbox" name="checkbox">&nbsp;Marine<br>
										<input type="checkbox" name="checkbox">&nbsp;Pollution<br>
									</div>
								</div>

							
							</div>
						</div>
					</div>

				</div> 
			</div>
			<div class="row">
				<div class="col-md-12">
					
				</div>
			</div>
		</div>-->
		<div class="col-md-12 default-padding">
			<div class="row">
				<div class="col-md-12">
					<h3 id="Featured-courses-title" class="textcolor">
						Courses
					</h3>
				</div>
			</div>
			<!--Displaying the contents-->
			<!-- <div class="article-loop"> -->
			<div class="row margin-top-20px ">
				<div class="col-md-12 default-padding">
					
					<div class="row">
					
					

					 <?php

					 	for($i=0;$i<$size;$i++)
					 	{

					 		$Title = $array_of_results[$i]['Title'];
					 		$Description = $array_of_results[$i]['Description'];

					 		$t1 = rawurlencode($Title);
                        	$t2 = rawurlencode($Description);

					 		$onclick = "Set('".$t1."','".$t2."')";

					 		echo "<div class='article-loop'>
					 		<a class='thumbnail-anchor' data-toggle='modal' data-id='Hello' data-target='#Course' onclick=".$onclick.">
					 			<div class='col-sm-6 col-md-4'>
					  		  <div class='thumbnail'>
					      <div class='overflow-hidden relative-pos'><img src='../"; print_r($array_of_results[$i]['Img_Path']); echo "' class='img-dim'><span class='Preview'>Preview</span></div>
					      <div class='caption'>
					        <!-- <h4 class='textcolor ellipsis_oneline'>Satellite Oceanography</h4> -->
					        <h4 class='textcolor ellipsis_oneline'>".$array_of_results[$i]['Title']."</h4>
					        <p class='textcolor ellipsis_oneline'>".$array_of_results[$i]['Prof_Assigned']."<span class='alttextcolor'> | ".$array_of_results[$i]['Start_Date']."</span></p>
					        
					      </div>
					    </div>
					 </div></a></div>";

					 	}


					 ?>  
					  
				
			</div>
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

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>

    <script type="text/javascript">
    	
	    function Set(a,b)
	    {
	    	
	    	var a = decodeURIComponent(a);

         	 var b = decodeURIComponent(b);

	    	$('#Title-modal').html(a);
	    	$('#Description-modal').html(b);
	    	$('#Course').attr('data-id',a);
	    }

	    function onclick_set()
	    {
	    	var a = $('#Course').attr("data-id");
	    	var url = 'Course_Details.php?Title='+a;
	    	// alert(url);
	    	$('#view_course_detail').attr('href',url);
	    }

    </script>
    

    <script src="../js/index_page.js"></script>
  
  </body>
</html>