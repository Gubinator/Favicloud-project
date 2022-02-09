<?php include('server.php'); 

	if (empty($_SESSION['username'])){
		header('location: login.php');
	}
	$g_id=$_SESSION['id']; // Getting PK from FaviRegister (FK in FaviBlob)

	//var_dump($g_id);
	//echo 'pasta';
	//print_r($g_id);
	//	echo 'pasta';
	//	echo $g_id;
?>
<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<title class="Pgtitle">Profile page</title>
	<link rel="stylesheet" type="text/css" href="style2.css">

</head>
<body>
	<div class="header">
		<a href='main.php'><img src="images/logo-png.png" alt="Favicloud" class="pagelogo"></a>
		<p class="Description">Profile page</p>
	</div>

	<div class="content content-margin">
		<?php if (isset($_SESSION['success'])): ?>
			<div class="error success">
				<h3>
					<?php 
						echo $_SESSION['success'];
						unset($_SESSION['success']); // Unsets $_SESSION['success'] value 
					?>
				</h3>
			</div>
		<?php endif ?>

		<?php if (isset($_SESSION["username"])): ?>
		<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong>.</p>
		<p><a href="profile.php?logout='1'" style="color: red;">Logout</a></p>
		<?php endif ?>
	</div>

	<div class="Description p-margin">
		<ul>
			<li class="p-li"><a href="main-session.php" class="href-color">Main</a></li>
			<li class="p-li p-li-spacing"></li>
			<li class="p-li"><a href="dashboard.php" class="href-color">Dashboard</a></li>
		</ul>
	</div>
	<form method="post" enctype="multipart/form-data">
		<p>Select and upload your files here:</p>
		<input type="file" name="file" id=file class="btn space" />
		<input type="submit" id="insert" name="insert" value="Upload" class="btn" />

		<table>
				</form>

	<table class="profileTable" >
		<tr>
			<th>File ID</th>
			<th>Filename</th>
			<th>Access</th>
			<th>Remove</th>
			<th>Change Access</th>
			<th>Download</th>
		</tr>
	

		<?php 
	
	$connect =mysqli_connect("localhost", "root", "jasamgubo99", "FaviCloudSiteData");
	if (isset($_POST["insert"])) {
	$file=addslashes(file_get_contents($_FILES["file"]["tmp_name"]));
	$name=basename( $_FILES['file']['name']);
	if(empty($name)){
		echo '<script>alert("Plase select a file before uploading.")</script>';
		header("Refresh:0"); // Without refresh it just ends SELECT query - which results in not displaying other uploaded files
		die('mysql query error: ' . mysqli_error($connect));
	}
	$path="upload/".$name;
	$nametmp=($_FILES["file"]["tmp_name"]);
	$query="INSERT INTO FaviBlob(name, fk_id, filename, access) VALUES ('$file','$g_id','$name', 'public')" ;
	if (mysqli_query($connect, $query)) {
		move_uploaded_file($nametmp, $path);
		echo '<script>alert("File inserted into database")</script>';
		echo "<script>window.location=''</script>"; // Zaustavlja na refresh stranice PONOVNO UPLOADANJE It stops  
	}
	else{
		die('mysql query error: ' . mysqli_error($connect)); 
	}
}

$s_query="SELECT * FROM FaviBlob WHERE fk_id ='$g_id'";
$data=mysqli_query($connect, $s_query);
$total=mysqli_num_rows($data);
//$qresult=mysqli_fetch_assoc($data); // Ako mi je ovaj ukljucen ovdje preskociti ce mi prvi element za donju while petlju jer ga je vec fetcho 
//echo $qresult['id']. " ". $qresult['fk_id']. " ". $qresult['filename']. " ". $qresult['access'];
//echo $total;
if($total!=0){
	while(($qresult=mysqli_fetch_assoc($data))){
		echo "
			<tr>
			<td>".$qresult['id']."</td>
			<td>".$qresult['filename']."</td>
			<td>".$qresult['access']."</td>
			<td><a href='remove.php?id=$qresult[id]' onclick='return checkremove()'>Remove</td>
			<td><a href='change_access.php?access=$qresult[access]&id=$qresult[id]'>Change Access</td>
			<td><a href='download.php?filename=$qresult[filename]'>Download</td>
			</tr>
		";
	}
}
else{
	echo "No files are uploaded, no information to show.";
}
		?>
		
		</table>
	<script type="text/javascript">
		function checkremove(){
			return confirm('Are you sure you want to delete this file?')
		}
	</script>
			</table>
</body>
</html>