<?php
require_once dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "config.php";


use App\Controllers\AuthorizationController;
use App\Controllers\RegistrationController;
use App\Controllers\OperationsController;
use App\Controllers\ActionOperationsController;

//(new Connection())->openConnectionDB();

/**Отслеживание GET запросов, с дальнейшей адресации страницы*/
match ($_GET['page']) {
	 'authorization' => (new AuthorizationController())->viewAuthorization(),
	 'registration' =>(new RegistrationController())->viewRegistration(),
	 'operation_list' =>(new OperationsController())->viewOperations(),
		//(new OperationsController())->getAllOperations(),
    'add_operation' =>(new ActionOperationsController())->viewAddOperations(),

	/*default : 
		$html = (new View("../views/404_not_found.php"));
		(new Response('success', $html))->getResponse();
		break;*/
};


match ($_POST['form-name']) {
	'authorization' => (new AuthorizationController())->validationAuthentication(trim($_POST['login']), trim($_POST['password'])),
	'registration' => (new RegistrationController())->validationRegistration(trim($_POST['login']), trim($_POST['password']), trim($_POST['repeat-password'])),
	'add_operation' => (new ActionOperationsController())->add($_POST['idUser'], trim($_POST['sum']), trim($_POST['operations-type']), trim($_POST['comment'])),
};

match ($_GET['action']) {
     'edit' => (new ActionOperationsController())->edit(trim($_POST['sum']), trim($_POST['type-id']), trim($_POST['user-id']), trim($_POST['comment'])),
     'delete' => (new ActionOperationsController())->delete(trim($_POST['sum']), trim($_POST['type-id']), trim($_POST['user-id']), trim($_POST['comment'])),
};


/*
Log::debug(json_encode(file_get_contents('php://input')));

$logContent = ['get' => $_GET, 'post' => $_POST];
Log::debug(json_encode($logContent));*/