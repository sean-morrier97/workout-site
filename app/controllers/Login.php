<?php
class Login extends Controller{
	public function index(){
		$user = $this->model('Users');
		if(isset($_POST['action'])){
			$username = $_POST['username'];
			$password_hash = $_POST['password'];
			LoginCore::login($username, $password_hash);
			$this->view('Exercises/create');
			//header('location:/Home/Main');
		}else{
			$this->view('Login/index');			
		}
	}


	public function signup(){
		$user = $this->model('Users');
		if(isset($_POST['action'])){
			$user->id = 0;
			$user->username = $_POST['username'];
			$user->email = $_POST['email'];
			$user->password_hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
			$user->dob = $_POST['dob'];
			$user->privacy_setting = $_POST['ps'];
			$user->insert();

			
			header('location:/home/Main');
			
		}else
			$this->view('Login/signup');
	}
	
	public function logout(){
		LoginCore::logout();
		header('location:/Login');
	}
}
?>