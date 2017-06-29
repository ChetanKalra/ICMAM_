<?php
  session_start();

  $flag =1;

  if(isset($_SESSION['user_id'])){
    $flag = 0;
  }

?>


<?php
  
  $Title = $_GET['Title'];
  
  $con = new MongoClient();

  $db = $con->ICMAM;

  $collection = $db->courses;

  $query= $collection->find(array('Title'=>$Title));


  $array_of_results = iterator_to_array($query);


  $res[0] = current($array_of_results);
  
  $query1 = $collection->find()->sort(array('UsersRegistered'=>-1))->limit(4);
  //$query1->sort(array('UsersRegistered'=>-1))->limit(6);
	$results1 = iterator_to_array($query1);
	$size = sizeof($results1);

	$array_of_results10[0] = current($results1);
	
	for($i=1;$i<$size;$i++)
	{
		$array_of_results10[$i] = next($results1);
	}

?>



<?php
 

  $T = $_GET['Title'];

  $pathtov = "";
    $con = new MongoClient();

	$db = $con->ICMAM;

	$collection = $db->Lessons;

	$query1 = $collection->find(array("Title"=>$T));

	
  $array_of_results1 = iterator_to_array($query1);

  $res1[0] = current($array_of_results1);

  //print_r($res1[0]);
  //exit;
  for($i=1;$i<sizeof($array_of_results1);$i++)
  {
    $res1[$i] = next($array_of_results1);
   // print_r($res1[$i]['Title']);
  }
  // print_r($res1);
  // exit;
  $pathInitial = "../".$res1[0]['Lesson'][2];	

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lesson</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

  <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  </head>
  <body>

   <div class="container-fluid">

    <?php require 'navigation-links.php' ?>
	
									
									
<div class="container-fluid" style ="margin-top: 5em;">


		<div class="col-md-2">
			<div class="row">
				<div class="col-md-12 text-align-center">
					<h3 class="text-align-center" style="margin-top: 0px;" class="textcolor">
						Lessons
					</h3>
				</div>
			</div>
			<div class="row" style="">
						<!-- <div class="col-md-2 col-md-12 default-padding iPad-resp"> -->
							<!-- <div href="#" class="thumbnail custom-thumbnail sidebar-responsive zeropadding Course_Detail_lesson high"> -->
							
						<ul class="lessons-list">

									<!-- <li class="Title" >Welcome</li> -->
									
									<?php


									function asdd($e){

										$pathInitial= $e;
									}

									for($i=0;$i<sizeof($res1);$i++)
									{
										$pathtov =$res1[$i]['Lesson'][2];
										
											//../assests/video/msds.mp4
										//$pathtov = str_replace("/","@",$pathtov);
										//$pathtov = str_replace(".","_",$pathtov);
							 echo "<a id = 'qw' href = '#' onclick = 'asd(".$i.")'><li style = 'font-size:15px' class='Title' data-toggle='modal' data-target='#Lesson'>".$res1[$i]['Lesson'][0]."</li></a>";
							$new=$res1[$i]['Lesson'][0];
							
										
									}
									

									?>

								</ul>
								
			</div>
		 </div>
			
			
	
		<div class="col-md-6" style="margin-right: 0px";>
			<video id ="dvi" width=100% height=auto controls>
			 <source id ="dsvi" src="<?php echo $pathInitial; ?>" type="Video/mp4">
 			 </video>
 			 
				<div class="thumbnail" >
				<p style="font-size: 20px;">Description:
				</p>

				<p style="font-size: 17px;">
					<?php print_r($res1[0]['Lesson'][1]); ?>
				</p>
				</div>

			
        </div>
			        <div class="col-md-4" style="">
						<div class="thumbnail hoverd">
						<form method="post" action="doAddContents.php">
						  <textarea name = "valt"></textarea>
						<input type ="submit" name="save" value ="submit">
						</form>
					</div>
					</div>

					<div class="" style="font-size: 18px;">
						<a href="awe/examples/marker_ar/index4.html">AR1</a><br>
						<a href="awe/examples/marker_ar/index3.html">AR2</a><br>
						<a href="awe/examples/marker_ar/index2.html">AR3</a><br>
						<a href="awe/examples/marker_ar/index1.html">AR4</a><br>
						<a href="awe/examples/basic/ar.html">AR5</a><br>
					</div>
			
  		</div>		
	 </div>

   









