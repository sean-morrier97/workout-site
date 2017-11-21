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
echo "<form method=\"post\" action=\"/User_controller/followUser\" class=\"form-horizontal\">";
echo "<input type=\"submit\" class=\"btn btn-default\" name=\"action\" value=\"Follow\" />";
echo "<input type=\"hidden\" class=\"btn btn-default\" name=\"user_id\" value=\"" . $user->id ."\" />";
echo "<input type=\"hidden\" class=\"btn btn-default\" name=\"status\" value=\"" . $user->privacy_setting ."\" />";
echo "</form>";
?>