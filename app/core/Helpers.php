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
	
	//A function to get user information using the user id
	public function getUsernameFromID($id){
		$user = $this->model('Users');		
		$user->where('id', '=', $id);
		return $user->get();
	}
	
	//A function to get an exercise title using the exercise id
	public function getExerciseTitle($id){
		$exercise = $this->model('exercise');
		$exercise->where('exercise_id', '=', $id);
		$results = $exercise->get();
		return $results[0];
	}
	
	//A function to get comments using post id
	public function getComments($post_id){
		$comments = $this->model('comments');
		$comments->where('post_id', '=', $post_id);
		$results = $comments->get();
		return $results;
	}
}
?>