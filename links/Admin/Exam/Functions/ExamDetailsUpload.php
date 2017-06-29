
<?php


  $con = new MongoClient();

  $db = $con->ICMAM;

  if(isset($_POST['submit']))
  {
    $Course_Title=$_POST['Course_Title'];
    $Exam_Title=$_POST['Exam_Title'];
    $NoOfQuestions=$_POST['NoOfQuestions'];
    $Date=$_POST['Date'];
    $Start_Time=$_POST['Start_Time'];
    $End_Time=$_POST['End_Time'];

    $collection1=$db->Exam_Details;

     $query = $collection1->insert(array("Course Title"=>$Course_Title,"Exam Title"=>$Exam_Title,"NoOfQuestions"=>$NoOfQuestions,"Date"=>$Date,"Start Time"=>$Start_Time,"End Time"=>$End_Time));

    $collection2=$db->Papers;

    $query1 = $collection2->insert(array("Exam Title"=>$Exam_Title));

    header('location: '.'../Questions.php?Question=1&Exam='.$Exam_Title.'&Count='.$NoOfQuestions);
    
  }

?>