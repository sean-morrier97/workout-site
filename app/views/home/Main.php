<!--
The home view that lets the user to see posts and search for users, workouts and exercises by name
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

<div class = "default">
<div class = "backgroundWhiteOverlay">
<form method="post" action="/Home/search" class="form-horizontal" id="search">
Search: <input type="text" name="searchParam">
<select name="searchOptions">
	<option value="1">Users</option>
	<option value="2">Exercises</option>
	<option value="3">Workout</option>
</select>
<input type="submit" class="btn btn-default" name="action" value="search" />
</form>
<h1>Posts</h1>
<?php
//echo "http://$_SERVER[HTTP_HOST]/Workout_controller/viewWorkout?workout_id=1";
$posts = Helpers::getPosts();//Calls the getPosts function
if($posts==null);
else{
//The loop that outputs all the posts the user has
foreach($posts as $item){
	$user = Helpers::getUsernameFromID($item->poster);
	echo "<form method=\"post\" action=\"/Post_controller/likePost\" class=\"form-horizontal\">";
	echo $user[0]->username . " on " . $item->posted_date . "<br><a href=" . $item->URL . ">Check this out!</a><br><input type=\"hidden\" 
		name=\"post_id\" value=\"". $item->post_id . "\"><input type=\"submit\" class=\"btn btn-default\" 
		name=\"action\" value=\"" . $item->likes . "&#32;Like\"></form>";
	echo "<form method=\"post\" action=\"/Post_controller/commentOnPost\" class=\"form-horizontal\">
		<input type=\"hidden\" name=\"post_id\" value=\"". $item->post_id . "\"><input type=\"text\" name=\"comment\" value=\"\"><input type=\"submit\" class=\"btn btn-default\" 
		name=\"action\" value=\"comment\"></form>";
	$comments = Helpers::getComments($item->post_id);
	//The loop that outputs the comments related to the posts
	foreach($comments as $comment){
		$user = Helpers::getUsernameFromID($comment->poster);
		echo "Comments: <br><div class=\"comment\">" . $user[0]->username  . " on " . $comment->posted_date .  
		"<br><h5>&emsp;" . $comment->content . "<h5><form method=\"post\" action=\"/Post_controller/likeComment\" 
		class=\"form-horizontal\"><input type=\"hidden\" name=\"comment_id\" value=\"". $comment->id . "\">
		<input type=\"submit\" class=\"btn btn-default\" name=\"action\" value=\"" . $comment->likes . "&#32;Like\"></form><br><br></div>";
	}
}
}
?>
</div>
</div>
</body>
