<?php
include('session.php');
$target_dir = "Profile/profile_".$intern_id;
$target_file=$target_dir;
$uploadOk = 1;
$imageFileType = pathinfo(basename( $_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION);
$target_file .= ".".$imageFileType ;
// Check if image file is a actual image or fake image
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
{
$sql = "UPDATE policy_interns SET img='$target_file' WHERE intern_id='$intern_id'";

if ($con->query($sql) == true) {
  $_SESSION['msgUpdate'] = "Record successfully updated.";
  header("location: team.php");
} else {
echo "A problem occurred while Changing Team Image. <a href=\"team.php\">Click here to go back</a>";
}

}
else 
{
	echo "A problem occurred while changing Team Image. <a href=\"team.php\">Click here to go back</a>";
}

?>