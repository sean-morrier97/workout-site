<?php
/*
A class that instantiate the fields for favorite_workout table
*/
class favorite_workouts extends Model{
	//The fields that are used in the favorite_workout table
    public $workout_id; 
	public $user_id;
	
	//A function to get the favorite workouts 
	public function joinedGet(){
		$select	= "SELECT * FROM workout w , favorite_workouts fw 
					where user_id = $this->user_id AND w.workout_id = fw.workout_id";
		return parent::get($select);
    }
	//A function to delete a workout from favorite workouts 
	public function deleteFavorite(){
		$delete = "DELETE FROM $this->_className WHERE workout_id = $this->workout_id and user_id = $this->user_id";
		return parent::delete($delete);
	}
	//A function to delete favorite workouts when the user deletes their account
	public function deleteAccount(){
		parent::delete("delete from favorite_workouts where user_id = " . $this->user_id);
	}
}