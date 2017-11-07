<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<form method="post" action="/Workout_controller/createWorkout" class="form-horizontal">
Title: <input type="text" name="title"><br>
<<<<<<< HEAD
Muscle group: <select name="muscleGroup">		  
<?php
$exercise = $this->model('muscle_group');
$results = $exercise->get();
foreach($results as $group ){
	echo '<option value="'.$group->muscle_group_id. '"/>'.$group->muscle_group_name.'</option>';
}
?>
</select><br>
Number of sets: <input type="number" name="sets">
Number of repetitions <input type="number" name="reps">
=======
Muscle group: <input type="text" name="muscle_group_id"><br>
Position: <input type="text" name="position"><br>
Number of sets:
>>>>>>> 61c8fdabd2be9af562b501e7bdf6c32fd7ecdb88
<input type="submit" class="btn btn-default" name="action" value="Create" />
</form>