<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<h1>User Information:</h1>
<?php
$user = $data['user'];
if($user != null){
	echo "Username: " .$user->username. "<br>";
	echo "Email: " . $user->email . "<br>";
	echo "Date of Birth: " . $user->dob . "<br>";
}else{
	echo 'Sorry, this profile is private';
}
?>