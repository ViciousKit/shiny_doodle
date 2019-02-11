<?php

/**
 * 
 */
class Router 
{
	protected $routes;
	protected $controllerAndAction;

	public function __construct() {
		$route = require 'application/config/routes.php';
		$this->addRegex($route);
	}

	public function addRegex($route) {
		foreach ($route as $key => $value) {
			$key = '#^' . $key . '$#';
			$this->routes[$key] = $value;

		}
	}

	public function match() {
		$url = substr($_SERVER['REQUEST_URI'], 9);
		foreach ($this->routes as $route => $actionController) {
			if(preg_match($route, $url)) {
				$this->controllerAndAction = $actionController;
				//если в ссылке есть параметр id, то передаем в массив этот id
				if(isset($this->controllerAndAction['id'])) {
					preg_match('/[a-z]+_id:\d+/', $_SERVER['REQUEST_URI'], $matches);
					$this->controllerAndAction['id'] = substr($matches[0], 8);
				}
				return true;
			}
		}
		return false;
	}

	public function run() {
		if($this->match()) {
			$controllerName = ucfirst($this->controllerAndAction['controller']). 'Controller'; //MainController
			$controllerPath = 'application/controllers/' . $controllerName . '.php'; 

			if(file_exists($controllerPath)) {
				require 'application/core/Controller.php';
				require $controllerPath; //application/controllers/MainController.php

				$action = $this->controllerAndAction['action'];
				if(method_exists($controllerName, $action)) {
					$controller = new $controllerName($this->controllerAndAction); //создаем экземпляр MainController
					$controller->$action(); //вызываем метод Maincontroller
				}
			}

		}
	}

}