<?php
/*
A class that instantiate the fields for following table
*/
class following extends Model{
	//The fields that are used in the following table
    public $id; 
	public $follower_id;
	public $followee_id;
	public $status;
	
	//A function to update the status of a follower or a followee
	public function update(){
		parent::update("UPDATE following set status = " . $this->status . " where id = " . $this->id);
	}
	
	//A function that deletes followings when the user deletes their account
	public function deleteAccount(){
		parent::delete("delete from following where follower_id = " . $this->follower_id);
		parent::delete("delete from following where followee_id = " . $this->followee_id);
	}
}