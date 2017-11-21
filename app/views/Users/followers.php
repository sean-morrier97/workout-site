<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<h2>Followees:</h2>

<?php
foreach($data['followers'] as $follower){
	$user = User_controller::getUsernameFromID($follower->follower_id);
    echo $user[0]->username . ' ' . $follower->status.
	'<form method="post" action="/User_controller/unfollowUser" class="form-horizontal">
	<input type="submit" class="btn btn-default" name="action" value="Unfollow" />
	<input type="hidden" class="btn btn-default" name="id" value="' . $follower->id . '" />
	</form></br>';
}
echo '<br>';
?>
<h2>Followers:</h2>

<?php
foreach($data['followees'] as $followee){
	$user = User_controller::getUsernameFromID($followee->followee_id);
    echo $user[0]->username . ' ' . $followee->status;
}
?>