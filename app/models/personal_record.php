<?php

class personal_record extends Model{
	public $_PKName = 'record_id';
    public $record_id; 
	public $record;
	public $exercise_id;
	public $user_id;
	
	public function __construct(){
		parent::__construct();
	}
	
}