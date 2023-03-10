<?php

//Автозагрузка классов с помощью composer
require_once dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

use App\Controllers\AuthorizationController;
use App\Controllers\RegistrationController;
use App\Controllers\OperationsController;
use App\Controllers\AddOperationsController;
use App\Response;
use App\View;


$addOperations = new AddOperationsController();



/**Отслеживание GET запросов, с дальнейшей адресации страницы*/
switch ($_GET['page']) {
	case 'authorization':
		(new AuthorizationController())->viewAuthorization();
		break;
	case 'registration':
		(new RegistrationController())->viewRegistration();
		break;
	case 'main_operations':
		(new OperationsController())->viewOperations();
		break;
	case 'add_operation':
		(new AddOperationsController())->viewAddOperations();
		break;
	/*default : 
		$html = (new View("../views/404_not_found.php"));
		(new Response('success', $html))->getResponse();
		break;*/
}

/*switch ($_POST['']) {
	case 'authorization': 
		echo"34233rwrfesrfesrfserf";
		break;
}*/

switch ($_POST['formm']) {
	case 'authorization':
		(new OperationsController())->viewOperations();
		break;
	
}