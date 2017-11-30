<?php

class favorite_workouts extends Model{
    public $workout_id; 
	public $user_id;
	
	
	public function joinedGet(){
		$select	= "SELECT * FROM workout w , favorite_workouts fw 
					where user_id = $this->user_id AND w.workout_id = fw.workout_id";
		return parent::get($select);
    }
	
	public function deleteFavorite(){
		$delete = "DELETE FROM $this->_className WHERE workout_id = $this->workout_id and user_id = $this->user_id";
		return parent::delete($delete);
	}
	
	public function deleteAccount(){
		parent::delete("delete from favorite_workout where user_id = " . $this->user_id)
	}
}