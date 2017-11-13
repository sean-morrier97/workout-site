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
		if(isset($_POST['action'])){
			$exercise = $this->model('exercise');
			$exercise->where('title', 'like', '$_POST[\'searchParam\']');
			//$exercise->orderby('title');
			$results = $exercise->get();
			$this->view('Home/Main', ['searchResults'=>$results]);
		}
	}
	
	public function addToFavorites(){
		if(isset($_POST['action'])){
			$exercise = $this->model('favorite_exercises');
			$exercise->exercise_id = $_POST['exercise_id']; 
			$exercise->user_id = $_SESSION['userID'];
			if($exercise->doesExist() == null){
				$exercise->insert();
				$this->view('Home/Main', ['searchResults'=>null]);
			}else{
				//display error message
			}
		}
	}
	
	public function removeFromFavorites(){
		if(isset($_POST['action'])){
			$exercise = $this->model('favorite_exercises');
			$exercise->exercise_id = $_POST['exercise_id']; 
			$exercise->user_id = $_SESSION['userID'];
			if($exercise->doesExist() == null){
				$exercise->delete();
			}else{
				//display error message
			}
		}
	}
	
	public function viewFavorites(){
		$fav_exercise = $this->model('favorite_exercises');
		$fav_exercise->where('user_id', '=', '$_SESSION[\'userID\']');
		$results = $fav_exercise->get();
		$this->view('Exercises/fav_exercises', ['favorites'=>$results]);
	}
	
	public function rateExercise(){
		if(isset($_POST['action'])){
			$exercise = $this->model('exercise_rating');
			$exercise->exercise_id = $_POST['exercise_id']; 
			$exercise->user_id = $_SESSION['userID'];
			$exercise->rating = $_POST['rating'];
			if($exercise->doesExist() == null){
				$exercise->insert();
			}else{
				$exercise->update();
			}
		}
	}
}
?>