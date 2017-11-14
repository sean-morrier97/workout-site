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
<<<<<<< HEAD
form{
	display: inline-block;
=======
#search{
	margin-left: 600px;
>>>>>>> 8b8afec05512a0158628e9da1a3d6000ee1a1feb
}
</style>
</form>

<<<<<<< HEAD
<form method="post" action="/Home/search" class="form-horizontal">
=======
<form method="post" action="/Exercise_controller/search" class="form-horizontal" id="search">
>>>>>>> 8b8afec05512a0158628e9da1a3d6000ee1a1feb
Search: <input type="text" name="searchParam">
<select name="searchOptions">
	<option value="1">Users</option>
	<option value="2">Exercises</option>
	<option value="3">Workout</option>
</select>
<input type="submit" class="btn btn-default" name="action" value="search" />
</form>
