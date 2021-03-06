<?php
class App
{
	protected $controller = 'home';
	protected $method = 'index';
	protected $params = [];
	protected $loginURL = '/Login';
	protected $publicURL = ['Login','Login/signup'];

	//TODO: integrate login rerouting in this location
	public function __construct(){
		$url = $this->parseURL();

		if(
				!LoginCore::isLoggedIn()
				&& !$this->isPublicURL()
			){
			header('location:'.$this->loginURL);
			return;
		}

		if(file_exists('app/controllers/' . $url[0] . '.php')){
			$this->controller = $url[0];
			unset($url[0]);
		}

		require_once 'app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller();

		if(isset($url[1])){
			if(method_exists($this->controller, $url[1])){
				$this->method = $url[1];
				unset($url[1]);
			}
		}
		$this->params = $url ? array_values($url) : [];

		call_user_func_array([$this->controller, $this->method], $this->params);

	}

	public function parseUrl(){
		if(isset($_GET['url'])){
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}

	public function isPublicURL(){
		$url = $_GET['url'];
		return in_array ( $url , $this->publicURL);
	}


}

?>