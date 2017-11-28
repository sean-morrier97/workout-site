<?php

class exercise extends Model{
	public $exercise_id;
    public $title; 
	public $number_of_ratings;
	public $average_rating;
	public $posted_date;
	public $poster_id;
	
	public function __construct(){
		parent::__construct();
	}
}
?>