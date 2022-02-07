
<?php 

$connect =mysqli_connect("localhost", "root", "jasamgubo99", "FaviCloudSiteData");

$id=$_GET['id'];
$query= "DELETE FROM FaviBlob WHERE id='$id'";
$data=mysqli_query($connect, $query);
if($data){
	echo "<script> alert('File removed.') </script>";
	?>
	<meta http-equiv="refresh" content="0;URL='http://localhost/favicloud/profile.php'" /> 
	<?php 
}
else{
	echo "<script> alert('Failed to remove file.') </script>";
}



?>


