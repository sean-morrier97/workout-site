<?php

class favorite_exercises extends Model{
    public $exercise_id; 
	public $user_id;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function doesExist(){
		parent::where('exercise_id', '=', $exercise_id);
		parent::where('user_id', '=', $user_id);
		return count(parent::get())==0;
	}
	
	public function joinedGet(){
		$select	= "SELECT * FROM exercise e , favorite_exercises fe 
					where user_id = $this->user_id AND e.exercise_id = fe.exercise_id";
		return parent::get($select);
    }
	
	public function deleteFavorite(){
		$delete = "DELETE FROM $this->_className WHERE exercise_id = $this->exercise_id and user_id = $this->user_id";
		return parent::delete($delete);
	}
}