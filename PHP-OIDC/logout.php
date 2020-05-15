<?php include('function.php');  ?>
<?php
	$access_token=$_SESSION['access_token'];
	$refresh_token=$_SESSION['refresh_token'];
	logOut($access_token,$refresh_token);
	unset($_SESSION['access_token']);
	unset($_SESSION['user_info']); 
	header("Location: ".LandingUrl);
	
?>