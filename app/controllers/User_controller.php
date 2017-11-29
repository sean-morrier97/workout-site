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
		$user->followee_id = $_SESSION['userID'];
		$user->follower_id = $_POST['user_id'];
		if($_POST['status'] == 1)
			$user->status = 1;
		else{
			$user->status = 0;
		}
		$user->insert();
	}
	
	public function unfollowUser(){
		$following = $this->model('following');
		$following->ID = $_POST['id'];
		$following->delete();	
	}
	
	public function followInfo(){
		$followees = $this->listOfFollowees();
		$followers = $this->listOfFollowers();
		$this->view('Users/followers', ['followers'=>$followers, 'followees'=>$followees]);		
	}
	
	public function listOfFollowers(){
		$following = $this->model('following');
		$following->where('followee_id', '=', $_SESSION['userID']);
		$results = $following->get();
		return $results;
	}
	
	public function listOfFollowees(){
		$following = $this->model('following');
		$following->where('follower_id', '=', $_SESSION['userID']);
		$results = $following->get();
		return $results;
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
		$this->view('Users/personal_record', ['records'=>$results]);
	}
	public function createPR(){
		
		if(isset($_POST['action'])){
			$record = $this->model('personal_record');
			$record->where('user_id', '=', $_SESSION['userID']);
			$results = $record->get();
			$record->user_id = $results[0]->user_id;
			$record->exercise_id = $results[0]->exercise_id;
			//where('exercise_id', '=', $_POST['exercise_id']);
			if(count($results)==0){
				$record->exercise_id = $_POST['exercise_id'];
				$record->record_id = 0;
				$record->record = $_POST['record'];
				$record->user_id = $_SESSION['userID'];
				$record->insert();
			}else{
				$this->view('Users/createRecord', ['exercise_id'=>$results]);
			}
		}
		else{
			$this->view('Users/createRecord', ['exercise_id'=>$_POST['exercise_id']]);
		}
		
	}
	
	public function updatePR(){
		if(isset($_POST['action'])){
			$record = $this->model('personal_record');
			$record->record_id = $_POST['record_id'];
			$record->record = $_POST['record'];
			$result = $record->get();
			$record->user_id = $result[0]->user_id;
			$record->exercise_id = $result[0]->exercise_id;
			$record->update();
			$exercise = $this->model('personal_record');
			$exercise->where('user_id', '=', $_SESSION['userID']);
			$results = $exercise->get();
			$this->view('Users/personal_record', ['records'=>$results]);
		}
		else{
			$this->view('Users/personal_record', ['record_id'=>$_POST['record_id']]);
		}
		
	}
}
?>