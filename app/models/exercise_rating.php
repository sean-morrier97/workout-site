<?php
/*
A class that instantiate the fields for exercise_rating table
*/
class exercise_rating extends Model{
	//The fields that are used in the exercise_rating table
	public $_PKName = 'id';
    public $id;
    public $post_id;
	public $user_id;
	public $rating;
	
	public function __construct(){
		parent::__construct();
	}
	
	//A function to update the rating of an exercise
	public function update(){
		$update = "UPDATE exercise_rating SET rating = $this->rating WHERE post_id = $this->post_id and user_id = $this->user_id";
		parent::update($update);
	}
}