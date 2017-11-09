<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<form action="/Login" method="POST">
Username: <input type="text" name="username"><br>
Password: <input type="password" name="password"><br>
<input type="submit" value="Login" name="action">
<input type="submit" value="Register" name="action" onclick="http://localhost/Login/signup">
<button id="register" class="float-left submit-button">Register</button>
<script type="text/javascript">
	document.getElementById("register").onclick = function(){
		location.href = "http://localhost/Login/signup";
	};
</script>
</form>
<br/>
