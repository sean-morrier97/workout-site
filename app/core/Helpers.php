<?php
class Helpers{
	public function getPosts(){
		$post = $this->model('post');
		return $post->get();
	}
	public function getUsernameFromID($id){
		$user = $this->model('Users');		
		$user->where('id', '=', $id);
		return $user->get();
	}
	public function getExerciseTitle($id){
		$exercise = $this->model('exercise');
		$exercise->where('exercise_id', '=', $id);
		$results = $exercise->get();
		return $results[0];
	}
}
?>