<?php
 include('session.php');
  if($_SERVER["REQUEST_METHOD"] == "POST") {
        $file=$_POST['type'];
        $count=$_POST['count'];
        if(file_exists($file))
        {
            if(unlink($file)){
                 echo "<h1 style=\"color:white;float:right;\">Deleted.</h1>";
            }
            else
            {
                 echo "<h1 style=\"color:white;float:right;\">Couldn't be deleted.</h1>";
            }
        }
       header('Location: audio_video.php');     
  }
        
?>