<?php
/*
The controller that handles actions related to posts
*/
class Post_controller extends Controller{
	
	//A function that gets all posts
	public function myPosts(){
		$post = $this->model('post');
		$results = $post->getMyPosts();
		return $results;
	}
	
	//A function to delete a post
	public function deletePost(){
		$post = $this->model('post');
		$post->post_id = $_POST['post_id'];
		$post->delete();
	}
	
	//A funciton to share a post
	public function share(){
		$post = $this->model('post');
		//if($_POST['type'] == 1)
		$post->URL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$post->poster = $_SESSION['userID'];
		$post->posted_date = "NOW()";
		$post->likes = 0;
		$post->post_id = 0;
		$post->insert();
		$this->view('Home/Main');
	}
	
	//A function to like a post
	public function likePost(){
		$post = $this->model('post');
		$post = $post->where('post_id', '=', $_POST['post_id'])->get();
		$post = $post[0];
		$like = $this->model('post_like');
		$like->where("post_id", "=", $_POST['post_id']);
		$like->where("user_id", "=", $_SESSION['userID']);
		$results = $like->get();
		if(count($results )==0){
			$post->likes = ($post->likes)+1;
			$post->update();
			$like->id = 0;
			$like->post_id = $_POST['post_id'];
			$like->user_id = $_SESSION['userID'];
			$like->insert();
		}else{
			$post->likes = ($post->likes)-1;
			$post->update();
			$like->ID = $results[0]->id;
			$like->delete();
		}
		$this->view('home/main');
	}

	//A function to comment on a post
	public function commentOnPost(){
		$comment = $this->model('comments');
		$comment->id = 0;
		$comment->likes = 0;	
		$comment->posted_date = 'NOW()';	
		$comment->content = $_POST['comment'];	
		$comment->poster = $_SESSION['userID'];	
		$comment->post_id = $_POST['post_id'];	
		$comment->insert();
		$this->view('home/main');
	}
	
	//A function to like comment on a post
	public function likeComment(){
		$comment = $this->model('comments');
		$comment->where('id', '=', $_POST['comment_id']);
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
			$like->id = 0;
			$like->insert();
		}else{
			$comment->likes = ($comment->likes)-1;
			$comment->update();
			$like->id = $results[0]->id;
			$like->delete();
		}
		$this->view('home/main');
	}
}
?>