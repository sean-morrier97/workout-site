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
		parent::get("select * from post where poster in (select 
			followee_id from following where follower_id = " . $_SESSION['userID'] . ")");
	}
	
	public function getMyPosts(){
		parent::get("select * from post where poster = " . $_SESSION['userID']);
	}
}