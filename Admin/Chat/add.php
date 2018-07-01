<?php
include('../session.php');
$intern_id=$_POST['id'];
if(isset($_POST['chat1'])){   
   $type="mentor_".$mentor_id;
   $chat=$_POST['chat1'];
   $chat = mb_ereg_replace("'","\'", $chat);    
}
$intern_chat="intern_".$intern_id;
$sql="INSERT INTO policy_chat(to1,from1,chat,seen,currenttime) VALUES ('$type','$intern_chat','$chat',0,Now())";
//echo $sql;
mysqli_query($con,$sql);
?>