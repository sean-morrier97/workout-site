<form method="post" action="/User_controller/setAccountPrivacy" class="form-horizontal">
<select name="pSettings">
	<option value="1">Private</option>
	<option value="0">Public</option>
</select>
<input type="submit" class="btn btn-default" name="action" value="Update" />
</form>

<form method="post" action="/User_controller/deleteAccount" class="form-horizontal">
<input type="submit" class="btn btn-default" name="action" value="Delete Account" />
</form>