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
	
	public function post($post_id, $likes, $posted_date, $poster, $URL){
		$this->$post_id = $post_id;
		$this->$likes = $likes;
		$this->$posted_date = $posted_date;
		$this->$poster = $poster;
		$this->$URL = $URL;
	}
}