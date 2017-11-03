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
?>