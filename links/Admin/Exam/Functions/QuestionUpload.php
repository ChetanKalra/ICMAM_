<?php


  $con = new MongoClient();

  $db = $con->ICMAM;
  $collection=$db->Papers;

  $count = $_GET['Count'];

  if(isset($_POST['Submit']))
  {
    $Question=$_POST['Question'];
    $Option_1=$_POST['Option_1'];
    $Option_2=$_POST['Option_2'];
    $Option_3=$_POST['Option_3'];
    $Option_4=$_POST['Option_4'];
    $Answer=$_POST['Answer'];

    $a = $_GET['Question']+1;
    $c = $a-1;
    $b = $_GET['Exam'];
    //echo $b;

    $query = $collection->update(array('Exam Title'=>$b),array('$set'=>array('Question'.$c=>array('Question'=>$Question,'Option 1'=>$Option_1,'Option 2'=>$Option_2,'Option 3'=>$Option_3,'Option 4'=>$Option_4,'Answer'=>$Answer))),array('upsert'=>false));

    //db.users.update({'Username':'Rahul'}, {$set: {"Key":"Value"}}, false, false)
    // exit;
    header('location: '.'../Questions.php?Question='.$a.'&Exam='.$b.'&Count='.$count);
    
  }

?>