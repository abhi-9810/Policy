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
   $sql="SELECT * FROM policy_mentors WHERE email='$username'";
   $result=mysqli_query($con,$sql);
   $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
   $email=$row['email'];
   $name=$row['name'];
   $mentor_id=$row['mentor_id'];
   $contact=$row['contact'];
   $imgLink=$row['img'];
   $sql="SELECT * FROM policy_mentor_allocation WHERE mentor_id='$mentor_id'";
   $result=mysqli_query($con,$sql);
   $count=mysqli_num_rows($result);
   $interns = array_fill(0, $count, 1);
   $names =  array_fill(0, $count, "temp");
   $i=0;
   while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
       $interns[$i]=$row['intern_id'];
       $sql="SELECT name FROM policy_interns WHERE intern_id='$interns[$i]'";
       $result1=mysqli_query($con,$sql);
       $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
       $names[$i]=$row1['name'];
       $i++;
   }
   //print_r($names);
   $_SESSION['msgUpdate'] = "" ;
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
   }
?>