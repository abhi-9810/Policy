<?php
   $dbhost = 'localhost';
   $dbuser = 'irsciitd16';
   $dbpass = 'irsc2016';
   $db='internships_irsc';
   $error="";
   $con = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}
   session_start();
   $username=$_SESSION['login_user'];
   $sql="SELECT * FROM policy_interns";
   $result=mysqli_query($con,$sql);
   $count=mysqli_num_rows($result);
   $interns = array_fill(0, $count, 1);
   $names =  array_fill(0, $count, "temp");
   $i=0;
   while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
       $interns[$i]=$row['intern_id'];
       $names[$i]=$row['name'];
       $i++;
   }
   //print_r($names);
   $_SESSION['msgUpdate'] = "" ;
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
   }
?>