<!DOCTYPE html>
<?php   
include('session.php');
if($_SERVER["REQUEST_METHOD"] == "POST"&&isset($_POST['submit'])) {
      $problem=$_POST['problem'];
      $location=$_POST['location'];
      $problem = mb_ereg_replace("'","\'", $problem);
      $query="";   
      $query ="UPDATE policy_phase1 SET location='$location',problem='$problem' WHERE intern_id='$intern_id'";
        if(!mysqli_query($con,$query)){
	       die('Error: ' . mysqli_error($con));
        }
        else{
            //echo "<h1 style=\"color:white;float:right; \" class=\"navbar-brand\">Details Updated Sucessfully.</h1>"; 
        }
  }
$sql="SELECT * FROM policy_phase1 WHERE intern_id='$intern_id'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $location1=$row['location'];
    $problem1=$row['problem'];    
    $approved=$row['approved'];
    $approval="Approved";
    if($approved==0)
        $approval="Not Approved Yet";
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Policy Portal</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script src="sweetalert.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>       
  <link rel="stylesheet" type="text/css" href="sweetalert.css">           
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="home.php">Policy Portal</a>
      <p class="navbar-brand">Welcome <?php echo $name;?></p>  
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="home.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="team.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Team Details &amp; Problem Statement</span>
          </a>
        </li>
        <?php if($phase=="2"){?>  
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
         <a class="nav-link" href="form.php">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Create Forms for Survey</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
         <a class="nav-link" href="form_take_response.php">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Take Response</span>
          </a>
        </li>  
        <?php } if($phase!="1"){?> 
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
         <a class="nav-link" href="form_view.php">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">View Responses</span>
          </a>
        </li> 
          <?php }if($phase>=3){?>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="Chat/">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Chat With Mentors</span>
          </a>
        </li>
          <?php } ?>
          
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="report.php">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Upload Phase Report</span>
          </a>
          </li><?php  if($phase=="5"){?>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Get Your Certificate</span>
          </a>
          </li><?php }?>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Notifications
              <span class="badge badge-pill badge-warning">1 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Notifications:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                  
                <?php
                       $img="http://road-safety.co.in/isafe1/admin/v1/general.png";
                       $sql = "SELECT * FROM policy_notification ORDER BY currenttime DESC";
                       $result = $con->query($sql);
                       $i=0;
                       if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                              $i++;
                              $temp=$row['sub']."(".substr($row['currenttime'],0,10).")";
                              ?>
                              <strong><i class="fa fa-long-arrow-up fa-fw"></i><?php echo $temp;?></strong>
                              <div class="dropdown-message small"><hr /></div>
                            <?php
                              if($i==3)
                               break;
                           }
                           
                               
                        } 
                       else {
                           ?>
                          <strong><i class="fa fa-long-arrow-up fa-fw"></i>No results</strong>
                              <div class="dropdown-message small"><hr /></div>
                          <?php
                        }
                ?>  
                 
              </span>
              
              
            </a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav> 
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Profile</h1>
                     <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="">
                                        <div class="form-group">
                                            <label>Name </label>
                                            <input class="form-control" name="teamname" value="<?php echo $name;?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Email </label>
                                            <input class="form-control" name="m2" value="<?php echo $email;?>" placeholder="Enter text" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact</label>
                                            <input class="form-control" name="email3" value="<?php echo $contact;?>" placeholder="Enter text" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Approval</label>
                                            <input class="form-control" name="approval" value="<?php echo $approval;?>" placeholder="Enter text" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Location</label>
                                            <input class="form-control" id="location" name="location" value="<?php echo $location1;?>" placeholder="Enter text" required>
                                            <button id="loc1">Get Location</button> 
                                        </div>
                                        <script type="text/javascript">
                                            $('#loc1').on('click', function(e) {
                                                e.preventDefault();
                                                console.log("qwerty");
                                                if (navigator.geolocation) {
                                                    console.log('Geolocation is supported!');
                                                }
                                                else {
                                                    console.log('Geolocation is not supported for this Browser/OS version yet.');
                                                }
                                                var startPos;
                                                navigator.geolocation.getCurrentPosition(function(position) {
                                                    startPos = position;
                                                    console.log("qwerty1");
                                                    var temp=startPos.coords.latitude+","+startPos.coords.longitude;
                                                    console.log(temp);
                                                    document.getElementById('location').value = temp;
                                                });
                                            });
                                        </script>
                                        <div class="form-group">
                                            <label>Problem Statement *</label>
                                            <textarea name="problem" class="form-control" cols="70" rows="10"  required><?php echo htmlspecialchars($problem1);?></textarea>
                                        </div>
                                    <?php    
                                        if($approved==0){?>
                                          <div class="form-group">
                                            <button type="submit" name="submit" > SAVE  DETAILS </button>
                                           </div>
                                           <div class="form-group">
                                            <input type="button" value="Take Location Clippings" onclick="window.location.href='camera_pics.php';"/>   
                                           </div>
                                            <div class="form-group">
                                            <input type="button" value="Take Newspaper Clippings" onclick="window.location.href='camera_news.php';"/>   
                                           </div>
                                       <?php }?>
                                        <div class="form-group">
                                            <input type="button" value="View Clippings" onclick="window.location.href='clippings.php';"/>   
                                           </div>
                                    </form>
                                   
                                   
                                </div>
                                
                        <div class="col-lg-6">        
                           <form action="teamimgupload.php" method="post" enctype="multipart/form-data">
                                    Team Image:
                                <div class="form-group">
                                    <?php 
                                        if ((strcmp($imgLink,"") == 0) || ($imgLink == NULL)) {
                                            echo "<img src=\"Profile/teamimg.png\" height=\"250px\" id=\"output_image\" width=\"70%\">" ;
                                        } 
                                        else{
                                          echo "<img src='$imgLink' height=\"250px\" id=\"output_image\"   width=\"70%\">" ;
                                        } 
                                    ?>
                                    <br /><br />
                                    <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" onchange="preview_image(event)" >
                                </div>
                              <div class="form-group">
                                <input type="submit" value="Save Team Image" onclick="showImg2()" name="submit">
                              </div>
                        </form></div>
            </div>
            </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © IRSC 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
      
  </div>
</body>

</html>
