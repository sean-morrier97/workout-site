<?php
/*
Login controller that handles login, logout and registration
*/
class Login extends Controller{
	
	//The function that lets the user to log in to the website
	public function index(){
		$user = $this->model('Users');
		if(isset($_POST['action'])){
			$username = $_POST['username'];
			$password_hash = $_POST['password'];
			LoginCore::login($username, $password_hash);
			$this->view('home/Main');
		}else{
			$this->view('Login/index');			
		}
	}

	//The function that lets the user to register on the website
	public function signup(){
		$user = $this->model('Users');
		try{
			if(isset($_POST['action'])){
				$user->id = 0;
				$user->username = $_POST['username'];
				$user->email = $_POST['email'];
				$user->password_hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
				$user->dob = $_POST['dob'];
				if($_POST['privacy']=='private')
					$user->privacy_setting = 1;
				else
					$user->privacy_setting = 0;
				$user->status = 1;
				$user->insert();

				
				header('location:/home/Main');
				
			}else
				$this->view('Login/signup');
		}catch (Exception $e){
			$this->view('Login/signup');			
		}
	}
	
	//The function that lets the user to log out from the website 
	public function logout(){
		LoginCore::logout();
		header('location:/Login');
	}
}
?>