<?php
include('session.php');
$type="pics";
$sql="SELECT * FROM  policy_phase1 WHERE intern_id='$intern_id'";
if(!mysqli_query($con,$sql)){
	   die('Error: ' . mysqli_error($con));
    }
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);                
$count=$row['pics'];
$count++;
//$count=5;
$sql="UPDATE policy_phase1 SET pics='$count' WHERE intern_id=$intern_id"; 
if(!mysqli_query($con,$sql)){
	   die('Error: ' . mysqli_error($con));
    }
$img="Location_Pics/policy_".$type."_".$intern_id."_".$count;
$rawData = $_POST['imgBase64'];
$filteredData = explode(',', $rawData);
$unencoded = base64_decode($filteredData[1]);
$fp = fopen($img.'.png', 'w');
fwrite($fp, $unencoded);
fclose($fp);
?>;