<!DOCTYPE html>
<?php
   include('session.php');
   if($_SERVER["REQUEST_METHOD"] == "POST" &&isset($_POST['submit'])) {  
      $old = mysqli_real_escape_string($con,$_POST['old']); 
      $new = mysqli_real_escape_string($con,$_POST['new']); 
      $cnew = mysqli_real_escape_string($con,$_POST['cnew']);  
      $sql = "SELECT * FROM hackathon WHERE id = '$id'";
      if(!mysqli_query($con,$sql)){
	       die('Error: ' . mysqli_error($con));
        }
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $password=$row['password'];
      if($old!=$password){
        echo "<h1 style=\"color:white;\">Your Old password is wrong.</h1>";   
      }
      else{
          if($new!=$cnew)
            echo "<h1 style=\"color:white;\">Your new passwords doesn't match.</h1>";   
          else{
              $sql="UPDATE hackathon SET password='$new' WHERE id = '$id'";
              if(!mysqli_query($con,$sql)){
	            die('Error: ' . mysqli_error($con));
              }
              else{
                  echo "<h1 style=\"color:white;\">Your password has been changed.</h1>";  
              }
          }
      }   
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
      <div class="card-header">Change Password</div>
      <div class="card-body">
        <div class="text-center mt-4 mb-5">
          <h4>Change Password</h4>
        </div>
        <form method="post" action="">
          <div class="form-group">
              <label>Old Password</label>  
            <input class="form-control"  type="password" placeholder="Enter your old password" name="old" required>
          </div>
          <div class="form-group">
              <label>New Password</label>  
            <input class="form-control"  type="password" placeholder="Enter your old password" name="new" required>
          </div>
          <div class="form-group">
              <label>Confirm New Password</label>  
            <input class="form-control"  type="password" placeholder="Enter your old password" name="cnew" required>
          </div>    
          <button class="btn btn-primary btn-block" type="submit" name="submit">Change Password</button>
        </form>
          <div class="text-center">
          <a class="d-block small mt-3" href="home.php">Back To Home Page</a>
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
