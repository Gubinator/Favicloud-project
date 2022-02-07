
<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style2.css">

</head>
<body>
	
	<div class="header">
		<a href="main.php" class="Back"><li>Back to main</li></a>

		<div class="header">
			<a href='main.php'><img src="images/logo-png.png" alt="Favicloud" class="pagelogo"></a>
			<p class="Description">Dashboard</p>
		</div>
	</div>


	

	<table class="darkTable">
		<tr>
			<th>User ID</th>
			<th>File ID</th>
			<th>Filename</th>
			<th>Download</th>
		</tr>
	

		<?php 
	
	$connect =mysqli_connect("localhost", "root", "jasamgubo99", "FaviCloudSiteData");

	$query="SELECT * FROM FaviBlob WHERE access='public'" ;
	$data=mysqli_query($connect, $query);
	$total=mysqli_num_rows($data);
	//$qresult=mysqli_fetch_assoc($data); // Ako mi je ovaj ukljucen ovdje preskociti ce mi prvi element za donju while petlju jer ga je vec fetcho 
	//echo $qresult['id']. " ". $qresult['fk_id']. " ". $qresult['filename']. " ". $qresult['access'];
	//echo $total;
	if($total!=0){
	while(($qresult=mysqli_fetch_assoc($data))){
		echo "
			<tr>
			<td>".$qresult['fk_id']."</td>
			<td>".$qresult['id']."</td>
			<td>".$qresult['filename']."</td>
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
	
</body>
</html>