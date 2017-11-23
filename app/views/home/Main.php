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

Posts:
<?php
$posts = Post_controller::getPosts();
foreach($posts as $item){
	$user = User_controller::getUsernameFromID($item->poster);
	echo "<form method=\"post\" action=\"/Post_controller/likePost\" class=\"form-horizontal\">";
	echo $user[0]->username . "<br>" . $item->posted_date . "<br><a href=" . $item->URL . ">Check this out!</a><input type=\"hidden\" 
		name=\"post_id\" value=\"". $item->post_id . "\"><input type=\"submit\" class=\"btn btn-default\" 
		name=\"action\" value=\"Like\"></form>";
		
	echo "<form method=\"get\" action=\"/Post_controller/commentOnPost\" class=\"form-horizontal\">
		<input type=\"hidden\" name=\"post_id\" value=\"". $item->post_id . "\"><input type=\"submit\" class=\"btn btn-default\" 
		name=\"action\" value=\"comment\"></form>";
	$comments = Post_controller::getComments();
	foreach($comments as $comment){
		echo User_controller::getUsernameFromID($comment->poster)  . "<br>" . $comment->posted_date .  
		"<br><h5>" . $comment->content . "<h5><form method=\"get\" action=\"/Post_controller/likeComment\" 
		class=\"form-horizontal\"><input type=\"hidden\" name=\"post_id\" value=\"". $comment->id . "\">
		<input type=\"submit\" class=\"btn btn-default\" name=\"action\" value=\"Like\"></form>";
	}
}
?>
