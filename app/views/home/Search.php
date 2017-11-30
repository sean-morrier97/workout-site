<!--
A view that displays all the search results
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
<?php
//A condition that decides what the user searches by 
if($data['searchResults']==null);
else if($data['resultType'] == 2){
	echo '<h1>Exercises: </h1>';
	//The loop that displays exercises
	foreach($data['searchResults'] as $item){
		$results = Helpers::getUsernameFromID($item->poster_id);
		echo $item->title . ' Average Rating: ' . $item->number_of_ratings . '<br> Posted By: ' . $results[0]->username . ' Posted on: ' . $item->posted_date . 
				'<form method="post" action="/Exercise_controller/addToFavorites" class="form-horizontal"> <input value="'. $item->exercise_id .'" type="hidden" name="exercise_id">' . 
				'<input type="submit" class="btn btn-default" name="action" value="Add To Favorites" /> </form>'.
				'<form method="get" action="/User_controller/createPR" class="form-horizontal"> <input value="'. $item->exercise_id .'" type="hidden" name="exercise_id">' . 
				'<input type="submit" class="btn btn-default" name="action" value="Create Personal Record" /> </form>
				<form method="get" action="/Post_controller/share" class="form-horizontal">
				<input type="hidden" name="post_id" value='. $item->exercise_id . '/>
				<input type="submit" class="btn btn-default" name="action" value="Share" /> </form>
				<form method="post" action="/Workout_controller/addExercise" class="form-horizontal">
				<input type="hidden" name="exercise_id" value="'. $item->exercise_id . '"/>
				<input type="submit" class="btn btn-default" name="action" value="Add to workout" /> </form>'.
				'<form method="post" action="/Exercise_controller/rateExercise" class="form-horizontal"> <input value="'. 
					$item->exercise_id .'" type="hidden" name="exercise_id"><input value="1" type="hidden" name="rating"><input type="submit" class="btn btn-default" name="action" value="Rate 1" /> </form>'.
					'<form method="post" action="/Exercise_controller/rateExercise" class="form-horizontal"> <input value="'. 
					$item->exercise_id .'" type="hidden" name="exercise_id"><input value="2" type="hidden" name="rating"><input type="submit" class="btn btn-default" name="action" value="Rate 2" /> </form>'.
					'<form method="post" action="/Exercise_controller/rateExercise" class="form-horizontal"> <input value="'. 
					$item->exercise_id .'" type="hidden" name="exercise_id"><input value="3" type="hidden" name="rating"><input type="submit" class="btn btn-default" name="action" value="Rate 3" /> </form>'.
					'<form method="post" action="/Exercise_controller/rateExercise" class="form-horizontal"> <input value="'. 
					$item->exercise_id .'" type="hidden" name="exercise_id"><input value="4" type="hidden" name="rating"><input type="submit" class="btn btn-default" name="action" value="Rate 4" /> </form>'.
					'<form method="post" action="/Exercise_controller/rateExercise" class="form-horizontal"> <input value="'. 
					$item->exercise_id .'" type="hidden" name="exercise_id"><input value="5" type="hidden" name="rating"><input type="submit" class="btn btn-default" name="action" value="Rate 5" /> </form><br><br>';
	}
}else if($data['resultType'] == 1){
	//The loop that displays the users
	echo '<h1>Users: </h1>';
	foreach($data['searchResults'] as $item){
		echo 'Username: ' . $item->username . '<br> Email: ' . $item->email . '<br> Date of Birth: ' . $item->dob .
		'<form method="post" action="/User_controller/viewProfile" class="form-horizontal"> <input value="'. $item->id .'" type="hidden" name="userID">'.
		'<input type="submit" class="btn btn-default" name="action" value="View Profile" /> </form><br><br> ';
	}
}else if($data['resultType'] == 3){
	echo '<h1>Workout: </h1>';
	//The loop that displays the workouts
	foreach($data['searchResults'] as $item){
		$results = Helpers::getUsernameFromID($item->poster_id);
		echo $item->title . ' Average Rating: ' . $item->average_rating. '<br> Posted by: ' . $results[0]->username . ' Posted on: ' . $item->posted_date . '<br>
		<form method="post" action="/Workout_controller/addToFavorites" class="form-horizontal"> <input value="'. $item->workout_id .'" type="hidden" name="workout_id">' . 
				'<input type="submit" class="btn btn-default" name="action" value="Add To Favorites" /> </form>
				<form method="get" action="/Post_controller/share" class="form-horizontal">
				<input type="hidden" name="post_id" value='. $item->workout_id . '/>
				<input type="submit" class="btn btn-default" name="action" value="Share" /> </form>
				<form method="post" action="/Workout_controller/rateWorkout" class="form-horizontal"> <input value="'. 
					$item->workout_id .'" type="hidden" name="workout_id"><input value="1" type="hidden" name="rating"><input type="submit" name="action" value="Rate 1" /> </form>'.
					'<form method="post" action="/Workout_controller/rateWorkout" class="form-horizontal"> <input value="'. 
					$item->workout_id .'" type="hidden" name="workout_id"><input value="2" type="hidden" name="rating"><input type="submit" name="action" value="Rate 2" /> </form>'.
					'<form method="post" action="/Workout_controller/rateWorkout" class="form-horizontal"> <input value="'. 
					$item->workout_id .'" type="hidden" name="workout_id"><input value="3" type="hidden" name="rating"><input type="submit" name="action" value="Rate 3" /> </form>'.
					'<form method="post" action="/Workout_controller/rateWorkout" class="form-horizontal"> <input value="'. 
					$item->workout_id .'" type="hidden" name="workout_id"><input value="4" type="hidden" name="rating"><input type="submit" name="action" value="Rate 4" /> </form>'.
					'<form method="post" action="/Workout_controller/rateWorkout" class="form-horizontal"> <input value="'. 
					$item->workout_id .'" type="hidden" name="workout_id"><input value="5" type="hidden" name="rating"><input type="submit" name="action" value="Rate 5" /> </form><br><br>';
	}
}
?>