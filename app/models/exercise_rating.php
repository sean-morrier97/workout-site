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
	
	public function doesExist(){
		parent::where('post_id', '=', $this->post_id);
		parent::where('user_id', '=', $this->user_id);
		return count(parent::get())!=0;
	}
	
	public function update($rating){
		$update = 'UPDATE exercise_rating SET ' . $setClause . " WHERE $this->_PKName = :$this->_PKName";
		parent::get($update);
	}
}