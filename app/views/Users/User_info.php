<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<tr>
	<th>Username:</th>
	<th>Email:</th>
	<th>Date of Birth:</th>
	<th>Posts:</th>
</tr>
<?php
foreach($data['users'] as $users){
	echo "<tr><td>" .$users->username. "</td>";
	echo "<td>" .$users->email. "</td>";
	echo "<td>" .$users->dob. "</td>";
	for($i = 0; $i <= )
}
?>