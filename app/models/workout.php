<?php

class workout extends Model{
    public $workout_id; 
	public $title;
	public $number_of_ratings;
	public $average_rating;
	public $posted_date;
	public $posted_id;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function workout($workout_id, $title, $number_of_ratings, $average_rating, 
																$posted_date, $posted_id){
		$this->$workout_id = $workout_id;
		$this->$title = $title;
		$this->$number_of_ratings = $number_of_ratings;
		$this->$average_rating = $average_rating;
		$this->$posted_date = $posted_date;
		$this->$posted_id = $posted_id;
	}
}