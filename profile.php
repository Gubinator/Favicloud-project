<?php include('server.php'); 

	if (empty($_SESSION['username'])){
		header('location: login.php');
	}

?>
<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<title>Profile page</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
	<div class="header">
		<h2>Profile page</h2>
	</div>

	<div class="content">
		<?php if (isset($_SESSION['success'])): ?>
			<div class="error success">
				<h3>
					<?php 
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<?php if (isset($_SESSION["username"])): ?>
		<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
		<p><a href="profile.php?logout='1'" style="color: red;">Logout</a></p>
		<?php endif ?>
	</div>
<?php 
	
	$connect =mysqli_connect("localhost", "root", "jasamgubo99", "FaviCloudSiteData");
	echo "Bratko: " . mysqli_insert_id($connect);
	if (isset($_POST["insert"])) {
	$file=addslashes(file_get_contents($_FILES["file"]["tmp_name"]));
	//$nname = addslashes(znj); //TEST
	//$key = addslashes(2); //TEST
	//$pk=addslashes(mysqli_insert_id($db)); // TEST- PRIMARY KEY, RADI? ne radi
	$pk=addslashes("1"); // zasada koristi U CEM JE STVAR - DA BI FOREIGN KEY RADIO ON MORA PODUDARATI BILO KOJU OD VRIJEDNOSTI POSTAVLJENIH U FAVIREGISTER ZA P_KEY
	$filename=addslashes("random");
	//$name = mysqli_real_escape_string($db,$_POST['insert']);
	//$name=($_FILES['file']['file']);
	$name=basename( $_FILES['file']['name']); // Radi
	$query="INSERT INTO FaviBlob(name, fk_id, filename, access) VALUES ('$file','$pk','$name', 'public')" ; // Upload sveg potrebnog u FaviBlob, pravo pristupa - public prvobitno je konstantno (preko radio buttona se mijenja)
	echo "Bratko: " . mysqli_insert_id($connect);
	$last_id = mysqli_insert_id($connect);
	if (mysqli_query($connect, $query)) {
		echo '<script>alert("File inserted into database")</script>';
	}
	else{
		die('mysql query error: ' . mysqli_error($connect)); // TREBA IZVUCI PKey iz FaviRegister ZA USERA i ubaciti ga za svaki UPLOADAN FILE OD ISTOG KORISNIKA ODNOSNO - svaki uploadan file od strane jednog korisnika ce imati isti fk_id 
	}
}
$var=mysqli_insert_id($connect); 
echo "New record has id: " . mysqli_insert_id($connect); 
echo "New record xyz has id: " . mysqli_insert_id($connect);
$last
?>


	
	<form method="post" enctype="multipart/form-data">
		<p>Select and upload your files here:</p>
		<input type="file" name="file" id=file class="btn space" />
		<input type="submit" id="insert" name="insert" value="Upload" class="btn" />
		<br></br>
		<br></br>

		<table>
		<!--Početak nečeg P R E D I V N O G-->
		<?php
		$query="SELECT * FROM FaviBlob ORDER BY id ASC";
		$result=mysqli_query($connect, $query);
		while ($row=mysqli_fetch_array($result)) {
			echo '<tr>
					<td>
						<p>';echo htmlspecialchars($row['filename']); echo '</p>
							
							<img src="images/doc-icon.png" class="docicon"/>

							
							<p>Select file access type (current - <b>'; echo htmlspecialchars($row['access']); echo '</b>):</p>
							
							<div>
							  <input type="radio" id="btn" name="access" value="public"
							         checked>
							  <label for="public">public &nbsp &nbsp</label>
							


							  <input type="radio" id="btn" name="access" value="private"
							         checked>
							  <label for="private">private &nbsp &nbsp</label>
							
							  <input type="submit" id="btn" name="update" value="Update">

							</div>

							<br></br>
							<br></br>

							 
							  


						
					</td>
				</tr>';
												} 
		/*while ($row=mysqli_fetch_array($result)) { // experimentalni dio za dodavanje i stringa filenamea uz datoteku koji ne radi
			echo '<h6>'; 
			echo htmlspecialchars($row['filename']);
			echo '</h6>';

		}*/								
		/*$query="SELECT * FROM FaviBlob ORDER BY id DESC";
		$result=mysqli_query($connect, $query);*/
			echo "New record JEBO has id: " . $var;
			if (isset($_POST['update'])) {
				$query="SELECT * FROM FaviBlob ORDER BY id ASC";
				$result=mysqli_query($connect, $query);
				$row=mysqli_fetch_array($result);
				$id=htmlspecialchars($row['id']); // ne radi sa varijablom ova varijanta
				$access=$_POST['access'];
				echo "New record xyz has id: " . mysqli_insert_id($connect);
				$updatequery="UPDATE FaviBlob SET access='private' WHERE access='public' AND id='$var'"; // ovo 62 je bezveze sam da vidim jel mi funkcija stima sa predmetom keya 62
				echo "New record xyz has id: " . mysqli_insert_id($connect);
				$updatequery_run=mysqli_query($connect,$updatequery);
				 echo '<script> location.replace("profile.php"); </script>';
				 	echo "New record xyz has NAJEBO SAM TI SE STAREid: " . $var;
			}
			echo "New record has id: " . mysqli_insert_id($connect);
			echo "New record xyz has id: " . $var; // ovaj dohvaca 


		?>
		
		</table>
	
	</form>
	
	
</body>
</html>