<?php
require_once dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "config.php";


use App\Controllers\AuthorizationController;
use App\Controllers\RegistrationController;
use App\Controllers\OperationsController;
use App\Controllers\ActionOperationsController;
use App\Services\Log;
use App\Services\Response;
use App\Services\View;
use App\Services\ViewPath;


/**Отслеживание GET запросов, с дальнейшей адресации страницы*/
if (isset($_GET['page'])) {
    try {
        match ($_GET['page']) {
            'authorization' => (new AuthorizationController())->viewAuthorization(),
            'registration' => (new RegistrationController())->viewRegistration(),
            'operation_list' => (new OperationsController())->viewOperations($_GET['userLogin']),
            'add_operation' => (new ActionOperationsController())->viewAddOperations($_GET['login']),
        };
    } catch (Exception $e) {
        Log::error('При отправки формы exception: ' . $e->getMessage());
        $html = new View(ViewPath::NotFound);
        (new Response('failed', $html, null))->echo();
    }
}

if (isset($_POST['form-name'])) {
    try {
        match ($_POST['form-name']) {
            'authorization' => (new AuthorizationController())->validationAuthentication(trim($_POST['login']), trim($_POST['password'])),
            'registration' => (new RegistrationController())->validationRegistration(trim($_POST['login']), trim($_POST['password']), trim($_POST['repeat-password'])),
            'add_operation' => (new ActionOperationsController())->add($_POST['login'], trim($_POST['sum']), trim($_POST['operations-type']), trim($_POST['comment']))
        };
    } catch (Exception $e) {
        Log::error('При отправки данных exception: ' . $e->getMessage());
        $html = new View(ViewPath::NotFound);
        (new Response('failed', $html, null))->echo();
    }
}

if (isset($_GET['action'])) {
    try {
        match ($_GET['action']) {
            'delete' => (new ActionOperationsController())->delete($_GET['idOperation'], $_GET['login']),
            'edit' => (new ActionOperationsController())->viewEditOperations(), //trim($_GET['idOperation']), trim($_GET['type-id']), trim($_GET['user-id']), trim($_GET['comment'])),
        };
    } catch (Exception $e) {
        Log::error('При выполнении операции exception: ' . $e->getMessage());
        $html = new View(ViewPath::NotFound);
        (new Response('failed', $html, null))->echo();
    }
}

exit(0);
/*
Log::debug(json_encode(file_get_contents('php://input')));

$logContent = ['get' => $_GET, 'post' => $_POST];
Log::debug(json_encode($logContent));*/