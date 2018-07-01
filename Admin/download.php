<?php
 include('session.php');
   $filename="submissions/intern_{$intern_id}.zip";
   //echo $filename;
	if(file_exists($filename)){
    header('Content-Disposition: attachment; filename='.basename($filename));

    //No cache
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');

    //Define file size
    header('Content-Length: ' . filesize($filename));

    ob_clean();
    flush();
    readfile($filename);
    exit;
}
else{
	echo "File not submitted";
    echo "<a href=\"home.php\">Back to home page</a>";
}
        
?>