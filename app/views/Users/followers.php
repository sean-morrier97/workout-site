<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
Followers:
<tr>
    <th>Username:</th>
    <th>Status:</th>
</tr>
<?php
foreach($data['following'] as $follower){
    echo "<form method=\"post\" action=\"/UserController/listOfFollowers\" class=\"form-horizontal\"><tr><td name = \"follower_id\">" .$follower->follower_id. "</td>";
    echo "<td>" .$follower->status. "</td></tr></form>";
}
?>