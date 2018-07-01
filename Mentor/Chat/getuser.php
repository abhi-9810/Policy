<?php
include('../session.php');
$intern_id=$_GET['q'];
$temp="../".$imgLink;
$type="mentor_".$mentor_id;
echo "<ul>"; 
    $sql="SELECT * FROM policy_interns WHERE intern_id='$intern_id'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $img1=$row['img']; 
    $intern_chat="intern_".$intern_id;             
    $sql="SELECT * FROM policy_chat WHERE ((to1='$type' AND from1='$intern_chat') OR (to1='$intern_chat' AND from1='$type')) AND (DATE(`currenttime`) = CURDATE()) AND seen=0 ORDER BY currenttime"; 
    //echo $sql;
    if(!mysqli_query($con,$sql)){
	   die('Error: ' . mysqli_error($con));
    }
    $result=mysqli_query($con,$sql); 
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $to=$row['to1'];
        $from=$row['from1'];
        $chat=$row['chat'];
        $id=$row['id'];
        if($to!=$type){    
            echo "<li class=\"sent\">";
            echo "<img style="height:25px;width:25px;" src=\"".$temp."\" alt=\"\" />";
            echo  "<p>".$chat."</p>";
            echo "</li>";
        }
        else{ 
            $im="../".$img1;
            echo "<li class=\"replies\">";
            echo "<img style="height:25px;width:25px;" src=\"".$im."\" alt=\"\" />";
            echo "<p>".$chat."</p>";
            echo "</li>";
        }
        $sql="UPDATE policy_chat SET seen=1,currenttime=currenttime where id='$id'";
        mysqli_query($con,$sql);
    }
echo "</ul>";
?>