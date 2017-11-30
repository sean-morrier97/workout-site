<?php
/*
A class that instantiate the fields for workout_rating table
*/
class workout_rating extends Model{
	//The fields that are used in the workout_rating table
    public $ID; 
    public $workout_id; 
	public $user_id;
	public $rating;
	
	public function __construct(){
		parent::__construct();
	}
	
}