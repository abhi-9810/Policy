<?php
 include('session.php');
  if($_SERVER["REQUEST_METHOD"] == "POST") {
        $type=$_POST['type'];
        if($type=="fir")
          $uploaddir = "submissions/FIR/intern_".$intern_id."_fir";
        else
          $uploaddir = "submissions/intern_".$intern_id."_phase_".$phase;
        $uploadfile = $uploaddir .".pdf";
        if(file_exists($uploadfile))
        {
            if(unlink($uploadfile)){
                 echo "<h1 style=\"color:white;float:right;\">Deleted.</h1>";
            }
            else
            {
                 echo "<h1 style=\"color:white;float:right;\">Couldn't be deleted.</h1>";
            }
        }
     if($type=="fir")  
       header('Location: fir.php');
     else
       header('Location: report.php');     
  }
        
?>