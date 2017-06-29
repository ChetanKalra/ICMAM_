<?php


  $con = new MongoClient();

  $db = $con->ICMAM;
  $collection=$db->Assignment;

  $Question=$_POST['Question'];
    
    $Answer=$_POST['Answer'];

    $a = $_GET['Question']+1;
    $c = $a-1;
    $b = $_GET['Exam'];
    //echo $b;
    //echo $a;

    $query = $collection->update(array('Assignment Title'=>$b),array('$set'=>array('Question'.$c=>array('Question'=>$Question,'Answer'=>$Answer))),array('upsert'=>false));


  if(isset($_POST['T_Submit']))
  {
    
    //db.users.update({'Username':'Rahul'}, {$set: {"Key":"Value"}}, false, false)
    // exit;
    header('location: '.'../Assignment_admin.php?Question='.$a.'&Exam='.$b);
    
  }

  if(isset($_POST['Final_T_Submit']))
  {
    header('location: '.'../../Dashboard.php?Final Submission');
  }

?>