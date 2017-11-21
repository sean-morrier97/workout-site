<?php

class Workout_controller extends Controller{
	private $workoutDetail;
	public function createworkout()
	{
		$this->view('Workout/create');
		if(isset($_POST['action'])){
			$workoutDetail = $this->model('workout_detail');
			$workout = $this->model('workout');
			$workout->title = $_POST['title'];
			$workout->posted_date = 'NOW()';
			$workout->number_of_ratings = 0;
			$workout->average_rating = 0;
			$workout->poster_id = $_SESSION['userID'];
			$workout->workout_id = 0;
			$workoutDetail->workout_id = $workout->insert();
			$noOfWorkouts = $_POST['noOfExercises'];
			$cookie_name = 'noOfExercises';
			setcookie($cookie_name, $noOfWorkouts, time() + (86400 * 30), "/");
			nextExercise();
		}
    }
	
	private function nextExercise(){
		$iterationsLeft = $_COOKIE['noOfExercises'];
		if($iterationsLeft==0){
			$_COOKIE['noOfExercises'] = $iterationsLeft - 1;
			$this->view('Workout/nextExercise');			
		}
	}
	
	public function addExercise(){
		if(isset($_POST['action'])){
			$workoutDetail->exercise_id = $_POST['exercise_id'];
			$workoutDetail->position = $workoutDetail->position+1;
			$workoutDetail->sets = $_POST['sets'];
			$workoutDetail->reps = $_POST['reps'];
			$workoutDetail->muscle_group = findExerciseMuscleGroup($workoutDetail->exercise_id);
			nextExercise();
		}
	}
	
	private function findworkoutMuscleGroup($ID){
		$workout = $this->model('workout');
		$workout->find($ID);
		return $workout->muscle_id;
	}

	
	public function addToFavorites(){
		if(isset($_POST['action'])){
			$workout = $this->model('favorite_workout');
			$workout->workout_id = $_POST['workout_id']; 
			$workout->user_id = $_SESSION['userID'];
			if($workout->doesExist() == null){
				$workout->insert();
			}else{
				//display error message
			}
		}
	}
	
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