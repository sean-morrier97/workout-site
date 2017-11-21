<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<form method="post" action="/Workout_controller/createWorkout" class="form-horizontal">
Title: <input type="text" name="title"><br>
Number of Exercises: <input type="number" name="noOfExercises" min="1" max="10"><br>
/*Muscle group: <select name="muscleGroup">		  
<?php
$exercise = $this->model('muscle_group');
$results = $exercise->get();
foreach($results as $group ){
	echo '<option value="'.$group->muscle_group_id. '"/>'.$group->muscle_group_name.'</option>';
}
?>
</select><br>*/
<input type="submit" class="btn btn-default" name="action" value="Create" />
</form>