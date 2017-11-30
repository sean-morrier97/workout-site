<?php
/*
A class that instantiate the fields for post table
*/
class post extends Model{
	//The fields that are used in the post table
	public $_PKName = 'post_id';
    public $post_id; 
	public $likes;
	public $posted_date;
	public $poster;
	public $URL;
	
	public function __construct(){
		parent::__construct();
	}
	
	//A function to retrieve all the posts from the post table that are related to the followee
	public function getAllPosts(){
		$toQuery = "select * from post where poster in (select 
			follower_id from following where followee_id = " . $_SESSION['userID'] . ")";
		return parent::get($toQuery);
	}
	
	//A function to retrieve all the posts from the post table that are related to the user 
	public function getMyPosts(){
		return parent::get("select * from post where poster = " . $_SESSION['userID']);
	}
	
	//A function to delete all the posts when the user deletes their account
	public function deleteAccount(){
		parent::delete("delete from post where poster = " . $this->poster);
	}
}