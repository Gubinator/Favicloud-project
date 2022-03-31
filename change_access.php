
<?php 

$connect =mysqli_connect("localhost", "root", "jasamgubo99", "FaviCloudSiteData");  // Without password - pass hint 99

$id=$_GET['id'];
$access=$_GET['access'];
if($access=='public'){
	$query="UPDATE FaviBlob SET access='private' WHERE access='public' AND id='$id'";
}
else{
	$query="UPDATE FaviBlob SET access='public' WHERE access='private' AND id='$id'";
}

$data=mysqli_query($connect, $query);
if($data){
	echo "<script> alert('File access type changed.') </script>";
	?>
	<meta http-equiv="refresh" content="0;URL='http://localhost/favicloud/profile.php'" /> 
	<?php 
}
else{
	echo "<script> alert('Failed to change file access type.') </script>";
}



?>