<div class="row" style="margin-left: 15px;">
					
			<div class="col-md-12" style="border: 1px solid #ddd;  padding-top: 15px; padding-bottom: 15px;">
					<h3 class="text-align-center">Related Courses</h3>
					<div class="row margin-top-30px" id="related-course">
						
						<a class="thumbnail-anchor" data-toggle="modal" data-target="#Course" onclick="Set('<?php print_r($array_of_results10[0]['Title'])?>','<?php print_r($array_of_results10[0]['Description']) ?>')">
					 <div class="col-sm-6 col-md-3">
					    <div class="thumbnail">
					      <div class="overflow-hidden relative-pos"><img src=../<?php print_r($array_of_results10[0]['Img_Path']) ?> alt="..." class="img-dim"></div>
					      <div class="caption">
					        <!-- <h4 class="textcolor ellipsis_oneline">Satellite Oceanography</h4> -->
					        <h4 class="textcolor ellipsis_oneline"><?php print_r($array_of_results10[0]['Title']) ?></h4>
					        <p class="textcolor ellipsis_oneline"><?php print_r($array_of_results10[0]['Prof_Assigned']) ?> <span class="alttextcolor"> | <?php print_r($array_of_results10[0]['Start_Date']) ?> </span></p>
					        
					      </div>
					    </div>
					 </div></a>

					 <a class="thumbnail-anchor" data-toggle="modal" data-target="#Course" onclick="Set('<?php print_r($array_of_results10[1]['Title'])?>','<?php print_r($array_of_results10[1]['Description']) ?>')">
					 <div class="col-sm-6 col-md-3">
					    <div class="thumbnail">
					      <div class="overflow-hidden relative-pos"><img src=../<?php print_r($array_of_results10[1]['Img_Path']) ?> alt="..." class="img-dim"></div>
					      <div class="caption">
					        <!-- <h4 class="textcolor ellipsis_oneline">Satellite Oceanography</h4> -->
					        <h4 class="textcolor ellipsis_oneline"><?php print_r($array_of_results10[1]['Title']) ?></h4>
					        <p class="textcolor ellipsis_oneline"><?php print_r($array_of_results10[1]['Prof_Assigned']) ?> <span class="alttextcolor"> | <?php print_r($array_of_results10[1]['Start_Date']) ?> </span></p>
					        
					      </div>
					    </div>
					 </div></a>

<a class="thumbnail-anchor" data-toggle="modal" data-target="#Course" onclick="Set('<?php print_r($array_of_results10[2]['Title'])?>','<?php print_r($array_of_results10[2]['Description']) ?>')">
					 <div class="col-sm-6 col-md-3">
					    <div class="thumbnail">
					      <div class="overflow-hidden relative-pos"><img src=../<?php print_r($array_of_results10[2]['Img_Path']) ?> alt="..." class="img-dim"></div>
					      <div class="caption">
					        <!-- <h4 class="textcolor ellipsis_oneline">Satellite Oceanography</h4> -->
					        <h4 class="textcolor ellipsis_oneline"><?php print_r($array_of_results10[2]['Title']) ?></h4>
					        <p class="textcolor ellipsis_oneline"><?php print_r($array_of_results10[2]['Prof_Assigned']) ?> <span class="alttextcolor"> | <?php print_r($array_of_results10[2]['Start_Date']) ?> </span></p>
					        
					      </div>
					    </div>
					 </div></a>

					<a class="thumbnail-anchor" data-toggle="modal" data-target="#Course" onclick="Set('<?php print_r($array_of_results10[3]['Title'])?>','<?php print_r($array_of_results10[3]['Description']) ?>')">
					 <div class="col-sm-6 col-md-3">
					    <div class="thumbnail">
					      <div class="overflow-hidden relative-pos"><img src=../<?php print_r($array_of_results10[3]['Img_Path']) ?> alt="..." class="img-dim"></div>
					      <div class="caption">
					        <!-- <h4 class="textcolor ellipsis_oneline">Satellite Oceanography</h4> -->
					        <h4 class="textcolor ellipsis_oneline"><?php print_r($array_of_results10[3]['Title']) ?></h4>
					        <p class="textcolor ellipsis_oneline"><?php print_r($array_of_results10[3]['Prof_Assigned']) ?> <span class="alttextcolor"> | <?php print_r($array_of_results10[3]['Start_Date']) ?> </span></p>
					        
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

	<script type="text/javascript">

   function asd(df)
   {
   	
   	
var videocontainer = document.getElementById('dvi');
var videosource = document.getElementById('dsvi');

var array1 = <?php echo json_encode($res1); ?>;

var x = array1[df]['Lesson'][2];
var value1 = "../"+x;
lessoname = array1[df]['Lesson'][0];


<?php $_session["lectureName"]=lessoname?>

var videobutton = document.getElementById("qw");
 /*
videobutton.addEventListener("click", function(event) {
    videocontainer.pause();
    videosource.setAttribute('src', value1);
    videocontainer.load();
    //videocontainer.setAttribute('poster', newposter); //Changes video poster image
    videocontainer.play();4
}, false);
*/
 videocontainer.pause();
    videosource.setAttribute('src', value1);
    videocontainer.load();
    //videocontainer.setAttribute('poster', newposter); //Changes video poster image
    videocontainer.play();
 
   }



   </script>

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

     <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
    
    

<?php
$con = new MongoClient();

	$db = $con->ICMAM;

       // session_start();
        $collection1 = $db->notes;
// $collection2 = $db->Lessons;
// $collection3 = $db->users;

     
        //$Password = $_POST['Password'];
		if(isset($_POST['save']))
		{
		//$user = $collection->findOne(array('Username'=>'Priya'));
			echo "Hello";
			exit;
	//$lesson_name=$new;
		 $notes = $_POST['valt'];
		 		 //$insert_data = array('valt'=>$note);   
		 		     // 'Username'=>$user,
		 		 $query=array("Username"=>"Priya","Title"=>array('valt'=>$notes));
               // $new=>$lesson_name,
				//'valt'=>$note);
			$collection1->insert($query);
}
		 



?>



























  </body>
</html>
