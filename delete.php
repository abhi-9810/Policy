<?php
 include('session.php');
  $file=$_GET['file'];
  echo $file;
  
  unlink($file);
  header('Location: clippings.php');
?>