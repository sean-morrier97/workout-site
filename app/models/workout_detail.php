<?php
/*
A class that instantiate the fields for workout_detail table
*/
class workout_detail extends Model{
	//The fields that are used in the workout_detail table
    public $workout_id; 
	public $exercise_id;
	public $position;
	public $sets;
	public $reps;
	public $muscle_group;
	
	public function __construct(){
		parent::__construct();
	}

}