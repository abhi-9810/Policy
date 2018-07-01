<?php
include('../../session.php');
$type=$_GET['q'];
$sql="SELECT * FROM policy_chat where from1='$type' and seen=0";
//echo $sql;
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
	echo "<br />";
	echo $row['chat'];
	$id=$row['id'];
	$sql="UPDATE policy_chat SET seen=1 where id='$id'";
	//echo $sql;
	mysqli_query($con,$sql);
}
?>