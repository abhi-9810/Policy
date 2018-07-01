<?php
include('../session.php');
$temp="../Profile/profile_".$intern_id.".jpg";
if(isset($_POST['chat'])){
   $type="admin";
   $chat=$_POST['chat'];
   $chat = mb_ereg_replace("'","\'", $chat);    
}
if(isset($_POST['chat1'])){
   $type="mentor_".$mentor_id;
   $chat=$_POST['chat1'];
   $chat = mb_ereg_replace("'","\'", $chat);    
}
$intern_chat="intern_".$intern_id;
$sql="INSERT INTO policy_chat(to1,from1,chat,seen,currenttime) VALUES ('$intern_chat','$type','$chat',0,Now())";
mysqli_query($con,$sql);
?>