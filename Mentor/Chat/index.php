<?php 
  include('../session.php');
  if(!isset($_GET['id'])){
     $id="admin";
  }
  else{
      $id=$_GET['id'];
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="prototype.js" type="text/javascript"></script>    
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<head>
    <meta charset='UTF-8'>
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
    <link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />
    <link rel="canonical" href="https://codepen.io/emilcarlsson/pen/ZOQZaV?limit=all&page=74&q=contact+" />
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/style.css"> 
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
    <style>
        #inv{
            display: none;
        }
    
    </style>
  <script>    
    $(document).ready(function(){
      scroll();
     console.log("qwerty");    
    });
  </script> 
  <script>
      function scroll() {
            var elem = document.getElementById('admin_mentor');
            elem.scrollTop = elem.scrollHeight;
      }
 </script>    
    </head>

    
<body>
  <div id="frame">
	<div id="sidepanel">
		<div id="profile">
			<div class="wrap">
                <?php $temp="../".$imgLink;?>
				<img id="profile-img" src="<?php echo $temp;?>" class="online" alt="" />
                
				<p><?php echo $name;?><br /><br /></p>
			</div>
		</div>
		<div id="contacts">
			<ul>
                <?php 
                   $i=0;
                 while($i<$count){
                      
                   $sql="SELECT * FROM policy_interns WHERE intern_id='$interns[$i]'";
                   $result=mysqli_query($con,$sql);
                   $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                   $img1=$row['img'];     
                   $link="index.php?id=".$interns[$i];?>
				<a href="<?php echo $link;?>"><li class="contact">
					<div class="wrap">
						<img src="<?php echo $img1;?>" alt="" />
						<div class="meta">
							<p class="name" style="color:white;"><?php echo $names[$i]; ?></p>
							<p class="preview" style="color:white;">Your Chat With <?php echo $names[$i]; ?></p>
						</div>
					</div>
                    </li></a>
                <?php $i++;
                }?>
                <a href="../home.php"><li class="contact">
					<div class="wrap">
						
						<div class="meta">
							<p class="name" style="color:white;">Go to home page</p>
						</div>
					</div>
                    </li></a>
			</ul>
		</div>
	</div>
    	<div class="content">
		<div class="contact-profile">
            <?php
                   $sql="SELECT * FROM policy_interns WHERE intern_id='$id'";
                   $result=mysqli_query($con,$sql);
                   $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                   $img1=$row['img']; 
                   $name1=$row['name'];
                   ?>
			<img style="height:40px;width:40px;"  src="<?php echo "../".$img1;?>" alt="" />
			<p><?php echo $name1;?></p>
		</div>
		<div class="messages" id="mentor_intern">
			<ul>
        <?php 
                    
            $intern_id=$id;         
            $intern_chat="intern_".$intern_id;     
            $mentor_chat="mentor_".$mentor_id;       
            $sql="SELECT * FROM policy_chat WHERE ((to1='$mentor_chat' AND from1='$intern_chat') OR (to1='$intern_chat' AND from1='$mentor_chat')) AND seen=1 ORDER BY currenttime";         
            if(!mysqli_query($con,$sql)){
	           die('Error: ' . mysqli_error($con));
            }
            $result=mysqli_query($con,$sql); 
            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
              $to=$row['to1'];
              $from=$row['from1'];
              $chat=$row['chat'];
              if($to!=$mentor_chat){    
            ?>
				<li class="sent">
				   <img style="height:25px;width:25px;" src="<?php echo $temp;?>" alt="" />
					<p><?php echo $chat;?></p>
				</li>
                <?php }else{?>    
				<li class="replies">
                    <img  style="height:25px;width:25px;" src="<?php echo "../".$img1;?>" alt="" />
					<p><?php echo $chat;?></p>
				</li>
				<?php }}?>
			</ul>
		</div>
        <script>
            function showUser(str) {
                if (window.XMLHttpRequest) {
                    xmlhttp=new XMLHttpRequest();
                }
                else {
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function() {
                    if (this.readyState==4 && this.status==200) {
                        document.getElementById("mentor_intern").innerHTML+=this.responseText;
                        if($.trim(this.responseText))
                           console.log("Hi");
                        else
                            scroll();
                    }
                }
                xmlhttp.open("GET","getuser.php?q="+str,true);
                xmlhttp.send();
            }
            setInterval(function(){
                var id='<?php echo $id;?>';
                showUser(id)    
            },1000);
            
        </script>
        
		<div class="message-input">
			<div class="wrap">
			  
             <input type="text" name="chat" id="word1" value="" placeholder="Write your message..." required/>
             
             <button id="mentor" onclick="submitForm1()" value="Send"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
         <script>
            function submitForm1() {
                var http = new XMLHttpRequest();
                var id='<?php echo $id;?>';
                var address="add.php?id="+id;
                console.log(address);    
                http.open("POST", address, true);
                http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                var params = "chat1=" + document.getElementById("word1").value;
                params+="&id="+id;
                document.getElementById("word1").value="";
                http.send(params);
                http.onload = function() {
                    document.getElementById("mentor_intern").innerHTML+=this.responseText;
                }
           }   
            $("#word1").keyup(function(event) {
                if (event.keyCode === 13) {
                $("#mentor").click();
             }
           });
         </script>               
			</div>
		</div>
	</div> 
</div>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script >$(".messages").animate({ scrollTop: $(document).height() }, "fast");

$("#profile-img").click(function() {
	$("#status-options").toggleClass("active");
});

$(".expand-button").click(function() {
  $("#profile").toggleClass("expanded");
	$("#contacts").toggleClass("expanded");
});

$("#status-options ul li").click(function() {
	$("#profile-img").removeClass();
	$("#status-online").removeClass("active");
	$("#status-away").removeClass("active");
	$("#status-busy").removeClass("active");
	$("#status-offline").removeClass("active");
	$(this).addClass("active");
	
	if($("#status-online").hasClass("active")) {
		$("#profile-img").addClass("online");
	} else if ($("#status-away").hasClass("active")) {
		$("#profile-img").addClass("away");
	} else if ($("#status-busy").hasClass("active")) {
		$("#profile-img").addClass("busy");
	} else if ($("#status-offline").hasClass("active")) {
		$("#profile-img").addClass("offline");
	} else {
		$("#profile-img").removeClass();
	};
	
	$("#status-options").removeClass("active");
});
/*
function newMessage() {
	message = $(".message-input input").val();
	if($.trim(message) == '') {
		return false;
	}
	$('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
	$('.message-input input').val(null);
	$('.contact.active .preview').html('<span>You: </span>' + message);
	$(".messages").animate({ scrollTop: $(document).height() }, "fast");
};

$('.submit').click(function() {
  newMessage();
});

$(window).on('keydown', function(e) {
  if (e.which == 13) {
    newMessage();
    return false;
  }
});*/
//# sourceURL=pen.js
</script>
</body></html>