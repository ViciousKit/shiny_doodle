<?php

require 'application/core/View.php';
require 'application/core/Model.php';
require 'application/libs/Pagination.php';

//подключает View и модель по имени контроллера
abstract class Controller 
{
	public $view;
	public $model;
	public $controllerAndAction;

	public function __construct($controllerAndAction) {
		$this->controllerAndAction = $controllerAndAction;
		$this->view = new View($controllerAndAction);
		$this->model = $this->loadModel($controllerAndAction['controller']);
		$this->pagination = new Pagination($a = 1, $b=2, $c=3);
	}

	public function loadModel($modelName) {
		$modelPath = 'application/models/' . ucfirst($modelName) . '.php';
		if(file_exists($modelPath)) {
			require $modelPath;
			return new $modelName;
		}
	}


}