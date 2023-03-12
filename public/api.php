<?php
require_once dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "config.php";


use App\Controllers\AuthorizationController;
use App\Controllers\RegistrationController;
use App\Controllers\OperationsController;
use App\Controllers\AddOperationsController;
use App\Response;
use App\Services\Log;
use App\View;
use App\DB\Connection;

//(new Connection())->openConnectionDB();

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
		(new OperationsController())->getOperations();
		break;
	case 'add_operation':
		(new AddOperationsController())->viewAddOperations();
		break;
	/*default : 
		$html = (new View("../views/404_not_found.php"));
		(new Response('success', $html))->getResponse();
		break;*/
}


switch ($_POST['form-name']) {
	case 'authorization':
		(new AuthorizationController())->validationAuthentication(trim($_POST['login']), trim($_POST['password']));
		break;
	case 'registration':
		(new RegistrationController())->validationRegistration(trim($_POST['login']), trim($_POST['password']), trim($_POST['repeat-password']));
		break;
}

/*
Log::debug(json_encode(file_get_contents('php://input')));

$logContent = ['get' => $_GET, 'post' => $_POST];
Log::debug(json_encode($logContent));*/