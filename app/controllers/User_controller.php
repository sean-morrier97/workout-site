<?php

class User_controller extends Controller{
	private $deletedAccountStatus = 0;
	public function search(){
		$user = $this->model('Users');
		$user->where('username', 'like', '$_POST[\'searchParam\']');
		$user->orderby('username');
		$results[] = $exercise->get();
		for( $i = 0; $i<results.count(), $i++){
			
		}
	}
	
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
		try{
			$user->id = $results->id;
			$user->delete();
		}
	}
	
	public function listOfFollowers(){
		$user = $this->model('following');
		$user->where('followee_id', '=', '$_SESSION[\'userID\']')
		
	}
?>