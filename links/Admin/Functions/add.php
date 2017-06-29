
<?php 


session_start();

$Title = $_GET['Title'];
// echo $Title;

// exit;

if(isset($_POST["submit"]))
{

$name= $_FILES['file']['name'];


$tmp_name= $_FILES['file']['tmp_name'];

$position= strpos($name, ".");

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);
 $upload=1;

if (isset($name)) {

$path= '../../../assets/Uploads/Videos/';
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
		
		$collection = $db->videos;

		//echo $name;
		//exit;

		$path_upload = '../../../assets/Uploads/Videos/'.$name;
		//echo $path_upload;
		//exit;

		$insert_data = array('v_path'=>$path_upload);

		//print_r($insert_data);

		//exit;
		$collection->insert($insert_data);

		$url = '../Lessons.php?Title='.$Title;

		header('location: '.$url);
		}
	
}
?>
