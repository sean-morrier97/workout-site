<?php

class comment_like extends Model{
	public $_PKName = 'id';
    public $id; 
    public $comment_id; 
	public $user_id;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function comment_like($comment_id, $user_id){
		$this->$comment_id = $comment_id;
		$this->$user_id = $user_id;
	}
}