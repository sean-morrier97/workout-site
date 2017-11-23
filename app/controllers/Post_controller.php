<?php

class Post_controller extends Controller{
	public function getPosts(){
		$post = $this->model('post');
		$results = $post->get();
		return $results;
	}
	
	public function myPosts(){
		$post = $this->model('post');
		$results = $post->getMyPosts();
		return $results;
	}
	
	public function deletePost(){
		$post = $this->model('post');
		$post->post_id = $_POST['post_id'];
		$post->delete();
	}
	
	public function share(){
		if(isset($_POST['action'])){
			$post = $this->model('post');
			$post->URL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$post->poster = $_SESSION['userID'];
			$post->posted_date = 'NOW()';
			$post->likes = 0;
			$post->post_id = 0;
			$post->insert();
			$this->view('Home/Main');
		}
	}
	
	public function likePost(){
		$post = $this->model('post');
		$post->id = $_POST['post_id'];
		$post = $post->get();
		$post = $post[0];
		$like = $this->model('post_like');
		$like->where("post_id", "=", $_POST['post_id']);
		$like->where("user_id", "=", $_SESSION['userID']);
		$results = $like->get();
		if(count($results )==0){
			$post->likes = ($post->likes)+1;
			$post->update();
			$like->post_id = $_POST['post_id'];
			$like->user_id = $_SESSION['userID'];
			$like->insert();
		}else{
			$post->likes = ($post->likes)-1;
			$post->update();
			$like->id = $results[0]->id;
			$like->delete();
		}
	}
	
	public function getComments(){
		$comments = $this->model('comments');
		$results = $comments->get();
		return $results;
	}
	
	public function commentOnPost(){
		$comment = $this->model('comments');
		$comment->id = 0;
		$comment->likes = 0;	
		$comment->posted_date = 'NOW()';	
		$comment->poster = $_SESSION['userID'];	
		$comment->post_id = $_POST['post_id'];	
		$comment->insert();
	}
	
	public function likeComment(){
		$comment = $this->model('comment');
		$comment->id = $_POST['comment_id'];
		$comment = $comment->get();
		$comment = $comment[0];
		$like = $this->model('comment_like');
		$like->where("comment_id", "=", $_POST['comment_id']);
		$like->where("user_id", "=", $_SESSION['userID']);
		$results = $like->get();
		if(count($results )==0){
			$comment->likes = ($comment->likes)+1;
			$comment->update();
			$like->comment_id = $_POST['comment_id'];
			$like->user_id = $_SESSION['userID'];
			$like->insert();
		}else{
			$comment->likes = ($comment->likes)-1;
			$comment->update();
			$like->id = $results[0]->id;
			$like->delete();
		}
	}
}
?>