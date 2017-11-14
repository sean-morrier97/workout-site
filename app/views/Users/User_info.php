<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
User Information:
<tr>
	<th>Username:</th>
	<th>Email:</th>
	<th>Date of Birth:</th>
	<th>Posts:</th>
</tr>
<?php
$user = $data['user'];
	echo "<tr><td>" .$user->username. "</td>";
	echo "<td>" . $user->email . "</td>";
	echo "<td>" . $user->dob . "</td>";
    echo "</tr>";
}
?>