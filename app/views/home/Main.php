<<<<<<< HEAD
<p></p>
=======
<form method="post" action="/Exercise_controller/viewFavorites" class="form-horizontal">
<input type="submit" class="btn btn-default" name="action" value="View Favorites" />
</form>

<form method="post" action="/Exercise_controller/search" class="form-horizontal">
Search: <input type="text" name="searchParam"><br>
<input type="submit" class="btn btn-default" name="action" value="search" />
</form>
<?php
//exercise search
	foreach($data['searchResults'] as $item){
		echo $item->title . ' Average Rating: ' . $item->number_of_ratings . '<br> Posted By: ' . $item->poster_id . ' Posted on: ' . $item->posted_date . 
				'<form method="post" action="/Exercise_controller/addToFavorites" class="form-horizontal"> <input value="'. $item->exercise_id .'" type="hidden" name="exercise_id">' . 
				'<input type="submit" class="btn btn-default" name="action" value="Add To Favorites" /> </form><br><br> ';
	}
?>
>>>>>>> 83a6300a7b4c9f1a804b68f4788b7977f913958b
