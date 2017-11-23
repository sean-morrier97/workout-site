<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<h1>Personal Information</h1><br>
<form method="get" action="/User_controller/createPR" class="form-horizontal">
<form method="POST" action="/User_controller/createPR" class="form-horizontal">
<input type="submit" class="btn btn-default" name="action" value="Create Record">
</form>
<form method="get" action="" class="form-horizontal">
<input type="submit" class="btn btn-default" name="action" value="Update Record">
</form><br>
<?php
if($data['exercise'] == null);
else{
	foreach($data['exercise'] as $item){
		echo "Exercise: " . $item->record_id . "<br>";
		echo "Record: " . $item->record . "<br>";
	}
}
?>