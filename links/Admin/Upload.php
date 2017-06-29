
<?php 


session_start();

$Title = $_GET['Title'];
// echo $Title;

// exit;

if(isset($_POST["AddCourse"]))
{

$name= $_FILES['file']['name'];


$tmp_name= $_FILES['file']['tmp_name'];

$position= strpos($name, ".");

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);
 $upload=1;

if (isset($name)) {

$path= '../../assets/Images/';

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


//$v_path=Uploads/name/$name;
if($upload==1)
{


		$con = new Mongo("localhost");
		
		$db = $con->ICMAM;
		
		$collection = $db->courses;

		//echo $name;
		//exit;

		$path_upload = 'assets/Images/'.$name;
		//echo $path_upload;
		//exit;

		$insert_data = array('Img_Path'=>$path_upload);
		//print_r($insert_data);

		//exit;
		//$collection->insert($insert_data);

		$url = 'Courses.php?Title='.$Title;

		}
	



		$CourseTitle=$_POST['CourseTitle'];
		
		$CourseDes=$_POST['CourseDes'];
		
		$ProfessorAss=$_POST['ProfessorAss'];

		$Duration = $_POST['Duration'];

		$Start_Date = $_POST['Start_Date'];
		
		
	
	if(true)
	{
		$con = new MongoClient();
		if($con)
		{
			$db = $con->ICMAM;

			$addcourse = $db->courses;
			
			$qry = array("Title" => $CourseTitle);
			$users = 0;
			$date1 = date("d/m/Y");
			$doc = $addcourse->findOne($qry);
				
			 	if(!empty($doc))
				{
					$flag = false;
				}
				else
				{
					$query=array("Title" => $CourseTitle,"Description" => $CourseDes, "Prof_Assigned"=>$ProfessorAss, "Duration"=>$Duration, "Start_Date"=>$Start_Date, "Img_Path"=>$path_upload, "insert_date"=> $date1,"UsersRegistered"=>$users);
					
					$addcourse->insert($query);
					$flag = true;
				}

		}	
		else
		{
			die("Error While Updating");
		} 



		if($flag == true)
		{
			header('location: '.$url);
			// header('location: '.'Courses.php');
		}
	}

}

	
?>