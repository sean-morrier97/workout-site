<?php

class Home extends Controller{

	public function index($name = '')
	{
        $user = $this->model('User');
        $user->name = $name;
        $this->view('home/index');
    }
	public function Main(){
		$this->view('home/Main');
	}    
	
	public function search(){
		if(isset($_POST['action'])){
			$searchParam = $_POST['searchParam'];
			if($_POST['searchOptions']==1){
				$resultType = 1;
				$search = $this->model('Users');
				$search->where('username', 'like', '%' . $searchParam . '%');				
			} else if ($_POST['searchOptions']==2){
				$resultType = 2;
				$search = $this->model('exercise');
				$search->where('title', 'like', '%' . $searchParam . '%');	
			}			
			else{
				$resultType = 3;
				$search = $this->model('workout');
				$search->where('title', 'like', '%' . $searchParam . '%');					
			}
			$results = $search->get();
			$this->view('Home/Search', ['searchResults'=>$results, 'resultType'=>$resultType]);
		}
	}
}
?>

