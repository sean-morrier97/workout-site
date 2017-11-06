<?php

class workout_detail extends Model{
    public $workout_id; 
	public $exercise_id;
	public $position;
	public $sets;
	public $reps;
	public $muscle_group;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function workout_detail($workout_id, $exercise_id, $position, $sets, 
																$reps, $muscle_group){
		$this->$workout_id = $workout_id;
		$this->$exercise_id = $exercise_id;
		$this->$position = $position;
		$this->$sets = $sets;
		$this->$reps = $reps;
		$this->$muscle_group = $muscle_group;
	}

}