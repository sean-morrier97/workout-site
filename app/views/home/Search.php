<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<?php

if($data['searchResults']==null);
else if($data['resultType'] == 2){
	echo '<h1>Exercises: </h1>';
	foreach($data['searchResults'] as $item){
		echo $item->title . ' Average Rating: ' . $item->number_of_ratings . '<br> Posted By: ' . $item->poster_id . ' Posted on: ' . $item->posted_date . 
				'<form method="post" action="/Exercise_controller/addToFavorites" class="form-horizontal"> <input value="'. $item->exercise_id .'" type="hidden" name="exercise_id">' . 
				'<input type="submit" class="btn btn-default" name="action" value="Add To Favorites" /> </form>'.
				'<form method="get" action="/User_controller/createPR" class="form-horizontal"> <input value="'. $item->exercise_id .'" type="hidden" name="exercise_id">' . 
				'<input type="submit" class="btn btn-default" name="action" value="Create Personal Record" /> </form>'.
				'<form method="post" action="/Exercise_controller/rateExercise" class="form-horizontal"> <input value="'. 
					$item->exercise_id .'" type="hidden" name="exercise_id"><input value="1" type="hidden" name="rating"><input type="submit" class="btn btn-default" name="action" value="Rate 1" /> </form>'.
					'<form method="post" action="/Exercise_controller/rateExercise" class="form-horizontal"> <input value="'. 
					$item->exercise_id .'" type="hidden" name="exercise_id"><input value="2" type="hidden" name="rating"><input type="submit" class="btn btn-default" name="action" value="Rate 2" /> </form>'.
					'<form method="post" action="/Exercise_controller/rateExercise" class="form-horizontal"> <input value="'. 
					$item->exercise_id .'" type="hidden" name="exercise_id"><input value="3" type="hidden" name="rating"><input type="submit" class="btn btn-default" name="action" value="Rate 3" /> </form>'.
					'<form method="post" action="/Exercise_controller/rateExercise" class="form-horizontal"> <input value="'. 
					$item->exercise_id .'" type="hidden" name="exercise_id"><input value="4" type="hidden" name="rating"><input type="submit" class="btn btn-default" name="action" value="Rate 4" /> </form>'.
					'<form method="post" action="/Exercise_controller/rateExercise" class="form-horizontal"> <input value="'. 
					$item->exercise_id .'" type="hidden" name="exercise_id"><input value="5" type="hidden" name="rating"><input type="submit" class="btn btn-default" name="action" value="Rate 5" /> </form><br><br>';
	}
}else if($data['resultType'] == 1){

	echo '<h1>Users: </h1>';
	foreach($data['searchResults'] as $item){
		echo 'Username: ' . $item->username . '<br> Email: ' . $item->email . '<br> Date of Birth: ' . $item->dob .
		'<form method="post" action="/User_controller/viewProfile" class="form-horizontal"> <input value="'. $item->id .'" type="hidden" name="userID">'.
		'<input type="submit" class="btn btn-default" name="action" value="View Profile" /> </form><br><br> ';
	}
}else if($data['resultType'] == 3){
	echo '<h1>Workout: </h1>';
	foreach($data['searchResults'] as $item){
		echo $item->title . ' Average Rating: ' . $item->average. '<br> Posted by: ' . $item->poster_id . ' Posted on: ' . $item->posted_date . '<br><br>';
	}
}
?>