<!--
A view that displays a form to create a personal record
-->
<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="/css/simple-sidebar.css">
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
</head>

						
<div id="wrapper">
	<div id="sidebar-wrapper">
            <ul class="sidebar-nav">
				<form id="homeForm" method="post" action="/Home/Main">
					<li class="sidebar-brand">
						<a id = "home" type="submit" name="action" />Home</a>
					</li>
				</form>	
                <form id="favoritesForm" method="post" action="/Exercise_controller/viewFavorites">
					<li class="sidebar-brand">
						<a id = "favorites" name="action" />Favorites</a>
					</li>
				</form>	
				<form id="settingsForm" method="GET" action="/User_controller/settings">		
					<li>
						<a id = "settings" name="action">Settings</a>
					</li>
				</form>	
				<form id="followersForm" method="GET" action="/User_controller/followInfo">		
					<li>
						<a id = "followers" name="action">Followers</a>
					</li>
				</form>	
				<form id="workoutForm" method="GET" action="/Workout_controller/createWorkout">		
					<li>
						<a id = "workout" name="action">Create Workout</a>
					</li>
				</form>	
				<form id="prForm" method="GET" action="/User_controller/getPR">		
					<li>
						<a id = "pr" name="action">Personal Records</a>
					</li>
				</form>	
				<form id="logoutForm" method="Post" action="/Login/logout">		
					<li>
						<a id = "logout" name="action">Logout</a>
					</li>
				</form>	
            </ul>
        </div>
		<div>
            <div class="container-fluid">
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Gainz</a>
            </div>
        </div>
	</div>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
	document.getElementById("favorites").onclick = function() {
    document.getElementById("favoritesForm").submit();
	}
	document.getElementById("settings").onclick = function() {
    document.getElementById("settingsForm").submit();
	}
	document.getElementById("home").onclick = function() {
    document.getElementById("homeForm").submit();
	}
	document.getElementById("followers").onclick = function() {
    document.getElementById("followersForm").submit();
	}
	document.getElementById("workout").onclick = function() {
    document.getElementById("workoutForm").submit();
	}
	document.getElementById("pr").onclick = function() {
    document.getElementById("prForm").submit();
	}
	document.getElementById("logout").onclick = function() {
    document.getElementById("logoutForm").submit();
	}
    </script>
<form method="post" action="/User_controller/createPR" class="form-horizontal">
Exercise: <select name="exercises">
<?php
$exercise = $this->model('exercise');
$results = $exercise->get();
foreach($results as $items){
	echo '<option value="' . $items->exercise_id . '" name = "exercise_id"/>' . $items->title . '</option>';
}
?>
</select><br>
Record: <input type="text" name="record"><br>
<input type="submit" class="btn btn-default" name="action" value="Create a record">
</form>