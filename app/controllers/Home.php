<?php

class Home extends Controller{

	public function index($name = '')
	{
        $user = $this->model('User');
        $user->name = $name;
        $this->view('home/index');
    }
	public function Main(){
		$this->view('Home/Main');
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
<<<<<<< HEAD
			$this->view('Home/Search', ['searchResults'=>$results, 'resultType'=>$resultType]);
=======
<<<<<<< HEAD
			$this->view('Home/Search', ['searchResults'=>$results, 'resultType'=>$resultType]);
=======
			$this->view('Home/search', ['searchResults'=>$results, 'resultType'=>$resultType]);
>>>>>>> 8b8afec05512a0158628e9da1a3d6000ee1a1feb
>>>>>>> 88023fd0f79673ffc281e9b3afa212070be9ba40
		}
	}
}
?>

