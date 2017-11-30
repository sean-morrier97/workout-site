<?php
/*
A class that instantiate the fields for exercise_detail table
*/
class exercise_detail extends Model{
	//The fields that are used in the exercise_detail table
    public $exercise_id; 
	public $muscle_id;
	
	public function __construct(){
		parent::__construct();
	}
}