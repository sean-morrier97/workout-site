<?php

class comments extends Model{
    public $id; 
	public $content;
	public $likes;
	public $posted_date;
	public $poster;
	public $post_id;
	
	public function __construct(){
		parent::__construct();
	}
	
	public function muscles($id, $content, $likes, $posted_date, $poster, $post_id){
		$this->$id = $id;
		$this->$content = $content;
		$this->$likes = $likes;
		$this->$posted_date = $posted_date;
		$this->$poster = $poster;
		$this->$post_id = $post_id;
	}
}