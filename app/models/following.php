<?php

class following extends Model{
    public $id; 
	public $follower_id;
	public $followee_id;
	public $status;
	
	public function update(){
		parent::update("UPDATE following set status = " . $this->status . " where id = " . $this->id);
	}
	
	public function deleteAccount(){
		parent::(delete("delete from following where follower_id = " . $this->follower_id));
		parent::(delete("delete from following where followee_id = " . $this->followee_id));
	}
}