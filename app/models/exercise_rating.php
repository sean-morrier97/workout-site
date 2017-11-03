<?php

class exercise_rating extends Model{
    public $post_id;
	public $user_id;
	public $rating;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function exercise_rating($post_id, $user_id, $rating){
		$this->$post_id = $post_id;
		$this->$user_id = $user_id;
		$this->$rating = $rating;		
	}
}