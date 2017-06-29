     <?php

        if(isset($_POST['result']))
        {
          $collection3 = $db->Response;

          $query5 = $collection3->find(array("Flag"=>"true"));

          $a = $collection3->count($query5);

          echo $a;
          
          exit; 
        }

      ?>