<?php   
include('session.php');
$subjective=$_POST['subjective'];
$objective=$_POST['objective'];
$i=1;
$csv_data="";
$sql="SELECT * FROM policy_interns WHERE intern_id='$intern_id'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$forms=$row['forms'];
$forms++;
$table_id="policy_".$intern_id."_".$forms;
$csv_filename = "responses/".$table_id.".csv";
$fd = fopen ($csv_filename, "w");
$sql="UPDATE policy_interns SET forms='$forms' WHERE intern_id='$intern_id'";
mysqli_query($con,$sql);
while($i<$subjective) {
 $temp="sub_".$i;
 $sub=$_POST[$temp]; 
 $csv_data.=$sub.",";
 $sub = mb_ereg_replace("'","\'", $sub);    
 $qid="q".$i;    
 $sql="INSERT INTO policy_phase2_subjective (table_id,qid,question) VALUES ('$table_id','$qid','$sub')";
    if(!mysqli_query($con,$sql)){
	       die('Error: ' . mysqli_error($con));
        }
 $i++;    
}
$i=1;
while($i<$objective) {
 $temp="opt_".$i; 
 $opt=$_POST[$temp];
 $csv_data.=$opt.",";     
 $option=$temp."_1";    
 $option1=$_POST[$option];
 $option=$temp."_2";    
 $option2=$_POST[$option];
 $option=$temp."_3";    
 $option3=$_POST[$option];
 $option=$temp."_4";    
 $option4=$_POST[$option];    
 $qid="o".$i;    
 $opt = mb_ereg_replace("'","\'", $opt);
 $option1 = mb_ereg_replace("'","\'", $option1);
 $option2 = mb_ereg_replace("'","\'", $option2);
 $option3 = mb_ereg_replace("'","\'", $option3);
 $option4 = mb_ereg_replace("'","\'", $option4);    
 $sql="INSERT INTO policy_phase2_objective (table_id,qid,question,option1,option2,option3,option4) VALUES ('$table_id','$qid','$opt','$option1','$option2','$option3','$option4')";
    if(!mysqli_query($con,$sql)){
	       die('Error: ' . mysqli_error($con));
        }   
 $i++;    
}
$data1=array($csv_data);
foreach ( $data1 as $line ) {
    $val = explode(",", $line);
    fputcsv($fd, $val);
    echo $line;
}
echo "Form Created!!";
echo "<a href=\"home.php\"> Back to home page</a>";
?>
