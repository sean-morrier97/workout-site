<?php
class LoginCore{
	public static function login($username, $password){
		$user = Controller::model('Users');
		$users = $user->where('username','=',$username)->get();
		
		if(isset($users[0])){
			if(password_verify($password, $users[0]->password_hash)){
				$_SESSION['username'] = $username;
				$_SESSION['userID'] = $users[0]->id;
			}
		}
	}
	
	public static function isLoggedIn(){
		return isset($_SESSION['username']);
	}
	
	public static function logout(){
		unset($_SESSION['username']);
		unset($_SESSION['userID']);
	}
}
?>