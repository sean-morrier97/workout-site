<?php

class favorite_workout extends Model{
    public $workout_id; 
	public $user_id;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function favorite_workout($workout_id, $user_id){
		$this->$workout_id = $workout_id;
		$this->$user_id = $user_id;
	}
}