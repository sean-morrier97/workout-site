<?php
/*
Workout controller that handles all actions related to workouts
*/
class Workout_controller extends Controller{
	private $workoutDetail;
	
	//A function to create a workout
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
	
	//A function to add an exercise to a workout
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

	//A function to add a workout to favorites
	public function addToFavorites(){
		if(isset($_POST['action'])){
			$workout = $this->model('favorite_workout');
			$workout->workout_id = $_POST['workout_id']; 
			$workout->id = 0; 
			$workout->user_id = $_SESSION['userID'];
			if(count($workout->get())==0){
				$workout->insert();
				$this->view('Home/Main');
			}else{
				$this->view('Home/Main');
			}
		}
	}
	//add id to workout favorites
	
	//A function to remove a workout from favorites
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
	
	//A function to show the favorites
	public function viewFavorites(){
		$exercise = $this->model('favorite_workout');
		$exercise->where('posted_id', '=', '$_SESSION[\'userID\']');
		$results = $exercise->get();
	}
	
	//A function to rate a workout
	public function rateWorkout(){
		if(isset($_POST['action'])){
			$workout = $this->model('workout_rating');
			$workout->where('user_id', '=', $_SESSION['userID']);
			$workout->where('workout_id', '=', $_POST['workout_id']);
			$workout->rating = $_POST['rating'];
			$results = $workout->get();
			if(count($results)!=0){
				$workout->where('id', '=', $results[0]->id);
				$workout->update();
			}else{
				$workout->workout_id = $_POST['workout_id']; 
				$workout->user_id = $_SESSION['userID'];
				$workout->insert();
			}
			$this->view('Home/main');
		}
	}
	
	//A function to view a workout
	public function viewWorkout(){
		$this->view('workout/display', ['workout_id'=>$_POST['workout_id']]);
		echo $_POST['workout_id'];
	}
}
?>