
<?php 


session_start();

$Title = $_GET['Title'];
// echo $Title;

// exit;

if(isset($_POST["upload-lesson"]))
{

$name= $_FILES['file']['name'];


$tmp_name= $_FILES['file']['tmp_name'];

$position= strpos($name, ".");

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);
 $upload=1;

if (isset($name)) {

$path= '../../assets/Videos/';

if (empty($name))
{
echo "Please choose a file";
$upload=0;
}

else if (!empty($name)){
if (($fileextension !== "mp4") && ($fileextension !== "ogg") && ($fileextension !== "webm"))
{
echo "The file extension must be .mp4, .ogg, or .webm in order to be uploaded";
$upload=0;
}


else if (($fileextension == "mp4") || ($fileextension == "ogg") || ($fileextension == "webm"))
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
		
		$collection = $db->Lessons;

		$path_upload = 'assets/Videos/'.$name;

		$LessonTitle=$_POST['LessonTitle'];
		
		$LessonDes=$_POST['LessonDes'];

		// $query = array("Title"=>$Title, array("Lesson"=>($LessonTitle,$LessonDes,$path_upload)));
		$query = array("Title"=>$Title, "Lesson"=>array($LessonTitle,$LessonDes,$path_upload));

		$a =$collection->insert($query);

		if($a)
		{
			header('location: '.'Lessons.php?Title='.$Title);

		}

		else{
			die("Unable to process");
		}

}

	}
?>