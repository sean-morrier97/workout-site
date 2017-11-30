<?php
/*
A class that instantiates the fields for comment_like table
*/
class comment_like extends Model{
	//The fields that are used in the comment_like table 
	public $_PKName = 'id';
    public $id; 
    public $comment_id; 
	public $user_id;
	
	public function __construct(){
		parent::__construct();
	}

}