<?php

class workout_rating extends Model{
    public $workout_id; 
	public $user_id;
	public $rating;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function workout_rating($workout_id, $user_id, $rating){
		$this->$workout_id = $workout_id;
		$this->$user_id = $user_id;
		$this->$rating = $rating;		
	}
	
	public function doesExist(){
		parent::where('workout_id', '=', $workout_id);
		parent::where('user_id', '=', $user_id);
		return parent::get();
	}
}