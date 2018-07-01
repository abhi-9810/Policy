<!DOCTYPE html>
<?php
 $con = new mysqli("localhost", "irsciitd16", "irsc2016","internships_irsc"); 
if($_SERVER["REQUEST_METHOD"] == "POST" &&isset($_POST['submit'])) {  
      $myusername = mysqli_real_escape_string($con,$_POST['username']); 
      $id=$myusername;
      $sql = "SELECT * FROM policy_interns WHERE email = '$myusername'";
      if(!mysqli_query($con,$sql)){
	       die('Error: ' . mysqli_error($con));
        }
      echo $sql;
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $email1=$row['email'];
      $password=$row['password'];
      $to = $email1;
      $subject = "IRSC Policy | Forget Password " . $id;
      $txt = "Your Password is: ".$password;
      $headers = "From: policy@road-safety.co.in" ;
      if(mail($to,$subject,$txt,$headers)){
          echo "<h1 style=\"color:white;\">A mail has been sent check your emailid</h1>"; 
      }
      else{
         echo "<h1 style=\"color:white;\">Couldn't sent mail,check your userid</h1>";  
      }
     $con -> close() ;
   }?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Hackathon</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Forget Password</div>
      <div class="card-body">
        <div class="text-center mt-4 mb-5">
          <h4>Forgot your password?</h4>
          <p>Enter your userid and we will send your password on your registered email id.</p>
        </div>
        <form method="post" action="">
          <div class="form-group">
            <input class="form-control"  type="text" placeholder="Enter your userid" name="username" required>
          </div>
          <button class="btn btn-primary btn-block" type="submit" name="submit">Forget Password</button>
        </form>
        <div class="text-center">
          <a class="d-block small" href="index.php">Login Page</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
