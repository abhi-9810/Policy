<!DOCTYPE html>
<?php   
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     
  <script type="text/javascript">
    function Display(){
    swal({
      title: "Will Be Updated Soon!",
      text: "",
      type: "warning",
      showCancelButton: false,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Okay!",
      closeOnConfirm: true
    },
      function(isConfirm){
        if (!isConfirm) {
          Redirect();          
      } 
     });
    }
 </script>     
    
    <script>
        fields = 2;
        function addInput() {
            var c=[];
            
            for(var i=1;i<fields;i++){
              var t1="sub1_"+i;    
              c.push(document.getElementById(t1).value);
            }
            var temp = "<br /><label><b>Question"+fields+"</b></label><textarea class='form-control' cols='10' rows='5' name='sub_"+fields+"' id='sub1_"+fields+"' placeholder='Enter Question' value='' required></textarea>";
            console.log(temp);
            document.getElementById('subjective').innerHTML += temp;
           
            for(var i=1;i<fields;i++){  
             var t1="sub1_"+i;    
             document.getElementById(t1).value=c[i-1];    
            }
            fields = fields+ 1;
        }
    </script> 
    <script>
      optional = 1;
        function addInput1() {
            var q=[];
            var o1=[];
            var o2=[];
            var o3=[];
            var o4=[];
            for(var i=1;i<optional;i++){
              var t1="opt1_"+i;    
              q.push(document.getElementById(t1).value);
              var o="opt1_"+i+"_1";
              o1.push(document.getElementById(o).value);
              o="opt1_"+i+"_2";
              o2.push(document.getElementById(o).value);
              o="opt1_"+i+"_3";
              o3.push(document.getElementById(o).value);
              o="opt1_"+i+"_4";
              o4.push(document.getElementById(o).value);    
            }
            
            var temp = "<br /><label><b>Question"+optional+"</b></label><textarea class='form-control' cols='10' rows='5' name='opt_"+optional+"'id='opt1_"+optional+"' placeholder='Enter Question' required></textarea>";
            temp+="<br /><label>Option1</label><input class='form-control' name='opt_"+optional+"_1' id='opt1_"+optional+"_1' placeholder='Enter option1' required>";
            temp+="<br /><label>Option2</label><input class='form-control' name='opt_"+optional+"_2' id='opt1_"+optional+"_2' placeholder='Enter option2' required>";
            temp+="<br /><label>Option3</label><input class='form-control' name='opt_"+optional+"_3' id='opt1_"+optional+"_3' placeholder='Enter option3' required>";
            temp+="<br /><label>Option4</label><input class='form-control' name='opt_"+optional+"_4' id='opt1_"+optional+"_4' placeholder='Enter option4' required>";
            
            console.log(temp);
            document.getElementById('objective').innerHTML += temp;
            for(var i=1;i<optional;i++){
              var t1="opt1_"+i;    
              document.getElementById(t1).value=q[i-1];
              var o="opt1_"+i+"_1";
              document.getElementById(o).value=o1[i-1];
              o="opt1_"+i+"_2";
              document.getElementById(o).value=o2[i-1];
              o="opt1_"+i+"_3";
              document.getElementById(o).value=o3[i-1];
              o="opt1_"+i+"_4";
              document.getElementById(o).value=o4[i-1];    
            }
            optional = optional+ 1;
        }    
    </script>
   
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
                              $temp=$row['sub']."(".substr($row['date'],0,10).")";
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
        <li class="breadcrumb-item active">Create Form</li>
      </ol>
      <div class="row">
        <div class="col-12">
            <form role="form" method="post" action="forms.php" id="form">
                     <div class="row">
                         
                                <div class="col-lg-6">
                                
                                    <h2>Subjective</h2>          
                                     <br />
                                
                                     <input type="button" onclick="addInput();" name="add" value="Add More Question" />
                                    <div id="subjective">
                                     <label><b>Question1</b></label><textarea class='form-control' cols='10' rows='5' name='sub_1' id="sub1_1" placeholder='Enter Question' required></textarea>
                                    </div>
                                </div>
                                
                        <div class="col-lg-6">        
                            <h2>Objective</h2>
                             <br />
                            <input type="button" onclick="addInput1();" name="add" value="Add More Question" />
                            <div id="objective">
                            </div>
                        </div>  
                             
                  </div>
                             <div class="form-group">
                                 <br /><br /><br />
                                <button type="submit" name="submit" > SAVE FORM DETAILS </button>
                             </div>
            </form>
             <script>
         $("#form").submit( function(eventObj) {
          $('<input />').attr('type', 'hidden')
          .attr('name', "subjective")
          .attr('value', fields)
          .appendTo('#form');
          $('<input />').attr('type', 'hidden')
          .attr('name', "objective")
          .attr('value', optional)
          .appendTo('#form');     
      return true;
  });   
    </script>
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
