<?php

class Workout_controller extends Controller{
	$workoutDetail;
	public function createworkout()
	{
		if(isset($_POST['action'])){
			$workoutDetail = $this->model('workout_detail');
			$workout = $this->model('workout');
			$workout->title = $_POST['title'];
			$workout->posted_date = 'NOW()';
			$workout->number_of_ratings = 0;
			$workout->average_rating = 0;
			$workout->posted_id = $_SESSION['userID'];
			$workout->workout_id = 0;
			$workoutDetail->workout_id = $workout->insert();
			$workoutDetail->position = 0;
		}
    }
	public function addExercise(){
		if(isset($_POST['action'])){
			$workoutDetail->exercise_id = $_POST['exercise_id'];
			$workoutDetail->position = $workoutDetail->position+1;
			$workoutDetail->sets = $_POST['sets'];
			$workoutDetail->reps = $_POST['reps'];
			$workoutDetail->muscle_group = findExerciseMuscleGroup($workoutDetail->exercise_id);
		}
	}
	
	private function findExerciseMuscleGroup($ID){
		$exercise = $this->model('exercise');
		$exercise->find($ID);
		return $exercise->muscle_id;
	}
}
?>