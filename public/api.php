<?php
// spl_autoload_register(function ($className) {
//         echo require_once '../app/' .join('/', explode('\\', $className)) . '.php';
//     }
// );

require_once dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

use App\Controllers\AuthorizationController;
use App\Controllers\RegistrationController;
use App\Controllers\OperationsController;
use App\Controllers\AddOperationsController;
use App\View;


$authorization = new AuthorizationController();
$registration = new RegistrationController();
$operations = new OperationsController();
$addOperations = new AddOperationsController();


/*echo ;
echo $operations->viewOperations();
echo $addOperations->viewAddOperations();
*/




if (empty($_GET)) {
	$contentView = $authorization->viewAuthorization();
	//$path = dirname(__DIR__, 1) . "/views/template_view.php";
	echo new View("/financeSPA/views/template_view.php", [$contentView]);
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