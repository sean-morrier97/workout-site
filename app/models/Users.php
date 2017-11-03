<?php

class users extends Model{
    public $id;
	public $username; 
	public $email;
	public $password_hash;
	public $dob;
	public $privacy_setting;
	public $status;
	
	public function __construct(){
		parent::__construct();	
	}
	public function insert(){
		parent::insert();
	}
	
}