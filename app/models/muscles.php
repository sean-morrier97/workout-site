<?php

class muscles extends Model{
    public $muscle_id; 
	public $muscle_name;
	public $muscle_group_id;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function muscles($muscle_id, $muscle_name, $muscle_group_id){
		$this->$muscle_id = $muscle_id;
		$this->$muscle_name = $muscle_name;
		$this->$muscle_group_id = $muscle_group_id;
	}
}