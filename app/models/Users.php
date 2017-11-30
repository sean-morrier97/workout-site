<?php
/*
A class that instantiate the fields for users table
*/
class users extends Model{
	//The fields that are used in the users table
	public $_PKName = 'id';
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
	
	//A function that updates user's privacy settings
	public function update(){
		parent::update("UPDATE Users set privacy_setting = " . $this->privacy_setting . " where id = " . $this->id);
	}
}