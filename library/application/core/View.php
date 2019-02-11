<?php

//подключает layout(default/admin), вид страницы
class View 
{
	public $path;
	public $actionAndController;
	public $layout = 'default';
	
	public function __construct($actionAndController)
	{
		$this->path = 'application/views/' . $actionAndController['controller'] . '/' . $actionAndController['action'] . '.php';
		$this->actionAndController = $actionAndController;
	}

	public function render($title, $vars = []) {
		extract($vars);

		if(file_exists($this->path)) {
			ob_start();
			require $this->path;
			$content = ob_get_clean();
			require 'application/views/layouts/' . $this->layout. '.php';
		}
		else{
			echo 'Вид страницы не найден';
		}

	}

	public function redirect($url) {
		header('location: ' . $url);
		exit;
	}


}