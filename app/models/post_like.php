<?php
/*
A class that instantiate the fields for post_like table
*/
class post_like extends Model{
	//The fields that are used in the post_like table
    public $id; 
    public $post_id; 
	public $user_id;
	
	public function __construct(){
		parent::__construct();
	}
}