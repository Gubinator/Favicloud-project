
<?php 

$fname=$_GET['filename'];

if(!empty($fname)){
	$path="upload/".$fname;

	if(!empty($fname) && file_exists($path)){
		header("Content-Description: File transfer");
		header("Content-Disposition: attachment; filename=$filename"); // Bez ovog headera ne radi download fileova
		header("Content-Type: file");
		readfile($path);

		exit;
	}
	else{
		echo "File does not exist.";
	}
}


?>


