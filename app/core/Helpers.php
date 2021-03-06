<?php
/*
A class that contains methods that can be used to call the database
*/
class Helpers{
	
	//A function to get all the posts 
	public function getPosts(){
		$post = $this->model('post');
		return $post->getAllPosts();
	}
	
	//A function that gets all posts the current user posted
	public function myPosts(){
		$post = $this->model('post');
		$results = $post->getMyPosts();
		return $results;
	}
	
	//A function to get user information using the user id
	public function getUsernameFromID($id){
		$user = $this->model('Users');		
		$user->where('id', '=', $id);
		$results = $user->get();
		if(count($results) == 0){
			$user->username = 'Unknown';
			$results = array($user);
		}
		return $results;
	}
	
	//A function to get an exercise title using the exercise id
	public function getExerciseTitle($id){
		$exercise = $this->model('exercise');
		$exercise->where('exercise_id', '=', $id);
		$results = $exercise->get();
		return $results[0]->title;
	}
	
	//A function to get comments using post id
	public function getComments($post_id){
		$comments = $this->model('comments');
		$comments->where('post_id', '=', $post_id);
		$results = $comments->get();
		return $results;
	}
	
	public function getWorkoutDetails($workout_id){
		$details = $this->model('workout_detail');
		$details->where('workout_id', '=', $workout_id);
		return $details->get();
	}
	
	public function getWorkoutRating($workout_id){
		$workout_rating = $this->model('workout_rating');
		$workout_rating->where('workout_id', '=', $workout_id);
		$results = $workout_rating->get();
		$total = 0;
		if(count($results)==0)
			return 0 . "";
		else{
			foreach($results as $item){
				$total += $item->rating;
			}
			return $total/count($results);
		}
	}
	
	public function getExerciseRating($exercise_id){
		$exercise_rating = $this->model('exercise_rating');
		$exercise_rating->where('post_id', '=', $exercise_id);
		$results = $exercise_rating->get();
		$total = 0;
		if(count($results)==0)
			return 0 . "";
		else{
			foreach($results as $item){
				$total += $item->rating;
			}
			return $total/count($results);
		}
	}
}
?>