<?php

class User_controller extends Controller{
	private $deletedAccountStatus = 0;
	public function settings(){
		$this->view('Users/settings');
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
		LoginCore::logout();
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
				else
					$this->view('Users/User_info', ['user'=>$result]);	
			}
		}else
			$this->view('Users/User_info', ['user'=>$result]);
	}
	
	public function getPR(){
		$exercise = $this->model('personal_record');
		$exercise->where('user_id', '=', $_SESSION['userID']);
		$results = $exercise->get();
		$this->view('Users/personal_record', ['exercise'=>$results]);
	}
	public function createPR(){
		$exercise = $this->model('exercise');
		$exercise->exercise_id = $_POST['exercise_id'];
		$result = $exercise->get();
		$this->view('Users/createRecord', ['exercise'=>$result[0]]);
	}

}
?>