<?php
spl_autoload_register(function ($className) {
        require_once './app' .join('/', explode('\\', $className)) . '.php';
    }
);

use src\User;

switch($_SERVER['REQUEST_URI'])
{ 
	case "/" :
		require_once("../views/template_view.php"); 
		break;
	default : 
		require_once("../views/404_not_found.php");
	    break;
}

