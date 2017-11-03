<?php

class muscle_group extends Model{
    public $muscle_group_id; 
	public $muscle_group_name;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function muscle_group($muscle_group_id, $muscle_group_name){
		$this->$muscle_group_id = $muscle_group_id;
		$this->$muscle_group_name = $muscle_group_name;
	}
}