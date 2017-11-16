<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<form method="post" action="/Workout_controller/createWorkout" class="form-horizontal">
Title: <input type="text" name="title"><br>
Muscle group: <select name="muscleGroup">		  
<?php
$exercise = $this->model('muscle_group');
$results = $exercise->get();
foreach($results as $group ){
	echo '<option value="'.$group->muscle_group_id. '"/>'.$group->muscle_group_name.'</option>';
}
?>		  
</select>
<br>
Number of exercises: <input type="number" name="numberOfExercises" min="1" max="5">
<?php
$exercises = 0;
switch($numberOfExercises){
	case 1:
		$exercises = 1;
		break;
	case 2:
		$exercises = 2;
		break;
	case 3:
		$exercises = 3;
		break;
	case 4:
		$exercises = 4;
		break;
	case 5:
		$exercises = 5;
		break;
}
for($i=0; $i<$exercises; $i++){
	echo 'Number of sets: <input type="number" name="sets">'
	echo 'Number of repetitions: <input type="number" name="reps">'
	echo 'Muscle group: <input type="text" name="muscle_group_id">'
	echo 'Position: <input type="text" name="position">'
}
?>
<input type="submit" class="btn btn-default" name="action" value="Create" />
</form>