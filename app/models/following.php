<?php

class following extends Model{
    public $id; 
	public $follower_id;
	public $followee_id;
	public $status;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function following($id, $follower_id, $followee_id, $status){
		$this->$id = $id;
		$this->$follower_id = $follower_id;
		$this->$followee_id = $followee_id;
		$this->$status = $status;
	}
}