<?php
/*
A controller that handles user related actions
*/
class User_controller extends Controller{
	private $deletedAccountStatus = 0;
	
	//The function redirects the user to the settings view
	public function settings(){
		$this->view('Users/settings');
	}
	
	//A function to change the account privacy
	public function setAccountPrivacy(){
		$user = $this->model('Users');
		$user->privacy_setting = $_POST['pSettings'];
		$user->id = $_SESSION['userID'];
		$user->update();
		$this->view('Home/Main');
		
	}
	//undelete account when they login function(<- must be changed))
	//A function to delete an account
	public function deleteAccount(){
		$user = $this->model('Users');
		$user->id = $_SESSION['userID'];
		$user->delete();
		$temp = $this->model('favorite_exercises');
		$temp->user_id = $_SESSION['userID'];
		$temp->deleteAccount();
		$temp = $this->model('favorite_workouts');
		$temp->user_id = $_SESSION['userID'];
		$temp->deleteAccount();
		$temp = $this->model('following');
		$temp->follower_id = $_SESSION['userID'];
		$temp->followee_id = $_SESSION['userID'];
		$temp->deleteAccount();
		$temp = $this->model('personal_record');
		$temp->user_id = $_SESSION['userID'];
		$temp->deleteAccount();
		$temp = $this->model('post');
		$temp->poster = $_SESSION['userID'];
		$temp->deleteAccount();
		LoginCore::logout();
	}
	
	//A function to follow a user
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
		$this->view("Home/Main");
	}
	
	//A function to unfollow a user
	public function unfollowUser(){
		$following = $this->model('following');
		$following->ID = $_POST['id'];
		$following->delete();
		$this->view("/Home/Main");
	}
	
	//A function to call the list of followers and the list of followees
	public function followInfo(){
		$followees = $this->listOfFollowees();
		$followers = $this->listOfFollowers();
		$this->view('Users/followers', ['followers'=>$followers, 'followees'=>$followees]);		
	}
	
	//A function to show the list of followers
	public function listOfFollowers(){
		$following = $this->model('following');
		$following->where('followee_id', '=', $_SESSION['userID']);
		$results = $following->get();
		return $results;
	}
	
	//A function to show the list of followees
	public function listOfFollowees(){
		$following = $this->model('following');
		$following->where('follower_id', '=', $_SESSION['userID']);
		$results = $following->get();
		return $results;
	}
	
	//A function to view a user's profile
	public function viewProfile(){
		$user = $this->model('Users');
		$result = $user->find($_POST['userID']);
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
	
	//A function to show all personal records
	public function getPR(){
		$exercise = $this->model('personal_record');
		$exercise->where('user_id', '=', $_SESSION['userID']);
		$results = $exercise->get();
		$this->view('Users/personal_record', ['records'=>$results]);
	}
	
	//A function to create a personal record
	public function createPR(){
		
		if(isset($_POST['action'])){
			$record = $this->model('personal_record');
			$record->user_id = $_SESSION['userID'];
			$record->exercise_id = $_POST['exercises'];
			$record->record_id = 0;
			$record->record = $_POST['record'];
			$record->insert();
			$this->view('Home/Main');
		}
		else{
			$this->view('Users/createRecord', ['exercise_id'=>$_POST['exercise_id']]);
		}
		
	}
	
	//A function to update a personal record
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
	//A function to accept the followers 
	public function acceptFollowing(){
		$following = $this->model('following');
		$following->id = $_POST['id'];
		$following->status = 0;
		$following->update();
	}
}
?>