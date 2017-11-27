<?php
class Helpers{
	public function getPosts(){
		$post = $this->model('post');
		return $post->get();
	}
	public function getUsernameFromID($id){
		$user = $this->model('Users');		
		$user->where('id', '=', $id);
		return $user->get();
	}
	
}
	
?>