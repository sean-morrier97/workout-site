<?php
/*
An exercise controller that handles all actions that are related 
to exercises
*/
class Exercise_controller extends Controller{
	
	//A function to create an exercise
	public function createExercise()
	{
		if(isset($_POST['action'])){
			$exerciseDetail = $this->model('exercise_detail');
			$exercise = $this->model('exercise');
			$exercise->title = $_POST['title'];
			$exercise->posted_date = 'NOW()';
			$exercise->number_of_ratings = 0;
			$exercise->average_rating = 0;
			$exercise->poster_id = $_SESSION['userID'];
			$exercise->exercise_id = 0;
			$exerciseDetail->exercise_id = $exercise->insert();
			$exerciseDetail->muscle_id = $_POST['muscle_group_id'];
			$exerciseDetail->insert();
			echo $exercise->posted_date;
		}
    }
	
	//A function that performs an action of adding an exercise to favorites
	public function addToFavorites(){
		if(isset($_POST['action'])){
			$favorite_exercises = $this->model('favorite_exercises');
			$favorite_exercises->exercise_id = $_POST['exercise_id']; 
			$favorite_exercises->id = 0; 
			$favorite_exercises->user_id = $_SESSION['userID'];
			if(count($favorite_exercises->get())==0){
				$favorite_exercises->insert();
				$this->view('Home/Main');
			}else{
				$this->view('Home/Main');
			}
		}
	}
	
	//A function that performs an action of removing an exercise from favorite
	public function removeFromFavorites(){
		if(isset($_POST['action'])){
			$favorite_exercises = $this->model('favorite_exercises');
			$favorite_exercises->exercise_id = $_POST['exercise_id']; 
			$favorite_exercises->user_id = $_SESSION['userID'];
			if(count($favorite_exercises->get())!=0){
				$favorite_exercises->deleteFavorite();
			}else{
				//display error message
			}
		}
	}
	
	//A function that shows all favorite exercises
	public function viewFavorites(){
		$fav_exercise = $this->model('favorite_exercises');
		$fav_exercise->user_id = $_SESSION['userID'];
		$results = $fav_exercise->joinedGet();
		$this->view('Exercises/fav_exercises', ['favoriteExercises'=>$results]);
	}
	
	//A function that changes the rating of an exercise
	public function rateExercise(){
		if(isset($_POST['action'])){
			$rating = $this->model('exercise_rating');
			$rating->where('post_id', '=', $_POST['exercise_id']); 
			$rating->where('user_id', '=', $_SESSION['userID']); 
			$rating->post_id = $_POST['exercise_id'];
			$rating->user_id = $_SESSION['userID'];
			$rating->rating = $_POST['rating'];
			if(count($rating->get())==0){
				$rating->insert();
			}else{			
				$rating->update();
			}
		}
		$this->view('Home/Main');
	}
}
?>