<?php

class comments extends Model{
	public $_PKName = 'id';
    public $id; 
	public $content;
	public $likes;
	public $posted_date;
	public $poster;
	public $post_id;
	
	public function __construct(){
		parent::__construct();
	}
	
}