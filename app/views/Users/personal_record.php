<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
Personal Information
<tr>
	<th>Exercise:</th>
	<th>Record:</th>
</tr>
<?php
foreach($data['personal_record'] as $item){
	echo "<tr><td>" .$item->exercise_id. "</td>";
	echo "<td>" .$item->record. "</td></tr>";
}
?>