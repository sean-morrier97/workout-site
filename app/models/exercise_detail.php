<?php

class exercise_detail extends Model{
    public $exercise_id; 
	public $muscle_id;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function exercise_detail($exercise_id, $muscle_id){
		$this->$exercise_id = $exercise_id;
		$this->$muscle_id = $muscle_id;
	}
}