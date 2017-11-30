<!--
A view that displays a login form
-->
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<!--
Login form
-->
<form action="/Login" method="post">
Username: <input type="text" name="username"><br>
Password: <input type="password" name="password"><br>
<input type="submit" value="Login" name="action">
</form>
<!--
Sumbit button
-->
<form action="/Login/signup" method="post">
<input type="submit" value="Register" name="action">
</form>
