<?php

//Автозагрузка классов с помощью composer
require_once dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

use App\Controllers\AuthorizationController;
use App\Controllers\RegistrationController;
use App\Controllers\OperationsController;
use App\Controllers\AddOperationsController;



$operations = new OperationsController();
$addOperations = new AddOperationsController();



/**Отслеживание GET запросов, с дальнейшей адресации страницы*/
if (empty($_GET)) {

	(new AuthorizationController())->viewAuthorization();

	// echo json_encode(['html' => (new AuthorizationController())->viewAuthorization()]);
	
	//$path = dirname(__DIR__, 1) . "/views/template_view.php";
	//echo new View("/financeSPA/public/index.php", [$contentView]);
}

if ($_GET['registration']) {
	(new RegistrationController())->viewRegistration();
}

		// echo require_once("index.php");
		// $path = dirname(__DIR__, 1) . "/views/template_view.php";
		// $path = "../views/template_view.php";
		// var_dump($path);
		
		// require_once("/financeSPA/views/template_view.php");
		// echo new View($path);
		
		
		
// 		break;
// 	case "/registration" :
// 		$contentView = $registration->viewRegistration();
// 		require_once("../views/template_view.php"); 
// 		break;
// 	case "/main_operations" :
// 		$contentView = $operations->viewOperations();
// 		require_once("../views/template_view.php"); 
// 		break;
// 	case "/add_operation" :
// 		$contentView = $addOperations->viewAddOperations();
// 		require_once("../views/template_view.php"); 
// 		break;
// 	default : 
// 		require_once("../views/404_not_found.php");
// 	    break;
// }

// var_dump($contentView);