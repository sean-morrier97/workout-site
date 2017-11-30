<?php
/*
A class that instantiate the fields for exercise table
*/
class exercise extends Model{
	//The fields that are used in the exercise table
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