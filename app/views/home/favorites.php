<!--
A view to show a list of favorite exercises and a list of favorite workouts
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
<link rel="stylesheet" type="text/css" href="/css/mainCSS.css">
</head>

						
<div id="wrapper">
	<div id="sidebar-wrapper">
            <ul class="sidebar-nav">
				<form id="homeForm" method="post" action="/Home/Main">
					<li class="sidebar-brand">
						<a id = "home" type="submit" name="action" />Home</a>
					</li>
				</form>	
				<form id="postForm" method="post" action="/Post_controller/myPosts">
					<li class="sidebar-brand">
						<a id = "posts" type="submit" name="action" />My Posts</a>
					</li>
				</form>
				<form id="exerciseForm" method="get" action="/Exercise_controller/createExercise">
					<li class="sidebar-brand">
						<a id = "exercise" type="submit" name="action" />Create Exercise</a>
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
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle"><h2>proworkout.com</h2></a>
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
	document.getElementById("posts").onclick = function() {
    document.getElementById("postForm").submit();
	}
	document.getElementById("exercise").onclick = function() {
    document.getElementById("exerciseForm").submit();
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
<<<<<<< HEAD
	<div class="default">
=======
>>>>>>> a02e1ad3b4360f09a932a3a00ecd8db05f9020e0
<h1>Favorite exercises</h1>
<?php
//The condition that shows all the favorite exercises
if($data['favoriteExercises']==null)
	echo "No favorite exercises yet<br><br>";
else{
	foreach($data['favoriteExercises'] as $item){
			echo $item->title . ' Average Rating: ' . $item->number_of_ratings . '<br> Posted By: ' . $item->poster_id . ' Posted on: ' . $item->posted_date . 
					'<form method="post" action="/Exercise_controller/removeFromFavorites" class="form-horizontal"> <input value="'. $item->exercise_id .'" type="hidden" name="exercise_id">' . 
					'<input type="submit" class="btn btn-default" name="action" value="Remove" /></form>';
	}
}
//The condition that shows all the favorite workouts 
if($data['favoriteWorkouts']==null)
	echo "No favorite workouts yet";
else{
	foreach($data['favoriteWorkouts'] as $item){
			echo $item->title . ' Average Rating: ' . $item->number_of_ratings . '<br> Posted By: ' . $item->poster_id . ' Posted on: ' . $item->posted_date . 
					'<form method="post" action="/Workout_controller/removeFromFavorites" class="form-horizontal"> <input value="'. $item->workout_id .'" type="hidden" name="workout_id">' . 
					'<input type="submit" class="btn btn-default" name="action" value="Remove" /></form>';
	}
}
?>
</div>