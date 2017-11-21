<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">

<form method="post" action="/Exercise_controller/viewFavorites" class="form-horizontal">
<input type="submit" class="btn btn-default" name="action" value="View Favorites" />
</form>
<form method="post" action="/Login/logout" class="form-horizontal">
<input id="logout" type="submit" class="btn btn-default" name="logout" value="Logout"/><br>
<style>
#logout{
	margin-left: 1700px;
}
form{
	display: inline-block;
}
#search{
	margin-left: 600px;
}
</style>
</form>

<form method="GET" action="/User_controller/settings" class="form-horizontal">
<input type="submit" class="btn btn-default" name="action" value="Settings" />
</form><br>
<form method="get" action="/Workout_controller/createWorkout" class="form-horizontal">
<input type="submit" class="btn btn-default" name="" value="Create Workout" />
</form>
<form method="GET" action="/User_controller/followInfo" class="form-horizontal">
<input type="submit" class="btn btn-default" name="action" value="Followers" />
</form>

<form method="post" action="/Home/search" class="form-horizontal" id="search">
Search: <input type="text" name="searchParam">
<select name="searchOptions">
	<option value="1">Users</option>
	<option value="2">Exercises</option>
	<option value="3">Workout</option>
</select>
<input type="submit" class="btn btn-default" name="action" value="search" />
</form>
<form method="get" action="/Home/" class="form-horizontal">
<input type="submit" class="btn btn-default" name="action" value="Search" />
</form><br>
<form method="get" action="/User_controller/getPR" class="form-horizontal">
<input type="submit" class="btn btn-default" name="action" value="Personal Record">
</form><br>
<form method="get" action="/Post_controller/posts" class="form-horizontal">
Posts:
<?php
<<<<<<< HEAD
if($data['posts'] == null);
=======
if($data['posts']== null);
>>>>>>> 67ddfaa1c8abf94c682b8355ebed9c1940b77e04
else{
	foreach($data['posts'] as $item){
		echo 'Post: ' . $item->post_id;
	}
}
?>
</form>
