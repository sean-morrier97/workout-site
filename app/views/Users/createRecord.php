<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<form method="post" action="/User_controller/createPR" class="form-horizontal">
Exercise: <select name="exercises">
<?php
$exercise = $this->model('exercise');
$results = $exercise->get();
foreach($results as $items){
	echo '<option value="' . $items->exercise_id . '"/>' . $items->title . '</option>';
}
?>
</select><br>
Record: <input type="text" name="record"><br>
<input type="submit" class="btn btn-default" name="action" value="Create a record">
</form>