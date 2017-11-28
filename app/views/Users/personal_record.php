<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<h1>Personal Records</h1><br>
<form method="post" action="/User_controller/createPR" class="form-horizontal">
<input type="submit" class="btn btn-default" name="action" value="Create Personal Record" /><br>
</form>
<br>
<?php
if($data['records'] == null)
	echo "You dont have any personal records yet";
else{
	foreach($data['records'] as $item){
		echo "Exercise: " . Helpers::getExerciseTitle($item->exercise_id)->title . "<br>";
		echo "Record: " . $item->record . "<br><form method=\"post\" action=\"/User_controller/updatePR\" class=\"form-horizontal\">
			<input type=\"text\" name=\"record\"><br>
			<input type=\"submit\" class=\"btn btn-default\" name=\"action\" value=\"Update Record\">
			<input type=\"hidden\" name=\"record_id\" value=\"". $item->record_id . "\">
			</form><br>";
	}
}
?>