<?php

class post_like extends Model{
    public $post_id; 
	public $user_id;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function post_like($post_id, $user_id){
		$this->$post_id = $post_id;
		$this->$user_id = $user_id;
	}
}