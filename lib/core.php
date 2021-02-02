<?php

spl_autoload_register(function ($className) {
	$filename = strtolower($className) . '.php';

	$expArr = explode('_', $className);
	if(empty($expArr[1]) || $expArr[1] == 'Base'){
		$folder = 'lib';
	}else{
		switch(strtolower($expArr[0])){
			case 'controller':
				$folder = 'controllers';
				break;

			case 'model':
				$folder = 'models';
				break;

			default:
				$folder = 'lib';
				break;
		}
	}

	$file = SITE_PATH . $folder . DS . $filename;

	if (file_exists($file) == false) {
		return false;
	}

	include ($file);
});