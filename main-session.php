

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Favicloud</title>
	<link href="style2.css" rel="stylesheet">
</head>

<?php include('server.php'); 

	if (empty($_SESSION['username'])){ // Only needed when: [1.] LOGOUT from main-session.php [2.] It redirects to login.php [3.] login.php has back arrow that goes to last page that user was on [4.] Since it doesn't make sense that user gets on session page, it redirects user to: main.php 
		header('location: login.php');
	}


	/*if (!empty($_SESSION['username'])){
		echo '<ul class="m-ul">
					<a href="profile.php"><li class="m-li">PROFILE</li></a>
					<a href="main.php"><li class="m-li">LOGOUT</li></a>
	  		</ul>';*/
?>


<body>

	
	<a href='main.php'><img src="images/logo-png.png" alt="Favicloud" class="logo"></a>
	<ul class="m-ul">
		<a href="dashboard.php"><li class="m-li">DASHBOARD</li></a>
		<li class="m-li">|</li>
		<a href="profile.php"><li class="m-li">PROFILE</li></a>
		<li class="m-li">|</li>
		<a href="main-session.php?logout='1'.php"><li class="m-li">LOGOUT</li></a>
	  </ul>

	<main>


</body>

</html>