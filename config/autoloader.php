<?php

	function __autoload($class_name){
		$paths = array('app/model', 'app/controller', 'app/DAO');

		$class = explode('\\', $class_name);

		$class_name = $class[count($class)-1];

		$exists = false;
		for($i=0; $i<count($paths); $i++){
			$src = $paths[$i].'/'.$class_name.'.class.php';
			if(file_exists($src)){
				include $src;
			}
		}

		

	}
