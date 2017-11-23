<?php

class personal_record extends Model{
    public $record_id; 
	public $record;
	public $exercise_id;
	public $user_id;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function personal_record($record_id, $record, $exercise_id, $user_id){
		$this->$record_id = $record_id;
		$this->$record = $record;
		$this->$exercise_id = $exercise_id;
		$this->$user_id = $user_id;
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