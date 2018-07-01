<?php   
include('session.php');
$subjective=$_POST['subjective'];
$objective=$_POST['objective'];
$table_id=$_POST['table_id'];
$i=1;
$csv_data="";
$csv_filename = "responses/".$table_id.".csv";
$fd = fopen ($csv_filename, "a+");
while($i<$subjective) {
 $temp="ans_sub".$i;
 $sub=$_POST[$temp]; 
 $csv_data.=$sub.",";
 $qid="q".$i;    
 $i++;    
}
$i=1;
while($i<$objective) {
 $temp="opt_".$i; 
 $options="OPTIONS::";
 $temp1=$temp."_1";    
 if( isset($_POST[$temp1]) ){
     $options.=$_POST[$temp1].":";
 }
 $temp1=$temp."_2";    
 if( isset($_POST[$temp1]) ){
     $options.=$_POST[$temp1].":";
 }
 $temp1=$temp."_3";    
 if( isset($_POST[$temp1]) ){
     $options.=$_POST[$temp1].":";
 }
 $temp1=$temp."_4";    
 if( isset($_POST[$temp1]) ){
     $options.=$_POST[$temp1].":";
 }    
 $i++;   
 $csv_data.=$options.",";    
}
$data1=array($csv_data);
foreach ( $data1 as $line ) {
    $val = explode(",", $line);
    fputcsv($fd, $val);
    //echo $line;
}
//echo $csv_data;
echo "Response Submited!!";
echo "<a href=\"home.php\"> Back to home page</a>";
?>
