<?php
/*
A class that instantiates the fields for comments table
*/
class comments extends Model{
	//The fields that are used in the comments table
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