My posts:
<?php
$posts = Post_controller::myPosts();
foreach($posts as $item){
	$user = User_controller::getUsernameFromID($item->poster);
	echo "<form method=\"get\" action=\"/Post_controller/deletePost\" class=\"form-horizontal\">"
	echo $user[0]->username . "<br><a href=" . $item->URL . ">Check this out!</a><input type=\"hidden\" 
		name=\"post_id\" value=\"". $item->post_id . "\"><input type=\"submit\" class=\"btn btn-default\" 
		name=\"action\" value=\"Delete\"></form>";
}
?>