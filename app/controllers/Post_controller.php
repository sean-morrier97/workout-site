<?php

class Post_controller extends Controller{
	public function posts(){
		$post = $this->model('post');
		$post -> where('post_id', '=', '$_POST[\'userID\']');
		$results = $post->get();
		$this->view('Home/Main', ['posts'=>$results]);
	}
}
?>