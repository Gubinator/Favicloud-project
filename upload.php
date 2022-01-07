<!DOCTYPE html>
<html>
<body>

<?php 

$connect =mysqli_connect("localhost", "root", "jasamgubo99", "FaviCloudSiteData");
if (isset($_POST['insert'])) {
	$file=addslashes(file_get_contents($_FILES['file']['tmp_name']));
	$query="INSERT INTO FaviBlob VALUES ('$file')";
	if (mysqli_query($connect,$query)) {
		echo '<script>alert("File inserted into database")</script>';
	}
}

$query="SELECT * FROM FaviBlob ORDER BY id DESC";
$result=mysqli_query($connect, $query);
while ($row=mysqli_fetch_array($result)) {
	echo '<tr>
			<td>
				<img src="images/doc-icon.png"/>
			</td>
		</tr>';
}

?>


</body>
</html>