<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
Followings:
<tr>
    <th>Username:</th>
    <th>Status:</th>
</tr>
<?php
foreach($data['following'] as $followee){
    echo "<form method=\"post\" action=\"/UserController/listOfFollowings\" class=\"form-horizontal\"><tr><td>" .$followee->followee_id. "</td>";
    echo "<td>" .$followee->status. "</td></tr></form>";
}
?>