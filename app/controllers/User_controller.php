<?php

class User_controller extends Controller{
	private $deletedAccountStatus = 0;
	
	public function setAccountPrivacy(){
		$user = $this->model('Users');
		$user->privacy_setting = $_POST['pSettings'];
		$user->id = $_SESSION['userID'];
		$user->update();
	}
	//undelete account when they login function(<- must be changed))
	public function deleteAccount(){
		$user = $this->model('Users');
		$user->id = $_SESSION['userID'];
		$user->status = deletedAccountStatus;
		$user->update();
	}
	
	public function followUser(){
		$user = $this->model('following');
		$user->id = 0;
		$user->follower_id = $_SESSION['userID'];
		$user->followee_id = $_POST['user_id'];
		if($_POST['status'] == 1)
			$user->status = 1;
		else{
			$user->status = 0;
		}
		$user->insert();
	}
	
	public function unfollowUser(){
		$user = $this->model('following');
		$user->where('follower_id', '=', '$_SESSION[\'userID\']');
		$user->where('followee_id', '=', '$_POST[\'followee_id\']');
		$results = $user->get();
		$user->id = $results->id;
		$user->delete();
		
	}
	
	public function listOfFollowers(){
		$user = $this->model('following');
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 88023fd0f79673ffc281e9b3afa212070be9ba40
		$user->where('followee_id', '=', '$_SESSION[\'userID\']');
		$results = $user->get();
		$this->view('Users/followers', ['followers'=>$results]);
	}
	
	public function listOfFollowees(){
		$user = $this->model('following');
		$user->where('follower_id', '=', '$_SESSION[\'userID\']');
		$results = $user->get();
		$this->view('Users/followings', ['followees'=>$results]);
	}
	
	public function viewProfile(){
		$user = $this->model('Users');
<<<<<<< HEAD
		$result = $user->find($_POST['userID']);
		$this->view('Users/User_info', ['user'=>$result]);
		if($result->status == 1){
			$following = $this->model('following');
			$following->where('follower_id', '=', '$_SESSION[\'userID\']');
			$following->where('followee_id', '=', '$_POST[\'userID\']');
			$followingResult = $following->get();
			if(count($followingResult) == 0){
				$this->view('Users/User_info', ['user'=>null]);				
			}else{
				if($followingResult[1]->status == 1)
					$this->view('Users/User_info', ['user'=>null]);	
=======
		$user->id = $_POST['userID'];
		$result = $user->get();
		$resultingUser = $result[0];
		if($resultingUser->status == 1){
			$following = $this->model('following');
			$following->where('follower_id', '=', '$_SESSION[\'userID\']');
			$following->where('followee_id', '=', '$_POST[\'userID\']');
			$result = $following->get();
			if(count($result)){
				$this->view('Users/User_info', ['user'=>null]);				
			}else{
				if($result[0]->status == 1)
					this->view('Users/User_info', ['user'=>null]);	
>>>>>>> 88023fd0f79673ffc281e9b3afa212070be9ba40
				else
					$this->view('Users/User_info', ['user'=>$resultingUser]);	
			}
		}
<<<<<<< HEAD
=======
=======
		$user->where('followee_id', '=', '$_SESSION[\'userID\']')
		
>>>>>>> 8b8afec05512a0158628e9da1a3d6000ee1a1feb
>>>>>>> 88023fd0f79673ffc281e9b3afa212070be9ba40
	}
}
?>