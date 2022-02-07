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



	
	<form method="post" enctype="multipart/form-data">
		<p>Select and upload your files here:</p>
		<input type="file" name="file" id=file class="btn space" />
		<input type="submit" id="insert" name="insert" value="Upload" class="btn" />
		<br></br>
		<br></br>

		<table>
		<!--Početak nečeg P R E D I V N O G-->
		<?php 
	
	$connect =mysqli_connect("localhost", "root", "jasamgubo99", "FaviCloudSiteData");
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
		//<?php
		$query="SELECT * FROM FaviBlob ORDER BY id ASC";
		$result=mysqli_query($connect, $query);
		while ($row=mysqli_fetch_array($result)) {
			echo '<tr>
					<td>
						<p class="find">';echo htmlspecialchars($row['filename']); echo '</p>
						<input type="hidden" name="store" value="'; echo htmlspecialchars($row['filename']); echo '">

							
							<img src="images/doc-icon.png" class="docicon"/>

							
							<p>Select file access type (current - <b>'; echo htmlspecialchars($row['access']); echo '</b>):</p>
							
							<div>						
							
							  <input type="submit" id="btn" name="update" class="change-button" value="Change acessibility">

							</div>

							<br></br>
							<br></br>

							 
							  


						
					</td>
				</tr>';
			}
			/*echo '<p class="result" id=result name="findcurrrow"></p>';
			$sejv=ob_get_contents();
			echo $sejv;
			ob_end_clean();*/
			$result1=mysqli_query($connect, $query);

				$row=mysqli_fetch_array($result1);
				$id1=htmlspecialchars($row['id']); // ne radi sa varijablom ova varijanta

				if (!isset($_POST['update'])) {
					echo 'gubinatorrrrrrrrrrrrrrrrr';
					}

				if (isset($_POST['update'])) {
				echo ' 
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
				<script>$(".change-button").click(function() {
    var $item = $(this).closest("tr")   // Finds the closest row <tr> 
                       .find(".find")     // Gets a descendent with class="find"
                       .text();         // Retrieves the text within <td>

    $(".result").append($item);       // Outputs the answer

});
</script>';
				
				$query="SELECT * FROM FaviBlob ORDER BY id ASC";
				//$result=mysqli_query($connect, $query);
				$nname=htmlspecialchars($row['filename']);
				/*$var=mysqli_insert_id($connect); 
				$row=mysqli_fetch_array($result);
				$id=htmlspecialchars($row['id']); // ne radi sa varijablom ova varijanta */
				$save=$id1;
				ob_start();								
				echo '<p class="result" id=result name="findcurrrow">s</p>';
				$sejv1=ob_get_contents();
				$sejv=($sejv1);

				ob_end_clean();
				 $store = $_POST["store"];
				 /*if($store!=$sejv1){
				 	$store=$sejv1;
				 }*/
				//$findname = htmlspecialchars($_POST['findcurrrow']);
				//echo "New record 111 has id: " . $nname;
				//echo "New record 222 has id: " . $save;
				echo "New record 333 has id: " . $sejv;
				echo "Ndadadadada33 has id: " . $sejv;
				echo "SmrdimXXXXXXXXX";
				//$access=$_POST['access'];
				$updatequery="UPDATE FaviBlob SET access='private' WHERE access='public' AND filename='$store'"; 
				$updatequery_run=mysqli_query($connect,$updatequery);
			}
			//echo "New record has id: " . mysqli_insert_id($connect);
			//echo "New record xyz has id: " . $var; // ovaj dohvaca 


		?>
		
		</table>
	
	</form>
	
	
</body>
</html>