<?php

class post extends Model{
    public $post_id; 
	public $likes;
	public $posted_date;
	public $poster;
	public $URL;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function get(){
		$toQuery = "select * from post where poster in (select 
			follower_id from following where followee_id = " . $_SESSION['userID'] . ")";
		return parent::get($toQuery);
	}
	
	public function getMyPosts(){
		parent::get("select * from post where poster = " . $_SESSION['userID']);
	}
}