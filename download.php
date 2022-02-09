
<?php 

$fname=$_GET['filename'];

if(!empty($fname)){
	$path="upload/".$fname;

	if(!empty($fname) && file_exists($path)){
		header("Content-Description: File transfer");
		header("Content-Disposition: attachment; filename=$filename"); // Without this header file download does not work because if not specified it will try to 'read' file?
		header("Content-Type: file");
		readfile($path);

		exit;
	}
	else{
		echo "File does not exist.";
	}
}


?>


