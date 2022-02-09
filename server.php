<?php
session_start();
session_id();

$username="";
$email="";
$errors=array();

//Connect to db
$db=mysqli_connect('localhost', 'root','jasamgubo99','FaviCloudSiteData') or die($db);

if(isset($_POST['register'])){
	$username = mysqli_real_escape_string($db,$_POST['username']);
	$password1 = mysqli_real_escape_string($db,$_POST['password1']);
	$password2 = mysqli_real_escape_string($db,$_POST['password2']);
	$email = mysqli_real_escape_string($db,$_POST['email']);

	if (empty($username)) {
		array_push($errors, "Username is required!");
	}
	if (empty($email)) {
		array_push($errors, "Email is required!");
	}
	if (empty($password1)) {
		array_push($errors, "Password is required!");
	}
	if (empty($password2)) {
		array_push($errors, "You need to confirm your password!");
	}
	if ($password1!=$password2) {
		array_push($errors, "Password do not match!");
	}
	//No errors then proceed further

	if (count($errors) == 0) {
		$password=md5($password1); //Encrypt password before storing it into db
		$sql="INSERT INTO FaviRegister (username, email, password) VALUES ('$username', '$email', '$password')";
		mysqli_query($db, $sql);
		$_SESSION['username'] = $username;
		$_SESSION['id'] = '35'; // Just for debugging
			$find_id_query="SELECT id FROM FaviRegister WHERE username='$username' AND password='$password'";
			$result_id=mysqli_query($db, $find_id_query);
			$row=mysqli_fetch_assoc($result_id);
			if($row!=0){
				$_SESSION['id'] =current($row);
				//$_SESSION['id']=mysqli_real_escape_string($db,$result_id);
				//$_SESSION['id'] ="6424";
			}
			/*else{
				$_SESSION['id'] ="5444"; // This was just used for debugging
			}*/
		$_SESSION['success'] = "You are now logged in";
		header('location: profile.php'); //Redirect to user-profile page
	}
}

// log user from login page

	if(isset($_POST['login'])){
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$password = mysqli_real_escape_string($db,$_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required!");
		}
		if (empty($password)) {
			array_push($errors, "Password is required!");
		}
		if (count($errors) == 0) {
		$password=md5($password); //Encrypt password before comparing it to the one that is stored in database (and also encrypted there)
		$query="SELECT * FROM FaviRegister WHERE username='$username' AND password='$password'";
		$result=mysqli_query($db, $query);
		if(mysqli_num_rows($result) == 1){
				//log user in
			$_SESSION['username'] = $username;
			$_SESSION['id'] = '35';
			$find_id_query="SELECT id FROM FaviRegister WHERE username='$username' AND password='$password'";
			$result_id=mysqli_query($db, $find_id_query);
			$row=mysqli_fetch_assoc($result_id);
			if($row!=0){
				$_SESSION['id'] =current($row);
				//$_SESSION['id']=mysqli_real_escape_string($db,$result_id);
				//$_SESSION['id'] ="6424";
			}
			/*else{
				$_SESSION['id'] ="5444";
			}*/
			$_SESSION['success'] = "You are now logged in";
			header('location: profile.php'); //Redirect to user-profile page
			} else{
				array_push($errors,"The username/password combination is not correct.");
				//header('location: login.php')
			}
		}
}

//logout
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header('location: login.php');
							}
														

?>