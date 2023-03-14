<?php
require_once dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "config.php";


use App\Controllers\AuthorizationController;
use App\Controllers\RegistrationController;
use App\Controllers\OperationsController;
use App\Controllers\ActionOperationsController;


/**Отслеживание GET запросов, с дальнейшей адресации страницы*/

switch ($_GET['page']) {
    case ('authorization'):
        (new AuthorizationController())->viewAuthorization();
        break;
    case ('registration'):
        (new RegistrationController())->viewRegistration();
        break;
    case ('operation_list') :
        (new OperationsController())->viewOperations();
        break;
    case ('add_operation') :
        (new ActionOperationsController())->viewAddOperations();
        break;
}

switch ($_POST['form-name']) {
    case ('authorization'):
        (new AuthorizationController())->validationAuthentication(trim($_POST['login']), trim($_POST['password']));
        break;
    case ('registration') :
        (new RegistrationController())->validationRegistration(trim($_POST['login']), trim($_POST['password']), trim($_POST['repeat-password']));
        break;
    case ('add_operation'):
        (new ActionOperationsController())->add($_POST['idUser'], trim($_POST['sum']), trim($_POST['operations-type']), trim($_POST['comment']));
        break;
}

switch ($_GET['action']) {
    case 'edit' :
        (new ActionOperationsController())->edit(trim($_GET['sum']), trim($_GET['type-id']), trim($_GET['user-id']), trim($_GET['comment']));
        break;
    case 'delete' :
        (new ActionOperationsController())->delete(trim($_GET['id']));
        break;
}

//
//match ($_GET['page']) {
//    'authorization' => (new AuthorizationController())->viewAuthorization(),
//    'registration' => (new RegistrationController())->viewRegistration(),
//    'operation_list' => (new OperationsController())->viewOperations(),
//    'add_operation' => (new ActionOperationsController())->viewAddOperations()
//};
//
//match ($_POST['form-name']) {
//	'authorization' => (new AuthorizationController())->validationAuthentication(trim($_POST['login']), trim($_POST['password'])),
//	'registration' => (new RegistrationController())->validationRegistration(trim($_POST['login']), trim($_POST['password']), trim($_POST['repeat-password'])),
//	'add_operation' => (new ActionOperationsController())->add($_POST['idUser'], trim($_POST['sum']), trim($_POST['operations-type']), trim($_POST['comment']))
//};
//
//match ($_GET['action']) {
//     'edit' => (new ActionOperationsController())->edit(trim($_GET['sum']), trim($_GET['type-id']), trim($_GET['user-id']), trim($_GET['comment'])),
//     'delete' => (new ActionOperationsController())->delete(trim($_GET['id']))
//};


/*
Log::debug(json_encode(file_get_contents('php://input')));

$logContent = ['get' => $_GET, 'post' => $_POST];
Log::debug(json_encode($logContent));*/