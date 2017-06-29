<?php

session_start();
if(isset($_POST['Save_Edit']))

	{
		
$name= $_FILES['file']['name'];


$tmp_name= $_FILES['file']['tmp_name'];

$position= strpos($name, ".");

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);

$upload=0;

if (isset($name)) {

$path= '../../../assets/Images/';

if (empty($name))
{
echo "Please choose a file";
$upload=0;
}
else if (!empty($name)){
if (($fileextension !== "png") && ($fileextension !== "jpg") && ($fileextension !== "ico"))
{
echo "The file extension must be .png, .jpg, or .ico in order to be uploaded";
$upload=0;
}


else if (($fileextension == "png") || ($fileextension == "jpg") || ($fileextension == "ico"))
{
if (move_uploaded_file($tmp_name, $path.$name)) {
echo 'Uploaded!';
$upload=1;
}
}
}
}

if($upload==1)
{

		$path_upload = 'assets/Images/'.$name;

}
//exit;
	
		$CourseTitle=$_POST['CourseTitle'];
		
		$CourseDes=$_POST['CourseDes'];
		
		$Professor=$_POST['Professor'];

		$CourseDuration = $_POST['Duration'];
		
		$Start_Date = $_POST['Start_Date'];

		$con = new MongoClient();
		if($con)
		{
			$db = $con->ICMAM;

			$edit = $db->courses;

			//echo $edit;
			
			if($upload==0)
			{
				$query = array('$set'=> (array("Title" => $CourseTitle,"Description" => $CourseDes,"Prof_Assigned"=>$Professor, "Duration"=>$CourseDuration, "Start_Date"=>$Start_Date)));
			}
			else
			{
				$query = array('$set'=> (array("Title" => $CourseTitle,"Description" => $CourseDes,"Prof_Assigned"=>$Professor, "Duration"=>$CourseDuration, "Start_Date"=>$Start_Date, "Img_Path"=>$path_upload)));
			}
					
					//echo $query;
					
					$edit->update(array( "Title" => $CourseTitle),$query,array("upsert" => false));
			 		
			 		//echo "Updated";

			 		header('location: '.'../Courses.php');
				
				
		}	
	}


		

		
	
?>