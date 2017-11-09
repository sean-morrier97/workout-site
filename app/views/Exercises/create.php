<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<form method="post" action="/Exercise_controller/createExercise" class="form-horizontal">
Title: <input type="text" name="title"><br>
Muscle group: <select name="muscleGroup">		  
<?php
$exercise = $this->model('muscle_group');
$results = $exercise->get();
foreach($results as $group ){
	echo '<option value="'.$group->muscle_group_id. '"/>'.$group->muscle_group_name.'</option>';
}
?>
</select><br>
Muscle group: <input type="text" name="muscle_group_id"><br>
<input type="submit" class="btn btn-default" name="action" value="Create" />
</form>