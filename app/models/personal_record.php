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
}