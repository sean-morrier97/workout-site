<?php
/*
A class that instantiate the fields for favorite_exercises table
*/
class favorite_exercises extends Model{
	//The fields that are used in the favorite_exercises table
	public $id;
    public $exercise_id; 
	public $user_id;
	
	public function __construct(){
		parent::__construct();
	}
	
	//A function to get the favorite exercises
	public function joinedGet(){
		$select	= "SELECT * FROM exercise e , favorite_exercises fe 
					where user_id = $this->user_id AND e.exercise_id = fe.exercise_id";
		return parent::get($select);
    }
	
	//A function to delete an exercise from favorite exercises
	public function deleteFavorite(){
		$delete = "DELETE FROM $this->_className WHERE exercise_id = $this->exercise_id and user_id = $this->user_id";
		return parent::delete($delete);
	}
	
	//A function to delete favorite exercises when the user deletes their account  
	public function deleteAccount(){
		parent::delete("delete from favorite_exercises where user_id = " . $this->user_id);
	}
}