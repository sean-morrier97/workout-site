<?php

class Exercise_controller extends Controller{

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
	public function search(){
		$exercise = $this->model('exercise');
		$exercise->where('title', 'like', '$_POST[\'searchParam\']');
		$exercise->orderby('title');
		$results[] = $exercise->get();
		for( $i = 0; $i<results.count(), $i++){
			
		}
	}    
}
?>