<?php

class post_like extends Model{
    public $id; 
    public $post_id; 
	public $user_id;
	
	public function __construct(){
		parent::__construct();
	}
}