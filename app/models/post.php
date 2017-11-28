<?php

class post extends Model{
	public $_PKName = 'post_id';
    public $post_id; 
	public $likes;
	public $posted_date;
	public $poster;
	public $URL;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function getAllPosts(){
		$toQuery = "select * from post where poster in (select 
			follower_id from following where followee_id = " . $_SESSION['userID'] . ")";
		return parent::get($toQuery);
	}
	
	public function getMyPosts(){
		return parent::get("select * from post where poster = " . $_SESSION['userID']);
	}
}