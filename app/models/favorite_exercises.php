<?php

class favorite_exercises extends Model{
    public $exercise_id; 
	public $user_id;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function favorite_exercises($exercise_id, $user_id){
		$this->$exercise_id = $exercise_id;
		$this->$user_id = $user_id;
	}
	
	public function doesExist(){
		parent::where('exercise_id', '=', $exercise_id);
		parent::where('user_id', '=', $user_id);
		return parent::get();
	}
}