
<?php


  $con = new MongoClient();

  $db = $con->ICMAM;

  if(isset($_POST['submit']))
  {
    $Lesson_Title=$_POST['Lesson_Title'];
    $Assignment_Title=$_POST['Assignment_Title'];
    //$NoOfQuestions=$_POST['NoOfQuestions'];
    $Total_Marks = $_POST['Total_Marks'];
    //$Date=$_POST['Date'];
    $Start_Date=$_POST['Start_Date'];
    $End_Date=$_POST['End_Date'];

    $collection1=$db->Assignment_Details;

    $query = $collection1->insert(array("Lesson Title"=>$Lesson_Title,"Assignment Title"=>$Assignment_Title,"Start Date"=>$Start_Date,"End Date"=>$End_Date));

    $collection2=$db->Assignment;

    $query1 = $collection2->insert(array("Assignment Title"=>$Assignment_Title));

    header('location: '.'../Assignment_admin.php?Question=1&Exam='.$Assignment_Title);
    
  }

?>