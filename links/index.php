

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap 3, from LayoutIt!</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <script type="text/javascript" src="http://www.jquery4u.com/demos/jquery-quick-pagination/js/jquery.quick.pagination.min.js"></script>

    <script type="text/javascript">
	$(document).ready(function() {
			
		$("ul.pagination3").quickPagination({pageSize:"3 "});
	});
</script>


  </head>
  <body>


  <?php 
			session_start();
			$con = new MongoClient();
			$db = $con->ICMAM;

			$collection = $db->courses;

			$query= $collection->find();
			$query->sort(array('UsersRegistered'=>-1));
			$results = iterator_to_array($query);
			//print_r($results);
			$temp=sizeof($results);
			 //$_SESSION['$results1']=$results;
			// if($results)
			// {
			// 	$display = array();
			// 	foreach($results as $rec)
			// 	{
			// 		$display[]=array($rec);

			// 	}
			// }
			// print_r($display[1]);
			// $temp=sizeof($display);
			// echo $temp;
			// exit;

			// print_r($query);
			// $temp1 = $temp->sort($temp);
			//  print_r($temp1);
			// $query1=$collection->findOne();
			// print_r($query1);
			// //$results1 = 
			$array_of_results[0]=current($results);
			//print_r($array_of_results[0]['UsersRegistered']);
			for($i=1; $i<sizeof($results);$i++)
			{
			
					$array_of_results[$i]=next($results);
					echo "<br>";
					//print_r($array_of_results[$i]['_id']);

			}
			//print_r($array_of_results['_id']);
			//exit;
			$_SESSION['$results1']=$array_of_results;
			//$temp1=$_SESSION['CourseTitle'];
			// // $temp2= sort($array_of_results);
			// // print_r($temp2);
			// exit;
 			
		// echo '<pre>';
		// while ($query->hasNext()) { 
  //   		$friend = $query->getNext();
  //   		print_r($friend);
  //       	echo PHP_EOL;
  //       	exit();
		// }
		// echo '</pre>';
			// for($i=0;i<$temp;$i++)
			// {
			// 	print_r($display[i][])
			// }
											
											
	?>

