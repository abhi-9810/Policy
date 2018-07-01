<!DOCTYPE html>
<?php   
include('session.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
      $mentor_id=$_POST['mentor'];
      $intern_id=$_POST['id'];
      $query ="UPDATE policy_mentor_allocation SET mentor_id='$mentor_id' WHERE intern_id='$intern_id'";
        if(!mysqli_query($con,$query)){
	       die('Error: ' . mysqli_error($con));
        }
  }
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
        <li class="breadcrumb-item active">Mentor Allocation</li>
      </ol>
      <div class="row">
        <div class="col-12">
                     <div class="row">
                                <div class="col-lg-12">
                                    <?php 
                                          $sql="SELECT * FROM policy_interns WHERE allocation=1";
                                          $result1=mysqli_query($con,$sql);
                                          ?>
                                    <table class="table table-dark">
                                        <thead>
                                            <th scope="col">Intern</th>
                                            <th scope="col">Mentor</th>
                                            <th scope="col">Change</th>
                                            <th scope="col">Submit</th>
                                        </thead>
                                        <tbody>
                                              <?php 
                                                 while($row = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
                                                   $id=$row['intern_id'];     
                                                   $sql="SELECT policy_mentors.name AS name1 FROM policy_mentors INNER JOIN policy_mentor_allocation ON policy_mentors.mentor_id=policy_mentor_allocation.mentor_id WHERE policy_mentor_allocation.intern_id='$id'";
                                                        
                                                   $r=mysqli_query($con,$sql);
                                                   $r1=mysqli_fetch_array($r,MYSQLI_ASSOC);
                                                   $mentor=$r1['name1'];     
                                                   ?>
                                                   <tr>   
                                                    <form role="form" method="post" action="">   
                                                      <td><?php echo $row['name'];?></td>
                                                      <td><?php echo $mentor;?></td>
                                                      <td>
                                                         <select name="mentor" style="width:200px;" required>
                                                            <option value="">Select...</option> 
                                                            <?php 
                                                                $sql="SELECT * FROM policy_mentors";
                                                                $result=mysqli_query($con,$sql);
                                                                while($row1=mysqli_fetch_array($result,MYSQLI_ASSOC)){ ?>
                                                             <option value="<?php echo $row1['mentor_id'];?>"><p style="color:black;"><?php echo $row1['name'];?></p>
                                                                    </option>
                                                                <?php }?>
                                                         </select>
                                                       </td>
                                                        <td><div class="form-group">
                                                            <input type="hidden" name="id" value="<?php echo $row['intern_id'];?>">
                                                            <button type="submit" name="submit" > CHANGE </button>
                                                        </div></td>    
                                                       </form>    
                                                   </tr>    
                                              <?php }?>
                                        </tbody>
                                    </table>
                                    
                                   
                                   
                                </div>
                                
                        
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
