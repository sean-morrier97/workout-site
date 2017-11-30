<?php
/*
A class that instantiate the fields for muscle_group table
*/
class muscle_group extends Model{
	//The fields that are used in the muscle_group table 
    public $muscle_group_id; 
	public $muscle_group_name;
	
	public function __construct(){
		parent::__construct();
	}
	//Two-parameter constructor 
	public function muscle_group($muscle_group_id, $muscle_group_name){
		$this->$muscle_group_id = $muscle_group_id;
		$this->$muscle_group_name = $muscle_group_name;
	}
}