<?php

class workout_rating extends Model{
    public $ID; 
    public $workout_id; 
	public $user_id;
	public $rating;
	
	public function __construct(){
		parent::__construct();
	}
	
}