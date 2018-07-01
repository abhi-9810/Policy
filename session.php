<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $db='internship';
   $error="";
   $con = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}
   session_start();
   $username=$_SESSION['login_user'];
   $sql="SELECT * FROM policy_interns WHERE email='$username'";
   $result=mysqli_query($con,$sql);
   $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
   $email=$row['email'];
   $phase=$row['current_phase'];
   $name=$row['name'];
   $intern_id=$row['intern_id'];
   $contact=$row['contact'];
   $imgLink=$row['img'];
   $forms=$row['forms'];
   $sql="SELECT * FROM policy_mentor_allocation WHERE intern_id='$intern_id'";
   $result=mysqli_query($con,$sql);
   $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
   $mentor_id=$row['mentor_id'];
   $sql="SELECT * FROM policy_mentors WHERE mentor_id='$mentor_id'";
   $result=mysqli_query($con,$sql);
   $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
   $mentor=$row['name'];
   $mentor_img=$row['img'];
   $_SESSION['msgUpdate'] = "" ;
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
   }
?>