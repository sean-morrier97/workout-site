<?php

class Workout_controller extends Controller{
	private $workoutDetail;
	public function createworkout()
	{
		if(isset($_POST['action'])){
			$workoutDetail = $this->model('workout_detail');
			$workout = $this->model('workout');
			$workout->title = $_POST['title'];
			$workout->posted_date = 'NOW()';
			$workout->number_of_ratings = 0;
			$workout->average_rating = 0;
			$workout->poster_id = $_SESSION['userID'];
			$workout->workout_id = 0;
			$workout->insert();
		}else{
			$this->view('Workout/create');
		}
    }
	
	public function addExercise(){
		if(isset($_POST['action'])){
			$workoutDetail->exercise_id = $_POST['exercise_id'];
			$workoutDetail->sets = $_POST['sets'];
			$workoutDetail->reps = $_POST['reps'];
		}else{
			$this->view('Workout/addExercise', ['exercise_id'=>$_POST['exercise_id']]);
		}
	}
	//remove muscle group and postition from workout_detail

	
	public function addToFavorites(){
		if(isset($_POST['action'])){
			$workout = $this->model('favorite_workout');
			$workout->where('workout_id', '=', $_POST['workout_id']); 
			$workout->where('user_id', '=', $_SESSION['userID']);
			$results = $workout->get();
			if(count($results) == 0){
				$workout->user_id = $_SESSION['userID'];
				$workout->workout_id = $_POST['workout_id']; 
				$workout->insert();
			}else{
				//display error message
			}
		}
	}
	//add id to workout favorites
	public function removeFromFavorites(){
		if(isset($_POST['action'])){
			$workout = $this->model('favorite_workout');
			$workout->workout_id = $_POST['workout_id']; 
			$workout->user_id = $_SESSION['userID'];
			if($workout->doesExist() == null){
				$workout->delete();
			}else{
				//display error message
			}
		}
	}
	
	public function viewFavorites(){
		$exercise = $this->model('favorite_workout');
		$exercise->where('posted_id', '=', '$_SESSION[\'userID\']');
		$results = $exercise->get();
	}
	
	public function rateWorkout(){
		if(isset($_POST['action'])){
			$workout = $this->model('workout_rating');
			$workout->workout_id = $_POST['workout_id']; 
			$workout->user_id = $_SESSION['userID'];
			$workout->rating = $_POST['rating'];
			if($workout->doesExist() == null){
				$workout->insert();
			}else{
				$workout->update();
			}
		}
	}
}
?>