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
    echo "<td><tr>" .$followee->followee_id. "</tr>";
    echo "<tr>" .$followee->status. "</tr></td>";
}
?>