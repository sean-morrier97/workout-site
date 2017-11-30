<?php
/*
A class that instantiate the fields for personal_record table
*/
class personal_record extends Model{
	//The fields are used in the personal_record table
	public $_PKName = 'record_id';
    public $record_id; 
	public $record;
	public $exercise_id;
	public $user_id;
	
	public function __construct(){
		parent::__construct();
	}
	
	//A function that deletes all personal records of the user when they delete their account
	public function deleteAccount(){
		parent::delete("delete from personal_record where user_id = " . $this->user_id);
	}
	
}