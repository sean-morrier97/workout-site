<?php

class exercise_rating extends Model{
	public $_PKName = 'id';
    public $id;
    public $post_id;
	public $user_id;
	public $rating;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function update(){
		$update = "UPDATE exercise_rating SET rating = $this->rating WHERE post_id = $this->post_id and user_id = $this->user_id";
		parent::update($update);
	}
}