<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">

<form method="post" action="/Exercise_controller/viewFavorites" class="form-horizontal">
<input type="submit" class="btn btn-default" name="action" value="View Favorites" />
<input id="logout" type="button" class="btn btn-default" name="logout" value="Logout"/><br>
<style>
#logout{
	margin-left: 1700px;
}
</style>
</form>

<form method="post" action="/Exercise_controller/search" class="form-horizontal">
Search: <input type="text" name="searchParam">
<select name="searchOptions">
	<option value="1">Users</option>
	<option value="2">Exercises</option>
	<option value="3">Workout</option>
</select>
<input type="submit" class="btn btn-default" name="action" value="search" />
</form>
<?php
//exercise search
	foreach($data['searchResults'] as $item){
		echo $item->title . ' Average Rating: ' . $item->number_of_ratings . '<br> Posted By: ' . $item->poster_id . ' Posted on: ' . $item->posted_date . 
				'<form method="post" action="/Exercise_controller/addToFavorites" class="form-horizontal"> <input value="'. $item->exercise_id .'" type="hidden" name="exercise_id">' . 
				'<input type="submit" class="btn btn-default" name="action" value="Add To Favorites" /> </form><br><br> ';
	}
?>