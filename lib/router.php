<?php


class router
{
	private $controllerPath;
	private $viewsPath;
	private $args = array();


	function setPath($controllerPath, $viewsPath) {
		$controllerPath = rtrim($controllerPath, '/\\');
		$controllerPath .= DS;
		if (is_dir($controllerPath) == false) {
			throw new Exception ('Invalid controller path: `' . $controllerPath . '`');
		}
		$this->controllerPath = $controllerPath;

		$viewsPath = rtrim($viewsPath, '/\\');
		$viewsPath .= DS;
		if (is_dir($viewsPath) == false) {
			throw new Exception ('Invalid controller path: `' . $viewsPath . '`');
		}
		$this->viewsPath = $viewsPath;
	}


	private function getController(&$file, &$controller, &$action, &$args) {
		$route = (empty($_GET['route'])) ? '' : $_GET['route'];
		unset($_GET['route']);
		if (empty($route)) {
			$route = 'index';
		}


		$route = trim($route, '/\\');
		$parts = explode('/', $route);


		$cmd_path = $this->controllerPath;
		foreach ($parts as $part) {
			$fullpath = $cmd_path . 'controller_' . $part;

			if (is_dir($fullpath)) {
				$cmd_path .= $part . DS;
				array_shift($parts);
				continue;
			}

			if (is_file($fullpath . '.php')) {
				$controller = 'Controller_' . $part;
				array_shift($parts);
				break;
			}
		}

		if (empty($controller)) {
			$controller = 'Controller_All_Phones';
		}

		$lastParts = array_shift($parts);
		if (is_readable($this->viewsPath . $lastParts . 'index.php') == false) {
			if (count($_GET) > 0){
				foreach ($_GET as $key => $value) {
					$args [$key] = $value;
				}
			}else {
				$args =$lastParts;
			}
			$action = 'index';
		} else {
			$action = $lastParts;
		}


		$file = $cmd_path . $controller . '.php';
	}

	function start() {
		$this->getController($file, $controller, $action, $args);

		if (is_readable($file) == false) {
			die ('404 Not Found');
		}

		include ($file);

		$controller = new $controller();

		if (is_callable(array($controller, $action)) == false) {
			die ('404 Not Found');
		}

		$controller->$action($args);
	}
}