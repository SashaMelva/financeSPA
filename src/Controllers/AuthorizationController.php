<?php
namespace App\Controllers;
use App\View;
use App\Response;

class AuthorizationController 
{
   /*public function __construct(
        private string $login,
        private string $password,
    ){}*/
    

    //Метод для загрузки страницы авторизации
    public function viewAuthorization()
    {
        $html = new View("../views/authorization.php");
        (new Response('success', $html))->getResponse();
    }
/*
    public function signIn() 
    {
        if ($this->login == "") {

        }
        if ($this->password == "") {

        }
       
    }*/
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