<!--By shailey and riya 19 march 2017 and 20th march 2017-->
    <div class="container-fluid">
	<div class="row">
			<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
					<img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
				</div>
				<div class="col-md-9">
					<h3 class="text-left">
						List of Training Programs
					</h3>
				</div>
			</div>
		</div>
	</div>
	<!--header ends-->
	<!--add course button starts2-->
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					 
					<!-- Modal -->

 					<a id="modal-addcourse" href="#modal-container-addcourse" role="button" class="btn btn-default coursebutton" data-toggle="modal">Add New Course</a>
			
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
												<input type="file" name="fileToUpload" id="fileToUpload"/ required="">
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
										<div class="modal-footer">
									 
											<button type="button" class="btn btn-default" data-dismiss="modal" name="Close" id="Close">
											Close
											</button> 


											<input type="submit" class="btn btn-primary" name="SaveChanges_addcourse" id="SaveChanges_addcourse" value="Save changes" />
										
										</div>
									</form>
								</div>
								
							</div>
							
						</div>
						
					</div>
				
					<!--Modal Ends-->
				</div>
			</div>
		</div>
	</div>
	<!--add course button ends-->
	<br>
	
	
	<div class="row">
	<!--navigation starts-->
		<div class="col-md-2">
			<ul class="nav nav-tabs nav-stacked">
				<li class="active">
					<a href="#">Dashboard</a>
				</li>
				<li>
					<a href="#">Training Program</a>
				</li>
				<li class="active">
					<a href="#">Registered User</a>
				</li>
				<li class="active">
					<a href="#">Upload Lessons</a>
				</li>
				<li class="active">
					<a href="#">Track Assignments</a>
				</li>
				<li class="active">
					<a href="#">Online Examination</a>
				</li>
			</ul>
		</div>
	<!--navigation ends-->
	<!--courses starts-->
	<!--middle page starts-->
			
				<div class="col-md-10">
					<div class="row">
					<!--Column1-->
						<ul class="pagination3">
						<li>
							<div class="col-md-4">
							<div class="thumbnail">
								<img alt="Bootstrap Thumbnail First" src="http://lorempixel.com/output/people-q-c-600-200-1.jpg">
								<div class="caption">
										<!-- <?php 
											// $con = new MongoClient();
											//  $db = $con->ICMAM;
								   //     		 $editcourse = $db->courses;
								   //     		// echo $editcourse;
								   //     		 $cursor = $editcourse->find();
								   //     		 //echo $cursor;
								   //     		 $count1=$editcourse->count();
								   //     		 echo $count1;
								   //     		// $results = iterator_to_array($cursor);
											// 	foreach ($cursor as $doc) 
											// 	{
											// 		//echo $_id;
											// 		$recordId = (string) $doc["_id"];
											// 		echo $recordId;
											// 		$var1= $doc['CourseTitle'];
											// 		echo $var1;
											// 		//echo $doc['CourseDes'];
											// 		// $result=$row->retrieve();
											// 		// echo $results;
											// 	}
											// 	//if()

											// 	// if($cursor->count()>0)
											// 	// {
											// 	// 	$cursor->next();
    							// 	// 				$CourseTitle = $cursor->current();
    							// 	// 				echo $CousreTitle;
												// } 
										?> -->
										<!-- $temp1=$array_of_results[0]['CourseTitle'];
										$temp2=$array_of_results[0]['Professor'] -->
									<p>
										<?php print_r($array_of_results[0]['CourseTitle']) ?></h4>
					        <p class="textcolor ellipsis_oneline"><?php print_r($array_of_results[0]['Professor']) ?> <span class="alttextcolor"> | 
					        <?php 
					        print_r($array_of_results[0]['CourseDes']);
					        //exit; 
					        ?>
					         </span></p>
					        
				
									</p> 
									<p>
										
										<a id="modal-colr1" href="#modal-container-colr1" role="button" class="btn btn-primary removebutton" data-toggle="modal" >Remove</a>
								 		<a id="modal-cole1" href="#modal-container-cole1" role="button" class="btn btn-primary editbutton" data-toggle="modal">Edit</a>
										




										<div class="modal fade" id="modal-container-colr1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													 
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														×
													</button>
													<h4 class="modal-title" id="myModalLabel">
														Delete Course Information
													</h4>
												</div>
												<div class="modal-body">
													
													<form  action="remove.php?CourseTitle=<?php print_r($array_of_results[0]['CourseTitle'])?>"  method="post">
														<div class="row">
																<p>You are about to delete the Course Information.</p>
						        								<p>Do you want to proceed?</p>
														</div>
														<div class="modal-footer">
														 <input type="submit" value="Yes" class="btn danger" name="yes_remove" id="yes_remove"
														 >
														
														<button type="button" class="btn btn-default" data-dismiss="modal">
															No
														</button> 
													
														</div>
													</form>
												</div>
												
											</div>
										</div>
									</div>
								<!--remove modal ends-->
								<!--<a class="btn editbutton" href="#">Edit</a>-->
								<!--modal-->
									
				
									<div class="modal fade" id="modal-container-cole1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
													<form action="Edit.php?Id=<?php print_r($array_of_results[0]['_id'])?>" method="post">
														
														<div class="row">
														
															<div class="column_image">
																<h3>Select Course Image to Upload</h3>
															</div><br>
															<div class="column_image">
																<input type="file" name="fileToUpload" id="fileToUpload" />
															</div>
														</div>
														
														<div class="row">
															<div class="col-md-12">
																<h3>Course Title</h3><br>
																<input type="text" name="CourseTitle" id="CourseTitle" placeholder="Title" value="<?php print_r($array_of_results[0]['CourseTitle'])?>"/>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<h3>Course Description</h3><br>
																<!-- <input type="text" style="height:50px;" name="CourseDes" id="CourseDes" placeholder="Enter Here" value="<?php print_r($array_of_results[0]['CourseDes'])?>"/> -->
																<textarea name="CourseDes" id="CourseDes" placeholder="Enter Here" rows="5" cols="50">
																	<?php print_r($array_of_results[0]['CourseDes'])?>
																</textarea>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<h3>Professor Assigned</h3><br>
																<input type="text" name="Professor" id="Professor" placeholder="Professor Name" value="<?php print_r($array_of_results[0]['Professor'])?>"/>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<h3>Course Duration</h3><br>
																<input type="text" name="CourseDuration" id="CourseDuration" placeholder="CourseDuration" value="<?php print_r($array_of_results[0]['CourseDuration'])?>"/>
															</div>
														</div>
														<!-- <div class="row">
															<div class="col-md-12">
																<h3>Tags</h3><br>
																<input type="text" name="Tags" id="Tags" placeholder="Tags" value="<?php //print_r($array_of_results[0]['Tags=>1'])?>"/>
															</div>
														</div> -->
														<div class="modal-footer">
												 
															<button type="button" class="btn btn-default" data-dismiss="modal" name="Close" id="Close">
																Close
															</button> 


															<input type="submit" class="btn btn-primary" name="SaveChanges" id="SaveChanges" value="Save changes"  />

														</div>
													</form>
												</div>
											
										</div>
										
									</div>
									
								</div>
						
					<!--Modal Ends-->
									</p>
								</div>
							</div>
						</div>
						</li>
						<li>
						<div class="row">
						<div class="col-md-4">
							<div class="thumbnail">
								<img alt="Bootstrap Thumbnail First" src="http://lorempixel.com/output/people-q-c-600-200-1.jpg">
								<div class="caption">
										<!-- <!-- <?php 
											// $con = new MongoClient();
											//  $db = $con->ICMAM;
								       		// $editcourse = $db->courses;
								       		// echo $editcourse;
								       		 //$cursor = $editcourse->find();
								       		 //echo $cursor;
								       		 //$count1=$editcourse->count();
								       		// echo $count1;
								       		// $results = iterator_to_array($cursor);
												// foreach ($cursor as $doc) 
												// {
												// 	//echo $_id;
												// 	$recordId = (string) $doc["_id"];
												// 	echo $recordId;
												// 	$var1= $doc['CourseTitle'];
												// 	echo $var1;
												// 	//echo $doc['CourseDes'];
												// 	// $result=$row->retrieve();
												// 	// echo $results;
												// }
												// 




												//if()

												// if($cursor->count()>0)
												// {
												// 	$cursor->next();
    								// 				$CourseTitle = $cursor->current();
    								// 				echo $CousreTitle;
												// } 
										?>  -->
									
									<p>
										<?php print_r($array_of_results[1]['CourseTitle']) ?>
										</h4>
					        <p class="textcolor ellipsis_oneline">
					        <?php 
					        	print_r($array_of_results[1]['Professor']) 
					        ?>
					         <span class="alttextcolor"> | 
					         <?php 
					         	print_r($array_of_results[1]['CourseDes']) ?> 
					         	</span>
					         	</p>
					        
				
									</p> 
									<p>
										
										<a id="modal-colr1" href="#modal-container-colr2" role="button" class="btn btn-primary removebutton" data-toggle="modal">Remove</a>
								 		<a id="modal-cole1" href="#modal-container-cole2" role="button" class="btn btn-primary editbutton" data-toggle="modal">Edit</a>
										<div class="modal fade" id="modal-container-colr2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													 
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														×
													</button>
													<h4 class="modal-title" id="myModalLabel">
														Delete Course Information
													</h4>
												</div>
												<div class="modal-body">
													<form action="remove.php?CourseTitle=<?php print_r($array_of_results[1]['CourseTitle'])?>" method="post">
														<div class="row">
																<p>You are about to delete the Course Information.</p>
						        								<p>Do you want to proceed?</p>
														</div>
														<div class="modal-footer">
														 <input type="submit" value="Yes" class="btn danger" name="yes_remove" id="yes_remove"
														 >
														
														<button type="button" class="btn btn-default" data-dismiss="modal">
															No
														</button> 
													
														</div>
													</form>
												</div>
												
											</div>
											
										</div>
										
									</div>
								<!--remove modal ends-->
								<!--<a class="btn editbutton" href="#">Edit</a>-->
								<!--modal-->
									
				
									<div class="modal fade" id="modal-container-cole2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
													<form action="training_php.php" method="post">
														
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
														<div class="modal-footer">
												 
															<button type="button" class="btn btn-default" data-dismiss="modal" name="Close" id="Close">
																Close
															</button> 


															<input type="submit" class="btn btn-primary" name="SaveChanges" id="SaveChanges" value="Save changes"  />

														</div>
													</form>
												</div>
											
										</div>
										
									</div>
									
								</div>
						
					<!--Modal Ends-->
									</p>
								</div>
							</div>
						</div>
						</li>
						<li>
						<div class="row">
						<div class="col-md-4">
							<div class="thumbnail">
								<img alt="Bootstrap Thumbnail First" src="http://lorempixel.com/output/people-q-c-600-200-1.jpg">
								<div class="caption">
										<!-- <?php 
											// $con = new MongoClient();
											//  $db = $con->ICMAM;
								   //     		 $editcourse = $db->courses;
								   //     		// echo $editcourse;
								   //     		 $cursor = $editcourse->find();
								   //     		 //echo $cursor;
								   //     		 $count1=$editcourse->count();
								   //     		 echo $count1;
								   //     		// $results = iterator_to_array($cursor);
											// 	foreach ($cursor as $doc) 
											// 	{
											// 		//echo $_id;
											// 		$recordId = (string) $doc["_id"];
											// 		echo $recordId;
											// 		$var1= $doc['CourseTitle'];
											// 		echo $var1;
											// 		//echo $doc['CourseDes'];
											// 		// $result=$row->retrieve();
											// 		// echo $results;
											// 	}
											// 	if()

											// 	if($cursor->count()>0)
											// 	{
											// 		$cursor->next();
    							// 					$CourseTitle = $cursor->current();
    							// 					echo $CousreTitle;
											// 	} 
										?> -->
									
									<p>
										<?php print_r($array_of_results[2]['CourseTitle']) ?></h4>
					        <p class="textcolor ellipsis_oneline"><?php print_r($array_of_results[2]['Professor']) ?> <span class="alttextcolor"> | <?php print_r($array_of_results[2]['CourseDes']) ?> </span></p>
					        
				
									</p> 
									<p>
										
										<a id="modal-colr1" href="#modal-container-colr3" role="button" class="btn btn-primary removebutton" data-toggle="modal">Remove</a>
								 		<a id="modal-cole1" href="#modal-container-cole3" role="button" class="btn btn-primary editbutton" data-toggle="modal">Edit</a>
										<div class="modal fade" id="modal-container-colr3" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													 
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														×
													</button>
													<h4 class="modal-title" id="myModalLabel">
														Delete Course Information
													</h4>
												</div>
												<div class="modal-body">
													<form action="remove.php?CourseTitle<?php print_r($array_of_results[2]['CourseTitle'])?>" method="post">
														<div class="row">
																<p>You are about to delete the Course Information.</p>
						        								<p>Do you want to proceed?</p>
														</div>
														<div class="modal-footer">
														 <input type="submit" value="Yes" class="btn danger" name="yes_remove1" id="yes_remove1">
														
														<button type="button" class="btn btn-default" data-dismiss="modal">
															No
														</button> 
													
														</div>
													</form>
												</div>
												
											</div>
											
										</div>
										
									</div>
								<!--remove modal ends-->
								<!--<a class="btn editbutton" href="#">Edit</a>-->
								<!--modal-->
									
				
									<div class="modal fade" id="modal-container-cole3" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
													<form action="training_php.php" method="post">
														
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
														<div class="modal-footer">
												 
															<button type="button" class="btn btn-default" data-dismiss="modal" name="Close" id="Close">
																Close
															</button> 


															<input type="submit" class="btn btn-primary" name="SaveChanges" id="SaveChanges" value="Save changes"  />

														</div>
													</form>
												</div>
											
										</div>
										
									</div>
									
								</div>
						
					<!--Modal Ends-->
									</p>
								</div>
							</div>
						</div>

				<!--middle page ends-->
			</div>
		</div>
	</div>
	</li>
	</ul>
	<div class="row">
		<div class="col-md-12">
			 
			<address>
				 <strong>Twitter, Inc.</strong><br> 795 Folsom Ave, Suite 600<br> San Francisco, CA 94107<br> <abbr title="Phone">P:</abbr> (123) 456-7890
			</address>
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

    
</script>
  </body>
</html>