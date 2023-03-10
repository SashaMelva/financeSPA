<?php
namespace App\Controllers;
use App\View;
use App\Response;
use App\Models\UsersModel;

class AuthorizationController 
{
    public function __construct(
        private string $login,
        private string $password,
    ){
        $this->login = trim($login);
        $this->password = trim($password);
    }
    
 
    //Метод для загрузки страницы авторизации
    public function viewAuthorization()
    {
        $html = new View("../views/authorization.php");
        (new Response('success', $html))->getResponse();
    }

    public function validationAuthentication()
    {
        if ($this->login == "") {

        }
        if ($this->password == "") {

        }
        if ($this->login != "" && $this->password != "") {

            (new OperationsController())->viewOperations();
        }
    }


    public function authenticationUser() 
    {
        (new UsersModel())->loginVerification();
    }
}










// class View
// {
//     public static function getHtml(string $path): string 
//     {
//         ob_start();
//         include($path);
//         $var = ob_get_contents();
//         ob_end_clean();
    
//         return $var;
//     }
// }