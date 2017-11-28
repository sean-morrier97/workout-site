 <!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<h1>Favorite exercises</h1>
<?php
if($data['favorites']==null)
	echo "No favorites yet";
else{
	foreach($data['favorites'] as $item){
			echo $item->title . ' Average Rating: ' . $item->number_of_ratings . '<br> Posted By: ' . $item->poster_id . ' Posted on: ' . $item->posted_date . 
					'<form method="post" action="/Exercise_controller/removeFromFavorites" class="form-horizontal"> <input value="'. $item->exercise_id .'" type="hidden" name="exercise_id">' . 
					'<input type="submit" class="btn btn-default" name="action" value="Remove" />';
	}
}
?>