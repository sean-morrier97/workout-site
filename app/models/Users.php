<?php

class users extends Model{
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
	
	public function update(){
		parent::update("UPDATE Users set privacy_setting = " . $this->privacy_setting . " where id = " . $this->id);
	}
}