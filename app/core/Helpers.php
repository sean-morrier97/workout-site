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
	public function getExerciseTitle(){
		$user_id = $_SESSION['userID'];
		$select = "SELECT pr.record_id as record_id, pr.record as record, pr.exercise_id as exercise_id, e.title as title, pr.user_id as user_id 
		FROM personal_record pr INNER JOIN exercise e 
		ON pr.exercise_id = e.exercise_id WHERE pr.user_id = 2";
		$connection = $this->_connection->prepare($select);
		$connection->execute();
		$connection->setFetchMode(PDO::FETCH_CLASS, $this->_className);
		$output = [];
		while($con = $connection->fetch()){
			$output[] = $con;
		}
		return $output;
	}
}
	
?>