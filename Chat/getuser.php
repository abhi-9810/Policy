<?php
include('../session.php');
$type=$_GET['q'];
$temp="../".$imgLink;
if($type!="admin")
    $type="mentor_".$mentor_id;
echo "<ul>"; 
    $intern_chat="intern_".$intern_id;             
    $sql="SELECT * FROM policy_chat WHERE ((to1='$type' AND from1='$intern_chat') OR (to1='$intern_chat' AND from1='$type')) AND (DATE(`currenttime`) = CURDATE()) AND seen=0 ORDER BY currenttime"; 
    //echo $sql;
    if(!mysqli_query($con,$sql)){
	   die('Error: ' . mysqli_error($con));
    }
    $result=mysqli_query($con,$sql); 
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        //echo "Yha aaya";
        $to=$row['to1'];
        $from=$row['from1'];
        $chat=$row['chat'];
        $id=$row['id'];
        if($to!=$type){    
            echo "<li class=\"replies\">";
            echo "<img style="height:25px;width:25px;" src=\"".$temp."\" alt=\"\" />";
            echo  "<p>".$chat."</p>";
            echo "</li>";
        }
        else{    
            echo "<li class=\"sent\">";
            echo "<img style="height:25px;width:25px;" src='../Profile/iitd.png' alt=\"\" />";
            echo "<p>".$chat."</p>";
            echo "</li>";
        }
        $sql="UPDATE policy_chat SET seen=1,currenttime=currenttime where id='$id'";
        mysqli_query($con,$sql);
    }
echo "</ul>";
?>