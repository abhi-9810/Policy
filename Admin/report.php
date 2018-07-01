<!DOCTYPE html>
<?php
$intern_id=$_GET['id'];
include('session.php');
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
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script src="sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="sweetalert.css">    
  <script type="text/javascript">
    function Form11(){
    swal({
      title: "Are You sure to delete!!",
      text: "",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes!",
      cancelButtonText: "No!",
      closeOnConfirm: false,
      closeOnCancel: false
    },
      function(isConfirm){
        if (isConfirm) {
          Redirect();               
        }else {
	       swal("Cancelled", "", "error");
        }
     });
    }
 </script>
        <script type="text/javascript">
           function Redirect(){
             document.getElementById('form1').submit();
           }
        </script>       
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="home.php">Policy Portal</a>
      <p class="navbar-brand">Welcome Admin</p>  
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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Team Details &amp; Problem Statement</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <?php 
                 $i=0;
                 while($i<$count){
                   $link="team.php?id=".$interns[$i];
                  ?>
                  <li>
                     <a href="<?php echo $link;?>"><?php echo $names[$i];?></a>
                  </li>
              <?php $i++;}?>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents5" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">View Clippings</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents5">
            <?php 
                 $i=0;
                 while($i<$count){
                   $link="clippings.php?id=".$interns[$i];
                  ?>
                  <li>
                     <a href="<?php echo $link;?>"><?php echo $names[$i];?></a>
                  </li>
              <?php $i++;}?>
          </ul>
        </li>     
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents1" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">View Form Responses</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents1">
            <?php 
                 $i=0;
                 while($i<$count){
                   $link="form_view.php?id=".$interns[$i];
                  ?>
                  <li>
                     <a href="<?php echo $link;?>"><?php echo $names[$i];?></a>
                  </li>
              <?php $i++;}?>
          </ul>
        </li>  
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">View Uploaded Reports</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents2">
            <?php 
                 $i=0;
                 while($i<$count){
                   $link="report.php?id=".$interns[$i];
                  ?>
                  <li>
                     <a href="<?php echo $link;?>"><?php echo $names[$i];?></a>
                  </li>
              <?php $i++;}?>
          </ul>
        </li> 
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents111" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Queries</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents111">
            <?php 
                 $i=0;
                 while($i<$count){
                   $link="query.php?id=".$interns[$i];
                   $sql="SELECT * FROM policy_query WHERE addedby='$interns[$i]' AND solved='0'";
                   $result=mysqli_query($con,$sql);
                   $count1=mysqli_num_rows($result);     
                  ?>
                  <li>
                    <?php if($count1>0){?>  
                         <a href="<?php echo $link;?>" style="color:red;"><?php echo $names[$i];?></a>
                      <?php }
                    else{?>
                        <a href="<?php echo $link;?>"><?php echo $names[$i];?></a>
                      <?php }?>  
                  </li>
              <?php $i++;}?>
          </ul>
        </li>    
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
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
        <li class="breadcrumb-item active">Report</li>
      </ol>
        <h1>View Reports</h1>
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <br />
                                    <?php
                                    $filename="../submissions/intern_".$intern_id."_phase_1.pdf";
                                        if(file_exists($filename)){?>
                                             <a type="button" href="<?php echo $filename;?>">&nbsp;&nbsp;&nbsp;View File(Phase 1)&nbsp;&nbsp;&nbsp;</a>
                                          <br /><br /><?php }
                                   $filename="../submissions/intern_".$intern_id."_phase_2.pdf";
                                        if(file_exists($filename)){?>
                                             <a type="button" href="<?php echo $filename;?>">&nbsp;&nbsp;&nbsp;View File(Phase 2)&nbsp;&nbsp;&nbsp;</a>
                                          <br /><br /><?php }
                                   $filename="../submissions/intern_".$intern_id."_phase_3.pdf";
                                        if(file_exists($filename)){?>
                                             <a type="button" href="<?php echo $filename;?>">&nbsp;&nbsp;&nbsp;View File(Phase 3)&nbsp;&nbsp;&nbsp;</a>
                                          <br /><br /><?php }
                                   $filename="../submissions/intern_".$intern_id."_phase_4.pdf";
                                        if(file_exists($filename)){?>
                                             <a type="button" href="<?php echo $filename;?>">&nbsp;&nbsp;&nbsp;View File(Phase 4)&nbsp;&nbsp;&nbsp;</a>
                                          <br /><br /><?php }
                                   $filename="../submissions/intern_".$intern_id."_phase_5.pdf";
                                        if(file_exists($filename)){?>
                                             <a type="button" href="<?php echo $filename;?>">&nbsp;&nbsp;&nbsp;View File(Phase 5)&nbsp;&nbsp;&nbsp;</a>
                                          <br /><br /><?php }?>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                  <h3>Instructions for Viewing Report</h3><br>
                                   <p>
                                   1. It contains the submitted report.<br><br>
                                   <br><br>
                                 </p>
                               
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
           
            <!-- /.row -->
       
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
