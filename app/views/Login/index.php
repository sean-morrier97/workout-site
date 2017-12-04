<!--
A view that displays a login form
-->
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="css/mainCSS.css">
<!--
Login form
-->
<body>
<div class = "default">
<div class = "backgroundWhiteOverlay">
<form action="/Login" method="post">
Username: <input type="text" name="username"><br><br>
Password: <input type="password" name="password"><br>
<input class="btn btn-default" type="submit" value="Login" name="action">
</form>
<br>
<!--
Submit button
-->
<form action="/Login/signup" method="post">
<input class="btn btn-default"  type="submit" value="Register" name="action">
</form>
</div>
</div>
</body>