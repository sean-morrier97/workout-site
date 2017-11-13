<?php

class following extends Model{
    public $id; 
	public $follower_id;
	public $followee_id;
	public $status;
	
	public function __construct(){
		parent::__construct();
	}
}