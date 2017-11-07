<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<form method="post" action="/Login/signup" class="form-horizontal">
Username: <input type="text" name="username"><br>
E-mail: <input type="text" name="email"><br>
Password: <input type="password" name="password"><br>
Date of birth: <input type="date" name="dob"><br>
Privacy setting: <select name="privacy">
					<option value="private">Private</option>
					<option value="public">Public</option>
				 </select><br>
<input type="submit" class="btn btn-default" name="action" value="Register" />
</form>